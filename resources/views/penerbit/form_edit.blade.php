@extends('adminpage.index')
@section('content')
<h3>Form Update Penerbit</h3>
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
    <form method="POST" action="{{ route('penerbit.update', $row->id) }}" id="contactForm">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input class="form-control" name="nama" value="{{ $row->nama }}" id="nama" type="text" placeholder="Nama Penerbit" data-sb-validations="required" />
            <label for="nama">Nama Penerbit</label>
            <div class="invalid-feedback" data-sb-feedback="nama:required">Nama Penerbit is required.</div>
        </div>
        <button class="btn btn-primary" name="proses" value="ubah" id="ubah" type="submit">Ubah</button>
        <input type="hidden" name="id" value="{{ $row->id }}"/>
        <a href="{{ url('/penerbit') }}" class="btn btn-danger">Batal</a>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection