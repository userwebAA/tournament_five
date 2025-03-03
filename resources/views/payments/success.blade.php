<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement réussi - Event Five</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-orange-50 to-red-100 min-h-screen">
    <div class="container mx-auto py-12 px-4">
        <!-- Logo et Titre -->
        <div class="max-w-3xl mx-auto mb-12 text-center">
            <img src="{{ asset('images/logoevents.png') }}" alt="Event Five Logo" class="h-24 mx-auto mb-6">
            <h1 class="text-3xl font-bold text-green-600 mb-4">Paiement réussi !</h1>
            <p class="text-lg text-gray-600">Merci pour votre inscription au tournoi Event Five</p>
        </div>

        <!-- Récapitulatif -->
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-green-600 to-green-500 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white">Confirmation de paiement</h2>
                </div>

                <div class="p-6">
                    <!-- Informations de l'équipe -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b border-gray-200">
                            Informations de l'équipe
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Entreprise</span>
                                <span class="font-medium text-gray-900">{{ $team->company_name }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Responsable</span>
                                <span class="font-medium text-gray-900">{{ $team->team_leader }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Email</span>
                                <span class="font-medium text-gray-900">{{ $team->email }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Détails du paiement -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b border-gray-200">
                            Détails du paiement
                        </h3>
                        <div class="space-y-3 bg-gray-50 p-4 rounded-lg">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Montant HT</span>
                                <span class="font-medium">{{ number_format($amount_ht, 2) }} €</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">TVA (20%)</span>
                                <span class="font-medium">{{ number_format($amount - $amount_ht, 2) }} €</span>
                            </div>
                            <div class="flex justify-between items-center pt-3 border-t border-gray-200">
                                <span class="text-lg font-medium text-gray-900">Total payé</span>
                                <span class="text-lg font-bold text-green-600">{{ number_format($amount, 2) }} €</span>
                            </div>
                        </div>
                    </div>

                    <!-- Message de confirmation -->
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-8">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-green-400 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <div>
                                <p class="text-green-700">Une facture a été envoyée à votre adresse email.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Aperçu de la facture -->
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-medium text-gray-900">Facture</h3>
                            <a href="{{ $invoice_url }}" target="_blank" 
                                class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd" />
                                </svg>
                                Télécharger
                            </a>
                        </div>
                        <div class="bg-gray-50 rounded-lg overflow-hidden" style="height: 600px;">
                            <embed src="{{ $invoice_url }}" type="application/pdf" width="100%" height="100%"
                                class="w-full h-full" style="border: none;">
                        </div>
                    </div>

                    <!-- Bouton de retour -->
                    <div class="text-center mt-8">
                        <a href="/" 
                            class="inline-block px-6 py-3 bg-gradient-to-r from-red-600 to-orange-500 text-white font-semibold rounded-lg 
                            hover:from-red-700 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Retour à l'accueil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
