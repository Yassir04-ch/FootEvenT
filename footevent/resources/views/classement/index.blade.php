<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FootEvenT — Niveaux</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-gray-100 min-h-screen" style="font-family:'Outfit',sans-serif">

  <nav class="sticky top-0 z-50 flex items-center justify-between px-8 h-16 bg-gray-950/80 backdrop-blur border-b border-gray-800">
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 bg-green-400 rounded-lg flex items-center justify-center">
        <svg class="w-5 h-5 fill-gray-950" viewBox="0 0 24 24">
          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 2c1.85 0 3.56.56 4.97 1.52L5.52 16.97A7.963 7.963 0 0 1 4 12c0-4.42 3.58-8 8-8zm0 16c-1.85 0-3.56-.56-4.97-1.52L18.48 7.03A7.963 7.963 0 0 1 20 12c0 4.42-3.58 8-8 8z"/>
        </svg>
      </div>
      <span class="font-bebas text-2xl text-green-400 tracking-widest">FootEvenT</span>
    </div>

    <div class="flex items-center gap-1">
      <a href="{{ route('tournois.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Tournois</a>
      <a href="{{ route('equipes.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Équipes</a>
      <a href="{{ route('games.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Matchs</a>
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium bg-gray-800 text-gray-100">Classements</a>
    </div>

    <div class="w-32"></div>
  </nav>

  <div class="flex min-h-screen">

    <aside class="w-56 flex-shrink-0 bg-gray-900 border-r border-gray-800 pt-8">

      <p class="px-5 text-xs text-gray-600 uppercase tracking-widest font-medium mb-3">Niveaux</p>
      @if($tournoi->nbEquipes == 32)
      <a href="?niveau=groupe" class="flex items-center gap-3 px-5 py-3 border-l-2 transition-colors border-transparent text-gray-400 hover:bg-gray-800 hover:text-gray-100">
        <span class="w-2 h-2 rounded-full flex-shrink-0 bg-blue-400"></span>
        <span class="text-sm flex-1">Phase de groupe</span>
        <span class="text-xs bg-gray-800 text-gray-500 border border-gray-700 px-2 py-0.5 rounded-full">32</span>
      </a>
      @endif

      @if($tournoi->nbEquipes >= 16)
      <a href="?niveau=huitieme"
         class="flex items-center gap-3 px-5 py-3 border-l-2 transition-colors border-transparent text-gray-400 hover:bg-gray-800 hover:text-gray-100">
        <span class="w-2 h-2 rounded-full flex-shrink-0 bg-purple-400"></span>
        <span class="text-sm flex-1">1/8 de finale</span>
        <span class="text-xs bg-gray-800 text-gray-500 border border-gray-700 px-2 py-0.5 rounded-full">16</span>
      </a>
      @endif

      @if($tournoi->nbEquipes >= 8)
      <a href="?niveau=quart"
         class="flex items-center gap-3 px-5 py-3 border-l-2 transition-colors border-transparent text-gray-400 hover:bg-gray-800 hover:text-gray-100">
        <span class="w-2 h-2 rounded-full flex-shrink-0 bg-amber-400"></span>
        <span class="text-sm flex-1">Quarts de finale</span>
        <span class="text-xs bg-gray-800 text-gray-500 border border-gray-700 px-2 py-0.5 rounded-full">8</span>
      </a>
      @endif

      @if($tournoi->nbEquipes >= 4)
      <a href="?niveau=demi"
         class="flex items-center gap-3 px-5 py-3 border-l-2 transition-colors border-transparent text-gray-400 hover:bg-gray-800 hover:text-gray-100">
        <span class="w-2 h-2 rounded-full flex-shrink-0 bg-orange-400"></span>
        <span class="text-sm flex-1">Demi-finales</span>
        <span class="text-xs bg-gray-800 text-gray-500 border border-gray-700 px-2 py-0.5 rounded-full">4</span>
      </a>
      @endif

      <a href="?niveau=finale"
         class="flex items-center gap-3 px-5 py-3 border-l-2 transition-colors border-transparent text-gray-400 hover:bg-gray-800 hover:text-gray-100">
        <span class="w-2 h-2 rounded-full flex-shrink-0 bg-green-400"></span>
        <span class="text-sm flex-1">Finale</span>
        <span class="text-xs bg-gray-800 text-gray-500 border border-gray-700 px-2 py-0.5 rounded-full">2</span>
      </a>

      <div class="mx-5 my-5 border-t border-gray-800"></div>

      <p class="px-5 text-xs text-gray-600 uppercase tracking-widest font-medium mb-3">Tournoi</p>
      <div class="px-5">
        <p class="text-sm font-semibold text-gray-200">{{$tournoi->name_tournoi}} </p>
        <p class="text-xs text-gray-500 mt-1">{{$tournoi->nbEquipes}} équipes · {{$tournoi->status}} </p>
        <p class="text-xs text-gray-500">📍 {{$tournoi->lieu}}</p>
      </div>

    </aside>

    <main class="flex-1 p-8">

      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-green-950 border border-green-800 text-green-400 text-xs font-medium tracking-widest uppercase mb-5">
        <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
        {{$tournoi->name_tournoi}}
      </div>

      <h1 class="font-bebas text-7xl leading-none tracking-wide mb-3">
        <span class="text-green-400"> {{$tournoi->name_tournoi}} </span>
      </h1>

      <div class="grid grid-cols-3 gap-4 mb-8">
        <div class="bg-gray-900 border border-gray-800 rounded-2xl px-6 py-5">
          <div class="font-bebas text-4xl text-green-400 leading-none mb-1"></div>
          <div class="text-xs text-gray-500 uppercase tracking-widest">Au niveau</div>
        </div>
        <div class="bg-gray-900 border border-gray-800 rounded-2xl px-6 py-5">
          <div class="font-bebas text-4xl text-green-400 leading-none mb-1">heyy</div>
          <div class="text-xs text-gray-500 uppercase tracking-widest">Encore en jeu</div>
        </div>
        <div class="bg-gray-900 border border-gray-800 rounded-2xl px-6 py-5">
          <div class="font-bebas text-4xl text-gray-500 leading-none mb-1">hyyy</div>
          <div class="text-xs text-gray-500 uppercase tracking-widest">Éliminées</div>
        </div>
      </div>
      <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">

    @forelse($equipes as $equipe)

        <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden transition-all duration-200
                    {{ $equipe->pivot->statut === 'elimine' ? 'opacity-50' : 'hover:border-green-800 hover:-translate-y-1' }}">
          <div class="relative h-28 bg-gray-800 overflow-hidden flex items-center justify-center">
              <img src="{{ asset('storage/'.$equipe->image) }}" class="w-full h-full object-cover opacity-60">
              <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900"></div>
            <span class="absolute top-2.5 right-2.5 text-xs bg-black/50 border border-gray-700 rounded-full px-2.5 py-1 text-green-400">
              {{ $equipe->pivot->statut === 'eliminate' ? 'éliminée' : 'En jeu' }}
            </span>
          </div>

          <div class="h-0.5 bg-gradient-to-r from-green-600 to-green-400"></div>

          <div class="p-4">
            <h2 class="font-bebas text-xl tracking-wide leading-tight mb-1">{{ $equipe->name_equipe }}</h2>
            <div class="flex items-center gap-1.5">
              <span class="w-1.5 h-1.5 rounded-full bg-green-400"></span>
              <span class="text-xs text-green-400">
                niveauLabel
              </span>
            </div>
          </div>

          <div class="px-4 py-3 flex items-center justify-between border-t border-gray-800">
            <div class="flex items-center gap-2 text-xs text-gray-400">
              <div class="w-6 h-6 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">
                {{ substr($equipe->capitaine->firstname,0,1) }}{{ substr($equipe->capitaine->lastname,0,1) }}
              </div>
              {{ $equipe->capitaine->firstname }}
            </div>
            <a href="{{ route('equipes.show', $equipe) }}" class="flex items-center gap-1 text-xs font-medium px-3 py-1.5 rounded-lg border border-gray-700 text-gray-300 hover:border-green-600 hover:text-green-400 transition-colors">
              Voir
              <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
          </div>

        </div>

        @empty
        <div class="col-span-4 flex flex-col items-center justify-center py-24 text-gray-600">
          <svg class="w-16 h-16 mb-4 opacity-30" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/>
          </svg>
          <p class="font-bebas text-2xl tracking-wide">Aucune équipe à ce niveau</p>
        </div>
        @endforelse
      </div>
      </div>

    </main>
  </div>

</body>
</html>