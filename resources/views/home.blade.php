@extends('layouts.main')
@section('title', 'Selamat Datang')
@section('content')
    <div class="col-lg-8 order-2 order-lg-1">
        @if ($posts->count() > 0)
            <!-- Nested row for non-featured blog posts-->
            <div class="row g-3 mb-5">
                @foreach ($posts as $post)
                    <div class="col-md-6 col-lg-6">
                        <!-- Blog post-->
                        <div class="card h-100">
                            <a href="#!"><img class="card-img-top" src="{{ asset('storage/' . $post->gambar) }}" /></a>
                            <div class="card-body">
                                <div class="small text-muted"><i class="fa-regular fa-sm fa-fw fa-calendar-alt"></i>
                                    {{ $post->created_at }} | <i class="fa-solid fa-sm fa-fw fa-clock"></i>
                                    <strong>UTC+8</strong>
                                </div>
                                @foreach ($post->categories->unique('nama_kategori') as $category)
                                    <a class="badge text-bg-dark text-decoration-none link-light my-2"
                                        href="{{ route('welcome', ['kategori' => $category->nama_kategori]) }}">{{ $category->nama_kategori }}</a>
                                @endforeach
                                <h5 class="card-title fw-semibold">{{ $post->judul }}</h5>
                                <p class="card-text">
                                    {!! Str::limit(strip_tags($post->konten), 150, '...') !!}</p>
                                <a class="btn btn-sm btn-outline-dark" href="{{ route('show.post', $post->slug) }}">Baca
                                    Selengkapnya <i class="fa-solid fa-sm fa-fw fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <ul class="pagination justify-content-center my-4">
                    {{ $posts->OnEachSide(0)->links() }}
                </ul>
            </nav>
        @else
            <div class="alert alert-secondary" role="alert">
                <i class="fa-solid fa-fw fa-sm fa-search"></i> Yah.. Berita tidak tersedia.
            </div>
        @endif
    </div>
@endsection
