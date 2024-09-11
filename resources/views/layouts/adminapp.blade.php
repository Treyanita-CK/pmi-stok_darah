<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Stok Darah</title>
    <!-- Memuat file CSS eksternal -->
    <link rel="stylesheet" href="styles.css">
    <!-- Load Bootstrap CSS -->
    <link href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="#">UDD PMI Kota Cirebon - Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('stokdarah')}}">Rincian Stok Darah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('stokdarah_histori')}}">Histori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/pendonor">Data Pendonor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('profil')}}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.post.get')}}">Kelola Post User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
        </form>
    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--konten lainnya-->
    <div class="container py-4">
        @yield('content')
    </div>
     <!-- Memuat file JavaScript eksternal Bootstrap 5 (Opsional, diperlukan jika Anda menggunakan komponen interaktif dari Bootstrap) -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


