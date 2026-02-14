@extends('layouts.app')
@section('title', 'Register')
@section('content')
    <h1>Register</h1>

    <form method="POST" action="/register">
        @csrf

        <label for="username">Name</label>
        <input type="text" id="username" name="username">

        <label for="email">Email</label>
        <input type="email" id="email" name="email">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <button type="submit">Register</button>
    </form>

    <div class="auth-options">
        <p>Do you already have an accoutn? <a href="{{route('login.showLoginForm')}}">Login</a></p>
    </div>

    @if ($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach ( $errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
