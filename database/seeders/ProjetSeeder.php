<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projets')->insert([
            //Récup la première ligne de la table User
            'id_user' => User::first()->id,
            'designation' => 'Projet 1',
            'description' => 'Description du projet 1'
        ]);
        DB::table('projets')->insert([
            'id_user' => User::first()->id,
            'designation' => 'Projet 2',
            'description' => 'Description du projet 2'
        ]);
        DB::table('projets')->insert([
            //Récup la deuxième ligne de la table User
            'id_user' => User::skip(1)->first()->id,
            'designation' => 'Projet 1',
            'description' => 'Description du projet 1'
        ]);
    }
}
