<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription au Tournoi de Football</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-orange-50 to-red-100 min-h-screen">
    <div class="container mx-auto py-12 px-4">
        <!-- Section d'introduction -->
        <div class="max-w-4xl mx-auto mb-12 text-center">
            <img src="{{ asset('images/logoevents.png') }}" alt="Event Five Logo" class="h-24 mx-auto mb-6">

            <h1 class="text-3xl font-bold text-red-900 mb-4">Event Five - Tournoi de Football Inter-Entreprises 2025</h1>
            <p class="text-lg text-red-700 mb-6">
                Participez à la 2ème édition de notre prestigieux tournoi inter-entreprises ! Event Five réunit les entreprises les plus dynamiques de la région pour une journée exceptionnelle alliant sport, networking et convivialité.
            </p>

            <div class="grid md:grid-cols-3 gap-6 text-center">
                <div class="bg-white p-6 rounded-lg shadow-sm border-2 border-red-200 hover:border-red-400 transition-colors">
                    <div class="text-red-600 font-semibold mb-2">Format Elite</div>
                    <p class="text-red-600">5 à 6 joueurs par équipe<br>Terrains premium</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border-2 border-red-200 hover:border-red-400 transition-colors">
                    <div class="text-red-600 font-semibold mb-2">Package All-Inclusive</div>
                    <p class="text-red-600">Maillots personnalisés<br>Repas et 2 boissons par participant</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border-2 border-red-200 hover:border-red-400 transition-colors">
                    <div class="text-red-600 font-semibold mb-2">Date & Lieu</div>
                    <p class="text-red-600">Mardi 29 avril 2025<br>9h à 18h</p>
                </div>
            </div>
        </div>

        <!-- Formulaire d'inscription -->
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-red-600 to-orange-500 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white">Formulaire d'inscription</h2>
                </div>

                <div class="p-6">
                    @if(session('error'))
                        <div class="p-4 mb-6 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="p-4 mb-6 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Informations de l'entreprise -->
                        <div>
                            <h3 class="text-lg font-medium text-red-900 mb-6 pb-2 border-b border-red-200">
                                Informations de l'entreprise
                            </h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label for="company_name" class="block text-sm font-medium text-red-700 mb-2">
                                        Nom de l'entreprise
                                    </label>
                                    <input type="text" 
                                        id="company_name" 
                                        name="company_name" 
                                        value="{{ old('company_name') }}"
                                        required
                                        class="w-full px-4 py-2 border border-red-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                    @error('company_name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Logo de l'entreprise -->
                                <div class="mb-6">
                                    <label for="company_logo" class="block text-sm font-medium text-red-700 mb-2">
                                        Logo de votre entreprise
                                    </label>
                                    <div class="mt-1">
                                        <input type="file" 
                                            id="company_logo" 
                                            name="company_logo" 
                                            accept="image/*"
                                            class="w-full text-red-700
                                            file:mr-4 file:py-2 file:px-4 
                                            file:rounded-lg file:border-0 
                                            file:bg-gradient-to-r file:from-red-600 file:to-orange-500 
                                            file:text-white file:font-semibold
                                            hover:file:from-red-700 hover:file:to-orange-600
                                            border border-red-300 rounded-lg
                                            focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                        <p class="mt-2 text-sm text-red-600">Format recommandé : PNG, JPG. Taille max : 2MB</p>
                                    </div>
                                    @error('company_logo')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Informations du responsable -->
                        <div class="mb-8">
                            <h3 class="text-lg font-medium text-red-900 mb-6 pb-2 border-b border-red-200">
                                Informations du responsable
                            </h3>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="team_leader" class="block text-sm font-medium text-red-700 mb-2">Nom complet</label>
                                    <input type="text" name="team_leader" id="team_leader" required 
                                        value="{{ old('team_leader') }}"
                                        class="w-full px-4 py-2 border border-red-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                    @error('team_leader')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-red-700 mb-2">Email professionnel</label>
                                    <input type="email" name="email" id="email" required 
                                        value="{{ old('email') }}"
                                        class="w-full px-4 py-2 border border-red-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="phone" class="block text-sm font-medium text-red-700 mb-2">Téléphone</label>
                                    <input type="tel" name="phone" id="phone" required 
                                        value="{{ old('phone') }}"
                                        class="w-full px-4 py-2 border border-red-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                    @error('phone')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="contact_address" class="block text-sm font-medium text-red-700 mb-2">Adresse de l'entreprise</label>
                                    <input type="text" name="contact_address" id="contact_address" required 
                                        value="{{ old('contact_address') }}"
                                        class="w-full px-4 py-2 border border-red-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                    @error('contact_address')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Composition de l'équipe -->
                        <div class="mb-8">
                            <h3 class="text-lg font-medium text-red-900 mb-6 pb-2 border-b border-red-200">
                                Composition de l'équipe
                            </h3>

                            <div class="space-y-4">
                                <div class="flex items-center space-x-4">
                                    <span class="text-sm font-medium text-red-700">Taille de l'équipe :</span>
                                    <div class="flex space-x-2">
                                        <button type="button" class="team-size-btn px-4 py-2 border-2 border-red-300 rounded-lg text-red-600 focus:outline-none focus:ring-2 focus:ring-red-500" data-size="5">5</button>
                                        <button type="button" class="team-size-btn px-4 py-2 border-2 border-red-300 rounded-lg text-red-600 focus:outline-none focus:ring-2 focus:ring-red-500" data-size="6">6</button>
                                    </div>
                                </div>
                                <input type="hidden" name="player_count" id="player_count" required value="{{ old('player_count', 5) }}">
                                <div id="players_container" class="mt-4 grid grid-cols-2 gap-4">
                                    <!-- Les champs de taille des joueurs seront générés ici -->
                                </div>
                            </div>
                        </div>

                        <!-- Conditions et Newsletter -->
                        <div class="mt-8 space-y-4 bg-red-50 p-4 rounded-lg border border-red-200">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input type="checkbox" 
                                        name="accepts_terms" 
                                        id="accepts_terms" 
                                        required
                                        class="h-4 w-4 text-red-600 border-red-300 rounded focus:ring-red-500">
                                </div>
                                <div class="ml-3">
                                    <label for="accepts_terms" class="text-sm text-red-700">
                                        J'accepte les <a href="{{ route('terms.show') }}" target="_blank" class="text-red-600 underline hover:text-red-800">conditions générales d'utilisation</a> du service *
                                    </label>
                                    @error('accepts_terms')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input type="checkbox" 
                                        name="accepts_newsletter" 
                                        id="accepts_newsletter"
                                        class="h-4 w-4 text-red-600 border-red-300 rounded focus:ring-red-500">
                                </div>
                                <div class="ml-3">
                                    <label for="accepts_newsletter" class="text-sm text-red-700">
                                        Je souhaite recevoir les actualités et programmation par email
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="mt-6">
                            <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-red-600 to-orange-500 text-white font-semibold rounded-lg hover:from-red-700 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                Continuer vers le paiement
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.team-size-btn').forEach(button => {
                button.addEventListener('click', function() {
                    // Supprimer la classe active de tous les boutons
                    document.querySelectorAll('.team-size-btn').forEach(btn => {
                        btn.classList.remove('bg-red-100', 'border-red-500');
                    });

                    // Ajouter la classe active au bouton cliqué
                    this.classList.add('bg-red-100', 'border-red-500');

                    // Get the selected team size
                    const teamSize = parseInt(this.dataset.size);
                    document.getElementById('player_count').value = teamSize;

                    // Generate player size fields
                    const container = document.getElementById('players_container');
                    container.innerHTML = '';

                    for (let i = 1; i <= teamSize; i++) {
                        const playerField = `
                            <div>
                                <label for="player_${i}_size" class="block text-sm font-medium text-red-700 mb-2">Joueur ${i}</label>
                                <select name="player_sizes[]" id="player_${i}_size" required class="w-full px-4 py-2 border border-red-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                    <option value="">Choisir une taille</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                </select>
                            </div>
                        `;
                        container.insertAdjacentHTML('beforeend', playerField);
                    }
                });
            });
        });
    </script>
</body>
</html>
