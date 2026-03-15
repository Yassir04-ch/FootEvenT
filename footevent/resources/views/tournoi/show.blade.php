<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FootEvenT — Détail Tournoi</title>
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
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Tournois</a>
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Équipes</a>
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Matchs</a>
    </div>
    <div class="flex items-center gap-2 text-sm text-gray-400">
      <div class="w-7 h-7 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">KA</div>
      {{auth()->user()->firstname}}  {{auth()->user()->lastname}} 
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

  <!-- ─── Flash success ─── -->
  <div class="px-8 pt-4">
    <div class="flex items-center gap-3 px-5 py-4 bg-green-950 border border-green-800 rounded-2xl">
      <div class="w-8 h-8 rounded-lg bg-green-900 border border-green-700 flex items-center justify-center flex-shrink-0">
        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
      </div>
      <p class="text-sm text-green-300 font-medium flex-1">Équipe « Eagles FC » validée avec succès.</p>
      <a href="#" class="text-green-700 hover:text-green-400 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
      </a>
    </div>
  </div>

  <div class="max-w-6xl mx-auto px-8 py-10">

    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 text-xs text-gray-500 mb-8">
      <a href="#" class="hover:text-green-400 transition-colors">Tournois</a>
      <span>/</span>
      <span class="text-gray-300">Coupe du Printemps 2025</span>
    </div>

    <!-- ─── Header tournoi ─── -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden mb-6">
      <div class="h-1.5 bg-gradient-to-r from-blue-900 to-blue-600"></div>
      <div class="p-8">
        <div class="flex items-start justify-between gap-6">
          <div class="flex-1">
            <div class="flex items-center gap-3 mb-4">
              <span class="text-xs font-semibold px-2.5 py-1 rounded-full uppercase tracking-wider border bg-blue-950 text-blue-400 border-blue-800">
                Championnat
              </span>
              <span class="flex items-center gap-1.5 text-xs font-medium text-green-400">
                <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
                {{$tournoi->status}}
              </span>
            </div>
            <h1 class="leading-none tracking-wide mb-4" style="font-family:'Bebas Neue',cursive;font-size:3.5rem">
              {{$tournoi->name_tournoi}}
            </h1>
            <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-400">
              <span class="flex items-center gap-2">
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                {{$tournoi->lieu}}
              </span>
              <span class="flex items-center gap-2">
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                {{ $tournoi->date_debut}} → {{ $tournoi->date_fin }}
              </span>
              <span class="flex items-center gap-2">
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                Organisé par {{auth()->user()->firstname}}  {{auth()->user()->lastname}} 
              </span>
            </div>
          </div>
    @if($tournoi->user_id == auth()->id())
          <!-- Actions organisateur -->
          <div class="flex flex-col gap-2 flex-shrink-0">
            <a href="{{route('tournois.edit',$tournoi)}}" class="flex items-center gap-2 px-4 py-2 rounded-xl border border-gray-700 text-sm text-gray-300 hover:border-green-600 hover:text-green-400 transition-colors">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
              Modifier
            </a>
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded-xl bg-green-400 text-gray-950 text-sm font-semibold hover:bg-green-300 transition-colors">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Valider équipes
              <span class="w-5 h-5 rounded-full bg-gray-950 text-green-400 text-xs font-bold flex items-center justify-center">2</span>
            </a>
          </div>
          @endif
        </div>
      </div>
    </div>

    <!-- ─── Stats bar ─── -->
    <div class="grid grid-cols-4 gap-4 mb-6">
      <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 text-center">
        <div class="text-3xl text-green-400 leading-none mb-1" style="font-family:'Bebas Neue',cursive">6</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">Équipes validées</div>
      </div>
      <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 text-center">
        <div class="text-3xl text-gray-100 leading-none mb-1" style="font-family:'Bebas Neue',cursive">{{$tournoi->nbEquipes}}</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">Places totales</div>
      </div>
      <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 text-center">
        <div class="text-3xl text-amber-400 leading-none mb-1" style="font-family:'Bebas Neue',cursive">2</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">Places restantes</div>
      </div>
      <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 text-center">
        <div class="text-3xl text-blue-400 leading-none mb-1" style="font-family:'Bebas Neue',cursive">14</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">Matchs prévus</div>
      </div>
    </div>

    <!-- ─── Contenu principal (2 colonnes) ─── -->
    <div class="grid grid-cols-3 gap-6">

      <!-- Colonne gauche : équipes (2/3) -->
      <div class="col-span-2 space-y-3">

        <div class="flex items-center justify-between mb-2">
          <h2 class="text-sm font-semibold text-gray-400 uppercase tracking-widest">Équipes participantes</h2>
          <span class="text-xs text-gray-500">6 / 8</span>
        </div>

        <!-- Progress bar -->
        <div class="h-1.5 bg-gray-800 rounded-full overflow-hidden mb-4">
          <div class="h-full rounded-full bg-green-400" style="width:75%"></div>
        </div>

        <!-- Équipe 1 -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
          <div class="px-5 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-xl bg-gray-800 border border-gray-700 flex items-center justify-center text-sm font-bold text-gray-300" style="font-family:'Bebas Neue',cursive">1</div>
              <div>
                <p class="font-medium text-gray-100 text-sm">Eagles FC</p>
                <p class="text-xs text-gray-500 mt-0.5">11 joueurs</p>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <span class="text-xs px-2.5 py-1 rounded-full bg-green-950 text-green-400 border border-green-800">Validée</span>
              <button  class="text-xs text-gray-500 hover:text-gray-300 transition-colors flex items-center gap-1">
                Joueurs
                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
              </button>
            </div>
          </div>
          <!-- Liste joueurs -->
          <div id="eq1" class="hidden border-t border-gray-800 px-5 py-3 grid grid-cols-2 gap-2">
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">1</span>Youssef Amrani</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">2</span>Mehdi Benali</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">3</span>Amine Tazi</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">4</span>Samir Ouali</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">5</span>Hassan Idrissi</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">6</span>Khalid Mansouri</div>
          </div>
        </div>

        <!-- Équipe 2 -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
          <div class="px-5 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-xl bg-gray-800 border border-gray-700 flex items-center justify-center text-sm font-bold text-gray-300" style="font-family:'Bebas Neue',cursive">2</div>
              <div>
                <p class="font-medium text-gray-100 text-sm">Lions Atlas</p>
                <p class="text-xs text-gray-500 mt-0.5">10 joueurs</p>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <span class="text-xs px-2.5 py-1 rounded-full bg-green-950 text-green-400 border border-green-800">Validée</span>
              <button  class="text-xs text-gray-500 hover:text-gray-300 transition-colors flex items-center gap-1">
                Joueurs
                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
              </button>
            </div>
          </div>
          <div id="eq2" class="hidden border-t border-gray-800 px-5 py-3 grid grid-cols-2 gap-2">
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">1</span>Rachid Bouhali</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">2</span>Nabil Chraibi</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">3</span>Driss Lahlou</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">4</span>Omar Filali</div>
          </div>
        </div>

        <!-- Équipe 3 -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
          <div class="px-5 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-xl bg-gray-800 border border-gray-700 flex items-center justify-center text-sm font-bold text-gray-300" style="font-family:'Bebas Neue',cursive">3</div>
              <div>
                <p class="font-medium text-gray-100 text-sm">Stade Rabat</p>
                <p class="text-xs text-gray-500 mt-0.5">11 joueurs</p>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <span class="text-xs px-2.5 py-1 rounded-full bg-green-950 text-green-400 border border-green-800">Validée</span>
              <button  class="text-xs text-gray-500 hover:text-gray-300 transition-colors flex items-center gap-1">
                Joueurs
                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
              </button>
            </div>
          </div>
          <div id="eq3" class="hidden border-t border-gray-800 px-5 py-3 grid grid-cols-2 gap-2">
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">1</span>Tariq Bennani</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">2</span>Mouad El Fassi</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">3</span>Imad Ziani</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">4</span>Ayoub Hajji</div>
          </div>
        </div>

        <!-- Équipe 4 -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
          <div class="px-5 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-xl bg-gray-800 border border-gray-700 flex items-center justify-center text-sm font-bold text-gray-300" style="font-family:'Bebas Neue',cursive">4</div>
              <div>
                <p class="font-medium text-gray-100 text-sm">Maghreb United</p>
                <p class="text-xs text-gray-500 mt-0.5">9 joueurs</p>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <span class="text-xs px-2.5 py-1 rounded-full bg-green-950 text-green-400 border border-green-800">Validée</span>
              <button  class="text-xs text-gray-500 hover:text-gray-300 transition-colors flex items-center gap-1">
                Joueurs
                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
              </button>
            </div>
          </div>
          <div id="eq4" class="hidden border-t border-gray-800 px-5 py-3 grid grid-cols-2 gap-2">
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">1</span>Soufiane Elaraki</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">2</span>Badr Moussaoui</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">3</span>Zakaria Tahir</div>
          </div>
        </div>

        <!-- Équipe 5 -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
          <div class="px-5 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-xl bg-gray-800 border border-gray-700 flex items-center justify-center text-sm font-bold text-gray-300" style="font-family:'Bebas Neue',cursive">5</div>
              <div>
                <p class="font-medium text-gray-100 text-sm">Casa Warriors</p>
                <p class="text-xs text-gray-500 mt-0.5">11 joueurs</p>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <span class="text-xs px-2.5 py-1 rounded-full bg-green-950 text-green-400 border border-green-800">Validée</span>
              <button class="text-xs text-gray-500 hover:text-gray-300 transition-colors flex items-center gap-1">
                Joueurs
                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
              </button>
            </div>
          </div>
          <div id="eq5" class="hidden border-t border-gray-800 px-5 py-3 grid grid-cols-2 gap-2">
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">1</span>Hamza Berrada</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">2</span>Ilias Fennich</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">3</span>Reda Squalli</div>
          </div>
        </div>

        <!-- Équipe 6 -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
          <div class="px-5 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-xl bg-gray-800 border border-gray-700 flex items-center justify-center text-sm font-bold text-gray-300" style="font-family:'Bebas Neue',cursive">6</div>
              <div>
                <p class="font-medium text-gray-100 text-sm">Fès City Club</p>
                <p class="text-xs text-gray-500 mt-0.5">10 joueurs</p>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <span class="text-xs px-2.5 py-1 rounded-full bg-green-950 text-green-400 border border-green-800">Validée</span>
              <button  class="text-xs text-gray-500 hover:text-gray-300 transition-colors flex items-center gap-1">
                Joueurs
                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
              </button>
            </div>
          </div>
          <div id="eq6" class="hidden border-t border-gray-800 px-5 py-3 grid grid-cols-2 gap-2">
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">1</span>Othmane Laraki</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">2</span>Yassine Kettani</div>
            <div class="flex items-center gap-2 text-xs text-gray-400"><span class="w-5 h-5 rounded-full bg-gray-800 flex items-center justify-center text-gray-500 text-xs">3</span>Adil Chaoui</div>
          </div>
        </div>

        <!-- Équipes en attente -->
        <div class="mt-6">
          <h3 class="text-xs font-semibold text-amber-400 uppercase tracking-widest mb-3">En attente de validation (2)</h3>

          <div class="bg-gray-900 border border-amber-900/40 rounded-2xl px-5 py-4 flex items-center justify-between mb-2">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-xl bg-amber-950 border border-amber-800 flex items-center justify-center">
                <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
              </div>
              <div>
                <p class="font-medium text-gray-100 text-sm">Tanger Boys</p>
                <p class="text-xs text-gray-500 mt-0.5">8 joueurs</p>
              </div>
            </div>
            <div class="flex items-center gap-2">
              <button class="px-3 py-1.5 rounded-lg bg-green-400 text-gray-950 text-xs font-semibold hover:bg-green-300 transition-colors">Valider</button>
              <button class="px-3 py-1.5 rounded-lg border border-red-900 text-red-400 text-xs font-medium hover:bg-red-950 transition-colors">Refuser</button>
            </div>
          </div>

          <div class="bg-gray-900 border border-amber-900/40 rounded-2xl px-5 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-xl bg-amber-950 border border-amber-800 flex items-center justify-center">
                <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
              </div>
              <div>
                <p class="font-medium text-gray-100 text-sm">Marrakech Stars</p>
                <p class="text-xs text-gray-500 mt-0.5">9 joueurs</p>
              </div>
            </div>
            <div class="flex items-center gap-2">
              <button class="px-3 py-1.5 rounded-lg bg-green-400 text-gray-950 text-xs font-semibold hover:bg-green-300 transition-colors">Valider</button>
              <button class="px-3 py-1.5 rounded-lg border border-red-900 text-red-400 text-xs font-medium hover:bg-red-950 transition-colors">Refuser</button>
            </div>
          </div>
        </div>

      </div>

      <!-- Colonne droite : infos + inscription (1/3) -->
      <div class="space-y-4">

        <!-- Infos tournoi -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
          <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-4">Informations</h3>
          <div class="space-y-3">
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Format</span>
              <span class="font-medium">Championnat</span>
            </div>
            <div class="h-px bg-gray-800"></div>
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Début</span>
              <span class="font-medium">15 Avr 2025</span>
            </div>
            <div class="h-px bg-gray-800"></div>
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Fin</span>
              <span class="font-medium">30 Avr 2025</span>
            </div>
            <div class="h-px bg-gray-800"></div>
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Équipes max</span>
              <span class="font-medium">8</span>
            </div>
            <div class="h-px bg-gray-800"></div>
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Statut</span>
              <span class="font-medium text-green-400">Ouvert</span>
            </div>
          </div>
        </div>

        <!-- Organisateur -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
          <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-4">Organisateur</h3>
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold">KA</div>
            <div>
              <p class="font-medium text-sm">Karim Alaoui</p>
              <p class="text-xs text-gray-500">karim@example.com</p>
            </div>
          </div>
        </div>

        <!-- Bouton inscription -->
        <button class="w-full py-3 rounded-xl bg-green-400 text-gray-950 font-semibold text-sm hover:bg-green-300 transition-colors">
          Inscrire mon équipe
        </button>

        <!-- Retour -->
        <a href="#" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-xl border border-gray-800 text-gray-500 text-xs hover:border-gray-600 hover:text-gray-300 transition-colors">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
          Retour aux tournois
        </a>

      </div>
    </div>
  </div>

</body>
</html>