<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            // Original students (ID 16-19)
            [
                'id' => 16,
                'nim' => '21120123120037',
                'name' => 'Muhammad Abdul Majid',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'nim' => '21120123130069',
                'name' => 'Muhammad Rafi Athallah',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 18,
                'nim' => '21120123120009',
                'name' => 'Marsel Muleri',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 19,
                'nim' => '21120123140165',
                'name' => 'Rahmadian Setyo Purnomo',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Additional students (ID 20-49)
            [
                'id' => 20,
                'nim' => '20230101',
                'name' => 'Ahmad Faiz',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 21,
                'nim' => '20230102',
                'name' => 'Budi Santoso',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 22,
                'nim' => '20230103',
                'name' => 'Citra Wijaya',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 23,
                'nim' => '20230104',
                'name' => 'Diana Sari',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 24,
                'nim' => '20230105',
                'name' => 'Eka Putri',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 25,
                'nim' => '20230106',
                'name' => 'Fahmi Alamsyah',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 26,
                'nim' => '20230107',
                'name' => 'Gina Hidayati',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 27,
                'nim' => '20230108',
                'name' => 'Hendri Setiawan',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 28,
                'nim' => '20230109',
                'name' => 'Indra Kusuma',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 29,
                'nim' => '20230110',
                'name' => 'Joko Santoso',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 30,
                'nim' => '20230111',
                'name' => 'Kirana Dewi',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 31,
                'nim' => '20230112',
                'name' => 'Lina Susanti',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 32,
                'nim' => '20230113',
                'name' => 'Mia Amalia',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 33,
                'nim' => '20230114',
                'name' => 'Nina Pratiwi',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 34,
                'nim' => '20230115',
                'name' => 'Omar Ridwan',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 35,
                'nim' => '20230116',
                'name' => 'Putra Wijaya',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 36,
                'nim' => '20230117',
                'name' => 'Qiana Nur',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 37,
                'nim' => '20230118',
                'name' => 'Rina Dewi',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 38,
                'nim' => '20230119',
                'name' => 'Siti Rohani',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 39,
                'nim' => '20230120',
                'name' => 'Tina Safira',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 40,
                'nim' => '20230121',
                'name' => 'Umar Faruk',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 41,
                'nim' => '20230122',
                'name' => 'Vina Handayani',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 42,
                'nim' => '20230123',
                'name' => 'Wahyu Satria',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 43,
                'nim' => '20230124',
                'name' => 'Xena Puspita',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 44,
                'nim' => '20230125',
                'name' => 'Yudha Prasetya',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 45,
                'nim' => '20230126',
                'name' => 'Zahra Murni',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 46,
                'nim' => '20230127',
                'name' => 'Ayu Lestari',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 47,
                'nim' => '20230128',
                'name' => 'Bima Arya',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 48,
                'nim' => '20230129',
                'name' => 'Cahya Wijaya',
                'angkatan' => 2023,
                'status' => 'Baru',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
            [
                'id' => 49,
                'nim' => '20230130',
                'name' => 'Dini Oktaviani',
                'angkatan' => 2022,
                'status' => 'Ulang',
                'course_id' => 7,
                'created_at' => '2025-06-11 19:33:31',
                'updated_at' => '2025-06-11 19:33:31',
            ],
        ];

        DB::table('students')->insert($students);
    }
}