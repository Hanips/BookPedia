@extends('adminpage.index')
@section('content')
@if (Auth::user()->role != 'Pelanggan')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar Penerbit</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html" class="text-decoration-none text-dark">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Penerbit</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <a href="{{ route('penerbit.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Penerbit</th>
                                <th class="text-end">
                                    <div class="d-flex justify-content-end">
                                        Action
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Penerbit</th>
                                <th class="text-end">
                                    <div class="d-flex justify-content-end">
                                        Action
                                    </div>
                                </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($ar_penerbit as $penerbit)
                            <tr>
                                <th>{{ $no }}</th>
                                <td>{{ $penerbit->nama }}</td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end">
                                    <a class="btn btn-warning" href="{{ route('penerbit.edit', $penerbit->id) }}" title="Ubah">
                                        <i class="fa fa-edit"></i>
                                    </a>&nbsp;
                                    <form method="POST" action="{{ route('penerbit.destroy', $penerbit->id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" title="Hapus" name="proses" value="hapus" onclick="return confirm('Anda Yakin Data Dihapus?')">
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