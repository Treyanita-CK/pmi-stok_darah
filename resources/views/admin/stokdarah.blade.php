@extends('layouts.adminapp')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Stok Darah</title>
    <!-- Memuat file CSS eksternal -->
    <link rel="stylesheet" href="styles.css">
    <!-- Load Bootstrap CSS -->
    <link href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<a href="{{route('home')}}" class="btn btn-link">Back</a> 
<div class="container">
        <h5 class="text-center">Rincian Data Stok Darah PMI Kota Cirebon - Admin Page</h2>
 <!--button CREATE dan CETAK PDF-->
 <div class="container">
 <a href="{{ route('stokdarah.store') }}" type="button" class="btn btn-secondary btn-sm">Create Data</a>
 <a href="{{ route('cetakPdf') }}" type="button" class="btn btn-primary btn-sm">Export Data as PDF</a>
</div>

<div class="card-body mt-4">
@if(session('success_store'))
        <div class="alert alert-success">
          {{ session('success_store') }}
        </div>
@elseif(session('error_store'))
        <div class="alert alert-danger">
          {{ session('error_store')}}
@endif

@if(session('success_edit'))
        <div class="alert alert-success">
          {{ session('success_edit') }}
        </div>
@elseif(session('error_edit'))
        <div class="alert alert-danger">
          {{ session('error_edit')}}
@endif

@if(session('success_delete'))
        <div class="alert alert-success">
          {{ session('success_delete')}}
        </div>
@elseif(session('error_delete'))
        <div class="alert alert-danger">
          {{ session('error_delete')}}
        </div>
@endif
    <!--content-->
<div class ="container mt-4">
<table class="table">
    <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">Golongan Darah</th>
      <th scope="col">Jenis Darah</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Terakhir Diupdate</th>
      <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($stokDarah as $stok)
    <td>{{ $stok->id}}</td>
    <td>{{ $stok->gol_darah}}</td>
    <td>{{ $stok->jenis}}</td>
    <td>{{ $stok->jumlah}}</td>
    <td>{{ $stok->updated_at}}</td>
    <td>
      <!--butoon edit-->
      @csrf 
      <a href="{{route('stokdarah.update', $stok->id)}}" class="btn btn-primary">Edit</a>
      <!--button delete-->
      <form action="{{route('stokdarah.delete', $stok->id)}}" method="POST" style="display: inline;">
      @csrf 
      @method('DELETE')
      <button type="submit" class="btn btn-danger" onclick="return confirm('Are your sure want to delete this blood stock data?')">Delete</button>
  </form>
    </td>
  </tbody>
  @endforeach
</table>
    <!-- Load Bootstrap JS (optional, for certain components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection

