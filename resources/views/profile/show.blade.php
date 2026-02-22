@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
    <h1>User Profile Page</h1>

    <div id="profile-info">
        <p><strong>Username: </strong>{{$user->username}}</p>
        <p><strong>Email: </strong>{{$user->email}}</p>
        <p><strong>Bio: </strong>{{$user->profile->bio ?? 'No bio available yet.'}}</p>

        <button id="show-edit-form">Edit Bio</button>
    </div>

    <div id="edit-bio-section" class="hidden">
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <label for="bio" class="block font-medium">Update Your Bio</label> <br>
            <textarea 
                name="bio" 
                id="bio" 
                rows="4"
                class="w-full border rounded-md p-2 @error('bio') border-red-500 @enderror"
            >
                {{ old('bio', $user->profile->bio) }}
            </textarea>

            @error('bio')
                <p class="text-red-600 text-xs mt-1 font-medium">{{$message}}</p>
            @enderror

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
            <button type="button" id="hide-edit-form" class="text-gray-600 ml-2 cursor-pointer">Cancle</button>
        </form>
    </div>

    <hr style="margin-top: 40px;">

    <div class="danger-zone">
        <form method="POST" action="{{ route('account.destroy') }}" onsubmit=" return confirm('Are you sure you want to delete your account?')">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn-danger">Delete Account</button>
        </form>
    </div>

@endsection