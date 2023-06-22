@extends('adminpage.index')
@section('content')

@if (Auth::user()->role != 'Pelanggan')
  <main>
    <br><br>
    <div class="container-fluid px-4 mx-auto">
      <div class="container">
        <h2>Detail Pesanan</h2>
        <div class="row justify-content-center">
          <div class="col-md-11">
            <div class="card rounded">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 d-flex align-items-center">
                    <div>
                      <h2>{{ $rs->user->name }}</h2>
                      <p>E-Book: {{ $rs->buku->judul }}</p>
                      <p>Tanggal: {{ $rs->tgl }}</p>
                      <p>Harga: {{ $rs->buku->harga }}</p>
                      <p>Keterangan: {{ $rs->ket }}</p>
                      <a href="{{ url('/pesanan') }}" class="btn btn-primary">Go Back</a>
                      <a href="{{ route('pesanan.edit', $rs->id) }}" class="btn btn-warning">Ubah</a>
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