@extends('layouts.adminapp')

@section('content')

<div class="container">
        <h2>Edit Stok Darah</h2>
        <form action="{{ route('stokdarah.update', $stokDarah->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="gol_darah">Golongan Darah :</label>
                <input type="text" class="form-control" id="gol_darah" name="gol_darah" value="{{ $stokDarah->gol_darah }}" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis :</label>
                <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $stokDarah->jenis}}" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah :</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $stokDarah->jumlah }}" required>
            </div>

            <!-- Input untuk simpan nilai updated at -->
            <input type ="hidden" names="updated_at" value="{{ $stokDarah->updated_at}}">
            <div class ="container mt-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection