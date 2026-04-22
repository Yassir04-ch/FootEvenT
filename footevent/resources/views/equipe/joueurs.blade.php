<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FootEvenT — Joueurs</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-gray-100 font-outfit min-h-screen">

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
      <a href="{{ route('equipes.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium bg-gray-800 text-gray-100">Équipes</a>
    </div>
    <div class="w-32"></div>
  </nav>

  @if(session('success'))
  <div class="px-8 pt-4">
    <div class="flex items-center gap-3 px-5 py-4 bg-green-950 border border-green-800 rounded-2xl">
      <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
      </svg>
      <p class="text-sm text-green-300 font-medium">{{ session('success') }}</p>
    </div>
  </div>
  @endif

  @if(session('error'))
  <div class="px-8 pt-4">
    <div class="flex items-center gap-3 px-5 py-4 bg-red-950 border border-red-800 rounded-2xl">
      <svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
      </svg>
      <p class="text-sm text-red-300 font-medium">{{ session('error') }}</p>
    </div>
  </div>
  @endif

  <div class="px-8 pt-10 pb-16 max-w-4xl mx-auto">

    <div class="flex items-center gap-2 text-xs text-gray-500 mb-8">
      <a href="{{ route('equipes.index') }}" class="hover:text-green-400 transition-colors">Équipes</a>
      <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
      <a href="{{ route('equipes.show', $equipe) }}" class="hover:text-green-400 transition-colors">{{ $equipe->name_equipe }}</a>
      <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
      <span class="text-gray-300">Joueurs</span>
    </div>

    <div class="mb-8">
      <h1 class="font-bebas text-5xl tracking-wide leading-none mb-2">
        Joueurs de <span class="text-green-400">{{ $equipe->name_equipe }}</span>
      </h1>
      <p class="text-sm text-gray-400">{{ $equipe->nbJoueur }} joueurs</p>
    </div>

    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden mb-6">
      <div class="px-6 py-4 border-b border-gray-800 flex items-center justify-between">
        <h2 class="font-bebas text-xl tracking-wide">Joueurs actifs <span class="text-green-400">({{ $joueursActifs->count() }})</span></h2>
      </div>

      @forelse($joueursActifs as $joueur)
      <div class="px-6 py-4 flex items-center gap-4 border-b border-gray-800 hover:bg-gray-800/50 transition-colors">
        <div class="w-10 h-10 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold">
          {{ strtoupper(substr($joueur->user->firstname, 0, 1)) }}
        </div>
        <div class="flex-1">
          <p class="text-sm font-medium">{{ $joueur->user->firstname}} {{ $joueur->user->lastname}}</p>
          <p class="text-xs text-gray-500 capitalize">{{ $joueur->poste }} • {{ $joueur->age }} ans</p>
        </div>
        <span class="text-xs text-green-400 bg-green-950 border border-green-800 px-2.5 py-1 rounded-full font-semibold">Actif</span>

        @if(auth()->check() && auth()->id() == $equipe->capitaine_id)
        <form action="{{ route('equipes.joueurs.refuser', [$equipe, $joueur]) }}" method="POST">
          @csrf
          <button type="submit" class="text-xs px-3 py-1.5 rounded-lg border border-gray-700 text-gray-400 hover:border-red-700 hover:text-red-400 transition-colors">
            Retirer
          </button>
        </form>
        @endif
      </div>
      @empty
      <div class="flex flex-col items-center justify-center py-12 text-gray-600">
        <p class="text-sm">Aucun joueur actif</p>
      </div>
      @endforelse
    </div>

    @if(auth()->check() && auth()->id() == $equipe->capitaine_id)
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
      <div class="px-6 py-4 border-b border-gray-800">
        <h2 class="font-bebas text-xl tracking-wide">Demandes en attente <span class="text-yellow-400">({{ $joueursEnAttente->count() }})</span></h2>
      </div>

      @forelse($joueursEnAttente as $joueur)
      <div class="px-6 py-4 flex items-center gap-4 border-b border-gray-800 hover:bg-gray-800/50 transition-colors">
        <div class="w-10 h-10 rounded-full bg-yellow-950 border border-yellow-800 flex items-center justify-center text-yellow-400 font-bold">
          {{ strtoupper(substr($joueur->user->firstname, 0, 1)) }}
        </div>
        <div class="flex-1">
          <p class="text-sm font-medium">{{ $joueur->user->firstname}} {{ $joueur->user->lastname}}</p>
          <p class="text-xs text-gray-500 capitalize">{{ $joueur->poste }} • {{ $joueur->age }} ans</p>
        </div>
        <span class="text-xs text-yellow-400 bg-yellow-950 border border-yellow-800 px-2.5 py-1 rounded-full font-semibold">En attente</span>

        <div class="flex gap-2">
          <form action="{{ route('equipes.joueurs.valider', [$equipe, $joueur]) }}" method="POST">
            @csrf
            <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-green-950 border border-green-800 text-green-400 hover:bg-green-900 transition-colors">
              ✓ Valider
            </button>
          </form>
          <form action="{{ route('equipes.joueurs.refuser', [$equipe, $joueur]) }}" method="POST">
            @csrf
            <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-950 border border-red-800 text-red-400 hover:bg-red-900 transition-colors">
              ✕ Refuser
            </button>
          </form>
        </div>
      </div>
      @empty
      <div class="flex flex-col items-center justify-center py-12 text-gray-600">
        <p class="text-sm">Aucune demande en attente</p>
      </div>
      @endforelse
    </div>
    @endif

  </div>

</body>
</html>