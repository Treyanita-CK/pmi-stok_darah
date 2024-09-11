@extends('layouts.app')
@section('title','Jadwal Donor Darah - PMI Kota Cirebon')
@section('content')
<html>
<head>
</head>
<body>
<div class="container content-wrapper">
<div class="container-fluid text-left">
    <div class="col-sm-6">
      <h3><b>Jadwal Donor Darah</b></h3>      
    </div>
  </div>
</div>
<div class="container mt-4"> 
    <table class="table table-striped">
          <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Keterangan</th>
              </tr>
            </thead>
          <tbody>
              @php
                $nomor = 1;
              @endphp
              @foreach ($calender as $calender)
              <tr>
                <th>{{ $nomor }}</th>
                <td>{{ $calender->date }}</td>
                <td>{{ $calender->time }}</td>
                <td>{{ $calender->location }}</td>
                <td>{{ $calender->description }}</td>
              </tr>
              @php
                $nomor++;
              @endphp
              @endforeach
            </tbody>
          </table>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <hr class="featurette-divider">
        </div>
      </div>
    </div>
  </div>
</body>
</html>

@endsection