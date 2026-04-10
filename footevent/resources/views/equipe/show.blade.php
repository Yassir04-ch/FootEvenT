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

  <section class="px-8 pt-10 pb-12">
    <!-- Card équipe -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden hover:border-green-800 transition-all duration-200 mb-8">
      <div class="h-1.5 bg-gradient-to-r from-green-900 to-green-500"></div>
      <div class="p-5">
        <div class="flex items-center justify-between mb-3">
          <span class="text-xs text-gray-400">{{ $equipe->joueurs->count() }} joueurs</span>
            <span class="text-xs text-gray-400">
                🏆 
                @foreach($tournois as $tournoi)
                    {{ $tournoi->name_tournoi }} 
                @endforeach
          </span> 
      </div>
        <h1 class="font-bebas text-4xl text-green-400 mb-2">{{ $equipe->name_equipe }}</h1>
        <p class="text-gray-400 text-sm mb-4">{{ $equipe->description }}</p>

       @if(auth()->check() && auth()->user()->role->name == "joueur")
         @if(!auth()->user()->joueur->activeJoueur() && !$isEnAttente)
            <form action="{{ route('equipes.join', $equipe) }}" method="POST" class="mb-4">
                @csrf
                <button type="submit" class="px-4 py-2 rounded-lg bg-green-400 text-gray-950 font-semibold hover:bg-green-300 transition-colors">
                    Rejoindre l'équipe
                </button>
            </form>
         @elseif($isEnAttente)
            <span class="inline-block px-4 py-2 rounded-lg bg-gray-700 text-gray-400 text-sm font-medium"> Demande en attente</span>
         @elseif(auth()->check() && !$isEnAttente)
            <span class="inline-block px-4 py-2 rounded-lg bg-gray-700 text-gray-400 text-sm font-medium">Vous étes déja membre</span>
         @endif
         @endif

        <!-- Capitaine -->
        <div class="flex items-center gap-2 text-xs text-gray-400 mt-3">
          <div class="w-6 h-6 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">
            {{ strtoupper(substr($equipe->capitaine->firstname , 0, 1)) }}{{ strtoupper(substr($equipe->capitaine->lastname ?? '', 0, 1)) }}
          </div>
          Capitaine: {{ $equipe->capitaine->firstname }} {{ $equipe->capitaine->lastname}}
        </div>
      </div>
    </div>

    <!-- Liste Joueurs -->
    <h2 class="font-bebas text-2xl text-green-400 mb-4">Joueurs</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      @forelse($joueurs as $joueur)
      <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 flex items-center gap-3 hover:border-green-800 transition-all duration-200">
        <div class="w-10 h-10 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold">
          {{ strtoupper(substr($joueur->user->firstname ?? 'X',0,1)) }}{{ strtoupper(substr($joueur->user->lastname ?? '',0,1)) }}
        </div>
        <div>
          <p class="text-sm font-medium">{{ $joueur->user->firstname }} {{ $joueur->user->lastname }}</p>
          <p class="text-xs text-gray-500">{{ $joueur->user->email }}</p>
        </div>
      </div>
      @empty
      <div class="col-span-3 text-gray-500 text-center py-10">Aucun joueur pour l'instant.</div>
      @endforelse
    </div>
  </section>
</body>
</html>