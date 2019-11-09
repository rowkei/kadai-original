@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <h1>予約一覧</h1>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>日時</th>
                    <th>時間</th>
                    <th>コース</th>
                    <th>講師</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lessons as $lesson)
                <tr>
                    <td>{!!  $lesson->lesson_date !!}</td>
                    <td>{!!  $lesson->lesson_time !!}</td>
                    <td>{!!  $lesson->course->name !!}</td>
                    @foreach($lesson->entry_teachers as $teacher)
                    <td>{!! $teacher->name  !!}</td>
                    {!! Form::model($lesson, ['route' => ['user.cancel', $lesson->id], 'method' => 'put']) !!}
                    <td>{!! Form::submit('キャンセル',['class' => 'btn btn-danger']) !!}</td>
                    {!! Form::close() !!}
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
        
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome</h1>
                {!! link_to_route('signup.get', 'ユーザー登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection