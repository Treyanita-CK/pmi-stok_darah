@extends('layouts.adminapp')

@section('content')
    <h2>Tambah Jadwal</h2>
    <form action="{{ route('create.action') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="date">Tanggal</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="time">Waktu</label>   
            <input type="text" name="time" class="form-control" required>
            <small class="form-text text-muted">Format: 00.00 - 00.00 / 00.00 - selesai</small>
        </div>
        <div class="form-group">
            <label for="location">Lokasi</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Keterangan</label>  
            <textarea name="description" class="form-control"></textarea>
            <small class="form-text text-muted">Masukkan keterangan yang dibutuhkan</small>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
