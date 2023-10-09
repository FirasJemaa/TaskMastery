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
        Schema::create('dependance', function (Blueprint $table) {
            $table->unsignedBigInteger('id_tache_1')->nullable(false);
            $table->unsignedBigInteger('id_tache_2')->nullable(false);
            $table->primary(['id_tache_1', 'id_tache_2']);
            $table->foreign('id_tache_1')->references('id')->on('tache');
            $table->foreign('id_tache_2')->references('id')->on('tache');
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
