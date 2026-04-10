<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Équipes - {{ $tournoi->name_tournoi }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-900 text-gray-200 font-sans">

    <!-- HEADER UNIQUE -->
    <header class="bg-gradient-to-r from-green-600 to-blue-600 p-6 shadow-lg flex justify-between items-center">
        <h1 class="text-2xl font-bold text-white">Équipes du tournoi: {{ $tournoi->name_tournoi }}</h1>
        <a href="{{ route('organisateur.tournois') }}" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-lg font-semibold">← Retour</a>
    </header>

    <!-- DESCRIPTION -->
    <section class="px-8 py-6">
        <p class="text-gray-300 mb-4">{{ $tournoi->description ?? 'Pas de description pour ce tournoi.' }}</p>
        <div class="flex gap-4 text-sm text-gray-200 mb-6">
            <span class="font-bold">Total équipes: {{ $equipes->count() }}</span>
         </div>
    </section>

    <!-- LISTE DES ÉQUIPES -->
    <section class="px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($equipes as $equipe)
            <div class="bg-gray-800 rounded-xl p-4 shadow-md hover:scale-105 transition-transform">
                <h2 class="text-lg font-semibold text-white mb-2">{{ $equipe->name_equipe }}</h2>
                <p class="text-xs text-gray-400 mb-2">Membres: {{ $equipe->joueurs->count() ?? 'N/A' }}</p>
                <span class="px-2 py-1 rounded-full text-xs font-bold
                    {{ $equipe->pivot->statut === 'validee' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                    {{ ucfirst($equipe->pivot->statut) }}
                </span>
            </div>
        @empty
            <p class="text-gray-400 col-span-full text-center">Aucune équipe inscrite pour ce tournoi.</p>
        @endforelse
    </section>

</body>
</html>