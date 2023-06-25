@extends('landingpage.index')
@section('content')
    <br><br><br><br>
    <div class="container-lg py-5">
        <div class="container">
            <div class="container">

                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a class="text-body" href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-body" href="{{ url('/keranjang') }}">Keranjang</a></li>
                        <li class="breadcrumb-item text-dark active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
            <br><br>
            <div class="custom-card">
                <div class="cardBody">
                    <div class="row">
                        <div class="col-3">Nama</div>
                        <div class="col-3">: {{ $namaUser }}</div>
                    </div>
                    <div class="row">
                        <div class="col-3">E-Book</div>
                        <div class="col-6">: {{ $pesan->buku->judul }}</div>
                    </div>
                    <div class="row">
                        @php
                            $diskon = $pesan->buku->diskon;
                            if($diskon == null || $diskon == 0){
                                $new_harga = '-';
                            }
                            else{
                                $new_harga =  number_format($diskon, 0, ',', '.').'%';
                            }
                        @endphp
                        <div class="col-3">Diskon</div>
                        <div class="col-3">: {{ $new_harga }}</div>
                    </div>
                    <div class="row">
                        <div class="col-3">Total</div>
                        <div class="col-3">: Rp. {{ number_format($grossAmounts, 0, ',', '.') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-3">Status</div>
                        <div class="col-3">: {{ $pesan->ket }}</div>
                    </div>
                    <button type="button" class="btn btn-primary my-3" id="pay-button">Bayar Sekarang</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                	
                	window.location.href = '/BookPedia/invoice/{{$pesan->id}}'

                    
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
@endsection
