<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FootEvenT — Créer un match</title>

<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-950 text-gray-100 font-outfit min-h-screen">

<nav class="sticky top-0 z-50 flex items-center justify-between px-8 h-16 bg-gray-950/80 backdrop-blur border-b border-gray-800">
  <div class="flex items-center gap-3">
    <span class="font-bebas text-2xl text-green-400 tracking-widest">FootEvenT</span>
  </div>
  <div class="text-sm text-gray-400">
    {{ auth()->user()->name }}
  </div>
</nav>

<div class="max-w-3xl mx-auto px-8 py-12">

  <h1 class="font-bebas text-5xl mb-2">
    Créer un <span class="text-green-400">match</span>
  </h1>
  <p class="text-sm text-gray-400 mb-8">
    Planifiez un match entre deux équipes.
  </p>
   @if(session('success'))
        <div class="px-8 pt-4">
            <div class="flex items-center gap-3 px-5 py-4 bg-green-950 border border-green-800 rounded-2xl">
            <p class="text-sm text-green-300 font-medium flex-1">{{ session('success') }}</p>
            </div>
        </div>
      @endif
    @if(session('error'))
        <div class="px-8x pt-4">
            <div class="flex items-center gap-3 px-5 py-4 bg-red-950 border border-red-800 rounded-2xl">
            <p class="text-sm text-red-300 font-medium flex-1">{{ session('error') }}</p>
            </div>
        </div>
      @endif

  <form method="POST" action="{{ route('games.store',$tournoi) }}" class="space-y-6 bg-gray-900 border border-gray-800 rounded-2xl p-6">
    @csrf
    <div>
      <label class="text-xs text-gray-400 uppercase mb-2 block">Tournoi</label>
      <p class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-sm focus:border-green-500 focus:ring-1 focus:ring-green-500/20">
         {{$tournoi->name_tournoi}}
      </p>
    </div>

    <!-- Teams -->
    <div class="grid grid-cols-2 gap-4">

      <div>
        <label class="text-xs text-gray-400 uppercase mb-2 block">Équipe 1</label>
        <select name="equipe1_id" class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-sm">
          @foreach($equipes as $equipe)
          <option value="{{$equipe->id}}">{{$equipe->name_equipe}}</option>
          @endforeach        </select>
      </div>

      <div>
        <label class="text-xs text-gray-400 uppercase mb-2 block">Équipe 2</label>
        <select name="equipe2_id" class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-sm">
          @foreach($equipes as $equipe)
          <option value="{{$equipe->id}}">{{$equipe->name_equipe}}</option>
          @endforeach
        </select>
      </div>

    </div>

     <div>
        <label class="text-xs text-gray-400 uppercase mb-2 block">Date</label>
        <input type="date" name="dateMatch"
          class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-sm">
    </div>

     <div>
      <label for="heure">Choisir l'heure :</label>
      <input type="time" id="heure" name="heure" class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-sm">
    </div>

     <div>
      <label class="text-xs text-gray-400 uppercase mb-2 block">Terrain</label>
      <input type="text" name="terrain" class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-sm" placeholder="Stade ...">
    </div>

    <button type="submit"
      class="w-full bg-green-400 hover:bg-green-300 text-gray-950 font-semibold py-3 rounded-xl transition">
      Créer le match
    </button>

  </form>

</div>

</body>
</html>