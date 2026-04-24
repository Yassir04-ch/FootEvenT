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

  <div class="flex items-center gap-1">
      <a href="{{route('tournois.index')}}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Tournois</a>
      <a href="{{route('equipes.index')}}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Équipes</a>
      <a href="{{route('games.index')}}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Matchs</a>
      <a href="{{route('joueurs.joueurs')}}" class="px-4 py-2 rounded-lg text-sm font-medium bg-gray-800 text-gray-100">Joueurs</a>
      @if(auth()->user())
      <a href="{{route('auth.profile')}}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Profile</a>
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
      joueurs
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

<div class="px-8 pb-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

@forelse($joueurs as $joueur)

<div class="w-64 mx-auto">

    <div class="bg-gradient-to-b from-gray-900 to-black border border-green-700 rounded-2xl p-4 shadow-lg hover:scale-105 transition duration-300">

        <!-- TOP -->
        <div class="flex justify-between items-center text-green-400 text-xs font-bold mb-3">
            <span class="uppercase">{{ $joueur->poste }}</span>
        </div>

        <div class="w-full h-40 mb-3 overflow-hidden rounded-lg border border-green-700">
            @if($joueur->image)
                <img src="{{ asset('storage/'.$joueur->image) }}" class="w-full h-44 object-cover rounded-lg">
            @else
                <div class="w-full h-full flex items-center justify-center bg-gray-800 text-green-400 text-3xl font-bold">
                    {{ substr($joueur->user->firstname,0,1) }}
                </div>
            @endif
        </div>
        <h2 class="text-center text-white font-bold text-lg tracking-wide uppercase">
            {{ $joueur->user->firstname }} {{ $joueur->user->lastname }}
        </h2>
        <p class="text-center text-xs mt-2">
            @if($joueur->activeJoueur())
                <span class="text-green-400">● Dans équipe</span>
            @else
                <span class="text-gray-400">● Sans équipe</span>
            @endif
        </p>

        <div class="mt-4">
            <a href="{{route('joueurs.show',$joueur)}}" class="block text-center bg-green-500 hover:bg-green-400 text-black text-sm font-semibold py-2 rounded-lg transition">
                Voir profil
            </a>
        </div>
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