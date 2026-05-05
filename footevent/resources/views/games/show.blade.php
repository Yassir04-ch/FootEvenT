<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Détail Match</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 text-gray-100 font-outfit min-h-screen">

<div class="px-8 py-10 max-w-4xl mx-auto">

    <a href="{{route('games.index')}}" class="text-[10px] font-black uppercase tracking-widest text-gray-500 hover:text-green-400 mb-8 inline-flex items-center gap-2 transition-colors">
        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path d="M19 12H5M12 5l-7 7 7 7"/>
        </svg>
        Retour
    </a>


    <div class="bg-[#11141b] border border-white/5 rounded-3xl overflow-hidden">

        <div class="h-[3px] bg-gradient-to-r from-green-900 to-green-500"></div>

        <div class="p-8">

            <div class="flex justify-between mb-5">
                @if($game->statut == 'en_cours')
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse shadow-[0_0_8px_#4ade80]"></span>
                        <span class="text-[10px] font-black uppercase tracking-widest text-green-400 italic">{{$game->statut}}</span>
                    </div>
                @elseif($game->statut == 'programme')
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-gray-500"></span>
                        <span class="text-[10px] font-black uppercase tracking-widest text-gray-500">{{$game->statut}}</span>
                    </div>
                @else
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-gray-600"></span>
                        <span class="text-[10px] font-black uppercase tracking-widest text-gray-600">{{$game->statut}}</span>
                    </div>
                @endif
            </div>

            <h2 class="font-bebas text-4xl italic uppercase tracking-tight mb-3">
                {{$game->tournoi->name_tournoi}}
            </h2>

            <p class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-1">
                <span class="text-green-500">📍</span> {{$game->terrain}}
            </p>
            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-8">
                📅 {{$game->dateMatch}} ⏰ {{$game->heure}}
            </p>


            <div class="flex items-center justify-between text-center mb-8 py-8 border-y border-white/5">

                <div class="flex-1 flex flex-col items-center gap-3">
                    <div class="w-16 h-16 rounded-full bg-white/5 border border-white/10 overflow-hidden flex items-center justify-center">
                        @if($game->equipe1->image)
                            <img src="{{ asset('storage/' . $game->equipe1->image) }}"
                                 alt="{{$game->equipe1->name_equipe}}"
                                 class="w-full h-full object-cover opacity-85">
                        @else
                            <span class="font-bebas text-xl text-white">{{ substr($game->equipe1->name_equipe, 0, 2) }}</span>
                        @endif
                    </div>
                    <h3 class="font-bebas text-xl uppercase tracking-wide">
                        {{$game->equipe1->name_equipe}}
                    </h3>
                </div>

                <div class="px-6 flex flex-col items-center gap-2">
                    @if($game->resultat)
                        <div class="bg-black/50 border border-white/10 px-5 py-2 rounded-xl">
                            <span class="font-bebas text-4xl text-green-400 tracking-widest">
                                {{$game->resultat->scoreEq1}} — {{$game->resultat->scoreEq2}}
                            </span>
                        </div>
                        @if($game->resultat->penaltyE1 !== null)
                            <div class="text-center bg-white/[0.03] border border-white/5 rounded-xl px-4 py-2">
                                <div class="text-[9px] font-black uppercase tracking-widest text-gray-600 mb-1">Pénaltys</div>
                                <span class="text-sm font-bold text-amber-400 tracking-widest">
                                    {{$game->resultat->penaltyE1}} — {{$game->resultat->penaltyE2}}
                                </span>
                            </div>
                        @endif
                    @else
                        <div class="text-sm font-black text-green-500 italic uppercase tracking-tighter">VS</div>
                    @endif
                </div>

                <div class="flex-1 flex flex-col items-center gap-3">
                    <div class="w-16 h-16 rounded-full bg-white/5 border border-white/10 overflow-hidden flex items-center justify-center">
                        @if($game->equipe2->image)
                            <img src="{{ asset('storage/' . $game->equipe2->image) }}"
                                 alt="{{$game->equipe2->name_equipe}}"
                                 class="w-full h-full object-cover opacity-85">
                        @else
                            <span class="font-bebas text-xl text-white">{{ substr($game->equipe2->name_equipe, 0, 2) }}</span>
                        @endif
                    </div>
                    <h3 class="font-bebas text-xl uppercase tracking-wide">
                        {{$game->equipe2->name_equipe}}
                    </h3>
                </div>

            </div>


            <div class="bg-black/40 border border-white/5 rounded-2xl p-6">

                @if($game->resultat)

                    <p class="text-[9px] font-black uppercase tracking-widest text-gray-600 mb-3">Résultat</p>

                    <p class="font-bebas text-3xl text-white mb-2 tracking-wide">
                        {{$game->resultat->scoreEq1}} — {{$game->resultat->scoreEq2}}
                    </p>

                    @if($game->resultat->penaltyE1 !== null)
                        <p class="text-[10px] font-bold text-amber-400/80 uppercase tracking-widest mb-3">
                            Pénaltys : {{$game->resultat->penaltyE1}} — {{$game->resultat->penaltyE2}}
                        </p>
                    @endif

                    <p class="flex items-center gap-2 text-green-400 font-bold text-sm">
                        @if($game->resultat->scoreEq1 > $game->resultat->scoreEq2)
                            🏆 {{$game->equipe1->name_equipe}} gagne
                        @elseif($game->resultat->scoreEq1 < $game->resultat->scoreEq2)
                            🏆 {{$game->equipe2->name_equipe}} gagne
                        @else
                            @if($game->resultat->penaltyE1 !== null)
                                @if($game->resultat->penaltyE1 > $game->resultat->penaltyE2)
                                    🏆 {{$game->equipe1->name_equipe}} gagne aux pénaltys
                                @else
                                    🏆 {{$game->equipe2->name_equipe}} gagne aux pénaltys
                                @endif
                            @endif
                        @endif
                    </p>
                @else
                    <p class="text-[9px] font-black uppercase tracking-widest text-gray-600 mb-2">Résultat</p>
                    <p class="text-sm text-gray-600 italic">Ce match n'a pas encore été joué.</p>
                @endif

            </div>

        </div>
    </div>

</div>

</body>
</html>