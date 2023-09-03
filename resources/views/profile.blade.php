@extends('home')

@section('content')
<section class="section profile">
    <div class="row">
    <div class="col-xl-4">

        <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{asset('assets/img/messages-1.jpg')}}" alt="Profile" class="rounded-circle">
            <h2>{{auth()->user()->nama}}</h2>
            <h3>{{auth()->user()->role}}</h3>
            <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
        </div>

    </div>

    <div class="col-xl-8">

        <div class="card">
        <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            </ul>
            <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form class="row g-3" role="form" action="{{ route('user-edit', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                    <div class="col-md-8 col-lg-9">
                    <input name="nama" type="text" class="form-control" id="fullName" value="{{ $user->nama }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">No Hp</label>
                    <div class="col-md-8 col-lg-9">
                    <input name="no_hp" type="number" class="form-control" id="Phone" value="{{ $user->no_hp }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="Email" value="{{ $user->email }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                    <div class="col-md-8 col-lg-9">
                    <input name="username" type="text" class="form-control" id="username" value="{{ $user->username }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-lg-3 col-form-label">Password</label>
                    <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="password">
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                </form><!-- End Profile Edit Form -->

            </div>

            </div><!-- End Bordered Tabs -->

        </div>
        </div>

    </div>
    </div>
</section>

@endsection