<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'coursename',
        'coursecode',
        'credits',
        'duration',
        'description',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student')->withTimestamps();
    }
    
    protected $table = 'courses'; 
    protected $primaryKey = 'id'; 
    public $timestamps = true; 



}
