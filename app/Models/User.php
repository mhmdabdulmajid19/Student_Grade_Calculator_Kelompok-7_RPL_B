<?php
// app/Models/User.php

// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nip', 'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Overriding the password mutator
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value); // Hash password before saving
    }
     // Definisikan relasi one-to-many
    public function courses()
    {
        return $this->hasMany(Course::class, 'lecturer_id');  // Pastikan 'lecturer_id' adalah foreign key yang sesuai di tabel 'courses'
    }

}
