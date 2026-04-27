<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootEvenT — Créer un tournoi</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0a0c10] text-gray-100 font-outfit min-h-screen">

    <nav class="sticky top-0 z-50 flex items-center justify-between px-10 h-20 border-b border-white/5 glass-nav">
        <div class="flex items-center gap-4">
            <div class="w-10 h-10 bg-green-500 flex items-center justify-center rounded-xl rotate-12 shadow-[0_0_20px_rgba(34,197,94,0.3)]">
                <span class="text-black font-black text-2xl italic font-bebas uppercase">F</span>
            </div>
            <span class="font-bebas text-2xl tracking-[0.2em] uppercase italic">Foot<span class="text-green-500">EvenT</span></span>
        </div>
        
        <div class="flex items-center gap-2">
            <a href="#" class="px-5 py-2 rounded-xl text-[11px] font-black uppercase tracking-widest text-gray-400 hover:text-white transition-all">Tournois</a>
            <a href="#" class="px-5 py-2 rounded-xl text-[11px] font-black uppercase tracking-widest text-gray-400 hover:text-white transition-all">Équipes</a>
            <a href="#" class="px-5 py-2 rounded-xl text-[11px] font-black uppercase tracking-widest text-gray-400 hover:text-white transition-all">Matchs</a>
        </div>

        <div class="flex items-center gap-3 bg-white/5 px-4 py-2 rounded-full border border-white/10">
            <div class="w-7 h-7 rounded-full bg-green-500 flex items-center justify-center text-black font-black text-[10px]">
                {{ substr(auth()->user()->firstname, 0, 1) }}{{ substr(auth()->user()->lastname, 0, 1) }}
            </div>
            <span class="text-[10px] font-black uppercase tracking-widest hidden md:block">
                {{auth()->user()->firstname}} {{auth()->user()->lastname}}
            </span>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-12">
        
        <nav class="flex items-center gap-3 text-[10px] font-black uppercase tracking-[0.3em] text-gray-500 mb-6">
            <a href="#" class="hover:text-green-500 transition-colors">Mes tournois</a>
            <span class="w-1.5 h-1.5 bg-gray-800 rounded-full"></span>
            <span class="text-green-500 italic">Nouveau Tournoi</span>
        </nav>

        <div class="mb-12">
            <h1 class="font-bebas text-7xl tracking-tighter italic uppercase leading-none mb-4">
                Lancer une <span class="text-green-500">Compétition</span>
            </h1>
            <p class="text-[11px] font-bold text-gray-500 uppercase tracking-[0.4em] italic">Configurez les paramètres de votre tournoi pro</p>
        </div>

        <form method="POST" action="{{route('tournois.store')}}" class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            @csrf

            <div class="lg:col-span-2 space-y-8">
                
                <div class="form-card rounded-[32px] p-8 md:p-10 space-y-8">
                    <div class="flex items-center gap-4 border-b border-white/5 pb-6">
                        <span class="w-8 h-8 bg-green-500/10 text-green-500 rounded-lg flex items-center justify-center font-bebas text-xl">01</span>
                        <h2 class="font-bebas text-2xl tracking-widest uppercase italic">Informations générales</h2>
                    </div>

                    <div class="space-y-6">
                        <div class="group">
                            <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-3 group-focus-within:text-green-500 transition-colors italic">
                                Nom du tournoi <span class="text-green-500">*</span>
                            </label>
                            <input type="text" name="name_tournoi" placeholder="EX: ELITE CHAMPIONS LEAGUE" 
                                class="w-full bg-black/40 border border-white/5 text-white placeholder-gray-700 rounded-2xl px-6 py-4 text-sm font-bold focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-500/5 transition-all uppercase tracking-wider" required />
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-3 italic">Description du tournoi</label>
                            <textarea name="description" rows="4" placeholder="Détails, règles, récompenses..." 
                                class="w-full bg-black/40 border border-white/5 text-white placeholder-gray-700 rounded-2xl px-6 py-4 text-sm font-medium focus:outline-none focus:border-green-500 transition-all resize-none"></textarea>
                        </div>

                        <div class="group">
                            <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-3 italic">Localisation / Stade <span class="text-green-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-6 top-1/2 -translate-y-1/2 text-gray-600">📍</span>
                                <input type="text" name="lieu" placeholder="EX: STADE MOHAMMED V, CASABLANCA" 
                                    class="w-full bg-black/40 border border-white/5 text-white placeholder-gray-700 rounded-2xl pl-14 pr-6 py-4 text-sm font-bold focus:outline-none focus:border-green-500 transition-all uppercase" required />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4">
                            <div>
                                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-3 italic">Date d'ouverture <span class="text-green-500">*</span></label>
                                <input type="date" name="date_debut" class="w-full bg-black/40 border border-white/5 text-white rounded-2xl px-6 py-4 text-sm font-bold focus:outline-none focus:border-green-500 transition-all" required />
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-3 italic">Date de clôture <span class="text-green-500">*</span></label>
                                <input type="date" name="date_fin" class="w-full bg-black/40 border border-white/5 text-white rounded-2xl px-6 py-4 text-sm font-bold focus:outline-none focus:border-green-500 transition-all" required />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-card rounded-[32px] p-8 md:p-10 space-y-8">
                    <div class="flex items-center gap-4 border-b border-white/5 pb-6">
                        <span class="w-8 h-8 bg-green-500/10 text-green-500 rounded-lg flex items-center justify-center font-bebas text-xl">02</span>
                        <h2 class="font-bebas text-2xl tracking-widest uppercase italic">Format & Capacité</h2>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-6 italic text-center">Nombre d'équipes participantes <span class="text-green-500">*</span></label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach([4, 8, 16, 32] as $num)
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="nbEquipes" value="{{$num}}" class="peer sr-only" {{ $num == 8 ? 'checked' : '' }} />
                                <div class="bg-black/40 border border-white/5 rounded-2xl py-6 text-center transition-all group-hover:border-white/20 peer-checked:border-green-500 peer-checked:bg-green-500/10 peer-checked:ring-4 peer-checked:ring-green-500/5">
                                    <span class="block font-bebas text-3xl mb-1 peer-checked:text-green-500 transition-colors">{{$num}}</span>
                                    <span class="text-[8px] font-black text-gray-600 uppercase tracking-widest peer-checked:text-green-500/60">Équipes</span>
                                </div>
                                <div class="absolute top-3 right-3 w-2 h-2 rounded-full bg-green-500 opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6">
                <div class="sticky top-32 space-y-6">
                    <div class="form-card rounded-[32px] p-8 bg-gradient-to-br from-[#11141b] to-black">
                        <h3 class="font-bebas text-xl uppercase tracking-widest mb-4">Prêt pour le coup d'envoi ?</h3>
                        <p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest leading-relaxed mb-8 italic">
                            Une fois le tournoi créé, vous pourrez inviter des équipes et gérer le calendrier des matchs.
                        </p>
                        
                        <button type="submit" class="w-full group relative px-8 py-5 bg-green-500 text-black font-black text-xs uppercase tracking-[0.3em] rounded-sm transform skew-x-[-12deg] hover:bg-white transition-all shadow-[0_10px_30px_rgba(34,197,94,0.2)]">
                            <span class="inline-block transform skew-x-[12deg]">Créer le Tournoi 🚀</span>
                        </button>
                        
                        <a href="#" class="block text-center mt-6 text-[10px] font-black text-gray-600 uppercase tracking-widest hover:text-red-500 transition-colors italic">
                            Annuler l'opération
                        </a>
                    </div>

                    <div class="p-6 border border-white/5 rounded-[32px] border-dashed">
                        <p class="text-[9px] font-bold text-gray-600 uppercase tracking-[0.2em] leading-relaxed">
                            <span class="text-green-500">TIP:</span> Assurez-vous que les dates ne chevauchent pas un autre tournoi actif pour maximiser la participation.
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>
</html>