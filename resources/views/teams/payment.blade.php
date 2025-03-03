<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement - Event Five</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-orange-50 to-red-100 min-h-screen">
    <div class="container mx-auto py-12 px-4">
        <!-- Logo et Titre -->
        <div class="max-w-4xl mx-auto mb-12 text-center">
            <img src="{{ asset('images/logoevents.png') }}" alt="Event Five Logo" class="h-24 mx-auto mb-6">
            <h1 class="text-3xl font-bold text-red-900 mb-4">Récapitulatif de votre inscription</h1>
        </div>

        <!-- Récapitulatif du paiement -->
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-red-600 to-orange-500 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white">Détails du paiement</h2>
                </div>

                <div class="p-6">
                    @if(session('error'))
                        <div class="p-4 mb-6 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Informations de l'équipe -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-red-900 mb-6 pb-2 border-b border-red-200">
                            Informations de l'équipe
                        </h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Entreprise</span>
                                <span class="font-medium text-gray-900">{{ $team->company_name }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Responsable</span>
                                <span class="font-medium text-gray-900">{{ $team->team_leader }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Nombre de joueurs</span>
                                <span class="font-medium text-gray-900">{{ $team->player_count }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Détails du montant -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-red-900 mb-6 pb-2 border-b border-red-200">
                            Détails du montant
                        </h3>
                        <div class="space-y-4 bg-gray-50 p-4 rounded-lg">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Montant HT</span>
                                <span class="font-medium">{{ number_format($amount_ht, 2) }} €</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">TVA (20%)</span>
                                <span class="font-medium">{{ number_format($amount - $amount_ht, 2) }} €</span>
                            </div>
                            <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                                <span class="text-lg font-medium text-gray-900">Total TTC</span>
                                <span class="text-lg font-bold text-red-600">{{ number_format($amount, 2) }} €</span>
                            </div>
                        </div>
                    </div>

                    <!-- Bouton de paiement -->
                    <div class="mt-8">
                        <a href="{{ $stripe_url }}" 
                            class="block w-full px-6 py-3 bg-gradient-to-r from-red-600 to-orange-500 text-white font-semibold rounded-lg 
                            hover:from-red-700 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 text-center">
                            Procéder au paiement ({{ number_format($amount, 2) }} €)
                        </a>
                        <p class="mt-4 text-sm text-center text-gray-500">
                            Vous allez être redirigé vers une page de paiement sécurisée
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
