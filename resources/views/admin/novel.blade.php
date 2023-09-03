@extends('home')

@section('content')
<section class="section">
    <div class="row">
    <div class="col-lg-12">

        <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Novel</h5>
                <a href="{{ route('novel-create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus"></i> Tambah Novel
            </a>
            </div>

            <form method="GET" action="{{ url('/admin-novel') }}"></form>
              <form class="form-inline">
              <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" name="keyword" laceholder="Cari novel...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i> Cari
                    </button>
                </div>
              </div>
              </form>

            <!-- Table with stripped rows -->
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Novel</th>
                <th scope="col">Penulis</th>
                <th scope="col">Tanggal Terbit</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach($novel as $n)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $n->nama_novel }}</td>
                        <td>{{ $n->penulis }}</td>
                        <td>{{ $n->tgl_cetak }}</td>
                        <td>{{ $n->deskripsi_novel }}</td>
                        <td>
                            <div style="display: flex; align-items: center;">
                                <a href="{{ route('novel-show', $n->id_novel) }}" class="btn btn-primary btn-sm me-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('novel-delete', $n->id_novel) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>


                    </tr>
                @endforeach
            </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
        </div>

    </div>
    </div>
</section>
@endsection
