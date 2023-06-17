<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand" style="background-color: #006337;">
            <a href="#">
                <img src="{{ asset('img/logo-primary.png') }}" style="width: 50px;" alt="">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">
                <img src="{{ asset('img/logo-primary.png') }}" style="width: 50px;" alt="">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="dropdown {{ Route::is('admin-panel.dashboard') || Route::is('admin-panel.menu.*') || Route::is('admin-panel.carousel.*') || Route::is('admin-panel.footer-link.*')? ' active' : '' }}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Pengaturan Umum</span></a>
              <ul class="dropdown-menu">
                <li class="{{ Route::is('admin-panel.dashboard')  ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin-panel.dashboard') }}">Konfigurasi Situs</a></li>
                <li class="{{ Route::is('admin-panel.menu.*')  ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin-panel.menu.index') }}">Menu & Navigasi</a></li>
                <li class="{{ Route::is('admin-panel.carousel.*')  ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin-panel.carousel.index') }}">Carousel Utama</a></li>
                <li class="{{ Route::is('admin-panel.footer-link.*')  ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin-panel.footer-link.index') }}">Tautan Footer</a></li>
              </ul>
            </li>
            <li class="dropdown {{ Route::is('admin-panel.page.*') || Route::is('admin-panel.category.*') ? ' active' : '' }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Halaman</span></a>
              <ul class="dropdown-menu">
                <li class="{{ Route::is('admin-panel.category.*')  ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin-panel.category.index') }}">Kategori Halaman</a></li>
                <li class="{{ Route::is('admin-panel.page.*')  ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin-panel.page.index') }}">Halaman</a></li>
              </ul>
            </li>
            <li class="dropdown {{ Route::is('admin-panel.news.*') || Route::is('admin-panel.document.*') || Route::is('admin-panel.gallery.*') || Route::is('admin-panel.announcement.*') ? ' active' : '' }}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-file"></i><span>Konten Situs</span></a>
              <ul class="dropdown-menu">
                <li class="{{ Route::is('admin-panel.news.*')  ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin-panel.news.index') }}">Berita</a></li>
                <li class="{{ Route::is('admin-panel.document.*')  ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin-panel.document.index') }}">Dokumen</a></li>
                <li class="{{ Route::is('admin-panel.gallery.*')  ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin-panel.gallery.index') }}">Galeri</a></li>
                <li class="{{ Route::is('admin-panel.announcement.*')  ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin-panel.announcement.index') }}">Pengumuman</a></li>
              </ul>
            </li>
        </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ route('logout') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Keluar
            </a>
        </div>
    </aside>
</div>
