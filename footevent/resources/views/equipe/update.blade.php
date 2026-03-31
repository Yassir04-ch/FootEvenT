<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FootEvenT — Modifier {{ $equipe->name }}</title>
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
      <a href="{{route('tournois.index')}}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Tournois</a>
      <a href="{{route('equipes.index')}}" class="px-4 py-2 rounded-lg text-sm font-medium bg-gray-800 text-gray-100">Équipes</a>
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Matchs</a>
      <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Classements</a>
    </div>

    <div class="w-32"></div>
  </nav>

  <div class="px-8 pt-12 pb-16 max-w-2xl mx-auto">

    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 text-xs text-gray-500 mb-8">
      <a href="{{ route('equipes.index') }}" class="hover:text-green-400 transition-colors">Équipes</a>
      <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
      <a href="{{ route('equipes.show', $equipe) }}" class="hover:text-green-400 transition-colors">{{ $equipe->name }}</a>
      <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
      <span class="text-gray-300">Modifier</span>
    </div>

    <!-- Title -->
    <div class="mb-10">
      <h1 class="font-bebas text-5xl tracking-wide leading-none mb-2">
        Modifier <span class="text-green-400">l'Équipe</span>
      </h1>
      <p class="text-sm text-gray-400 font-light">Mettez à jour les informations de <span class="text-gray-200">{{ $equipe->name }}</span>.</p>
    </div>

    <!-- Errors -->
    @if($errors->any())
    <div class="mb-6 px-5 py-4 bg-red-950 border border-red-800 rounded-2xl">
      <p class="text-sm font-semibold text-red-400 mb-2">Veuillez corriger les erreurs suivantes :</p>
      <ul class="list-disc list-inside text-xs text-red-300 space-y-1">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- Form -->
    <form action="{{ route('equipes.update', $equipe) }}" method="POST" class="space-y-6">
      @csrf
      @method('PUT')

      <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 space-y-5">

        <!-- Nom -->
        <div>
          <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Nom de l'équipe *</label>
          <input
            type="text"
            name="name"
            value="{{ old('name', $equipe->name) }}"
            placeholder="Ex: FC Atlas, AS Rapid..."
            class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-sm text-gray-100 placeholder-gray-600 focus:outline-none focus:border-green-600 focus:ring-1 focus:ring-green-600/30 transition-colors"
            required
          >
          @error('name')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
        </div>

        <!-- Ville -->
        <div>
          <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Ville</label>
          <input
            type="text"
            name="ville"
            value="{{ old('ville', $equipe->ville) }}"
            placeholder="Ex: Casablanca, Rabat..."
            class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-sm text-gray-100 placeholder-gray-600 focus:outline-none focus:border-green-600 focus:ring-1 focus:ring-green-600/30 transition-colors"
          >
          @error('ville')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
        </div>

        <!-- Catégorie -->
        <div>
          <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Catégorie</label>
          <select
            name="categorie"
            class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-sm text-gray-100 focus:outline-none focus:border-green-600 focus:ring-1 focus:ring-green-600/30 transition-colors"
          >
            <option value="">Sélectionner une catégorie</option>
            <option value="senior" {{ old('categorie', $equipe->categorie) == 'senior' ? 'selected' : '' }}>Senior</option>
            <option value="u21" {{ old('categorie', $equipe->categorie) == 'u21' ? 'selected' : '' }}>U21</option>
            <option value="u18" {{ old('categorie', $equipe->categorie) == 'u18' ? 'selected' : '' }}>U18</option>
            <option value="u16" {{ old('categorie', $equipe->categorie) == 'u16' ? 'selected' : '' }}>U16</option>
            <option value="feminin" {{ old('categorie', $equipe->categorie) == 'feminin' ? 'selected' : '' }}>Féminin</option>
          </select>
          @error('categorie')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
        </div>

        <!-- Description -->
        <div>
          <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Description <span class="normal-case text-gray-600 font-normal">(optionnel)</span></label>
          <textarea
            name="description"
            rows="3"
            placeholder="Décrivez votre équipe..."
            class="w-full bg-gray-950 border border-gray-700 rounded-xl px-4 py-3 text-sm text-gray-100 placeholder-gray-600 focus:outline-none focus:border-green-600 focus:ring-1 focus:ring-green-600/30 transition-colors resize-none"
          >{{ old('description', $equipe->description) }}</textarea>
          @error('description')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
        </div>
      </div>

      <!-- Danger zone -->
      <div class="bg-gray-900 border border-red-900/40 rounded-2xl p-6">
        <h3 class="text-xs font-semibold text-red-400 uppercase tracking-widest mb-3">Zone de danger</h3>
        <p class="text-xs text-gray-500 mb-4">La suppression de l'équipe est irréversible. Tous les joueurs et données associés seront perdus.</p>
        <form action="{{ route('equipes.destroy', $equipe) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette équipe ? Cette action est irréversible.')">
          @csrf @method('DELETE')
          <button type="submit" class="px-5 py-2 rounded-xl text-sm font-medium border border-red-900 text-red-400 hover:bg-red-950 hover:border-red-700 transition-colors">
            🗑️ Supprimer l'équipe
          </button>
        </form>
      </div>

      <!-- Actions -->
      <div class="flex gap-3">
        <a href="{{ route('equipes.show', $equipe) }}" class="flex-1 text-center px-6 py-3 rounded-xl border border-gray-700 text-sm font-medium text-gray-400 hover:border-gray-500 hover:text-gray-100 transition-colors">
          Annuler
        </a>
        <button type="submit" class="flex-1 px-6 py-3 rounded-xl bg-green-400 text-gray-950 text-sm font-semibold hover:bg-green-300 transition-colors">
          Enregistrer les modifications →
        </button>
      </div>
    </form>
  </div>

</body>
</html>