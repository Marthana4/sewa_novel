@extends('home')

@section('content')
    <div class="container">
        <h1>Laporan Stok Novel Tersedia</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Novel</th>
                    <th>Penulis</th>
                    <th>Tanggal Terbit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($novelTersedia as $key => $novel)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $novel->nama_novel }}</td>
                        <td>{{ $novel->penulis }}</td>
                        <td>{{ $novel->tgl_cetak }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
