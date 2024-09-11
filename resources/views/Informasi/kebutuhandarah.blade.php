@extends('layouts.app')

@section('title','Informasi - PMI Kota Cirebon')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Informasi Kebutuhan Darah</title>
    <style>
        .content-container {
            display: flex;
        }

        .card {
            width: 14rem;
            height:fixed;
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
            <h2 class="fw-bold text-left">Informasi Kebutuhan Darah</h2>
            @if ($section3 && $section3->title)
                <p class="text-danger">{{ $section3->title }}</p>
            @endif
            @if ($section3 && $section3->content)
                <p>{{ $section3->content }}</p>
            @endif
            <p>Informasi lebih lanjut dapat menghubungi 
                <br>
                Telp (0231) 201003 | Fax. (0231) 202075 
            </p>
           
            </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</div>
<br>
<br>
<hr class="featurette-divider">    
</body>
</html>




@endsection