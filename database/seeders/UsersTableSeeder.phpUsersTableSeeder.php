<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 6,
                'nip' => '87654321',
                'name' => 'Dosen Test',
                'email' => 'dosen.test@undip.ac.id',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
                'remember_token' => null,
            ]
        ]);
    }
}