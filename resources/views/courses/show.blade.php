@extends('layouts.app')

@section('content')
    <h1>{{ $course -> name}}　詳細</h1>
    
    <table class="table table-bordered">
        <tr>
            <th>コース名</th>
            <td>{{ $course->name }}</td>
        </tr>
    </table>
    
    {!! link_to_route('courses.edit', 'コース編集', ['id' => $course->id], ['class' => 'btn btn-light']) !!}
    
    {!! Form::model($course, ['route' => ['courses.destroy', $course->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除',['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    
@endsection