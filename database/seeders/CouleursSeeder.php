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
            'code_couleur'  => hexdec('EC7063') //rouge
        ]);
        DB::table('couleurs')->insert([
            'code_couleur'  => hexdec('82E0AA') //vert
        ]);
        DB::table('couleurs')->insert([
            'code_couleur'  => hexdec('5DADE2') //bleu
        ]);
    }
}
