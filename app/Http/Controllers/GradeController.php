<?php
// app/Http/Controllers/GradeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Student;
use App\Models\Grade;

class GradeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $courseId, $studentId)
    {
        try {
            $request->validate([
                'aktifitas_partisipatif' => 'required|numeric|min:0|max:100',
                'hasil_proyek' => 'required|numeric|min:0|max:100',
                'quiz' => 'required|numeric|min:0|max:100',
                'tugas' => 'required|numeric|min:0|max:100',
                'uts' => 'required|numeric|min:0|max:100',
                'uas' => 'required|numeric|min:0|max:100',
            ]);

            $course = Course::where('id', $courseId)
                           ->where('lecturer_id', Auth::id())
                           ->firstOrFail();

            $student = Student::where('id', $studentId)
                             ->where('course_id', $courseId)
                             ->firstOrFail();

            $grade = Grade::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'course_id' => $courseId,
                ],
                [
                    'aktifitas_partisipatif' => $request->aktifitas_partisipatif,
                    'hasil_proyek' => $request->hasil_proyek,
                    'quiz' => $request->quiz,
                    'tugas' => $request->tugas,
                    'uts' => $request->uts,
                    'uas' => $request->uas,
                ]
            );

            $grade->calculateAverage();
            $grade->save();

            // Check if request expects JSON (AJAX request)
            if ($request->expectsJson() || $request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'grade' => $grade->hasil_akhir,
                    'rata_rata' => $grade->rata_rata,
                    'message' => 'Nilai berhasil disimpan!'
                ]);
            }

            // Fallback for regular form submission
            return redirect()
                ->route('students.index', ['courseId' => $courseId])
                ->with('success', 'Nilai berhasil disimpan!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $e->errors()
                ], 422);
            }
            
            return back()->withErrors($e->errors())->withInput();
            
        } catch (\Exception $e) {
            \Log::error('Grade store error: ' . $e->getMessage());
            
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat menyimpan nilai: ' . $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Terjadi kesalahan saat menyimpan nilai')->withInput();
        }
    }

    public function calculate(Request $request)
    {
        try {
            $request->validate([
                'aktifitas_partisipatif' => 'required|numeric|min:0|max:100',
                'hasil_proyek' => 'required|numeric|min:0|max:100',
                'quiz' => 'required|numeric|min:0|max:100',
                'tugas' => 'required|numeric|min:0|max:100',
                'uts' => 'required|numeric|min:0|max:100',
                'uas' => 'required|numeric|min:0|max:100',
            ]);

            $average = (
                ($request->aktifitas_partisipatif * 0.25) +
                ($request->hasil_proyek * 0.25) +
                ($request->quiz * 0.10) +
                ($request->tugas * 0.10) +
                ($request->uts * 0.15) +
                ($request->uas * 0.15)
            );

            $letterGrade = $this->getLetterGrade($average);

            return response()->json([
                'rata_rata' => round($average, 2),
                'hasil_akhir' => $letterGrade
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan saat menghitung nilai'
            ], 500);
        }
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