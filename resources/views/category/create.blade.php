@extends('layouts.dashboard.main')
@section('title', 'Input Kategori Baru')
@section('content')
    <div class="row mb-5">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-fw fa-edit"></i> Form Input Kategori
                </div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label">Nama Kategori</label>
                            <input type="text"
                                class="form-control @error('nama_kategori')
                                is-invalid
                            @enderror"
                                id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}">
                            @error('nama_kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-sm btn-dark"><i class="fa-solid fa-sm fa-fw fa-save"></i> Simpan</button>
                        <a href="{{ route('category.list') }}" class="btn btn-sm btn-outline-dark"><i class="fa-solid fa-sm fa-fw fa-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
