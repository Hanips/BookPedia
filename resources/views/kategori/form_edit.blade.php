@extends('adminpage.index')
@section('content')

@if (Auth::user()->role != 'Pelanggan')
    <div class="container px-5 my-5">
        <h3>Form Update Kategori</h3>
        <form method="POST" action="{{ route('kategori.update', $row->id) }}" id="contactForm">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input class="form-control @error ('nama') is-invalid @enderror" name="nama" value="{{ $row->nama }}" id="nama" type="text" placeholder="Nama Kategori" data-sb-validations="required" />
                <label for="nama">Nama Kategori</label>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <button class="btn btn-primary" name="proses" value="ubah" id="ubah" type="submit">Ubah</button>
            <input type="hidden" name="id" value="{{ $row->id }}"/>
            <a href="{{ url('/kategori') }}" class="btn btn-danger">Batal</a>
        </form>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@else
    @include('adminpage.access_denied')
@endif
@endsection