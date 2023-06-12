@extends('adminpage.index')
@section('content')
@if (Auth::user()->role != 'Pelanggan')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar Pelanggan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}" class="text-decoration-none text-dark">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Pelanggan</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Email</th>
                                <th>Nomor HP</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Email</th>
                                <th>Nomor HP</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($ar_pelanggan as $pelanggan)
                            <tr>
                                <th>{{ $no }}</th>
                                <td>{{ $pelanggan->name }}</td>
                                <td>{{ $pelanggan->email }}</td>
                                <td>{{ $pelanggan->hp }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-info btn-sm me-1" href="{{ route('pelanggan.show', $pelanggan->id) }}" title="Detail">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm me-1" href="{{ route('pelanggan.edit', $pelanggan->id) }}" title="Ubah">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('pelanggan.destroy', $pelanggan->id) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit" title="Hapus" name="proses" value="hapus" onclick="return confirm('Anda Yakin Data Dihapus?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <input type="hidden" name="idx" value=""/>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @php $no++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@else
    @include('adminpage.access_denied')
@endif
@endsection