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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('designation', 100)->nullable(false);
            $table->text('description')->nullable(true);
            $table->unsignedBigInteger('id_user', )->nullable(false);
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /*DB::unprepared('
        DELIMITER //
        CREATE TRIGGER projets_AFTER_DELETE 
        AFTER DELETE ON projets 
        FOR EACH ROW
        BEGIN
            -- Supprimer les taches
            DELETE FROM taches WHERE id_projet = OLD.id;
        END;
        //
        DELIMITER ;
    ');*/

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
