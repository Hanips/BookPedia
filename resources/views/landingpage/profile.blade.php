@extends('landingpage.index')
@section('content')

   <!-- Page Header Start -->
   <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <!-- Bagian header lainnya... -->
  </div><br/>
    <!-- Page Header End -->

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            @if(empty($ar_pelanggan->foto))
            <img src="{{ asset('landingpage/img/noimg.png') }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
            @else
            <img src="{{ asset('landingpage/img/'.$ar_pelanggan->foto) }}" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
            @endif
            <h5 class="my-3">{{ $ar_pelanggan[0]->nama ?? '' }}</h5>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Ubah</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nama</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $ar_pelanggan[0]->nama ?? '' }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $ar_pelanggan[0]->email ?? '' }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $ar_pelanggan[0]->hp ?? '' }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
