<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class CourseController extends Controller
{
    public function __construct()
    {
        // Ensure only authenticated users (lecturers) can access this controller's actions
        $this->middleware('auth');
    }

    // Display the list of courses for the logged-in lecturer
    public function index()
    {
        // Mengambil data mata kuliah yang diampu oleh dosen yang sedang login
        $lecturer = Auth::user();
        $courses = $lecturer->courses()->paginate(10); // Ambil mata kuliah berdasarkan dosen yang sedang login dengan pagination

        // Mengirim data yang sudah dipaginate ke view
        return view('course_list', compact('courses'));
    }

    // Select a course and redirect to the student list for that course
    public function selectCourse($courseId)
    {
        $course = Course::where('id', $courseId)
                       ->where('lecturer_id', Auth::id())  // Ensure the lecturer is authorized to select the course
                       ->firstOrFail();  // If no course found, return a 404
        
        session(['selected_course_id' => $courseId]);  // Store selected course ID in session
        
        // Redirect to the students index page for the selected course
        return redirect()->route('students.index', $courseId);
    }
}