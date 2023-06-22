@extends('adminpage.index')
@section('content')

@if (Auth::user()->role != 'Pelanggan')
    <main>
        <div class="container-fluid px-4">
            <div class="container px-5 my-5">
                <h2>Form Pelanggan</h2>
                <form method="POST" action="{{ route('pelanggan.store') }}" id="contactForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control @error ('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name" type="text" placeholder="Nama Pelanggan" data-sb-validations="required" />
                        <label for="name">Pelanggan</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control @error ('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" type="email" placeholder="Email" data-sb-validations="required" />
                        <label for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control @error ('password') is-invalid @enderror" name="password" value="{{ old('password') }}" id="password" type="password" placeholder="Password" data-sb-validations="required" />
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control @error ('hp') is-invalid @enderror" name="hp" value="{{ old('hp') }}" id="hp" type="number" placeholder="No HP" data-sb-validations="required" />
                        <label for="hp">No. HP</label>
                        @error('hp')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control @error ('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" id="foto" type="file" placeholder="Foto" />
                        <label for="foto">Foto</label>
                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
                    <a href="{{ url('/pelanggan') }}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@else
    @include('adminpage.access_denied')
@endif
@endsection