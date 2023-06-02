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
            <h2>Form Pelanggan</h2>
            <form method="POST" action="{{ route('pelanggan.store') }}" id="contactForm" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control" name="nama" value="" id="nama" type="text" placeholder="Nama Pelanggan" data-sb-validations="required" />
                    <label for="nama">Pelanggan</label>
                    <div class="invalid-feedback" data-sb-feedback="nama:required">Nama pelanggan is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="email" value="" id="email" type="email" placeholder="Email" data-sb-validations="required" />
                    <label for="email">Email</label>
                    <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="password" value="" id="password" type="password" placeholder="Password" data-sb-validations="required" />
                    <label for="password">Password</label>
                    <div class="invalid-feedback" data-sb-feedback="password:required">Password is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="hp" value="" id="hp" type="number" placeholder="No HP" data-sb-validations="required" />
                    <label for="hp">No. HP</label>
                    <div class="invalid-feedback" data-sb-feedback="hp:required">No. HP is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="foto" value="" id="foto" type="file" placeholder="Foto" />
                    <label for="foto">Foto</label>
                </div>
                <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
                <a href="{{ url('/pelanggan') }}" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</main>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection