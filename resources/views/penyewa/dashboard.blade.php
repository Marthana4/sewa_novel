@extends('home')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

            <div class="card-body">
                <h5 class="card-title">Jumlah Novel</h5>

                <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-book"></i>
                </div>
                <div class="ps-3">
                    <h6>{{ $novel }}</h6>
                </div>
                </div>
            </div>

            </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-md-6">

            <div class="card info-card customers-card">

            <div class="card-body">
                <h5 class="card-title">Jumlah Transaksi</h5>

                <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-bar-chart"></i>
                </div>
                <div class="ps-3">
                    <h6>{{ $transaksi }}</h6>
                </div>
                </div>

            </div>
            </div>

        </div><!-- End Customers Card -->
        <div>

        <!-- Reports -->
        <div class="col-12">
            <div class="card">
                <div class="container">
                    <br>
                    <h3>Daftar Novel</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Novel</th>
                                <th>Penulis</th>
                                <th>Tanggal Terbit</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($novelDetail as $key => $novel)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $novel->nama_novel }}</td>
                                    <td>{{ $novel->penulis }}</td>
                                    <td>{{ $novel->tgl_cetak }}</td>
                                    <td>{{ $novel->deskripsi_novel }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- End Reports -->

        </div>
    </div><!-- End Left side columns -->
    </div>
</section>
@endsection