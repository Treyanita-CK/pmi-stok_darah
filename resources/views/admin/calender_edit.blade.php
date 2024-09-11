@extends('layouts.adminapp')

@section('content')
    <h2>Edit Jadwal</h2>
    
    <form action="{{ route('update.calender', $calender->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $calender->date }}" required>
        </div>

        <div class="form-group">
            <label for="waktu">Waktu</label>
            <input type="text" name="waktu" class="form-control" value="{{ $calender->time }}" required>
        </div>
        <small class="form-text text-muted">Format: 00.00 - 00.00 / 00.00 - selesai</small>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $calender->location }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Keterangan</label>
            <textarea name="deskripsi" class="form-control">{{ $calender->description }}</textarea>
            <small class="form-text text-muted">Masukkan keterangan yang dibutuhkan</small>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
