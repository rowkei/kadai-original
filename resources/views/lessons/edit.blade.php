@extends('layouts.app')

@section('content')

    <h1>レッスン 編集</h1>
    @foreach($lesson->entry_teachers as $teacher)
    <h2>{!! $teacher->name !!}</h2>
    @endforeach
    <div class="row">
        <div class="col-12">
            {!! Form::model($lesson, ['route' => ['lessons.update', $lesson->id], 'method' => 'put']) !!}
        
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
                                @foreach ($lesson->entry_teachers as $teacher)
                                    @foreach ($teacher->teach_courses as $course)
                                        <td>{!! Form::radio('course_id', $course->id) !!}
                                        {!! $course->name !!}</td>
                                    @endforeach
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
        
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>    

@endsection