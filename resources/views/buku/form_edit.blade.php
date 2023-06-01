@extends('adminpage.index')
@section('content')
<h3>Form Update E-Book</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container px-5 my-5">
    <form method="POST" action="{{ route('buku.update', $row->id) }}" id="contactForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input class="form-control" name="kode" value="{{ $row->kode }}" id="kodeBuku" type="text" placeholder="Kode Buku" data-sb-validations="required" />
            <label for="kodeBuku">Kode Buku</label>
            <div class="invalid-feedback" data-sb-feedback="kodeBuku:required">Kode Buku is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="judul" value="{{ $row->judul }}" id="judul" type="text" placeholder="Judul" data-sb-validations="required" />
            <label for="judul">Judul</label>
            <div class="invalid-feedback" data-sb-feedback="judul:required">Judul is required.</div>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" name="kategori" aria-label="Kategori">
                <option value="">-- Pilih Kategori Buku --</option>
                @foreach ($ar_kategori as $k)
                @php
                    $sel = ($k->id == $row->kategori_id) ? 'selected' : '';
                @endphp
                <option value="{{ $k->id }}" {{ $sel }}>{{ $k->nama }}</option>
                @endforeach
            </select>
            <label for="kategori">Kategori</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" name="penerbit" aria-label="Penerbit">
                <option value="">-- Pilih Penerbit Buku --</option>
                @foreach ($ar_penerbit as $p)
                @php
                    $sel = ($p->id == $row->penerbit_id) ? 'selected' : '';
                @endphp
                <option value="{{ $p->id }}" {{ $sel }}>{{ $p->nama }}</option>
                @endforeach
            </select>
            <label for="penerbit">Penerbit</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="isbn" value="{{ $row->isbn }}" id="isbn" type="text" placeholder="ISBN" data-sb-validations="required" />
            <label for="isbn">ISBN</label>
            <div class="invalid-feedback" data-sb-feedback="isbn:required">ISBN is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="pengarang" value="{{ $row->pengarang }}" id="pengarang" type="text" placeholder="Pengarang" data-sb-validations="required" />
            <label for="pengarang">Pengarang</label>
            <div class="invalid-feedback" data-sb-feedback="pengarang:required">Pengarang is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="jumlah_halaman" value="{{ $row->jumlah_halaman }}" id="jumlah_halaman" type="number" placeholder="Jumlah Halaman" data-sb-validations="required" />
            <label for="jumlah_halaman">Jumlah Halaman</label>
            <div class="invalid-feedback" data-sb-feedback="jumlah_halaman:required">Jumlah halaman is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="sinopsis" value="{{ $row->sinopsis }}" id="sinopsis" type="text" placeholder="Sinopsis"/>
            <label for="sinopsis">Sinopsis</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="rating" value="{{ $row->rating }}" id="rating" type="number" placeholder="Rating"/>
            <label for="rating">Rating</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="harga" value="{{ $row->harga }}" id="harga" type="number" placeholder="Harga" data-sb-validations="required" />
            <label for="harga">Harga</label>
            <div class="invalid-feedback" data-sb-feedback="harga:required">Harga is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="foto" value="{{ $row->foto }}" id="foto" type="file" placeholder="Foto" />
            <label for="foto">Foto</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="url_buku" value="{{ $row->url_buku }}" id="url_buku" type="text" placeholder="Url Buku" data-sb-validations="required" />
            <label for="url_buku">URL Buku</label>
            <div class="invalid-feedback" data-sb-feedback="url_buku:required">URL buku is required.</div>
        </div>
        <button class="btn btn-primary" name="proses" value="ubah" id="ubah" type="submit">Ubah</button>
        <input type="hidden" name="id" value="{{ $row->id }}"/>
        <a href="{{ url('/buku') }}" class="btn btn-danger">Batal</a>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection