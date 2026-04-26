@extends('layouts.app')

@section('title', 'Équipes — FootEvenT')
@section('content')

  <section class="px-8 pt-16 pb-10 flex items-end justify-between gap-8">
    <div>
      <h1 class="font-bebas text-7xl leading-none tracking-wide mb-4" style="font-family:'Bebas Neue'">
        Toutes les<br>
        <span class="text-green-400">Équipes</span>
      </h1>
      <p class="text-sm text-gray-400 font-light max-w-sm leading-relaxed">
        Retrouvez toutes les équipes inscrites sur la plateforme et suivez leurs performances.
      </p>
    </div>

    <div class="flex-shrink-0 grid grid-cols-2 divide-x divide-gray-800 border border-gray-800 rounded-2xl overflow-hidden">
      <div class="px-8 py-5 bg-gray-900 text-center">
        <div class="font-bebas text-4xl text-green-400 leading-none mb-1" style="font-family:'Bebas Neue'">{{ $equipes->count() }}</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">Équipes</div>
      </div>
      <div class="px-8 py-5 bg-gray-900 text-center">
        <div class="font-bebas text-4xl text-green-400 leading-none mb-1" style="font-family:'Bebas Neue'">{{ $joueurcount }}</div>
        <div class="text-xs text-gray-500 uppercase tracking-widest">Joueurs</div>
      </div>
    </div>
  </section>

  <div class="px-8 pb-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @forelse($equipes as $equipe)
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden hover:border-green-800 hover:-translate-y-1 transition-all duration-200">

      <div class="relative h-36 bg-gray-800 overflow-hidden">
        @if($equipe->image)
          <img src="{{ asset('storage/' . $equipe->image) }}" class="w-full h-full object-cover opacity-70">
          <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-gray-900"></div>
        @else
          <div class="w-full h-full flex items-center justify-center">
            <span class="font-bebas text-6xl text-gray-700" style="font-family:'Bebas Neue'">{{ substr($equipe->name_equipe, 0, 1) }}</span>
          </div>
        @endif
        <span class="absolute top-2.5 right-2.5 flex items-center gap-1 text-xs text-gray-400 bg-black/50 border border-gray-700 rounded-full px-2.5 py-1">
          👥 {{ $equipe->joueurs->count() }} joueurs
        </span>
      </div>

      <div class="p-5">
        @foreach($equipe->tournois as $tournoi)
          <p class="text-xs text-gray-500 mb-2">🏆 {{ $tournoi->name_tournoi }}</p>
        @endforeach
        <h2 class="font-bebas text-2xl tracking-wide leading-tight mb-2" style="font-family:'Bebas Neue'">{{ $equipe->name_equipe }}</h2>
        <p class="text-xs text-gray-400 leading-relaxed line-clamp-2">{{ $equipe->description }}</p>
      </div>

      <div class="px-5 py-3 flex items-center justify-between border-t border-gray-800">
        <div class="flex items-center gap-2 text-xs text-gray-400">
          <div class="w-6 h-6 rounded-full bg-green-950 border border-green-800 flex items-center justify-center text-green-400 font-bold text-xs">
            {{ substr($equipe->capitaine->firstname, 0, 1) }}{{ substr($equipe->capitaine->lastname, 0, 1) }}
          </div>
          {{ $equipe->capitaine->firstname }} {{ $equipe->capitaine->lastname }}
        </div>
        <a href="{{ route('equipes.show', $equipe) }}"
           class="flex items-center gap-1 text-xs font-medium px-3 py-1.5 rounded-lg border border-gray-700 text-gray-300 hover:border-green-600 hover:text-green-400 transition-colors">
          Voir
          <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>
    @empty
    <div class="col-span-3 flex flex-col items-center justify-center py-24 text-gray-600">
      <p class="font-bebas text-2xl tracking-wide" style="font-family:'Bebas Neue'">Aucune équipe pour l'instant</p>
      <p class="text-sm mt-1">Soyez le premier à créer une équipe !</p>
    </div>
    @endforelse
  </div>

@endsection