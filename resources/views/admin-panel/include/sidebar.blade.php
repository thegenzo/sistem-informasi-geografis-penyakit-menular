<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">
                <img src="{{ asset('panel-assets/img/stisla.svg') }}" style="width: 50px;" alt="">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">
                <img src="{{ asset('panel-assets/img/stisla.svg') }}" style="width: 50px;" alt="">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Route::is('admin-panel.dashboard') ? active : '' }}"><a class="nav-link"
                    href="{{ route('admin-panel.dashboard') }}"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
            <li class="{{ Route::is('admin-panel.diseases.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin-panel.diseases.index') }}"><i class="fas fa-heartbeat"></i><span>Data Penyakit</span></a>
            </li>
            <li
                class="dropdown {{ Route::is('admin-panel.districts.*') ? ' active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file"></i><span>Data Wilayah</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Route::is('admin-panel.districts.*') ? ' active' : '' }}"><a class="nav-link"
                            href="{{ route('admin-panel.districts.index') }}">Kecamatan</a></li>
                    {{-- <li class="{{ Route::is('admin-panel.villages.*') ? ' active' : '' }}"><a class="nav-link"
                        href="{{ route('admin-panel.villages.index') }}">Kelurahan</a></li> --}}
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