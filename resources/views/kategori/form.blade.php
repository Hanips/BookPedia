@extends('adminpage.index')
@section('content')

@if (Auth::user()->role != 'Pelanggan')
    <main>
        <div class="container-fluid px-4">
            <div class="container px-5 my-5">
                <h2>Form Kategori</h2>
                <form method="POST" action="{{ route('kategori.store') }}" id="contactForm">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control @error ('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" id="nama" type="text" placeholder="Nama Kategori" data-sb-validations="required" />
                        <label for="nama">Nama Kategori</label>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
                    <a href="{{ url('/kategori') }}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@else
    @include('adminpage.access_denied')
@endif
@endsection