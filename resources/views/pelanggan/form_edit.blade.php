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
            <h2>Form Update Pelanggan</h2>
            <form method="POST" action="{{ route('pelanggan.update', $row->id) }}" id="contactForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <input class="form-control" name="nama" value="{{ $row->nama }}" id="nama" type="text" placeholder="Nama Pelanggan" data-sb-validations="required" />
                    <label for="nama">Pelanggan</label>
                    <div class="invalid-feedback" data-sb-feedback="nama:required">Nama pelanggan is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="email" value="{{ $row->email }}" id="email" type="email" placeholder="Email" data-sb-validations="required" />
                    <label for="email">Email</label>
                    <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="password" value="{{ $row->password }}" id="password" type="password" placeholder="Password" disabled/>
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="hp" value="{{ $row->hp }}" id="hp" type="number" placeholder="No HP" data-sb-validations="required" />
                    <label for="hp">No. HP</label>
                    <div class="invalid-feedback" data-sb-feedback="hp:required">No. HP is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="foto" value="{{ $row->foto }}" id="foto" type="file" placeholder="Foto" />
                    <label for="foto">Foto</label>
                </div>
                <button class="btn btn-primary" name="proses" value="ubah" id="ubah" type="submit">Ubah</button>
                <input type="hidden" name="id" value="{{ $row->id }}"/>
                <input type="hidden" name="password" value="{{ $row->password }}"/>
                <a href="{{ url('/pelanggan') }}" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</main>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection