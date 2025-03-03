<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditions Générales d'Utilisation - Event Five</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-orange-50 to-red-100 min-h-screen">
    <div class="container mx-auto py-12 px-4">
        <div class="max-w-4xl mx-auto">
            <!-- En-tête -->
            <div class="text-center mb-12">
                <img src="{{ asset('images/logoevents.png') }}" alt="Event Five Logo" class="h-24 mx-auto mb-6">
                <h1 class="text-3xl font-bold text-red-900 mb-4">Conditions Générales d'Utilisation</h1>
                <p class="text-lg text-red-700">Event Five - Tournoi de Football Inter-Entreprises 2025</p>
            </div>

            <!-- Contenu -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-8 space-y-8">
                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">1. Objet</h2>
                        <p class="text-gray-700 mb-4">
                            Les présentes conditions générales d'utilisation régissent l'inscription et la participation au Tournoi de Football Inter-Entreprises 2025 organisé par Event Five.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">2. Inscription</h2>
                        <p class="text-gray-700 mb-4">
                            L'inscription au tournoi est ouverte à toute entreprise. Chaque équipe doit être composée de 5 à 6 joueurs. L'inscription n'est validée qu'après réception du paiement complet.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">3. Responsabilités</h2>
                        <p class="text-gray-700 mb-4">
                            Chaque entreprise participante est responsable de ses joueurs et s'engage à ce qu'ils soient aptes à la pratique du football. Une assurance responsabilité civile est obligatoire.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">4. Déroulement du Tournoi</h2>
                        <p class="text-gray-700 mb-4">
                            Le tournoi se déroulera le mardi 29 avril 2025 de 9h à 18h. Les équipes doivent se présenter au moins 30 minutes avant leur premier match. Le planning détaillé sera communiqué une semaine avant l'événement.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">5. Équipement</h2>
                        <p class="text-gray-700 mb-4">
                            Les maillots personnalisés sont fournis par l'organisation. Les joueurs doivent se munir de leurs propres chaussures de football (crampons moulés uniquement) et protège-tibias.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">6. Droit à l'Image</h2>
                        <p class="text-gray-700 mb-4">
                            Les participants autorisent Event Five à utiliser les photos et vidéos prises lors de l'événement à des fins promotionnelles.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">7. Protection des Données</h2>
                        <p class="text-gray-700 mb-4">
                            Event Five accorde une grande importance à la protection de vos données personnelles. Conformément au Règlement Général sur la Protection des Données (RGPD - UE 2016/679), nous avons mis en place une politique de confidentialité détaillée qui explique comment nous collectons, utilisons et protégeons vos données.
                        </p>
                        <p class="text-gray-700 mb-4">
                            Les données personnelles collectées sont utilisées uniquement dans le cadre du tournoi et conformément à notre <a href="{{ route('privacy.show') }}" target="_blank" class="text-red-600 underline hover:text-red-800">politique de confidentialité</a>. Vous disposez de plusieurs droits concernant vos données personnelles, notamment :
                        </p>
                        <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                            <li>Le droit d'accès à vos données</li>
                            <li>Le droit de rectification</li>
                            <li>Le droit à l'effacement</li>
                            <li>Le droit de retirer votre consentement</li>
                        </ul>
                        <p class="text-gray-700 mb-4">
                            Pour exercer ces droits ou pour toute question concernant le traitement de vos données, consultez notre <a href="{{ route('privacy.show') }}" target="_blank" class="text-red-600 underline hover:text-red-800">politique de confidentialité complète</a>.
                        </p>
                    </section>
                </div>
            </div>

            <!-- Bouton de retour -->
            <div class="mt-8 text-center">
                <a href="{{ route('teams.create') }}" class="inline-block px-6 py-3 bg-gradient-to-r from-red-600 to-orange-500 text-white font-semibold rounded-lg hover:from-red-700 hover:to-orange-600">
                    Retour au formulaire d'inscription
                </a>
            </div>
        </div>
    </div>
</body>
</html>
