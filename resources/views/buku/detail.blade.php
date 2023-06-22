@extends('adminpage.index')
@section('content')

@if (Auth::user()->role != 'Pelanggan')
  <main>
    <br><br>
    <div class="container-fluid px-4 mx-auto">
      <div class="container">
        <h2 style="margin-left: 50px;">Detail Buku</h2>
        <div class="row justify-content-center">
          <div class="col-md-11"><br>
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
                      <p>Diskon: {{ $rs->diskon }}%</p>
                      <p><b>URL Buku: <a href="{{ $rs->url_buku }}" style="text-decoration: none; color: black;">{{ $rs->url_buku }}</a></b></p>
                      
                      <a href="{{ url('/buku') }}" class="btn btn-primary">Go Back</a>
                      <a href="{{ route('buku.edit', $rs->id) }}" class="btn btn-warning">Ubah</a>
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
@else
  @include('adminpage.access_denied')
@endif
@endsection