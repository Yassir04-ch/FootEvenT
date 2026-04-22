<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Détail Match</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 text-gray-100 font-outfit min-h-screen">

<div class="px-8 py-10 max-w-4xl mx-auto">

    <a href="{{route('games.index')}}" class="text-sm text-gray-400 hover:text-green-400 mb-6 inline-block">
        ← Retour
    </a>


    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">


       <div class="h-1.5 bg-gradient-to-r from-blue-900 to-blue-600"></div>

        <div class="p-6">


            <div class="flex justify-between mb-4">
                <span class="text-xs text-green-400 uppercase">
                    {{$game->statut}}
                </span>
            </div>


            <h2 class="text-2xl font-bold mb-2">
                {{$game->tournoi->name_tournoi}}
            </h2>


            <p class="text-sm text-gray-400 mb-1">
                📍 {{$game->terrain}}
            </p>
            <p class="text-sm text-gray-400 mb-6">
                {{$game->dateMatch}} - {{$game->heure}}
            </p>

            <div class="flex items-center justify-between text-center mb-8">

                <div class="flex-1">
                    <h3 class="text-lg font-semibold">
                        {{$game->equipe1->name_equipe}}
                    </h3>
                </div>

                <div class="px-6 text-3xl font-bold text-green-400">

                    @if($game->resultat)
                        {{$game->resultat->scoreEq1}} - {{$game->resultat->scoreEq2}}
                    @else
                        VS
                    @endif

                </div>

                <div class="flex-1">
                    <h3 class="text-lg font-semibold">
                        {{$game->equipe2->name_equipe}}
                    </h3>
                </div>

            </div>


            <div class="bg-gray-950 border border-gray-800 rounded-xl p-4">

                @if($game->resultat)

                    <p class="text-sm text-gray-400 mb-2">Résultat</p>

                    <p class="text-lg font-semibold">
                        {{$game->resultat->scoreEq1}} - {{$game->resultat->scoreEq2}}
                    </p>

                    <p class="mt-3 text-green-400 font-medium">
                        @if($game->resultat->scoreEq1 > $game->resultat->scoreEq2)
                            🏆 {{$game->equipe1->name_equipe}} gagne
                        @elseif($game->resultat->scoreEq1 < $game->resultat->scoreEq2)
                            🏆 {{$game->equipe2->name_equipe}} gagne
                        @endif
                    </p>

                @else
                    <p class="text-gray-500 text-sm">
                         Ce match pas encore été joué
                    </p>
                @endif

            </div>

        </div>
    </div>

</div>

</body>
</html>