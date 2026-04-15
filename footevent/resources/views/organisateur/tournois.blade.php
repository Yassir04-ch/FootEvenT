<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisateur — Tournois</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white font-sans flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 border-r border-gray-800 flex flex-col fixed top-0 left-0 h-full z-40 bg-gray-950">
        <div class="px-6 py-6 border-b border-gray-800">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center text-base">⚽</div>
                <span class="text-xl text-green-400 tracking-widest" style="font-family:'Bebas Neue',cursive">FootEvenT</span>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                <span class="text-xs text-gray-400">Panel Organisateur</span>
            </div>
        </div>

        <nav class="flex-1 px-4 py-6 flex flex-col gap-1">
            <div class="text-xs text-gray-600 uppercase tracking-widest px-3 mb-2">Principal</div>
            <a href="{{ route('organisateur.index') }}"  class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">📊</span> Dashboard
            </a>
            <a href="{{ route('organisateur.tournois') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-green-400 bg-opacity-10 border border-green-400 border-opacity-20 text-green-400 text-sm font-medium no-underline">
                <span class="text-base">🏆</span> Mes Tournois
            </a>
            <a href="{{ route('organisateur.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">👥</span> Équipes
            </a>
            <a href="{{ route('organisateur.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">⚽</span> Matchs
            </a>
        </nav>

        <div class="px-4 py-4 border-t border-gray-800 mt-auto">
            <div class="flex items-center gap-3 bg-gray-800 rounded-xl px-3 py-3">
                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm">{{ strtoupper(substr(auth()->user()->firstname ?? 'K',0,1)) }}</div>
                <div class="flex-1 min-w-0">
                    <div class="text-sm font-semibold text-white truncate">{{ auth()->user()->firstname ?? 'Organisateur' }}</div>
                    <div class="text-xs text-green-400">Organisateur</div>
                </div>
            </div>
            <a href="{{ route('auth.destroy') }}" class="mt-3 flex items-center gap-2 px-3 py-2 text-gray-500 text-xs hover:text-red-400 no-underline">
                🚪 Déconnexion
            </a>
        </div>
    </aside>

    <!-- MAIN -->
<main class="ml-64 flex-1 flex flex-col">

    <!-- TOP NAVBAR -->
    <div class="sticky top-0 z-30 flex items-center justify-between px-8 py-4 bg-gray-900 border-b border-gray-800">
        <div>
            <h1 class="text-xl font-bold text-white">Bonjour, {{ auth()->user()->firstname ?? 'Organisateur' }} 👋</h1>
         </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('tournois.create') }}" class="flex items-center gap-2 px-5 py-2 bg-green-400 rounded-xl text-gray-900 font-bold text-sm hover:bg-green-300 no-underline">
                + Créer un tournoi
            </a>
            <div class="relative">
                <button class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:text-white border border-gray-700">🔔</button>
                <span class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full text-gray-900 text-xs font-bold flex items-center justify-center">2</span>
            </div>
            <div class="w-9 h-9 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm">{{ strtoupper(substr(auth()->user()->firstname ?? 'K',0,1)) }}</div>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="flex-1 px-8 py-8">

        <h1 class="text-3xl font-bold text-green-400 mb-6">Mes Tournois</h1>

        @forelse($tournois as $tournoi)
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 mb-4 hover:border-green-800 transition-all duration-200">
            <div class="flex items-start justify-between mb-2">
                <h3 class="text-xl font-semibold text-green-300">{{ $tournoi->name_tournoi }}</h3>
                <span class="text-xs font-bold px-2 py-1 rounded-full bg-blue-800 text-blue-400">
                    {{ $tournoi->status }}
                </span>
            </div>
            <p class="text-gray-400 text-sm mb-2">{{ $tournoi->description ?? 'Pas de description' }}</p>

            <!-- Total équipes -->
            <h4 class="text-gray-300 font-semibold mb-1">
                Total équipes: {{ $tournoi->equipes->count() }}
            </h4>

            <!-- Validées / Max -->
            <h4 class="text-green-400 font-semibold mb-2">
                Validées: {{ $tournoi->equipesValidees->count() }}/{{ $tournoi->nbEquipes }}
            </h4>

            <!-- Boutons d'action -->
           <div class="flex gap-2 flex-wrap mb-2">
    @if($tournoi->status == 'en_attente')
        <a href="{{ route('tournois.edit', $tournoi) }}" class="px-3 py-1.5 bg-gray-700 border border-gray-600 rounded-lg text-white text-xs hover:bg-gray-600 no-underline">Modifier</a>
        <form action="{{route('tournois.demarer',$tournoi)}}" method="POST">
            @csrf
            @method('put')
            <button type="submit" class="px-3 py-1.5 bg-green-400 rounded-lg text-gray-900 text-xs font-bold hover:bg-green-300">Démarrer</button>
        </form>
    @elseif($tournoi->status == 'en_cours')
        <form action="#" method="POST">
            @csrf
            <button type="submit" class="px-3 py-1.5 bg-red-900 rounded-lg text-red-400 text-xs font-bold hover:bg-red-700">Terminer</button>
        </form>
    @endif

         <a href="{{ route('tournoi.equipe', $tournoi->id) }}"
            class="px-3 py-1.5 bg-blue-600 rounded-lg text-white text-xs font-bold hover:bg-blue-500 inline-block ml-auto">
            Voir les équipes
         </a>
        </div>
        @empty
        <p class="text-gray-500 text-center py-10">Aucun tournoi pour le moment.</p>
        @endforelse

    </div>
</main>
</body>
</html>