@extends('layouts.app')

@section('content')
    <h1>コース一覧</h1>
    
    @if (count($courses) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>コース名</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td>{!! link_to_route('courses.show', $course->name, ['id' => $course->id]) !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif    
    
    {!! link_to_route('courses.create', 'コース登録',[],['class' => 'btn btn-primary']) !!}
    
@endsection