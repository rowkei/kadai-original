<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Teacher;
use App\Course;
use App\Lesson;
use \Auth;
use App\User;

class UsersController extends Controller
{
    public function reserve(Request $request)
    {
        $teachers = Teacher::select('id', 'name') ->get();
        $teacher_id_loop = $teachers->pluck('name','id');
        
        $courses = Course::select('id', 'name') ->get();
        $course_id_loop = $courses->pluck('name','id');
        
        $lessons = Lesson::where('teacher_id', '=', $request->teacher_id)->where('course_id', '=', $request->course_id)->wherenull('user_id')->get();
        
        
        return view('users.reserve', [
            'teacher_id_loop'=> $teacher_id_loop,
            'course_id_loop'=> $course_id_loop,
            'lessons'=> $lessons,
        ]);
    }
    
    public function apply($lessonId)
    {
        $lesson = Lesson::find($lessonId);
        $lesson->user_id = Auth::id();
        $lesson->save();
        $lesson->reserved($lesson->user_id);
        //return redirect('/reserve');
        return back();
    }
    
    public function index()
    {
        $user = User::find(Auth::id());
        $lessons = $user->lessons;
        return view('welcome',[
            'lessons'=> $lessons,
        ]);
    }
    
    public function cancel($lessonId)
    {
        $lesson = Lesson::find($lessonId);
        $lesson->cancel($lesson->user_id);
        $lesson->user_id = null;
        $lesson->save();
        
        return back();
    }
}
