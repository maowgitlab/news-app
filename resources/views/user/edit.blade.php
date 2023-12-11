@extends('layouts.dashboard.main')
@section('title', 'Edit User')
@section('content')
    <div class="row mb-5">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-fw fa-edit"></i> Form Edit User
                </div>
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text"
                                    class="form-control @error('nama')
                                    is-invalid
                                @enderror"
                                    id="nama" name="nama" value="{{ $user->nama }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="username" class="form-label">Username</label>
                                <input type="text"
                                    class="form-control @error('username')
                                is-invalid
                                @enderror"
                                    id="username" name="username" value="{{ $user->username }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select
                                class="form-select @error('status')
                                    is-invalid
                                @enderror"
                                aria-label="Default select example" name="status">
                                <option disabled>-- Pilih Status --</option>
                                <option value="aktif" {{ $user->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="non-aktif" {{ $user->status == 'non-aktif' ? 'selected' : '' }}>Non Aktif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-sm btn-dark"><i class="fa-solid fa-sm fa-fw fa-rotate"></i> Update</button>
                        <a href="{{ route('user.list') }}" class="btn btn-sm btn-outline-dark"><i class="fa-solid fa-sm fa-fw fa-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
