@extends('layouts.app')

@section('content')
    <h1>コース登録</h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form::model($course, ['route' => 'courses.store']) !!}
        
                <div class="form-group">
                    {!! Form::label('name', 'コース名:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
        
                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection