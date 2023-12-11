@include('layouts.dashboard.partials.header')
@include('layouts.dashboard.partials.navbar')
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        @include('layouts.dashboard.partials.sidebar')
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">@yield('title')</h1>
                <ol class="breadcrumb mb-4">
                    @if (Request::is('halaman-dashboard'))
                        <li class="breadcrumb-item active">@yield('title')</li>
                    @elseif (Request::is('data-berita'))
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    @elseif (Request::is('input-berita'))
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('post.list') }}" class="text-decoration-none">Data Berita</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    @elseif (Request::is('edit-berita*'))
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('post.list') }}" class="text-decoration-none">Data Berita</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    @elseif (Request::is('data-kategori'))
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    @elseif (Request::is('input-kategori'))
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.list') }}" class="text-decoration-none">Data kategori</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    @elseif (Request::is('edit-kategori*'))
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.list') }}" class="text-decoration-none">Data kategori</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    @elseif (Request::is('data-user'))
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    @elseif (Request::is('input-user'))
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.list') }}" class="text-decoration-none">Data user</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    @elseif (Request::is('edit-user*'))
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.list') }}" class="text-decoration-none">Data user</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    @elseif (Request::is('ganti-password'))
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    @elseif (Request::is('lihat-website'))
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    @endif
                </ol>
                @yield('content')
            </div>
        </main>
        @include('layouts.dashboard.partials.footer')
