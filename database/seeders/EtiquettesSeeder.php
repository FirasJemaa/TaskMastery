<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtiquettesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('etiquettes')->insert([
            'designation'  => ucfirst('Urgent')
        ]);
        DB::table('etiquettes')->insert([
            'designation'  => ucfirst('Important')
        ]);
        DB::table('etiquettes')->insert([
            'designation'  => ucfirst('En attente')
        ]);
    }
}
