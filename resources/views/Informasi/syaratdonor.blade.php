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
            width: 18rem;
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
                <h2 class="fw-bold text-left">Informasi Syarat Donor Darah</h2>
                <p class="fw-bold text-danger">Apakah donor darah menyehatkan?</p>
                <p class="fw-light">Ya, setelah Anda mendonorkan darah, tubuh akan menggantikan darah yang telah disumbangkan. 
                    <br>Ini mendorong tubuh memproduksi sel darah baru, termasuk sel darah merah yang dapat membantu meningkatkan kesehatan.</p>
                <p class="fw-bold text-danger">Mengapa harus donor darah?</p>
                <p class="fw-light">Dengan mendonorkan darah dapat menyelamatkan nyawa manusia, 
                    <br>darah ini akan disumbangkan kepada orang yang membutuhkan seperti kecelakaan, persalinan, 
                    dan pengobatan kondisi medis yang memerlukan transfusi darah.</p>
                <p class="fw-bold text-danger">Apa syarat untuk mendonorkan darah?</p>
                <p class="fw-light">Calon donor memiliki kondisi yang sehat dan tidak sedang mengalami penyakit menular atau penyakit serius lainnya juga tidak mengalami gejala flu dan batuk atau demam. 
                    <br>Usia antara 17 - 60 tahun, berat badan mencukupi minimal 45 Kg, tekanan darah normal, kadar hemoglobin dalam batas normal.</p>
                <p class="fw-bold text-danger">Jangan menyumbangkan darah pada keadaan :</p>
                <p class="fw-light">Jangan mendonorkan darah apabila memiliki penyakit jantung dan paru; menderita kanker; menderita hipertensi; menderita kencing manis (diabtes militus); kencenderungan 
                    <br>pendarahan abrnomal atau kelainan darah; menderita epilepsi; menderita atau pernah menderita hepatitis B atau C; menderita sifilis; pengguna narkoba; mengidap HIV/AIDS.
                    
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