@extends('landingpage.index')
@section('content')
<br><br><br><br><br>
<div class="container-lg py-5">
    <div class="container">
        <div class="container">
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Ebook</li>
                </ol>
            </nav>
        </div>
        <br><br>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-3 col-md-12 wow fadeInUp text-dark d-flex flex-column h-100 p-3 shadow" data-wow-delay="0.1s" style="border-radius: 10px;">
                <span><b>Filter</b></span>
                <br>
                <form action="{{ route('landingpage.ebook') }}" method="GET">
                    <div class="form-group mb-3">
                        <label for="kategori">Kategori</label>
                        <select class="form-select" name="kategori" id="kategori" style="border-radius: 10px;">
                            <option value="" {{ $selectedKategori == '' ? 'selected' : '' }}>Semua Kategori</option>
                            @foreach ($semua_kategori as $kategori)
                                <option value="{{ $kategori->id }}" {{ $selectedKategori == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="penerbit">Penerbit</label>
                        <select class="form-select" name="penerbit" id="penerbit" style="border-radius: 10px;">
                            <option value="" {{ $selectedPenerbit == '' ? 'selected' : '' }}>Semua Penerbit</option>
                            @foreach ($semua_penerbit as $penerbit)
                                <option value="{{ $penerbit->id }}" {{ $selectedPenerbit == $penerbit->id ? 'selected' : '' }}>{{ $penerbit->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="hargaMin">Range Harga</label>
                        <div class="input-group">
                            <span class="input-group-text" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">Rp.</span>
                            <input type="number" class="form-control" name="harga_min" id="harga_min" value="{{ $hargaMin }}" placeholder="Min. Harga" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <span class="input-group-text" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">Rp.</span>
                            <input type="number" class="form-control" name="harga_max" id="harga_max" value="{{ $hargaMax }}" placeholder="Max. Harga" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="promo" id="promo" {{ $promo ? 'checked' : '' }}>
                            <label class="form-check-label" for="promo">Promo</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill-custom w-100" style="border-radius: 10px;">Terapkan</button>
                </form>
            </div>
            
            <div class="col-lg-9 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-lg-12 text-start text-lg-start wow slideInRight" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <form action="{{ route('landingpage.ebook') }}" method="GET" class="d-flex align-items-center me-2">
                            <input type="text" class="form-control me-2" name="search" placeholder="Cari judul buku" value="{{ $search }}" style="border-radius: 10px;">
                            <button type="submit" class="btn btn-primary rounded-pill-custom" style="border-radius: 10px;">Cari</button>
                        </form>
                        <div class="nav nav-pills d-inline-flex align-items-center">
                            <span class="me-2"><b>Urut Berdasarkan:</b></span>
                            <!-- Select Option for Sorting -->
                            <form action="{{ route('landingpage.ebook') }}" method="GET">
                                <div class="input-group">
                                    <select id="sorting" class="form-select shadow" onchange="this.form.submit()" name="urutan" style="border-radius: 10px;">
                                        <option value="terbaru" {{ $urutan == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                                        <option value="terlama" {{ $urutan == 'terlama' ? 'selected' : '' }}>Terlama</option>
                                        <option value="harga-tertinggi" {{ $urutan == 'harga-tertinggi' ? 'selected' : '' }}>Harga Tertinggi</option>
                                        <option value="harga-terendah" {{ $urutan == 'harga-terendah' ? 'selected' : '' }}>Harga Terendah</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <!-- Book Listing -->
                    @foreach ($buku_terpilih as $buku)
                        <div class="col-xl-3 col-lg-2 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <a href="{{ route('landingpage.buku_detail', $buku->id) }}">
                                <div class="product-item shadow" style="border-radius: 5px;">
                                    <div class="position-relative bg-light overflow-hidden" style="border-radius: 5px;">
                                        @empty($buku->foto)
                                            <div class="image-container">
                                                <img src="{{ url('landingpage/img/nophoto.jpg') }}" class="img-fluid" alt="Foto e-book" style="object-fit: cover; width: 100%; height: 285px;">
                                            </div>
                                        @else
                                            @php
                                                $fotoPath = 'landingpage/img/' . $buku->foto;
                                                $fotoUrl = url($fotoPath);
                                            @endphp
                                            @if (file_exists(public_path($fotoPath)))
                                                <div class="image-container">
                                                    <img src="{{ $fotoUrl }}" class="img-fluid" alt="Foto e-book" style="object-fit: cover; width: 100%; height: 285px;">
                                                </div>
                                            @else
                                                <div class="image-container">
                                                    <img src="{{ url('landingpage/img/nophoto.jpg') }}" class="img-fluid" alt="Foto e-book" style="object-fit: cover; width: 100%; height: 285px;">
                                                </div>
                                            @endif
                                        @endempty
                                        @if ($buku->diskon > 0)
                                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-2 py-0 px-1">{{ number_format($buku->diskon, 0, ',', '.') }}%</div>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <a class="d-block h8 mb-2 text-truncate text-dark capitalize" href="" title="{{ $buku->judul }}"><b>{{ $buku->judul }}</b></a>
                                        <p>{{ $buku->kategori->nama }}</p>
                                        @if ($buku->diskon > 0)
                                        @php
                                            $hargaDiskon = $buku->harga - ($buku->harga * $buku->diskon / 100);
                                        @endphp
                                            <div class="price-container">
                                                <span style="text-decoration: line-through; color: #9a9a9a;">Rp. {{ number_format($buku->harga, 0, ',', '.') }}</span><br>
                                                <span style="color: #0261ae;">Rp. {{ number_format($hargaDiskon, 0, ',', '.') }}</span>
                                            </div>
                                        @else
                                        <div class="price-container">
                                            <span style="color: #0261ae;">Rp. {{ number_format($buku->harga, 0, ',', '.') }}</span>
                                        </div>
                                        <br>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
