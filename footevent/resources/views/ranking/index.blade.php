<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FootEvenT — Classement</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen">

  <nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-10 py-4 bg-gray-900 border-b border-gray-800">
    <a href="{{ route('tournois.index') }}" class="flex items-center gap-3">
       <div class="flex items-center gap-3">
         <div class="w-10 h-10 bg-green-500 skew-element flex items-center justify-center shadow-[0_0_15px_rgba(34,197,94,0.3)]">
            <span class="skew-inner text-black font-black text-xl italic uppercase">F</span>
         </div>
            <span class="font-bebas text-3xl text-white tracking-widest italic">Foot<span class="text-green-500">EvenT</span></span>
       </div>
    </a>

    <div class="hidden md:flex items-center gap-2">
            <a href="{{route('tournois.index')}}" class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-white transition-all">Tournois</a>
            <a href="{{route('equipes.index')}}" class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-white transition-all">Équipes</a>
            <a href="{{route('games.index')}}" class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-white transition-all">Matchs</a>
            <a href="{{route('joueurs.joueurs')}}" class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-white transition-all">Joueurs</a>
            <a href="" class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest bg-green-500/10 text-green-500 border border-green-500/20">Classement</a>
            @if(auth()->user())
            <a href="{{route('auth.profile')}}" class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-white transition-all">Profile</a>
            @endif
    </div>

    <div class="w-32"></div>
  </nav>

  <div class="pt-20 min-h-screen flex">

    <aside class="w-56 flex-shrink-0 bg-gray-950 border-r border-gray-800 pt-8 fixed top-16 bottom-0 overflow-y-auto">
      <p class="px-5 text-xs text-gray-600 uppercase tracking-widest font-medium mb-3">Tournois</p>

      @foreach($tournois as $tournoi)
        <a href="?id={{ $tournoi->id }}"
           class="flex items-center gap-3 px-5 py-3 border-l-2 transition-colors">
          <span class="w-2 h-2 rounded-full flex-shrink-0"></span>
          <span class="text-sm flex-1 truncate">{{ $tournoi->name_tournoi }}</span>
        </a>
      @endforeach
    </aside>

    <main class="flex-1 ml-56 p-8">

      @if(isset($tournoi))

        <div class="mb-8">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-green-950 border border-green-800 text-green-400 text-xs font-medium tracking-widest uppercase mb-4">
            <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
            {{ $tournoi->name_tournoi }}
          </div>
          <h1 class="font-bebas text-5xl text-white tracking-widest leading-none">Classement</h1>
        </div>

        <div class="bg-gray-800 border border-gray-700 rounded-2xl overflow-hidden">

          <div class="overflow-x-auto">
            <table class="w-full text-sm">
              <thead>
                <tr class="text-xs text-gray-500 uppercase tracking-wider border-b border-gray-700 bg-gray-900">
                  <th class="text-left px-6 py-4 w-12">#</th>
                  <th class="text-left px-4 py-4">Équipe</th>
                  <th class="text-center px-4 py-4">V</th>
                  <th class="text-center px-4 py-4">D</th>
                  <th class="text-center px-4 py-4">Buts</th>
                  <th class="text-center px-4 py-4 pr-6">Pts</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-700/50">

                @forelse($rankings as $ranking)
                  <tr class="tr-hover">
                    <td class="px-6 py-4">
                      @if($ranking->position == 1)
                        <span class="font-bebas text-xl text-yellow-400">1</span>
                      @elseif($ranking->position == 2)
                        <span class="font-bebas text-xl text-gray-300">2</span>
                      @elseif($ranking->position == 3)
                        <span class="font-bebas text-xl text-orange-400">3</span>
                      @else
                        <span class="text-gray-500 text-xs">{{ $ranking->position }}</span>
                      @endif
                    </td>
                    <td class="px-4 py-4">
                      <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-gray-700 flex items-center justify-center font-bebas text-sm flex-shrink-0 overflow-hidden">
                          @if($ranking->equipe->image)
                            <img src="{{ asset('storage/'.$ranking->equipe->image) }}" class="w-full h-full object-cover">
                          @else
                            {{ substr($ranking->equipe->name_equipe, 0, 1) }}
                          @endif
                        </div>

                        <span class="font-medium text-green-400">
                          {{ $ranking->equipe->name_equipe }}
                        </span>
                      </div>
                    </td>

                    <td class="text-center px-4 py-4 text-green-400 font-medium">
                      {{ $ranking->matchWin }}
                    </td>

                    <td class="text-center px-4 py-4 text-red-400">
                      {{ $ranking->matchlos }}
                    </td>

                    <td class="text-center px-4 py-4 text-gray-300">
                      {{ $ranking->goals_scored }}
                    </td>

                    <td class="text-center px-4 py-4 pr-6">
                      <span class="font-bebas text-xl text-white">
                        {{ $ranking->points }}
                      </span>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="6" class="text-center py-16 text-gray-500">
                      <div class="flex flex-col items-center gap-3">
                        <svg class="w-12 h-12 opacity-20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        <p class="text-sm">Aucun classement disponible pour ce tournoi.</p>
                      </div>
                    </td>
                  </tr>
                @endforelse

              </tbody>
            </table>
          </div>

        </div>

        <div class="flex items-center gap-6 mt-4 text-xs text-gray-500">
          <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-full bg-yellow-400 inline-block"></span> 1ère place</span>
          <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-full bg-gray-300 inline-block"></span> 2ème place</span>
          <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-full bg-orange-400 inline-block"></span> 3ème place</span>
        </div>
      @else
        <div class="flex flex-col items-center justify-center h-96 text-gray-600">
          <svg class="w-20 h-20 mb-5 opacity-20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
          </svg>
          <p class="font-bebas text-3xl tracking-wide">Sélectionnez un tournoi</p>
          <p class="text-sm mt-2">Choisissez un tournoi dans la barre latérale pour voir le classement.</p>
        </div>
      @endif

    </main>
  </div>

</body>
</html>