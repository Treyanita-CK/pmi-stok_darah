@extends('layouts.adminapp')

@section('content')

<html>
<head>
<title>Page - Stok Darah PMI Kota Cirebon</title>
<!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
</style>
   
</head>
<body>
<div class="container">
<div class="row">
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{asset('assets/pmi.png')}}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Dashboard</h5>
        @auth
        <p class="card-text">Selamat datang, {{auth()->user()->username}}!</p>
        @endauth
      </div>
    </div>
  </div>
</div>

<div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total Seluruh : {{ $total }}</h5>
        <p class="card-text">Update Terakhir : {{ $updated_at }}</p>
        <a href="{{route('stokdarah')}}" class="btn btn-primary">Lihat Rincian</a>
        <a href="{{route('calender.get')}}" class="btn btn-primary">Jadwal Donor Darah</a>
        <a href="{{route('hubungi.admin')}}" class="btn btn-primary">Lihat Pesan User</a>
      </div>
    </div>
  </div>
<!--stok darah group by gol_darah-->
<div class="row">
    <div class="col-md-3">
        <div class="card text-danger mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h2 class="card-title text-center">A</h2>
                <h5 class="card-text text-center">Jumlah = {{ $totalStokA }}</h5>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card text-danger mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h2 class="card-title text-center">B</h2>
                <h5 class="card-text text-center">Jumlah = {{ $totalStokB}}</h5>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card text-danger mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h2 class="card-title text-center">O</h2>
                <h5 class="card-text text-center">Jumlah = {{ $totalStokO }}</h5>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card text-danger mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h2 class="card-title text-center">AB</h2>
                <h5 class="card-text text-center">Jumlah = {{ $totalStokAB}}</h5>
            </div>
        </div>
    </div>
</div>

<html>
<head>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.10.2/jspdf.umd.min.js"></script>
</head>

<!-- other head content -->
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
<div class="container mt-4">
<table class="table table-bordered border-danger">
<thead>
    <tr>
        <th> Jenis Darah </th>
        @foreach ($gol_darah as $golongan)
            <th> {{ $golongan }} </th>
        @endforeach
          <th>Waktu Update Terbaru</th>
    </tr>
</thead>
<tbody>
        @foreach ($jenis as $jenis)
        <tr>
            <td> {{ $jenis }} </td>
            @foreach ($gol_darah as $golongan)
                @php
                    $jumlah = \App\Models\BloodStock::where('gol_darah', $golongan)->where('jenis', $jenis)->first();
                @endphp
                <td> {{$jumlah ? $jumlah->jumlah : 0}}</td>
        @endforeach
        <td>
            @php
                $latestUpdate = \App\Models\BloodStock::where('jenis', $jenis)->max('updated_at');
            @endphp
            {{ $latestUpdate ?? 'N/A'}}
        </td> 
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
@endsection