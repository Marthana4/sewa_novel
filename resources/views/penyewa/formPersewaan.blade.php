@extends('home')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form Persewaan</h5>

        <!-- Floating Labels Form -->
        <form class="row g-3" role="form" action="{{ url('penyewa-transaksi-created') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <div class="form-floating mb-3">
                <select class="form-select" name="id_novel" id="floatingSelect" aria-label="State">
                    <option value="">Pilih Novel</option>
                    @foreach($transaksi as $transaksi)
                    <option value="{{ $transaksi->id_novel }}"> {{ $transaksi->nama_novel }} </option>
                    @endforeach
                </select>
                <label for="floatingSelect">Novel</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Nama Penyewa" name="nama" value="{{ $namaPengguna }}" readonly>
                    <label for="floatingName">Nama Penyewa</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" class="form-control" id="floatingTanggalJatuhTempo" placeholder="Tanggal Jatuh Tempo" name="tgl_jatuh_tempo"  value="{{ $tglJatuhTempo }}" readonly>
                    <label for="floatingTanggalJatuhTempo">Tanggal Jatuh Tempo</label>
                </div>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form><!-- End floating Labels Form -->
    </div>
</div>
@endsection
