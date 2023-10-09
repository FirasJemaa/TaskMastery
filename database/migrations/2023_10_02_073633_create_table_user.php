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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 70)->nullable(false);
            $table->string('prenom', 70)->nullable(false);
            $table->string('pseudo', 70)->unique()->nullable(false);
            $table->date('date_naissance')->nullable(false);
            $table->string('mail', 100)->nullable(false);
            $table->string('password',150)->nullable(false);
            $table->timestamps();

            //indexer pour rechercher plus rapidement
            $table->index('pseudo');
            $table->index(['nom', 'prenom']);
            $table->index('mail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
