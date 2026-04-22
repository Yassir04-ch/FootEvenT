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
        Schema::table('equipe_tournois', function (Blueprint $table) {
            $table->string('niveau')->after('tournoi_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipe_tournois', function (Blueprint $table) {
            $table->dropColumn('niveau');
        });
    }
};
