<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisateur — Tournois</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
</head>
<body class="bg-[#0a0c10] text-gray-100 font-outfit flex min-h-screen">

  <aside class="w-64 border-r border-white/5 flex flex-col fixed top-0 left-0 h-full z-40 glass-sidebar">
        <div class="px-8 py-8">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-9 h-9 bg-green-500 flex items-center justify-center rounded-lg rotate-12 shadow-[0_0_15px_rgba(34,197,94,0.3)]">
                    <span class="text-black font-black text-xl italic uppercase font-bebas">F</span>
                </div>
                <span class="text-2xl font-bebas tracking-widest uppercase italic">Foot<span class="text-green-500">EvenT</span></span>
            </div>
            <div class="flex items-center gap-2 px-1">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                <span class="text-[10px] text-gray-500 font-black uppercase tracking-[0.2em]">Organisateur Panel</span>
            </div>
        </div>

        <nav class="flex-1 px-4 flex flex-col gap-2">
            <p class="text-[10px] text-gray-600 font-black uppercase tracking-[0.3em] px-4 mb-2 italic">Menu Principal</p>
            
            <a href="{{ route('organisateur.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 text-sm font-bold hover:bg-white/5 hover:text-white transition-all group">
                <span class="group-hover:scale-125 transition-transform">📊</span> Dashboard
            </a>
            
            <a href="" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-green-500/10 border border-green-500/20 text-green-500 text-sm font-bold shadow-lg shadow-green-500/5">
                <span class="scale-125">🏆</span> Mes Tournois
            </a>
            
            <a href="{{ route('organisateur.matchs') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 text-sm font-bold hover:bg-white/5 hover:text-white transition-all group">
                <span class="group-hover:scale-125 transition-transform">⚽</span> Matchs
            </a>
            <a href="{{ route('rankings.index') }}"  class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 text-sm font-bold hover:bg-white/5 hover:text-white transition-all group">
                <span class="scale-125">⚽</span> Classement
            </a>
        </nav>

        <div class="p-4 border-t border-white/5 space-y-3">
            <div class="flex items-center gap-3 bg-white/5 rounded-2xl p-3 border border-white/5">
                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-700 rounded-full flex items-center justify-center text-black font-black">
                    {{ strtoupper(substr(auth()->user()->firstname ?? 'K',0,1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-black text-white truncate italic uppercase">{{ auth()->user()->firstname ?? 'Organisateur' }}</p>
                    <p class="text-[9px] text-green-500 font-bold uppercase tracking-widest">Admin Mode</p>
                </div>
            </div>
            
            <form method="POST" action="{{ route('auth.destroy') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border border-red-500/20 text-red-500 text-[10px] font-black uppercase tracking-widest hover:bg-red-500 hover:text-white transition-all">
                    Déconnexion 
                </button>
            </form>
        </div>
    </aside>

    <main class="ml-64 flex-1 flex flex-col min-h-screen">
        <header class="sticky top-0 z-30 flex items-center justify-between px-10 py-6 bg-black/40 backdrop-blur-md border-b border-white/5">
            <div>
                <h2 class="text-xs font-black text-gray-500 uppercase tracking-[0.4em] mb-1 italic">Backoffice</h2>
                <h1 class="text-2xl font-black text-white italic uppercase tracking-tighter">Bonjour, {{ auth()->user()->firstname ?? 'Pro' }} 👋</h1>
            </div>
            <div class="flex items-center gap-6">
                <a href="{{ route('tournois.create') }}" class="group relative px-6 py-2.5 bg-white text-black font-black text-[10px] uppercase tracking-widest rounded-sm transform skew-x-[-12deg] hover:bg-green-500 transition-colors">
                    <span class="inline-block transform skew-x-[12deg]">+ Créer un tournoi</span>
                </a>
            </div>
        </header>

        <div class="p-10 custom-scrollbar overflow-y-auto">
            
            <div class="flex items-center justify-between mb-10">
                <h2 class="font-bebas text-6xl tracking-tighter italic uppercase text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-500">Mes Tournois</h2>
            </div>

            @if(session('success'))
            <div class="mb-8 flex items-center gap-4 px-6 py-4 bg-green-500/10 border-l-4 border-green-500 rounded-r-xl">
                <p class="text-sm text-green-200 font-bold uppercase italic tracking-wide">{{ session('success') }}</p>
            </div>
            @endif

            @if(session('error'))
            <div class="mb-8 flex items-center gap-4 px-6 py-4 bg-red-500/10 border-l-4 border-red-500 rounded-r-xl">
                <p class="text-sm text-red-200 font-bold uppercase italic tracking-wide">{{ session('error') }}</p>
            </div>
            @endif

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                @forelse($tournois as $tournoi)
                <div class="group relative bg-[#11141b] border border-white/5 rounded-3xl overflow-hidden hover:border-green-500/30 transition-all duration-300">
                    
                    <div class="p-8">
                        <div class="flex items-start justify-between mb-6">
                            <div>
                                <span class="text-[9px] font-black uppercase tracking-[0.3em] text-green-500 mb-2 block italic">ID: #00{{ $tournoi->id }}</span>
                                <h3 class="text-3xl font-bebas tracking-wide text-white uppercase italic">{{ $tournoi->name_tournoi }}</h3>
                            </div>
                            <div class="px-4 py-1.5 rounded-full bg-white/5 border border-white/10 text-[9px] font-black uppercase tracking-widest text-gray-400 group-hover:border-green-500/50 group-hover:text-green-400 transition-colors">
                                {{ $tournoi->status }}
                            </div>
                        </div>

                        <p class="text-gray-500 text-sm font-light mb-8 line-clamp-2 italic leading-relaxed">
                            {{ $tournoi->description ?? 'Aucune description fournie pour ce tournoi.' }}
                        </p>

                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div class="bg-black/30 p-4 rounded-2xl border border-white/5 text-center">
                                <p class="text-[8px] font-black text-gray-600 uppercase tracking-widest mb-1">Inscrites</p>
                                <p class="text-2xl font-bebas text-white tracking-widest">{{ $tournoi->equipes->count() }}</p>
                            </div>
                            <div class="bg-black/30 p-4 rounded-2xl border border-white/5 text-center">
                                <p class="text-[8px] font-black text-green-600 uppercase tracking-widest mb-1">Validées</p>
                                <p class="text-2xl font-bebas text-green-500 tracking-widest">{{ $tournoi->equipesValidees->count() }}<span class="text-gray-700 text-sm ml-1">/{{ $tournoi->nbEquipes }}</span></p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            @if($tournoi->status == 'en_attente')
                                <form action="{{route('tournois.demarer',$tournoi)}}" method="POST" class="flex-1">
                                    @csrf @method('put')
                                    <button class="w-full py-3 bg-green-500 hover:bg-white text-black font-black text-[10px] uppercase tracking-[0.2em] transition-all rounded-sm transform skew-x-[-12deg]">
                                        <span class="inline-block transform skew-x-[12deg]">Démarrer</span>
                                    </button>
                                </form>
                                <a href="{{ route('tournois.edit', $tournoi) }}" class="p-3 bg-white/5 border border-white/10 rounded-xl hover:bg-white/10 transition-all">⚙️</a>
                            @elseif($tournoi->status == 'en_cours')
                                <form action="{{route('tournois.terminer',$tournoi)}}" method="POST" class="flex-1">
                                    @csrf @method('put')
                                    <button class="w-full py-3 bg-red-600 hover:bg-red-500 text-white font-black text-[10px] uppercase tracking-[0.2em] transition-all rounded-sm transform skew-x-[-12deg]">
                                        <span class="inline-block transform skew-x-[12deg]">Terminer</span>
                                    </button>
                                </form>
                                <a href="{{ route('games.create', $tournoi) }}" class="flex-[0.5] py-3 bg-yellow-500 hover:bg-yellow-400 text-black text-center font-black text-[10px] uppercase tracking-[0.2em] rounded-sm transform skew-x-[-12deg]">
                                    <span class="inline-block transform skew-x-[12deg]">+ Match</span>
                                </a>
                            @endif
                            
                            <a href="{{ route('tournoi.equipe', $tournoi->id) }}" class="p-3 bg-blue-600 hover:bg-blue-500 text-white rounded-xl shadow-lg shadow-blue-900/20 transition-all">
                                👥
                            </a>
                        </div>
                    </div>

                    <div class="absolute top-0 right-0 p-8 opacity-[0.03] pointer-events-none group-hover:opacity-10 transition-opacity">
                        <span class="text-8xl font-black italic">#{{ $loop->iteration }}</span>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-20 text-center bg-white/5 rounded-3xl border border-dashed border-white/10">
                    <p class="text-gray-500 font-bold uppercase tracking-[0.3em] italic">Aucun tournoi pour le moment.</p>
                </div>
                @endforelse
            </div>

        </div>
    </main>
</body>
</html>