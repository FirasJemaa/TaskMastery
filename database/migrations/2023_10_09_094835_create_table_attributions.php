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
        Schema::create('attributions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tache')->nullable(false);
            $table->unsignedBigInteger('id_utilisateur')->nullable(false);
            $table->boolean('createur')->nullable(false);
            $table->unique(['id_tache', 'id_utilisateur']);
            $table->foreign('id_tache')->references('id')->on('taches');
            $table->foreign('id_utilisateur')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assigner');
    }
};
