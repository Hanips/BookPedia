@extends('adminpage.index')
@section('content')
      
@if (Auth::user()->role != 'Pelanggan')
    <div class="container px-5 my-5">
        <h2>Form Update Penerbit</h2>
        <form method="POST" action="{{ route('penerbit.update', $row->id) }}" id="contactForm">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input class="form-control @error ('nama') is-invalid @enderror" name="nama" value="{{ $row->nama }}" id="nama" type="text" placeholder="Nama Penerbit" data-sb-validations="required" />
                <label for="nama">Nama Penerbit</label>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <button class="btn btn-primary" name="proses" value="ubah" id="ubah" type="submit">Ubah</button>
            <input type="hidden" name="id" value="{{ $row->id }}"/>
            <a href="{{ url('/penerbit') }}" class="btn btn-danger">Batal</a>
        </form>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@else
    @include('adminpage.access_denied')
@endif
@endsection