<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootEvenT — Matchs</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0a0c10] text-gray-100 font-outfit min-h-screen bg-grid">

    <nav class="sticky top-0 z-50 flex items-center justify-between px-8 h-20 bg-black/60 backdrop-blur-xl border-b border-white/5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-500 skew-element flex items-center justify-center shadow-[0_0_15px_rgba(34,197,94,0.3)]">
                <span class="skew-inner text-black font-black text-xl italic uppercase">F</span>
            </div>
            <span class="font-bebas text-3xl text-white tracking-widest italic">Foot<span class="text-green-500">EvenT</span></span>
        </div>

        <div class="hidden md:flex items-center gap-2">
            <a href="{{route('tournois.index')}}" class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-white transition-all">Tournois</a>
            <a href="{{route('equipes.index')}}" class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-white transition-all">Équipes</a>
            <a href="#" class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest bg-green-500/10 text-green-500 border border-green-500/20">Matchs</a>
            <a href="{{route('joueurs.joueurs')}}" class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-white transition-all">Joueurs</a>
            @if(auth()->user())
            <a href="{{route('auth.profile')}}" class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-white transition-all">Profile</a>
            @endif
        </div>

        <div class="flex items-center gap-3">
            @if(!auth()->user())
                <a href="{{route('auth.create')}}" class="text-xs font-black uppercase tracking-[0.2em] hover:text-green-500 transition-colors italic">Connexion</a>
            @endif
        </div>
    </nav>

    <section class="px-8 pt-16 pb-12 flex flex-col lg:flex-row lg:items-end justify-between gap-10">
        <div class="max-w-2xl">
          <h1 class="font-bebas text-5xl md:text-6xl leading-none tracking-tight italic uppercase">
              Calendrier des<br>
              <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-emerald-600">Matchs</span>
          </h1>
      </div>

        <div class="flex-shrink-0 grid grid-cols-2 md:grid-cols-4 gap-1 bg-white/5 p-1 rounded-2xl border border-white/10 backdrop-blur-sm">
            <div class="px-6 py-4 text-center bg-white/5 rounded-xl">
                <div class="font-bebas text-4xl text-white leading-none mb-1">{{$gamepro}}</div>
                <div class="text-[8px] text-green-500 font-black uppercase tracking-widest">Programmés</div>
            </div>
            <div class="px-6 py-4 text-center">
                <div class="font-bebas text-4xl text-white leading-none mb-1">{{$gamecour}}</div>
                <div class="text-[8px] text-green-500 font-black uppercase tracking-widest">En cours</div>
            </div>
            <div class="px-6 py-4 text-center bg-white/5 rounded-xl">
                <div class="font-bebas text-4xl text-white leading-none mb-1">{{$gameter}}</div>
                <div class="text-[8px] text-green-500 font-black uppercase tracking-widest">Terminés</div>
            </div>
            <div class="px-6 py-4 text-center">
                <div class="font-bebas text-4xl text-white leading-none mb-1">{{$countMatch}}</div>
                <div class="text-[8px] text-green-500 font-black uppercase tracking-widest">Total</div>
            </div>
        </div>
    </section>

    <div class="px-8 pb-10 flex items-center gap-3 flex-wrap font-black">
        <a href="?" class="skew-element group">
            <span class="skew-inner px-6 py-2 text-[10px] uppercase tracking-widest border border-green-500 bg-green-500 text-black">Tous</span>
        </a>
        <a href="?statut=programme" class="skew-element group">
            <span class="skew-inner px-6 py-2 text-[10px] uppercase tracking-widest border border-white/10 bg-white/5 text-gray-400 group-hover:border-green-500 group-hover:text-white transition-all">Programmés</span>
        </a>
        <a href="?statut=en_cours" class="skew-element group">
            <span class="skew-inner px-6 py-2 text-[10px] uppercase tracking-widest border border-white/10 bg-white/5 text-gray-400 group-hover:border-green-500 group-hover:text-white transition-all">En cours</span>
        </a>
        <a href="?statut=termine" class="skew-element group">
            <span class="skew-inner px-6 py-2 text-[10px] uppercase tracking-widest border border-white/10 bg-white/5 text-gray-400 group-hover:border-green-500 group-hover:text-white transition-all">Terminés</span>
        </a>
    </div>

    <div class="px-8 pb-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($games as $game)
        <div class="group relative bg-[#11141b] border border-white/5 rounded-3xl overflow-hidden hover:border-green-500/40 transition-all duration-300">
            <div class="px-6 py-4 bg-white/5 flex items-center justify-between border-b border-white/5">
                <span class="text-[10px] font-black uppercase tracking-widest text-gray-500 italic">
                    🏆 {{$game->tournoi->name_tournoi}}
                </span>
                <span class="flex items-center gap-2 text-[10px] font-black uppercase tracking-tighter {{ $game->statut == 'en_cours' ? 'text-green-400 italic' : 'text-gray-400' }}">
                    @if($game->statut == 'en_cours')
                        <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse shadow-[0_0_8px_#4ade80]"></span>
                    @endif
                    {{$game->statut}}
                </span>
            </div>

            <div class="p-8 text-center relative">
                <div class="flex items-center justify-center gap-6">
                    <div class="flex-1 flex flex-col items-center">
                        <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center mb-3 border border-white/10 group-hover:scale-110 transition-transform">
                          @if($game->equipe1->image)
                              <img src="{{ asset('storage/' . $game->equipe1->image) }}" alt="{{ $game->equipe1->name_equipe }}" class="w-full h-full object-cover opacity-70">
                              <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-gray-900"></div>
                          @else
                             <span class="font-bebas text-2xl text-white">{{ substr($game->equipe1->name_equipe, 0, 2) }}</span>
                          @endif
                        </div>
                        <h4 class="font-bebas text-xl uppercase tracking-wide truncate w-full">{{$game->equipe1->name_equipe}}</h4>
                    </div>
                   
                    <div class="flex flex-col items-center">
                        @if($game->resultat)
                        <div class="bg-black/50 border border-white/10 px-3 py-1 rounded-md">
                            <span class="text-white tracking-widest">{{$game->resultat->scoreEq1}} - {{$game->resultat->scoreEq2}}</span>
                        @if($game->resultat->penaltyE1)
                            <p>penalty</p>
                            <span class="text-white tracking-widest">{{$game->resultat->penaltyE1}} - {{$game->resultat->penaltyE2}}</span>
                        @endif
                        </div>
                        @else
                        <div class="text-xs font-black text-green-500 italic mb-1 uppercase tracking-tighter">VS</div>
                        @endif
                    </div>

                    <div class="flex-1 flex flex-col items-center">
                         <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center mb-3 border border-white/10 group-hover:scale-110 transition-transform">
                          @if($game->equipe1->image)
                              <img src="{{ asset('storage/' . $game->equipe2->image) }}" alt="{{ $game->equipe2->name_equipe }}" class="w-full h-full object-cover opacity-70">
                              <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-gray-900"></div>
                          @else
                             <span class="font-bebas text-2xl text-white">{{ substr($game->equipe2->name_equipe, 0, 2) }}</span>
                          @endif
                        </div>
                        <h4 class="font-bebas text-xl uppercase tracking-wide truncate w-full">{{$game->equipe2->name_equipe}}</h4>
                    </div>
                </div>
            </div>

            <div class="px-8 pb-6 space-y-3">
                <div class="flex items-center justify-center gap-4 py-3 bg-black/30 rounded-2xl border border-white/5">
                    <div class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-gray-500">
                        <span class="text-green-500">📍</span> {{$game->terrain}}
                    </div>
                    <div class="w-[1px] h-3 bg-white/10"></div>
                    <div class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-gray-500">
                        <span class="text-green-500">⏰</span> {{$game->heure}}
                    </div>
                </div>
                <div class="text-center text-[10px] font-medium text-gray-400 tracking-[0.2em] uppercase">
                    {{$game->dateMatch}}
                </div>
            </div>
            <div class="p-4 bg-white/5 border-t border-white/5">
                <a href="{{route('games.show',$game)}}" class="flex items-center justify-center gap-2 w-full py-3 bg-white/5 hover:bg-green-500 hover:text-black transition-all rounded-xl text-[10px] font-black uppercase tracking-widest group/btn">
                    Voir les stats du match
                    <svg class="w-3 h-3 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>

</body>
</html>