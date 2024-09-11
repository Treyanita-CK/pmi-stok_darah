@extends('layouts.app')
@section('title','Rincian Stok Darah - PMI Kota Cirebon')
@section('content')

<html>
<head>
<title>Page - Stok Darah PMI Kota Cirebon</title>
<style>
           table {
            width: 100%;
        }

        th, td {
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="container">
<div class="container mt-4">
    <h4 class="text-center">Ketersediaan Stok Darah PMI Kota Cirebon</h4>
    <p class="text-center">Tanggal terakhir Diupdate : {{ $updated }}</p>
<div class ="container center">
<table class="table table-bordered border-danger">
<thead>
    <tr>
        <th> Jenis Darah </th>
        @foreach ($golonganDarah as $golDarah)
            <th> {{ $golDarah }} </th>
        @endforeach
    </tr>
</thead>
<tbody>
    
        @foreach ($jenisDarah as $jenis)
        <tr>
            <td> {{ $jenis}} </td>
            @foreach ($golonganDarah as $golDarah)
                @php
                    $stok = \App\Models\BloodStock::where('gol_darah', $golDarah)->where('jenis', $jenis)->first();
                @endphp
                <td> {{$stok ? $stok->jumlah : 0}}</td>
        @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
    <!--batas-->
<hr class="featurette-divider">
</body>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>
@endsection