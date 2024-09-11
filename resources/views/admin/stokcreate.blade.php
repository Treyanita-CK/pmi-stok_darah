<!-- resources/views/stok_darah/create.blade.php -->

@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <h1>Tambah Stok Darah</h1>
        
        <form action="{{ route('stokdarah.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="gol_darah">Golongan Darah</label>
                <input type="text" name="gol_darah" id="gol_darah" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <input type="text" name="jenis" id="jenis" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
            </div>
            <div class="container mt-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
