@extends('layouts.app')
@section('title', 'Joueurs — FootEvenT')

@section('content')

<section class="px-8 pt-14 pb-8 flex items-end justify-between">

  <div>
    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-green-950 border border-green-800 text-green-400 text-xs uppercase tracking-widest mb-5">
      <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></span>
      joueurs
    </div>

    <h1 class="font-bebas text-5xl md:text-6xl leading-none tracking-tight italic uppercase">
              Tous les<br>
      <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-emerald-600">Joueurs</span>
    </h1>

    <p class="text-sm text-gray-400 max-w-md">
      Trouve les meilleurs joueurs et contacte-les pour rejoindre ton équipe ou tournoi.
    </p>
  </div>

</section>

<div class="px-8 pb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

    <div class="px-8 pb-10 flex items-center gap-3 flex-wrap font-black">
        <a href="?" class="skew-element group">
            <span class="skew-inner px-6 py-2 text-[10px] uppercase tracking-widest border border-green-500 bg-green-500 text-black">Tous</span>
        </a>
        <a href="?poste=attaquant" class="skew-element group">
            <span class="skew-inner px-6 py-2 text-[10px] uppercase tracking-widest border border-white/10 bg-white/5 text-gray-400 group-hover:border-green-500 group-hover:text-white transition-all">Attaquant</span>
        </a>
        <a href="?poste=defenseur" class="skew-element group">
            <span class="skew-inner px-6 py-2 text-[10px] uppercase tracking-widest border border-white/10 bg-white/5 text-gray-400 group-hover:border-green-500 group-hover:text-white transition-all">Défenseur</span>
        </a>
        <a href="?poste=milieu" class="skew-element group">
            <span class="skew-inner px-6 py-2 text-[10px] uppercase tracking-widest border border-white/10 bg-white/5 text-gray-400 group-hover:border-green-500 group-hover:text-white transition-all">Milieu</span>
        </a>
        <a href="?poste=defenseur" class="skew-element group">
            <span class="skew-inner px-6 py-2 text-[10px] uppercase tracking-widest border border-white/10 bg-white/5 text-gray-400 group-hover:border-green-500 group-hover:text-white transition-all">Défenseur</span>
        </a>
        <a href="?poste=gardien" class="skew-element group">
            <span class="skew-inner px-6 py-2 text-[10px] uppercase tracking-widest border border-white/10 bg-white/5 text-gray-400 group-hover:border-green-500 group-hover:text-white transition-all">Gardien</span>
        </a>
    </div>
</div>

<div class="px-8 pb-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

@forelse($joueurs as $joueur)

<div class="w-64 mx-auto">

    <div class="bg-gradient-to-b from-gray-900 to-black border border-green-700 rounded-2xl p-4 shadow-lg hover:scale-105 transition duration-300">

    <div class="flex justify-between items-center text-green-400 text-xs font-bold mb-3">
            <span class="uppercase">{{ $joueur->poste }}</span>
        </div>

        <div class="w-full h-40 mb-3 overflow-hidden rounded-lg border border-green-700">
            @if($joueur->image)
                <img src="{{ asset('storage/'.$joueur->image) }}" class="w-full h-44 object-cover rounded-lg">
            @else
                <div class="w-full h-full flex items-center justify-center bg-gray-800 text-green-400 text-3xl font-bold">
                    {{ substr($joueur->user->firstname,0,1) }}
                </div>
            @endif
        </div>
        <h2 class="text-center text-white font-bold text-lg tracking-wide uppercase">
            {{ $joueur->user->firstname }} {{ $joueur->user->lastname }}
        </h2>
        <p class="text-center text-xs mt-2">
            @if($joueur->activeJoueur())
                <span class="text-green-400">● Dans équipe</span>
            @else
                <span class="text-gray-400">● Sans équipe</span>
            @endif
        </p>

        <div class="mt-4">
            <a href="{{route('joueurs.show',$joueur)}}" class="block text-center bg-green-500 hover:bg-green-400 text-black text-sm font-semibold py-2 rounded-lg transition">
                Voir profil
            </a>
        </div>
    </div>
</div>
@empty
<div class="col-span-3 text-center text-gray-500 py-20">
    Aucun joueur trouvé 
</div>
@endforelse

</div>
@endsection
