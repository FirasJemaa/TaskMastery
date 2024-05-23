<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projets')->insert([
            'id_user' => 1,
            'designation' => 'Projet 1',
            'description' => 'Description du projet 1'
        ]);
        DB::table('projets')->insert([
            'id_user' => 1,
            'designation' => 'Projet 2',
            'description' => 'Description du projet 2'
        ]);
        DB::table('projets')->insert([
            'id_user' => 2,
            'designation' => 'Projet 1',
            'description' => 'Description du projet 1'
        ]);
    }
}
