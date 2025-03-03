<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politique de Confidentialité - Event Five</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-orange-50 to-red-100 min-h-screen">
    <div class="container mx-auto py-12 px-4">
        <div class="max-w-4xl mx-auto">
            <!-- En-tête -->
            <div class="text-center mb-12">
                <img src="{{ asset('images/logoevents.png') }}" alt="Event Five Logo" class="h-24 mx-auto mb-6">
                <h1 class="text-3xl font-bold text-red-900 mb-4">Politique de Confidentialité</h1>
                <p class="text-lg text-red-700">Event Five - Protection de vos Données Personnelles</p>
            </div>

            <!-- Contenu -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-8 space-y-8">
                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">1. Introduction</h2>
                        <p class="text-gray-700 mb-4">
                            Event Five s'engage à protéger la vie privée des utilisateurs de son site web et des participants à ses événements, conformément au Règlement Général sur la Protection des Données (RGPD - UE 2016/679).
                        </p>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">2. Responsable du Traitement</h2>
                        <p class="text-gray-700 mb-4">
                            Event Five, représenté par son directeur, est responsable du traitement des données personnelles collectées sur ce site.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">3. Données Collectées</h2>
                        <p class="text-gray-700 mb-4">
                            Nous collectons les informations suivantes :
                        </p>
                        <ul class="list-disc pl-6 text-gray-700 space-y-2">
                            <li>Nom de l'entreprise</li>
                            <li>Nom et prénom du responsable d'équipe</li>
                            <li>Adresse email professionnelle</li>
                            <li>Numéro de téléphone</li>
                            <li>Adresse de l'entreprise</li>
                            <li>Tailles des maillots des joueurs</li>
                            <li>Logo de l'entreprise (si fourni)</li>
                        </ul>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">4. Finalités du Traitement</h2>
                        <p class="text-gray-700 mb-4">
                            Vos données sont collectées pour :
                        </p>
                        <ul class="list-disc pl-6 text-gray-700 space-y-2">
                            <li>Gérer votre inscription au tournoi</li>
                            <li>Vous fournir les informations nécessaires liées à l'événement</li>
                            <li>Personnaliser les équipements (maillots)</li>
                            <li>Vous contacter en cas de besoin concernant l'organisation</li>
                            <li>Vous envoyer des actualités si vous y avez consenti</li>
                        </ul>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">5. Base Légale</h2>
                        <p class="text-gray-700 mb-4">
                            Le traitement de vos données est basé sur :
                        </p>
                        <ul class="list-disc pl-6 text-gray-700 space-y-2">
                            <li>L'exécution du contrat (organisation du tournoi)</li>
                            <li>Votre consentement (pour l'envoi d'actualités)</li>
                            <li>Notre intérêt légitime (amélioration de nos services)</li>
                        </ul>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">6. Durée de Conservation</h2>
                        <p class="text-gray-700 mb-4">
                            Nous conservons vos données pendant une durée de 3 ans après le dernier contact. Les données de facturation sont conservées conformément aux obligations légales.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">7. Vos Droits</h2>
                        <p class="text-gray-700 mb-4">
                            Conformément au RGPD, vous disposez des droits suivants :
                        </p>
                        <ul class="list-disc pl-6 text-gray-700 space-y-2">
                            <li>Droit d'accès à vos données</li>
                            <li>Droit de rectification</li>
                            <li>Droit à l'effacement (droit à l'oubli)</li>
                            <li>Droit à la limitation du traitement</li>
                            <li>Droit à la portabilité</li>
                            <li>Droit d'opposition</li>
                            <li>Droit de retirer votre consentement à tout moment</li>
                        </ul>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">8. Sécurité</h2>
                        <p class="text-gray-700 mb-4">
                            Nous mettons en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données personnelles contre toute perte, accès non autorisé, divulgation ou destruction.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">9. Contact</h2>
                        <p class="text-gray-700 mb-4">
                            Pour exercer vos droits ou pour toute question concernant le traitement de vos données personnelles, vous pouvez nous contacter à l'adresse suivante : [Votre email de contact RGPD]
                        </p>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-red-900 mb-4">10. Autorité de Contrôle</h2>
                        <p class="text-gray-700 mb-4">
                            Vous avez le droit d'introduire une réclamation auprès de la CNIL (Commission Nationale de l'Informatique et des Libertés) si vous estimez que le traitement de vos données personnelles constitue une violation du RGPD.
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
