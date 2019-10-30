@extends('layouts.app')

@section('content')

    <h1>id: {{ $teacher->name }} 編集</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($teacher, ['route' => ['teachers.update', $teacher->id], 'method' => 'put']) !!}
        
                <div class="form-group">
                    {!! Form::label('name', '名前:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    
                    @foreach($courses as $course)
                        {!! Form::checkbox('courses[]',$course->id) !!}
                        {!! $course->name !!}
                    @endforeach
                </div>
        
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>    

@endsection