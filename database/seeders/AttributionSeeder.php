<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attributions')->insert([
            'id_tache' => 4,
            'id_utilisateur' => 2,
            'id_inviter' => 1,
            'createur' => 1
        ]);
    }
}
