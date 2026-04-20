<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootEvenT — Dashboard Joueur</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white font-outfit min-h-screen">

<!-- NAV -->
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
        <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Matchs</a>
    </div>

    <div class="flex items-center gap-3">
        <!-- Notifications -->
        <div class="relative">
            <button class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:text-white border border-gray-700">🔔</button>
            @if($user->notifications && $user->notifications->count() > 0)
                <span class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full text-gray-900 text-xs font-bold flex items-center justify-center">
                    {{ $user->notifications->count() }}
                </span>
            @endif
        </div>

        <!-- User -->
        <div class="flex items-center gap-3 bg-gray-800 border border-gray-700 rounded-xl px-4 py-2">
            <div class="w-7 h-7 bg-green-400 rounded-full flex items-center justify-center text-gray-900 font-bold text-sm">
                {{ strtoupper(substr($user->firstname, 0, 1)) }}
            </div>
            <div>
                <div class="text-sm font-semibold leading-none">{{ $user->firstname }}</div>
                <div class="text-xs text-green-400 mt-0.5">Joueur</div>
            </div>
        </div>

        <!-- Logout -->
        <form action="{{ route('auth.destroy') }}" method="POST">
            @csrf
            <button type="submit" class="px-4 py-2 border border-gray-700 rounded-lg text-gray-400 text-sm hover:border-red-500 hover:text-red-400 transition-colors">
                Déconnexion
            </button>
        </form>
    </div>
</nav>

