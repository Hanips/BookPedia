@extends('adminpage.index')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<main>
    <div class="container-fluid px-4">
        <div class="container px-5 my-5">
            <h2>Form Pesanan</h2>
            <form method="POST" action="{{ route('pesanan.store') }}" id="contactForm">
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control" name="kode" value="" id="kode" type="text" placeholder="Kode Pesanan" data-sb-validations="required" />
                    <label for="kode">Kode Pesanan</label>
                    <div class="invalid-feedback" data-sb-feedback="kode:required">Kode Pesanan is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="pelanggan" aria-label="pelanggan">
                        <option value="">-- Pilih Pelanggan --</option>
                        @foreach ($ar_pelanggan as $pelanggan)
                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                        @endforeach
                    </select>
                    <label for="pelanggan">Nama Pelanggan</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="buku" aria-label="Buku">
                        <option value="">-- Pilih E-Book --</option>
                        @foreach ($ar_buku as $buku)
                        <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                        @endforeach
                    </select>
                    <label for="buku">E-Book</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="ket" value="" id="ket" type="text" placeholder="Keterangan" data-sb-validations="required" />
                    <label for="ket">Keterangan</label>
                    <div class="invalid-feedback" data-sb-feedback="ket:required">Keterangan is required.</div>
                </div>
                <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
                <a href="{{ url('/pesanan') }}" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</main>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection