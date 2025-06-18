@extends('dashboard')

@section('content')
    <h2>Data Obat</h2>
    <a href="{{ route('obat.create') }}" class="btn btn-primary mb-3">+ Tambah Obat</a>
    <form action="{{ route('obat.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" class="form-control d-inline w-25" placeholder="Cari..."
            value="{{ request('search') }}">
        <button type="submit" class="btn btn-secondary">Cari</button>
    </form>


    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama Obat</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obat as $o)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $o['nama_obat'] }}</td>
                    <td>{{ $o['kategori'] }}</td>
                    <td>{{ $o['stok'] }}</td>
                    <td>{{ $o['harga'] }}</td>
                    <td>
                        <a href="{{ route('obat.edit', $o['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('obat.destroy', $o['id']) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus obat {{ $o['nama_obat'] }}?')"
                                class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
