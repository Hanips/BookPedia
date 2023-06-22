@extends('adminpage.index')
@section('content')

@if (Auth::user()->role != 'Pelanggan')
    <main>
        <div class="container-fluid px-4">
            <div class="container px-5 my-5">
                <h2>Form Update User</h2>
                <form method="POST" action="{{ route('user.update', $row->id) }}" id="contactForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input class="form-control @error ('name') is-invalid @enderror" name="name" value="{{ $row->name }}" id="name" type="text" placeholder="Nama Pelanggan" data-sb-validations="required" />
                        <label for="name">Nama User</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control @error ('email') is-invalid @enderror" name="email" value="{{ $row->email }}" id="email" type="email" placeholder="Email" data-sb-validations="required" />
                        <label for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control @error ('password') is-invalid @enderror" name="password" value="{{ $row->password }}" id="password" type="password" placeholder="Password" disabled/>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select @error ('role') is-invalid @enderror" name="role" aria-label="Role">
                            <option value="">-- Pilih Role --</option>
                            @foreach ($enumOptions as $option)
                            @php
                                $sel = ($option == $row->role) ? 'selected' : '';
                            @endphp
                                <option value="{{ $option }}" {{ $sel }}>{{ $option }}</option>
                            @endforeach
                        </select>
                        <label for="role">Role</label>
                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>   
                    <div class="form-floating mb-3">
                        <input class="form-control @error ('hp') is-invalid @enderror" name="hp" value="{{ $row->hp }}" id="hp" type="number" placeholder="No HP" data-sb-validations="required" />
                        <label for="hp">No. HP</label>
                        @error('hp')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control @error ('foto') is-invalid @enderror" name="foto" value="{{ $row->foto }}" id="foto" type="file" placeholder="Foto" />
                        <label for="foto">Foto</label>
                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" name="proses" value="ubah" id="ubah" type="submit">Ubah</button>
                    <input type="hidden" name="id" value="{{ $row->id }}"/>
                    <input type="hidden" name="password" value="{{ $row->password }}"/>
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