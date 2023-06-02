@extends('adminpage.index')
@section('content')
@if($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
<main>
  <br><br>
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
                          <h2>{{ $rs->nama }}</h2>
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
@endsection