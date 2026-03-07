<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootEvenT — Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center">

    <div class="bg-gray-800 border border-gray-700 rounded-3xl p-10 w-full max-w-md shadow-2xl">

        <!-- Logo -->
        <div class="flex items-center gap-3 mb-8">
            <div class="w-10 h-10 bg-green-400 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 14H9V8h2v8zm4 0h-2V8h2v8z"/>
                </svg>
            </div>
            <span style="font-family:'Bebas Neue',cursive;" class="text-3xl text-green-400 tracking-widest">FootEvenT</span>
        </div>

        <h1 class="text-white text-2xl font-semibold mb-1">Créer un compte 🚀</h1>
        <p class="text-gray-400 text-sm mb-8">Rejoignez la communauté FootEvenT</p>

        @if(session('error'))
            <div class="bg-red-900 border border-red-700 text-red-300 text-sm rounded-xl px-4 py-3 mb-6">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('auth.store') }}" class="space-y-5">
            @csrf

            <!-- Firstname -->
            <div>
                <label class="text-gray-400 text-xs font-medium uppercase tracking-widest mb-2 block">Prénom</label>
                <input
                    type="text"
                    name="firstname"
                     placeholder="Votre prénom"
                    required
                    class="w-full bg-gray-900 border border-gray-700 text-white placeholder-gray-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-400 transition-all"/>
                
            </div>

            <!-- Lastname -->
            <div>
                <label class="text-gray-400 text-xs font-medium uppercase tracking-widest mb-2 block">Nom</label>
                <input
                    type="text"
                    name="lastname"
                     placeholder="Votre nom"
                    required
                    class="w-full bg-gray-900 border border-gray-700 text-white placeholder-gray-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-400 transition-all"/>
                
            </div>

            <!-- Email -->
            <div>
                <label class="text-gray-400 text-xs font-medium uppercase tracking-widest mb-2 block">Email</label>
                <input
                    type="email"
                    name="email"
                     placeholder="votre@email.com"
                    required
                    class="w-full bg-gray-900 border border-gray-700 text-white placeholder-gray-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-400 transition-all"/>
                
            </div>

            <!-- Password -->
            <div>
                <label class="text-gray-400 text-xs font-medium uppercase tracking-widest mb-2 block">Mot de passe</label>
                <input
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required
                    class="w-full bg-gray-900 border border-gray-700 text-white placeholder-gray-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-400 transition-all"/>
               
            </div>

            <!-- Role -->
            <div>
                <label class="text-gray-400 text-xs font-medium uppercase tracking-widest mb-2 block">Rôle</label>
                <select name="role_id" required class="w-full bg-gray-900 border border-gray-700 text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-400 transition-all appearance-none cursor-pointer">
                     @foreach($roles as $role)
                        <option value="{{ $role->id }}" class="text-white bg-gray-900">
                            {{ $role->name}}
                        </option>
                    @endforeach
                </select>
              
            </div>

            <!-- Submit -->
            <button
                type="submit"
                class="w-full bg-green-400 hover:bg-green-300 text-gray-900 font-semibold rounded-xl py-3 text-sm transition-all">
                S'inscrire
            </button>

        </form>

        <a href="{{ route('auth.create') }}">
            <p class="text-center text-gray-500 text-sm mt-6">
                Déjà un compte ? <span class="text-green-400 hover:text-green-300">Se connecter</span>
            </p>
        </a>

    </div>

</body>
</html>