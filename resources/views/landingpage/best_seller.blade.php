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
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <a href="{{ route('landingpage.buku_detail', $buku->id) }}">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        @empty($buku->foto)
                                          <img src="{{ url('landingpage/img/nophoto.jpg') }}" class="img-fluid" alt="Foto e-book">
                                        @else
                                          @php
                                            $fotoPath = 'landingpage/img/' . $buku->foto;
                                            $fotoUrl = url($fotoPath);
                                          @endphp
                                          @if (file_exists(public_path($fotoPath)))
                                            <img src="{{ $fotoUrl }}" class="img-fluid" alt="Foto e-book">
                                          @else
                                            <img src="{{ url('landingpage/img/nophoto.jpg') }}" class="img-fluid" alt="Foto e-book">
                                          @endif
                                        @endempty
                                        <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-2 py-0 px-1">Best Seller</div>
                                    </div>
                                    <div class="text-center">
                                        <a class="d-block h8 mb-2 text-truncate text-dark capitalize" href="" title="{{ $buku->judul }}"><b>{{ $buku->judul }}</b></a>
                                        <p>{{ $buku->kategori->nama }}</p>
                                        <span style="color: #0261ae;" class="me-1"><b>Rp. {{ number_format($buku->harga, 0, ',', '.') }}</b></span>

                                    </div>
                                </div>
                            </a>
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