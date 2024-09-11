@extends('layouts.pdf')

@section('content')
<div class="container">
    <h2>Histori Data Stok Darah</h2>
    <p>Tanggal: {{ $tanggal }}</p>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Golongan Darah</th>
                <th>Jenis Darah</th>
                <th>Jumlah</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($history as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->gol_darah }}</td>
                <td>{{ $data->jenis }}</td>
                <td>{{ $data->jumlah }}</td>
                <td>{{ $data->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>
        Current Page: {{ $data->currentPage() }}
        @if ($data->hasMorePages())
            <a href="{{ $data->nextPageUrl() }}">Next Page</a>
        @endif
    </div>
@endsection
