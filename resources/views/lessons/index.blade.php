@extends('layouts.app')

@section('content')
    <h1>レッスン一覧</h1>
    
    @if (count($lessons) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>講師名</th>
                    <th>コース名</th>
                    <th>日付</th>
                    <th>時間</th>
                    <th>生徒名</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lessons as $lesson)
                <tr>
                    @foreach ($lesson->entry_teachers as $teacher)
                    <td>{!! link_to_route('lessons.show', $teacher->name, ['id' => $lesson->id]) !!}</td>
                    @endforeach
                    <td>{!! $lesson->course->name !!}</td>
                    <td>{!! $lesson->lesson_date !!}</td>
                    <td>{!! $lesson->lesson_time !!}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif    
    
    {!! link_to_route('lessons.create', 'レッスン登録',[],['class' => 'btn btn-primary']) !!}
    
@endsection