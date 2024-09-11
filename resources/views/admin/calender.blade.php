@extends('layouts.adminapp')

@section('content')
<div class="container mt-4">
    <h5 class="text-center">Jadwal Donor Darah - Admin Page</h5>
    <a href="{{route('create.calender')}}" class="btn btn-primary mb-2">Tambah Jadwal Donor</a>
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
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $nomor = 1;
            @endphp
            @foreach ($calender as $jadwalDonor)
                <tr>
                    <td>{{ $nomor }}</td>
                    <td>{{ $jadwalDonor->date }}</td>
                    <td>{{ $jadwalDonor->time }}</td>
                    <td>{{ $jadwalDonor->location }}</td>
                    <td>{{ $jadwalDonor->description }}</td>
                    <td>
                        <a href="{{ route('edit.calender', $jadwalDonor->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                        <form action="{{ route('delete.calender', $jadwalDonor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this schedule?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @php
                    $nomor++; 
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection
