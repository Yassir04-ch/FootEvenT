<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootEvenT — Plateforme de Tournois</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white overflow-x-hidden" style="font-family:'Outfit',sans-serif">

<!-- NAV -->
<nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-16 py-5 bg-gray-900 bg-opacity-90 border-b border-gray-800">
    
    <a href="" class="flex items-center gap-3 no-underline">
        <div class="w-9 h-9 bg-green-400 rounded-full flex items-center justify-center text-lg">⚽</div>
        <span class="text-3xl text-green-400 tracking-widest" style="font-family:'Bebas Neue',cursive">FootEvenT</span>
    </a>

    <ul class="hidden md:flex gap-9 list-none">
        <li><a href="#features" class="text-gray-400 no-underline text-sm font-medium hover:text-white">Fonctionnalités</a></li>
        <li><a href="{{route('tournois.index')}}" class="text-gray-400 no-underline text-sm font-medium hover:text-white">Tournois</a></li>
        <li><a href="#classement" class="text-gray-400 no-underline text-sm font-medium hover:text-white">Classement</a></li>
    </ul>

    @if(!auth()->user())
        <div class="flex gap-3">
            <a href="{{ route('auth.create') }}" class="px-5 py-2 border border-gray-600 rounded-lg text-white text-sm font-medium hover:border-green-400 hover:text-green-400 no-underline">Se connecter</a>
            <a href="{{ route('auth.index') }}" class="px-5 py-2 bg-green-400 rounded-lg text-gray-900 text-sm font-bold hover:bg-green-300 no-underline">S'inscrire</a>
        </div>
    @else
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-3 bg-gray-800 border border-gray-700 rounded-xl px-4 py-2">
                <div class="w-7 h-7 bg-green-400 rounded-full flex items-center justify-center text-gray-900 font-bold text-sm">
                    {{ strtoupper(substr(auth()->user()->firstname, 0, 1)) }}
                </div>
                <div>
                    <div class="text-sm font-semibold text-white leading-none">{{ auth()->user()->firstname }}</div>
                 </div>
            </div>
            <form method="POST" action="{{ route('auth.destroy') }}">
                @csrf
                 <button type="submit" class="px-5 py-2 border border-gray-600 rounded-lg text-gray-400 text-sm font-medium hover:border-red-500 hover:text-red-400">
                    Déconnexion
                </button>
            </form>
        </div>
        @endif
</nav>

<!-- HERO -->
<section class="min-h-screen flex items-center px-16 pt-32 pb-20 bg-gray-900 relative overflow-hidden">
    <!-- grid lines -->
    <div class="absolute inset-0 opacity-5">
        <div class="w-full h-full" style="background-image:linear-gradient(rgba(74,222,128,0.4) 1px,transparent 1px),linear-gradient(90deg,rgba(74,222,128,0.4) 1px,transparent 1px);background-size:60px 60px"></div>
    </div>
    <!-- glow -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-green-400 rounded-full opacity-5 filter blur-3xl"></div>

    <div class="relative z-10 max-w-2xl">
        <div class="inline-flex items-center gap-2 bg-green-900 border border-green-700 rounded-full px-4 py-1.5 text-xs font-semibold text-green-400 tracking-widest uppercase mb-7">
            <span class="w-1.5 h-1.5 bg-green-400 rounded-full inline-block"></span>
            Plateforme #1 de tournois
        </div>
        <h1 class="leading-none tracking-wide mb-6 text-white" style="font-family:'Bebas Neue',cursive;font-size:clamp(4rem,8vw,7rem)">
            ORGANISEZ<br>
            VOS <span class="text-green-400">TOURNOIS</span><br>
            FOOTBALL
        </h1>
        <p class="text-gray-400 text-lg leading-relaxed max-w-lg mb-10 font-light">
            Créez, gérez et suivez vos tournois de football en temps réel. Inscrivez vos équipes, planifiez les matchs et consultez les classements.
        </p>
        <div class="flex gap-4 items-center flex-wrap">
            <a href="register.html" class="flex items-center gap-2 px-8 py-3 bg-green-400 rounded-xl text-gray-900 font-bold text-base hover:bg-green-300 no-underline">
                Commencer gratuitement →
            </a>
            <a href="{{route('tournois.index')}}" class="px-8 py-3 border border-gray-600 rounded-xl text-white font-medium text-base hover:border-gray-400 no-underline">Voir les tournois</a>
        </div>
    </div>
</section>

