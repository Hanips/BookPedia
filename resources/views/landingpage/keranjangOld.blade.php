@extends('landingpage.index')
@section('content')
<br><br><br><br>
<div class="container-lg py-5">
    <div class="container">
        <div class="container">
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Keranjang</li>
                </ol>
            </nav>
        </div>
        <br><br>
        <div class="custom-card">
            <div class="cardBody">
                <div class="table-responsive" >
                    <table id="keranjang" class="table-hover table condensed">
                        <thead>
                            <tr>
                                <th style="width:5%" data-th="checkbox">
                                    
                                </th>
                                <th style="width:15%; font-size: 18px;" data-th="item">Item</th>
                                <th style="width:22%; font-size: 18px;" data-th="e-book">E-book</th>
                                <th style="width:10%; font-size: 18px;" data-th="harga">Harga</th>
                                <th style="width:5%; font-size: 18px;" data-th="diskon">Diskon</th>
                                <th style="width:10%; font-size: 18px;" data-th="total">&nbsp;&nbsp;&nbsp;Total</th>
                                <th style="width:8%; text-align: center;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            @if(isset($keranjang) && $keranjang->count() > 0)
                                @foreach($keranjang as $detail)
                                    <?php
                                        $subtotal = $detail->buku_harga - ($detail->buku_harga * $detail->buku_diskon / 100);
                                        $formattedHarga = number_format($detail->buku_harga, 0, ',', '.');
                                        $formattedSubtotal = number_format($subtotal, 0, ',', '.');
                                    ?>
                                    <tr data-id="{{ $detail->id }}">
                                        <td data-th="checkbox"><br><br><br>
                                            <input type="checkbox" class="form-check-input checkbox-item">
                                        </td>
                                        <td data-th="item">
                                            <div class="row">
                                                <div class="col-sm-3 hidden-xs"><br>
                                                    <img src="{{ asset('landingpage/img') }}/{{ $detail->buku_foto }}" width="100" height="135">
                                                </div>
                                            </div><br>
                                        </td>
                                        <td data-th="e-book">
                                            <div class="row">
                                                <div class="col-sm-3 hidden-xs"><br><br><br>
                                                    <p style="white-space: nowrap; word-wrap: break-word;">{{ $detail->buku_judul }}</p>
                                                </div>
                                            </div><br>
                                        </td>
                                        <td data-th="harga"><br><br><br>Rp{{ $formattedHarga }}</td>
                                        @if ($detail->buku_diskon > 0)
                                            <td data-th="diskon" style="text-align: center"><br><br><br>{{ intval($detail->buku_diskon) }}%</td>
                                        @else
                                            <td data-th="diskon" style="text-align: center"><br><br><br>-</td>
                                        @endif
                                        <td data-th="total"><br><br><br>Rp {{ $formattedSubtotal }}</td>
                                        <td><br><br><br>
                                            <form method="POST" action="{{ route('pesanan.destroy', $detail->id) }}" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm" type="submit" title="Hapus" name="proses" value="hapus" style="background-color: transparent;">
                                                    <i class="fa fa-trash fs-4" style="color: #d10000;"></i>
                                                </button>

                                                <input type="hidden" name="idx" value=""/>
                                            </form>
                                        </td>
                                    </tr><br>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center"><br>Keranjang Anda kosong!<br><br></td>
                                </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="text-right"><br>
                                    <h3><strong>Total Rp <span id="total">{{ number_format($total, 0, ',', '.') }}</span></strong></h3>
                                </td>
                                <td></td>
                            </tr>                            
                            <tr>
                            <td colspan="7" class="text-right">
                                <div class="button-container">
                                    <a href="{{ url('/ebook') }}" class="btn btn-danger">
                                        <i class="fa fa-arrow-left"></i>
                                          &nbsp;Lanjutkan Belanja
                                    </a>
                                    <form action="{{ route('checkout') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="pesanan_ids[]" value="">
                                        <input type="hidden" name="gross_amounts[]" value="">
                                        <input type="hidden" name="nama" value="{{ Auth::user()->name }}">
                                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                        <input type="hidden" name="phone" value="{{ Auth::user()->hp }}">
                                        <button type="submit" class="btn btn-success">
                                             <i class="fa fa-credit-card"></i>    
                                              &nbsp;Checkout
                                        </button>
                                    </form>
                                </div>
                            </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Function to calculate the total
    function calculateTotal() {
        var checkboxes = document.querySelectorAll('tbody input.checkbox-item');
        var totalElement = document.getElementById('total');
        var total = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                var row = checkboxes[i].closest('tr');
                var subtotal = row.querySelector('td[data-th="total"]').innerText;
                subtotal = subtotal.replace('Rp', '').replace('.', '').replace(',', '').trim();
                total += parseInt(subtotal);
            }
        }

        totalElement.innerText = formatNumber(total);
    }

    // Function to format the number with commas as thousands separator
    function formatNumber(number) {
        return new Intl.NumberFormat('id-ID').format(number);
    }

    // Event listener for checkbox items
    var checkboxItems = document.querySelectorAll('tbody input.checkbox-item');
    for (var i = 0; i < checkboxItems.length; i++) {
        checkboxItems[i].addEventListener('change', calculateTotal);
    }

    // Calculate total when the page loads
    calculateTotal();
</script>

@endsection