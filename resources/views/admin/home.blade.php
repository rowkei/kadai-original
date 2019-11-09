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
        @include('lessons.index')
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome</h1>
                {!! link_to_route('signup.get', 'ユーザー登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection