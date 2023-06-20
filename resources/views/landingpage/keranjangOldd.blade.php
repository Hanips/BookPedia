@extends('landingpage.index')

@section('content')
<br><br><br><br><br>
<div class="container-lg py-5">
    <div class="container">
        <div class="container">
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Keranjang</li>
                </ol>
            </nav>
        </div>
        <br><br>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-9 col-md-12 wow fadeInUp text-dark d-flex flex-column h-100 p-3 shadow" data-wow-delay="0.1s" style="border-radius: 10px;">
                <div class="col-lg-12 text-end text-lg-start wow slideInRight mb-3" data-wow-delay="0.1s">
                    <div class="nav nav-pills d-inline-flex align-items-center mb-3" data-wow-delay="0.1s">
                        <input type="checkbox" class="form-check-input"> Pilih Semua
                    </div>
                </div>
                <div class="col-lg-12">
                    @forelse ($keranjang as $detail)
                        <div class="col-lg-3 col-md-12 wow fadeInUp text-dark d-flex flex-column h-100 p-3 shadow" data-wow-delay="0.1s" style="border-radius: 20px;">
                            <?php
                                $subtotal = $detail->buku_harga - ($detail->buku_harga * $detail->buku_diskon / 100);
                                $formattedHarga = number_format($detail->buku_harga, 0, ',', '.');
                                $formattedSubtotal = number_format($subtotal, 0, ',', '.');
                                $total += $subtotal;
                            ?>
                            @empty($detail->buku_foto)
                                <div class="image-container">
                                    <img src="{{ url('landingpage/img/nophoto.jpg') }}" class="img-fluid" alt="Foto e-book" style="border-radius: 20px;">
                                </div>
                            @else
                                @php
                                    $fotoPath = 'landingpage/img/' . $detail->buku_foto;
                                    $fotoUrl = url($fotoPath);
                                @endphp
                                @if (file_exists(public_path($fotoPath)))
                                    <div class="image-container">
                                        <img src="{{ $fotoUrl }}" class="img-fluid" alt="Foto e-book">
                                    </div>
                                @else
                                    <div class="image-container">
                                        <img src="{{ url('landingpage/img/nophoto.jpg') }}" class="img-fluid" alt="Foto e-book" style="border-radius: 20px;">
                                    </div>
                                @endif
                            @endempty
                            <div class="row">
                                <div class="col-md-6">
                                    <p>{{ $detail->buku_judul }}</p>
                                    <p>{{ $formattedHarga }}</p>
                                    <p>{{ $detail->buku_diskon }}</p>
                                    <p>{{ $formattedSubtotal }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p colspan="7" class="text-center">Keranjang Anda kosong.</p>
                    @endforelse
                </div>
            </div>
            <div class="col-lg-3 col-md-12 wow fadeInUp text-dark d-flex flex-column h-100 shadow" data-wow-delay="0.1s" style="border-radius: 10px;">
                <span><b>Rincian</b></span>
                <h3><strong>Total Rp{{ number_format($total, 0, ',', '.') }}</strong></h3>
                <a href="{{ url('/') }}" class="btn btn-danger">
                    <i class="fa fa-arrow-left"></i>
                    Lanjutkan Belanja
                </a>
                <a href="#" class="btn btn-success">
                    <i class="fa fa-money"></i>
                    Checkout
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
