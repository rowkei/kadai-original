@extends('layouts.app_admin')

@section('content')
    <h1>レッスン　詳細</h1>
    
    <table class="table table-bordered">
        <tr>
            <th>講師</th>
            @foreach($lesson->entry_teachers as $teacher)
            <td>{{ $teacher->name }}</td>
            @endforeach
        </tr>
        <tr>
            <th>コース</th>
            <td>{{ $lesson->course->name }}</td>
        </tr>
        <tr>
            <th>日付</th>
            <td>{{ $lesson->lesson_date }}</td>
        </tr>
        <tr>
            <th>時間</th>
            <td>{{ $lesson->lesson_time }}</td>
        </tr>
        <tr>
            <th>生徒</th>
            @if(is_null($lesson->user_id))
                <td>未予約</td>
            @else
                @foreach ($lesson->reserve_users as $user)
                    <td>{!! $user->name !!}</td>
                @endforeach
            @endif
        </tr>
    </table>
    
    {!! link_to_route('lessons.edit', 'レッスン編集', ['id' => $lesson->id], ['class' => 'btn btn-light']) !!}
    
    {!! Form::model($lesson, ['route' => ['lessons.destroy', $lesson->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除',['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    
@endsection