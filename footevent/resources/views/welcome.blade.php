<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootEvenT — Pro Tournament Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;600;900&display=swap" rel="stylesheet">
</head>
<body class="bg-[#0a0c10] text-white font-['Outfit'] overflow-x-hidden">

    <nav class="fixed top-0 w-full z-50 px-6 md:px-16 py-6 flex items-center justify-between backdrop-blur-md bg-black/40 border-b border-white/5">
        <a href="" class="flex items-center gap-2 group">
            <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center rotate-12 group-hover:rotate-0 transition-transform duration-300">
                <span class="text-black text-xl italic font-black text-2xl uppercase">F</span>
            </div>
            <span class="text-3xl font-bold tracking-tighter uppercase italic" style="font-family:'Bebas Neue'">Foot<span class="text-green-500">EvenT</span></span>
        </a>

    <div class="flex items-center gap-1">
      <a href="{{route('tournois.index')}}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Tournois</a>
      <a href="{{route('equipes.index')}}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Équipes</a>
      <a href="{{route('games.index')}}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Matchs</a>
      <a href="{{route('joueurs.joueurs')}}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Joueurs</a>
      <a href="{{route('rankings.index')}}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Ranking</a>
      @if(auth()->user())
      <a href="{{route('auth.profile')}}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-400 hover:text-gray-100 hover:bg-gray-800 transition-colors">Profile</a>
      @endif
    </div>

        <div class="flex items-center gap-4">
           <a href="{{ route('auth.create') }}"><button class="text-sm font-bold uppercase tracking-widest hover:text-green-400">Login</button></a>
           <a href="{{ route('auth.index') }}"><button class="skew-btn bg-green-500 px-6 py-2 text-black font-black uppercase text-xs hover:bg-white transition-colors"><span>S'inscrire</span></button></a>
        </div>
    </nav>

    <section class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0c10]/60 via-[#0a0c10]/90 to-[#0a0c10] z-10"></div>
            <img src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?auto=format&fit=crop&q=80&w=2000" 
                 class="w-full h-full object-cover opacity-40 scale-110" alt="Stadium">
        </div>

        <div class="football-grid absolute inset-0"></div>

        <div class="relative z-20 text-center px-4">

            <h1 class="text-7xl md:text-[10rem] leading-[0.8] font-black italic uppercase tracking-tighter mb-8" style="font-family:'Bebas Neue'">
                DOMINE LE <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-emerald-600 text-glow">TERRAIN</span>
            </h1>

            <p class="max-w-xl mx-auto text-gray-400 text-lg md:text-xl font-light mb-12">
                Organisez vos tournois avec une précision professionnelle. Statistiques en temps réel, gestion d'équipes et trophées digitaux.
            </p>

            <div class="flex flex-col md:flex-row gap-6 justify-center items-center">
                <a href="{{ route('auth.create') }}">
                  <button class="skew-btn w-full md:w-auto bg-green-500 px-12 py-5 text-black font-black uppercase tracking-widest text-lg hover:bg-white hover:scale-105 transition-all shadow-[0_20px_50px_rgba(34,200,94,0.2)]">
                    <span>Login</span>
                  </button>
                </a>
                <a href="{{ route('auth.index') }}"> 
                  <button class="skew-btn w-full md:w-auto border-2 border-white/20 px-12 py-5 text-white font-black uppercase tracking-widest text-lg hover:bg-white/10 transition-all">
                    <span>S'inscrire</span>
                  </button>
                </a>
            </div>
        </div>

        <div class="absolute bottom-10 left-10 hidden lg:block opacity-20">
            <p class="text-[10vw] font-black italic text-transparent stroke-text" style="-webkit-text-stroke: 1px white;">FOOTBALL</p>
        </div>
    </section>

    <div class="relative z-30 grid grid-cols-2 md:grid-cols-4 border-y border-white/5 bg-black">
        <div class="p-10 border-r border-white/5 text-center group hover:bg-green-500/5 transition-colors">
            <h3 class="text-5xl font-black text-green-500 mb-2" style="font-family:'Bebas Neue'">240+</h3>
            <p class="text-[10px] uppercase tracking-[0.2em] text-gray-500 font-bold">Matchs du jour</p>
        </div>
        <div class="p-10 border-r border-white/5 text-center group hover:bg-green-500/5 transition-colors">
            <h3 class="text-5xl font-black text-white mb-2" style="font-family:'Bebas Neue'">1.8K</h3>
            <p class="text-[10px] uppercase tracking-[0.2em] text-gray-500 font-bold">Equipes</p>
        </div>
        <div class="p-10 border-r border-white/5 text-center group hover:bg-green-500/5 transition-colors">
            <h3 class="text-5xl font-black text-white mb-2" style="font-family:'Bebas Neue'">50</h3>
            <p class="text-[10px] uppercase tracking-[0.2em] text-gray-500 font-bold">Stades</p>
        </div>
        <div class="p-10 text-center group hover:bg-green-500/5 transition-colors">
            <h3 class="text-5xl font-black text-white mb-2" style="font-family:'Bebas Neue'">12M</h3>
            <p class="text-[10px] uppercase tracking-[0.2em] text-gray-500 font-bold">Fans</p>
        </div>
    </div>

</body>
</html>