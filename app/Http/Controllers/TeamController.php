<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teams.create', [
            'amount' => 450.00,
            'amount_ht' => 375.00
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'company_name' => 'required|string|max:255',
                'team_leader' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'player_count' => 'required|integer|min:5|max:6',
                'contact_address' => 'required|string',
                'company_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'player_sizes' => 'required|array|min:5|max:6',
                'player_sizes.*' => 'required|in:S,M,L'
            ]);

            DB::beginTransaction();

            // Gérer le logo de l'entreprise
            if ($request->hasFile('company_logo')) {
                $file = $request->file('company_logo');
                $logoPath = $file->store('company-logos', 'public');
                $validatedData['company_logo'] = $logoPath;
            }

            // Créer l'équipe
            $team = Team::create([
                'name' => $validatedData['company_name'],
                'company_name' => $validatedData['company_name'],
                'team_leader' => $validatedData['team_leader'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'player_count' => $validatedData['player_count'],
                'contact_address' => $validatedData['contact_address'],
                'company_logo' => $validatedData['company_logo'] ?? null,
                'player_sizes' => $validatedData['player_sizes']
            ]);

            if (!$team || !$team->exists) {
                throw new \Exception('Erreur lors de la création de l\'équipe');
            }

            DB::commit();

            // Redirection vers la page de pré-paiement avec les informations nécessaires
            return redirect()->route('payments.create', ['team' => $team->id]);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de la création de l\'équipe : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
