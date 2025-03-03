<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function create(Team $team)
    {
        if (!$team->exists) {
            return redirect('/')->with('error', 'Équipe invalide');
        }

        $stripeSecret = config('services.stripe.secret');
        $stripeKey = config('services.stripe.key');

        if (empty($stripeSecret) || empty($stripeKey)) {
            return redirect()->back()->with('error', 'Configuration de paiement incomplète. Contactez l\'administrateur.');
        }

        try {
            // Définir la clé API Stripe
            Stripe::setApiKey($stripeSecret);

            // Créer une session de paiement Stripe
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur',
                        'unit_amount' => 45000, // 450€ en centimes
                        'product_data' => [
                            'name' => 'Inscription au tournoi Event Five',
                            'description' => 'Inscription pour l\'équipe ' . $team->company_name,
                        ],
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('payments.confirmation', ['team' => $team->id]) . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('payments.create', ['team' => $team->id]),
                'customer_email' => $team->email,
                'metadata' => [
                    'team_id' => $team->id,
                    'company_name' => $team->company_name
                ]
            ]);

            // Afficher la page de pré-paiement avec le récapitulatif
            return view('teams.payment', [
                'team' => $team,
                'amount' => 450.00,
                'amount_ht' => 375.00,
                'stripe_url' => $session->url
            ]);

        } catch (\Exception $e) {
            \Log::error('Erreur lors de la création de la session Stripe', [
                'team_id' => $team->id,
                'error' => $e->getMessage()
            ]);
            return redirect()->back()->with('error', 'Erreur lors de l\'initialisation du paiement : ' . $e->getMessage());
        }
    }

    public function confirmation(Request $request, Team $team)
    {
        try {
            // Vérifier le paiement avec Stripe
            Stripe::setApiKey(config('services.stripe.secret'));
            $session = Session::retrieve($request->get('session_id'));

            if ($session->payment_status === 'paid') {
                // Créer l'enregistrement du paiement
                $payment = new Payment();
                $payment->team_id = $team->id;
                $payment->amount = 450.00;
                $payment->stripe_session_id = $session->id;
                $payment->payment_method = 'card';
                $payment->status = 'completed';
                $payment->save();

                // Mettre à jour le statut de l'équipe
                $team->payment_status = 'paid';
                $team->save();

                // Générer le PDF de la facture
                $pdf = PDF::loadView('pdfs.invoice', [
                    'team' => $team,
                    'payment' => $payment,
                    'amount' => 450.00,
                    'amount_ht' => 375.00
                ]);

                // Sauvegarder le PDF
                $pdfPath = storage_path('app/public/invoices/invoice_' . $payment->id . '.pdf');
                $pdf->save($pdfPath);

                // Envoyer le PDF par email au client
                try {
                    Mail::send('emails.invoice_client', [
                        'team' => $team,
                        'payment' => $payment
                    ], function($message) use ($team, $pdfPath) {
                        $message->to($team->email, $team->team_leader)
                                ->subject('Facture - Inscription au tournoi Events Five')
                                ->attach($pdfPath);
                    });
                    \Log::info('Email de facture envoyé au client', ['email' => $team->email]);
                } catch (\Exception $e) {
                    \Log::error('Erreur lors de l\'envoi de l\'email client', ['error' => $e->getMessage()]);
                }

                // Envoyer un email récapitulatif à l'administration
                try {
                    Mail::send('emails.admin_recap', ['team' => $team, 'payment' => $payment], function($message) use ($team) {
                        $message->to('alexalix58@gmail.com')
                                ->subject('Nouvelle inscription - ' . $team->company_name);
                        
                        // Ajouter le logo de l'entreprise en pièce jointe s'il existe
                        if ($team->company_logo) {
                            $logoPath = storage_path('app/public/' . $team->company_logo);
                            if (file_exists($logoPath)) {
                                $message->attach($logoPath);
                            }
                        }
                    });
                    \Log::info('Email récapitulatif envoyé à l\'administration', ['email' => 'alexalix58@gmail.com']);
                } catch (\Exception $e) {
                    \Log::error('Erreur lors de l\'envoi de l\'email admin', ['error' => $e->getMessage()]);
                }

                // Rediriger vers la page de succès
                return view('payments.success', [
                    'team' => $team,
                    'payment' => $payment,
                    'amount' => 450.00,
                    'amount_ht' => 375.00,
                    'invoice_url' => asset('storage/invoices/invoice_' . $payment->id . '.pdf')
                ]);
            }

            return redirect()->route('payments.create', ['team' => $team])
                ->with('error', 'Le paiement n\'a pas été complété.');

        } catch (\Exception $e) {
            \Log::error('Erreur lors de la confirmation du paiement', [
                'team_id' => $team->id,
                'session_id' => $request->get('session_id'),
                'error' => $e->getMessage()
            ]);
            
            return redirect()->route('payments.create', ['team' => $team])
                ->with('error', 'Erreur lors de la vérification du paiement : ' . $e->getMessage());
        }
    }
}
