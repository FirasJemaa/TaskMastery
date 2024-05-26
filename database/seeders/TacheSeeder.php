<?php

namespace Database\Seeders;

use App\Models\Couleur;
use App\Models\Etiquette;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Projet;
use App\Models\Tache;
use App\Models\Statut;

class TacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('taches')->insert([
            'id_projet' => Projet::first()->id,
            'titre' => 'Tache 1',
            'designation' => 'Designation de la tache 1',
            'id_statut' => Statut::first()->id,
            'id_etiquette' => Etiquette::first()->id,
            'date_creation' => '2024-01-01',
            'date_cloture' => '2024-06-01',
            'id_couleur' => Couleur::first()->id,
        ]);
        DB::table('taches')->insert([
            'id_projet' => Projet::first()->id,
            'titre' => 'Tache 2',
            'designation' => 'Designation de la tache 2',
            'id_statut' => Statut::skip(1)->first()->id,
            'id_etiquette' => Etiquette::skip(2)->first()->id,
            'date_creation' => '2024-01-01',
            'date_cloture' => '2024-06-01',
            'id_couleur' => Couleur::skip(1)->first()->id,

        ]);
        DB::table('taches')->insert([
            'id_projet' => Projet::skip(1)->first()->id,
            'titre' => 'Tache 3',
            'designation' => 'Designation de la tache 3',
            'id_statut' => Statut::skip(2)->first()->id,
            'id_etiquette' => Etiquette::skip(1)->first()->id,
            'etat'=> 1,
            'date_creation' => '2024-01-01',
            'date_cloture' => '2024-06-01',
            'id_couleur' => Couleur::skip(2)->first()->id,
        ]);
        DB::table('taches')->insert([
            'id_projet' => Projet::skip(2)->first()->id,
            'titre' => 'Tache partager',
            'designation' => 'Cette sera partager avec les jury pour pouvoir observer les taches de ce projet',
            'id_statut' => Statut::first()->id,
            'id_etiquette' => Etiquette::first()->id,
            'etat'=> 0,
            'date_creation' => '2024-01-01',
            'date_cloture' => '2024-06-01',
            'id_couleur' => Couleur::skip(1)->first()->id,
        ]);
    }
}
