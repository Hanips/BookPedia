@extends('landingpage.index')
@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
  <!-- Bagian header lainnya... -->
</div><br/>
<!-- Page Header End -->

<div class="container"> 
  <div class="row">
    <div class="col-lg-5">
      <div class="card mb-4">
        <div class="card-body text-center">
          @empty(Auth::user()->foto)
          <img src="{{ asset('landingpage/img/noimg.png') }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
          @else
            @php
              $fotoPath = 'landingpage/img/' . Auth::user()->foto;
              $fotoUrl = url($fotoPath);
            @endphp
            @if (file_exists(public_path($fotoPath)))
              <img src="{{ $fotoUrl }}" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
            @else
              <img src="{{ asset('landingpage/img/noimg.png') }}" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
            @endif
          @endempty
          <h5 class="my-3">{{ Auth::user()->name }}</h5>
          <div class="d-flex justify-content-center mb-2">
            <a href="{{ url('/ubah_profil', $user->id) }}" class="btn btn-outline-primary rounded-pill-custom">
              <i class="bi bi-pencil"></i>  
              Ubah Profil
          </a>
          </div>
       </div>
     </div>
  </div>
  
  <div class="col-lg-7">
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3">
            <h5 class="mb-0">&nbsp;Profil Saya</h5>
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">&nbsp;Nama</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">:&nbsp;{{ Auth::user()->name }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">&nbsp;Email</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">:&nbsp;{{ Auth::user()->email }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">&nbsp;Phone</p>
          </div>
          <div class="col-sm-9">
            @if (!empty(Auth::user()->hp))
              <p class="text-muted mb-0">:&nbsp;{{ Auth::user()->hp }}</p>
            @else
              <p class="text-muted mb-0">:&nbsp;-</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
