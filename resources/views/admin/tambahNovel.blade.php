@extends('home')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tambah Novel</h5>

        <!-- Floating Labels Form -->
        <form class="row g-3" role="form" action="{{ url('admin-novel-created') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Nama Novel" name="nama_novel">
                    <label for="floatingName">Nama Novel</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingPenulis" placeholder="Penulis" name="penulis">
                    <label for="floatingPenulis">Penulis</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" class="form-control" id="floatingTanggalTerbit" placeholder="Tanggal Terbit" name="tgl_cetak">
                    <label for="floatingTanggalTerbit">Tanggal Terbit</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Deskripsi" id="floatingTextarea" style="height: 100px;" name="deskripsi_novel"></textarea>
                    <label for="floatingTextarea">Deskripsi</label>
                </div>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form><!-- End floating Labels Form -->
    </div>
</div>
@endsection
