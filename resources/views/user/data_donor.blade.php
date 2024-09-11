@extends('layouts.userapp')

@section('content')
<div class="container">
    <h3>Data Donor Darah Anda.</h3><p>Tunjukan data ini kepada petugas PMI untuk ditindak lanjuti.</p>
    @if(isset($pendonor) && $pendonor->isEmpty())
    <p>Anda belum memiliki data donor darah.
    @else
        <!-- Tabel data donor darah -->
    @endif
<body>
        @foreach($pendonor as $donation)
        <div class="card-body">
            <h5 class="card-title">Nama Lengkap</h5>
            <p class="card-text">{{ $donation->nama }}<p>
            <h5 class="card-title">Tempat Lahir</h5>
            <p class="card-text"> {{ $donation->tempat_lahir }}<p>
            <h5 class="card-title">Jenis Kelamin</h5>
            <p class="card-text">{{ $donation->jenis_kelamin}}<p>
            <h5 class="card-title">Alamat</h5>
            <p class="card-text">{{ $donation->alamat }}<p>
            <h5 class="card-title">No Telepon</h5>
            <p class="card-text">{{ $donation->telepon}}<p>
            <h5 class="card-title">Ketersediaan Donor</h5>
            <p class="card-text">{{ $donation->ketersediaan}}<p>
            <h5 class="card-title">Golongan Darah</h5>
            <p class="card-text">{{ $donation->gol_darah }}<p>
            <h5 class="card-title">Berat Badan</h5>
            <p class="card-text">{{ $donation->bb }}<p>
            <h5 class="card-title">Donor Ke-</h5>
            <p class="card-text">{{$donation->donor_ke}}<p>
        </div>
    @endforeach
    <a href="{{route('formDonor')}}">Kembali ke halaman form.</a></p>
</div>
<hr>
</div>
@endsection
