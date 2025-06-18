@extends('dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2>Data Pasien</h2>
        <form action="{{ route('pasien.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-secondary">Cari</button>
        </form>
    </div>

    <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">+ Tambah Pasien</a>

    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $p)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p['nama'] }}</td>
                    <td>{{ $p['alamat'] }}</td>
                    <td>{{ $p['tanggal_lahir'] }}</td>
                    <td>{{ $p['jenis_kelamin'] }}</td>
                    <td>
                        <a href="{{ route('pasien.edit', $p['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pasien.destroy', $p['id']) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus pasien {{ $p['nama'] }}?')"
                                class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Tombol Export di bawah tabel --}}
    <div class="d-flex justify-content-end mt-2">
        <a href="{{ route('pasien.export.pdf') }}" class="btn btn-danger me-2">Export PDF</a>
        <a href="{{ route('pasien.export.excel') }}" class="btn btn-success">Export Excel</a>
    </div>
@endsection
