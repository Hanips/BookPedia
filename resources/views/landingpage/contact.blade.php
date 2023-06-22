@extends('landingpage.index')
@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Tim Kami</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Tim Kami</li>
            </ol>
        </nav>
    </div>
</div><br/>
<!-- Page Header End -->

<!-- tim kami Start -->
<div class="container-fluid bg-light">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Tim Kami</h1>
            <p>"Menjelajahi Dunia Literasi Bersama Tim Bookpedia."</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item position-relative bg-white p-5 mt-4" style="border-radius: 10px;">
                <div class="d-flex align-items-center">
                    <img class="img-fluid rounded-circle" src="{{ asset('landingpage/img/1.jpg') }}" alt="" style="width: 330px; height: 270px;">
                    <br/>
                    <div class="ms-3">
                        <h5>Hanief Widya Wardhana</h5>
                        <span>Universitas Negeri Semarang</span><br>
                        <span>Project Manager</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item position-relative bg-white p-5 mt-4" style="border-radius: 10px;"> 
                <div class="d-flex align-items-center">
                    <img class="img-fluid rounded-circle" src="{{ asset('landingpage/img/4.jpg') }}" alt="" style="width: 330px; height: 270px;">
                    <br/>
                    <div class="ms-3">
                        <h5 class="mb-1">Silpa Ishari Pasaribu</h5>
                        <span>Universitas Malikussaleh</span><br>
                        <span>UI/UX</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item position-relative bg-white p-5 mt-4" style="border-radius: 10px;">
                <div class="d-flex align-items-center">
                    <img class="img-fluid rounded-circle" src="{{ asset('landingpage/img/5.jpg') }}" alt="" style="width: 330px; height: 270px;">
                    <br/>
                    <div class="ms-3">
                        <h5 class="mb-1">Rico Priyono</h5>
                        <span>Universitas Amikom Purwokerto</span><br>
                        <span>Front End</span>
                    </div> 
                </div>
            </div>
            <div class="testimonial-item position-relative bg-white p-5 mt-4" style="border-radius: 10px;">
                <div class="d-flex align-items-center">
                    <img class="img-fluid rounded-circle" src="{{ asset('landingpage/img/3.jpg') }}" alt="" style="width: 330px; height: 270px;">
                    <br/>
                    <div class="ms-3">
                        <h5 class="mb-1">Firman Dwi Prabudi</h5>
                        <span>Universitas Syiah Kuala</span><br>
                        <span>Back End</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item position-relative bg-white p-5 mt-4" style="border-radius: 10px;">
                <div class="d-flex align-items-center">
                    <img class="img-fluid rounded-circle" src="{{ asset('landingpage/img/2.jpg') }}" alt="" style="width: 330px; height: 270px;">
                    <br/>
                    <div class="ms-3">
                        <h5 class="mb-1">Aminullah</h5>
                        <span>Universitas Nurul Jadid <br> Paiton Probolinggo</span><br>
                        <span>Laporan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tim kami End -->

<!-- Contact Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <br/>
            <h1 class="display-5 mb-3">Kontak Kami</h1>
            <p>Silakan hubungi kami melalui formulir atau rincian kontak di bawah ini. Tim kami siap membantu dengan pertanyaan, umpan balik, atau permintaan apa pun.</p>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-5 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-primary text-white d-flex flex-column justify-content-center h-100 p-5">
                    <h5 class="text-white">Hubungi Kami</h5>
                    <p class="mb-5"><i class="fa fa-phone-alt me-3"></i>+62 345 67890</p>
                    <h5 class="text-white">Email</h5>
                    <p class="mb-5"><i class="fa fa-envelope me-3"></i>bookpedia@gmail.com</p>
                    <h5 class="text-white">Alamat</h5>
                    <p class="mb-5"><i class="fa fa-map-marker-alt me-3"></i>Jl. Merdeka, Jakarta Pusat, Indonesia</p>
                    <h5 class="text-white">Sosial Media</h5>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Your Name">
                                <label for="name">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Your Email">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="subject" placeholder="Subject">
                                <label for="subject">Subjek</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 200px"></textarea>
                                <label for="message">Pesan</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ url('/contact') }}" >Kirim</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->


<!-- Google Map Start -->
<div class="container-xxl px-0 wow fadeIn" data-wow-delay="0.1s" style="margin-bottom: -6px;">
    <iframe class="w-100" style="height: 450px;"
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.243873185945!2d106.84112207099535!3d-6.362475348132779!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed3257f00039%3A0xb3f37a514c886f2d!2sNF%20COMPUTER!5e0!3m2!1sid!2sid!4v1685419161154!5m2!1sid!2sid"
    frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<!-- Google Map End -->

@endsection
