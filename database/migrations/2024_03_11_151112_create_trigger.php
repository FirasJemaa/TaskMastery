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
        DB::unprepared('
        CREATE TRIGGER users_BEFORE_DELETE BEFORE DELETE ON users
        FOR EACH ROW
        BEGIN
            DELETE FROM projets WHERE id_user = OLD.id;
        END');

        DB::unprepared('
        CREATE TRIGGER taches_BEFORE_DELETE BEFORE DELETE ON taches
        FOR EACH ROW 
        BEGIN
            -- Supprimer les dépendances
            DELETE FROM dependances WHERE id_tache_1 = OLD.id OR id_tache_2 = OLD.id;
            -- Supprimer les checklists
            DELETE FROM checklists WHERE id_tache = OLD.id;
            -- Récupérer l\'id de la conversation
            SET @id_conv = (SELECT id FROM conversations WHERE id_tache = OLD.id LIMIT 1);
            -- Supprimer les messages liés à la conversation
            DELETE FROM messages WHERE id_conversation = @id_conv;
            -- Supprimer la conversation
            DELETE FROM conversations WHERE id_tache = OLD.id;
        END');

        DB::unprepared('
        CREATE TRIGGER projets_BEFORE_DELETE BEFORE DELETE ON projets
        FOR EACH ROW 
        BEGIN
            -- Supprimer les taches
            DELETE FROM taches WHERE id_projet = OLD.id;
        END');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taches_BEFORE_DELETE');
        Schema::dropIfExists('users_BEFORE_DELETE');
    }
};
