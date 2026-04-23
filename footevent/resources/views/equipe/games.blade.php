<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootEvenT — Programme des Matchs</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-900 text-white font-outfit min-h-screen">

<nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-10 py-4 bg-gray-900 border-b border-gray-800">
    <a href="{{ route('tournois.index') }}" class="flex items-center gap-3">
        <div class="w-8 h-8 bg-green-400 rounded-lg flex items-center justify-center">
            <svg class="w-5 h-5 fill-gray-950" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 2c1.85 0 3.56.56 4.97 1.52L5.52 16.97A7.963 7.963 0 0 1 4 12c0-4.42 3.58-8 8-8zm0 16c-1.85 0-3.56-.56-4.97-1.52L18.48 7.03A7.963 7.963 0 0 1 20 12c0 4.42-3.58 8-8 8z"/>
            </svg>
        </div>
        <span class="font-bebas text-2xl text-green-400 tracking-widest">FootEvenT</span>
    </a>

    <div class="flex items-center gap-1">
        <a href="{{ route('tournois.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Tournois</a>
        <a href="{{ route('equipes.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Équipes</a>
        @if($equipe)
            <a href="{{ route('equipes.games', $equipe) }}" class="px-4 py-2 rounded-lg text-sm font-medium text-white bg-gray-800 transition-colors">Matchs</a>
            <a href="{{ route('equipes.classement', $equipe) }}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Equipe Classement</a>
        @endif
    </div>

    <div class="flex items-center gap-3">
        <div class="relative">
            <button id="notif_btn" class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:text-white border border-gray-700">🔔</button>
            <span class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full text-gray-900 text-xs font-bold flex items-center justify-center">{{ $notifications->count() }}</span>

            <div id="notif_model" class="absolute hidden right-0 mt-2 w-80 bg-gray-900 border border-gray-800 rounded-2xl shadow-xl z-50">
                <div class="px-5 py-4 border-b border-gray-800 flex items-center justify-between">
                    <p class="font-bold text-white">Notifications</p>
                    <button id="close_btn" class="text-gray-500 hover:text-white">✕</button>
                </div>
                <div class="divide-y divide-gray-800 max-h-80 overflow-y-auto">
                    @foreach($notifications as $notification)
                        <div class="px-5 py-4 hover:bg-gray-800 transition-colors flex items-start gap-3">
                            <div class="flex-1">
                                <p class="text-sm text-white font-medium">{{ $notification->message }}</p>
                                <p class="text-xs text-gray-600 mt-1">{{ $notification->created_at }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex items-center gap-3 bg-gray-800 border border-gray-700 rounded-xl px-4 py-2">
            <a href="{{ route('auth.edit') }}">
                <div class="w-9 h-9 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                    {{ substr(auth()->user()->firstname, 0, 1) }}
                </div>
            </a>
            <div>
                <div class="text-sm font-semibold leading-none">{{ auth()->user()->firstname }}</div>
                <div class="text-xs text-green-400 mt-0.5">Joueur</div>
            </div>
        </div>

        <form action="{{ route('auth.destroy') }}" method="POST">
            @csrf
            <button type="submit" class="px-4 py-2 border border-gray-700 rounded-lg text-gray-400 text-sm hover:border-red-500 hover:text-red-400 transition-colors">
                Déconnexion
            </button>
        </form>
    </div>
</nav>

<div class="pt-20 min-h-screen">

    <div class="bg-gray-800 border-b border-gray-700 px-10 py-8">
        <div class="max-w-5xl mx-auto flex items-center justify-between">
            <div>
                <div class="flex items-center gap-3 mb-1">
                    <p class="text-gray-400 text-sm">Programme des rencontres</p>
                </div>
                <h1 class="font-bebas text-4xl text-white tracking-widest">
                    Matchs — {{ $equipe->name_equipe ?? '' }}
                </h1>
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-10 py-10">
        @forelse($games as $game)
        <div class="match-card bg-gray-800 border border-gray-700 rounded-2xl p-5 mb-4">

            <div class="flex items-center gap-4 text-xs text-gray-500 uppercase tracking-wider mb-4">
                <span class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
                    </svg>
                    {{ $game->dateMatch }}
                </span>
                <span class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                    </svg>
                    {{ $game->heure }}
                </span>
            </div>
            <div class="flex items-center">
                <div class="flex-1 flex items-center gap-3">
                    @if($game->equipe1->image)
                        <img src="{{ asset('storage/'.$game->equipe1->image) }}"
                             class="w-10 h-10 rounded-xl object-cover bg-gray-700 flex-shrink-0">
                    @else
                        <div class="w-10 h-10 rounded-xl bg-gray-700 flex items-center justify-center text-green-400 font-bebas text-lg flex-shrink-0">
                            {{ substr($game->equipe1->name_equipe, 0, 1) }}
                        </div>
                    @endif
                    <span class="font-semibold text-white text-sm">{{ $game->equipe1->name_equipe }}</span>
                </div>

                <div class="flex-shrink-0 mx-4">
                    @if($game->resultat)
                        <div class="bg-green-400 text-gray-900 font-bebas text-2xl px-5 py-2 rounded-xl tracking-wider min-w-20 text-center">
                            {{ $game->resultat->scoreEq1 }} - {{ $game->resultat->scoreEq2 }}
                        </div>
                    @else
                        <div class="bg-gray-900 border border-gray-700 text-gray-400 font-bebas text-xl px-5 py-2 rounded-xl tracking-widest min-w-20 text-center">
                            VS
                        </div>
                    @endif
                </div>

                <div class="flex-1 flex items-center justify-end gap-3">
                    <span class="font-semibold text-white text-sm">{{ $game->equipe2->name_equipe }}</span>
                    @if($game->equipe2->image && $game->equipe2->image)
                        <img src="{{ asset('storage/'.$game->equipe2->image) }}"
                             class="w-10 h-10 rounded-xl object-cover bg-gray-700 flex-shrink-0">
                    @else
                        <div class="w-10 h-10 rounded-xl bg-gray-700 flex items-center justify-center text-green-400 font-bebas text-lg flex-shrink-0">
                            {{ substr($game->equipe2->name_equipe, 0, 1) }}
                        </div>
                    @endif
                </div>

            </div>

            @if($game->resultat->penaltyE1)
                <div class="mt-3 flex justify-center">
                    <span class="text-xs text-yellow-300 bg-yellow-950 border border-yellow-800 px-3 py-1 rounded-full font-semibold">
                        Tirs au but : {{ $game->resultat->penaltyE1 }} - {{ $game->resultat->penaltyE2 }}
                    </span>
                </div>
            @endif

            <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-700">
                <span class="text-xs text-gray-400 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                        <circle cx="12" cy="9" r="2.5"/>
                    </svg>
                    {{ $game->terrain }}
                </span>

                <span class="text-xs font-semibold px-3 py-1 rounded-full">
                    @if($game->statut === 'en_cours')
                        <span class="inline-block w-1.5 h-1.5 bg-green-400 rounded-full mr-1.5 animate-pulse"></span>
                    @endif
                    {{ $game->statut }}
                </span>
            </div>

        </div>
        @empty
        <div class="flex flex-col items-center justify-center py-20 text-center">
            <div class="w-20 h-20 bg-gray-800 border border-gray-700 rounded-full flex items-center justify-center text-4xl mb-5">
                📅
            </div>
            <h3 class="text-lg font-semibold text-white mb-2">Aucun match</h3>
        </div>
        @endforelse

        <div class="mt-6 flex justify-center">
            <a href="{{route('joueurs.index')}}" class="flex items-center gap-2 px-6 py-3 border border-gray-700 rounded-xl text-gray-400 text-sm font-medium hover:border-green-600 hover:text-green-400 transition-colors">
                ← Retour
            </a>
        </div>

    </div>
</div>

<script src="{{ asset('js/notification.js') }}"></script>
</body>
</html>