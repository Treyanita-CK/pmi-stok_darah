@extends('layouts.app')

@section('title','Informasi - PMI Kota Cirebon')
@section('content')

<html>
<head>
    <title>Informasi Prosedur Pengambilan Darah</title>
    <style>
        .content-container {
            display: flex;
        }

        .card {
            width: 14rem;
            margin-right: 20px;
            margin-top: 40px;
        }
        .list-group-item {
            padding: 15px;
        }

        .list-group-item a {
            text-decoration: none;
            color: #333; /* Ganti warna sesuai keinginan */
        }

        .list-group-item a:hover {
            text-decoration: underline;
        }
        
    </style>
</head>
<hr class="featurette-divider">
<body>
<div class="container mt-4">    
    <div class="content-container">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="/informasi/permintaandarah">Prosedur Permintaan Darah</a>
                </li>
                <li class="list-group-item">
                    <a href="/informasi/kebutuhandarah">Informasi Kebutuhan Darah</a>
                </li>
                <li class="list-group-item">
                    <a href="/informasi/syaratdonor">Syarat Donor Darah</a>
                </li>
            </ul>
            <div class="card-footer">
                <a href="/kontakkami" class="text-center">Hubungi Kami</a>
            </div>
        </div>

        <div class="description">
            <!-- Deskripsi halaman atau konten lainnya -->
            <h2 class="fw-bold text-left">Hubungi Kami</h2>
            <h6 class="text-danger">Alamat</h6>
            <p>Jl. Dr. Sudarsono No. 18, Kesambi, Kota Cirebon</p>
            <h6 class="text-danger">Telepon</h6>
            <p>Telp (0231) 201003 | Fax. (0231) 202075 </p>
            <h6 class="text-danger">Email</h6>
            <p>uddc.pmi.kotacirebon@gmail.com</p>
        </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<hr class="featurette-divider">
</div>    
</body>
</html>

@endsection