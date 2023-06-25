<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small class="ms-4"><i class="fa fa-envelope me-2"></i>bookpedia@gmail.com</small>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Dapatkan promonya di:</small>
            <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
            <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{ url('/') }}" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="fw-bold text-primary m-0">Book<span class="text-secondary">Pedia</span></h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                <a href="{{ url('/ebook') }}" class="nav-item nav-link {{ request()->is('ebook') ? 'active' : '' }}">Ebook</a>
                <a href="{{ url('/promo') }}" class="nav-item nav-link {{ request()->is('promo') ? 'active' : '' }}">Promo</a>
                <a href="{{ url('/contact') }}" class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">Tim Kami</a>
            </div>
            <div class="d-none d-lg-flex ms-2">
                <div class="d-flex align-items-center">
                    @guest
                    <!-- Tampilkan tombol Login jika pengguna belum login -->
                    <a href="{{ route('login') }}" class="btn btn-md bg-white btn-outline-dark rounded-pill me-3 wow fadeIn" data-wow-delay="0.1s">
                        <i class="fa fa-user text-body"></i>
                        | Login
                    </a>
                    @else
                    <!-- Tampilkan nama pengguna, profil, keranjang, dan logout jika pengguna telah login -->
                    <div class="nav-item dropdown">
                        <a href="#" class="btn btn-md bg-white btn-outline-dark rounded-pill me-3 wow fadeIn" data-wow-delay="0.1s" data-bs-toggle="dropdown">
                            @empty(Auth::user()->foto)
                                <img src="{{ asset('landingpage/img/noimg.png') }}" alt="avatar" class="rounded-circle img-fluid" style="width: 30px; height: 30px;">
                            @else
                                @php
                                $fotoPath = 'landingpage/img/' . Auth::user()->foto;
                                $fotoUrl = url($fotoPath);
                                @endphp
                                @if (file_exists(public_path($fotoPath)))
                                <img src="{{ $fotoUrl }}" class="rounded-circle img-fluid" style="width: 30px; height: 30px;">
                                @else
                                <img src="{{ asset('landingpage/img/noimg.png') }}" class="rounded-circle img-fluid" style="width: 30px; height: 30px;">
                                @endif
                            @endempty
                            | {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-custom m-0" style="border-radius: 10px;">
                            <a href="{{ url('/profile') }}" class="dropdown-item {{ request()->is('profile') ? 'active' : '' }}">Profil</a>
                            <a href="{{ url('/keranjang') }}" class="dropdown-item {{ request()->is('keranjang') ? 'active' : '' }}">Keranjang</a>
                            <hr class="dropdown-divider">
                            @if (Auth::user()->role != 'Pelanggan')
                                <a href="{{ url('/admin') }}" class="dropdown-item">Dashboard</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</div>