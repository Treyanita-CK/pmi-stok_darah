@extends('layouts.userapp')
@section('title','Tampilan Form Donor Darah')
@section('content')
<div class="container">
    @auth
    <div class="d-flex align-items-center">
        <h5 class="card-text mr-3">Selamat datang, {{ auth()->user()->username }}!</h5>
    </div>
    @endauth
    <br>
    <h3>Form Calon Donor Darah</h3> 
    @if(session('success_store'))
        <div class="alert alert-success">
          {{ session('success_store') }}
        </div>
    @elseif(session('error_store'))
            <div class="alert alert-danger">
            {{ session('error_store')}}
    @endif
    <form action="{{ route('formDonorStore') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
        </div>
        <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" required>
        </div>
        <div class="mb-3">
            <label for="ketersediaan" class="form-label">Ketersediaan Donor Jika Dibutuhkan? Jawab Ya atau Tidak</label>
            <input type="text" class="form-control" id="ketersediaan" name="ketersediaan" required>
        </div>
        <div class="mb-3">
            <label for="gol_darah" class="form-label">Golongan Darah</label>
            <select class="form-select" id="gol_darah" name="gol_darah" required>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="O">O</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="bb" class="form-label">Berat Badan</label>
            <input type="text" class="form-control" id="bb" name="bb" required>
        </div>
        <div class="mb-3">
            <label for="donor_ke" class="form-label">Donor Ke-</label>
            <input type="text" class="form-control" id="donor_ke" name="donor_ke" required>
        </div>
        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Submit</button> <a class="btn btn-primary ml-auto" href="{{ route('datadonor') }}">Lihat Data Donor</a>
    </form>
</div>
<hr class="featurette-divider">
</div>
@endsection
