@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
    <h1>User Profile Page</h1>

    <p><strong>Username:</strong>{{$user->username}}</p>
    <p><strong>Email:</strong>{{$user->email}}</p>
    <p><strong>Bio:</strong>{{$user->profile->bio ?? 'No bio available yet.'}}</p>
@endsection