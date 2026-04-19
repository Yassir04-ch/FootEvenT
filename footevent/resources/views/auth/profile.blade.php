<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil — FootEvenT</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white" style="font-family:'Outfit',sans-serif">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gray-950 border-r border-gray-800 flex flex-col fixed top-0 left-0 h-full z-40" style="background:#070a0f">

        <div class="px-6 py-6 border-b border-gray-800">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center">⚽</div>
                <span class="text-xl text-green-400 tracking-widest" style="font-family:'Bebas Neue'">FootEvenT</span>
            </div>
        </div>

        <nav class="flex-1 px-4 py-6 flex flex-col gap-1">
          @if(auth()->user()->role->name == 'Organisateur')
            <a href="{{route('organisateur.index')}}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 hover:bg-gray-800">Dashboard</a>
          @elseif(auth()->user()->role->name == 'Administrateur')
            <a href="{{route('admin.index')}}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 hover:bg-gray-800">Dashboard</a>
          @else
            <a href="{{route('joueurs.index')}}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 hover:bg-gray-800">Dashboard</a>
         @endif
             <form method="POST" action="{{ route('auth.destroy') }}">
                @csrf
                 <button type="submit" class="px-5 py-2 border border-gray-600 rounded-lg text-gray-400 text-sm font-medium hover:border-red-500 hover:text-red-400">
                    Déconnexion
                </button>
            </form>

            <div class="mt-4"></div>

        </nav>

    </aside>

    <!-- MAIN -->
    <main class="ml-64 flex-1 flex flex-col">

        <!-- TOPBAR -->
        <div class="sticky top-0 z-30 flex items-center justify-between px-8 py-4 bg-gray-900 border-b border-gray-800">

            <div>
                <h1 class="text-xl font-bold">Mon Profil</h1>
                <p class="text-xs text-gray-400">Gestion du compte</p>
            </div>

            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-green-500 rounded-full flex items-center justify-center font-bold">
                    {{ strtoupper(substr($user->firstname,0,1)) }}
                </div>
            </div>

        </div>

        <!-- CONTENT -->
        <div class="flex-1 px-8 py-8">

            <div class="max-w-5xl mx-auto bg-gray-800 border border-gray-700 rounded-2xl p-8">

                <!-- HEADER PROFILE -->
                <div class="flex items-center gap-6 mb-10">

                    <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center text-2xl font-bold">
                        {{ strtoupper(substr($user->firstname,0,1)) }}
                    </div>

                    <div>
                        <h2 class="text-xl font-bold">
                            {{ $user->firstname }} {{ $user->lastname }}
                        </h2>

                        <p class="text-gray-400 text-sm">{{ $user->email }}</p>

                        <div class="flex gap-3 mt-2">

                            <span class="bg-blue-900 text-blue-400 text-xs px-3 py-1 rounded-full">
                                {{ $user->role->name ?? '$User' }}
                            </span>

                            <span class="text-xs px-3 py-1 rounded-full
                                @if($user->status_account == 'active') bg-green-900 text-green-400
                                @else bg-red-900 text-red-400
                                @endif">
                                {{ $user->status_account }}
                            </span>

                        </div>
                    </div>

                </div>

                <!-- STATS -->
                <div class="grid grid-cols-3 gap-6 mb-10">

                    <div class="bg-gray-900 p-5 rounded-xl border border-gray-700">
                        <p class="text-gray-400 text-sm">Tournois</p>
                        <p class="text-2xl font-bold">{{ $user->tournois->count() }}</p>
                    </div>

                    <div class="bg-gray-900 p-5 rounded-xl border border-gray-700">
                        <p class="text-gray-400 text-sm">Notifications</p>
                        <p class="text-2xl font-bold">{{ $user->notifications->count() }}</p>
                    </div>

                    <div class="bg-gray-900 p-5 rounded-xl border border-gray-700">
                        <p class="text-gray-400 text-sm">Statut</p>
                        <p class="text-2xl font-bold">{{ $user->status_account }}</p>
                    </div>

                </div>

                
                <form method="POST" action="{{route('auth.update')}}">
                    @csrf
                    @method('put')

                    <div class="grid grid-cols-2 gap-6">

                        <input type="text" name="firstname" value="{{ $user->firstname }}"
                            class="bg-gray-900 border border-gray-700 rounded-xl px-4 py-2">

                        <input type="text" name="lastname" value="{{ $user->lastname }}"
                            class="bg-gray-900 border border-gray-700 rounded-xl px-4 py-2">

                        <input type="email" name="email" value="{{ $user->email }}"
                            class="col-span-2 bg-gray-900 border border-gray-700 rounded-xl px-4 py-2">

                        <input type="password" name="password" placeholder="Nouveau mot de passe"
                            class="bg-gray-900 border border-gray-700 rounded-xl px-4 py-2">

                        <input type="password" name="password_confirmation" placeholder="Confirmer"
                            class="bg-gray-900 border border-gray-700 rounded-xl px-4 py-2">

                    </div>
                    @if($user->role->name == 'joueur')
                  <div>
                        <label for="poste" class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-2">
                            Poste
                        </label>

                        <select name="poste" id="poste"
                            class="w-full bg-gray-900 border border-gray-700 text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all">
                            <option value="">Choisir un poste</option>
                            <option value="attaquant">Attaquant</option>
                            <option value="defenseur">Défenseur</option>
                            <option value="milieu">Milieu</option>
                            <option value="gardien">Gardien</option>
                        </select>

                        <p id="errorPoste" class="text-red-400 text-xs mt-1 hidden">Le poste est requis.</p>
                    </div>

                    <div>
                        <label for="age" class="block text-xs font-medium text-gray-400 uppercase tracking-widest mb-2">
                            Âge 
                        </label>

                        <input type="number" name="age" id="age" placeholder="ex: 20" min="12" max="60"
                            class="w-full bg-gray-900 border border-gray-700 text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500/20 transition-all" />
                    </div>
                    @endif

                    <div class="mt-8 text-right">
                        <button class="bg-green-400 text-gray-900 px-6 py-2 rounded-xl font-semibold">
                            Sauvegarder
                        </button>
                    </div>
                    

                </form>

            </div>

        </div>

    </main>

</div>

</body>
</html>