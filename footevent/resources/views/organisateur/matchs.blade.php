<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisateur — Matchs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white font-sans flex min-h-screen">

<aside class="w-64 border-r border-gray-800 flex flex-col fixed top-0 left-0 h-full z-40 bg-gray-950">

    <div class="px-6 py-6 border-b border-gray-800">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center">⚽</div>
            <span class="text-xl text-green-400 tracking-widest" style="font-family:'Bebas Neue',cursive">
                FootEvenT
            </span>
        </div>
        <div class="mt-3 flex items-center gap-2">
            <div class="w-2 h-2 bg-green-400 rounded-full"></div>
            <span class="text-xs text-gray-400">Panel Organisateur</span>
        </div>
    </div>

     <nav class="flex-1 px-4 py-6 flex flex-col gap-1">
            <div class="text-xs text-gray-600 uppercase tracking-widest px-3 mb-2">Principal</div>
            <a href="{{ route('organisateur.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">📊</span> Dashboard
            </a>
            <a href="{{ route('organisateur.tournois') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 text-sm font-medium hover:bg-gray-800 hover:text-white no-underline">
                <span class="text-base">🏆</span> Mes Tournois
                <span class="ml-auto bg-gray-700 text-gray-300 text-xs px-2 py-0.5 rounded-full"> 10 </span>
            </a>
            <a href="" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-green-400 bg-opacity-10 border border-green-400 border-opacity-20 text-green-400 text-sm font-medium no-underline">
                <span class="text-base">⚽</span> Matchs
            </a>
        </nav>

         <form method="POST" action="{{ route('auth.destroy') }}">
                @csrf
                 <button type="submit" class="px-5 py-2 border border-gray-600 rounded-lg text-gray-400 text-sm font-medium hover:border-red-500 hover:text-red-400">
                    Déconnexion
                </button>
            </form>

    <div class="px-4 py-4 border-t border-gray-800 mt-auto">
        <div class="flex items-center gap-3 bg-gray-800 rounded-xl px-3 py-3">
            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold">
                {{ substr(auth()->user()->firstname,0,1)}}
            </div>
            <div>
                <div class="text-sm font-semibold">
                    {{ auth()->user()->firstname  }}
                </div>
                <div class="text-xs text-green-400">Organisateur</div>
            </div>
        </div>
    </div>

</aside>
 

<main class="ml-64 flex-1 flex flex-col">

    <div class="sticky top-0 z-30 flex justify-between items-center px-8 py-4 bg-gray-900 border-b border-gray-800">
        <h1 class="text-xl font-bold text-white">
            Mes Matchs ⚽
        </h1>
    </div>

    <div class="flex-1 px-8 py-8">

        @if(session('success'))
            <div class="mb-4 px-5 py-3 bg-green-950 border border-green-800 rounded-xl text-green-300">
                {{ session('success') }}
            </div>
        @endif

        @forelse($games as $game)

            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 mb-4 hover:border-green-700 transition">

                <div class="flex items-center justify-between mb-3">

                    <div class="text-lg font-bold text-white">
                        {{ $game->equipe1->name_equipe }}
                        <span class="text-gray-500 mx-2">VS</span>
                        {{ $game->equipe2->name_equipe }}
                    </div>
                  <div class="flex flex-col gap-3">

                    <span class="px-3 py-1 text-xs rounded-full font-bold bg-blue-900 text-blue-400">
                        {{ $game->statut }}
                    </span>

                    @if($game->statut == 'en_cours')
                        <a href="{{route('resultats.create',$game)}}" class="px-3 py-1.5 bg-green-400 rounded-lg text-gray-900 text-xs font-bold">
                            + Créer Resultat
                        </a>
                    @elseif($game->statut == 'termine')
                         <a href="{{route('games.show',$game)}}"  class="px-3 py-1.5 bg-yellow-400 rounded-lg text-gray-900 text-xs font-bold hover:bg-yellow-300">
                            voir Resultat
                        </a>
                    @else
                    <form action="{{route('games.demarer',$game)}}"  method="POST" >
                        @csrf
                        @method('put')
                        <button type="submit" class="px-3 py-1.5 bg-green-400 rounded-lg text-gray-900 text-xs font-bold">
                            Démarer Match
                        </button>
                    @endif
                </div>
                </div>

                <div class="text-sm text-gray-400 space-y-1">
                    <div>📅 Date: {{ $game->dateMatch }}</div>
                    <div>⏰ Heure: {{ $game->heure }}</div>
                    <div>📍 Terrain: {{ $game->terrain }}</div>
                    <div>🏆 Tournoi: {{ $game->tournoi->name_tournoi ?? 'N/A' }}</div>
                </div>

            </div>

        @empty
            <div class="text-center py-20 text-gray-500">
                Aucun match trouvé
            </div>
        @endforelse

    </div>

</main>

</body>
</html>