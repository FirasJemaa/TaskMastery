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
            $table->integer('priorite')->nullable(false);
            $table->string('titre', 50)->nullable()->nullable(false);
            $table->string('designation', 190)->nullable(false);
            $table->date('date_creation')->nullable(false);
            $table->date('date_cloture')->nullable();
            $table->boolean('etat')->nullable(false)->default(false);
            $table->unsignedBigInteger('id_projet')->nullable(false);
            $table->unsignedBigInteger('id_couleur')->nullable(false)->default(1);
            // Obligatoire oui/non ?
            $table->unsignedBigInteger('id_etiquette')->nullable(false)->default(1);
            $table->unsignedBigInteger('id_statut')->nullable(false)->default(1);
            $table->foreign('id_projet')->references('id')->on('projets');
            $table->foreign('id_couleur')->references('id')->on('couleurs');
            $table->foreign('id_etiquette')->references('id')->on('etiquettes');
            $table->foreign('id_statut')->references('id')->on('statuts');
            $table->timestamps();
        });
        
        //un trigger lors d'une suppression d'une ligne dans la table tache
        /*DB::unprepared('
            CREATE TRIGGER `taches_AFTER_DELETE` AFTER DELETE ON `taches` FOR EACH ROW
            BEGIN
                DELETE FROM dependances WHERE id_tache_1 = OLD.id OR id_tache_2 = OLD.id;
                DELETE FROM checklists WHERE id_tache = OLD.id;
                DELETE FROM couleurs WHERE id = OLD.id_couleur;
                DECLARE id_conv INT;
                SET id_conv = (SELECT id FROM conversations WHERE id_tache = OLD.id);
                DELETE FROM messages WHERE id_conversation = id_conv;
                DELETE FROM conversations WHERE id_tache = OLD.id;
                DELETE FROM attachements WHERE id_tache = OLD.id;
            END
        ');*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tache');
    }
};
