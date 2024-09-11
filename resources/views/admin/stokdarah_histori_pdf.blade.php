<html>
    <head>
        <title>Laporan Stok Darah</title>
            <style>
            table {
                width: 100%;
                border-collapse: collapse;
                border: 1px solid black;
            }

            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: center;
            }

            th {
                background-color: #f2f2f2;
            }

            h4 {
                text-align: center;
            }
            p{
                text-align: right;
            }
            </style>
        </head>
<body>
    <h4>Laporan Stok Darah PMI Kota Cirebon {{ $tanggal }}</h4>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Golongan Darah</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @php
                $nomor = 1;
            @endphp
            @foreach($history as $item)
                <tr>
                    <td>{{ $nomor }}</td>
                    <td>{{ $item->gol_darah }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
            @php
                $nomor++;
            @endphp
            @endforeach
        </tbody>
    </table>
    <br>
    <p>Cirebon {{ $tanggal }}</p>
    <p>Kepala Unit Donor Darah</p>
    <br><br><br><br>
    <p>_______________________</p>
</body>
</html>
