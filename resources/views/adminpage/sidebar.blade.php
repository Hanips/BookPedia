<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ url('/admin') }}">
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
                        <a class="nav-link" href="{{ url('/buku') }}">Buku</a>
                        <a class="nav-link" href="{{ url('/kategori') }}">Kategori</a>
                        <a class="nav-link" href="{{ url('/pelanggan') }}">Pelanggan</a>
                        <a class="nav-link" href="{{ url('/penerbit') }}">Penerbit</a>
                        <a class="nav-link" href="{{ url('/pesanan') }}">Pesanan</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Akun</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class='fas fa-user-edit'></i></div>
                    Kelola Member
                </a>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class='fas fa-sign-in-alt'></i></div>
                    Login
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class='fa fa-user-plus'></i></div>
                    Register
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Masuk Sebagai:</div>
            NamaAkun
        </div>
    </nav>
</div>