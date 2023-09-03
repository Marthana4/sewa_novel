@extends('home')

@section('content')

<section class="section">
    <div class="row">
    <div class="col-lg-12">

        <div class="card">
        <div class="card-body">
            <h5 class="card-title">User / Penyewa</h5>

            <form method="GET" action="{{ url('/admin-user') }}"></form>
              <form class="form-inline">
              <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" name="keyword" placeholder="Cari user...">
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
                <th scope="col">Nama</th>
                <th scope="col">No Hp</th>
                <th scope="col">Email</th>
                <th scope="col">Username</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach($user as $u)
                    @if($u->role === 'penyewa')
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $u->nama }}</td>
                            <td>{{ $u->no_hp }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->username }}</td>
                            <td>
                                <form action="{{ route('user-delete', $u->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endif
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