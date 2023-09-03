@extends('home')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form Persewaan</h5>

        <!-- Floating Labels Form -->
        <form class="row g-3" role="form" action="{{ route('transaksi-edit', $transaksi->id_transaksi) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingName" placeholder="Nama Novel" name="nama" value="{{ $transaksi->nama_novel }}" readonly>
                    <label for="floatingName">Nama Novel</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Nama Penyewa" name="nama" value="{{ $transaksi->nama_penyewa }}" readonly>
                    <label for="floatingName">Nama Penyewa</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" class="form-control" id="floatingTanggalJatuhTempo" placeholder="Tanggal Jatuh Tempo" name="tgl_jatuh_tempo"  value="{{ $transaksi->tgl_jatuh_tempo }}" readonly>
                    <label for="floatingTanggalJatuhTempo">Tanggal Jatuh Tempo</label>
                </div>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Dikembalikan</button>
            </div>
        </form><!-- End floating Labels Form -->
    </div>
</div>
@endsection
