<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            CoursesTableSeeder::class,
            StudentsTableSeeder::class,
            GradesTableSeeder::class,
        ]);
        
        $this->command->info('Database seeded successfully!');
        $this->command->info('Login credentials:');
        $this->command->info('NIP: 87654321');
        $this->command->info('Password: password123');
    }
}