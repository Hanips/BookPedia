@extends('landingpage.index')
@section('content')
    @php
        $harga = $detail->buku->harga;
        $diskon = $detail->buku->diskon;
        if ($diskon == null || $diskon == 0) {
            $after_diskon = $harga;
        } else {
            $after_diskon = $harga - (($diskon / 100) * $harga);
        }
        
        $grossAmounts = $after_diskon;
    @endphp
    <br><br><br><br>
    <div class="container-lg py-5">
        <div class="container">
            <div class="container">

                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a class="text-body" href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-body" href="{{ url('/keranjang') }}">Keranjang</a></li>
                        <li class="breadcrumb-item text-dark active" aria-current="page">Invoice</li>
                    </ol>
                </nav>
            </div>
            <br><br>
            <div class="custom-card">
                <div class="cardBody">
                    <div class="row">
                        <div class="col-3">Nama</div>
                        <div class="col-3">: {{ $namaUser }}</div>
                    </div>
                    <div class="row">
                        <div class="col-3">E-Book</div>
                        <div class="col-6">: {{ $detail->buku->judul }}</div>
                    </div>
                    <div class="row">
                        @php
                            $diskon = $detail->buku->diskon;
                            if ($diskon == null || $diskon == 0) {
                                $new_harga = '-';
                            } else {
                                $new_harga =  number_format($diskon, 0, ',', '.').'%';
                            }
                        @endphp
                        <div class="col-3">Diskon</div>
                        <div class="col-3">: {{ $new_harga }}</div>
                    </div>
                    <div class="row">
                        <div class="col-3">Total</div>
                        <div class="col-3">: Rp. {{ number_format($grossAmounts, 0, ',', '.') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-3">Status</div>
                        <div class="col-3">: {{ $detail->ket }}</div>
                    </div>
                    <div class="row">
                        <div class="col-3">Link E-Book</div>
                        <div class="col-6">: <a href="https://learn.nurulfikri.com/mod/resource/view.php?id=2460">{{ $detail->buku->url_buku }}</a></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                        	<a href="https://learn.nurulfikri.com/mod/resource/view.php?id=2460" class="btn btn-primary">
								Download E-Book
							</a>
                        	<a href="{{ url('/keranjang') }}" class="btn btn-danger">
								Selesai
							</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
