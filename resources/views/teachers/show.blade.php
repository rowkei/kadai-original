@extends('layouts.app')

@section('content')
    <h1>{{ $teacher->name}}　詳細</h1>
    
    <table class="table table-bordered">
        <tr>
            <th>名前</th>
            <td>{{ $teacher->name }}</td>
        </tr>
        <tr>
            <th>担当コース</th>
            @foreach ($courses as $course)
            <td>{{ $course->name }}</td>
            @endforeach
        </tr>
    </table>
    
    {!! link_to_route('teachers.edit', '講師編集', ['id' => $teacher->id], ['class' => 'btn btn-light']) !!}
    
    {!! Form::model($teacher, ['route' => ['teachers.destroy', $teacher->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除',['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    
@endsection