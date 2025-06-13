<?php
// app/Models/Grade.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'aktifitas_partisipatif',
        'hasil_proyek',
        'quiz',
        'tugas',
        'uts',
        'uas',
        'rata_rata',
        'hasil_akhir',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function calculateAverage()
    {
        $average = (
            ($this->aktifitas_partisipatif * 0.25) +
            ($this->hasil_proyek * 0.25) +
            ($this->quiz * 0.10) +
            ($this->tugas * 0.10) +
            ($this->uts * 0.15) +
            ($this->uas * 0.15)
        );

        $this->rata_rata = round($average, 2);
        $this->hasil_akhir = $this->getLetterGrade($this->rata_rata);
        
        return $this->rata_rata;
    }

    private function getLetterGrade($score)
    {
        if ($score >= 80) {
            return 'A';
        } elseif ($score >= 70) {
            return 'B';
        } elseif ($score >= 60) {
            return 'C';
        } elseif ($score >= 50) {
            return 'D';
        } else {
            return 'E';
        }
    }
}