@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<title>Website PMI</title>

<!--link css-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Hugo 0.84.0">
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel-rtl/">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css">
<link href="/docs/5.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">

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

  
<!-- style css card layanan-->
<style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background: url('/path/to/your/custom-image.jpg') no-repeat center center fixed;
    background-size: cover;
}
   .header {
    padding: 0;
    font-family: Arial, sans-serif;
    position: relative;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: left;
    color: White;
    text-align: left;
    font-weight: bold;
    background: url('{{asset('assets/gedung_pmi.png')}}'); 
    background-size: cover;
}
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
.horizontal-cards-container {
    display: flex;
    justify-content: space-between;
    gap: 20px;
}
/* Custom CSS for the red background */
.custom-red-card {
    background-color: #FF0000; 
    color: #FFFFFF; 
}
.card-text {
    color: black; 
}
.title {
    color: black; 
    font : bold;
}
.card-img-top {
    max-width: 100%;
    height: auto;
}
.card-header-donor {
  background: linear-gradient(45deg, #D91A18, #FF5733, #FF5733, #D91A18);
  color: white;
  padding: 20px;
  font-size: 24px;
  font-weight: bold;
  text-align: center;
}
.custom-card {
  height: 300px; /* Tinggi card, ganti sesuai kebutuhan */
  padding: 15px; /* Padding untuk memberi ruang di dalam card */
}
.stok-darah-label {
  font-size: 20px;
  font-family: Arial, sans-serif;
  font-weight: bold;
  text-align: center;
  margin-bottom: 10px;
}
.countdown {
  font-size: 48px;
  font-weight: bold;
  text-align: center;
  animation: countdownAnim 1s infinite alternate;
}
@keyframes countdownAnim {
  from {
  transform: scale(1);
}
to {
  transform: scale(1.2);
  }
.zoom-effect img {
  transition: transform 0.3s;
}
.zoom-effect img:hover {
  transform: scale(1.1); /* Mengubah ukuran gambar menjadi 110% saat dihover */
}

}
</style>
<body>
<hr>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="container-fluid text-left">
    <div class="col-sm-6">
      <h1><b>Pelayanan Penyediaan Darah <br>PMI Kota Cirebon</b></h1>      
      <p>Website resmi UDD PMI Kota Cirebon</p>
    </div>
  </div>
</div>
<!-- stok darah content -->
<div class="p-5 mb-4 bg-light border rounded-3">
    <div class="container-fluid py-5 mt-4">
      <div class="row align-items-md-stretch">
        <div class="col-md-6">
          <div class="h-100 p-5 bg-white border rounded-3 text-center">
            <h2>Jumlah Stok Darah Tersedia</h2>
            <h1 class="text-center text-danger">{{ $totalseluruh }}</h1>
            <div class="mb-1 text-muted text-center">Update terakhir : {{ $updated }}</div>
            <p style="color: #999;">Klik lihat rincian untuk informasi stok darah</p>
            <br>
            <a class="btn btn-outline-primary" type="button" href="{{route('total')}}">Lihat Rincian</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="h-100 p-5 bg-white border rounded-3 text-center">
            <h2>Jadwal Donor Darah</h2>
            <p>Cari tahu jadwal donor darah dari Sistem Informasi UDD PMI Kota Cirebon</p>
            <p style="color: #999;">Klik di bawah ini untuk melihat jadwal donor darah</p>
            <br>
            <a class="btn btn-outline-primary" type="button" href="/jadwal">Lihat Jadwal</a>
          </div>
        </div>
      </div>
  </div>
</div>
<!-- Profil-->
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            @if ($section1 && $section1->image)
                <img src="{{ asset('path-to-images/'. $section1->image) }}" class="d-block mx-lg-auto img-fluid" alt="Post Image" width="700" height="500" loading="lazy">
            @else
                <!-- Tampilkan gambar default atau pesan jika tidak ada gambar -->
                <img src="{{ asset('path-to-images/default-image.jpg') }}" class="d-block mx-lg-auto img-fluid" alt="Default Image" width="700" height="500" loading="lazy">
            @endif
        </div>
        <div class="col-lg-6">
            @if ($section1 && $section1->title)
                <h1 class="display-5 fw-bold lh-1 mb-3">{{ $section1->title }}</h1>
            @endif
            @if ($section1 && $section1->content)
                <p class="lead">{{ $section1->content }}</p>
            @endif
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            </div>
        </div>
    </div>
</div>


<hr class="featurette-divider">

<!-- Menghubungkan file JavaScript Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection