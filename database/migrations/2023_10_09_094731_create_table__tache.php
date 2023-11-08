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
        Schema::create('tache', function (Blueprint $table) {
            $table->id();
            $table->string('priorite_liste', 50)->nullable(false);
            $table->string('Designation', 190)->nullable();
            $table->string('etiquette', 50)->nullable();
            $table->date('date_creation_')->nullable(false);
            $table->date('date_cloture_')->nullable();
            $table->boolean('Notification');
            $table->unsignedBigInteger('id_couleur')->nullable(false);
            $table->unsignedBigInteger('id_projet')->nullable();
            $table->unsignedBigInteger('id_etiquette')->nullable();
            $table->unsignedBigInteger('id_statut')->nullable(false);
            $table->foreign('id_couleur')->references('id')->on('couleur');
            $table->foreign('id_projet')->references('id')->on('projet');
            $table->foreign('id_etiquette')->references('id')->on('etiquette');
            $table->foreign('id_statut')->references('id')->on('statut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tache');
    }
};