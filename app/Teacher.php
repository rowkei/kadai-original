<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class Teacher extends Model
{
    public function teach_courses()
    {
        return $this->belongsToMany(Course::class, 'teacher_course', 'teacher_id', 'course_id')->withTimestamps();    
    }
    
    public function teach($courseId)
    {
        $this->teach_courses()->sync($courseId);
    }
    
}
