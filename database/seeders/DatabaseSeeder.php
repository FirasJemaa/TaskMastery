<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CouleursSeeder::class);
        $this->call(StatutSeeder::class);
        $this->call(EtiquettesSeeder::class);
        //$this->call(UserSeeder::class);
    }
}
