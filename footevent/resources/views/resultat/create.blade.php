<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ajouter Résultat</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 text-gray-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-xl bg-gray-900 border border-gray-800 rounded-2xl p-6">

    <h1 class="text-2xl font-bold mb-6 text-green-400">
        Ajouter Résultat du Match
    </h1>

    <form action="{{ route('resultats.store', $game) }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="text-sm text-gray-400">Score {{$game->equipe1->name_equipe}}</label>
            <input type="number" id="scoreEq1" name="scoreEq1" class="w-full mt-1 px-3 py-2 bg-gray-950 border border-gray-700 rounded-lg focus:border-green-500 outline-none" min="0" required>
        </div>

        <div>
            <label class="text-sm text-gray-400">Score {{$game->equipe2->name_equipe}}</label>
            <input type="number" id="scoreEq2" name="scoreEq2" class="w-full mt-1 px-3 py-2 bg-gray-950 border border-gray-700 rounded-lg focus:border-green-500 outline-none" min="0" required>
        </div>

         <div id="penalty" class="hidden space-y-4 mt-4 border-t border-gray-700 pt-4">

            <h2 class="text-green-400 font-bold text-lg">
                Penalty Shootout
            </h2>

            <div>
                <label class="text-sm text-gray-400">Penalties {{$game->equipe1->name_equipe}}</label>
                <input type="number" name="penaltyE1" class="w-full mt-1 px-3 py-2 bg-gray-950 border border-gray-700 rounded-lg focus:border-green-500 outline-none">
                </div>

                <div>
                    <label class="text-sm text-gray-400">Penalties {{$game->equipe2->name_equipe}}</label>
                    <input type="number" name="penaltyE2" class="w-full mt-1 px-3 py-2 bg-gray-950 border border-gray-700 rounded-lg focus:border-green-500 outline-none">
                </div>

            </div>


        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-gray-950 font-bold py-2 rounded-lg transition">
            Enregistrer Résultat
        </button>
    </form>

</div>
<script src="{{asset('js/penalty.js')}}"></script>
</body>
</html>