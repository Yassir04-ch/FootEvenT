<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FootEvenT — {{ $equipe->name }}</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<style>
  .font-bebas { font-family: 'Bebas Neue', cursive; }
  .font-outfit { font-family: 'Outfit', sans-serif; }
</style>
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

    <div class="w-32"></div>
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

  <div class="px-8 pt-10 pb-16 max-w-4xl mx-auto">

    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 text-xs text-gray-500 mb-8">
      <a href="{{ route('equipes.index') }}" class="hover:text-green-400 transition-colors">Équipes</a>
      <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
      <span class="text-gray-300">{{ $equipe->name }}</span>
    </div>

    <!-- Header Card -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden mb-6">
      <div class="h-2 bg-gradient-to-r
        @if($equipe->status == 'validee') from-green-900 to-green-500
        @elseif($equipe->status == 'en_attente') from-yellow-900 to-yellow-500
        @else from-red-900 to-red-500 @endif">
      </div>
      <div class="p-8 flex items-start justify-between gap-6">
        <div>
          <!-- Status -->
          @if($equipe->status == 'validee')
            <span class="inline-block text-xs font-semibold px-2.5 py-1 rounded-full uppercase tracking-wider bg-green-950 text-green-400 border border-green-800 mb-4">✓ Validée</span>
          @elseif($equipe->status == 'en_attente')
            <span class="inline-block text-xs font-semibold px-2.5 py-1 rounded-full uppercase tracking-wider bg-yellow-950 text-yellow-400 border border-yellow-800 mb-4">⏳ En attente de validation</span>
          @else
            <span class="inline-block text-xs font-semibold px-2.5 py-1 rounded-full uppercase tracking-wider bg-red-950 text-red-400 border border-red-800 mb-4">✕ Refusée</span>
          @endif

          <h1 class="font-bebas text-5xl tracking-wide leading-none mb-3">{{ $equipe->name }}</h1>

          <div class="flex flex-wrap gap-x-5 gap-y-1 text-sm text-gray-400">
            @if($equipe->ville)
              <span class="flex items-center gap-1.5">📍 {{ $equipe->ville }}</span>
            @endif
            @if($equipe->categorie)
              <span class="flex items-center gap-1.5">🏷️ {{ ucfirst($equipe->categorie) }}</span>
            @endif
          </div>

          @if($equipe->description)
          <p class="mt-4 text-sm text-gray-400 font-light max-w-lg leading-relaxed">{{ $equipe->description }}</p>
          @endif
        </div>

        <!-- Capitaine -->
        <div class="flex-shrink-0 text-right">
          <p class="text-xs text-gray-500 uppercase tracking-widest mb-2">Capitaine</p>
          <div class="flex items-center gap-2 justify-end">
            <div>
              <p class="text-sm font-medium">{{ $equipe->user->firstname ?? '' }} {{ $equipe->user->lastname ?? '' }}</p>
              <p class="text-xs text-gray-500">{{ $equipe->user->email ?? '' }}</p>
            </div>
            <div class="w-10 h-10 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold">
              {{ strtoupper(substr($equipe->user->firstname ?? 'X', 0, 1)) }}{{ strtoupper(substr($equipe->user->lastname ?? '', 0, 1)) }}
            </div>
          </div>
        </div>
      </div>

      <!-- Admin actions -->
      @if(auth()->check() && auth()->user()->role->name == 'admin' && $equipe->status == 'en_attente')
      <div class="px-8 py-4 bg-gray-950/50 border-t border-gray-800 flex gap-3">
        <form action="{{ route('equipes.valider', $equipe) }}" method="POST">
          @csrf
          <button type="submit" class="px-5 py-2 rounded-xl text-sm font-semibold bg-green-950 border border-green-800 text-green-400 hover:bg-green-900 transition-colors">
            ✓ Valider l'équipe
          </button>
        </form>
        <form action="{{ route('equipes.refuser', $equipe) }}" method="POST">
          @csrf
          <button type="submit" class="px-5 py-2 rounded-xl text-sm font-semibold bg-red-950 border border-red-800 text-red-400 hover:bg-red-900 transition-colors">
            ✕ Refuser l'équipe
          </button>
        </form>
      </div>
      @endif

      <!-- Owner actions -->
      @if(auth()->check() && auth()->id() == $equipe->user_id)
      <div class="px-8 py-4 bg-gray-950/50 border-t border-gray-800 flex gap-3">
        <a href="{{ route('equipes.edit', $equipe) }}" class="px-5 py-2 rounded-xl text-sm font-medium border border-gray-700 text-gray-300 hover:border-green-600 hover:text-green-400 transition-colors">
          ✏️ Modifier
        </a>
        <form action="{{ route('equipes.destroy', $equipe) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
          @csrf @method('DELETE')
          <button type="submit" class="px-5 py-2 rounded-xl text-sm font-medium border border-gray-700 text-gray-400 hover:border-red-700 hover:text-red-400 transition-colors">
            🗑️ Supprimer
          </button>
        </form>
      </div>
      @endif
    </div>

    <!-- Joueurs -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
      <div class="px-6 py-4 border-b border-gray-800 flex items-center justify-between">
        <h2 class="font-bebas text-xl tracking-wide">Joueurs <span class="text-green-400">({{ $equipe->joueurs->count() }})</span></h2>
      </div>

      @if($equipe->joueurs && $equipe->joueurs->count() > 0)
      <div class="divide-y divide-gray-800">
        @foreach($equipe->joueurs as $joueur)
        <div class="px-6 py-4 flex items-center gap-4 hover:bg-gray-800/50 transition-colors">
          <div class="w-9 h-9 rounded-full bg-gray-800 border border-gray-700 flex items-center justify-center text-sm font-bold text-gray-300">
            {{ strtoupper(substr($joueur->firstname ?? 'J', 0, 1)) }}{{ strtoupper(substr($joueur->lastname ?? '', 0, 1)) }}
          </div>
          <div class="flex-1">
            <p class="text-sm font-medium">{{ $joueur->firstname ?? '' }} {{ $joueur->lastname ?? '' }}</p>
            @if($joueur->poste)
              <p class="text-xs text-gray-500">{{ $joueur->poste }}</p>
            @endif
          </div>
          @if($joueur->numero)
            <span class="font-bebas text-xl text-gray-500">#{{ $joueur->numero }}</span>
          @endif
        </div>
        @endforeach
      </div>
      @else
      <div class="flex flex-col items-center justify-center py-16 text-gray-600">
        <svg class="w-12 h-12 mb-3 opacity-30" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/>
        </svg>
        <p class="text-sm">Aucun joueur dans cette équipe</p>
      </div>
      @endif
    </div>

  </div>

</body>
</html>