<!-- MAIN -->
<div class="pt-20 min-h-screen">

    @if(session('success'))
    <div class="px-10 pt-4">
        <div class="flex items-center gap-3 px-5 py-4 bg-green-950 border border-green-800 rounded-2xl">
            <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
            <p class="text-sm text-green-300 font-medium">{{ session('success') }}</p>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="px-10 pt-4">
        <div class="flex items-center gap-3 px-5 py-4 bg-red-950 border border-red-800 rounded-2xl">
            <svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            <p class="text-sm text-red-300 font-medium">{{ session('error') }}</p>
        </div>
    </div>
    @endif

    <!-- HEADER -->
    <div class="bg-gray-800 border-b border-gray-700 px-10 py-8">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm mb-1">Bon retour 👋</p>
                <h1 class="text-3xl font-bold text-white">{{ $user->firstname }} {{ $user->lastname }}</h1>
            </div>
            <div class="hidden md:flex gap-6">
                <div class="text-center">
                    <div class="font-bebas text-2xl text-green-400 leading-none">
                        {{ $joueur ? $joueur->equipes()->wherePivot('statut', 'actif')->count() : 0 }}
                    </div>
                    <div class="text-xs text-gray-400 uppercase tracking-wide mt-1">Équipe</div>
                </div>
                <div class="w-px bg-gray-700"></div>
                <div class="text-center">
                    <div class="font-bebas text-2xl text-green-400 leading-none">0</div>
                    <div class="text-xs text-gray-400 uppercase tracking-wide mt-1">Matchs</div>
                </div>
                <div class="w-px bg-gray-700"></div>
                <div class="text-center">
                    <div class="font-bebas text-2xl text-green-400 leading-none">0</div>
                    <div class="text-xs text-gray-400 uppercase tracking-wide mt-1">Buts</div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-10 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 flex flex-col gap-8">

                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-white">Mon Équipe</h2>
                            <span class="text-xs text-gray-500 bg-gray-700 px-3 py-1 rounded-full">
                                {{ $joueur->equipes()->wherePivot('statut', 'actif')->count() }} équipe
                            </span>
                    </div>
                        @if($chek)
                        @foreach($equipes as $equipe)
                        <div class="bg-gray-700 rounded-xl p-5 mb-3">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="font-bold text-white text-lg">{{ $equipe->name_equipe }}</h3>
                                <span class="text-xs text-green-400 bg-green-950 border border-green-800 px-2.5 py-1 rounded-full font-semibold">Actif</span>
                            </div>
                          @foreach($equipe->tournois as $tournoi)  
                            <p class="text-xs text-gray-400 mb-3">🏆 {{ $tournoi->name_tournoi }} statut : {{$tournoi->status}}</p>
                          @endforeach
                              <div class="flex items-center justify-between text-xs text-gray-400">
                                <span>👥 {{ $equipe->nbJoueur }} joueurs</span>
                                <div class="flex gap-2">
                                    <a href="{{ route('equipes.joueurs', $equipe) }}" class="px-3 py-1.5 rounded-lg border border-gray-600 text-gray-300 hover:border-green-600 hover:text-green-400 transition-colors">
                                        Voir joueurs
                                    </a>
                                    <form action="{{route('equipes.quitter',$equipe)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="px-3 py-1.5 rounded-lg border border-gray-600 text-gray-400 hover:border-red-600 hover:text-red-400 transition-colors">
                                            Quitter
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                        <div class="mt-4">
                            <p class="text-xs text-gray-500 uppercase tracking-widest mb-3">Demandes en attente</p>
                            @foreach($equipes as $equipe)
                            <div class="flex items-center justify-between bg-gray-700/50 rounded-xl px-4 py-3 mb-2">
                                <span class="text-sm text-gray-300">{{ $equipe->name_equipe }}</span>
                                <span class="text-xs text-yellow-400 bg-yellow-950 border border-yellow-800 px-2 py-0.5 rounded-full">En attente</span>
                            </div>
                            @endforeach
                        </div>

                        @if(!$active)
                        <div class="flex flex-col items-center justify-center py-12 text-center">
                            <div class="w-20 h-20 bg-gray-700 rounded-full flex items-center justify-center text-4xl mb-5">👥</div>
                            <h3 class="text-lg font-semibold text-white mb-2">Vous n'avez pas encore d'équipe</h3>
                            <p class="text-gray-400 text-sm max-w-sm leading-relaxed mb-8">
                                Créez votre propre équipe ou rejoignez une équipe existante pour participer aux tournois.
                            </p>
                            <div class="flex gap-3 flex-wrap justify-center">
                                <a href="{{ route('equipes.create') }}" class="flex items-center gap-2 px-6 py-3 bg-green-400 rounded-xl text-gray-900 font-bold text-sm hover:bg-green-300 transition-colors">
                                    + Créer une équipe
                                </a>
                                <a href="{{ route('equipes.index') }}" class="px-6 py-3 border border-gray-600 rounded-xl text-white text-sm font-medium hover:border-gray-400 transition-colors">
                                    Rejoindre une équipe
                                </a>
                            </div>
                        </div>
                        @endif
                </div>

                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-8">
                    <h2 class="text-xl font-bold text-white mb-6">Mes Prochains Matchs</h2>
                    <div class="flex flex-col items-center justify-center py-10 text-center">
                        <div class="w-16 h-16 bg-gray-700 rounded-full flex items-center justify-center text-3xl mb-4">📅</div>
                        <p class="text-gray-400 text-sm">Aucun match prévu pour le moment.</p>
                        <p class="text-gray-500 text-xs mt-1">Rejoignez une équipe pour voir vos matchs ici.</p>
                    </div>
                </div>

            </div>

            <div class="flex flex-col gap-6">
                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <h3 class="text-base font-bold text-white mb-5">Mon Profil</h3>
                    <div class="flex flex-col items-center text-center mb-5">
                        <div class="w-16 h-16 bg-green-400 rounded-full flex items-center justify-center text-gray-900 font-bold text-2xl mb-3">
                            {{ strtoupper(substr($user->firstname, 0, 1)) }}
                        </div>
                        <div class="font-semibold text-white">{{ $user->firstname }} {{ $user->lastname }}</div>
                        <div class="text-xs text-green-400 mt-1">Joueur</div>
                    </div>
                    <div class="flex flex-col gap-1 text-sm">
                        <div class="flex justify-between py-2 border-b border-gray-700">
                            <span class="text-gray-400">Poste</span>
                            <span class="text-white font-medium capitalize">{{ $joueur->poste }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-700">
                            <span class="text-gray-400">Âge</span>
                            <span class="text-white font-medium">{{ $joueur->age }} ans</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-400">Email</span>
                            <span class="text-white font-medium text-xs truncate max-w-32">{{ $user->email }}</span>
                        </div>
                         <a href="{{ route('joueurs.create') }}" class="w-full text-center px-4 py-2 bg-green-400 rounded-xl text-gray-900 text-sm font-semibold hover:bg-green-300 transition-colors">
                            Modifier
                        </a>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-2xl border border-gray-700 p-6">
                    <h3 class="text-base font-bold text-white mb-2">Tournois disponibles</h3>
                    <p class="text-gray-400 text-xs mb-5 leading-relaxed">Découvrez les tournois ouverts.</p>
                    <div class="flex flex-col gap-3 mb-5">
                        @forelse(\App\Models\Tournoi::where('status','en_attente')->take(3)->get() as $tournoi)
                        <div class="flex items-center gap-3 bg-gray-700 rounded-xl p-3">
                            <div class="w-9 h-9 bg-green-900 rounded-lg flex items-center justify-center text-base flex-shrink-0">⚽</div>
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-semibold text-white truncate">{{ $tournoi->name_tournoi }}</div>
                                <div class="text-xs text-gray-400">{{ $tournoi->lieu }} • {{ $tournoi->nbEquipes }} équipes</div>
                            </div>
                            <span class="text-xs text-green-400 font-bold bg-green-900 px-2 py-0.5 rounded-full flex-shrink-0">Ouvert</span>
                        </div>
                        @empty
                        <p class="text-xs text-gray-500 text-center py-4">Aucun tournoi disponible</p>
                        @endforelse
                    </div>
                    <a href="{{ route('tournois.index') }}" class="block text-center px-4 py-3 bg-green-400 rounded-xl text-gray-900 font-bold text-sm hover:bg-green-300 transition-colors">
                        Voir tous les tournois →
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>