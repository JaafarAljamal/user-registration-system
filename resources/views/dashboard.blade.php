@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
    <div class="container">
        <h1>Welcome to User Registration System!</h1>
        <p>You have successfully loged in.</p>
        <a href="{{route('profile.show')}}" class="btn btn-primary">View my profile</a>
    </div>
@endsection
