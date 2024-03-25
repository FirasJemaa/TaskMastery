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
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'P@ssw0rd1!' => bcrypt('password'),
            'surname' => 'Doe',
            'pseudo' => 'johnD'
        ]);
    }
}
