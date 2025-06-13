<?php
// app/Http/Controllers/LecturerController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LecturerController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('login');
    }

  // app/Http/Controllers/LecturerController.php

// app/Http/Controllers/LecturerController.php

public function login(Request $request)
{
    $request->validate([
        'nip' => 'required|string',
        'password' => 'required|string',
    ]);

    // Cari dosen berdasarkan NIP
    $user = User::where('nip', $request->nip)->first();

    if (!$user) {
        return back()->withErrors([
            'nip' => 'NIP tidak ditemukan di database.',
        ])->onlyInput('nip');
    }

    // Cek apakah password cocok dengan hash di database menggunakan Hash::check()
    if (!Hash::check($request->password, $user->password)) {
        return back()->withErrors([
            'password' => 'Password tidak cocok.',
        ])->onlyInput('nip');
    }

    // Autentikasi dengan NIP dan password menggunakan Auth::attempt()
    $credentials = [
        'nip' => $request->nip,
        'password' => $request->password,
    ];

    if (Auth::attempt($credentials, $request->has('remember'))) {
        $request->session()->regenerate();
        // Arahkan ke halaman daftar mata kuliah setelah login berhasil
        return redirect()->route('courses.index');
    }

    return back()->withErrors([
        'password' => 'Password tidak cocok.',
    ]);
}



    public function dashboard()
    {
        // Pastikan user (dosen) sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Ambil dosen yang sedang login
        $lecturer = Auth::user();

        // Ambil mata kuliah yang terkait dengan dosen
        $courses = $lecturer->courses;  // Pastikan relasi 'courses' sudah didefinisikan di model User

        // Kirim data dosen dan mata kuliah ke view
        return view('course_list', compact('courses')); 

    }

    // Logout dosen
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
