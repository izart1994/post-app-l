@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1>Create {{$title}}</h1>
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Tajuk')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                {!! $errors->first('title', '<p class="help-block">Ruangan tajuk diperlukan</p>') !!}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Keterangan')}}
                {{Form::textarea('body', '', ['id' => 'editor','class' => 'form-control', 'placeholder' => ''])}}
                {!! $errors->first('body', '<p class="help-block">Ruangan keterangan diperlukan</p>') !!}
            </div>
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            <br>
            <div>
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Go Back</a>
            </div>

        {!! Form::close() !!}
    </div>
@endsection
