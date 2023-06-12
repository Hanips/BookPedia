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
@if (Auth::user()->role != 'Pelanggan')
    <main>
        <div class="container-fluid px-4">
            <div class="container px-5 my-5">
                <h2>Form User</h2>
                <form method="POST" action="{{ route('user.store') }}" id="contactForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" name="name" value="" id="name" type="text" placeholder="Nama User" data-sb-validations="required" />
                        <label for="name">Nama User</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Nama user is required.</div>
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
                        <select class="form-select" name="role" aria-label="Role">
                            <option value="">-- Pilih Role --</option>
                            @foreach ($enumOptions as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        <label for="role">Role</label>
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
                    <a href="{{ url('/user') }}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@else
    @include('adminpage.access_denied')
@endif
@endsection