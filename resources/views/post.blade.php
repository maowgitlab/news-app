@extends('layouts.main')
@section('title', 'Berita')
@section('content')
    <div class="col-lg-8 mt-5 mb-5">
        <!-- Post content-->
        <article>
            <!-- Post header-->
            <header class="mb-4">
                <!-- Post title-->
                <h1 class="fw-bolder mb-1">{{ $post->judul }}</h1>
                <!-- Post meta content-->
                <div class="text-muted fst-italic mb-2">Diposting pada {{ $post->created_at }} | UTC+8 oleh
                    <strong><i class="fa-solid fa-sm fa-fw fa-user"></i> {{ $post->user->username }}</strong></div>
                <!-- Post categories-->
                @foreach ($post->categories->unique('nama_kategori') as $category)
                    <a class="badge text-bg-dark text-decoration-none link-light" href="{{ route('welcome', ['kategori' => $category->nama_kategori]) }}">{{ $category->nama_kategori }}</a>
                @endforeach
            </header>
            <!-- Preview image figure-->
            <figure class="mb-4"><img class="img-fluid rounded w-100" src="{{ asset('storage/' . $post->gambar) }}"/></figure>
            <!-- Post content-->
            <section class="mb-5">
                <p class="fs-5 mb-4">{!! $post->konten !!}</p>
            </section>
        </article>
        <a href="{{ route('welcome') }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-sm fa-fw fa-arrow-left"></i> Kembali</a>
    </div>
@endsection
