<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootEvenT — Dashboard Joueur</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white" style="font-family:'Outfit',sans-serif">

<!-- NAV -->
<nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-10 py-4 bg-gray-900 border-b border-gray-800">
    <a href="home.html" class="flex items-center gap-3 no-underline">
        <div class="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center text-base">⚽</div>
        <span class="text-2xl text-green-400 tracking-widest" style="font-family:'Bebas Neue',cursive">FootEvenT</span>
    </a>
    <div class="flex items-center gap-4">
        <div class="relative">
            <button class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:text-white border border-gray-700">🔔</button>
            <span class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full text-gray-900 text-xs font-bold flex items-center justify-center">2</span>
        </div>
        <div class="flex items-center gap-3 bg-gray-800 border border-gray-700 rounded-xl px-4 py-2">
            <div class="w-7 h-7 bg-green-400 rounded-full flex items-center justify-center text-gray-900 font-bold text-sm">Y</div>
            <div>
                <div class="text-sm font-semibold leading-none">Youssef</div>
                <div class="text-xs text-green-400 mt-0.5">Joueur</div>
            </div>
        </div>
        <a href="login.html" class="px-4 py-2 border border-gray-700 rounded-lg text-gray-400 text-sm hover:border-red-500 hover:text-red-400 no-underline">Déconnexion</a>
    </div>
</nav>

