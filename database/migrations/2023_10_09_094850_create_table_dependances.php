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
        Schema::create('dependances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tache_1')->nullable(false);
            $table->unsignedBigInteger('id_tache_2')->nullable(false);
            $table->unsignedBigInteger('id_user')->nullable(false);
            $table->unique(['id_tache_1', 'id_tache_2', 'id_user']);
            $table->foreign('id_tache_1')->references('id')->on('taches');
            $table->foreign('id_tache_2')->references('id')->on('taches');
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependance');
    }
};
