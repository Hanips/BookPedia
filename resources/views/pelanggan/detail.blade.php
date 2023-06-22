@extends('adminpage.index')
@section('content')

@if (Auth::user()->role != 'Pelanggan')
  <main>
    <br><br>
    <div class="container-fluid px-4 mx-auto">
      <h2 style="margin-left: 60px;">Detail Pelanggan</h2>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-11"><br>
            <div class="card rounded">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    @empty($rs->foto)
                      <img src="{{ url('landingpage/img/noimg.png') }}" class="img-fluid" alt="Foto User">
                    @else
                      @php
                        $fotoPath = 'landingpage/img/'.$rs->foto;
                        $fotoUrl = url($fotoPath);
                      @endphp
                      @if (file_exists(public_path($fotoPath)))
                        <img src="{{ $fotoUrl }}" class="img-fluid" alt="Foto e-book">
                      @else
                        <img src="{{ url('landingpage/img/noimg.png') }}" class="img-fluid" alt="Foto User">
                      @endif
                    @endempty
                  </div>
                  <div class="col-md-6 d-flex align-items-center">
                    <div>
                      <h2>{{ $rs->name }}</h2>
                      <p>Email: {{ $rs->email }}</p>
                      <p>No. HP: {{ $rs->hp }}</p>
                      
                      <a href="{{ url('/pelanggan') }}" class="btn btn-primary">Go Back</a>
                      <a href="{{ route('pelanggan.edit', $rs->id) }}" class="btn btn-warning">Ubah</a>
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