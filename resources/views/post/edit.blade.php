@extends('layouts.dashboard.main')
@section('title', 'Edit Berita')
@section('content')
    <div class="row mb-5">
        <div class="col-lg">
            @if ($categories->count() > 0)
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-fw fa-edit"></i> Form Edit Berita
                    </div>
                    <div class="card-body">
                        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul
                                    Konten</label>
                                <input type="text"
                                    class="form-control @error('judul')
                                is-invalid
                            @enderror"
                                    id="judul" name="judul" value="{{ $post->judul }}">
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3 row g-2">
                              <div class="col-sm-4 col-lg-4">
                                <img src="{{ asset('storage/' . $post->gambar) }}" class="img-fluid rounded" alt="">
                              </div>
                              <div class="col-sm-8 col-lg-8">
                                  <label class="form-label" for="gambar">Gambar <sup class="text-danger">*mimes: png, jpg,
                                          jpeg | 300kb</sup></label>
                                    <input type="file"
                                        class="form-control @error('gambar')
                                is-invalid
                            @enderror"
                                        id="gambar" name="gambar">
                                    @error('gambar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="konten" class="form-label">Konten</label>
                                @error('konten')
                                    <small class="text-danger">({{ $message }})</small>
                                @enderror
                                <textarea class="form-control" id="konten" name="konten">{{ $post->konten }}</textarea>
                            </div>
                            <label class="form-label">Pilih Kategori</label>
                            <div class="mb-3">
                                @foreach ($categories as $category)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="{{ $category->nama_kategori }}"
                                            value="{{ $category->id }}" name="categories[]"
                                            {{ in_array($category->id, $post->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="{{ $category->nama_kategori }}">{{ $category->nama_kategori }}</label>
                                    </div>
                                @endforeach
                                @error('categories')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tandai Sebagai Berita penting?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="penting" id="penting" {{ $post->penting == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="penting">
                                        Ya
                                    </label>
                                    @error('penting')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-sm btn-dark"><i class="fa-solid fa-sm fa-fw fa-rotate"></i> Update</button>
                            <a href="{{ route('post.list') }}" class="btn btn-sm btn-outline-dark"><i class="fa-solid fa-sm fa-fw fa-arrow-left"></i> Kembali</a>
                        </form>
                    </div>
                </div>
            @else
                <div class="alert alert-secondary" role="alert">
                    <i class="fa-solid fa-circle-exclamation"></i> Kategori Masih Kosong. Tidak bisa input data. Silahkan
                    laporkan ke Admin
                </div>
            @endif

        </div>
    </div>
@endsection
