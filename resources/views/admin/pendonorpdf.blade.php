<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pendonor</title>
</head>
<body>
    <h1>Daftar Pendonor</h1>
    <table>
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">Tempat Lahir</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Telepon</th>
            <th scope="col">Ketersediaan</th>
            <th scope="col">Berat Badan</th>
            <th scope="col">Golongan Darah</th>
            <th scope="col">Donor - Ke</th>
            <th scope="col">Tanggal Daftar</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendonor as $item)
            <tr>
            <td>{{ $item->id}}</td>
                <td>{{ $item->nama}}</td>
                <td>{{ $item->tempat_lahir}}</td>
                <td>{{ $item->tgl_lahir}}</td>
                <td>{{ $item->jenis_kelamin}}</td>
                <td>{{ $item->alamat}}</td>
                <td>{{ $item->telepon}}</td>
                <td>{{ $item->ketersediaan}}</td>
                <td>{{ $item->bb}}</td>
                <td>{{ $item->gol_darah}}</td>
                <td>{{ $item->donor_ke}}</td>
                <td>{{ $item->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
