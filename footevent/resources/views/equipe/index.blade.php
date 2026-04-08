<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FootEvenT — Équipes</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-gray-100 font-outfit min-h-screen">

  <!-- Navbar -->
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
      <a href="{{route('tournois.index')}}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Tournois</a>
      <a href="{{route('equipes.index')}}" class="px-4 py-2 rounded-lg text-sm font-medium bg-gray-800 text-gray-100">Équipes</a>
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Matchs</a>
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Classements</a>
    </div>

    <div class="flex items-center gap-3">
      @if(!auth()->check())
        <a href="{{route('auth.create')}}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 border border-gray-700 hover:border-gray-500 hover:text-gray-100 transition-colors">Connexion</a>
      @endif
      @if(auth()->check() && auth()->user()->role->name == "joueur")
        <a href="{{route('equipes.create')}}" class="px-4 py-2 rounded-lg text-sm font-semibold bg-green-400 text-gray-950 hover:bg-green-300 transition-colors">+ Créer une équipe</a>
      @endif
    </div>
  </nav>

  @if(session('success'))
  <div class="px-8 pt-4">
    <div class="flex items-center gap-3 px-5 py-4 bg-green-950 border border-green-800 rounded-2xl">
      <div class="w-8 h-8 rounded-lg bg-green-900 border border-green-700 flex items-center justify-center flex-shrink-0">
        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
        </svg>
      </div>
      <p class="text-sm text-green-300 font-medium flex-1">{{ session('success') }}</p>
    </div>
  </div>
  @endif

  @if(session('error'))
  <div class="px-8 pt-4">
    <div class="flex items-center gap-3 px-5 py-4 bg-red-950 border border-red-800 rounded-2xl">
      <div class="w-8 h-8 rounded-lg bg-red-900 border border-red-700 flex items-center justify-center flex-shrink-0">
        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </div>
      <p class="text-sm text-red-300 font-medium flex-1">{{ session('error') }}</p>
    </div>
  </div>
  @endif

  <!-- Hero -->
  <section class="px-8 pt-16 pb-10 flex items-end justify-between gap-8">
    <div>
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-green-950 border border-green-800 text-green-400 text-xs font-medium tracking-widest uppercase mb-5">
        <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
        Saison 2025 en cours
      </div>
      <h1 class="font-bebas text-7xl leading-none tracking-wide mb-4">
        Toutes les<br>
        <span class="text-green-400">Équipes</span>
      </h1>
      <p class="text-sm text-gray-400 font-light max-w-sm leading-relaxed">
        Retrouvez toutes les équipes inscrites sur la plateforme et suivez leurs performances.
      </p>
    </div>

    <div class="flex-shrink-0 grid grid-cols-2 divide-x divide-gray-800 border border-gray-800 rounded-2xl overflow-hidden">
      <div class="px-8 py-5 bg-gray-900 text-center">
        <div class="font-bebas text-4xl text-green-400 leading-none mb-1">{{ $equipes->count() }}</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">Équipes</div>
      </div>
      <div class="px-8 py-5 bg-gray-900 text-center">
        <div class="font-bebas text-4xl text-green-400 leading-none mb-1">{{ $equipes->sum('nbJoueur') }}</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">Joueurs</div>
      </div>
    </div>
  </section>

   <div class="px-8 pb-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @forelse($equipes as $equipe)
    @php $statut = $equipe->tournois->first()?->pivot->statut ?? null @endphp
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden hover:border-green-800 hover:-translate-y-1 transition-all duration-200">

      <div class="h-1.5 bg-gradient-to-r from-green-900 to-green-500">
      </div>

      <div class="p-5">
        <div class="flex items-center justify-between mb-3">

          <!-- Nb joueurs -->
          <span class="text-xs text-gray-400 flex items-center gap-1">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/>
            </svg>
            {{ $equipe->joueurs->count()}} joueurs
          </span>
        </div>

        <!-- Nom -->
        <h2 class="font-bebas text-2xl tracking-wide leading-tight mb-2">{{ $equipe->name_equipe }}</h2>

            <p class="text-xs text-gray-500 mb-2">🏆 {{ $equipe->tournois->first()->name_tournoi }}</p>
 
            <p class="text-xs text-gray-400 leading-relaxed line-clamp-2">{{ $equipe->description }}</p>
       </div>      

      <!-- Footer -->
      <div class="px-5 py-3 flex items-center justify-between border-t border-gray-800">
        <div class="flex items-center gap-2 text-xs text-gray-400">
          <div class="w-6 h-6 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">
            {{ strtoupper(substr($equipe->capitaine->firstname ?? 'X', 0, 1)) }}{{ strtoupper(substr($equipe->capitaine->lastname ?? '', 0, 1)) }}
          </div>
          {{ $equipe->capitaine->firstname }} {{ $equipe->capitaine->lastname}}
        </div>
        <a href="{{ route('equipes.show', $equipe) }}" class="flex items-center gap-1 text-xs font-medium px-3 py-1.5 rounded-lg border border-gray-700 text-gray-300 hover:border-green-600 hover:text-green-400 transition-colors">
          Voir
          <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>
    @empty
    <div class="col-span-3 flex flex-col items-center justify-center py-24 text-gray-600">
      <svg class="w-16 h-16 mb-4 opacity-30" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/>
      </svg>
      <p class="font-bebas text-2xl tracking-wide">Aucune équipe pour l'instant</p>
      <p class="text-sm mt-1">Soyez le premier à créer une équipe !</p>
    </div>
    @endforelse
  </div>

</body>
</html>