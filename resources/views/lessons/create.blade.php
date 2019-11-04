@extends('layouts.app')

@section('content')
    <h1>レッスン登録</h1>
    
    <div class="row">
        <div class="col-12">
            @isset($teacher->id)
                <h2>{!! $teacher->name !!}</h2>
                {!! Form::model($lesson, ['route' => 'lessons.store']) !!}
                {!! Form::hidden('teacher_id',$teacher->name) !!}
                <div class="form-group">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>日時</th>
                                <th>時間</th>
                                <th>コース</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{!! Form::date('lesson_date')!!}</td>
                                <td>{!! Form::select('lesson_time', $time,['class' => 'form-control'])!!}</td>
                                @foreach ($teacher->teach_courses as $course)
                                    <td>{!! Form::radio('course_id', $course->id) !!}
                                    {!! $course->name !!}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            @else        
                {!! Form::open(['route' => ['lessons.create'], 'method' => 'get']) !!}
                    {!! Form::select('teacher_id', $teacher_id_loop,['class' => 'form-control'])!!}
                    {!! Form::submit('コース一覧表示' ,['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!} 
            @endif
        </div>
    </div>
    
@endsection