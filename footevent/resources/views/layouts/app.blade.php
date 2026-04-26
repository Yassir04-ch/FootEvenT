<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'FootEvenT')</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  @stack('styles')
</head>
<body class="bg-[#0a0c10] text-gray-100 min-h-screen" style="font-family:'Outfit',sans-serif">

  <nav class="sticky top-0 z-50 flex items-center justify-between px-8 h-20 bg-black/60 backdrop-blur-xl border-b border-white/5">
    <a href="{{ route('tournois.index') }}" class="flex items-center gap-3">
      <div class="w-10 h-10 bg-green-500 flex items-center justify-center shadow-[0_0_15px_rgba(34,197,94,0.3)]" style="transform:skewX(-8deg)">
        <span style="transform:skewX(8deg)" class="text-black font-black text-xl italic uppercase">F</span>
      </div>
      <span class="font-bebas text-3xl text-white tracking-widest italic" style="font-family:'Bebas Neue'">
        Foot<span class="text-green-500">EvenT</span>
      </span>
    </a>

    <div class="hidden md:flex items-center gap-1">
      <a href="{{ route('tournois.index') }}"
         class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest transition-all
                {{ request()->routeIs('tournois.*') ? 'bg-green-500/10 text-green-500 border border-green-500/20' : 'text-gray-400 hover:text-white' }}">
        Tournois
      </a>
      <a href="{{ route('equipes.index') }}"
         class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest transition-all
                {{ request()->routeIs('equipes.*') ? 'bg-green-500/10 text-green-500 border border-green-500/20' : 'text-gray-400 hover:text-white' }}">
        Équipes
      </a>
      <a href="{{ route('games.index') }}"
         class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest transition-all
                {{ request()->routeIs('games.*') ? 'bg-green-500/10 text-green-500 border border-green-500/20' : 'text-gray-400 hover:text-white' }}">
        Matchs
      </a>
      <a href="{{ route('joueurs.joueurs') }}"
         class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest transition-all
                {{ request()->routeIs('joueurs.*') ? 'bg-green-500/10 text-green-500 border border-green-500/20' : 'text-gray-400 hover:text-white' }}">
        Joueurs
      </a>
      <a href="{{ route('rankings.index') }}"
         class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest transition-all
                {{ request()->routeIs('rankings.*') ? 'bg-green-500/10 text-green-500 border border-green-500/20' : 'text-gray-400 hover:text-white' }}">
        Classement
      </a>
      @if(auth()->check())
        <a href="{{ route('auth.profile') }}"
           class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest transition-all
                  {{ request()->routeIs('auth.profile') ? 'bg-green-500/10 text-green-500 border border-green-500/20' : 'text-gray-400 hover:text-white' }}">
          Profile
        </a>
      @endif

      @yield('nav-links')
    </div>

    <div class="flex items-center gap-3">
    
      @if(!auth()->check())
        <a href="{{ route('auth.create') }}"
           class="text-xs font-black uppercase tracking-[0.2em] hover:text-green-500 transition-colors italic">
          Connexion
        </a>
        <a href="{{ route('auth.index') }}"
           class="px-5 py-2.5 bg-green-500 text-black text-xs font-black uppercase tracking-widest hover:bg-white transition-colors"
           style="transform:skewX(-8deg)">
          <span style="transform:skewX(8deg)" class="inline-block">S'inscrire</span>
        </a>
      @else
        <div class="flex items-center gap-2 bg-white/5 border border-white/10 rounded-xl px-3 py-2">
          <div class="w-7 h-7 bg-green-500 rounded-full flex items-center justify-center text-black font-black text-xs">
            {{ strtoupper(substr(auth()->user()->firstname, 0, 1)) }}
          </div>
          <div class="text-xs font-semibold text-white leading-none">{{ auth()->user()->firstname }}</div>
        </div>

        <form action="{{ route('auth.destroy') }}" method="POST">
          @csrf
          <button type="submit"
                  class="px-4 py-2 border border-white/10 rounded-lg text-gray-400 text-xs font-bold uppercase hover:border-red-500 hover:text-red-400 transition-colors">
            Déconnexion
          </button>
        </form>
      @endif
    </div>
  </nav>

  @if(session('success'))
  <div class="px-8 pt-4">
    <div class="flex items-center gap-3 px-5 py-4 bg-green-950 border border-green-800 rounded-2xl">
      <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
      </svg>
      <p class="text-sm text-green-300 font-medium">{{ session('success') }}</p>
    </div>
  </div>
  @endif
  @if(session('error'))
  <div class="px-8 pt-4">
    <div class="flex items-center gap-3 px-5 py-4 bg-red-950 border border-red-800 rounded-2xl">
      <svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
      </svg>
      <p class="text-sm text-red-300 font-medium">{{ session('error') }}</p>
    </div>
  </div>
  @endif
  @yield('content')
</body>
</html>