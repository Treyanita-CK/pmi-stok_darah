@extends('layouts.userapp')
@section('content')
<html>
<body>
</body>
<div class="container mt-4">
<div class="card">
  <h5 class="card-header">Profil</h5> 
  @if(session('success_profil'))
        <div class="alert alert-success">
          {{ session('success_profil') }}
        </div>
  @elseif(session('error_profil'))
        <div class="alert alert-danger">
          {{ session('error_profil')}}
@endif
  @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
@endif
  <div class="card-body">
    <h5 class="card-title">Nama</h5>
    <p class="card-text">{{ auth()->user()->name}}<p>
    <h5 class="card-title">Username</h5>
    <p class="card-text">{{ auth()->user()->username}}<p>
    <h5 class="card-title">Email</h5>
    <p class="card-text">{{ auth()->user()->email}}<p>
   <a href="{{route('profilUserEdit')}}" class="btn btn-primary">Edit Profile</a>    <a href="{{route('changePassword')}}" class="btn btn-link">Reset Password</a> 
  </div>
</div>
<br>
<a href="{{route('formDonor')}}" class="btn btn-link">Kembali</a> 
<br>
<hr>
</html>
@endsection