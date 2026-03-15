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

  <!-- ─── Navbar ─── -->
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

    <!-- Errors -->
    @if($errors->any())
    <div class="flex gap-3 px-5 py-4 bg-red-950 border border-red-900 rounded-2xl mb-6">
      <div class="w-8 h-8 rounded-lg bg-red-900 border border-red-700 flex items-center justify-center flex-shrink-0">
        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </div>
      <div>
        <p class="text-sm text-red-300 font-medium mb-1">Corrigez les erreurs suivantes :</p>
        <ul class="list-disc list-inside space-y-0.5 text-xs text-red-400">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    </div>
    @endif

    <!-- ─── Form ─── -->
    <form method="POST" action="{{ route('tournois.update', $tournoi) }}" class="space-y-5">
      @csrf
      @method('PUT')

      <!-- Nom -->
      <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-3">
          Nom du tournoi <span class="text-green-400">*</span>
        </label>
        <input
          type="text"
          name="name_tournoi"
          value="{{ old('name_tournoi', $tournoi->name_tournoi) }}"
          placeholder="ex: Coupe du Printemps 2025"
          required
          class="w-full bg-gray-950 border text-gray-100 placeholder-gray-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all" />
      </div>

      <!-- Lieu -->
      <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-3">
          Lieu <span class="text-green-400">*</span>
        </label>
        <input
          type="text"
          name="lieu"
          value="{{ old('lieu', $tournoi->lieu) }}"
          placeholder="ex: Casablanca, Stade Ibn Batouta"
          required
          class="w-full bg-gray-950 border text-gray-100 placeholder-gray-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all
          {{ $errors->has('lieu') ? 'border-red-700' : 'border-gray-700' }}"
        />
        @error('lieu')
          <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>

      <!-- Dates -->
      <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-3">
          Dates <span class="text-green-400">*</span>
        </label>
        <div class="grid grid-cols-2 gap-4">
          <div>
            <p class="text-xs text-gray-500 mb-2">Début</p>
            <input
              type="date"
              name="date_debut"
              value="{{$tournoi->date_debut}}"
              required
              class="w-full bg-gray-950 border text-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all [color-scheme:dark]
              {{ $errors->has('date_debut') ? 'border-red-700' : 'border-gray-700' }}"
            />
            @error('date_debut')
              <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <p class="text-xs text-gray-500 mb-2">Fin</p>
            <input
              type="date"
              name="date_fin"
              value="{{$tournoi->date_fin }}"
              required
              class="w-full bg-gray-950 border text-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all [color-scheme:dark]
              {{ $errors->has('date_fin') ? 'border-red-700' : 'border-gray-700' }}"
            />
          </div>
        </div>
      </div>

      <!-- Format -->
      <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-3">
          Format <span class="text-green-400">*</span>
        </label>
        <div class="grid grid-cols-3 gap-3">

          <label class="cursor-pointer">
            <input type="radio" name="format" value="championnat" class="peer sr-only"
              {{ old('format', $tournoi->format) === 'championnat' ? 'checked' : '' }} />
            <div class="border border-gray-700 rounded-xl p-4 text-center transition-all peer-checked:border-blue-500 peer-checked:bg-blue-950/40">
              <div class="w-7 h-7 rounded-lg bg-blue-950 border border-blue-800 flex items-center justify-center mx-auto mb-2">
                <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
              </div>
              <p class="text-xs font-semibold text-gray-100 mb-0.5">Championnat</p>
              <p class="text-xs text-gray-500">Tous vs tous</p>
            </div>
          </label>

          <label class="cursor-pointer">
            <input type="radio" name="format" value="elimination" class="peer sr-only"
              {{ old('format', $tournoi->format) === 'elimination' ? 'checked' : '' }} />
            <div class="border border-gray-700 rounded-xl p-4 text-center transition-all peer-checked:border-red-500 peer-checked:bg-red-950/40">
              <div class="w-7 h-7 rounded-lg bg-red-950 border border-red-800 flex items-center justify-center mx-auto mb-2">
                <svg class="w-3.5 h-3.5 text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
              </div>
              <p class="text-xs font-semibold text-gray-100 mb-0.5">Élimination</p>
              <p class="text-xs text-gray-500">Perdant éliminé</p>
            </div>
          </label>

          <label class="cursor-pointer">
            <input type="radio" name="format" value="groupes" class="peer sr-only"
              {{ old('format', $tournoi->format) === 'groupes' ? 'checked' : '' }} />
            <div class="border border-gray-700 rounded-xl p-4 text-center transition-all peer-checked:border-amber-500 peer-checked:bg-amber-950/40">
              <div class="w-7 h-7 rounded-lg bg-amber-950 border border-amber-800 flex items-center justify-center mx-auto mb-2">
                <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
              </div>
              <p class="text-xs font-semibold text-gray-100 mb-0.5">Groupes</p>
              <p class="text-xs text-gray-500">Phase de poules</p>
            </div>
          </label>

        </div>

      </div>

      <!-- Statut -->
      <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-3">Statut</label>
        <div class="grid grid-cols-3 gap-3">

          <label class="cursor-pointer">
            <input type="radio" name="status" value="en_attente" class="peer sr-only"
              {{ old('status', $tournoi->status) === 'en_attente' ? 'checked' : '' }} />
            <div class="border border-gray-700 rounded-xl py-3 px-4 flex items-center gap-2.5 transition-all peer-checked:border-green-500 peer-checked:bg-green-950/40">
              <span class="w-2 h-2 rounded-full bg-green-400 flex-shrink-0"></span>
              <div>
                <p class="text-xs font-semibold text-gray-100">Ouvert</p>
                <p class="text-xs text-gray-500">Inscriptions</p>
              </div>
            </div>
          </label>

          <label class="cursor-pointer">
            <input type="radio" name="status" value="en_cours" class="peer sr-only"
              {{ old('status', $tournoi->status) === 'en_cours' ? 'checked' : '' }} />
            <div class="border border-gray-700 rounded-xl py-3 px-4 flex items-center gap-2.5 transition-all peer-checked:border-amber-500 peer-checked:bg-amber-950/40">
              <span class="w-2 h-2 rounded-full bg-amber-400 flex-shrink-0"></span>
              <div>
                <p class="text-xs font-semibold text-gray-100">En cours</p>
                <p class="text-xs text-gray-500">Matchs actifs</p>
              </div>
            </div>
          </label>

          <label class="cursor-pointer">
            <input type="radio" name="status" value="termine" class="peer sr-only"
              {{ old('status', $tournoi->status) === 'termine' ? 'checked' : '' }} />
            <div class="border border-gray-700 rounded-xl py-3 px-4 flex items-center gap-2.5 transition-all peer-checked:border-gray-500 peer-checked:bg-gray-800/60">
              <span class="w-2 h-2 rounded-full bg-gray-500 flex-shrink-0"></span>
              <div>
                <p class="text-xs font-semibold text-gray-100">Terminé</p>
                <p class="text-xs text-gray-500">Clôturé</p>
              </div>
            </div>
          </label>

        </div>
      </div>

      <!-- Nb équipes -->
      <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-3">
          Nombre max d'équipes <span class="text-green-400">*</span>
        </label>
        <div class="grid grid-cols-4 gap-3 mb-3">
          @foreach([4, 8, 16, 32] as $n)
          <label class="cursor-pointer">
            <input type="radio" name="nbEquipes" value="{{ $n }}" class="peer sr-only"
              {{ old('nbEquipes', $tournoi->nbEquipes) == $n ? 'checked' : '' }} />
            <div class="border border-gray-700 rounded-xl py-3 text-center text-sm font-semibold text-gray-400 transition-all peer-checked:border-green-500 peer-checked:bg-green-950/40 peer-checked:text-green-400 hover:border-gray-500">
              {{ $n }}
            </div>
          </label>
          @endforeach
        </div>
        <p class="text-xs text-gray-500 mb-2">Personnalisé :</p>
        <input
          type="number"
          name="nbEquipes_custom"
          min="2" max="64"
          placeholder="Entre 2 et 64"
          value="{{ !in_array($tournoi->nbEquipes, [4,8,16,32]) ? $tournoi->nbEquipes : '' }}"
          class="w-36 bg-gray-950 border border-gray-700 text-gray-100 placeholder-gray-600 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500 transition-all"
        />
        @error('nbEquipes')
          <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>

      <!-- ─── Actions ─── -->
      <div class="flex items-center justify-between pt-2">
        <a href="{{ route('tournois.show', $tournoi) }}"
           class="flex items-center gap-2 text-sm text-gray-400 hover:text-gray-200 transition-colors">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
          Annuler
        </a>
        <div class="flex items-center gap-3">
          <form method="POST" action="{{ route('tournois.destroy', $tournoi) }}"
                onsubmit="return confirm('Supprimer définitivement ce tournoi ?')">
            @csrf @method('DELETE')
            <button type="submit"
              class="flex items-center gap-2 px-4 py-3 rounded-xl border border-red-900 text-red-400 text-sm font-medium hover:bg-red-950 transition-colors">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
              Supprimer
            </button>
          </form>
          <button type="submit"
            class="flex items-center gap-2 px-8 py-3 bg-green-400 hover:bg-green-300 text-gray-950 font-semibold text-sm rounded-xl transition-colors">
            Sauvegarder
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </button>
        </div>
      </div>

    </form>
  </div>

</body>
</html>