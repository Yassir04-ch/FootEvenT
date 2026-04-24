<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FootEvenT — Équipes</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-gray-100 font-outfit min-h-screen">

  <nav class="sticky top-0 z-50 flex items-center justify-between px-8 h-16 bg-gray-950/80 backdrop-blur border-b border-gray-800">
       <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-500 skew-element flex items-center justify-center shadow-[0_0_15px_rgba(34,197,94,0.3)]">
                <span class="skew-inner text-black font-black text-xl italic uppercase">F</span>
            </div>
            <span class="font-bebas text-3xl text-white tracking-widest italic">Foot<span class="text-green-500">EvenT</span></span>
        </div>

   <div class="hidden md:flex items-center gap-2">
      <a href="{{route('tournois.index')}}" class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-white transition-all">Tournois</a>
      <a href="" class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest bg-green-500/10 text-green-500 border border-green-500/20">Équipes</a>
      <a href="{{route('games.index')}}" class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-white transition-all">Matchs</a>
      <a href="{{route('joueurs.joueurs')}}" class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-white transition-all">Joueurs</a>
      @if(auth()->user())
      <a href="{{route('auth.profile')}}" class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-white transition-all">Profile</a>
      @endif
  </div>

    <div class="flex items-center gap-3">
      @if(!auth()->user())
                <a href="{{route('auth.create')}}" class="text-xs font-black uppercase tracking-[0.2em] hover:text-green-500 transition-colors italic">Connexion</a>
      @endif
      @if(auth()->check() && auth()->user()->role->name == "joueur")
        <a href="{{route('equipes.create')}}" class="px-4 py-2 rounded-lg text-sm font-semibold bg-green-400 text-gray-950 hover:bg-green-300 transition-colors">+ Créer une équipe</a>
      @endif
    </div>
  </nav>

  @if(session('success'))
  <div class="px-8 pt-4">
    <div class="flex items-center gap-3 px-5 py-4 bg-green-950 border border-green-800 rounded-2xl">
      <div class="w-8 h-8 rounded-lg bg-green-900 border border-green-700 flex items-center justify-center flex-shrink-0">
        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
        </svg>
      </div>
      <p class="text-sm text-green-300 font-medium flex-1">{{ session('success') }}</p>
    </div>
  </div>
  @endif

  @if(session('error'))
  <div class="px-8 pt-4">
    <div class="flex items-center gap-3 px-5 py-4 bg-red-950 border border-red-800 rounded-2xl">
      <div class="w-8 h-8 rounded-lg bg-red-900 border border-red-700 flex items-center justify-center flex-shrink-0">
        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </div>
      <p class="text-sm text-red-300 font-medium flex-1">{{ session('error') }}</p>
    </div>
  </div>
  @endif

  <section class="px-8 pt-16 pb-10 flex items-end justify-between gap-8">
    <div>
      <h1 class="font-bebas text-7xl leading-none tracking-wide mb-4">
        Toutes les<br>
        <span class="text-green-400">Équipes</span>
      </h1>
      <p class="text-sm text-gray-400 font-light max-w-sm leading-relaxed">
        Retrouvez toutes les équipes inscrites sur la plateforme et suivez leurs performances.
      </p>
    </div>

    <div class="flex-shrink-0 grid grid-cols-2 divide-x divide-gray-800 border border-gray-800 rounded-2xl overflow-hidden">
      <div class="px-8 py-5 bg-gray-900 text-center">
        <div class="font-bebas text-4xl text-green-400 leading-none mb-1">{{ $equipes->count() }}</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">Équipes</div>
      </div>
      <div class="px-8 py-5 bg-gray-900 text-center">
        <div class="font-bebas text-4xl text-green-400 leading-none mb-1">{{$joueurcount}}</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">Joueurs</div>
      </div>
    </div>
  </section>

   <div class="px-8 pb-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($equipes as $equipe)
      <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden hover:border-green-800 hover:-translate-y-1 transition-all duration-200">

        <div class="relative h-36 bg-gray-800 overflow-hidden">
          @if($equipe->image)
            <img src="{{ asset('storage/' . $equipe->image) }}" alt="{{ $equipe->name_equipe }}" class="w-full h-full object-cover opacity-70">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-gray-900"></div>
          @else
            <div class="w-full h-full flex items-center justify-center">
              <svg class="w-12 h-12 text-gray-700" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/>
              </svg>
            </div>
          @endif

          <span class="absolute top-2.5 right-2.5 flex items-center gap-1 text-xs text-gray-400 bg-black/50 border border-gray-700 rounded-full px-2.5 py-1">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/>
            </svg>
            {{ $equipe->joueurs->count() }} joueurs
          </span>
        </div>

        <div class="p-5">
          @if($equipe->tournois)
            @foreach($equipe->tournois as $tournoi)
            <p class="text-xs text-gray-500 mb-2">🏆 {{ $tournoi->name_tournoi }}</p>
            @endforeach
           @endif
          <h2 class="font-bebas text-2xl tracking-wide leading-tight mb-2">{{ $equipe->name_equipe }}</h2>
          <p class="text-xs text-gray-400 leading-relaxed line-clamp-2">{{ $equipe->description }}</p>
        </div>


        <div class="px-5 py-3 flex items-center justify-between border-t border-gray-800">
          <div class="flex items-center gap-2 text-xs text-gray-400">
            <div class="w-6 h-6 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">
              {{ substr($equipe->capitaine->firstname, 0, 1) }}{{ substr($equipe->capitaine->lastname, 0, 1) }}
            </div>
            {{ $equipe->capitaine->firstname }} {{ $equipe->capitaine->lastname }}
          </div>
          <a href="{{ route('equipes.show', $equipe) }}" class="flex items-center gap-1 text-xs font-medium px-3 py-1.5 rounded-lg border border-gray-700 text-gray-300 hover:border-green-600 hover:text-green-400 transition-colors">
            Voir
            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
        </div>
      </div>

      @empty
      <div class="col-span-3 flex flex-col items-center justify-center py-24 text-gray-600">
        <svg class="w-16 h-16 mb-4 opacity-30" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/>
        </svg>
        <p class="font-bebas text-2xl tracking-wide">Aucune équipe pour l'instant</p>
        <p class="text-sm mt-1">Soyez le premier à créer une équipe !</p>
      </div>
      @endforelse
  </div>

</body>
</html>