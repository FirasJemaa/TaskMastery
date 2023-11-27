<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouleursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('couleurs')->insert([
            'code_couleur'  => 255
        ]);
        DB::table('couleurs')->insert([
            'code_couleur'  => 124
        ]);
        DB::table('couleurs')->insert([
            'code_couleur'  => 64
        ]);
    }
}
