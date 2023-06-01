@extends('adminpage.index')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="col-xl-12">
                <div class="card mb-4">
                  <div class="card-body text-bg-light text-left">
                    <div class="row">
                        <div class="col-md-1 d-flex justify-content-end align-items-center">
                            <i class='fa fa-credit-card'></i>
                        </div>      
                        <div class="col-md-3">
                            <h5 class="card-title">Total Income</h5>
                            <p class="card-text">=>Data sum harga dari tabel pembayaran</p>
                        </div>
                        <div class="col-md-1 d-flex justify-content-end align-items-center">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <div class="col-md-3">
                            <h5 class="card-title">Buku Terjual</h5>
                            <p class="card-text">=>Data total dari tabel pembayaran</p>
                        </div>
                        <div class="col-md-1 d-flex justify-content-end align-items-center">
                            <i class='fa fa-user'></i>
                        </div>
                        <div class="col-md-3">
                            <h5 class="card-title">Total Pelanggan</h5>
                            <p class="card-text">=>Data total dari tabel pelanggan</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Income
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Buku Terjual
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection