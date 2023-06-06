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
          @if(empty($ar_pelanggan->foto))
          <img src="{{ asset('landingpage/img/noimg.png') }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
          @else
          <img src="{{ asset('landingpage/img/'.$ar_pelanggan->foto) }}" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
          @endif
          <h5 class="my-3">{{ $ar_pelanggan[0]->nama ?? '' }}</h5>
          <div class="d-flex justify-content-center mb-2">
           <button type="button" class="btn btn-primary">Ubah Profil</button>
         </div>
       </div>
     </div>
     <div class="card mb-4 mb-lg-0">
      <div class="card-body p-0">
        <ul class="list-group list-group-flush rounded-3 d-flex flex-column">
          <li class="list-group-item dropdown d-flex justify-content-center align-items-center p-2">
            <a class="dropdown-toggle d-flex align-items-center" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person fs-3" style="color: #080202;"></i>
              <span class="ms-2 custom-text" style="color: black;">Akun Saya</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#">Profil</a></li>
              <li><a class="dropdown-item" href="#">Alamat</a></li>
              <li><a class="dropdown-item" href="#">Ubah Password</a></li>
            </ul>
          </li>
          <li class="list-group-item dropdown d-flex justify-content-center align-items-center p-2">
            <a class="dropdown-toggle d-flex align-items-center" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-cart4 fs-4" style="color: #080202;"></i>
              <span class="ms-2 custom-text" style="color: black;">Pesanan Saya</span>
            </a>
          </li>
          <li class="list-group-item dropdown d-flex justify-content-center align-items-center p-2">
            <a class="dropdown-toggle d-flex align-items-center" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-bell fs-4" style="color: #080202;"></i>
              <span class="ms-2 custom-text" style="color: black;">Notifikasi</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  
  <div class="col-lg-8">
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3">
            <h3 class="mb-0">Profil Saya</h3>
          </div>
        </div>
        <hr/>
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
</div>
@endsection
