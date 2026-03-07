<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootEvenT — Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white" style="font-family:'Outfit',sans-serif">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gray-950 border-r border-gray-800 flex flex-col fixed top-0 left-0 h-full z-40" style="background:#070a0f">
        <!-- Logo -->
        <div class="px-6 py-6 border-b border-gray-800">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center text-base">⚽</div>
                <span class="text-xl text-green-400 tracking-widest" style="font-family:'Bebas Neue',cursive">FootEvenT</span>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                <span class="text-xs text-gray-400">Panel Administrateur</span>
            </div>
        </div>

        <!-- Nav -->
        <nav class="flex-1 px-4 py-6 flex flex-col gap-1">

            <div class="text-xs text-gray-600 uppercase tracking-widest px-3 mb-2">Principal</div>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-green-400 bg-opacity-10 border border-green-400 border-opacity-20 text-green-400 text-sm font-medium no-underline">
                <span class="text-base">📊</span> Dashboard
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">👤</span> Utilisateurs
                <span class="ml-auto bg-gray-700 text-gray-300 text-xs px-2 py-0.5 rounded-full">48</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">🏆</span> Tournois
                <span class="ml-auto bg-gray-700 text-gray-300 text-xs px-2 py-0.5 rounded-full">12</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">👥</span> Équipes
                <span class="ml-auto bg-gray-700 text-gray-300 text-xs px-2 py-0.5 rounded-full">36</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">⚽</span> Matchs
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">📊</span> Résultats
            </a>

            <div class="text-xs text-gray-600 uppercase tracking-widest px-3 mb-2 mt-4">Système</div>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">🔔</span> Notifications
                <span class="ml-auto bg-green-400 text-gray-900 text-xs px-2 py-0.5 rounded-full font-bold">3</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">⚙️</span> Paramètres
            </a>
        </nav>

        <!-- Admin info -->
        <div class="px-4 py-4 border-t border-gray-800">
            <div class="flex items-center gap-3 bg-gray-800 rounded-xl px-3 py-3">
                <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center text-white font-bold text-sm">A</div>
                <div class="flex-1 min-w-0">
                    <div class="text-sm font-semibold text-white truncate">Administrateur</div>
                    <div class="text-xs text-red-400">Super Admin</div>
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
                <h1 class="text-xl font-bold text-white">Vue d'ensemble</h1>
                <p class="text-xs text-gray-400 mt-0.5">Samedi, 07 Mars 2026</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative">
                    <button class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:text-white border border-gray-700">🔔</button>
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full text-gray-900 text-xs font-bold flex items-center justify-center">3</span>
                </div>
                <div class="w-9 h-9 bg-red-500 rounded-full flex items-center justify-center text-white font-bold text-sm">A</div>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="flex-1 px-8 py-8 overflow-y-auto">

            <!-- STATS CARDS -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-400 text-sm">Utilisateurs</span>
                        <div class="w-9 h-9 bg-blue-900 rounded-xl flex items-center justify-center text-lg">👤</div>
                    </div>
                    <div class="text-3xl font-bold text-white" style="font-family:'Bebas Neue',cursive">48</div>
                    <div class="text-xs text-green-400 mt-1">+5 ce mois</div>
                </div>

                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-400 text-sm">Tournois</span>
                        <div class="w-9 h-9 bg-green-900 rounded-xl flex items-center justify-center text-lg">🏆</div>
                    </div>
                    <div class="text-3xl font-bold text-white" style="font-family:'Bebas Neue',cursive">12</div>
                    <div class="text-xs text-green-400 mt-1">3 en cours</div>
                </div>

                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-400 text-sm">Équipes</span>
                        <div class="w-9 h-9 bg-purple-900 rounded-xl flex items-center justify-center text-lg">👥</div>
                    </div>
                    <div class="text-3xl font-bold text-white" style="font-family:'Bebas Neue',cursive">36</div>
                    <div class="text-xs text-yellow-400 mt-1">4 en attente</div>
                </div>

                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-400 text-sm">Matchs joués</span>
                        <div class="w-9 h-9 bg-orange-900 rounded-xl flex items-center justify-center text-lg">⚽</div>
                    </div>
                    <div class="text-3xl font-bold text-white" style="font-family:'Bebas Neue',cursive">124</div>
                    <div class="text-xs text-green-400 mt-1">+12 cette semaine</div>
                </div>

            </div>

            <!-- MIDDLE ROW -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

                <!-- USERS TABLE -->
                <div class="lg:col-span-2 bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-base font-bold text-white">Derniers Utilisateurs</h2>
                        <a href="#" class="text-xs text-green-400 hover:text-green-300 no-underline">Voir tous →</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="text-gray-400 text-xs uppercase tracking-wide border-b border-gray-700">
                                    <th class="text-left pb-3 font-medium">Utilisateur</th>
                                    <th class="text-left pb-3 font-medium">Rôle</th>
                                    <th class="text-left pb-3 font-medium">Statut</th>
                                    <th class="text-left pb-3 font-medium">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                <tr class="hover:bg-gray-700 hover:bg-opacity-30">
                                    <td class="py-3">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-xs">Y</div>
                                            <div>
                                                <div class="text-white font-medium">Youssef El Amrani</div>
                                                <div class="text-gray-500 text-xs">youssef@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3"><span class="bg-blue-900 text-blue-400 text-xs px-2 py-1 rounded-full">Joueur</span></td>
                                    <td class="py-3"><span class="bg-green-900 text-green-400 text-xs px-2 py-1 rounded-full">Actif</span></td>
                                    <td class="py-3">
                                        <div class="flex gap-2">
                                            <button class="text-xs text-gray-400 hover:text-yellow-400">✏️</button>
                                            <button class="text-xs text-gray-400 hover:text-red-400">🗑️</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-700 hover:bg-opacity-30">
                                    <td class="py-3">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-xs">K</div>
                                            <div>
                                                <div class="text-white font-medium">Karim Benzara</div>
                                                <div class="text-gray-500 text-xs">karim@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3"><span class="bg-green-900 text-green-400 text-xs px-2 py-1 rounded-full">Organisateur</span></td>
                                    <td class="py-3"><span class="bg-green-900 text-green-400 text-xs px-2 py-1 rounded-full">Actif</span></td>
                                    <td class="py-3">
                                        <div class="flex gap-2">
                                            <button class="text-xs text-gray-400 hover:text-yellow-400">✏️</button>
                                            <button class="text-xs text-gray-400 hover:text-red-400">🗑️</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-700 hover:bg-opacity-30">
                                    <td class="py-3">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center text-white font-bold text-xs">S</div>
                                            <div>
                                                <div class="text-white font-medium">Sara Moussaoui</div>
                                                <div class="text-gray-500 text-xs">sara@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3"><span class="bg-blue-900 text-blue-400 text-xs px-2 py-1 rounded-full">Joueur</span></td>
                                    <td class="py-3"><span class="bg-red-900 text-red-400 text-xs px-2 py-1 rounded-full">Désactivé</span></td>
                                    <td class="py-3">
                                        <div class="flex gap-2">
                                            <button class="text-xs text-gray-400 hover:text-yellow-400">✏️</button>
                                            <button class="text-xs text-gray-400 hover:text-red-400">🗑️</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-700 hover:bg-opacity-30">
                                    <td class="py-3">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-xs">M</div>
                                            <div>
                                                <div class="text-white font-medium">Mohamed Tazi</div>
                                                <div class="text-gray-500 text-xs">med@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3"><span class="bg-green-900 text-green-400 text-xs px-2 py-1 rounded-full">Organisateur</span></td>
                                    <td class="py-3"><span class="bg-green-900 text-green-400 text-xs px-2 py-1 rounded-full">Actif</span></td>
                                    <td class="py-3">
                                        <div class="flex gap-2">
                                            <button class="text-xs text-gray-400 hover:text-yellow-400">✏️</button>
                                            <button class="text-xs text-gray-400 hover:text-red-400">🗑️</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-700 hover:bg-opacity-30">
                                    <td class="py-3">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-pink-500 rounded-full flex items-center justify-center text-white font-bold text-xs">F</div>
                                            <div>
                                                <div class="text-white font-medium">Fatima Zohra</div>
                                                <div class="text-gray-500 text-xs">fatima@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3"><span class="bg-blue-900 text-blue-400 text-xs px-2 py-1 rounded-full">Joueur</span></td>
                                    <td class="py-3"><span class="bg-green-900 text-green-400 text-xs px-2 py-1 rounded-full">Actif</span></td>
                                    <td class="py-3">
                                        <div class="flex gap-2">
                                            <button class="text-xs text-gray-400 hover:text-yellow-400">✏️</button>
                                            <button class="text-xs text-gray-400 hover:text-red-400">🗑️</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- RIGHT PANEL -->
                <div class="flex flex-col gap-5">

                    <!-- Tournois actifs -->
                    <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base font-bold text-white">Tournois Actifs</h3>
                            <a href="#" class="text-xs text-green-400 no-underline">Voir →</a>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 bg-green-400 rounded-full flex-shrink-0"></div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm text-white truncate">Championnat Regional 2026</div>
                                    <div class="text-xs text-gray-400">16 équipes • Casablanca</div>
                                </div>
                                <span class="text-xs text-green-400 bg-green-900 px-2 py-0.5 rounded-full">Live</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 bg-blue-400 rounded-full flex-shrink-0"></div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm text-white truncate">Coupe de Printemps</div>
                                    <div class="text-xs text-gray-400">12 équipes • Rabat</div>
                                </div>
                                <span class="text-xs text-blue-400 bg-blue-900 px-2 py-0.5 rounded-full">Ouvert</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 bg-yellow-400 rounded-full flex-shrink-0"></div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm text-white truncate">Tournoi de l'Été</div>
                                    <div class="text-xs text-gray-400">16 équipes • Marrakech</div>
                                </div>
                                <span class="text-xs text-yellow-400 bg-yellow-900 px-2 py-0.5 rounded-full">Bientôt</span>
                            </div>
                        </div>
                    </div>

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
                        </div>
                    </div>

                </div>
            </div>

            <!-- RECENT ACTIVITY -->
            <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                <h2 class="text-base font-bold text-white mb-5">Activité Récente</h2>
                <div class="flex flex-col gap-4">
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 bg-green-900 rounded-full flex items-center justify-center text-sm flex-shrink-0">✅</div>
                        <div class="flex-1">
                            <p class="text-sm text-white">Nouvel utilisateur inscrit — <span class="text-green-400">Youssef El Amrani</span></p>
                            <p class="text-xs text-gray-500 mt-0.5">Il y a 10 minutes</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 bg-blue-900 rounded-full flex items-center justify-center text-sm flex-shrink-0">🏆</div>
                        <div class="flex-1">
                            <p class="text-sm text-white">Nouveau tournoi créé — <span class="text-blue-400">Coupe de Printemps</span></p>
                            <p class="text-xs text-gray-500 mt-0.5">Il y a 1 heure</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 bg-yellow-900 rounded-full flex items-center justify-center text-sm flex-shrink-0">👥</div>
                        <div class="flex-1">
                            <p class="text-sm text-white">Équipe en attente de validation — <span class="text-yellow-400">FC Casablanca</span></p>
                            <p class="text-xs text-gray-500 mt-0.5">Il y a 2 heures</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 bg-red-900 rounded-full flex items-center justify-center text-sm flex-shrink-0">🚫</div>
                        <div class="flex-1">
                            <p class="text-sm text-white">Compte désactivé — <span class="text-red-400">Sara Moussaoui</span></p>
                            <p class="text-xs text-gray-500 mt-0.5">Il y a 3 heures</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 bg-green-900 rounded-full flex items-center justify-center text-sm flex-shrink-0">⚽</div>
                        <div class="flex-1">
                            <p class="text-sm text-white">Match terminé — <span class="text-green-400">FC Casa 2 - 1 Raja Fes</span></p>
                            <p class="text-xs text-gray-500 mt-0.5">Il y a 5 heures</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>

</body>
</html>