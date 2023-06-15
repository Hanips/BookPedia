@extends('landingpage.index')
@section('content')
@if($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
<br><br><br><br><br><br>
<main>
  <div class="container-fluid px-4 mx-auto">
    <div class="container">
      <nav aria-label="breadcrumb animated slideInDown">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a class="text-body" href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item"><a class="text-body" href="{{ url('/ebook') }}">Ebook</a></li>
          <li class="breadcrumb-item"><a class="text-body" href="{{ url('/ebook?kategori=' . $rs->kategori_id) }}">{{ $rs->kategori->nama }}</a></li>
          <li class="breadcrumb-item text-dark active" aria-current="page">{{ $rs->judul }}</li>
        </ol>
      </nav>
    </div>
    <div class="container-lg py-5">
      <div class="container">
        <div class="row g-5 justify-content-center">
          <div class="col-lg-3 col-md-12 wow fadeInUp text-dark d-flex flex-column h-100 p-3 shadow" data-wow-delay="0.1s" style="border-radius: 20px;">
            @empty($rs->foto)
              <img src="{{ url('landingpage/img/nophoto.jpg') }}" class="img-fluid" alt="Foto e-book" style="border-radius: 20px;">
            @else
              @php
                $fotoPath = 'landingpage/img/' . $rs->foto;
                $fotoUrl = url($fotoPath);
              @endphp
              @if (file_exists(public_path($fotoPath)))
                <img src="{{ $fotoUrl }}" class="img-fluid" alt="Foto e-book" style="border-radius: 20px;">
              @else
                <img src="{{ url('landingpage/img/nophoto.jpg') }}" class="img-fluid" alt="Foto e-book" style="border-radius: 20px;">
              @endif
            @endempty
          </div>
          <div class="col-lg-8 col-md-12 ms-3 wow fadeInUp" data-wow-delay="0.5s">
            <br>
            <h3>{{ $rs->judul }}</h3>
            <br>
            <p>
              Terjual &nbsp; {{ $rs->pesanan_count }} &nbsp; &nbsp; | &nbsp; &nbsp;
              @php
                $bintang_full = (int)$rs->rating;
                $bintang_setengah = $rs->rating - $bintang_full;              
              @endphp
              @for ($i = 1; $i <= $bintang_full; $i++)
                <i class='fa fa-star'></i>
              @endfor
          
              @if ($bintang_setengah >= 0.5)
                <i class='fas fa-star-half-alt'></i>
                @php $bintang_full++; @endphp
              @endif
          
              @for ($i = $bintang_full; $i < 5; $i++)
                <i class='fa fa-star' style='color: #e9e7e2'></i>
              @endfor
              &nbsp; &nbsp; | &nbsp; &nbsp; {{ $rs->kategori->nama }}
            </p>
            <br>
            <div class="row">
              <div class="col-md-6">
                <p>Pengarang: {{ $rs->pengarang }}</p>
                <p>Jumlah Halaman: {{ $rs->jumlah_halaman }}</p>
              </div>
              <div class="col-md-6">
                <p>ISBN: {{ $rs->isbn }}</p>
                <p>Sinopsis: {{ $rs->sinopsis }}</p>
              </div>
            </div>
            <p>Harga: Rp. 
              @if ($rs->diskon > 0)
              @php
                $hargaDiskon = $rs->harga - ($rs->harga * $rs->diskon / 100);
              @endphp
                {{ number_format($hargaDiskon, 0, ',', '.') }}
              @else
                {{ number_format($rs->harga, 0, ',', '.') }}
              @endif
            </p>
            <br><br><br>
            <a href="" class="btn btn-success rounded-pill-custom">Pesan</a>
            <a href="{{ url('/') }}" class="btn btn-primary rounded-pill-custom">Kembali</a>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection