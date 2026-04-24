<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $equipe->name_equipe }} — FootEvenT</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen">

  {{-- NAVBAR --}}
  <nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-10 py-4 bg-gray-900 border-b border-gray-800">
    <a href="{{ route('tournois.index') }}" class="flex items-center gap-3">
      <div class="w-8 h-8 bg-green-400 rounded-lg flex items-center justify-center">
        <svg class="w-5 h-5 fill-gray-950" viewBox="0 0 24 24">
          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 2c1.85 0 3.56.56 4.97 1.52L5.52 16.97A7.963 7.963 0 0 1 4 12c0-4.42 3.58-8 8-8zm0 16c-1.85 0-3.56-.56-4.97-1.52L18.48 7.03A7.963 7.963 0 0 1 20 12c0 4.42-3.58 8-8 8z"/>
        </svg>
      </div>
      <span class="font-bebas text-2xl text-green-400 tracking-widest">FootEvenT</span>
    </a>

    <div class="flex items-center gap-1">
      <a href="{{ route('equipes.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">← Équipes</a>
    </div>

    <div class="flex items-center gap-3">
      @if(!auth()->check())
        <a href="{{ route('auth.create') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 border border-gray-700 hover:border-gray-500 hover:text-gray-100 transition-colors">Connexion</a>
      @else
        <div class="flex items-center gap-3 bg-gray-800 border border-gray-700 rounded-xl px-4 py-2">
          <div class="w-7 h-7 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
            {{ substr(auth()->user()->firstname, 0, 1) }}
          </div>
          <div class="text-sm font-semibold leading-none">{{ auth()->user()->firstname }}</div>
        </div>
      @endif
    </div>
  </nav>

  <div class="pt-20 min-h-screen">
    <div class="bg-gray-800 border-b border-gray-700 px-10 py-10">
      <div class="max-w-5xl mx-auto flex items-center justify-between gap-8">

      <div class="flex items-center gap-6">
          <div class="w-20 h-20 rounded-2xl bg-gray-700 border border-gray-600 flex items-center justify-center font-bebas text-4xl text-green-400 flex-shrink-0 overflow-hidden">
            @if($equipe->image)
              <img src="{{ asset('storage/'.$equipe->image) }}" class="w-full h-full object-cover">
            @else
              {{ substr($equipe->name_equipe, 0, 1) }}
            @endif
          </div>

          <div>
            
            <div class="flex flex-wrap gap-2 mb-2">
              @foreach($equipe->tournois as $tournoi)
                <span class="text-xs bg-gray-700 text-gray-300 border border-gray-600 px-2.5 py-1 rounded-full">
                  {{ $tournoi->name_tournoi }}
                </span>
              @endforeach
            </div>

            <h1 class="font-bebas text-5xl text-white tracking-widest leading-none mb-2">
              {{ $equipe->name_equipe }}
            </h1>

            @if($equipe->description)
              <p class="text-gray-400 text-sm max-w-md leading-relaxed">{{ $equipe->description }}</p>
            @endif

            <div class="flex items-center gap-2 text-xs text-gray-400 mt-3">
              <div class="w-6 h-6 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">
                {{ strtoupper(substr($equipe->capitaine->firstname, 0, 1)) }}{{ strtoupper(substr($equipe->capitaine->lastname, 0, 1)) }}
              </div>
              <span>Capitaine : <span class="text-white font-medium">{{ $equipe->capitaine->firstname }} {{ $equipe->capitaine->lastname }}</span></span>
            </div>
          </div>
        </div>
        @if(auth()->check() && auth()->user()->id == $equipe->capitaine_id)
        <div class="items-end gap-4">
         <a href="{{route('equipes.edit',$equipe)}}"> <button type="submit" class="flex items-center px-3 py-3 bg-gray-400 rounded-xl text-gray-900 font-bold text-sm hover:bg-gray-300 transition-colors">
                  Modifier l'équipe
          </button>
         </a>
        </div>
        @endif
        <div class="flex flex-col items-end gap-4">
          <div class="flex gap-5">
            <div class="text-center">
              <div class="font-bebas text-3xl text-green-400 leading-none">{{ $joueurs->count() }}</div>
              <div class="text-xs text-gray-400 uppercase tracking-wide mt-1">Joueurs</div>
            </div>
            <div class="w-px bg-gray-700"></div>
            <div class="text-center">
              <div class="font-bebas text-3xl text-green-400 leading-none">{{ $tournois->count() }}</div>
              <div class="text-xs text-gray-400 uppercase tracking-wide mt-1">Tournois</div>
            </div>
          </div>

          @if(auth()->check() && auth()->user()->role->name == "Joueur")
            @if(!auth()->user()->joueur->activeJoueur() && !$isEnAttente)
              <form action="{{ route('equipes.join', $equipe) }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-2 px-6 py-3 bg-green-400 rounded-xl text-gray-900 font-bold text-sm hover:bg-green-300 transition-colors">
                  + Rejoindre l'équipe
                </button>
              </form>
            @elseif($isEnAttente)
              <span class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gray-700 border border-gray-600 text-gray-400 text-sm font-medium">
                <span class="w-2 h-2 rounded-full bg-yellow-400 animate-pulse"></span>
                Demande en attente
              </span>
            @else
              <span class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-green-950 border border-green-800 text-green-400 text-sm font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                Déjà membre
              </span>
            @endif
          @endif
        </div>
         
      </div>
    </div>

    <div class="max-w-5xl mx-auto px-10 py-10">

      <div class="flex items-center justify-between mb-6">
        <h2 class="font-bebas text-3xl text-white tracking-widest">Joueurs</h2>
        <span class="text-xs text-gray-500 bg-gray-800 border border-gray-700 px-3 py-1 rounded-full">
          {{ $equipe->joueurs->count() }} Joueurs
        </span>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($joueurs as $joueur)
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

          </div>
        @empty
          <div class="col-span-3 flex flex-col items-center justify-center py-16 text-center">
            <div class="w-16 h-16 bg-gray-800 border border-gray-700 rounded-full flex items-center justify-center text-3xl mb-4">👥</div>
            <p class="text-gray-400 text-sm">Aucun joueur pour l'instant.</p>
          </div>
        @endforelse
      </div>

    </div>
  </div>

</body>
</html>