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

    <aside class="w-64 bg-gray-950 border-r border-gray-800 flex flex-col fixed top-0 left-0 h-full z-40" style="background:#070a0f">
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

        <nav class="flex-1 px-4 py-6 flex flex-col gap-1">

            <div class="text-xs text-gray-600 uppercase tracking-widest px-3 mb-2">Principal</div>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">📊</span> Dashboard
            </a>
            <a href="{{route('admin.index')}}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">👤</span> Utilisateurs
                <span class="ml-auto bg-gray-700 text-gray-300 text-xs px-2 py-0.5 rounded-full">48</span>
            </a>
            <a href="" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-green-400 bg-opacity-10 border border-green-400 border-opacity-20 text-green-400 text-sm font-medium no-underline">
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
             <form method="POST" action="{{ route('auth.destroy') }}">
                @csrf
                 <button type="submit" class="px-5 py-2 border border-gray-600 rounded-lg text-gray-400 text-sm font-medium hover:border-red-500 hover:text-red-400">
                    Déconnexion
                </button>
            </form>
        </nav>

    </aside>

    <main class="ml-64 flex-1 flex flex-col">

        <div class="sticky top-0 z-30 flex items-center justify-between px-8 py-4 bg-gray-900 border-b border-gray-800">
            <div>
                <h1 class="text-xl font-bold text-white">Vue d'ensemble</h1>
                <p class="text-xs text-gray-400 mt-0.5">Samedi, 07 Mars 2026</p>
            </div>
             <div class="flex items-center gap-3">
                <div class="relative">
                    <button id="notif_btn" class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:text-white border border-gray-700">🔔</button>
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full text-gray-900 text-xs font-bold flex items-center justify-center">3</span>

                    <div id="notif_model" class="absolute hidden right-0 mt-2 w-80 bg-gray-900 border border-gray-800 rounded-2xl shadow-xl z-50">
                        <div class="px-5 py-4 border-b border-gray-800 flex items-center justify-between">
                            <p class="font-bold text-white">Notifications</p>
                            <button id="close_btn" class="text-gray-500 hover:text-white">✕</button>
                        </div>
                        <div class="divide-y divide-gray-800 max-h-80 overflow-y-auto">

                             <div class="divide-y divide-gray-800 max-h-80 overflow-y-auto">
                          @foreach($notifications as $notification)
                            <div class="px-5 py-4 hover:bg-gray-800 transition-colors flex items-start gap-3">
                                <div class="flex-1">
                                    <p class="text-sm text-white font-medium">{{$notification->message}}</p>
                                    <p class="text-xs text-gray-600 mt-1">{{$notification->created_at}}</p>
                                </div>
                            </div>
                         @endforeach
                        </div>

                        </div>
                    </div>
                </div>
                <a href="{{route('auth.edit')}}"><div class="w-9 h-9 bg-red-500 rounded-full flex items-center justify-center text-white font-bold text-sm">A</div></a>
            </div>
        </div>

         <div class="flex-1 px-8 py-8 overflow-y-auto">

             <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-400 text-sm">Tournois</span>
                     </div>
                    <div class="text-3xl font-bold text-white" style="font-family:'Bebas Neue',cursive">{{$tournois->count()}}</div>
                 </div>

                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-400 text-sm">Tournois En Attente</span>
                     </div>
                    <div class="text-3xl font-bold text-white" style="font-family:'Bebas Neue',cursive">{{$nbtournoisEnatente}}</div>
                 </div>

                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-400 text-sm">Tournois En Cours</span>
                     </div>
                    <div class="text-3xl font-bold text-white" style="font-family:'Bebas Neue',cursive">{{$nbtournoisEncours}}</div>
                 </div>

                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-400 text-sm">Tournois termine</span>
                     </div>
                    <div class="text-3xl font-bold text-white" style="font-family:'Bebas Neue',cursive">{{$nbtournoisTermine}}</div>
                 </div>

            </div>

                     <div class="flex items-center justify-between mb-6">
                        <h2 class="text-base font-bold text-white">Tournois</h2>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">

                            <thead>
                                <tr class="text-gray-400 text-xs uppercase tracking-wide border-b border-gray-700">
                                    <th class="text-left pb-3 font-medium">Tournoi</th>
                                    <th class="text-left pb-3 font-medium">Lieu</th>
                                    <th class="text-left pb-3 font-medium">Date début</th>
                                    <th class="text-left pb-3 font-medium">Date fin</th>
                                    <th class="text-left pb-3 font-medium">Équipes</th>
                                    <th class="text-left pb-3 font-medium">Status</th>
                                    <th class="text-left pb-3 font-medium">Action</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-700">
                            @foreach($tournois as $tournoi)
                            <tr class="hover:bg-gray-700/40 transition">

                                 <td class="py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-xs">
                                            {{ strtoupper(substr($tournoi->name_tournoi,0,1)) }}
                                        </div>
                                        <div>
                                            <div class="text-white font-medium">{{$tournoi->name_tournoi}}</div>
                                            <div class="text-gray-500 text-xs truncate max-w-xs">
                                                {{$tournoi->organisateur->firstname}} {{$tournoi->organisateur->lastname}}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                 <td class="py-4 text-gray-300">{{$tournoi->lieu}}</td>

                                 <td class="py-4 text-gray-300">{{$tournoi->date_debut}}</td>
                                <td class="py-4 text-gray-300">{{$tournoi->date_fin}}</td>

                                 <td class="py-4">
                                    <span class="bg-blue-900 text-blue-400 text-xs px-2 py-1 rounded-full">
                                        {{$tournoi->nbEquipes}}
                                    </span>
                                </td>

                                 <td class="py-4">
                                    <span class="text-xs px-2 py-1 rounded-full bg-gray-700 text-gray-300">
                                        {{$tournoi->status}}
                                    </span>
                                </td>

                               <td class="py-4">

                                    <div class="flex items-center gap-3">

                                         <a href="{{ route('tournois.show', $tournoi) }}" class="inline-flex items-center gap-1 text-xs font-medium px-3 py-1.5 rounded-lg border border-gray-700 text-gray-300 hover:border-green-500 hover:text-green-400 transition">
                                            Voir
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path d="M5 12h14M12 5l7 7-7 7"/>
                                            </svg>
                                          </a>

                                       <form action="{{ route('tournois.destroy', $tournoi) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this tournoi ?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="inline-flex items-center gap-1 text-xs font-medium px-3 py-1.5 rounded-lg border border-red-600 text-red-400 hover:bg-red-600 hover:text-white transition">
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
 
            
            </div>

             

        </div>
    </main>
</div>

<script src="{{asset('js/notification.js')}}"></script>
</body>
</html>