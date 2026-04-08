<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FootEvenT — Modifier {{ $tournoi->name_tournoi }}</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-gray-100 min-h-screen" style="font-family:'Outfit',sans-serif">

<!-- Navbar -->
<nav class="sticky top-0 z-50 flex items-center justify-between px-8 h-16 bg-gray-950/80 backdrop-blur border-b border-gray-800">
  <div class="flex items-center gap-3">
    <div class="w-9 h-9 bg-green-400 rounded-lg flex items-center justify-center">
      <svg class="w-5 h-5 fill-gray-950" viewBox="0 0 24 24">
        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 2c1.85 0 3.56.56 4.97 1.52L5.52 16.97A7.963 7.963 0 0 1 4 12c0-4.42 3.58-8 8-8zm0 16c-1.85 0-3.56-.56-4.97-1.52L18.48 7.03A7.963 7.963 0 0 1 20 12c0 4.42-3.58 8-8 8z"/>
      </svg>
    </div>
    <span class="text-2xl text-green-400 tracking-widest" style="font-family:'Bebas Neue',cursive">FootEvenT</span>
  </div>
  <div class="flex items-center gap-1">
    <a href="{{ route('tournois.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Tournois</a>
    <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Équipes</a>
    <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Matchs</a>
  </div>
  <div class="flex items-center gap-2 text-sm text-gray-400">
    <div class="w-7 h-7 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">
      {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
    </div>
    {{ auth()->user()->name }}
  </div>
</nav>

<div class="max-w-2xl mx-auto px-8 py-12">

  <!-- Breadcrumb -->
  <div class="flex items-center gap-2 text-xs text-gray-500 mb-8">
    <a href="{{ route('tournois.index') }}" class="hover:text-green-400 transition-colors">Tournois</a>
    <span>/</span>
    <a href="{{ route('tournois.show', $tournoi) }}" class="hover:text-green-400 transition-colors">{{ $tournoi->name_tournoi }}</a>
    <span>/</span>
    <span class="text-gray-300">Modifier</span>
  </div>

  <!-- Header -->
  <div class="mb-8">
    <h1 class="leading-none tracking-wide mb-2" style="font-family:'Bebas Neue',cursive;font-size:3.5rem">
      Modifier le <span class="text-green-400">tournoi</span>
    </h1>
    <p class="text-sm text-gray-400 font-light">Les modifications seront appliquées immédiatement.</p>
  </div>

  <form method="POST" action="{{ route('tournois.update', $tournoi) }}" class="space-y-5">
    @csrf
    @method('PUT')

    <!-- Nom -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
      <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-3">Nom du tournoi <span class="text-green-400">*</span></label>
      <input type="text" name="name_tournoi" value="{{ old('name_tournoi', $tournoi->name_tournoi) }}" placeholder="ex: Coupe du Printemps 2025" required
        class="w-full bg-gray-950 border text-gray-100 placeholder-gray-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all" />
    </div>

    <!-- Lieu -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
      <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-3">Lieu <span class="text-green-400">*</span></label>
      <input type="text" name="lieu" value="{{ old('lieu', $tournoi->lieu) }}" placeholder="ex: Casablanca, Stade Ibn Batouta" required
        class="w-full bg-gray-950 border text-gray-100 placeholder-gray-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all
        {{ $errors->has('lieu') ? 'border-red-700' : 'border-gray-700' }}" />
     </div>

    <!-- Dates -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
      <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-3">Dates <span class="text-green-400">*</span></label>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <p class="text-xs text-gray-500 mb-2">Début</p>
          <input type="date" name="date_debut" value="{{$tournoi->date_debut}}" required
            class="w-full bg-gray-950 border text-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all [color-scheme:dark]
            {{ $errors->has('date_debut') ? 'border-red-700' : 'border-gray-700' }}" />
          @error('date_debut')<p class="text-red-400 text-xs mt-2">{{ $message }}</p>@enderror
        </div>
        <div>
          <p class="text-xs text-gray-500 mb-2">Fin</p>
          <input type="date" name="date_fin" value="{{$tournoi->date_fin}}" required
            class="w-full bg-gray-950 border text-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all [color-scheme:dark]
            {{ $errors->has('date_fin') ? 'border-red-700' : 'border-gray-700' }}" />
        </div>
      </div>
    </div>

    <!-- Statut -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
      <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-3">Statut</label>
      <div class="grid grid-cols-3 gap-3">
        @foreach(['en_attente','en_cours','termine'] as $status)
        <label class="cursor-pointer">
          <input type="radio" name="status" value="{{ $status }}" class="peer sr-only"
            {{ old('status', $tournoi->status) == $status ? 'checked' : '' }} />
          <div class="border border-gray-700 rounded-xl py-3 px-4 flex items-center gap-2.5 transition-all
          peer-checked:border-{{ $status=='en_attente'?'green-500':($status=='en_cours'?'amber-500':'gray-500') }}
          peer-checked:bg-{{ $status=='en_attente'?'green-950/40':($status=='en_cours'?'amber-950/40':'gray-800/60') }}">
            <span class="w-2 h-2 rounded-full flex-shrink-0
            {{ $status=='en_attente'?'bg-green-400':($status=='en_cours'?'bg-amber-400':'bg-gray-500') }}"></span>
            <div>
              <p class="text-xs font-semibold text-gray-100">{{ $status }}</p>
            </div>
          </div>
        </label>
        @endforeach
      </div>
    </div>

    <!-- Nb équipes -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
      <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-3">Nombre max d'équipes <span class="text-green-400">*</span></label>
      <div class="grid grid-cols-4 gap-3 mb-3">
        @foreach([4, 8, 16, 32] as $n)
        <label class="cursor-pointer">
          <input type="radio" name="nbEquipes" value="{{ $n }}" class="peer sr-only"
            {{ old('nbEquipes', $tournoi->nbEquipes) == $n ? 'checked' : '' }} />
          <div class="border border-gray-700 rounded-xl py-3 text-center text-sm font-semibold text-gray-400 transition-all
          peer-checked:border-green-500 peer-checked:bg-green-950/40 peer-checked:text-green-400 hover:border-gray-500">{{ $n }}</div>
        </label>
        @endforeach
      </div>
    </div>

    <div class="flex items-center justify-between pt-2">
      <a href="{{ route('tournois.show', $tournoi) }}" class="flex items-center gap-2 text-sm text-gray-400 hover:text-gray-200 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        Annuler
      </a>
      <div class="flex items-center gap-3">
         <button type="submit" class="flex items-center gap-2 px-8 py-3 bg-green-400 hover:bg-green-300 text-gray-950 font-semibold text-sm rounded-xl transition-colors">
          Sauvegarder
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </button>
      </div>
    </div>
  </form>

</div>
</body>
</html>