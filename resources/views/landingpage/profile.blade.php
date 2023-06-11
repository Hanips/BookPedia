@extends('landingpage.index')
@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
  <!-- Bagian header lainnya... -->
</div><br/>
<!-- Page Header End -->

<div class="container"> 
  <div class="row">
    <div class="col-lg-4">
      <div class="card mb-4">
        <div class="card-body text-center">
          @empty($ar_pelanggan->foto)
          <img src="{{ asset('landingpage/img/noimg.png') }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
          @else
            @php
              $fotoPath = 'landingpage/img/' . $ar_pelanggan->foto;
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
           <button type="button" class="btn btn-primary rounded-pill-custom">Ubah Profil</button>
         </div>
       </div>
     </div>

     <div class="card mb-4 mb-lg-0">
      <div class="card-body p-0">
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              <i class="fa fa-user fs-5"></i> <b>Akun Saya</b>
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <nav class="nav flex-column">
                <a class="nav-link" href="#">Profil</a>
                <a class="nav-link" href="#">Alamat</a>
                <a class="nav-link" href="#">Ubah Password</a>
              </nav>
            </div>
          </div>
          
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <i class="fa fa-shopping-bag fs-5"></i>
                <b>Pesanan Saya</b>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <i class="fa fa-bell fs-5"></i>
                <b>Notifikasi</b>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-lg-8">
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3">
            <h5 class="mb-0">Profil Saya</h5>
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Nama</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">:&nbsp;{{ Auth::user()->name }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Email</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">:&nbsp;{{ Auth::user()->email }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Phone</p>
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
