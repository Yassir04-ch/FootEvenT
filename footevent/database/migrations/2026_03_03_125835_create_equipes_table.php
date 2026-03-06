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
        Schema::create('equipes', function (Blueprint $table) {
            $table->id();
            $table->string('name_equipe');
            $table->enum('statut', ['en_attente', 'validee', 'refusee'])->default('en_attente');
            $table->integer('nbJoueur');
            $table->foreignId('tournoi_id')->constrained('tournois')->onDelete('cascade');
            $table->foreignId('capitaine_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipes');
    }
};
