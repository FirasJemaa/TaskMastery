<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $this->call(UserSeeder::class);
        $this->call(ProjetSeeder::class);
        $this->call(TacheSeeder::class);
        $this->call(AttributionSeeder::class);
    }
}
