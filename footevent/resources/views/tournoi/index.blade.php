<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FootEvenT — Tournois</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

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
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium bg-gray-800 text-gray-100">Tournois</a>
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Équipes</a>
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Matchs</a>
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Classements</a>
    </div>

    <div class="flex items-center gap-3">
    @if(!auth()->user())
      <a href="{{route('login')}}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 border border-gray-700 hover:border-gray-500 hover:text-gray-100 transition-colors">Connexion</a>
    @endif
      <a href="{{route('tournois.create')}}" class="px-4 py-2 rounded-lg text-sm font-semibold bg-green-400 text-gray-950 hover:bg-green-300 transition-colors">+ Nouveau tournoi</a>
    </div>
  </nav>

     @if(session('success'))
    <div class="px-8 pt-4">
    <div class="flex items-center gap-3 px-5 py-4 bg-green-950 border border-green-800 rounded-2xl">

        <div class="w-8 h-8 rounded-lg bg-green-900 border border-green-700 flex items-center justify-center flex-shrink-0">
        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
        </svg>
        </div>

        <p class="text-sm text-green-300 font-medium flex-1">
        {{ session('success') }}
        </p>

    </div>
    </div>
    @endif

  <!-- ─── Hero ─── -->
  <section class="px-8 pt-16 pb-10 flex items-end justify-between gap-8">
    <div>
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-green-950 border border-green-800 text-green-400 text-xs font-medium tracking-widest uppercase mb-5">
        <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
        Saison 2025 en cours
      </div>
      <h1 class="font-bebas text-7xl leading-none tracking-wide mb-4">
        Tous les<br>
        <span class="text-green-400">Tournois</span>
      </h1>
      <p class="text-sm text-gray-400 font-light max-w-sm leading-relaxed">
        Découvrez et rejoignez les compétitions de football amateur près de chez vous.
      </p>
    </div>

    <div class="flex-shrink-0 grid grid-cols-3 divide-x divide-gray-800 border border-gray-800 rounded-2xl overflow-hidden">
      <div class="px-8 py-5 bg-gray-900 text-center">
        <div class="font-bebas text-4xl text-green-400 leading-none mb-1">12</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">Tournois</div>
      </div>
      <div class="px-8 py-5 bg-gray-900 text-center">
        <div class="font-bebas text-4xl text-green-400 leading-none mb-1">48</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">Équipes</div>
      </div>
      <div class="px-8 py-5 bg-gray-900 text-center">
        <div class="font-bebas text-4xl text-green-400 leading-none mb-1">3</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">En cours</div>
      </div>
    </div>
  </section>

  <!-- ─── Filters ─── -->
  <div class="px-8 pb-8 flex items-center gap-2 flex-wrap">
    <a href="?">
      <span class="px-4 py-1.5 rounded-full text-xs font-medium border bg-green-950 border-green-700 text-green-400 cursor-pointer">Tous</span>
    </a>
    <a href="?status=en_attente">
      <span class="px-4 py-1.5 rounded-full text-xs font-medium border border-gray-700 text-gray-400 hover:border-green-700 hover:text-green-400 transition-colors cursor-pointer">Ouverts</span>
    </a>
    <a href="?status=en_cours">
      <span class="px-4 py-1.5 rounded-full text-xs font-medium border border-gray-700 text-gray-400 hover:border-green-700 hover:text-green-400 transition-colors cursor-pointer">En cours</span>
    </a>
    <a href="?status=termine">
      <span class="px-4 py-1.5 rounded-full text-xs font-medium border border-gray-700 text-gray-400 hover:border-green-700 hover:text-green-400 transition-colors cursor-pointer">Terminés</span>
    </a>
    <div class="w-px h-5 bg-gray-700 mx-1"></div>
    <a href="?format=championnat">
      <span class="px-4 py-1.5 rounded-full text-xs font-medium border border-gray-700 text-gray-400 hover:border-green-700 hover:text-green-400 transition-colors cursor-pointer">Championnat</span>
    </a>
    <a href="?format=elimination">
      <span class="px-4 py-1.5 rounded-full text-xs font-medium border border-gray-700 text-gray-400 hover:border-green-700 hover:text-green-400 transition-colors cursor-pointer">Élimination</span>
    </a>
    <a href="?format=groupes">
      <span class="px-4 py-1.5 rounded-full text-xs font-medium border border-gray-700 text-gray-400 hover:border-green-700 hover:text-green-400 transition-colors cursor-pointer">Groupes</span>
    </a>
  </div>

  <!-- ─── Grid ─── -->
  <div class="px-8 pb-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

    <!-- Card 1 — Championnat / Ouvert -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden hover:border-green-800 hover:-translate-y-1 transition-all duration-200">
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
        <h2 class="font-bebas text-2xl tracking-wide leading-tight mb-2">Coupe du Printemps 2025</h2>
        <div class="flex flex-wrap gap-x-4 gap-y-1 text-xs text-gray-400">
          <span>📍 Casablanca</span>
          <span>📅 15 avr → 30 avr 2025</span>
        </div>
      </div>
      <div class="px-5 py-3 bg-gray-950/50 border-t border-gray-800">
        <div class="flex justify-between text-xs mb-2">
          <span class="text-gray-500">Équipes inscrites</span>
          <span class="font-medium">6 / 8</span>
        </div>
        <div class="h-1 bg-gray-800 rounded-full overflow-hidden mb-3">
          <div class="h-full bg-green-400 rounded-full" style="width:75%"></div>
        </div>
        <div class="flex gap-2 flex-wrap">
          <span class="text-xs px-2 py-0.5 rounded-full bg-gray-800 text-gray-400 border border-gray-700">2 places restantes</span>
          <span class="text-xs px-2 py-0.5 rounded-full bg-gray-800 text-gray-400 border border-gray-700">Aller-retour</span>
        </div>
      </div>
      <div class="px-5 py-3 flex items-center justify-between border-t border-gray-800">
        <div class="flex items-center gap-2 text-xs text-gray-400">
          <div class="w-6 h-6 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">KA</div>
          Karim Alaoui
        </div>
        <a href="#" class="flex items-center gap-1 text-xs font-medium px-3 py-1.5 rounded-lg border border-gray-700 text-gray-300 hover:border-green-600 hover:text-green-400 transition-colors">
          Voir
          <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>

    <!-- Card 2 — Élimination / En cours -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden hover:border-green-800 hover:-translate-y-1 transition-all duration-200">
      <div class="h-1.5 bg-gradient-to-r from-red-900 to-red-600"></div>
      <div class="p-5">
        <div class="flex items-center justify-between mb-4">
          <span class="text-xs font-semibold px-2.5 py-1 rounded-full uppercase tracking-wider bg-red-950 text-red-400 border border-red-900">
            Élimination
          </span>
          <span class="flex items-center gap-1.5 text-xs font-medium text-amber-400">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
            En cours
          </span>
        </div>
        <h2 class="font-bebas text-2xl tracking-wide leading-tight mb-2">Liga Casablanca Saison 2</h2>
        <div class="flex flex-wrap gap-x-4 gap-y-1 text-xs text-gray-400">
          <span>📍 Casablanca</span>
          <span>📅 01 mars → 20 avr 2025</span>
        </div>
      </div>
      <div class="px-5 py-3 bg-gray-950/50 border-t border-gray-800">
        <div class="flex justify-between text-xs mb-2">
          <span class="text-gray-500">Équipes inscrites</span>
          <span class="font-medium text-red-400">16 / 16</span>
        </div>
        <div class="h-1 bg-gray-800 rounded-full overflow-hidden mb-3">
          <div class="h-full bg-red-500 rounded-full" style="width:100%"></div>
        </div>
        <div class="flex gap-2 flex-wrap">
          <span class="text-xs px-2 py-0.5 rounded-full bg-red-950 text-red-400 border border-red-900">Complet</span>
          <span class="text-xs px-2 py-0.5 rounded-full bg-gray-800 text-gray-400 border border-gray-700">Quarts de finale</span>
        </div>
      </div>
      <div class="px-5 py-3 flex items-center justify-between border-t border-gray-800">
        <div class="flex items-center gap-2 text-xs text-gray-400">
          <div class="w-6 h-6 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">YB</div>
          Youssef Benali
        </div>
        <a href="#" class="flex items-center gap-1 text-xs font-medium px-3 py-1.5 rounded-lg border border-gray-700 text-gray-300 hover:border-green-600 hover:text-green-400 transition-colors">
          Voir
          <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>

    <!-- Card 3 — Groupes / Ouvert -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden hover:border-green-800 hover:-translate-y-1 transition-all duration-200">
      <div class="h-1.5 bg-gradient-to-r from-amber-900 to-amber-600"></div>
      <div class="p-5">
        <div class="flex items-center justify-between mb-4">
          <span class="text-xs font-semibold px-2.5 py-1 rounded-full uppercase tracking-wider bg-amber-950 text-amber-400 border border-amber-900">
            Groupes
          </span>
          <span class="flex items-center gap-1.5 text-xs font-medium text-green-400">
            <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
            Ouvert
          </span>
        </div>
        <h2 class="font-bebas text-2xl tracking-wide leading-tight mb-2">Ramadan Cup 2025</h2>
        <div class="flex flex-wrap gap-x-4 gap-y-1 text-xs text-gray-400">
          <span>📍 Rabat</span>
          <span>📅 10 avr → 25 avr 2025</span>
        </div>
      </div>
      <div class="px-5 py-3 bg-gray-950/50 border-t border-gray-800">
        <div class="flex justify-between text-xs mb-2">
          <span class="text-gray-500">Équipes inscrites</span>
          <span class="font-medium">3 / 12</span>
        </div>
        <div class="h-1 bg-gray-800 rounded-full overflow-hidden mb-3">
          <div class="h-full bg-green-400 rounded-full" style="width:25%"></div>
        </div>
        <div class="flex gap-2 flex-wrap">
          <span class="text-xs px-2 py-0.5 rounded-full bg-gray-800 text-gray-400 border border-gray-700">9 places restantes</span>
          <span class="text-xs px-2 py-0.5 rounded-full bg-gray-800 text-gray-400 border border-gray-700">4 groupes</span>
        </div>
      </div>
      <div class="px-5 py-3 flex items-center justify-between border-t border-gray-800">
        <div class="flex items-center gap-2 text-xs text-gray-400">
          <div class="w-6 h-6 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">MO</div>
          Mohamed Ouali
        </div>
        <a href="#" class="flex items-center gap-1 text-xs font-medium px-3 py-1.5 rounded-lg border border-gray-700 text-gray-300 hover:border-green-600 hover:text-green-400 transition-colors">
          Voir
          <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>

    <!-- Card 4 — Championnat / Terminé -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden hover:border-green-800 hover:-translate-y-1 transition-all duration-200">
      <div class="h-1.5 bg-gray-700"></div>
      <div class="p-5">
        <div class="flex items-center justify-between mb-4">
          <span class="text-xs font-semibold px-2.5 py-1 rounded-full uppercase tracking-wider bg-blue-950 text-blue-400 border border-blue-800">
            Championnat
          </span>
          <span class="flex items-center gap-1.5 text-xs font-medium text-gray-500">
            <span class="w-1.5 h-1.5 rounded-full bg-gray-600"></span>
            Terminé
          </span>
        </div>
        <h2 class="font-bebas text-2xl tracking-wide leading-tight mb-2">Winter League 2024</h2>
        <div class="flex flex-wrap gap-x-4 gap-y-1 text-xs text-gray-400">
          <span>📍 Marrakech</span>
          <span>📅 01 jan → 28 fév 2024</span>
        </div>
      </div>
      <div class="px-5 py-3 bg-gray-950/50 border-t border-gray-800">
        <div class="flex justify-between text-xs mb-2">
          <span class="text-gray-500">Équipes participantes</span>
          <span class="font-medium">8 / 8</span>
        </div>
        <div class="h-1 bg-gray-800 rounded-full overflow-hidden mb-3">
          <div class="h-full bg-gray-600 rounded-full" style="width:100%"></div>
        </div>
        <div class="flex gap-2 flex-wrap">
          <span class="text-xs px-2 py-0.5 rounded-full bg-gray-800 text-gray-400 border border-gray-700">🏆 Vainqueur : Raja B</span>
          <span class="text-xs px-2 py-0.5 rounded-full bg-gray-800 text-gray-400 border border-gray-700">24 matchs</span>
        </div>
      </div>
      <div class="px-5 py-3 flex items-center justify-between border-t border-gray-800">
        <div class="flex items-center gap-2 text-xs text-gray-400">
          <div class="w-6 h-6 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">SA</div>
          Samir Amrani
        </div>
        <a href="#" class="flex items-center gap-1 text-xs font-medium px-3 py-1.5 rounded-lg border border-gray-700 text-gray-300 hover:border-green-600 hover:text-green-400 transition-colors">
          Résultats
          <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>

    <!-- Card 5 — Élimination / Ouvert -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden hover:border-green-800 hover:-translate-y-1 transition-all duration-200">
      <div class="h-1.5 bg-gradient-to-r from-red-900 to-red-600"></div>
      <div class="p-5">
        <div class="flex items-center justify-between mb-4">
          <span class="text-xs font-semibold px-2.5 py-1 rounded-full uppercase tracking-wider bg-red-950 text-red-400 border border-red-900">
            Élimination
          </span>
          <span class="flex items-center gap-1.5 text-xs font-medium text-green-400">
            <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
            Ouvert
          </span>
        </div>
        <h2 class="font-bebas text-2xl tracking-wide leading-tight mb-2">Grand Prix Fès 2025</h2>
        <div class="flex flex-wrap gap-x-4 gap-y-1 text-xs text-gray-400">
          <span>📍 Fès</span>
          <span>📅 20 avr → 05 mai 2025</span>
        </div>
      </div>
      <div class="px-5 py-3 bg-gray-950/50 border-t border-gray-800">
        <div class="flex justify-between text-xs mb-2">
          <span class="text-gray-500">Équipes inscrites</span>
          <span class="font-medium">10 / 16</span>
        </div>
        <div class="h-1 bg-gray-800 rounded-full overflow-hidden mb-3">
          <div class="h-full bg-green-400 rounded-full" style="width:62%"></div>
        </div>
        <div class="flex gap-2 flex-wrap">
          <span class="text-xs px-2 py-0.5 rounded-full bg-gray-800 text-gray-400 border border-gray-700">6 places restantes</span>
          <span class="text-xs px-2 py-0.5 rounded-full bg-gray-800 text-gray-400 border border-gray-700">Tableau unique</span>
        </div>
      </div>
      <div class="px-5 py-3 flex items-center justify-between border-t border-gray-800">
        <div class="flex items-center gap-2 text-xs text-gray-400">
          <div class="w-6 h-6 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">HA</div>
          Hassan Amrani
        </div>
        <a href="#" class="flex items-center gap-1 text-xs font-medium px-3 py-1.5 rounded-lg border border-gray-700 text-gray-300 hover:border-green-600 hover:text-green-400 transition-colors">
          Voir
          <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>

    <!-- Card 6 — Groupes / En cours -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden hover:border-green-800 hover:-translate-y-1 transition-all duration-200">
      <div class="h-1.5 bg-gradient-to-r from-amber-900 to-amber-600"></div>
      <div class="p-5">
        <div class="flex items-center justify-between mb-4">
          <span class="text-xs font-semibold px-2.5 py-1 rounded-full uppercase tracking-wider bg-amber-950 text-amber-400 border border-amber-900">
            Groupes
          </span>
          <span class="flex items-center gap-1.5 text-xs font-medium text-amber-400">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
            En cours
          </span>
        </div>
        <h2 class="font-bebas text-2xl tracking-wide leading-tight mb-2">Tanger Open Cup</h2>
        <div class="flex flex-wrap gap-x-4 gap-y-1 text-xs text-gray-400">
          <span>📍 Tanger</span>
          <span>📅 15 mars → 15 avr 2025</span>
        </div>
      </div>
      <div class="px-5 py-3 bg-gray-950/50 border-t border-gray-800">
        <div class="flex justify-between text-xs mb-2">
          <span class="text-gray-500">Équipes inscrites</span>
          <span class="font-medium text-red-400">12 / 12</span>
        </div>
        <div class="h-1 bg-gray-800 rounded-full overflow-hidden mb-3">
          <div class="h-full bg-red-500 rounded-full" style="width:100%"></div>
        </div>
        <div class="flex gap-2 flex-wrap">
          <span class="text-xs px-2 py-0.5 rounded-full bg-red-950 text-red-400 border border-red-900">Complet</span>
          <span class="text-xs px-2 py-0.5 rounded-full bg-gray-800 text-gray-400 border border-gray-700">Phase de groupes</span>
        </div>
      </div>
      <div class="px-5 py-3 flex items-center justify-between border-t border-gray-800">
        <div class="flex items-center gap-2 text-xs text-gray-400">
          <div class="w-6 h-6 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">NE</div>
          Nadia El Fassi
        </div>
        <a href="#" class="flex items-center gap-1 text-xs font-medium px-3 py-1.5 rounded-lg border border-gray-700 text-gray-300 hover:border-green-600 hover:text-green-400 transition-colors">
          Voir
          <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>

  </div>

  <!-- ─── Pagination ─── -->
  <div class="flex justify-center items-center gap-1 pb-16">
    <a href="#" class="w-9 h-9 rounded-lg border border-gray-700 flex items-center justify-center text-sm text-gray-400 hover:border-green-700 hover:text-green-400 transition-colors">‹</a>
    <a href="#" class="w-9 h-9 rounded-lg border border-green-700 bg-green-950 flex items-center justify-center text-sm text-green-400">1</a>
    <a href="#" class="w-9 h-9 rounded-lg border border-gray-700 flex items-center justify-center text-sm text-gray-400 hover:border-green-700 hover:text-green-400 transition-colors">2</a>
    <a href="#" class="w-9 h-9 rounded-lg border border-gray-700 flex items-center justify-center text-sm text-gray-400 hover:border-green-700 hover:text-green-400 transition-colors">3</a>
    <span class="text-gray-600 px-1">···</span>
    <a href="#" class="w-9 h-9 rounded-lg border border-gray-700 flex items-center justify-center text-sm text-gray-400 hover:border-green-700 hover:text-green-400 transition-colors">8</a>
    <a href="#" class="w-9 h-9 rounded-lg border border-gray-700 flex items-center justify-center text-sm text-gray-400 hover:border-green-700 hover:text-green-400 transition-colors">›</a>
  </div>

</body>
</html>