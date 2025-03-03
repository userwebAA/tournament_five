<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation - Event Five</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-red-50 to-orange-50">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <!-- Logo et Titre -->
            <div class="text-center mb-8">
                <img src="{{ asset('images/logoevents.png') }}" alt="Event Five Logo" class="h-24 mx-auto mb-4">
            </div>

            <!-- Carte de confirmation -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- En-tête -->
                <div class="bg-gradient-to-r from-red-600 to-orange-500 px-6 py-8 text-center">
                    <svg class="h-16 w-16 text-white mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <h1 class="text-2xl font-bold text-white">Paiement confirmé</h1>
                </div>

                <!-- Contenu -->
                <div class="p-6">
                    <!-- Message de succès -->
                    <div class="text-center mb-8">
                        <p class="text-gray-600">Merci ! Votre inscription au tournoi est validée.</p>
                    </div>

                    <!-- Détails du paiement -->
                    <div class="bg-gray-50 rounded-lg p-4 mb-6">
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="text-gray-500">Montant payé</p>
                                <p class="text-lg font-semibold text-gray-900">{{ number_format($payment->amount, 2) }} €</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Référence</p>
                                <p class="font-mono text-gray-900">{{ $payment->reference_number }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Date</p>
                                <p class="text-gray-900">{{ $payment->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Équipe</p>
                                <p class="text-gray-900">{{ $payment->team->name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Rappel -->
                    <div class="border-t border-gray-200 pt-6 mb-6">
                        <h3 class="font-medium text-gray-900 mb-2">À ne pas oublier</h3>
                        <ul class="text-gray-600 space-y-2 text-sm">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/>
                                </svg>
                                Présentez-vous 30 minutes avant le début du tournoi
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/>
                                </svg>
                                Apportez votre équipement sportif
                            </li>
                        </ul>
                    </div>

                    <!-- Boutons -->
                    <div class="flex flex-col space-y-3">
                        <a href="{{ route('teams.create') }}" 
                            class="w-full py-3 bg-gradient-to-r from-red-600 to-orange-500 text-white text-center font-medium rounded-lg 
                            hover:from-red-700 hover:to-orange-600 transition-colors">
                            Retour à l'accueil
                        </a>
                        <button onclick="window.print()" 
                            class="w-full py-3 text-red-600 bg-red-50 font-medium rounded-lg hover:bg-red-100 transition-colors">
                            Imprimer le reçu
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
