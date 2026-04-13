<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FootEvenT — {{ $tournoi->name_tournoi }}</title>
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
      <a href="{{ route('tournois.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium bg-gray-800 text-gray-100">Tournois</a>
      <a href="{{ route('equipes.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Équipes</a>
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Matchs</a>
    </div>
    <div class="flex items-center gap-2 text-sm text-gray-400">
      @if(auth()->check())
        <div class="w-7 h-7 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">
          {{ strtoupper(substr(auth()->user()->firstname, 0, 1)) }}
        </div>
        {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
      @endif
    </div>
  </nav>

  @if(session('success'))
  <div class="px-8 pt-4">
    <div class="flex items-center gap-3 px-5 py-4 bg-green-950 border border-green-800 rounded-2xl">
      <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
      </svg>
      <p class="text-sm text-green-300 font-medium flex-1">{{ session('success') }}</p>
    </div>
  </div>
  @endif

  @if(session('error'))
  <div class="px-8 pt-4">
    <div class="flex items-center gap-3 px-5 py-4 bg-red-950 border border-red-800 rounded-2xl">
      <svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
      </svg>
      <p class="text-sm text-red-300 font-medium flex-1">{{ session('error') }}</p>
    </div>
  </div>
  @endif

  <div class="max-w-6xl mx-auto px-8 py-10">

    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 text-xs text-gray-500 mb-8">
      <a href="{{ route('tournois.index') }}" class="hover:text-green-400 transition-colors">Tournois</a>
      <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
      <span class="text-gray-300">{{ $tournoi->name_tournoi }}</span>
    </div>

    <!-- Header card -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden mb-6">
      <div class="h-1.5 bg-gradient-to-r from-blue-900 to-blue-600"></div>
      <div class="p-8">
        <div class="flex items-start justify-between gap-6">
          <div class="flex-1">
            <div class="flex items-center gap-3 mb-4">
              <span class="text-xs font-semibold px-2.5 py-1 rounded-full uppercase tracking-wider border bg-blue-950 text-blue-400 border-blue-800">
                {{ $tournoi->format ?? 'Championnat' }}
              </span>
              <span class="flex items-center gap-1.5 text-xs font-medium text-green-400">
                <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
                {{ $tournoi->status }}
              </span>
            </div>
            <h1 class="font-bebas leading-none tracking-wide mb-4" style="font-size:3.5rem">
              {{ $tournoi->name_tournoi }}
            </h1>
            <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-400">
              <span class="flex items-center gap-2">
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                {{ $tournoi->lieu }}
              </span>
              <span class="flex items-center gap-2">
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                {{ $tournoi->date_debut }} → {{ $tournoi->date_fin }}
              </span>
              <span class="flex items-center gap-2">
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                Organisé par {{ $tournoi->organisateur->firstname ?? 'N/A' }} {{ $tournoi->organisateur->lastname ?? '' }}
              </span>
            </div>
          </div>

          <!-- Actions organisateur -->
          @if(auth()->check() && auth()->id() == $tournoi->user_id)
          <div class="flex flex-col gap-2 flex-shrink-0">
            <a href="{{ route('tournois.edit', $tournoi) }}" class="flex items-center gap-2 px-4 py-2 rounded-xl border border-gray-700 text-sm text-gray-300 hover:border-green-600 hover:text-green-400 transition-colors">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
              Modifier
            </a>
            <a href="{{ route('tournoi.equipe', $tournoi) }}" class="flex items-center gap-2 px-4 py-2 rounded-xl bg-green-400 text-gray-950 text-sm font-semibold hover:bg-green-300 transition-colors">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Gérer équipes
              @if($equipesEnAttente->count() > 0)
                <span class="w-5 h-5 rounded-full bg-gray-950 text-green-400 text-xs font-bold flex items-center justify-center">{{ $equipesEnAttente->count() }}</span>
              @endif
            </a>
            <form action="{{ route('tournois.destroy', $tournoi) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
              @csrf @method('DELETE')
              <button type="submit" class="w-full flex items-center gap-2 px-4 py-2 rounded-xl border border-gray-700 text-sm text-gray-400 hover:border-red-700 hover:text-red-400 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                Supprimer
              </button>
            </form>
          </div>
          @endif
        </div>
      </div>
    </div>

    <!-- Stats bar -->
    <div class="grid grid-cols-4 gap-4 mb-6">
      <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 text-center">
        <div class="font-bebas text-3xl text-green-400 leading-none mb-1">{{ $equipesValidees->count() }}</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">Équipes validées</div>
      </div>
      <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 text-center">
        <div class="font-bebas text-3xl text-gray-100 leading-none mb-1">{{ $tournoi->nbEquipes }}</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">Places totales</div>
      </div>
      <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 text-center">
        <div class="font-bebas text-3xl text-amber-400 leading-none mb-1">{{ $tournoi->nbEquipes - $equipesValidees->count() }}</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">Places restantes</div>
      </div>
      <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 text-center">
        <div class="font-bebas text-3xl text-yellow-400 leading-none mb-1">{{ $equipesEnAttente->count() }}</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">En attente</div>
      </div>
    </div>

    <!-- Contenu principal -->
    <div class="grid grid-cols-3 gap-6">

      <!-- Colonne gauche : équipes -->
      <div class="col-span-2 space-y-3">

        <div class="flex items-center justify-between mb-2">
          <h2 class="text-sm font-semibold text-gray-400 uppercase tracking-widest">Équipes participantes</h2>
          <span class="text-xs text-gray-500">{{ $equipesValidees->count() }} / {{ $tournoi->nbEquipes }}</span>
        </div>

        <!-- Progress bar -->
        <div class="h-1.5 bg-gray-800 rounded-full overflow-hidden mb-4">
          <div class="h-full rounded-full bg-green-400" style="width:{{ $tournoi->nbEquipes > 0 ? ($equipesValidees->count() / $tournoi->nbEquipes) * 100 : 0 }}%"></div>
        </div>

        <!-- Équipes validées -->
        @forelse($equipesValidees as $i => $equipe)
        <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
          <div class="px-5 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-xl bg-gray-800 border border-gray-700 flex items-center justify-center font-bebas text-lg text-gray-300">
                {{ $i + 1 }}
              </div>
              <div>
                <p class="font-medium text-gray-100 text-sm">{{ $equipe->name_equipe }}</p>
                <p class="text-xs text-gray-500 mt-0.5">{{ $equipe->nbJoueur }} joueurs • Cap: {{ $equipe->capitaine->firstname ?? 'N/A' }}</p>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <span class="text-xs px-2.5 py-1 rounded-full bg-green-950 text-green-400 border border-green-800">Validée</span>
            </div>
          </div>
          <div id="eq{{ $equipe->id }}" class="hidden border-t border-gray-800 px-5 py-3 grid grid-cols-2 gap-2">
            @forelse($equipe->joueurs()->wherePivot('statut','actif')->with('user')->get() as $j => $joueur)
            <div class="flex items-center gap-2 text-xs text-gray-400">
              <span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">{{ $j + 1 }}</span>
              {{ $joueur->user->firstname ?? '' }} {{ $joueur->user->lastname ?? '' }}
            </div>
            @empty
            <p class="text-xs text-gray-600 col-span-2">Aucun joueur actif</p>
            @endforelse
          </div>
        </div>
        @empty
        <div class="bg-gray-900 border border-gray-800 rounded-2xl flex flex-col items-center justify-center py-12 text-gray-600">
          <p class="text-sm">Aucune équipe validée pour l'instant</p>
        </div>
        @endforelse

        <!-- Équipes en attente — organisateur seulement -->
        @if(auth()->check() && auth()->id() == $tournoi->user_id && $equipesEnAttente->count() > 0)
        <div class="mt-6">
          <h3 class="text-xs font-semibold text-amber-400 uppercase tracking-widest mb-3">
            En attente de validation ({{ $equipesEnAttente->count() }})
          </h3>
          @foreach($equipesEnAttente as $equipe)
          <div class="bg-gray-900 border border-amber-900/40 rounded-2xl px-5 py-4 flex items-center justify-between mb-2">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-xl bg-amber-950 border border-amber-800 flex items-center justify-center">
                <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
              </div>
              <div>
                <p class="font-medium text-gray-100 text-sm">{{ $equipe->name_equipe }}</p>
                <p class="text-xs text-gray-500 mt-0.5">{{ $equipe->nbJoueur }} joueurs • Cap: {{ $equipe->capitaine->firstname ?? 'N/A' }}</p>
              </div>
            </div>
            <div class="flex items-center gap-2">
              <form action="{{ route('tournois.equipes.valider', [$tournoi, $equipe]) }}" method="POST">
                @csrf
                <button type="submit" class="px-3 py-1.5 rounded-lg bg-green-400 text-gray-950 text-xs font-semibold hover:bg-green-300 transition-colors">✓ Valider</button>
              </form>
              <form action="{{ route('tournois.equipes.refuser', [$tournoi, $equipe]) }}" method="POST">
                @csrf
                <button type="submit" class="px-3 py-1.5 rounded-lg border border-red-900 text-red-400 text-xs font-medium hover:bg-red-950 transition-colors">✕ Refuser</button>
              </form>
            </div>
          </div>
          @endforeach
        </div>
        @endif

      </div>

      <!-- Colonne droite -->
      <div class="space-y-4">

        <!-- Infos tournoi -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
          <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-4">Informations</h3>
          <div class="space-y-3">
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Format</span>
              <span class="font-medium">{{ $tournoi->format ?? 'Championnat' }}</span>
            </div>
            <div class="h-px bg-gray-800"></div>
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Début</span>
              <span class="font-medium">{{ \Carbon\Carbon::parse($tournoi->date_debut)->format('d M Y') }}</span>
            </div>
            <div class="h-px bg-gray-800"></div>
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Fin</span>
              <span class="font-medium">{{ \Carbon\Carbon::parse($tournoi->date_fin)->format('d M Y') }}</span>
            </div>
            <div class="h-px bg-gray-800"></div>
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Équipes max</span>
              <span class="font-medium">{{ $tournoi->nbEquipes }}</span>
            </div>
            <div class="h-px bg-gray-800"></div>
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Statut</span>
              <span class="font-medium
                @if($tournoi->status == 'en_attente') text-green-400
                @elseif($tournoi->status == 'en_cours') text-blue-400
                @else text-gray-400 @endif">
                {{ $tournoi->status }}
              </span>
            </div>
          </div>
        </div>

        <!-- Organisateur -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
          <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-4">Organisateur</h3>
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold">
              {{ strtoupper(substr($tournoi->organisateur->firstname ?? 'X', 0, 1)) }}
            </div>
            <div>
              <p class="font-medium text-sm">{{ $tournoi->organisateur->firstname ?? 'N/A' }} {{ $tournoi->organisateur->lastname ?? '' }}</p>
              <p class="text-xs text-gray-500">{{ $tournoi->organisateur->email ?? '' }}</p>
            </div>
          </div>
        </div>

         @if(auth()->check() && auth()->user()->role->name == 'joueur')
          @if($monEquipe && !$dejaInscrit && $tournoi->status == 'en_attente')
            <form action="{{ route('tournois.join', $tournoi) }}" method="POST">
              @csrf
              <input type="hidden" name="equipe_id" value="{{ $monEquipe->id }}">
              <button type="submit" class="w-full py-3 rounded-xl bg-green-400 text-gray-950 font-semibold text-sm hover:bg-green-300 transition-colors">
                + Inscrire mon équipe
              </button>
            </form>
          @elseif($dejaInscrit)
            @if($statutInscription == 'en_attente')
              <div class="w-full py-3 rounded-xl bg-yellow-950 border border-yellow-800 text-yellow-400 text-sm font-semibold text-center">⏳ Demande en attente</div>
            @elseif($statutInscription == 'validee')
              <div class="w-full py-3 rounded-xl bg-green-950 border border-green-800 text-green-400 text-sm font-semibold text-center">✓ Inscrit</div>
            @else
              <div class="w-full py-3 rounded-xl bg-red-950 border border-red-800 text-red-400 text-sm font-semibold text-center">✕ Refusé</div>
            @endif
          @elseif(!$monEquipe)
            <a href="{{ route('equipes.create') }}" class="block w-full py-3 rounded-xl border border-gray-700 text-gray-400 text-sm text-center hover:border-green-600 hover:text-green-400 transition-colors">
              Créer une équipe d'abord
            </a>
          @endif
        @endif

         <a href="{{ route('tournois.index') }}" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-xl border border-gray-800 text-gray-500 text-xs hover:border-gray-600 hover:text-gray-300 transition-colors">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
          Retour aux tournois
        </a>

      </div>
    </div>
  </div>

</body>
</html>