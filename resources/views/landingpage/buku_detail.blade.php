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
            <div class="row justify-content-center">
              <div class="col-md-11">
                <div class="card rounded">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        @empty($rs->foto)
                          <img src="{{ url('landingpage/img/nophoto.jpg') }}" class="img-fluid" alt="Foto e-book">
                        @else
                          @php
                            $fotoPath = 'landingpage/img/' . $rs->foto;
                            $fotoUrl = url($fotoPath);
                          @endphp
                          @if (file_exists(public_path($fotoPath)))
                            <img src="{{ $fotoUrl }}" class="img-fluid" alt="Foto e-book">
                          @else
                            <img src="{{ url('landingpage/img/nophoto.jpg') }}" class="img-fluid" alt="Foto e-book">
                          @endif
                        @endempty
                      </div>
                      <div class="col-md-6 d-flex align-items-center">
                        <div>
                          <h2>{{ $rs->judul }}</h2>
                          <p>
                            Rating: 
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
                        </p>
                        
                          <p>Kategori: {{ $rs->kategori->nama }}</p>
                          <p>ISBN: {{ $rs->isbn }}</p>
                          <p>Pengarang: {{ $rs->pengarang }}</p>
                          <p>Jumlah Halaman: {{ $rs->jumlah_halaman }}</p>
                          <p>Sinopsis: {{ $rs->sinopsis }}</p>
                          <p>Harga: Rp. {{ number_format($rs->harga, 0, ',', '.') }}</p>
                          <a href="" class="btn btn-success">Pesan</a>
                          <a href="{{ url('/') }}" class="btn btn-primary">Kembali</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            
          
    </div>
</main>
@endsection