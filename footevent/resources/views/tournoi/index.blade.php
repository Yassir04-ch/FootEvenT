@extends('layouts.app')
@section('title', 'Tournois — FootEvenT')

@section('content')
    <section class="px-8 pt-16 pb-12 flex flex-col md:flex-row md:items-end justify-between gap-10">
        <div class="max-w-2xl">
            <h1 class="font-bebas text-5xl md:text-6xl leading-none tracking-tight italic uppercase">
                Tous les<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-emerald-600">Tournois</span>
            </h1>
        </div>

        <div class="flex-shrink-0 grid grid-cols-3 gap-1 bg-white/5 p-1 rounded-2xl border border-white/10 backdrop-blur-sm">
            <div class="px-8 py-6 text-center">
                <div class="font-bebas text-5xl text-white leading-none mb-1">{{$countTour}}</div>
                <div class="text-[9px] text-green-500 font-black uppercase tracking-[0.2em]">Tournois</div>
            </div>
            <div class="px-8 py-6 text-center bg-white/5 rounded-xl">
                <div class="font-bebas text-5xl text-white leading-none mb-1">{{$countEqui}}</div>
                <div class="text-[9px] text-green-500 font-black uppercase tracking-[0.2em]">Equipes</div>
            </div>
            <div class="px-8 py-6 text-center">
                <div class="font-bebas text-5xl text-white leading-none mb-1">{{$countMatch}}</div>
                <div class="text-[9px] text-green-500 font-black uppercase tracking-[0.2em]">Matches</div>
            </div>
        </div>
    </section>

    <div class="px-8 pb-10 flex items-center gap-3 flex-wrap">
        <a href="?" class="skew-element group">
            <span class="skew-inner px-6 py-2 text-[10px] font-black uppercase tracking-widest border border-green-500 bg-green-500 text-black">Tous</span>
        </a>
        <a href="?status=en_attente" class="skew-element group">
            <span class="skew-inner px-6 py-2 text-[10px] font-black uppercase tracking-widest border border-white/10 bg-white/5 text-gray-400 group-hover:border-green-500 group-hover:text-white transition-all">Ouverts</span>
        </a>
        <a href="?status=en_cours" class="skew-element group">
            <span class="skew-inner px-6 py-2 text-[10px] font-black uppercase tracking-widest border border-white/10 bg-white/5 text-gray-400 group-hover:border-green-500 group-hover:text-white transition-all">En cours</span>
        </a>
        <a href="?status=termine" class="skew-element group">
            <span class="skew-inner px-6 py-2 text-[10px] font-black uppercase tracking-widest border border-white/10 bg-white/5 text-gray-400 group-hover:border-green-500 group-hover:text-white transition-all">Terminés</span>
        </a>
    </div>

    <div class="px-8 pb-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($tournois as $tournoi)
        <div class="group relative bg-[#11141b] border border-white/5 rounded-2xl overflow-hidden hover:border-green-500/50 transition-all duration-300">
            <div class="h-1 w-full bg-gradient-to-r from-green-500 to-emerald-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
            
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <span class="text-[9px] font-black px-3 py-1 rounded-sm uppercase tracking-[0.2em] bg-white/5 border border-white/10 text-gray-300">
                        Elimination
                    </span>
                    <span class="flex items-center gap-2 text-[10px] font-black uppercase tracking-tighter text-green-400 italic">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-400 shadow-[0_0_8px_#4ade80]"></span>
                        {{$tournoi->status}}
                    </span>
                </div>

                <h2 class="font-bebas text-3xl tracking-tight leading-none mb-4 group-hover:text-green-400 transition-colors uppercase italic">{{$tournoi->name_tournoi}}</h2>
                
                <div class="space-y-2 mb-6">
                    <div class="flex items-center gap-2 text-[11px] text-gray-500 uppercase font-bold tracking-widest">
                        <span class="text-green-500">📍</span> {{$tournoi->lieu}}
                    </div>
                    <div class="flex items-center gap-2 text-[11px] text-gray-500 uppercase font-bold tracking-widest">
                        <span class="text-green-500">📅</span> {{$tournoi->date_debut}} → {{$tournoi->date_fin}}
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between text-[10px] font-black uppercase tracking-widest text-gray-500">
                        <span>Slots Remplis</span>
                        <span class="text-white">{{$tournoi->equipeValider()->count()}} / {{ $tournoi->nbEquipes}}</span>
                    </div>
                    <div class="h-1.5 bg-white/5 rounded-full overflow-hidden">
                        <div class="h-full bg-green-500 shadow-[0_0_10px_#22c55e]"></div>
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 bg-black/40 border-t border-white/5 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-green-500 to-emerald-700 flex items-center justify-center text-black font-black text-[10px] ring-2 ring-white/5">
                        {{ strtoupper(substr($tournoi->organisateur->firstname, 0, 1)) }}
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[9px] text-gray-500 uppercase font-black">Organisateur</span>
                        <span class="text-[11px] font-bold text-gray-200 tracking-tight">{{$tournoi->organisateur->firstname}} {{$tournoi->organisateur->lastname}}</span>
                    </div>
                </div>
                
                <a href="{{route('tournois.show',$tournoi)}}" class="skew-element group/btn">
                    <span class="skew-inner px-4 py-2 bg-white text-black text-[10px] font-black uppercase tracking-tighter group-hover/btn:bg-green-500 transition-colors">
                        Détails
                    </span>
                </a>
            </div>
        </div>
        @endforeach
    </div>
@endsection