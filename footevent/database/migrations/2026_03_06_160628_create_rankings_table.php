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
        Schema::create('rankings', function (Blueprint $table) {
            $table->id();
            $table->integer('points')->default(0);
            $table->integer('goals_scored')->default(0);
            $table->integer('goals_conceded')->default(0);
            $table->integer('position')->nullable();
            $table->foreignId('equipe_id')->constrained('equipes')->onDelete('cascade');
            $table->foreignId('tournoi_id')->constrained('tournois')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rankings');
    }
};
