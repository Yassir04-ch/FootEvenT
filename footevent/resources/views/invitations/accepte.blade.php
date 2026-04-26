<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invitation — FootEvenT</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@400;600;700;900&display=swap" rel="stylesheet">
</head>
<body class="bg-[#0a0c10] font-['Outfit'] py-10 px-4">

  <div class="max-w-lg mx-auto bg-[#111318] border border-white/5 rounded-2xl overflow-hidden">

    <div class="bg-[#0a0c10] border-b border-white/5 px-8 py-6 flex items-center gap-3">
      <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center rotate-12 flex-shrink-0">
        <span class="text-black font-black text-xl italic">F</span>
      </div>
      <span class="text-2xl font-black tracking-widest uppercase italic" style="font-family:'Bebas Neue'">
        Foot<span class="text-green-500">EvenT</span>
      </span>
    </div>

    <div class="px-8 py-10">

      <div class="inline-flex items-center gap-2 bg-green-500/10 border border-green-500/20 text-green-400 text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full mb-6">
        <span class="w-1.5 h-1.5 rounded-full bg-green-400 inline-block"></span>
        Nouvelle Invitation
      </div>

      <h1 class="text-2xl font-black text-white uppercase tracking-wide mb-3" style="font-family:'Bebas Neue'">
        Vous avez été invité !
      </h1>

      <p class="text-gray-400 text-sm leading-relaxed mb-6">
        Vous avez reçu une invitation pour rejoindre l'équipe suivante sur <span class="text-white font-semibold">FootEvenT</span>.
      </p>

      <div class="bg-black/40 border border-white/5 border-l-4 border-l-green-500 rounded-xl px-5 py-4 mb-8">
        <p class="text-xs text-gray-500 uppercase tracking-widest mb-1">Équipe</p>
        <p class="text-xl font-black text-green-400 uppercase tracking-wide" style="font-family:'Bebas Neue'">
          {{ $equipe->name_equipe }}
        </p>
      </div>

      <div class="flex gap-3">
        <a href="{{ url('/invitations/accept/'.$token) }}"
           class="flex-1 text-center bg-green-500 text-black font-black uppercase tracking-widest text-sm py-3 rounded-xl hover:bg-green-400 transition-colors">
           Accepter
        </a>
        <a href="{{ url('/invitations/refuse/'.$token) }}"
           class="flex-1 text-center border border-white/10 text-gray-400 font-bold uppercase tracking-widest text-sm py-3 rounded-xl hover:border-red-500/50 hover:text-red-400 transition-colors">
           Refuser
        </a>
      </div>

    </div>

  </div>

</body>
</html>