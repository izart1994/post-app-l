@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Welcome To Laravel!</h1>
        <p>This is the laravel application from the "Laravel From Scratch" YouTube series</p>
        @guest
            <p>
                <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
            </p>
        @else
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">You successfully login to this site</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            Anda telah log masuk, {{ Auth::user()->name }}
                        </div>
                    </div>
                </div>
            </div>
        @endguest
    </div>
@endsection