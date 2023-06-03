@extends('landingpage.index')
@section('content')
<br><br><br><br><br><br><br>
<div class="container">
    <nav aria-label="breadcrumb animated slideInDown">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a class="text-body" href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item text-dark active" aria-current="page">Promo</li>
        </ol>
    </nav>
</div>
<div class="container-fluid py-5 d-flex justify-content-center">
    <div id="carouselExampleIndicators" class="carousel slide" style="max-width: 90%;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ url('landingpage/img/iklan-1.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ url('landingpage/img/iklan-2.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ url('landingpage/img/iklan-3.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<div class="row g-0 align-items-end">
    <div class="col-lg-6">
        <div class="text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="margin-left:12%;">
            <p><b>Paket Berlangganan</b></p>
        </div>
    </div>
    <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
        <div class="nav nav-pills d-inline-flex justify-content-end mb-5" data-wow-delay="0.1s" style="margin-right:12%;">
            <a href="" class="text-dark mb-0">Lihat Semua</a>
        </div>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <a href=""><img class="img-fluid w-100" src="{{ url('landingpage/img/langganan-1.jpg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <a href=""><img class="img-fluid w-100" src="{{ url('landingpage/img/langganan-2.jpg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <a href=""><img class="img-fluid w-100" src="{{ url('landingpage/img/langganan-3.jpg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <a href=""><img class="img-fluid w-100" src="{{ url('landingpage/img/langganan-4.jpg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <a href=""><img class="img-fluid w-100" src="{{ url('landingpage/img/langganan-5.jpg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection