@extends('layouts.adminapp')
@section('content')
<html>
<body>
</body>
<div class="card">
  <h5 class="card-header">Profil Admin</h5> 
  @if(session('success_profil'))
        <div class="alert alert-success">
          {{ session('success_profil') }}
        </div>
  @elseif(session('error_profil'))
        <div class="alert alert-danger">
          {{ session('error_profil')}}
          
@endif
  <div class="card-body">
    <h5 class="card-title">Nama</h5>
    <p class="card-text">{{ auth()->user()->name}}<p>
    <h5 class="card-title">Username</h5>
    <p class="card-text">{{ auth()->user()->username}}<p>
    <h5 class="card-title">Email</h5>
    <p class="card-text">{{ auth()->user()->email}}<p>
   <a href="{{route('profile.update')}}" class="btn btn-primary">Edit Profile</a>    <a href="{{route('profile.update-password')}}" class="btn btn-link">Reset Password</a> 
  </div>
</div>
</html>
@endsection