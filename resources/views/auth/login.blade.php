@extends('layouts.auth.main')
@section('title', 'Halaman Login')
@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-lg-5">
            <div class="card shadow border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-2">Login</h3>
                </div>
                <div class="card-body">
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="fa-solid fa-sm fa-fw fa-circle-exclamation"></i> Error!</strong>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><i class="fa-solid fa-sm fa-fw fa-circle-check"></i> Berhasil!</strong>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('auth.check') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input
                                class="form-control @error('username')
                                is-invalid
                            @enderror"
                                id="username" name="username" type="text" placeholder="Username" />
                            <label for="username">Username</label>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input
                                class="form-control @error('password')
                                is-invalid
                            @enderror"
                                id="password" name="password" type="password" placeholder="Password" />
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" href="index.html"><i
                                class="fa-solid fa-fw fa-sm fa-key"></i> Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
