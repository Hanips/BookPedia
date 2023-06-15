@extends('landingpage.index')
@section('content')
<br><br><br><br><br><br>
<div class="container-xxl py-5">
    <div class="container">
        <div class="container">
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Ebook</li>
                </ol>
            </nav>
        </div>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="section-header text-start mb-5" style="max-width: 500px;">
                            <h2 class="display-5 mb-3">Best Seller</h2>
                            <p>Dapatkan e-book paling populer yang telah terjual lebih dari 10.000 pengguna.</p>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-{{ $kategoriId }}" class="tab-pane fade show p-0{{ $kategoriId === null ? ' active' : '' }}">
                        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @php $counter = 0; @endphp
                                <div class="carousel-item active">
                                    <div class="row g-4">
                                        @foreach ($semuaBuku as $index => $buku)
                                            <div class="col-lg-2 col-md-4 col-sm-6">
                                                <div class="product-item">
                                                    <div class="position-relative bg-light overflow-hidden">
                                                        @empty($buku->foto)
                                                            <img src="{{ url('landingpage/img/nophoto.jpg') }}" class="img-fluid w-100" alt="">
                                                        @else
                                                            <img src="{{ url('landingpage/img') }}/{{ $buku->foto }}" class="img-fluid w-100" alt="">
                                                        @endempty
                                                        <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-2 py-1 px-2">{{ $kategoriId === 1 ? 'Kategori 1' : 'Best' }}</div>
                                                    </div>
                                                    <div class="text-center p-3">
                                                        <a class="d-block h6 mb-2" href="">{{ $buku->judul }}</a>
                                                        <span class="text-primary">{{ $buku->harga }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            @php $counter++; @endphp
                                            @if ($counter % 6 === 0)
                                                </div>
                                                </div>
                                                @if (($index + 1) !== count($semuaBuku))
                                                    <div class="carousel-item">
                                                        <div class="row g-4">
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="section-header text-start mb-5" style="max-width: 500px;">
            <h2 class="display-5 mb-3">Kategori 1</h2>
            <p>Dapatkan e-book dari kategori 1.</p>
        </div>
        <div id="carouselKategori1" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php $counter = 0; @endphp
                <div class="carousel-item active">
                    <div class="row g-4">
                        @foreach ($bukuKategori1 as $index => $buku)
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        @empty($buku->foto)
                                            <img src="{{ url('landingpage/img/nophoto.jpg') }}" class="img-fluid w-100" alt="">
                                        @else
                                            <img src="{{ url('landingpage/img') }}/{{ $buku->foto }}" class="img-fluid w-100" alt="">
                                        @endempty
                                        <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-2 py-1 px-2">Kategori 1</div>
                                    </div>
                                    <div class="text-center p-3">
                                        <a class="d-block h6 mb-2" href="">{{ $buku->judul }}</a>
                                        <span class="text-primary">{{ $buku->harga }}</span>
                                    </div>
                                </div>
                            </div>
                            @php $counter++; @endphp
                            @if ($counter % 6 === 0)
                                </div>
                                </div>
                                @if (($index + 1) !== count($bukuKategori1))
                                    <div class="carousel-item">
                                        <div class="row g-4">
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselKategori1" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselKategori1" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
@endsection
