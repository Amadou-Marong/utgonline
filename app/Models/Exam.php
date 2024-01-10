<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'course_id', 
        'date', 
        'time',
        'duration'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class,'id', 'course_id');
    }

    // public function answers()
    // {
    //     return $this->hasMany(Answer::class);
    // }
}
