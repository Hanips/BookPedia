<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h2 class="display-5 mb-3">Best Seller</h2>
                    <p>Dapatkan e-book paling populer yang telah terjual lebih dari 10.000 pengguna.</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill" href="#tab-1">Novel</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-2">Komik</a>
                    </li>
                    <li class="nav-item me-0">
                        <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-3">Majalah</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    @foreach ($ar_buku as $buku)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    @empty($buku->foto)
                                        <img src="{{ url('landingpage/img/nophoto.jpg') }}" class="img-fluid w-100" alt="">
                                    @else
                                        <img src="{{ url('landingpage/img') }}/{{ $buku->foto }}" class="img-fluid w-100" alt="">
                                    @endempty
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">Best</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="">{{ $buku->judul }}</a>
                                    <span class="text-primary me-1">{{ $buku->harga }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                    </div>
                </div>
            </div>
            <div id="tab-2" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    @foreach ($ar_buku as $buku)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    @empty($buku->foto)
                                        <img src="{{ url('landingpage/img/nophoto.jpg') }}" class="img-fluid w-100" alt="">
                                    @else
                                        <img src="{{ url('landingpage/img') }}/{{ $buku->foto }}" class="img-fluid w-100" alt="">
                                    @endempty
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">Best</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="">{{ $buku->judul }}</a>
                                    <span class="text-primary me-1">{{ $buku->harga }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                    </div>
                </div>
            </div>
            <div id="tab-3" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    @foreach ($ar_buku as $buku)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    @empty($buku->foto)
                                        <img src="{{ url('landingpage/img/nophoto.jpg') }}" class="img-fluid w-100" alt="">
                                    @else
                                        <img src="{{ url('landingpage/img') }}/{{ $buku->foto }}" class="img-fluid w-100" alt="">
                                    @endempty
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">best</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="">{{ $buku->judul }}</a>
                                    <span class="text-primary me-1">{{ $buku->harga }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>