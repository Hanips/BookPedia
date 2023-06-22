@extends('adminpage.index')
@section('content')

@if (Auth::user()->role != 'Pelanggan')
    <main>
        <div class="container-fluid px-4">
            <div class="container px-5 my-5">
                <h2>Form Update Pesanan</h2>
                <form method="POST" action="{{ route('pesanan.update', $row->id) }}" id="contactForm">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <select class="form-select @error ('pelanggan') is-invalid @enderror" name="pelanggan" aria-label="Pelanggan">
                            <option value="">-- Pilih Pelanggan --</option>
                            @foreach ($ar_pelanggan as $pelanggan)
                            @php
                                $sel = ($pelanggan->id == $row->user_id) ? 'selected' : '';
                            @endphp
                            <option value="{{ $pelanggan->id }}" {{ $sel }}>{{ $pelanggan->name }}</option>
                            @endforeach
                        </select>
                        <label for="pelanggan">Nama Pelanggan</label>
                        @error('pelanggan')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select @error ('buku') is-invalid @enderror" name="buku" aria-label="Buku">
                            <option value="">-- Pilih Buku --</option>
                            @foreach ($ar_buku as $buku)
                            @php
                                $sel = ($buku->id == $row->buku_id) ? 'selected' : '';
                            @endphp
                            <option value="{{ $buku->id }}" {{ $sel }}>{{ $buku->judul }}</option>
                            @endforeach
                        </select>
                        <label for="buku">E-Book</label>
                        @error('buku')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control @error ('ket') is-invalid @enderror" name="ket" value="{{ $row->ket }}" id="ket" type="text" placeholder="Keterangan" data-sb-validations="required" />
                        <label for="ket">Keterangan</label>
                        @error('ket')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" name="proses" value="ubah" id="ubah" type="submit">Ubah</button>
                    <input type="hidden" name="id" value="{{ $row->id }}"/>
                    <a href="{{ url('/pesanan') }}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@else
    @include('adminpage.access_denied')
@endif
@endsection