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
        Schema::create('assigner', function (Blueprint $table) {
            $table->unsignedBigInteger('id_tache')->nullable(false);
            $table->unsignedBigInteger('id_utilisateur')->nullable(false);
            $table->boolean('Createur')->nullable(false);
            $table->primary(['id_tache', 'id_utilisateur']);
            $table->foreign('id_tache')->references('id')->on('tache');
            $table->foreign('id_utilisateur')->references('id')->on('user');
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
