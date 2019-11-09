@extends('layouts.app_admin')

@section('content')

    <h1>id: {{ $course->name }} 編集</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($course, ['route' => ['courses.update', $course->id], 'method' => 'put']) !!}
        
                <div class="form-group">
                    {!! Form::label('name', 'コース名:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
        
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>    

@endsection