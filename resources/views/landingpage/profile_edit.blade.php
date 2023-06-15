@extends('landingpage.index')
@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <!-- Bagian header lainnya... -->
</div><br/>
<!-- Page Header End -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (!empty(Auth::user()))
    <main>
        <div class="container-fluid px-4">
            <div class="container px-5 my-5">
                <h2>Ubah Profil</h2>
                <form method="POST" action="{{ route('user.update', $row->id) }}" id="contactForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input class="form-control" name="name" value="{{ $row->name }}" id="name" type="text" placeholder="Nama Pelanggan" data-sb-validations="required" style="border-radius: 10px;" />
                        <label for="name">Nama User</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Nama user is required.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="email" value="{{ $row->email }}" id="email" type="email" placeholder="Email" data-sb-validations="required" style="border-radius: 10px;" />
                        <label for="email">Email</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="password" value="{{ $row->password }}" id="password" type="password" placeholder="Password" style="border-radius: 10px;" />
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="hp" value="{{ $row->hp }}" id="hp" type="number" placeholder="No HP" data-sb-validations="required" style="border-radius: 10px;" />
                        <label for="hp">No. HP</label>
                        <div class="invalid-feedback" data-sb-feedback="hp:required">No. HP is required.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="foto" value="{{ $row->foto }}" id="foto" type="file" placeholder="Foto" style="border-radius: 10px;" />
                        <label for="foto">Foto</label>
                    </div>
                    <button class="btn btn-primary rounded-pill-custom" name="proses" value="ubah" id="ubah" type="submit">Ubah</button>
                    <input type="hidden" name="id" value="{{ $row->id }}"/>
                    <input type="hidden" name="role" value="{{ $row->role }}"/>
                    <a href="{{ url('/profile') }}" class="btn btn-danger rounded-pill-custom">Batal</a>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@else
    @include('adminpage.access_denied')
@endif
@endsection