<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Menu</div>
            <a class="nav-link {{ Request::is('halaman-dashboard') || Request::is('ganti-password') ? 'active' : '' }}"
                href="{{ route('dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link {{ Request::is('lihat-website') ? 'active' : '' }}"
                href="{{ route('show.website') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-globe"></i></div>
                Lihat Website
            </a>
            <a class="nav-link {{ Request::is('data-berita') || Request::is('input-berita') || Request::is('edit-berita*') ? 'active collapse' : 'collapsed' }}"
                href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false"
                aria-controls="collapseLayouts1">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-newspaper"></i></div>
                Berita
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="{{ Request::is('data-berita') || Request::is('input-berita') || Request::is('edit-berita*') ? 'collapsed' : 'collapse' }}"
                id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ Request::is('data-berita') || Request::is('edit-berita*') ? 'active' : '' }}"
                        href="{{ route('post.list') }}">Data Berita</a>
                    <a class="nav-link {{ Request::is('input-berita') ? 'active' : '' }}"
                        href="{{ route('post.input') }}">Input Berita Baru</a>
                </nav>
            </div>
            @if (Auth::user()->role == 'admin')
                <a class="nav-link {{ Request::is('data-kategori') || Request::is('input-kategori') || Request::is('edit-kategori*') ? 'active collapse' : 'collapsed' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false"
                    aria-controls="collapseLayouts2">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                    Kategori
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="{{ Request::is('data-kategori') || Request::is('input-kategori') || Request::is('edit-kategori*') ? 'collapsed' : 'collapse' }}"
                    id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('data-kategori') || Request::is('edit-kategori*') ? 'active' : '' }}"
                            href="{{ route('category.list') }}">Data Kategori</a>
                        <a class="nav-link {{ Request::is('input-kategori') ? 'active' : '' }}"
                            href="{{ route('category.input') }}">Input Kategori Baru</a>
                    </nav>
                </div>
                <a class="nav-link {{ Request::is('data-user') || Request::is('input-user') || Request::is('edit-user*') ? 'active collapse' : 'collapsed' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false"
                    aria-controls="collapseLayouts3">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                    User
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="{{ Request::is('data-user') || Request::is('input-user') || Request::is('edit-user*') ? 'collapsed' : 'collapse' }}"
                    id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('data-user') || Request::is('edit-user*') ? 'active' : '' }}"
                            href="{{ route('user.list') }}">Data User</a>
                        <a class="nav-link {{ Request::is('input-user') ? 'active' : '' }}"
                            href="{{ route('user.input') }}">Input User Baru</a>
                    </nav>
                </div>
            @endif
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small text-whi">Logged in as:</div>
        <strong class="text-white">{{ Auth::user()->role }}</strong>
    </div>
</nav>
