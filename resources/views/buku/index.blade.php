@extends('adminpage.index')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar E-Book</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active">Daftar E-Book</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Pengarang</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Pengarang</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
		                $no = 1;
                        @endphp
		                @foreach($ar_buku as $buku)
		                <tr>
		                	<th>{{ $no }}</th>
		                	<td>{{ $buku->judul }}</td>
		                	<td>{{ $buku->kategori }}</td>
		                	<td>{{ $buku->pengarang }}</td>
		                	<td>Rp. {{ number_format($buku->harga,0,',','.') }}</td>
		                	<td>
		                		<form method="POST" action="{{ route('buku.destroy', $buku->id) }}" style="display: inline;">
		                			@csrf
		                			@method('DELETE')
		                			<a class="btn btn-info btn-sm" href="{{ route('buku.show', $buku->id) }}" title="Detail">
		                				<i class="fa fa-eye"></i>
		                	    	</a>
		                			<a class="btn btn-warning btn-sm" href="{{ route('buku.edit', $buku->id) }}" title="Ubah">
		                				<i class="fa fa-edit"></i>
		                	    	</a>
		                			<button class="btn btn-danger btn-sm" type="submit" title="Hapus" name="proses" value="hapus" onclick="return confirm('Anda Yakin Data Dihapus?')">
		                				<i class="fa fa-trash"></i>
		                			</button>
		                			<input type="hidden" name="idx" value=""/>
		                		</form>
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
@endsection