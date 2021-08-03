@extends('layouts.app')

@section('content')

    <div class="jumbotron">
        <div class="list-group">
            <h1>{{$post->title}}</h1>
            <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
            <hr style="width:100%">
            <div>
                {!!$post->body!!}
            </div>
            <br/>
            <small>Written by {{$post->user->name}}</small>
            <small>Written on {{$post->created_at}}</small>
        </div>
        <hr>
        <div id="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="row">
                        @if (!Auth::guest())
                            <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary mr-1">Edit</a>
                            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger mr-1'])}}
                            {!!Form::close()!!}
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <a href="{{ url()->previous() }}" class="btn btn-primary float-right">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
