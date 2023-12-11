<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('icon/new11s.png') }}" alt="Bootstrap" width="50" height="50">
        </a>
        <a class="navbar-brand" href="#!">Read Only News</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link {{ Request::is('/') || Request::is('berita/*') ? 'active' : '' }}"
                        href="{{ route('welcome') }}"><i class="fa-solid fa-sm fa-fw fa-home"></i> Home</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('berita-penting') ? 'active' : '' }}" href="{{ route('important.post') }}"><i class="fa-regular fa-sm fa-fw fa-newspaper"></i> Berita Penting</a></li>
            </ul>
        </div>
    </div>
</nav>
