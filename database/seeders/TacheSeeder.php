<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('taches')->insert([
            'id_projet' => 1,
            'titre' => 'Tache 1',
            'designation' => 'Designation de la tache 1',
            'id_statut' => 1,
            'id_etiquette' => 1,
            'date_creation' => '2024-01-01',
            'date_cloture' => '2024-06-01',
            'id_couleur' => 1
        ]);
        DB::table('taches')->insert([
            'id_projet' => 1,
            'titre' => 'Tache 2',
            'designation' => 'Designation de la tache 2',
            'id_statut' => 2,
            'id_etiquette' => 3,
            'date_creation' => '2024-01-01',
            'date_cloture' => '2024-06-01',
            'id_couleur' => 2

        ]);
        DB::table('taches')->insert([
            'id_projet' => 2,
            'titre' => 'Tache 3',
            'designation' => 'Designation de la tache 3',
            'id_statut' => 3,
            'id_etiquette' => 2,
            'etat'=> 1,
            'date_creation' => '2024-01-01',
            'date_cloture' => '2024-06-01',
            'id_couleur' => 3
        ]);
        DB::table('taches')->insert([
            'id_projet' => 3,
            'titre' => 'Tache partager',
            'designation' => 'Cette sera partager avec les jury pour pouvoir observer les taches de ce projet',
            'id_statut' => 1,
            'id_etiquette' => 1,
            'etat'=> 0,
            'date_creation' => '2024-01-01',
            'date_cloture' => '2024-06-01',
            'id_couleur' => 2,
        ]);
    }
}
