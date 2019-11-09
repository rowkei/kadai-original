@extends('layouts.app_admin')

@section('content')
    @if (Auth::check())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{!! link_to_route('admin.home', 'レッスン一覧') !!}</th>
                    <th>{!! link_to_route('teachers.index', '講師一覧') !!}</th>
                    <th>{!! link_to_route('courses.index', 'コース一覧') !!}</th>
                </tr>
            </thead>
        </table>
    
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
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome</h1>
                {!! link_to_route('signup.get', 'ユーザー登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
    
@endsection