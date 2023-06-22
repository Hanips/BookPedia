@extends('adminpage.index')
@section('content')

@if (Auth::user()->role != 'Pelanggan')
    <div class="container px-5 my-5">
        <h2>Form Update E-Book</h2>
        <form method="POST" action="{{ route('buku.update', $row->id) }}" id="contactForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input class="form-control @error('kode') is-invalid @enderror" name="kode" value="{{ $row->kode }}" 
                id="kodeBuku" type="text" placeholder="Kode Buku" data-sb-validations="required" />
                <label for="kodeBuku">Kode Buku</label>
                @error('kode')
                    <div id="validationServerKodeFeedback" class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ $row->judul }}" 
                id="judul" type="text" placeholder="Judul" data-sb-validations="required" />
                <label for="judul">Judul</label>
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <select class="form-select @error('kategori') is-invalid @enderror" name="kategori" aria-label="Kategori">
                    <option value="">-- Pilih Kategori Buku --</option>
                    @foreach ($ar_kategori as $k)
                    @php
                        $sel = ($k->id == $row->kategori_id) ? 'selected' : '';
                    @endphp
                    <option value="{{ $k->id }}" {{ $sel }}>{{ $k->nama }}</option>
                    @endforeach
                </select>
                <label for="kategori">Kategori</label>
                @error('kategori')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <select class="form-select @error('penerbit') is-invalid @enderror" name="penerbit" aria-label="Penerbit">
                    <option value="">-- Pilih Penerbit Buku --</option>
                    @foreach ($ar_penerbit as $p)
                    @php
                        $sel = ($p->id == $row->penerbit_id) ? 'selected' : '';
                    @endphp
                    <option value="{{ $p->id }}" {{ $sel }}>{{ $p->nama }}</option>
                    @endforeach
                </select>
                <label for="penerbit">Penerbit</label>
                @error('penerbit')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input class="form-control @error ('isbn') is-invalid @enderror" name="isbn" value="{{ $row->isbn }}" id="isbn" type="text" placeholder="ISBN" data-sb-validations="required" />
                <label for="isbn">ISBN</label>
                @error('isbn')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input class="form-control @error ('pengarang') is-invalid @enderror" name="pengarang" value="{{ $row->pengarang }}" id="pengarang" type="text" placeholder="Pengarang" data-sb-validations="required" />
                <label for="pengarang">Pengarang</label>
                @error('pengarang')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input class="form-control @error ('jumlah_halaman') is-invalid @enderror" name="jumlah_halaman" value="{{ $row->jumlah_halaman }}" id="jumlah_halaman" type="number" placeholder="Jumlah Halaman" data-sb-validations="required" />
                <label for="jumlah_halaman">Jumlah Halaman</label>
                @error('jumlah_halaman')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input class="form-control @error ('sinopsis') is-invalid @enderror" name="sinopsis" value="{{ $row->sinopsis }}" id="sinopsis" type="text" placeholder="Sinopsis"/>
                <label for="sinopsis">Sinopsis</label>
                @error('sinopsis')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input class="form-control @error ('rating') is-invalid @enderror" name="rating" value="{{ $row->rating }}" id="rating" type="double" placeholder="Rating"/>
                <label for="rating">Rating</label>
                @error('rating')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input class="form-control @error ('harga') is-invalid @enderror" name="harga" value="{{ $row->harga }}" id="harga" type="number" placeholder="Harga" data-sb-validations="required" />
                <label for="harga">Harga</label>
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input class="form-control @error ('diskon') is-invalid @enderror" name="diskon" value="{{ $row->diskon }}" id="diskon" type="number" placeholder="Diskon" />
                <label for="diskon">Diskon</label>
                @error('diskon')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input class="form-control @error ('foto') is-invalid @enderror" name="foto" value="{{ $row->foto }}" id="foto" type="file" placeholder="Foto" />
                <label for="foto">Foto</label>
                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input class="form-control @error ('url_buku') is-invalid @enderror" name="url_buku" value="{{ $row->url_buku }}" id="url_buku" type="text" placeholder="Url Buku" data-sb-validations="required" />
                <label for="url_buku">URL Buku</label>
                @error('url_buku')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <button class="btn btn-primary" name="proses" value="ubah" id="ubah" type="submit">Ubah</button>
            <input type="hidden" name="id" value="{{ $row->id }}"/>
            <a href="{{ url('/buku') }}" class="btn btn-danger">Batal</a>
        </form>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@else
    @include('adminpage.access_denied')
@endif
@endsection