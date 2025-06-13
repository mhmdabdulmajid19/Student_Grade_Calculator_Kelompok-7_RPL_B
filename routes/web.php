<?php

// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;

/*
|--------------------------------------------------------------------------|
| Web Routes                                                                |
|--------------------------------------------------------------------------|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::get('/login', [LecturerController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LecturerController::class, 'login']);
Route::post('/logout', [LecturerController::class, 'logout'])->name('logout');
Route::get('/logout', [LecturerController::class, 'logout'])->name('logout.get'); // Tambahan untuk GET method

// Protected routes (require authentication)
Route::middleware('auth')->group(function () {
    // Routes for selecting a course
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{courseId}/select', [CourseController::class, 'selectCourse'])->name('courses.select');

    // Routes for managing students in a course
    Route::get('/courses/{courseId}/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/courses/{courseId}/students/{studentId}', [StudentController::class, 'show'])->name('students.show');

    // Grade routes
    Route::post('/courses/{courseId}/students/{studentId}/grades', [GradeController::class, 'store'])->name('grades.store');
    Route::post('/grades/calculate', [GradeController::class, 'calculate'])->name('grades.calculate');
});

// Redirect to courses list after login if already authenticated
Route::get('/home', function () {
    return redirect('/courses');  // Mengarahkan ke daftar mata kuliah setelah login
});