<!-- MAIN -->
<div class="pt-20 min-h-screen">

    <!-- HEADER -->
    <div class="bg-gray-800 border-b border-gray-700 px-10 py-8">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm mb-1">Bon retour 👋</p>
                <h1 class="text-3xl font-bold text-white">Youssef El Amrani</h1>
            </div>
            <div class="hidden md:flex gap-6">
                <div class="text-center">
                    <div class="text-2xl font-bold text-green-400" style="font-family:'Bebas Neue',cursive">0</div>
                    <div class="text-xs text-gray-400 uppercase tracking-wide">Équipe</div>
                </div>
                <div class="w-px bg-gray-700"></div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-green-400" style="font-family:'Bebas Neue',cursive">0</div>
                    <div class="text-xs text-gray-400 uppercase tracking-wide">Matchs</div>
                </div>
                <div class="w-px bg-gray-700"></div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-green-400" style="font-family:'Bebas Neue',cursive">0</div>
                    <div class="text-xs text-gray-400 uppercase tracking-wide">Buts</div>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="max-w-6xl mx-auto px-10 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- LEFT COL -->
            <div class="lg:col-span-2 flex flex-col gap-8">

                <!-- MON EQUIPE - EMPTY STATE -->
                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-white">Mon Équipe</h2>
                        <span class="text-xs text-gray-500 bg-gray-700 px-3 py-1 rounded-full">0 équipe</span>
                    </div>
                    <div class="flex flex-col items-center justify-center py-12 text-center">
                        <div class="w-20 h-20 bg-gray-700 rounded-full flex items-center justify-center text-4xl mb-5">👥</div>
                        <h3 class="text-lg font-semibold text-white mb-2">Vous n'avez pas encore d'équipe</h3>
                        <p class="text-gray-400 text-sm max-w-sm leading-relaxed mb-8">
                            Créez votre propre équipe et invitez des joueurs, ou rejoignez une équipe existante pour participer aux tournois.
                        </p>
                        <div class="flex gap-3 flex-wrap justify-center">
                            <a href="create-equipe.html" class="flex items-center gap-2 px-6 py-3 bg-green-400 rounded-xl text-gray-900 font-bold text-sm hover:bg-green-300 no-underline">
                                + Créer une équipe
                            </a>
                            <a href="rejoindre-equipe.html" class="px-6 py-3 border border-gray-600 rounded-xl text-white text-sm font-medium hover:border-gray-400 no-underline">
                                Rejoindre une équipe
                            </a>
                        </div>
                    </div>
                </div>

                <!-- MATCHS - EMPTY STATE -->
                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-8">
                    <h2 class="text-xl font-bold text-white mb-6">Mes Prochains Matchs</h2>
                    <div class="flex flex-col items-center justify-center py-10 text-center">
                        <div class="w-16 h-16 bg-gray-700 rounded-full flex items-center justify-center text-3xl mb-4">📅</div>
                        <p class="text-gray-400 text-sm">Aucun match prévu pour le moment.</p>
                        <p class="text-gray-500 text-xs mt-1">Rejoignez une équipe pour voir vos matchs ici.</p>
                    </div>
                </div>

            </div>

            <!-- RIGHT COL -->
            <div class="flex flex-col gap-6">

                <!-- PROFIL -->
                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <h3 class="text-base font-bold text-white mb-5">Mon Profil</h3>
                    <div class="flex flex-col items-center text-center mb-5">
                        <div class="w-16 h-16 bg-green-400 rounded-full flex items-center justify-center text-gray-900 font-bold text-2xl mb-3">Y</div>
                        <div class="font-semibold text-white">Youssef El Amrani</div>
                        <div class="text-xs text-green-400 mt-1">Joueur</div>
                    </div>
                    <div class="flex flex-col gap-1 text-sm">
                        <div class="flex justify-between py-2 border-b border-gray-700">
                            <span class="text-gray-400">Poste</span>
                            <span class="text-white font-medium">Attaquant</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-700">
                            <span class="text-gray-400">Âge</span>
                            <span class="text-white font-medium">22 ans</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-400">Email</span>
                            <span class="text-white font-medium text-xs">youssef@email.com</span>
                        </div>
                    </div>
                    <a href="edit-profil.html" class="mt-5 block text-center px-4 py-2 border border-gray-600 rounded-xl text-white text-sm hover:border-green-400 hover:text-green-400 no-underline">
                        Modifier le profil
                    </a>
                </div>

                <!-- TOURNOIS -->
                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <h3 class="text-base font-bold text-white mb-2">Tournois disponibles</h3>
                    <p class="text-gray-400 text-xs mb-5 leading-relaxed">Découvrez les tournois en cours.</p>
                    <div class="flex flex-col gap-3 mb-5">
                        <div class="flex items-center gap-3 bg-gray-700 rounded-xl p-3">
                            <div class="w-9 h-9 bg-green-900 rounded-lg flex items-center justify-center text-base flex-shrink-0">⚽</div>
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-semibold text-white truncate">Championnat Regional</div>
                                <div class="text-xs text-gray-400">Casablanca • 16 équipes</div>
                            </div>
                            <span class="text-xs text-green-400 font-bold bg-green-900 px-2 py-0.5 rounded-full flex-shrink-0">Live</span>
                        </div>
                        <div class="flex items-center gap-3 bg-gray-700 rounded-xl p-3">
                            <div class="w-9 h-9 bg-blue-900 rounded-lg flex items-center justify-center text-base flex-shrink-0">🥅</div>
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-semibold text-white truncate">Coupe de Printemps</div>
                                <div class="text-xs text-gray-400">Rabat • 8/12 équipes</div>
                            </div>
                            <span class="text-xs text-blue-400 font-bold bg-blue-900 px-2 py-0.5 rounded-full flex-shrink-0">Ouvert</span>
                        </div>
                        <div class="flex items-center gap-3 bg-gray-700 rounded-xl p-3">
                            <div class="w-9 h-9 bg-yellow-900 rounded-lg flex items-center justify-center text-base flex-shrink-0">🏅</div>
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-semibold text-white truncate">Tournoi de l'Été</div>
                                <div class="text-xs text-gray-400">Marrakech • 4/16 équipes</div>
                            </div>
                            <span class="text-xs text-yellow-400 font-bold bg-yellow-900 px-2 py-0.5 rounded-full flex-shrink-0">Bientôt</span>
                        </div>
                    </div>
                    <a href="tournois.html" class="block text-center px-4 py-3 bg-green-400 rounded-xl text-gray-900 font-bold text-sm hover:bg-green-300 no-underline">
                        Voir tous les tournois →
                    </a>
                </div>

                <!-- NOTIFICATIONS -->
                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-base font-bold text-white">Notifications</h3>
                        <span class="w-5 h-5 bg-green-400 rounded-full text-gray-900 text-xs font-bold flex items-center justify-center">2</span>
                    </div>
                    <div class="flex flex-col gap-3">
                        <div class="flex gap-3 items-start">
                            <div class="w-2 h-2 bg-green-400 rounded-full mt-1.5 flex-shrink-0"></div>
                            <div>
                                <p class="text-sm text-white">Nouveau tournoi disponible à Casablanca</p>
                                <p class="text-xs text-gray-500 mt-0.5">Il y a 2 heures</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start">
                            <div class="w-2 h-2 bg-green-400 rounded-full mt-1.5 flex-shrink-0"></div>
                            <div>
                                <p class="text-sm text-white">Bienvenue sur FootEvenT !</p>
                                <p class="text-xs text-gray-500 mt-0.5">Il y a 1 jour</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>