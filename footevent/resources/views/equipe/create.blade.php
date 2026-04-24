<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FootEvenT — Créer une équipe</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-gray-100 font-outfit min-h-screen">


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
      <a href="{{route('tournois.index')}}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Tournois</a>
      <a href="{{route('equipes.index')}}" class="px-4 py-2 rounded-lg text-sm font-medium bg-gray-800 text-gray-100">Équipes</a>
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Matchs</a>
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Classements</a>
    </div>

    <div class="w-32"></div>
  </nav>

  <div class="px-8 pt-12 pb-16 max-w-2xl mx-auto">

    <div class="flex items-center gap-2 text-xs text-gray-500 mb-8">
      @if(session('error'))
    <p class="text-red-400 text-sm mt-6 text-center">
          {{ session('error') }}
    </p>
    @endif
    </div>


    <div class="mb-10">
      <h1 class="font-bebas text-5xl tracking-wide leading-none mb-2">
        Créer une <span class="text-green-400">Équipe</span>
      </h1>
      <p class="text-sm text-gray-400 font-light">Remplissez les informations de votre nouvelle équipe.</p>
    </div>


    <form action="{{ route('equipes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
     @csrf
    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 space-y-5">


    <div>
      <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Nom de l'équipe *</label>
      <input type="text" name="name_equipe" placeholder="Ex: FC Atlas, AS Rapid..."
        class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-sm text-gray-100 placeholder-gray-600 focus:outline-none focus:border-green-600 focus:ring-1 focus:ring-green-600/30 transition-colors"required>
     </div> 
     
     <div>
        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">
          Logo équipe
        </label>
        <input type="file" name="image" class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-sm text-gray-100">
     </div>

     <div>
      <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Description <span class="normal-case text-gray-600 font-normal">(optionnel)</span></label>
      <textarea name="description" rows="3"placeholder="Décrivez votre équipe..."
        class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-sm text-gray-100 placeholder-gray-600 focus:outline-none focus:border-green-600 focus:ring-1 focus:ring-green-600/30 transition-colors resize-none">
      </textarea>
     </div>
  </div>


  <div class="flex gap-3">
    <a href="{{ route('equipes.index') }}" class="flex-1 text-center px-6 py-3 rounded-xl border border-gray-700 text-sm font-medium text-gray-400 hover:border-gray-500 hover:text-gray-100 transition-colors">
      Annuler
    </a>
    <button type="submit" class="flex-1 px-6 py-3 rounded-xl bg-green-400 text-gray-950 text-sm font-semibold hover:bg-green-300 transition-colors">
      Créer l'équipe →
    </button>
  </div>
</form>
  </div>

</body>
</html>