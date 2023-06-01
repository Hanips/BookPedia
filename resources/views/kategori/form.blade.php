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
            <h2>Form Kategori</h2>
            <form method="POST" action="{{ route('kategori.store') }}" id="contactForm">
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control" name="nama" value="" id="nama" type="text" placeholder="Nama Kategori" data-sb-validations="required" />
                    <label for="nama">Nama Kategori</label>
                    <div class="invalid-feedback" data-sb-feedback="kategori:required">Nama Kategori is required.</div>
                </div>
                <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
                <a href="{{ url('/kategori') }}" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</main>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection