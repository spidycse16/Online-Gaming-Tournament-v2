@extends('layouts.layout')

@section('title', 'Welcome to Gamers Lair')

@section('content')
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{asset('images/welcomelogo.jpg')}}" alt="" width="72" height="57">
        <h1 class="display-5 fw-bold">Welcome to Gamers Lair</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">The ultimate destination for online gaming tournaments. Compete with the best, win amazing prizes, and write your name in the hall of fame.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="/tournaments" type="button" class="btn btn-primary btn-lg px-4 gap-3">Browse Tournaments</a>
                <a href="/blog" type="button" class="btn btn-outline-secondary btn-lg px-4">Read our Blog</a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection
