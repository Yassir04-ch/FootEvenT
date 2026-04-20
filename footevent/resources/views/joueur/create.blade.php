<!-- resources/views/joueurs/create.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootEvenT — Créer Joueur</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-gray-100 min-h-screen" style="font-family:'Outfit',sans-serif">

    <nav class="sticky top-0 z-50 flex items-center justify-between px-8 h-16 bg-gray-950/80 backdrop-blur border-b border-gray-800">
        <div class="text-2xl text-green-400 font-bold" style="font-family:'Bebas Neue',cursive">FootEvenT</div>
        <div class="flex items-center gap-2 text-sm text-gray-400">
            {{ auth()->user()->name }}
        </div>
    </nav>

    <div class="max-w-lg mx-auto px-8 py-12">

        <h1 class="text-3xl font-bold mb-4 text-green-400">Créer votre profil Joueur</h1>
        <p class="text-sm text-gray-400 mb-8">Remplissez vos informations pour participer aux équipes.</p>

        @if(session('error'))
            <div class="mb-4 p-4 bg-red-950 border border-red-900 rounded-xl text-red-400 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('joueurs.store') }}" class="space-y-5 bg-gray-900 p-6 rounded-2xl border border-gray-800">
            @csrf

            <div>
                <label for="poste" class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-2">Poste <span class="text-green-400">*</span></label>
                <select name="poste" id="poste"
                    class="w-full bg-gray-950 border border-gray-700 text-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all">
                    <option value=""> Choisir un poste </option>
                    <option value="attaquant">Attaquant</option>
                    <option value="defenseur">Défenseur</option>
                    <option value="milieu">Milieu</option>
                    <option value="gardien">Gardien</option>
                </select>
                <p id="errorPoste" class="text-red-400 text-xs mt-1 hidden">Le poste est requis.</p>
            </div>

            <div>
                <label for="age" class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-2">Âge <span class="text-green-400">*</span></label>
                <input type="number" name="age" id="age" placeholder="ex: 20" min="12" max="60"
                    class="w-full bg-gray-950 border border-gray-700 text-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all" />
             </div>

            <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-green-400 hover:bg-green-300 text-gray-950 font-semibold text-sm rounded-xl transition-colors">
                Créer mon profil
            </button>
        </form>
    </div>

</body>
</html>