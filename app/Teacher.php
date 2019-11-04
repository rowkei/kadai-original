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
    
    public function teach_lessons()
    {
        return $this->belongsToMany(Lesson::class, 'teacher_lesson', 'teacher_id', 'lesson_id')->withTimestamps();
    }
    
}
