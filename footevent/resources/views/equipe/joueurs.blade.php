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

  <nav class="sticky top-0 z-50 flex items-center justify-between px-10 h-20 border-b border-white/5 glass-nav">
      <a href="{{ route('tournois.index') }}" class="flex items-center gap-3">
        <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-green-500 skew-element flex items-center justify-center shadow-[0_0_15px_rgba(34,197,94,0.3)]">
            <span class="skew-inner text-black font-black text-xl italic uppercase">F</span>
        </div>
        <span class="font-bebas text-3xl text-white tracking-widest italic">Foot<span class="text-green-500">EvenT</span></span>
        </div>
      </a>
        <div class="flex items-center gap-2">
            <a href="{{ route('tournois.index') }}" class="px-5 py-2 rounded-xl text-[11px] font-black uppercase tracking-widest text-gray-400 hover:text-white transition-all">Tournois</a>
            <a href="{{ route('equipes.index') }}" class="px-5 py-2 rounded-xl text-[11px] font-black uppercase tracking-widest bg-green-500/10 text-green-500 border border-green-500/20 shadow-lg shadow-green-500/5">Équipes</a>
        </div>
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

    <div class="mb-8">
      <h1 class="font-bebas text-5xl tracking-wide leading-none mb-2">
        Joueurs de <span class="text-green-400">{{ $equipe->name_equipe }}</span>
      </h1>
      @if(auth()->check() && auth()->id() == $equipe->capitaine_id)
        <form action="{{ route('invitations.store', $equipe) }}" method="POST" class="flex items-center gap-2">
            @csrf
            <input type="email" name="email" placeholder="Email du joueur..."
                  class="px-4 py-2 bg-gray-800 border border-gray-700 text-white text-xs rounded-xl focus:outline-none focus:border-green-500 placeholder-gray-500 w-56"/>
            <button type="submit"
                    class="flex items-center gap-2 px-4 py-2 bg-green-500/10 border border-green-500/20 text-green-400 text-xs font-bold uppercase tracking-widest rounded-xl hover:bg-green-500/20 transition-colors whitespace-nowrap">
                + Inviter
            </button>
        </form>
      @endif
    </div>

    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden mb-6">
      <div class="px-6 py-4 border-b border-gray-800 flex items-center justify-between">
        <h2 class="font-bebas text-xl tracking-wide">Joueurs actifs <span class="text-green-400">({{ $joueursActifs->count() }})</span></h2>
      </div>

      @forelse($joueursActifs as $joueur)
       <div class="card-player bg-gray-800 border border-gray-700 rounded-2xl p-5 flex items-center gap-4">

           <div class="w-20 h-20 rounded-2xl bg-gray-700 border border-gray-600 flex items-center justify-center font-bebas text-4xl text-green-400 flex-shrink-0 overflow-hidden">
            @if($joueur->image)
              <img src="{{ asset('storage/'.$joueur->image) }}" class="w-full h-full object-cover">
            @else
              {{ substr($joueur->name_equipe, 0, 1) }}
            @endif
           </div>

            <div class="flex-1 min-w-0">
              <p class="text-sm font-semibold text-white truncate">
                {{ $joueur->user->firstname }} {{ $joueur->user->lastname }}
              </p>
              <p class="text-xs text-gray-500 truncate">{{ $joueur->user->email }}</p>
              @if($joueur->poste)
                <span class="inline-block text-xs text-green-400 bg-green-950 border border-green-900 px-2 py-0.5 rounded-full mt-1 capitalize">
                  {{ $joueur->poste }}
                </span>
              @endif
            </div>

            @if($joueur->user_id == $equipe->capitaine_id)
              <span class="text-xs text-yellow-400 bg-yellow-950 border border-yellow-800 px-2 py-1 rounded-full flex-shrink-0">
                Cap.
              </span>
            @endif

             @if(auth()->check() && auth()->id() == $equipe->capitaine_id && $joueur->user_id != $equipe->capitaine_id )
            <form action="{{ route('equipes.joueurs.retirer', [$equipe, $joueur]) }}" method="POST">
              @csrf
              @method('put')
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