<!-- STATS -->
<div class="grid grid-cols-2 md:grid-cols-4 border-t border-b border-gray-800 px-16 py-8 bg-gray-800">
    <div class="text-center px-5 border-r border-gray-700">
        <div class="text-5xl text-green-400 tracking-widest leading-none font-bold" style="font-family:'Bebas Neue',cursive">24+</div>
        <div class="text-gray-400 text-xs uppercase tracking-widest mt-1">Tournois actifs</div>
    </div>
    <div class="text-center px-5 border-r border-gray-700">
        <div class="text-5xl text-green-400 tracking-widest leading-none font-bold" style="font-family:'Bebas Neue',cursive">180+</div>
        <div class="text-gray-400 text-xs uppercase tracking-widest mt-1">Équipes inscrites</div>
    </div>
    <div class="text-center px-5 border-r border-gray-700">
        <div class="text-5xl text-green-400 tracking-widest leading-none font-bold" style="font-family:'Bebas Neue',cursive">1.2K+</div>
        <div class="text-gray-400 text-xs uppercase tracking-widest mt-1">Joueurs enregistrés</div>
    </div>
    <div class="text-center px-5">
        <div class="text-5xl text-green-400 tracking-widest leading-none font-bold" style="font-family:'Bebas Neue',cursive">340+</div>
        <div class="text-gray-400 text-xs uppercase tracking-widest mt-1">Matchs joués</div>
    </div>
</div>

<!-- FEATURES -->
<section class="max-w-6xl mx-auto px-16 py-24" id="features">
    <div class="text-xs font-bold text-green-400 uppercase tracking-widest mb-4">Fonctionnalités</div>
    <h2 class="text-5xl md:text-6xl tracking-wide mb-4 text-white" style="font-family:'Bebas Neue',cursive">TOUT CE DONT<br>VOUS AVEZ BESOIN</h2>
    <p class="text-gray-400 text-base leading-relaxed max-w-lg mb-14 font-light">Une plateforme complète pour gérer vos compétitions football de A à Z.</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

        <div class="rounded-2xl p-8 border border-gray-700 bg-gray-800 hover:border-green-700 transition-all">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center text-2xl mb-5 bg-green-900 border border-green-800">🏆</div>
            <div class="text-white font-semibold text-base mb-2">Gestion des tournois</div>
            <div class="text-gray-400 text-sm leading-relaxed font-light">Créez et configurez vos tournois, définissez le nombre d'équipes, les dates et les règles.</div>
        </div>

        <div class="rounded-2xl p-8 border border-gray-700 bg-gray-800 hover:border-green-700 transition-all">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center text-2xl mb-5 bg-green-900 border border-green-800">👥</div>
            <div class="text-white font-semibold text-base mb-2">Gestion des équipes</div>
            <div class="text-gray-400 text-sm leading-relaxed font-light">Inscrivez vos équipes, gérez les joueurs et suivez les performances tout au long de la saison.</div>
        </div>

        <div class="rounded-2xl p-8 border border-gray-700 bg-gray-800 hover:border-green-700 transition-all">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center text-2xl mb-5 bg-green-900 border border-green-800">📅</div>
            <div class="text-white font-semibold text-base mb-2">Planification des matchs</div>
            <div class="text-gray-400 text-sm leading-relaxed font-light">Générez automatiquement le calendrier des matchs et gérez les terrains et les horaires.</div>
        </div>

        <div class="rounded-2xl p-8 border border-gray-700 bg-gray-800 hover:border-green-700 transition-all">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center text-2xl mb-5 bg-green-900 border border-green-800">📊</div>
            <div class="text-white font-semibold text-base mb-2">Résultats en temps réel</div>
            <div class="text-gray-400 text-sm leading-relaxed font-light">Saisissez les scores en direct et consultez les classements mis à jour automatiquement.</div>
        </div>

        <div class="rounded-2xl p-8 border border-gray-700 bg-gray-800 hover:border-green-700 transition-all">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center text-2xl mb-5 bg-green-900 border border-green-800">🔔</div>
            <div class="text-white font-semibold text-base mb-2">Notifications</div>
            <div class="text-gray-400 text-sm leading-relaxed font-light">Recevez des alertes pour les matchs à venir, les résultats et les mises à jour importantes.</div>
        </div>

        <div class="rounded-2xl p-8 border border-gray-700 bg-gray-800 hover:border-green-700 transition-all">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center text-2xl mb-5 bg-green-900 border border-green-800">🛡️</div>
            <div class="text-white font-semibold text-base mb-2">Gestion des rôles</div>
            <div class="text-gray-400 text-sm leading-relaxed font-light">Admin, organisateur, joueur — chaque utilisateur a accès aux fonctionnalités adaptées à son rôle.</div>
        </div>

    </div>
</section>

