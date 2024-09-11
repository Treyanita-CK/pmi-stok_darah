@extends('layouts.adminapp')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Data Pendonor</title>
    <!-- Memuat file CSS eksternal -->
    <link rel="stylesheet" href="styles.css">
    <!-- Load Bootstrap CSS -->
    <link href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
        <h5 class="text-center">Rincian Data Pendonor Darah PMI Kota Cirebon - Admin Page</h2>
 <!--button CREATE dan CETAK PDF-->
 <a href="{{ route('pendonor.pdf') }}" class="btn btn-primary">Export as PDF</a>
</div>
@if(session('success_pendonor'))
        <div class="alert alert-success">
          {{ session('success_pendonor')}}
        </div>
@elseif(session('error_pendonor'))
        <div class="alert alert-danger">
          {{ session('error_pendonor')}}
        </div>
@endif
    <!--content-->
<div class ="container mt-4">
<table class="table">
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama</th>
      <th scope="col">Tempat Lahir</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Alamat</th>
      <th scope="col">Telepon</th>
      <th scope="col">Ketersediaan</th>
      <th scope="col">Berat Badan</th>
      <th scope="col">Golongan Darah</th>
      <th scope="col">Donor - Ke</th>
      <th scope="col">Tanggal Daftar</th>
      <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($pendonor as $item)
    <td>{{ $item->id}}</td>
    <td>{{ $item->nama}}</td>
    <td>{{ $item->tempat_lahir}}</td>
    <td>{{ $item->tgl_lahir}}</td>
    <td>{{ $item->jenis_kelamin}}</td>
    <td>{{ $item->alamat}}</td>
    <td>{{ $item->telepon}}</td>
    <td>{{ $item->ketersediaan}}</td>
    <td>{{ $item->bb}}</td>
    <td>{{ $item->gol_darah}}</td>
    <td>{{ $item->donor_ke}}</td>
    <td>{{ $item->created_at}}</td>
    <td>
      <!--button delete-->
      <form action="{{route('delete.pendonor', $item->id)}}" method="POST" style="display: inline;">
      @csrf 
      @method('DELETE')
      <button type="submit" class="btn btn-danger" onclick="return confirm('Are your sure want to delete this donor data?')">Delete</button>
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

