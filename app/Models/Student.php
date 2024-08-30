<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $timestamps = true; 

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phonenumber',
        'student_id',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student')->withTimestamps();
    }
}
