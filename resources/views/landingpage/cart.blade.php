@extends('landingpage.index')
@section('content')
    <br><br><br><br><br><br>
<div class="custom-card">
<div class="cardBody">
    <div class="table-responsive">
        <table id="keranjang" class="table-hover table condensed">
            <thead>
                <tr>
                    <th style="width:5%"></th>
                    <th style="width:20%">Item</th>
                    <th style="width:20%">E-book</th>
                    <th style="width:15%">Harga</th>
                    <th style="width:15%">Diskon</th>
                    <th style="width:15%">Total</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                @if(isset($keranjang) && $keranjang->count() > 0)
                    @foreach($keranjang as $detail)
                        <?php
                            $subtotal = $detail->harga;
                            $formattedHarga = number_format($detail->harga, 0, ',', '.');
                            $formattedSubtotal = number_format($subtotal, 0, ',', '.');
                            $total += $subtotal;
                        ?>
                        <tr data-id="{{ $detail->id }}">
                            <td data-th="checkbox">
                                <input type="checkbox" class="form-check-input">
                            </td>
                            <td data-th="item">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs">
                                        <img src="{{ asset('landingpage/img') }}/{{ $detail->foto }}" width="150" height="200">
                                    </div>
                                </div>
                            </td>
                            <td data-th="e-book">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs">
                                        <h5 class="nomargin">{{ $detail->buku_judul }}</h5>
                                    </div>
                                </div>
                            </td>
                            <td data-th="harga">Rp{{ $formattedHarga }}</td>
                            <td data-th="diskon">{{ $detail->diskon }}</td>
                            <td data-th="total">Rp{{ $formattedSubtotal }}</td>
                            <td class="action" data-th="">
                                <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg fs-3"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center">Keranjang Anda kosong.</td>
                    </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-right">
                        <h3><strong>Total Rp{{ number_format($total, 0, ',', '.') }}</strong></h3>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="7" class="text-right">
                        <a href="{{ url('/') }}" class="btn btn-danger">
                            <i class="fa fa-arrow-left"></i>
                            Lanjutkan Belanja
                        </a>
                        <a href="#" class="btn btn-success">
                            <i class="fa fa-money"></i>
                            Checkout
                        </a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
</div>
@endsection
