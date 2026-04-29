<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisateur — Mes Matchs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
</head>
<body class="bg-[#0a0c10] text-gray-100 font-outfit flex min-h-screen">

    <aside class="w-64 border-r border-white/5 flex flex-col fixed top-0 left-0 h-full z-40 glass-sidebar">
        <div class="px-8 py-8">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-9 h-9 bg-green-500 flex items-center justify-center rounded-lg rotate-12 shadow-[0_0_15px_rgba(34,197,94,0.3)]">
                    <span class="text-black font-black text-xl italic uppercase font-bebas">F</span>
                </div>
                <span class="text-2xl font-bebas tracking-widest uppercase italic">Foot<span class="text-green-500">EvenT</span></span>
            </div>
        </div>

        <nav class="flex-1 px-4 flex flex-col gap-2">
            <p class="text-[10px] text-gray-600 font-black uppercase tracking-[0.3em] px-4 mb-2 italic">Menu Principal</p>
            <a href="{{ route('organisateurs.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 text-sm font-bold hover:bg-white/5 hover:text-white transition-all group">
                <span class="group-hover:scale-125 transition-transform">📊</span> Dashboard
            </a>
            <a href="{{ route('organisateur.tournois') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 text-sm font-bold hover:bg-white/5 hover:text-white transition-all group">
                <span class="group-hover:scale-125 transition-transform">🏆</span> Mes Tournois
            </a>
            <a href="" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-green-500/10 border border-green-500/20 text-green-500 text-sm font-bold shadow-lg shadow-green-500/5">
                <span class="scale-125">⚽</span> Matchs
            </a>
            <a href="{{ route('rankings.index') }}"  class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 text-sm font-bold hover:bg-white/5 hover:text-white transition-all group">
                <span class="scale-125">⚽</span> Classement
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

    <main class="ml-64 flex-1 flex flex-col min-h-screen">
        <header class="sticky top-0 z-30 flex items-center justify-between px-10 py-6 bg-black/40 backdrop-blur-md border-b border-white/5">
            <div>
                <h2 class="text-xs font-black text-gray-500 uppercase tracking-[0.4em] mb-1 italic">Gestion Directe</h2>
                <h1 class="text-2xl font-black text-white italic uppercase tracking-tighter">Mes Matchs ⚽</h1>
            </div>
        </header>

        <div class="p-10">
            @if(session('success'))
                <div class="mb-8 flex items-center gap-4 px-6 py-4 bg-green-500/10 border-l-4 border-green-500 rounded-r-xl">
                    <p class="text-sm text-green-200 font-bold uppercase italic tracking-wide">{{ session('success') }}</p>
                </div>
            @endif

            <div class="grid grid-cols-1 gap-4">
                @forelse($games as $game)
                <div class="group bg-[#11141b] border border-white/5 rounded-3xl overflow-hidden hover:border-green-500/20 transition-all duration-300">
                    <div class="flex flex-col md:flex-row items-center p-6 gap-6">
                        
                        <div class="w-full md:w-48">
                            <span class="text-[8px] font-black text-green-500 uppercase tracking-[0.2em] block mb-1">Tournoi</span>
                            <h4 class="font-bebas text-lg text-white leading-none tracking-wide uppercase italic">{{ $game->tournoi->name_tournoi ?? 'N/A' }}</h4>
                        </div>

                        <div class="flex-1 flex items-center justify-center gap-4 md:gap-8 bg-black/20 py-4 px-8 rounded-2xl border border-white/5">
                            <div class="text-right flex-1">
                                <p class="font-bebas text-2xl text-white uppercase tracking-tighter">{{ $game->equipe1->name_equipe }}</p>
                                <p class="text-[9px] font-bold text-gray-500 uppercase">Domicile</p>
                            </div>
                            
                            <div class="flex flex-col items-center">
                                <span class="text-[10px] font-black text-green-500 italic">VS</span>
                                <div class="h-8 w-[1px] bg-white/10 my-1"></div>
                            </div>

                            <div class="text-left flex-1">
                                <p class="font-bebas text-2xl text-white uppercase tracking-tighter">{{ $game->equipe2->name_equipe }}</p>
                                <p class="text-[9px] font-bold text-gray-500 uppercase">Extérieur</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 md:flex md:flex-col gap-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">
                            <div class="flex items-center gap-2"><span class="text-green-500">📅</span> {{ $game->dateMatch }}</div>
                            <div class="flex items-center gap-2"><span class="text-green-500">⏰</span> {{ $game->heure }}</div>
                            <div class="flex items-center gap-2"><span class="text-green-500">📍</span> {{ $game->terrain }}</div>
                        </div>

                        <div class="w-full md:w-48 flex flex-col gap-2">
                            <div class="text-center mb-1">
                                <span class="px-3 py-1 text-[9px] rounded-full font-black uppercase tracking-widest {{ $game->statut == 'en_cours' ? 'bg-green-500/10 text-green-500' : 'bg-blue-500/10 text-blue-400' }}">
                                    {{ $game->statut }}
                                </span>
                            </div>

                            @if($game->statut == 'en_cours')
                                <a href="{{route('resultats.create',$game)}}" class="w-full py-2.5 bg-green-500 hover:bg-white text-black font-black text-[10px] uppercase tracking-widest text-center transition-all rounded-sm transform skew-x-[-12deg]">
                                    <span class="inline-block transform skew-x-[12deg]">+ Résultat</span>
                                </a>
                            @elseif($game->statut == 'termine')
                                <a href="{{route('games.show',$game)}}" class="w-full py-2.5 bg-yellow-500 hover:bg-yellow-400 text-black font-black text-[10px] uppercase tracking-widest text-center transition-all rounded-sm transform skew-x-[-12deg]">
                                    <span class="inline-block transform skew-x-[12deg]">Voir Score</span>
                                </a>
                            @else
                                <form action="{{route('games.demarer',$game)}}" method="POST">
                                    @csrf @method('put')
                                    <button type="submit" class="w-full py-2.5 bg-white hover:bg-green-500 text-black font-black text-[10px] uppercase tracking-widest transition-all rounded-sm transform skew-x-[-12deg]">
                                        <span class="inline-block transform skew-x-[12deg]">Démarrer</span>
                                    </button>
                                </form>
                            @endif
                        </div>

                    </div>
                </div>
                @empty
                <div class="py-20 text-center bg-white/5 rounded-3xl border border-dashed border-white/10">
                    <p class="text-gray-500 font-bold uppercase tracking-[0.3em] italic">Aucun match trouvé</p>
                </div>
                @endforelse
            </div>
        </div>
    </main>
</body>
</html>