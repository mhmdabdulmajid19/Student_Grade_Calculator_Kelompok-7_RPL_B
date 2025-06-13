<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'id' => 7,
                'code' => 'TSK1624403',
                'name' => 'Rekayasa Perangkat Lunak',
                'class' => 'A',
                'sks' => 3,
                'lecturer_id' => 6,
                'created_at' => '2025-06-11 17:40:11',
                'updated_at' => '2025-06-11 17:40:11',
            ],
            [
                'id' => 8,
                'code' => 'TSK1624404',
                'name' => 'Sistem Operasi',
                'class' => 'B',
                'sks' => 3,
                'lecturer_id' => 6,
                'created_at' => '2025-06-11 17:40:11',
                'updated_at' => '2025-06-11 17:40:11',
            ],
            [
                'id' => 9,
                'code' => 'IF12346',
                'name' => 'Algoritma dan Struktur Data',
                'class' => 'B',
                'sks' => 3,
                'lecturer_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'code' => 'IF12347',
                'name' => 'Pemrograman Web',
                'class' => 'C',
                'sks' => 3,
                'lecturer_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'code' => 'IF12348',
                'name' => 'Sistem Operasi',
                'class' => 'A',
                'sks' => 3,
                'lecturer_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'code' => 'IF12349',
                'name' => 'Keamanan Jaringan',
                'class' => 'B',
                'sks' => 3,
                'lecturer_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'code' => 'IF12350',
                'name' => 'Analisis dan Perancangan Sistem',
                'class' => 'C',
                'sks' => 3,
                'lecturer_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'code' => 'IF12351',
                'name' => 'Jaringan Komputer',
                'class' => 'A',
                'sks' => 3,
                'lecturer_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'code' => 'IF12352',
                'name' => 'Kecerdasan Buatan',
                'class' => 'B',
                'sks' => 3,
                'lecturer_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'code' => 'IF12353',
                'name' => 'Rekayasa Perangkat Lunak Kelas B',
                'class' => 'B',
                'sks' => 3,
                'lecturer_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'code' => 'IF12354',
                'name' => 'Teori Automata',
                'class' => 'C',
                'sks' => 3,
                'lecturer_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('courses')->insert($courses);
    }
}