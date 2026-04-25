<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootEvenT — Dashboard Organisateur</title>
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
                <span class="text-[10px] text-gray-500 font-black uppercase tracking-[0.2em]">Panel Organisateur</span>
            </div>
        </div>

        <nav class="flex-1 px-4 flex flex-col gap-2">
            <p class="text-[10px] text-gray-600 font-black uppercase tracking-[0.3em] px-4 mb-2 italic">Principal</p>
            
            <a href="{{ route('organisateur.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-green-500/10 border border-green-500/20 text-green-500 text-sm font-bold shadow-lg shadow-green-500/5 transition-all">
                <span class="scale-125">📊</span> Dashboard
            </a>
            
            <a href="{{ route('organisateur.tournois') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 text-sm font-bold hover:bg-white/5 hover:text-white transition-all group">
                <span class="group-hover:scale-125 transition-transform transition-all">🏆</span> Mes Tournois
                <span class="ml-auto bg-white/5 text-gray-500 text-[10px] px-2 py-0.5 rounded-full border border-white/5 group-hover:text-white">{{ $tournoicount }}</span>
            </a>
            
            <a href="{{ route('organisateur.matchs') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 text-sm font-bold hover:bg-white/5 hover:text-white transition-all group">
                <span class="group-hover:scale-125 transition-transform">⚽</span> Matchs
            </a>

            <a href="{{ route('rankings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 text-sm font-bold hover:bg-white/5 hover:text-white transition-all group">
                <span class="group-hover:scale-125 transition-transform">📈</span> Classement
            </a>
        </nav>

        <div class="p-4 border-t border-white/5 space-y-3">
            <div class="flex items-center gap-3 bg-white/5 rounded-2xl p-3 border border-white/5">
                <a href="{{ route('auth.edit') }}" class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-700 rounded-full flex items-center justify-center text-black font-black uppercase shadow-lg shadow-green-500/10">
                    {{ substr(auth()->user()->firstname,0,1) }}
                </a>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-black text-white truncate italic uppercase">{{ auth()->user()->firstname }}</p>
                    <p class="text-[9px] text-green-500 font-bold uppercase tracking-widest">Organisateur</p>
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
                <h1 class="text-2xl font-black text-white italic uppercase tracking-tighter">Bonjour, {{ auth()->user()->firstname }} 👋</h1>
            </div>
            
            <div class="flex items-center gap-6">
                <a href="{{ route('tournois.create') }}" class="px-6 py-2.5 bg-white text-black font-black text-[10px] uppercase tracking-widest rounded-sm transform skew-x-[-12deg] hover:bg-green-500 transition-colors">
                    <span class="inline-block transform skew-x-[12deg]">+ Créer un tournoi</span>
                </a>

                <div class="relative">
                    <button id="notif_btn" class="w-10 h-10 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center text-xl hover:bg-white/10 transition-all relative">
                        🔔
                        <span class="absolute -top-1 -right-1 w-5 h-5 bg-green-500 border-4 border-[#0a0c10] rounded-full text-black text-[9px] font-black flex items-center justify-center">3</span>
                    </button>

                    <div id="notif_model" class="absolute hidden right-0 mt-4 w-80 bg-[#11141b] border border-white/10 rounded-2xl shadow-2xl z-50 overflow-hidden">
                        <div class="px-5 py-4 border-b border-white/5 flex items-center justify-between bg-white/5">
                            <p class="text-[10px] font-black uppercase tracking-widest text-white">Notifications</p>
                            <button id="close_btn" class="text-gray-500 hover:text-white text-xs">✕</button>
                        </div>
                        <div class="divide-y divide-white/5 max-h-80 overflow-y-auto custom-scrollbar">
                            @foreach($notifications as $notification)
                            <div class="px-5 py-4 hover:bg-white/5 transition-colors cursor-pointer">
                                <p class="text-xs text-gray-200 font-medium leading-relaxed">{{$notification->message}}</p>
                                <p class="text-[9px] text-gray-600 mt-2 uppercase font-black italic">{{$notification->created_at}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="p-10">
            <h3 class="text-[10px] font-black text-gray-500 uppercase tracking-[0.5em] mb-8 italic">Vue d'ensemble des données</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <div class="stat-card p-8 rounded-3xl relative overflow-hidden group">
                    <div class="relative z-10">
                        <span class="text-[9px] font-black text-gray-500 uppercase tracking-widest mb-3 block">Mes Tournois</span>
                        <div class="text-5xl font-bebas tracking-widest text-white group-hover:text-green-500 transition-colors">{{ $tournoicount }}</div>
                    </div>
                    <span class="absolute -right-4 -bottom-6 text-9xl opacity-[0.02] font-black italic pointer-events-none group-hover:opacity-5 transition-opacity">🏆</span>
                </div>

                <div class="stat-card p-8 rounded-3xl relative overflow-hidden group">
                    <div class="relative z-10">
                        <span class="text-[9px] font-black text-green-500/50 uppercase tracking-widest mb-3 block italic">● En cours</span>
                        <div class="text-5xl font-bebas tracking-widest text-green-500">{{ $tournoiencourcount }}</div>
                    </div>
                    <div class="absolute inset-0 bg-green-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </div>

                <div class="stat-card p-8 rounded-3xl relative overflow-hidden group">
                    <div class="relative z-10">
                        <span class="text-[9px] font-black text-yellow-500/50 uppercase tracking-widest mb-3 block italic">● En attente</span>
                        <div class="text-5xl font-bebas tracking-widest text-yellow-500">{{ $tournoienattentcount }}</div>
                    </div>
                </div>

                <div class="stat-card p-8 rounded-3xl relative overflow-hidden group">
                    <div class="relative z-10">
                        <span class="text-[9px] font-black text-red-500/50 uppercase tracking-widest mb-3 block italic">● Terminés</span>
                        <div class="text-5xl font-bebas tracking-widest text-red-500">{{ $tournoiterminecount }}</div>
                    </div>
                </div>

                <div class="stat-card p-8 rounded-3xl relative overflow-hidden group">
                    <div class="relative z-10">
                        <span class="text-[9px] font-black text-blue-500/50 uppercase tracking-widest mb-3 block italic">Total Équipes</span>
                        <div class="text-5xl font-bebas tracking-widest text-blue-400">{{$equipecount}}</div>
                    </div>
                    <span class="absolute -right-4 -bottom-6 text-9xl opacity-[0.02] font-black italic pointer-events-none">👥</span>
                </div>

                <div class="stat-card p-8 rounded-3xl relative overflow-hidden group border-yellow-500/20 shadow-lg shadow-yellow-500/5">
                    <div class="relative z-10">
                        <span class="text-[9px] font-black text-yellow-500 uppercase tracking-widest mb-3 block italic">Validations Requises</span>
                        <div class="text-5xl font-bebas tracking-widest text-white">{{$equipeenattent}}</div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>

<script src="{{asset('js/notification.js')}}"></script>
</body>
</html>