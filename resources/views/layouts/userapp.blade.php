<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Sistem Informasi Stok Darah PMI - Kota Cirebon')</title>

  <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>   
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
  <link href="headers.css" rel="stylesheet">
  <meta name="theme-color" content="#7952b3">
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!-- Bootstrap 5 JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <!-- Font Awesome 4-->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>    
  <link href="/docs/5.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
  
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
      /* Gaya untuk tautan dalam navbar */
      .nav a {
          color: #333333; /* Warna teks */
          text-decoration: none; /* Hapus garis bawah tautan */
          padding: 8px 15px; /* Atur padding sesuai kebutuhan Anda */
          display: inline-block; /* Agar animasi dapat diterapkan dengan benar */
          transition: all 0.3s ease; /* Animasi transisi */
      }

      /* Gaya untuk tautan aktif */
      .nav a.active {
          font-weight: bold; /* Atur gaya tautan aktif sesuai keinginan Anda */
      }

      /* Gaya untuk tautan hover */
      .nav a:hover {
          transform: scale(1.1); /* Memperbesar elemen saat dihover */
          color: #FF0000; /* Warna teks saat dihover */
      }
      /* Gaya untuk tombol WhatsApp */
      .whatsapp-button {
          position: fixed;
          bottom: 20px;
          right: 20px;
          z-index: 9999;
      }

      .whatsapp-button a {
          display: block;
          width: 60px;
          height: 60px;
          background-color: #25D366;
          border-radius: 50%;
          text-align: center;
          line-height: 60px;
          color: #fff;
          font-size: 24px;
          text-decoration: none;
}

    
</style>


<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <img src="{{asset('assets/pmi.png')}}" width="45" height="33" alt="PMI Logo"> | 
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{route('welcome')}}" class="nav-link px-2 link-secondary">Dashboard</a></li>
          <li><a href="{{route('total')}}" class="nav-link px-2 link-dark">Stok Darah</a></li>
          <li><a href="/jadwal" class="nav-link px-2 link-dark">Jadwal Donor Darah</a></li>
          <li><a href="/informasi/permintaandarah" class="nav-link px-2 link-dark">Informasi</a></li>
          <li><a href="{{ route('formDonor')}}" class="nav-link px-2 link-dark">Daftar Donor Darah</a></li>
          <li><a href="/kontakkami" class="nav-link px-2 link-dark">Hubungi Kami</a></li>
        </ul>
        <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        <form action="{{ route('deleteToken') }}" method="POST">
        @csrf
        <a href="{{route('profilUser')}}" class="btn btn-primary">Profil</a> <button type="submit" class="btn btn-link">Logout <i class="bi bi-box-arrow-right"></i></button>
        </form>
        </li>
        </div>
        </div>
    </div>
</header>

<div id="content">
    @yield('content')
</div>
	
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            <img src= "{{ asset('assets/pmi.png') }}" height="120px" widht="100px" alt="">
                <h4 calas="text-center">Kota Cirebon</h4>
            </div>
            <div class="col-md-4">
                <h4>Kontak Kami</h4>
                <p><i class="bi bi-geo"></i> Jl. Dr. Sudarsono No. 18, Kesambi, Kota Cirebon</p>
                <p><i class="bi bi-envelope"></i> uddc.pmi.kotacirebon@gmail.com</p>
                <p><i class="bi bi-telephone"></i> (0231) 201003 | Fax. (0231) 202075</p>
            </div>
            <div class="col-md-4">
                <h4>Sosial Media</h4>
                <ul class="nav">
                    <a href="https://www.youtube.com/channel/UCOWlzCYG2l4__0usYXFpqtw" class="btn btn-social text-black btn-youtube"><i class="fa fa-youtube"></i>Youtube</a>
                    <a href="https://www.instagram.com/pmikotacirebon/?hl=en" class="btn btn-social text-black btn-instagram"><i class="fa fa-instagram"></i> Instagram</a>
                    <a href="https://twitter.com/pmikotacirebon?lang=en" class="btn btn-social text-black btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                </ul>
                 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>
<!-- Tambahkan tombol WhatsApp -->
<div class="whatsapp-button">
    <a href="https://api.whatsapp.com/send?phone=6281224268610" target="_blank">
    <i class="bi bi-whatsapp" alt="WhatsApp Icon"></i>
    </a>
</div>
</footer>
<div class="container">
<p class="text-right">&copy; 2023 Palang Merah Indonesia Kota Cirebon. <br> All rights reserved.</p>
</body>
</html>

