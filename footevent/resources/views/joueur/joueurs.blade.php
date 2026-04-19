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

<nav class="sticky top-0 z-50 flex items-center justify-between px-8 h-16 bg-gray-950/80 backdrop-blur border-b border-gray-800">

  <div class="flex items-center gap-3">
    <div class="w-9 h-9 bg-green-400 rounded-lg flex items-center justify-center">⚽</div>
    <span class="font-bebas text-2xl text-green-400 tracking-widest">FootEvenT</span>
  </div>

  <div class="flex items-center gap-2">
    <a href="{{route('tournois.index')}}" class="px-4 py-2 text-sm text-gray-400 hover:text-white">Tournois</a>
    <a href="{{route('equipes.index')}}" class="px-4 py-2 text-sm text-gray-400 hover:text-white">Équipes</a>
    <a href="{{route('joueurs.index')}}" class="px-4 py-2 text-sm bg-gray-800 rounded-lg text-white">Joueurs</a>
    <a href="{{route('games.index')}}" class="px-4 py-2 text-sm text-gray-400 hover:text-white">Matchs</a>
    @if(auth()->user())
    <a href="{{route('auth.profile')}}" class="px-4 py-2 text-sm text-gray-400 hover:text-white">Profile</a>
    @endif
  </div>

  <div>
    @if(!auth()->user())
      <a href="{{route('auth.create')}}" class="px-4 py-2 text-sm border border-gray-700 rounded-lg text-gray-400 hover:text-white">
        Connexion
      </a>
    @endif
  </div>

</nav>

<section class="px-8 pt-14 pb-8 flex items-end justify-between">

  <div>
    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-green-950 border border-green-800 text-green-400 text-xs uppercase tracking-widest mb-5">
      <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></span>
      Base de données joueurs
    </div>

    <h1 class="font-bebas text-7xl leading-none mb-4">
      Tous les <span class="text-green-400">Joueurs</span>
    </h1>

    <p class="text-sm text-gray-400 max-w-md">
      Trouve les meilleurs joueurs et contacte-les pour rejoindre ton équipe ou tournoi.
    </p>
  </div>

</section>

<div class="px-8 pb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

  <div class="flex items-center gap-2 flex-wrap">

    <a href="?">
      <span class="px-4 py-1.5 rounded-full text-xs border bg-green-950 border-green-700 text-green-400">
        Tous
      </span>
    </a>

    <a href="?poste=attaquant">
      <span class="px-4 py-1.5 rounded-full text-xs border border-gray-700 text-gray-400 hover:text-green-400 hover:border-green-700">
        Attaquant
      </span>
    </a>

    <a href="?poste=milieu">
      <span class="px-4 py-1.5 rounded-full text-xs border border-gray-700 text-gray-400 hover:text-green-400 hover:border-green-700">
        Milieu
      </span>
    </a>

    <a href="?poste=defenseur">
      <span class="px-4 py-1.5 rounded-full text-xs border border-gray-700 text-gray-400 hover:text-green-400 hover:border-green-700">
        Défenseur
      </span>
    </a>

    <a href="?poste=gardien">
      <span class="px-4 py-1.5 rounded-full text-xs border border-gray-700 text-gray-400 hover:text-green-400 hover:border-green-700">
        Gardien
      </span>
    </a>

  </div>
</div>

<div class="px-8 pb-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

@forelse($joueurs as $joueur)

  <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden hover:border-green-700 hover:-translate-y-1 transition">

    <div class="h-1.5 bg-gradient-to-r from-green-700 to-green-400"></div>

    <div class="p-5">

      <div class="flex items-center justify-between mb-4">

        <span class="text-xs px-2 py-1 rounded-full border border-gray-700 text-gray-400">
          {{ $joueur->poste}}
        </span>

        <span class="text-xs text-green-400 flex items-center gap-1">
         @if($joueur->activeJoueur())
          <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></span>
          Dans équipe
         @else
         <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></span>
          Sans équipe
          @endif
        </span>
      </div>
      

      <h2 class="font-bebas text-3xl mb-2 tracking-wide">
        {{ $joueur->firstname }} {{ $joueur->lastname }}
      </h2>

      <div class="text-xs text-gray-400 space-y-1">
        <p>Poste: {{ $joueur->poste}}</p>
      </div>

    </div>

    <!-- footer -->
    <div class="px-5 py-3 border-t border-gray-800 flex items-center justify-between">

      <div class="flex items-center gap-2 text-xs text-gray-400">
        <div class="w-7 h-7 bg-green-950 border border-green-800 rounded-full flex items-center justify-center text-green-400 font-bold">
          {{ substr($joueur->firstname,0,1) }}
        </div>
        <span>{{ $joueur->firstname }}</span>
      </div>

      <a href="#" class="text-xs px-3 py-1.5 rounded-lg border border-gray-700 text-gray-300 hover:border-green-600 hover:text-green-400">
        Voir
      </a>

    </div>

  </div>

@empty

  <div class="col-span-3 text-center text-gray-500 py-20">
    Aucun joueur trouvé 
  </div>

@endforelse

</div>

</body>
</html>