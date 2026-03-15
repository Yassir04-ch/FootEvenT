<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FootEvenT — Créer un tournoi</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          bebas: ['"Bebas Neue"', 'cursive'],
          outfit: ['Outfit', 'sans-serif'],
        }
      }
    }
  }
</script>
</head>
<body class="bg-gray-950 text-gray-100 font-outfit min-h-screen">

  <!-- ─── Navbar ─── -->
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
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Tournois</a>
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Équipes</a>
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Matchs</a>
    </div>
    <div class="flex items-center gap-2 text-sm text-gray-400">
      <div class="w-7 h-7 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">KA</div>
      Karim Alaoui
    </div>
  </nav>

  <!-- ─── Page layout ─── -->
  <div class="max-w-5xl mx-auto px-8 py-12">

    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 text-xs text-gray-500 mb-8">
      <a href="#" class="hover:text-green-400 transition-colors">Mes tournois</a>
      <span>/</span>
      <span class="text-gray-300">Créer un tournoi</span>
    </div>

    <!-- Header -->
    <div class="mb-10">
      <h1 class="font-bebas text-6xl tracking-wide leading-none mb-2">
        Créer un <span class="text-green-400">tournoi</span>
      </h1>
      <p class="text-sm text-gray-400 font-light">Remplissez les informations pour organiser votre compétition.</p>
    </div>

    <div class="grid grid-cols-3 gap-8">

      <form method="POST" action="{{route('tournois.store')}}" class="col-span-2 space-y-6">
        @csrf
        <!-- Errors -->
        <div class="bg-red-950 border border-red-900 text-red-400 text-sm rounded-xl px-4 py-3 hidden">
          <p class="font-medium mb-1">Corrigez les erreurs suivantes :</p>
          <ul class="list-disc list-inside space-y-0.5 text-xs"></ul>
        </div>

        <!-- Section : Informations générales -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 space-y-5">
          <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-widest">Informations générales</h2>

          <!-- Nom -->
          <div>
            <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-2">
              Nom du tournoi <span class="text-green-400">*</span>
            </label>
            <input
              type="text"
              name="name_tournoi"
              placeholder="ex: Coupe du Printemps 2025"
              class="w-full bg-gray-950 border border-gray-700 text-gray-100 placeholder-gray-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all"
            />
          </div>

          <!-- Description -->
            <div>
            <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-2">
                Description
            </label>
            <textarea
                name="description"
                rows="4"
                placeholder="ex: Tournoi annuel inter-clubs, ouvert à toutes les catégories..."
                class="w-full bg-gray-950 border border-gray-700 text-gray-100 placeholder-gray-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all resize-none"
            ></textarea>
            <p class="text-xs text-gray-600 mt-1.5">Optionnel — décrivez le contexte ou les règles du tournoi.</p>
            </div>

          <!-- Lieu -->
          <div>
            <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-2">
              Lieu <span class="text-green-400">*</span>
            </label>
            <input
              type="text"
              name="lieu"
              placeholder="ex: Casablanca, Stade Ibn Batouta"
              class="w-full bg-gray-950 border border-gray-700 text-gray-100 placeholder-gray-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all"
            />
          </div>

          <!-- Dates -->
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-2">
                Date de début <span class="text-green-400">*</span>
              </label>
              <input
                type="date"
                name="date_debut"
                class="w-full bg-gray-950 border border-gray-700 text-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all [color-scheme:dark]"
              />
            </div>
            <div>
              <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-2">
                Date de fin <span class="text-green-400">*</span>
              </label>
              <input
                type="date"
                name="date_fin"
                class="w-full bg-gray-950 border border-gray-700 text-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all [color-scheme:dark]"
              />
            </div>
          </div>
        </div>

        <!-- Section : Format -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 space-y-4">
          <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-widest">Format de compétition</h2>

          <div class="grid grid-cols-3 gap-3">

            <!-- Championnat -->
            <label class="relative cursor-pointer">
              <input type="radio" name="format" value="championnat" class="peer sr-only" checked />
              <div class="border border-gray-700 rounded-xl p-4 text-center transition-all
                          peer-checked:border-blue-500 peer-checked:bg-blue-950/40">
                <div class="w-8 h-8 rounded-lg bg-blue-950 border border-blue-800 flex items-center justify-center mx-auto mb-3">
                  <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                  </svg>
                </div>
                <p class="text-xs font-semibold text-gray-100 mb-1">Championnat</p>
                <p class="text-xs text-gray-500 leading-relaxed">Tous jouent contre tous</p>
              </div>
              <div class="absolute top-3 right-3 w-4 h-4 rounded-full border-2 border-gray-600 peer-checked:border-blue-400 peer-checked:bg-blue-400 transition-all hidden peer-checked:flex items-center justify-center">
                <svg class="w-2.5 h-2.5 text-gray-950" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              </div>
            </label>

            <!-- Élimination -->
            <label class="relative cursor-pointer">
              <input type="radio" name="format" value="elimination" class="peer sr-only" />
              <div class="border border-gray-700 rounded-xl p-4 text-center transition-all
                          peer-checked:border-red-500 peer-checked:bg-red-950/40">
                <div class="w-8 h-8 rounded-lg bg-red-950 border border-red-800 flex items-center justify-center mx-auto mb-3">
                  <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                  </svg>
                </div>
                <p class="text-xs font-semibold text-gray-100 mb-1">Élimination</p>
                <p class="text-xs text-gray-500 leading-relaxed">Perdant éliminé direct</p>
              </div>
            </label>

            <!-- Groupes -->
            <label class="relative cursor-pointer">
              <input type="radio" name="format" value="groupes" class="peer sr-only" />
              <div class="border border-gray-700 rounded-xl p-4 text-center transition-all
                          peer-checked:border-amber-500 peer-checked:bg-amber-950/40">
                <div class="w-8 h-8 rounded-lg bg-amber-950 border border-amber-800 flex items-center justify-center mx-auto mb-3">
                  <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                  </svg>
                </div>
                <p class="text-xs font-semibold text-gray-100 mb-1">Groupes</p>
                <p class="text-xs text-gray-500 leading-relaxed">Phase de poules</p>
              </div>
            </label>

          </div>
        </div>

        <!-- Section : Équipes -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 space-y-5">
          <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-widest">Équipes</h2>

          <div>
            <label class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-2">
              Nombre maximum d'équipes <span class="text-green-400">*</span>
            </label>
            <div class="grid grid-cols-4 gap-3">
              <label class="cursor-pointer">
                <input type="radio" name="nbEquipes" value="4" class="peer sr-only" />
                <div class="border border-gray-700 rounded-xl py-3 text-center text-sm font-semibold text-gray-400 transition-all peer-checked:border-green-500 peer-checked:bg-green-950/40 peer-checked:text-green-400 hover:border-gray-500">
                  4
                </div>
              </label>
              <label class="cursor-pointer">
                <input type="radio" name="nbEquipes" value="8" class="peer sr-only" checked />
                <div class="border border-green-500 bg-green-950/40 rounded-xl py-3 text-center text-sm font-semibold text-green-400 transition-all peer-checked:border-green-500 peer-checked:bg-green-950/40 peer-checked:text-green-400">
                  8
                </div>
              </label>
              <label class="cursor-pointer">
                <input type="radio" name="nbEquipes" value="16" class="peer sr-only" />
                <div class="border border-gray-700 rounded-xl py-3 text-center text-sm font-semibold text-gray-400 transition-all peer-checked:border-green-500 peer-checked:bg-green-950/40 peer-checked:text-green-400 hover:border-gray-500">
                  16
                </div>
              </label>
              <label class="cursor-pointer">
                <input type="radio" name="nbEquipes" value="32" class="peer sr-only" />
                <div class="border border-gray-700 rounded-xl py-3 text-center text-sm font-semibold text-gray-400 transition-all peer-checked:border-green-500 peer-checked:bg-green-950/40 peer-checked:text-green-400 hover:border-gray-500">
                  32
                </div>
              </label>
            </div>
          </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between pt-2">
          <a href="#" class="flex items-center gap-2 text-sm text-gray-400 hover:text-gray-200 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Annuler
          </a>
          <button
            type="submit"
            class="flex items-center gap-2 px-8 py-3 bg-green-400 hover:bg-green-300 text-gray-950 font-semibold text-sm rounded-xl transition-colors">
            Créer le tournoi
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </button>
        </div>

      </form>

      <!-- ─── Preview card (1/3) ─── -->
      <div class="col-span-1">
        <div class="sticky top-24">
          <p class="text-xs font-semibold text-gray-500 uppercase tracking-widest mb-3">Aperçu</p>
          <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
            <div class="h-1.5 bg-gradient-to-r from-blue-900 to-blue-600"></div>
            <div class="p-5">
              <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-semibold px-2.5 py-1 rounded-full uppercase tracking-wider bg-blue-950 text-blue-400 border border-blue-800">
                  Championnat
                </span>
                <span class="flex items-center gap-1.5 text-xs font-medium text-green-400">
                  <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
                  Ouvert
                </span>
              </div>
              <h3 class="font-bebas text-xl tracking-wide mb-2 text-gray-400">Nom du tournoi</h3>
              <div class="space-y-1 text-xs text-gray-500">
                <div>📍 Lieu</div>
                <div>📅 Date début → Date fin</div>
              </div>
            </div>
            <div class="px-5 py-3 bg-gray-950/50 border-t border-gray-800">
              <div class="flex justify-between text-xs mb-2">
                <span class="text-gray-500">Équipes</span>
                <span class="font-medium">0 / 8</span>
              </div>
              <div class="h-1 bg-gray-800 rounded-full"></div>
            </div>
            <div class="px-5 py-3 flex items-center gap-2 border-t border-gray-800">
              <div class="w-6 h-6 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">KA</div>
              <span class="text-xs text-gray-400">Karim Alaoui</span>
            </div>
          </div>

          <!-- Tips -->
          <div class="mt-6 space-y-3">
            <div class="flex gap-3 text-xs text-gray-500">
              <span class="w-5 h-5 rounded-full bg-green-950 border border-green-900 flex-shrink-0 flex items-center justify-center text-green-600 font-bold">1</span>
              <p>Choisissez un nom clair et mémorable pour attirer des équipes.</p>
            </div>
            <div class="flex gap-3 text-xs text-gray-500">
              <span class="w-5 h-5 rounded-full bg-green-950 border border-green-900 flex-shrink-0 flex items-center justify-center text-green-600 font-bold">2</span>
              <p>Le format <span class="text-gray-300">championnat</span> est idéal pour 8 équipes ou moins.</p>
            </div>
            <div class="flex gap-3 text-xs text-gray-500">
              <span class="w-5 h-5 rounded-full bg-green-950 border border-green-900 flex-shrink-0 flex items-center justify-center text-green-600 font-bold">3</span>
              <p>Vous pourrez valider les équipes inscrites avant le début.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</body>
</html>