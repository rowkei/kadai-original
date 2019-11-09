<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Teacher;
use App\Course;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        
        return view('teachers.index', [
            'teachers' => $teachers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = new Teacher;
        
        $courses = Course::all();
        
        return view('teachers.create', [
            'teacher'=> $teacher,
            'courses'=> $courses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'courses' => 'required',
        ]);
        
        $teacher = new Teacher;
        $teacher-> name = $request->name;
        $teacher->save();
        $courses = $request->courses;
        $teacher->teach($courses);
        
        
        return redirect('/admin/teachers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);
        $courses = $teacher->teach_courses;
        
        return view('teachers.show', [
            'teacher' => $teacher,
            'courses' => $courses,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $courses = Course::all();
        
        return view('teachers.edit', [
            'teacher' => $teacher,
            'courses' => $courses,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'courses' => 'required',
        ]);
        
        $teacher = Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->save();
        $courses = $request->courses;
        $teacher->teach($courses);
        
        return redirect('/admin/teachers');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        
        return redirect('/admin/teachers');
    }
}
