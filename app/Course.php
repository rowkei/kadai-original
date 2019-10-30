<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_course', 'course_id', 'teacher_id')->withTimestamps();
    }
}
