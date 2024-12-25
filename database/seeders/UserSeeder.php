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
            ['nama' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password'), 'peran' => 'admin'],
            ['nama' => 'Pemilik 1', 'email' => 'pemilik@example.com', 'password' => bcrypt('password'), 'peran' => 'pemilik'],
            ['nama' => 'Investor 1', 'email' => 'investor@example.com', 'password' => bcrypt('password'), 'peran' => 'investor'],
        ]);
        
        
    }
}
