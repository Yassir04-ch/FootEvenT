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

    <aside class="w-64 border-r border-gray-800 flex flex-col fixed top-0 left-0 h-full z-40" style="background:#070a0f">
 
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


        <nav class="flex-1 px-4 py-6 flex flex-col gap-1">
            <div class="text-xs text-gray-600 uppercase tracking-widest px-3 mb-2">Principal</div>
            <a href="{{ route('organisateur.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-green-400 bg-opacity-10 border border-green-400 border-opacity-20 text-green-400 text-sm font-medium no-underline">
                <span class="text-base">📊</span> Dashboard
            </a>
            <a href="{{ route('organisateur.tournois') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">🏆</span> Mes Tournois
                <span class="ml-auto bg-gray-700 text-gray-300 text-xs px-2 py-0.5 rounded-full"> 10 </span>
            </a>
            <a href="{{route('organisateur.matchs')}}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">⚽</span> Matchs
            </a>
        </nav>
            <form method="POST" action="{{ route('auth.destroy') }}">
                @csrf
                 <button type="submit" class="px-5 py-2 border border-gray-600 rounded-lg text-gray-400 text-sm font-medium hover:border-red-500 hover:text-red-400">
                    Déconnexion
                </button>
            </form>

        <div class="px-4 py-4 border-t border-gray-800">
            <div class="flex items-center gap-3 bg-gray-800 rounded-xl px-3 py-3">
                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm">{{ substr(auth()->user()->firstname,0,1) }}</div>
                <div class="flex-1 min-w-0">
                    <div class="text-sm font-semibold text-white truncate">{{ auth()->user()->firstname }}</div>
                    <div class="text-xs text-green-400">Organisateur</div>
                </div>
            </div>
        </div>
    </aside>

    <main class="ml-64 flex-1 flex flex-col">

        <div class="sticky top-0 z-30 flex items-center justify-between px-8 py-4 bg-gray-900 border-b border-gray-800">
            <div>
                <h1 class="text-xl font-bold text-white">Bonjour, {{ auth()->user()->firstname}} 👋</h1>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('tournois.create') }}" class="flex items-center gap-2 px-5 py-2 bg-green-400 rounded-xl text-gray-900 font-bold text-sm hover:bg-green-300 no-underline">
                    + Créer un tournoi
                </a>

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
                <a href="{{route('auth.edit')}}"><div class="w-9 h-9 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm">{{ substr(auth()->user()->firstname,0,1)}}</div></a>
            </div>
            </div>
        </div>

        <div class="flex-1 px-8 py-8">

      <div class="grid grid-cols-2 lg:grid-cols-3 gap-5 mb-8">


       <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
            <span class="text-gray-400 text-sm">Mes Tournois</span>
            <div class="text-3xl font-bold">{{ $tournoicount }}</div>
        </div>

        <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
            <span class="text-gray-400 text-sm">En cours</span>
            <div class="text-3xl font-bold text-green-400">{{ $tournoiencourcount }}</div>
        </div>

        <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
            <span class="text-gray-400 text-sm">En attente</span>
            <div class="text-3xl font-bold text-yellow-400">{{ $tournoienattentcount }}</div>
        </div>

        <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
            <span class="text-gray-400 text-sm">Terminés</span>
            <div class="text-3xl font-bold text-red-400">{{ $tournoiterminecount }}</div>
        </div>

        
        <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
            <span class="text-gray-400 text-sm">Equipes</span>
            <div class="text-3xl font-bold text-blue-400">{{$equipecount}}</div>
        </div>

        <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
            <span class="text-gray-400 text-sm">Equipe En attente</span>
            <div class="text-3xl font-bold text-yellow-400">{{$equipeenattent}}</div>
        </div>
        
        </div>

    </div>
    </main>
</div>

<script src="{{asset('js/notification.js')}}"></script>
</body>
</html>