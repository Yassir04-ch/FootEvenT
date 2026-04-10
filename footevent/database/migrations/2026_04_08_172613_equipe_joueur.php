<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('equipe_joueur', function (Blueprint $table) {
        $table->id();
        $table->foreignId('equipe_id')->constrained('equipes')->onDelete('cascade');
        $table->foreignId('joueur_id')->constrained('joueurs')->onDelete('cascade');
        $table->enum('statut', ['actif', 'left','en_attente','refusee'])->default('en_attente');
        $table->unique(['equipe_id', 'joueur_id']);
        $table->timestamps();
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipe_joueur');
    }
};
