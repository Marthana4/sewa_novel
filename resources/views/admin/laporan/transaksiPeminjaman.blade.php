@extends('home')

@section('content')
    <div class="container">
        <h1>Laporan Histori Transaksi Peminjaman</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penyewa</th>
                    <th>Novel</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksiPeminjaman as $key => $transaksi)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $transaksi->nama_penyewa }}</td>
                        <td>{{ $transaksi->nama_novel }}</td>
                        <td>{{ \Carbon\Carbon::parse($transaksi->created_at)->toDateString() }}</td>
                        <td>{{ \Carbon\Carbon::parse($transaksi->updated_at)->toDateString() }}</td>
                        <td>{{ $transaksi->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
