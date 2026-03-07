<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootEvenT — Dashboard Organisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white" style="font-family:'Outfit',sans-serif">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 border-r border-gray-800 flex flex-col fixed top-0 left-0 h-full z-40" style="background:#070a0f">
        <!-- Logo -->
        <div class="px-6 py-6 border-b border-gray-800">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center text-base">⚽</div>
                <span class="text-xl text-green-400 tracking-widest" style="font-family:'Bebas Neue',cursive">FootEvenT</span>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                <span class="text-xs text-gray-400">Panel Organisateur</span>
            </div>
        </div>

        <!-- Nav -->
        <nav class="flex-1 px-4 py-6 flex flex-col gap-1">

            <div class="text-xs text-gray-600 uppercase tracking-widest px-3 mb-2">Principal</div>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-green-400 bg-opacity-10 border border-green-400 border-opacity-20 text-green-400 text-sm font-medium no-underline">
                <span class="text-base">📊</span> Dashboard
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">🏆</span> Mes Tournois
                <span class="ml-auto bg-gray-700 text-gray-300 text-xs px-2 py-0.5 rounded-full">3</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">👥</span> Équipes
                <span class="ml-auto bg-yellow-400 text-gray-900 text-xs px-2 py-0.5 rounded-full font-bold">4</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">⚽</span> Matchs
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">📊</span> Résultats
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">📅</span> Calendrier
            </a>

            <div class="text-xs text-gray-600 uppercase tracking-widest px-3 mb-2 mt-4">Compte</div>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">🔔</span> Notifications
                <span class="ml-auto bg-green-400 text-gray-900 text-xs px-2 py-0.5 rounded-full font-bold">2</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">⚙️</span> Paramètres
            </a>
        </nav>

        <!-- User info -->
        <div class="px-4 py-4 border-t border-gray-800">
            <div class="flex items-center gap-3 bg-gray-800 rounded-xl px-3 py-3">
                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm">K</div>
                <div class="flex-1 min-w-0">
                    <div class="text-sm font-semibold text-white truncate">Karim Benzara</div>
                    <div class="text-xs text-green-400">Organisateur</div>
                </div>
            </div>
            <a href="login.html" class="mt-3 flex items-center gap-2 px-3 py-2 text-gray-500 text-xs hover:text-red-400 no-underline">
                🚪 Déconnexion
            </a>
        </div>
    </aside>

    <!-- MAIN -->
    <main class="ml-64 flex-1 flex flex-col">

        <!-- TOP BAR -->
        <div class="sticky top-0 z-30 flex items-center justify-between px-8 py-4 bg-gray-900 border-b border-gray-800">
            <div>
                <h1 class="text-xl font-bold text-white">Bonjour, Karim 👋</h1>
                <p class="text-xs text-gray-400 mt-0.5">Samedi, 07 Mars 2026</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="create-tournoi.html" class="flex items-center gap-2 px-5 py-2 bg-green-400 rounded-xl text-gray-900 font-bold text-sm hover:bg-green-300 no-underline">
                    + Créer un tournoi
                </a>
                <div class="relative">
                    <button class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:text-white border border-gray-700">🔔</button>
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full text-gray-900 text-xs font-bold flex items-center justify-center">2</span>
                </div>
                <div class="w-9 h-9 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm">K</div>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="flex-1 px-8 py-8">

            <!-- STATS -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-400 text-sm">Mes Tournois</span>
                        <div class="w-9 h-9 bg-green-900 rounded-xl flex items-center justify-center text-lg">🏆</div>
                    </div>
                    <div class="text-3xl font-bold text-white" style="font-family:'Bebas Neue',cursive">3</div>
                    <div class="text-xs text-green-400 mt-1">1 en cours</div>
                </div>
                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-400 text-sm">Équipes inscrites</span>
                        <div class="w-9 h-9 bg-blue-900 rounded-xl flex items-center justify-center text-lg">👥</div>
                    </div>
                    <div class="text-3xl font-bold text-white" style="font-family:'Bebas Neue',cursive">24</div>
                    <div class="text-xs text-yellow-400 mt-1">4 en attente</div>
                </div>
                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-400 text-sm">Matchs planifiés</span>
                        <div class="w-9 h-9 bg-purple-900 rounded-xl flex items-center justify-center text-lg">📅</div>
                    </div>
                    <div class="text-3xl font-bold text-white" style="font-family:'Bebas Neue',cursive">18</div>
                    <div class="text-xs text-green-400 mt-1">3 cette semaine</div>
                </div>
                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-400 text-sm">Matchs joués</span>
                        <div class="w-9 h-9 bg-orange-900 rounded-xl flex items-center justify-center text-lg">⚽</div>
                    </div>
                    <div class="text-3xl font-bold text-white" style="font-family:'Bebas Neue',cursive">42</div>
                    <div class="text-xs text-green-400 mt-1">+6 cette semaine</div>
                </div>
            </div>

            <!-- MIDDLE -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

                <!-- MES TOURNOIS -->
                <div class="lg:col-span-2 bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-base font-bold text-white">Mes Tournois</h2>
                        <a href="create-tournoi.html" class="text-xs text-green-400 hover:text-green-300 no-underline">+ Nouveau →</a>
                    </div>
                    <div class="flex flex-col gap-4">

                        <!-- Tournoi 1 -->
                        <div class="bg-gray-700 rounded-xl p-5">
                            <div class="flex items-start justify-between mb-3">
                                <div>
                                    <div class="font-semibold text-white">Championnat Regional 2026</div>
                                    <div class="text-xs text-gray-400 mt-1">📍 Casablanca &nbsp;•&nbsp; 📅 01/03 - 30/03/2026</div>
                                </div>
                                <span class="text-xs text-green-400 bg-green-900 px-2.5 py-1 rounded-full font-bold">En cours</span>
                            </div>
                            <div class="flex items-center gap-4 mb-3">
                                <div class="text-xs text-gray-400">16 équipes</div>
                                <div class="text-xs text-gray-400">•</div>
                                <div class="text-xs text-gray-400">12 matchs joués</div>
                            </div>
                            <div class="bg-gray-600 rounded-full h-1.5 mb-1 overflow-hidden">
                                <div class="h-full bg-green-400 rounded-full" style="width:65%"></div>
                            </div>
                            <div class="flex justify-between text-xs text-gray-400 mb-4">
                                <span>Progression</span><span>65%</span>
                            </div>
                            <div class="flex gap-2">
                                <a href="#" class="px-3 py-1.5 bg-green-400 rounded-lg text-gray-900 text-xs font-bold hover:bg-green-300 no-underline">Gérer</a>
                                <a href="#" class="px-3 py-1.5 border border-gray-600 rounded-lg text-white text-xs hover:border-gray-400 no-underline">Planifier matchs</a>
                                <a href="#" class="px-3 py-1.5 border border-gray-600 rounded-lg text-white text-xs hover:border-gray-400 no-underline">Résultats</a>
                            </div>
                        </div>

                        <!-- Tournoi 2 -->
                        <div class="bg-gray-700 rounded-xl p-5">
                            <div class="flex items-start justify-between mb-3">
                                <div>
                                    <div class="font-semibold text-white">Coupe de Printemps</div>
                                    <div class="text-xs text-gray-400 mt-1">📍 Rabat &nbsp;•&nbsp; 📅 15/04 - 30/04/2026</div>
                                </div>
                                <span class="text-xs text-blue-400 bg-blue-900 px-2.5 py-1 rounded-full font-bold">Inscriptions ouvertes</span>
                            </div>
                            <div class="flex items-center gap-4 mb-3">
                                <div class="text-xs text-gray-400">8/12 équipes</div>
                                <div class="text-xs text-gray-400">•</div>
                                <div class="text-xs text-gray-400">0 matchs joués</div>
                            </div>
                            <div class="bg-gray-600 rounded-full h-1.5 mb-1 overflow-hidden">
                                <div class="h-full bg-blue-400 rounded-full" style="width:40%"></div>
                            </div>
                            <div class="flex justify-between text-xs text-gray-400 mb-4">
                                <span>Équipes inscrites</span><span>8/12</span>
                            </div>
                            <div class="flex gap-2">
                                <a href="#" class="px-3 py-1.5 bg-green-400 rounded-lg text-gray-900 text-xs font-bold hover:bg-green-300 no-underline">Gérer</a>
                                <a href="#" class="px-3 py-1.5 border border-gray-600 rounded-lg text-white text-xs hover:border-gray-400 no-underline">Valider équipes</a>
                            </div>
                        </div>

                        <!-- Tournoi 3 -->
                        <div class="bg-gray-700 rounded-xl p-5">
                            <div class="flex items-start justify-between mb-3">
                                <div>
                                    <div class="font-semibold text-white">Tournoi de l'Été 2026</div>
                                    <div class="text-xs text-gray-400 mt-1">📍 Marrakech &nbsp;•&nbsp; 📅 01/06 - 30/06/2026</div>
                                </div>
                                <span class="text-xs text-yellow-400 bg-yellow-900 px-2.5 py-1 rounded-full font-bold">En attente</span>
                            </div>
                            <div class="flex items-center gap-4 mb-3">
                                <div class="text-xs text-gray-400">4/16 équipes</div>
                                <div class="text-xs text-gray-400">•</div>
                                <div class="text-xs text-gray-400">0 matchs joués</div>
                            </div>
                            <div class="bg-gray-600 rounded-full h-1.5 mb-1 overflow-hidden">
                                <div class="h-full bg-yellow-400 rounded-full" style="width:20%"></div>
                            </div>
                            <div class="flex justify-between text-xs text-gray-400 mb-4">
                                <span>Équipes inscrites</span><span>4/16</span>
                            </div>
                            <div class="flex gap-2">
                                <a href="#" class="px-3 py-1.5 bg-green-400 rounded-lg text-gray-900 text-xs font-bold hover:bg-green-300 no-underline">Gérer</a>
                                <a href="#" class="px-3 py-1.5 border border-gray-600 rounded-lg text-white text-xs hover:border-gray-400 no-underline">Modifier</a>
                                <a href="#" class="px-3 py-1.5 border border-red-900 rounded-lg text-red-400 text-xs hover:border-red-600 no-underline">Supprimer</a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- RIGHT -->
                <div class="flex flex-col gap-5">

                    <!-- Équipes en attente -->
                    <div class="bg-gray-800 rounded-2xl border border-yellow-700 border-opacity-40 p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base font-bold text-white">Équipes en attente</h3>
                            <span class="w-6 h-6 bg-yellow-400 rounded-full text-gray-900 text-xs font-bold flex items-center justify-center">4</span>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div class="flex items-center justify-between bg-gray-700 rounded-xl px-3 py-2.5">
                                <div>
                                    <div class="text-sm text-white font-medium">FC Casablanca</div>
                                    <div class="text-xs text-gray-400">Championnat Regional</div>
                                </div>
                                <div class="flex gap-2">
                                    <button class="px-2 py-1 bg-green-400 rounded-lg text-gray-900 text-xs font-bold hover:bg-green-300">✓</button>
                                    <button class="px-2 py-1 bg-red-900 rounded-lg text-red-400 text-xs font-bold hover:bg-red-800">✗</button>
                                </div>
                            </div>
                            <div class="flex items-center justify-between bg-gray-700 rounded-xl px-3 py-2.5">
                                <div>
                                    <div class="text-sm text-white font-medium">Raja Fes</div>
                                    <div class="text-xs text-gray-400">Coupe de Printemps</div>
                                </div>
                                <div class="flex gap-2">
                                    <button class="px-2 py-1 bg-green-400 rounded-lg text-gray-900 text-xs font-bold hover:bg-green-300">✓</button>
                                    <button class="px-2 py-1 bg-red-900 rounded-lg text-red-400 text-xs font-bold hover:bg-red-800">✗</button>
                                </div>
                            </div>
                            <div class="flex items-center justify-between bg-gray-700 rounded-xl px-3 py-2.5">
                                <div>
                                    <div class="text-sm text-white font-medium">Wydad Marrakech</div>
                                    <div class="text-xs text-gray-400">Tournoi de l'Été</div>
                                </div>
                                <div class="flex gap-2">
                                    <button class="px-2 py-1 bg-green-400 rounded-lg text-gray-900 text-xs font-bold hover:bg-green-300">✓</button>
                                    <button class="px-2 py-1 bg-red-900 rounded-lg text-red-400 text-xs font-bold hover:bg-red-800">✗</button>
                                </div>
                            </div>
                            <div class="flex items-center justify-between bg-gray-700 rounded-xl px-3 py-2.5">
                                <div>
                                    <div class="text-sm text-white font-medium">AS Rabat</div>
                                    <div class="text-xs text-gray-400">Coupe de Printemps</div>
                                </div>
                                <div class="flex gap-2">
                                    <button class="px-2 py-1 bg-green-400 rounded-lg text-gray-900 text-xs font-bold hover:bg-green-300">✓</button>
                                    <button class="px-2 py-1 bg-red-900 rounded-lg text-red-400 text-xs font-bold hover:bg-red-800">✗</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Prochains matchs -->
                    <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base font-bold text-white">Prochains Matchs</h3>
                            <a href="#" class="text-xs text-green-400 no-underline">+ Planifier</a>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div class="bg-gray-700 rounded-xl p-3">
                                <div class="text-xs text-gray-400 mb-2">📅 08/03/2026 • 15h00</div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-white font-medium">FC Casa</span>
                                    <span class="text-green-400 font-bold text-xs">VS</span>
                                    <span class="text-sm text-white font-medium">Raja Fes</span>
                                </div>
                                <div class="text-xs text-gray-500 mt-1">📍 Stade Mohammed V</div>
                            </div>
                            <div class="bg-gray-700 rounded-xl p-3">
                                <div class="text-xs text-gray-400 mb-2">📅 10/03/2026 • 17h00</div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-white font-medium">Wydad</span>
                                    <span class="text-green-400 font-bold text-xs">VS</span>
                                    <span class="text-sm text-white font-medium">AS Salé</span>
                                </div>
                                <div class="text-xs text-gray-500 mt-1">📍 Complexe Sportif</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
</div>

</body>
</html>