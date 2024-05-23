<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'jury',
            'email' => 'jury@bts-sio.com',
            'password' => bcrypt('BtsSIO2024!'),
            'surname' => 'bts',
            'pseudo' => 'Jury'
        ]);
        DB::table('users')->insert([
            'name' => 'firas',
            'email' => 'firas@gmail.com',
            'password' => bcrypt('BtsSIO2024!'),
            'surname' => 'jemaa',
            'pseudo' => 'Firas'
        ]);
    }
}
