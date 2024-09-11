@extends('layouts.adminapp')

@section('content')
<html>
<body>
    <h5 class="text-center">Histori Data Stok Darah - Admin Page</h5>
    <form action="{{ route('stokdarah_histori') }}" method="GET">
        <label for="tanggal">Pilih Tanggal:</label>
        <input type="date" name="tanggal" id="tanggal">
        <button type="submit">Cari</button>
    </form>
    <div class="mt-4">
        <!-- Tambahkan dropdown untuk memilih bulan atau tahun -->
        <form action="{{ route('stokdarah_histori') }}" method="GET">
            <label for="bulan">Pilih Bulan:</label>
            <select name="bulan" id="bulan">
                <option value="">-- Pilih Bulan --</option>
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            <label for="tahun">Pilih Tahun:</label>
            <select name="tahun" id="tahun">
                <option value="">-- Pilih Tahun --</option>
                @for ($i = date('Y'); $i >= 2000; $i--)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            <button type="submit">Cari</button>
        </form>
        <br>
        <a href="{{ route('exportHistori', ['tanggal'=> $tanggal, 'bulan' => $bulan, 'tahun' => $tahun]) }}" class="btn btn-primary">Export Data as PDF</a>

        @if ($history->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Golongan Darah</th>
                        <th>Jenis Darah</th>
                        <th>Jumlah</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->gol_darah }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            @if ($tanggal || $bulan || $tahun)
                <p>There is no blood stocks data for the selected date/month/year.</p>
            @endif
        @endif
    </div>
</body>
</html>
@endsection
