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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('contenu')->nullable(false);
            $table->date('date_envoi')->nullable(false);
            $table->unsignedBigInteger('id_conversation')->nullable(false);
            $table->unsignedBigInteger('id_utilisateur')->nullable(false);
            $table->foreign('id_conversation')->references('id')->on('conversations');
            $table->foreign('id_utilisateur')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};