<!-- TOURNOIS -->
<section class="max-w-6xl mx-auto px-16 pb-24" id="tournois">
    <div class="flex justify-between items-end mb-10">
        <div>
            <div class="text-xs font-bold text-green-400 uppercase tracking-widest mb-3">Compétitions</div>
            <h2 class="text-5xl md:text-6xl tracking-wide text-white" style="font-family:'Bebas Neue',cursive">TOURNOIS EN COURS</h2>
        </div>
        <a href="#" class="px-5 py-2 border border-gray-600 rounded-lg text-white text-sm hover:border-green-400 hover:text-green-400 no-underline">Voir tous →</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

        <!-- Tournoi 1 -->
        <div class="rounded-2xl overflow-hidden border border-gray-700 bg-gray-800 hover:border-green-700 transition-all">
            <div class="h-24 relative flex items-center justify-center text-5xl bg-green-900">
                ⚽
                <span class="absolute top-3 right-3 px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wide bg-green-900 text-green-400 border border-green-700">En cours</span>
            </div>
            <div class="p-5">
                <div class="font-semibold text-base mb-2">Championnat Regional 2026</div>
                <div class="flex gap-4 mb-4">
                    <span class="text-gray-400 text-xs">📍 Casablanca</span>
                    <span class="text-gray-400 text-xs">📅 30/03/2026</span>
                </div>
                <div class="rounded-full h-1 mb-2 overflow-hidden bg-gray-700">
                    <div class="h-full bg-green-400 rounded-full w-2/3"></div>
                </div>
                <div class="flex justify-between text-xs text-gray-400">
                    <span>16 équipes</span><span>65% complété</span>
                </div>
            </div>
        </div>

        <!-- Tournoi 2 -->
        <div class="rounded-2xl overflow-hidden border border-gray-700 bg-gray-800 hover:border-blue-700 transition-all">
            <div class="h-24 relative flex items-center justify-center text-5xl bg-blue-900">
                🥅
                <span class="absolute top-3 right-3 px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wide bg-blue-900 text-blue-400 border border-blue-700">Inscriptions ouvertes</span>
            </div>
            <div class="p-5">
                <div class="font-semibold text-base mb-2">Coupe de Printemps</div>
                <div class="flex gap-4 mb-4">
                    <span class="text-gray-400 text-xs">📍 Rabat</span>
                    <span class="text-gray-400 text-xs">📅 15/04/2026</span>
                </div>
                <div class="rounded-full h-1 mb-2 overflow-hidden bg-gray-700">
                    <div class="h-full bg-blue-400 rounded-full w-2/5"></div>
                </div>
                <div class="flex justify-between text-xs text-gray-400">
                    <span>8/12 équipes</span><span>Inscriptions ouvertes</span>
                </div>
            </div>
        </div>

        <!-- Tournoi 3 -->
        <div class="rounded-2xl overflow-hidden border border-gray-700 bg-gray-800 hover:border-yellow-700 transition-all">
            <div class="h-24 relative flex items-center justify-center text-5xl bg-yellow-900">
                🏅
                <span class="absolute top-3 right-3 px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wide bg-yellow-900 text-yellow-400 border border-yellow-700">Bientôt</span>
            </div>
            <div class="p-5">
                <div class="font-semibold text-base mb-2">Tournoi de l'Été 2026</div>
                <div class="flex gap-4 mb-4">
                    <span class="text-gray-400 text-xs">📍 Marrakech</span>
                    <span class="text-gray-400 text-xs">📅 01/06/2026</span>
                </div>
                <div class="rounded-full h-1 mb-2 overflow-hidden bg-gray-700">
                    <div class="h-full bg-yellow-400 rounded-full w-1/5"></div>
                </div>
                <div class="flex justify-between text-xs text-gray-400">
                    <span>4/16 équipes</span><span>Inscriptions bientôt</span>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- CTA -->
@if(!auth()->user())
<div class="mx-16 mb-24 rounded-3xl p-20 text-center border border-green-900 bg-green-900 bg-opacity-10">
    <h2 class="tracking-widest mb-4 text-white" style="font-family:'Bebas Neue',cursive;font-size:clamp(2.5rem,5vw,4.5rem)">PRÊT À JOUER ?</h2>
    <p class="text-gray-400 text-base mb-9 font-light">Rejoignez des centaines d'équipes sur FootEvenT et participez aux meilleurs tournois.</p>
    <div class="flex gap-4 justify-center flex-wrap">
        <a href="{{route('auth.index')}}" class="px-8 py-3.5 bg-green-400 rounded-xl text-gray-900 font-bold hover:bg-green-300 no-underline">Créer mon compte gratuitement</a>
        <a href="{{route('auth.create')}}" class="px-8 py-3.5 border border-gray-600 rounded-xl text-white font-medium hover:border-gray-400 no-underline">Se connecter</a>
    </div>
</div>
@endif


</body>
</html>