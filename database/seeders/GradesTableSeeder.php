<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grades')->insert([
            [
                'id' => 5,
                'student_id' => 16,
                'course_id' => 7,
                'aktifitas_partisipatif' => 100.00,
                'hasil_proyek' => 100.00,
                'quiz' => 100.00,
                'tugas' => 100.00,
                'uts' => 100.00,
                'uas' => 100.00,
                'rata_rata' => 100.00,
                'hasil_akhir' => 'A',
                'created_at' => '2025-06-11 11:49:33',
                'updated_at' => '2025-06-11 11:53:03',
            ],
        ]);
    }
}