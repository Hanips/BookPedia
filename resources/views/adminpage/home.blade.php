@extends('adminpage.index')
@section('content')
@if (Auth::user()->role != 'Pelanggan')
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
                            <p class="card-title">Total Income</p>
                            <h4 class="card-text">Rp. 
                                @if ($totalIncome > 10000000 && $totalIncome < 1000000000)
                                    {{ number_format($totalIncome / 1000000, 1) }} jt
                                @elseif ($totalIncome > 1000000000)
                                    {{ number_format($totalIncome / 1000000000, 1) }} M
                                @else
                                    {{ number_format($totalIncome, 0, ',', '.') }}
                                @endif
                            </h4>
                        </div>
                        <div class="col-md-1 d-flex justify-content-end align-items-center">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <div class="col-md-3">
                            <p class="card-title">Buku Terjual</p>
                            <h4 class="card-text">{{ $totalBukuTerjual }}</h4>
                        </div>
                        <div class="col-md-1 d-flex justify-content-end align-items-center">
                            <i class='fa fa-user'></i>
                        </div>
                        <div class="col-md-3">
                            <p class="card-title">Total Pelanggan</p>
                            <h4 class="card-text">{{ $totalPelanggan }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Income Bulanan
                        </div>
                        <div class="card-body"><canvas id="barChartIncome" width="100%" height="40"></canvas></div>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                var currentMonth = new Date().getMonth() + 1;
                                var bulanLabels = [];
                            
                                for (var i = currentMonth - 5; i <= currentMonth; i++) {
                                    var month = i <= 0 ? i + 12 : i;
                                    var dateObj = new Date(2000, month - 1, 1);
                                    var monthName = dateObj.toLocaleDateString('id-ID', { month: 'long' });
                                    bulanLabels.push(monthName);
                                }
                            
                                var stk = [@foreach($bulanIncome as $income) {{ $income->income }}, @endforeach];
                                while (stk.length < 6) {
                                    stk.unshift(0);
                                }
                          
                                new Chart(document.querySelector('#barChartIncome'), {
                                    type: 'bar',
                                    data: {
                                        labels: bulanLabels,
                                        datasets: [{
                                            label: 'Grafik Income Bulanan',
                                            data: stk,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 159, 64, 0.2)',
                                                'rgba(255, 205, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(201, 203, 207, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(255, 159, 64)',
                                                'rgb(255, 205, 86)',
                                                'rgb(75, 192, 192)',
                                                'rgb(54, 162, 235)',
                                                'rgb(153, 102, 255)',
                                                'rgb(201, 203, 207)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Buku Terjual Setiap Bulan
                        </div>
                        <div class="card-body"><canvas id="barChartTerjual" width="100%" height="40"></canvas></div>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                var currentMonth = new Date().getMonth() + 1;
                                var bulanLabels = [];
                        
                                for (var i = currentMonth - 5; i <= currentMonth; i++) {
                                    var month = i <= 0 ? i + 12 : i;
                                    var dateObj = new Date(2000, month - 1, 1);
                                    var monthName = dateObj.toLocaleDateString('id-ID', { month: 'long' });
                                    bulanLabels.push(monthName);
                                }
                        
                                var stk = [@foreach($bulanTerjual as $terjual) {{ $terjual->terjual }}, @endforeach];
                                while (stk.length < 6) {
                                    stk.unshift(0);
                                }
                        
                                new Chart(document.querySelector('#barChartTerjual'), {
                                    type: 'bar',
                                    data: {
                                        labels: bulanLabels,
                                        datasets: [{
                                            label: 'Grafik Buku Terjual',
                                            data: stk,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 159, 64, 0.2)',
                                                'rgba(255, 205, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(201, 203, 207, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(255, 159, 64)',
                                                'rgb(255, 205, 86)',
                                                'rgb(75, 192, 192)',
                                                'rgb(54, 162, 235)',
                                                'rgb(153, 102, 255)',
                                                'rgb(201, 203, 207)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                ticks: {
                                                    stepSize: 1,
                                                    precision: 0
                                                }
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </main>
@else
    @include('adminpage.access_denied') 
@endif
@endsection