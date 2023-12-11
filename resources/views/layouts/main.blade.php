@include('layouts.partials.header')
@include('layouts.partials.navbar')
@if (Request::is('/'))
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Selamat Datang!</h1>
                <p class="lead mb-0">Arsip berita dari seluruh dunia ada disini.</p>
            </div>
            <div class="row">
                <div class="col-lg">
                    <div class="d-flex justify-content-center justify-content-lg-start justify-content-sm-start">
                        <div
                            class="col-6 text-center text-sm-start text-lg-start col-sm-4 col-lg-3 border-bottom border-3 mb-3 border-dark">
                            <h3 class="fw-semibold">Berita Penting</h3>
                        </div>
                    </div>
                    <!-- Featured blog post-->
                    @if ($importantPost)
                        <div class="card mb-4 border-0 shadow-sm">
                            <div class="row g-0">
                                <div class="col-lg-4">
                                    <a href="#!"><img class="img-fluid h-100 rounded"
                                            src="{{ asset('storage/' . $importantPost->gambar) }}" /></a>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <div class="small text-muted"><i
                                                class="fa-regular fa-sm fa-fw fa-calendar-alt"></i>
                                            {{ $importantPost->created_at }} | <i
                                                class="fa-solid fa-sm fa-fw fa-clock"></i>
                                            <strong>UTC+8</strong>
                                        </div>
                                        @foreach ($importantPost->categories->unique('nama_kategori') as $category)
                                            <a class="badge text-bg-dark text-decoration-none link-light my-2"
                                                href="{{ route('welcome', ['kategori' => $category->nama_kategori]) }}">{{ $category->nama_kategori }}</a>
                                        @endforeach
                                        <h2 class="card-title fw-semibold">{{ $importantPost->judul }}</h2>
                                        <p class="card-text">{!! Str::limit(strip_tags($importantPost->konten), 150, '...') !!}</p>
                                        <a class="btn btn-sm btn-dark"
                                            href="{{ route('show.post', $importantPost->slug) }}">Baca Selengkapnya <i
                                                class="fa-solid fa-sm fa-fw fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-fw fa-sm fa-star"></i> Berita penting belum tersedia...
                        </div>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </header>
@endif
<!-- Page content-->
<div class="container">
    @if (Request::is('/'))
        <div class="d-flex justify-content-center justify-content-lg-start justify-content-sm-start mt-4">
            <div
                class="col-6 text-center text-sm-start text-lg-start col-sm-4 col-lg-3 border-bottom border-3 mb-3 border-dark">
                <h3 class="fw-semibold">Arsip Berita</h3>
            </div>
        </div>
    @endif
    <div class="row mb-4">
        <!-- Blog entries-->
        @yield('content')
        <!-- Side widgets-->
        <div class="col-lg-4 order-1 order-lg-2 {{ Request::is('berita*') ? 'mt-5' : '' }}">
            <!-- Search widget-->
            <div class="card mb-3">
                <div class="card-header">Pencarian</div>
                <div class="card-body">
                    <form action="{{ route('welcome') }}" method="get">
                        <div class="input-group">
                            <input class="form-control" type="text" name="cari" placeholder="cari berita..."
                                aria-label="Enter search term..." aria-describedby="button-search"
                                value="{{ request('cari') }}" />
                            <button class="btn btn-dark" id="button-search" type="submit"><i
                                    class="fa-solid fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-3 d-none d-lg-block">
                <div class="card-header">Kategori</div>
                <div class="card-body">
                    <div class="row">
                        @if ($categories->count() > 0)
                            @foreach ($categories as $category)
                                <div class="col">
                                    <a href="{{ route('welcome', ['kategori' => $category->slug]) }}"
                                        class="text-decoration-none badge text-bg-dark">{{ $category->nama_kategori }}</a>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center mb-0">Kategori Masih Kosong</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.partials.footer')
