@extends('home')

@section('content')
    <div class="container">
        <h1>Laporan Mutasi Stok Novel</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Novel</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Tanggal Mutasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mutasiStok as $key => $novel)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $novel->nama_novel }}</td>
                        <td>{{ $novel->penulis }}</td>
                        <td>{{ $novel->status }}</td>
                        <td>{{ $novel->tanggal_mutasi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
