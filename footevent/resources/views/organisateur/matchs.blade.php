<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisateur — Matchs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white font-sans flex min-h-screen">

 <aside class="w-64 border-r border-white/5 flex flex-col fixed top-0 left-0 h-full z-40 glass-sidebar">
        <div class="px-8 py-8">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-9 h-9 bg-green-500 flex items-center justify-center rounded-lg rotate-12 shadow-[0_0_15px_rgba(34,197,94,0.3)]">
                    <span class="text-black font-black text-xl italic uppercase font-bebas">F</span>
                </div>
                <span class="text-2xl font-bebas tracking-widest uppercase italic">Foot<span class="text-green-500">EvenT</span></span>
            </div>
            <div class="flex items-center gap-2 px-1">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                <span class="text-[10px] text-gray-500 font-black uppercase tracking-[0.2em]">Organisateur Panel</span>
            </div>
        </div>

        <nav class="flex-1 px-4 flex flex-col gap-2">
            <p class="text-[10px] text-gray-600 font-black uppercase tracking-[0.3em] px-4 mb-2 italic">Menu Principal</p>
            
            <a href="{{ route('organisateur.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 text-sm font-bold hover:bg-white/5 hover:text-white transition-all group">
                <span class="group-hover:scale-125 transition-transform">📊</span> Dashboard
            </a>
            
            <a href="{{ route('organisateur.tournois') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 text-sm font-bold hover:bg-white/5 hover:text-white transition-all group">
                <span class="scale-125">🏆</span> Mes Tournois
            </a>
            
            <a href="" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-green-500/10 border border-green-500/20 text-green-500 text-sm font-bold shadow-lg shadow-green-500/5">
                <span class="group-hover:scale-125 transition-transform">⚽</span> Matchs
            </a>
        </nav>

        <div class="p-4 border-t border-white/5 space-y-3">
            <div class="flex items-center gap-3 bg-white/5 rounded-2xl p-3 border border-white/5">
                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-700 rounded-full flex items-center justify-center text-black font-black">
                    {{ strtoupper(substr(auth()->user()->firstname ?? 'K',0,1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-black text-white truncate italic uppercase">{{ auth()->user()->firstname ?? 'Organisateur' }}</p>
                    <p class="text-[9px] text-green-500 font-bold uppercase tracking-widest">Admin Mode</p>
                </div>
            </div>
            
            <form method="POST" action="{{ route('auth.destroy') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border border-red-500/20 text-red-500 text-[10px] font-black uppercase tracking-widest hover:bg-red-500 hover:text-white transition-all">
                    Déconnexion 
                </button>
            </form>
        </div>
    </aside>

<main class="ml-64 flex-1 flex flex-col">

    <div class="sticky top-0 z-30 flex justify-between items-center px-8 py-4 bg-gray-900 border-b border-gray-800">
        <h1 class="text-xl font-bold text-white">
            Mes Matchs ⚽
        </h1>
    </div>

    <div class="flex-1 px-8 py-8">

        @if(session('success'))
            <div class="mb-4 px-5 py-3 bg-green-950 border border-green-800 rounded-xl text-green-300">
                {{ session('success') }}
            </div>
        @endif

        @forelse($games as $game)

            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 mb-4 hover:border-green-700 transition">

                <div class="flex items-center justify-between mb-3">

                    <div class="text-lg font-bold text-white">
                        {{ $game->equipe1->name_equipe }}
                        <span class="text-gray-500 mx-2">VS</span>
                        {{ $game->equipe2->name_equipe }}
                    </div>
                  <div class="flex flex-col gap-3">

                    <span class="px-3 py-1 text-xs rounded-full font-bold bg-blue-900 text-blue-400">
                        {{ $game->statut }}
                    </span>

                    @if($game->statut == 'en_cours')
                        <a href="{{route('resultats.create',$game)}}" class="px-3 py-1.5 bg-green-400 rounded-lg text-gray-900 text-xs font-bold">
                            + Créer Resultat
                        </a>
                    @elseif($game->statut == 'termine')
                         <a href="{{route('games.show',$game)}}"  class="px-3 py-1.5 bg-yellow-400 rounded-lg text-gray-900 text-xs font-bold hover:bg-yellow-300">
                            voir Resultat
                        </a>
                    @else
                    <form action="{{route('games.demarer',$game)}}"  method="POST" >
                        @csrf
                        @method('put')
                        <button type="submit" class="px-3 py-1.5 bg-green-400 rounded-lg text-gray-900 text-xs font-bold">
                            Démarer Match
                        </button>
                    @endif
                </div>
                </div>

                <div class="text-sm text-gray-400 space-y-1">
                    <div>📅 Date: {{ $game->dateMatch }}</div>
                    <div>⏰ Heure: {{ $game->heure }}</div>
                    <div>📍 Terrain: {{ $game->terrain }}</div>
                    <div>🏆 Tournoi: {{ $game->tournoi->name_tournoi ?? 'N/A' }}</div>
                </div>

            </div>

        @empty
            <div class="text-center py-20 text-gray-500">
                Aucun match trouvé
            </div>
        @endforelse

    </div>

</main>

</body>
</html>