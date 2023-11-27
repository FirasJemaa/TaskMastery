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
            'code_couleur'  => hexdec('ff0000')
        ]);
        DB::table('couleurs')->insert([
            'code_couleur'  => hexdec('00ff00')
        ]);
        DB::table('couleurs')->insert([
            'code_couleur'  => hexdec('0000ff')
        ]);
    }
}
