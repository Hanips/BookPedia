<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="{{ url('/admin') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Data</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class='fa fa-database'></i></div>
                    Master Data
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('buku') ? 'active' : '' }}" href="{{ url('/buku') }}">Buku</a>
                        <a class="nav-link {{ request()->is('kategori') ? 'active' : '' }}" href="{{ url('/kategori') }}">Kategori</a>
                        <a class="nav-link {{ request()->is('pelanggan') ? 'active' : '' }}" href="{{ url('/pelanggan') }}">Pelanggan</a>
                        <a class="nav-link {{ request()->is('penerbit') ? 'active' : '' }}" href="{{ url('/penerbit') }}">Penerbit</a>
                        <a class="nav-link {{ request()->is('pesanan') ? 'active' : '' }}" href="{{ url('/pesanan') }}">Pesanan</a>
                    </nav>
                </div>
                @if(Auth::user()->role == 'Administrator')
                    <div class="sb-sidenav-menu-heading">Akun</div>
                    <a class="nav-link {{ request()->is('user') ? 'active' : '' }}" href="{{ url('/user') }}">
                        <div class="sb-nav-link-icon"><i class='fas fa-user-edit'></i></div>
                        Kelola User
                    </a>
                @endif
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Masuk Sebagai:</div>
            @if(Auth::user()->role != 'Pelanggan')
            {{ Auth::user()->role }}
            @else
            {{ Auth::user()->role }} - Terlarang
            @endif
        </div>
    </nav>
</div>