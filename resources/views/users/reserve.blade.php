@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => ['user.reserve'], 'method' => 'get']) !!}
        {!! Form::select('teacher_id', $teacher_id_loop,['class' => 'form-control'])!!}
        {!! Form::select('course_id', $course_id_loop,['class' => 'form-control'])!!}
        {!! Form::submit('予約可能一覧表示' ,['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    
    <div class="form-group">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>日時</th>
                    <th>時間</th>
                </tr>
            </thead>
            @foreach($lessons as $lesson)
            @isset($lesson->id)
            {!! Form::open(['route' => ['user.apply', $lesson->id], 'method' => 'put']) !!}
            <tbody>
                <tr>
                    <td>{!! $lesson->lesson_date !!}</td>
                    <td>{!! $lesson->lesson_time !!}</td>
                    <td>{!! Form::submit('予約する', ['class' => 'btn btn-primary']) !!}</td>
                </tr>
                {!! Form::close() !!}
            @endif
            @endforeach
            </tbody>
        </table>
    </div>
    
    
@endsection