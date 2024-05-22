<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 50)->nullable()->nullable(false);
            $table->string('designation', 190)->nullable();
            $table->date('date_creation')->nullable();
            $table->date('date_cloture')->nullable();
            $table->boolean('etat')->nullable(false)->default(false);
            $table->unsignedBigInteger('id_projet')->nullable(false);
            $table->unsignedBigInteger('id_couleur')->nullable(false)->default(1);
            
            $table->unsignedBigInteger('id_etiquette')->nullable(false)->default(1);
            $table->unsignedBigInteger('id_statut')->nullable(false)->default(1);
            $table->foreign('id_projet')->references('id')->on('projets');
            $table->foreign('id_couleur')->references('id')->on('couleurs');
            $table->foreign('id_etiquette')->references('id')->on('etiquettes');
            $table->foreign('id_statut')->references('id')->on('statuts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taches');
    }
};
