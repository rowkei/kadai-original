<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function reserve_users()
    {
        return $this->belongsToMany(User::class, 'user_lesson', 'lesson_id', 'user_id')->withTimestamps();
    }
    
    public function entry_teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_lesson', 'lesson_id', 'teacher_id')->withTimestamps();
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    public function entry($teacherId)
    {
        $this->entry_teachers()->attach($teacherId);
    }
    
    public function reserved($userId)
    {
        $this->reserve_users()->attach($userId);
    }
    
    public function cancel($userId)
    {
        $this->reserve_users()->detach($userId);
    }
    
}
