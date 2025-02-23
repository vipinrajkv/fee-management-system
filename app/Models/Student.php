<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_name',
        'student_email',
        'student_phone',
        'student_dob',
        'student_address',
        'is_active',
        'status',
    ];
}
