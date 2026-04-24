<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profil Joueur</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@300;400;500;600;700&family=Barlow+Condensed:wght@700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-950 text-white min-h-screen">

<div class="max-w-3xl mx-auto px-5 py-10">

    <a href="{{route('joueurs.joueurs')}}"
       class="inline-flex items-center gap-2 text-sm text-gray-400 hover:text-green-400 transition mb-8">
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
            <path d="M9 2L4 7L9 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Retour
    </a>
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden mb-4 relative">
        <div class="h-[3px] bg-gradient-to-r from-green-700 to-green-400"></div>
        <span class="title-font absolute right-6 top-1/2 -translate-y-1/2 text-[90px] leading-none text-gray-800 select-none pointer-events-none">10</span>
        <div class="p-6 relative">

            <div class="flex items-center gap-6 mb-6">
                @if($joueur->image)
                    <img src="{{ asset('storage/'.$joueur->image) }}"
                         class="w-24 h-24 rounded-full object-cover border-2 border-green-500 flex-shrink-0">
                @else
                    <div class="w-24 h-24 rounded-full flex-shrink-0 flex items-center justify-center text-white text-4xl">
                        {{ substr($joueur->user->firstname, 0, 1) }}
                    </div>
                @endif
                <div class="flex-1 min-w-0">
                    <span class="inline-flex items-center gap-1.5 bg-green-950 text-green-400 text-xs font-bold tracking-widest uppercase px-3 py-1 rounded-full mb-3">
                        {{ $joueur->poste }}
                    </span>

                    <h1 class="title-font text-5xl leading-none mb-2">
                        {{ $joueur->user->firstname }}<br>
                        {{ $joueur->user->lastname }}
                    </h1>

                    <div class="flex items-center gap-2 text-sm text-gray-400">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none">
                            <path d="M6.5 1a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7ZM2 12c0-2.5 2-4 4.5-4s4.5 1.5 4.5 4" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
                        </svg>
                        {{ $joueur->user->email }}
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mb-5"></div>
            <div class="grid grid-cols-3 gap-3">
                <div class="bg-gray-950 border border-gray-800 rounded-xl p-3">
                    <p class="condensed text-[10px] font-bold tracking-widest uppercase text-gray-500 mb-1">Âge</p>
                    <p class="text-base font-semibold">{{ $joueur->age }} ans</p>
                </div>
                <div class="bg-gray-950 border border-gray-800 rounded-xl p-3">
                    <p class="condensed text-[10px] font-bold tracking-widest uppercase text-gray-500 mb-1">Poste</p>
                    <p class="text-base font-semibold capitalize">{{ $joueur->poste }}</p>
                </div>
                <div class="bg-gray-950 border border-gray-800 rounded-xl p-3">
                    <p class="condensed text-[10px] font-bold tracking-widest uppercase text-gray-500 mb-1">Statut</p>
                    <p class="text-base font-semibold text-green-400">Actif</p>
                </div>
            </div>

        </div>
    </div>
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
        <div class="h-[3px] bg-gradient-to-r from-green-700 to-green-400"></div>
        <div class="p-6">

            <p class="condensed text-[11px] font-bold tracking-widest uppercase text-gray-500 mb-4">Carrière</p>
            @forelse($joueur->equipes as $equipe)
                <div class="bg-gray-950 border border-gray-800 rounded-xl p-4 mb-3 flex items-center justify-between last:mb-0">
                    <div class="flex items-center gap-3">
                        @if($equipe->image)
                            <img src="{{ asset('storage/'.$equipe->image) }}"
                                 class="w-10 h-10 rounded-lg object-cover border border-gray-700 flex-shrink-0">
                        @else
                            <div class="w-10 h-10 rounded-lg flex-shrink-0 flex items-center justify-center text-white font-bold text-lg">
                                {{ substr($equipe->name_equipe, 0, 1) }}
                            </div>
                        @endif

                        <div>
                            <p class="text-sm font-semibold">{{ $equipe->name_equipe }}</p>
                            <p class="text-xs text-gray-500 capitalize">{{ $equipe->pivot->statut }}</p>
                        </div>
                    </div>

                    @if($equipe->pivot->statut == 'actif')
                        <span class="condensed text-[11px] font-bold tracking-wider uppercase bg-green-950 text-green-400 px-3 py-1 rounded-full">
                            active dans équipe
                        </span>
                    @else
                        <span class="condensed text-[11px] font-bold tracking-wider uppercase bg-gray-800 text-gray-400 px-3 py-1 rounded-full border border-gray-700">
                            Quitter équipe
                        </span>
                    @endif
                </div>
            @empty
                <div class="text-center py-10 text-gray-600 text-sm">
                    Aucune équipe trouvée
                </div>
            @endforelse
        </div>
    </div>
</div>
</body>
</html>