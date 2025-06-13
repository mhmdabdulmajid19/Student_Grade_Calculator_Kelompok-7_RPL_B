<?php
// app/Http/Controllers/StudentController.php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($courseId, Request $request)
    {
        // Pastikan course yang dipilih valid
        $course = Course::where('id', $courseId)
                        ->where('lecturer_id', Auth::id())
                        ->firstOrFail();

        // Mengambil data mahasiswa yang terdaftar dalam mata kuliah yang dipilih
        $query = Student::where('course_id', $courseId)->with('grades');

        // Menangani pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%");
            });
        }

        // Menampilkan mahasiswa dengan pagination
        $students = $query->paginate(10);

        // Kembalikan ke tampilan dengan data mahasiswa dan course
        return view('student_list', compact('course', 'students'));
    }

    public function show($courseId, $studentId)
    {
        $course = Course::where('id', $courseId)
                       ->where('lecturer_id', Auth::id())
                       ->firstOrFail();
        
        $student = Student::where('id', $studentId)
                         ->where('course_id', $courseId)
                         ->firstOrFail();
        
        $grade = $student->getGradeForCourse($courseId);
        
        return view('grade_form', compact('course', 'student', 'grade'));
    }
}