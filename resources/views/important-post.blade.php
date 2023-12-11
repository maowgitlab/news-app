@extends('layouts.main')
@section('title', 'Berita Penting')
@section('content')
    <div class="col-lg-8 mt-5">
        @if ($importantPosts->count() > 0)
            @foreach ($importantPosts as $importantPost)
                <div class="row g-3 mb-3">
                    <div class="col-lg-4">
                        <a href="#!"><img class="img-fluid rounded"
                                src="{{ asset('storage/' . $importantPost->gambar) }}" /></a>
                    </div>
                    <div class="col-lg-8">
                        <div class="small text-muted"><i class="fa-regular fa-sm fa-fw fa-calendar-alt"></i>
                            {{ $importantPost->created_at }} | <i class="fa-solid fa-sm fa-fw fa-clock"></i>
                            <strong>UTC+8</strong>
                        </div>
                        @foreach ($importantPost->categories->unique('nama_kategori') as $category)
                            <a class="badge text-bg-dark text-decoration-none link-light my-2"
                                href="{{ route('welcome', ['kategori' => $category->nama_kategori]) }}">{{ $category->nama_kategori }}</a>
                        @endforeach
                        <h5 class="card-title fw-semibold">{{ $importantPost->judul }}</h5>
                        <p class="card-text">{!! Str::limit(strip_tags($importantPost->konten), 150, '...') !!}</p>
                        <a class="btn btn-sm btn-dark" href="{{ route('show.post', $importantPost->slug) }}">Baca
                            Selengkapnya <i class="fa-solid fa-sm fa-fw fa-arrow-right"></i></a>
                    </div>
                    <hr>
                </div>
            @endforeach
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <ul class="pagination justify-content-center my-4">
                    {{ $importantPosts->OnEachSide(0)->links() }}
                </ul>
            </nav>
        @else
            <div class="alert alert-secondary" role="alert">
                <i class="fa-solid fa-fw fa-sm fa-star"></i> Arsip Berita penting belum tersedia...
            </div>
        @endif
        <a href="{{ route('welcome') }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-sm fa-fw fa-arrow-left"></i>
            Kembali</a>
    </div>
@endsection
