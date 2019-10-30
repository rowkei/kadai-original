@extends('layouts.app')

@section('content')
    <h1>講師一覧</h1>
    
    @if (count($teachers) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>名前</th>
                    <th>担当コース</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                <tr>
                    <td>{!! link_to_route('teachers.show', $teacher->name, ['id' => $teacher->id]) !!}</td>
                    @foreach ($teacher->teach_courses as $course)
                        <td>{{ $course->name }}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif    
    
    {!! link_to_route('teachers.create', '講師登録',[],['class' => 'btn btn-primary']) !!}
    
@endsection