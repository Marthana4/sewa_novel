@extends('home')

@section('content')
<section class="section">
    <div class="row">
    <div class="col-lg-12">

        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pengembalian Novel</h5>

            <form method="GET" action="{{ url('/admin-transaksi') }}"></form>
              <form class="form-inline">
              <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" name="keyword" placeholder="Cari transaksi...">
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
                <th scope="col">Nama Penyewa</th>
                <th scope="col">Novel</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Jatuh Tempo</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                    @foreach($transaksi as $t)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $t->nama_penyewa }}</td>
                                <td>{{ $t->nama_novel }}</td>
                                <td>{{ \Carbon\Carbon::parse($t->created_at)->toDateString() }}</td>
                                <td>{{ $t->tgl_jatuh_tempo }}</td>
                                <td>{{ \Carbon\Carbon::parse($t->updated_at)->toDateString() }}</td>
                                <td>{{ $t->status }}</td>
                                <td>
                                    <div style="display: flex; align-items: center;">
                                        <a href="{{ route('transaksi-show', $t->id_transaksi) }}" class="btn btn-primary btn-sm me-2">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('transaksi-delete', $t->id_transaksi) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                    @endforeach
                <tr>
            </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
        </div>

    </div>
    </div>
</section>
@endsection