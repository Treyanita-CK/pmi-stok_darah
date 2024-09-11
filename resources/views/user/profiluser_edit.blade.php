@extends('layouts.userapp')

@section('content')
<div class="container">
        <h2>Edit Profile</h2>
        
        @if(session('success_profil'))
            <div class="alert alert-success">{{ session('success_profil') }}</div>
        @endif

        <form action="{{ route('profilUserEditAction') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="{{ auth()->user()->username }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
        <br>
        <br>
        <br>
        <hr>
</div>
@endsection
