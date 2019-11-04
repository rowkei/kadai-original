<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lesson;
use App\Course;
use App\Teacher;


class LessonsController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        
        return view('lessons.index', [
            'lessons' => $lessons,    
        ]);
    }
    
    public function create(Request $request)
    {
        $lesson = new Lesson;
        $teacher = Teacher::find($request->teacher_id);
        //$course = $teacher->courses()->name;
        
        $teachers = Teacher::select('id', 'name') ->get();
        $teacher_id_loop = $teachers->pluck('name','id');
        
        $teacher_c = Teacher::all();
        
        $time = [
            '11:15~12:00' => '11:15~12:00' ,
            '12:00~12:45' => '12:00~12:45' ,
            '12:45~13:30' => '13:30~14:15' ,
            '14:15~15:00' => '15:00~15:45' ,
            '15:45~16:30' => '16:30~17:15' ,
            '17:15~18:00' => '18:00~18:45' ,
            '18:45~19:30' => '19:30~20:15' ,
            '20:15~21:00' => '21:00~21:45' ,
            ];
        
        return view('lessons.create', [
            'lesson'=> $lesson,
            'teacher_id_loop'=> $teacher_id_loop,
            'teacher_c'=> $teacher_c,
            'time' => $time,
            'teacher' => $teacher,
        ]);
    }
    
    public function store(Request $request)
    {
        
        $lesson = new Lesson;
        $lesson->teacher_id = $request->teacher_id;
        $lesson->course_id = $request->course_id;
        $lesson->lesson_date = $request->lesson_date;
        $lesson->lesson_time = $request->lesson_time;
        $lesson->save();
        $lesson->entry($lesson->teacher_id);
        
        return redirect('/lessons');
    }
    
    public function show($id)
    {
        $lesson = Lesson::find($id);
        
        return view('lessons.show', [
           'lesson' => $lesson, 
        ]);
    }
    
    public function edit($id)
    {
        $lesson = Lesson::find($id);
        $time = [
            '11:15~12:00' => '11:15~12:00' ,
            '12:00~12:45' => '12:00~12:45' ,
            '12:45~13:30' => '13:30~14:15' ,
            '14:15~15:00' => '15:00~15:45' ,
            '15:45~16:30' => '16:30~17:15' ,
            '17:15~18:00' => '18:00~18:45' ,
            '18:45~19:30' => '19:30~20:15' ,
            '20:15~21:00' => '21:00~21:45' ,
            ];
            
        return view('lessons.edit', [
            'lesson' => $lesson,
            'time' => $time,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        $lesson->course_id = $request->course_id;
        $lesson->lesson_date = $request->lesson_date;
        $lesson->lesson_time = $request->lesson_time;
        $lesson->save();
        
        return redirect('/lessons');
    }
    
    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();
        
        return redirect('/lessons');
    }
    
}
