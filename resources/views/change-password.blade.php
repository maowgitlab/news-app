@extends('layouts.dashboard.main')
@section('title', 'Ganti Password')
@section('content')
    <div class="row mb-5">
        <div class="col-lg">
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="fa-solid fa-sm fa-fw fa-circle-exclamation"></i> Error!</strong>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-fw fa-edit"></i> Form Ganti Password
                </div>
                <div class="card-body">
                    <form action="{{ route('user.update.password') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="oldpassword" class="form-label">Passowrd Lama</label>
                            <input type="password"
                                class="form-control @error('oldpassword')
                                is-invalid
                            @enderror"
                                id="oldpassword" name="oldpassword">
                            @error('oldpassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Passowrd Baru</label>
                            <input type="password"
                                class="form-control @error('password')
                                is-invalid
                            @enderror"
                                id="password" name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password"
                                class="form-control @error('password_confirmation')
                                is-invalid
                            @enderror"
                                id="password_confirmation" name="password_confirmation">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-sm btn-dark"><i class="fa-solid fa-sm fa-fw fa-rotate"></i> Update</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-dark"><i class="fa-solid fa-sm fa-fw fa-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
