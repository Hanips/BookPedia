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
            <h2>Form E-Book</h2>
            <form method="POST" action="{{ route('buku.store') }}" id="contactForm" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control" name="kode" value="" id="kodeBuku" type="text" placeholder="Kode Buku" data-sb-validations="required" />
                    <label for="kodeBuku">Kode Buku</label>
                    <div class="invalid-feedback" data-sb-feedback="kodeBuku:required">Kode Buku is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="judul" value="" id="judul" type="text" placeholder="Judul" data-sb-validations="required" />
                    <label for="judul">Judul</label>
                    <div class="invalid-feedback" data-sb-feedback="judul:required">Judul is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="kategori" aria-label="Kategori">
                        <option value="">-- Pilih Kategori Buku --</option>
                        @foreach ($ar_kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                    <label for="kategori">Kategori</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="penerbit" aria-label="Penerbit">
                        <option value="">-- Pilih Penerbit Buku --</option>
                        @foreach ($ar_penerbit as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                    <label for="penerbit">Penerbit</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="isbn" value="" id="isbn" type="number" placeholder="Judul" data-sb-validations="required" />
                    <label for="isbn">ISBN</label>
                    <div class="invalid-feedback" data-sb-feedback="isbn:required">ISBN is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="pengarang" value="" id="pengarang" type="text" placeholder="Pengarang" data-sb-validations="required" />
                    <label for="pengarang">Pengarang</label>
                    <div class="invalid-feedback" data-sb-feedback="pengarang:required">Pengarang is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="jumlah_halaman" value="" id="jumlah_halaman" type="number" placeholder="Jumlah Halaman" data-sb-validations="required" />
                    <label for="jumlah_halaman">Jumlah Halaman</label>
                    <div class="invalid-feedback" data-sb-feedback="jumlah_halaman:required">Jumlah halaman is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="sinopsis" value="" id="sinopsis" type="text" placeholder="Sinopsis"/>
                    <label for="sinopsis">Sinopsis</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="rating" value="" id="rating" type="double" placeholder="Rating" data-sb-validations="required|max:5" max="5"/>
                    <label for="rating">Rating</label>
                    <div class="invalid-feedback" data-sb-feedback="rating:required">Rating is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="harga" value="" id="harga" type="number" placeholder="Harga" data-sb-validations="required" />
                    <label for="harga">Harga</label>
                    <div class="invalid-feedback" data-sb-feedback="harga:required">Harga is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="diskon" value="" id="diskon" type="number" placeholder="Diskon" />
                    <label for="diskon">Diskon</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="foto" value="" id="foto" type="file" placeholder="foto" />
                    <label for="foto">Foto</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="url_buku" value="" id="url_buku" type="text" placeholder="Url Buku" data-sb-validations="required" />
                    <label for="url_buku">URL Buku</label>
                    <div class="invalid-feedback" data-sb-feedback="url_buku:required">URL buku is required.</div>
                </div>
                <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
                <a href="{{ url('/buku') }}" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</main>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection