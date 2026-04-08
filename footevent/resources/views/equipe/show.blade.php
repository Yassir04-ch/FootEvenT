 <!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $equipe->name_equipe }} — FootEvenT</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-gray-100 font-outfit min-h-screen">

  <!-- Navbar simplified -->
  <nav class="sticky top-0 z-50 flex items-center justify-between px-8 h-16 bg-gray-950/80 backdrop-blur border-b border-gray-800">
      <span class="font-bebas text-2xl text-green-400 tracking-widest">FootEvenT</span>
      <a href="{{ route('equipes.index') }}" class="text-sm text-gray-400 hover:text-gray-100">Retour aux équipes</a>
  </nav>

  <!-- Message success/error -->
  <div class="px-8 pt-4">
      @if(session('success'))
          <div class="px-5 py-4 bg-green-950 border border-green-800 rounded-2xl text-green-300">{{ session('success') }}</div>
      @endif
      @if(session('error'))
          <div class="px-5 py-4 bg-red-950 border border-red-800 rounded-2xl text-red-300">{{ session('error') }}</div>
      @endif
  </div>

  <!-- Hero équipe -->
  <section class="px-8 pt-10 pb-6">
      <h1 class="font-bebas text-5xl text-green-400 mb-2">{{ $equipe->name_equipe }}</h1>
      <p class="text-gray-400 mb-2">{{ $equipe->description }}</p>
      <p class="text-xs text-gray-500 mb-4">🏆 Tournoi: {{ $equipe->tournois->first()?->name_tournoi ?? '—' }}</p>

      <!-- Button rejoindre -->
      @if(auth()->check() && ! $equipe->joueurs->contains(auth()->user()->id))
      <form action="{{ route('equipes.index', $equipe->id) }}" method="POST" class="mb-6">
          @csrf
          <button type="submit" class="px-4 py-2 rounded-lg bg-green-400 text-gray-950 font-semibold hover:bg-green-300 transition-colors">
              Rejoindre l'équipe
          </button>
      </form>
      @elseif(auth()->check())
          <span class="inline-block px-4 py-2 rounded-lg bg-gray-700 text-gray-400 text-sm font-medium">Vous êtes déjà membre</span>
      @endif
  </section>

  <!-- Liste joueurs -->
  <section class="px-8 pb-12">
      <h2 class="font-bebas text-2xl text-green-400 mb-4">Joueurs</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          @forelse($equipe->joueurs as $joueur)
              <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 flex items-center gap-3 hover:border-green-800 transition-all">
                  <div class="w-10 h-10 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold">
                      {{ strtoupper(substr($joueur->firstname ?? 'X',0,1)) }}{{ strtoupper(substr($joueur->lastname ?? '',0,1)) }}
                  </div>
                  <div>
                      <p class="text-sm font-medium">{{ $joueur->firstname }} {{ $joueur->lastname }}</p>
                      <p class="text-xs text-gray-500">{{ $joueur->email }}</p>
                  </div>
              </div>
          @empty
              <p class="text-gray-500 col-span-3">Aucun joueur pour l'instant.</p>
          @endforelse
      </div>
  </section>

</body>
</html>