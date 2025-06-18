@extends('dashboard')

@section('content')
    <h2>Tambah Obat</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('obat.store') }}" method="POST">
        @csrf
        <input type="text" name="nama_obat" placeholder="Nama Obat" class="form-control mb-2" required>
        <input type="text" name="kategori" placeholder="Kategori" class="form-control mb-2" required>
        <input type="number" name="stok" placeholder="Stok" class="form-control mb-2" required>
        <input type="number" name="harga" placeholder="Harga" class="form-control mb-2" required>
        <div class="mt-3">
            <a href="{{ route('obat.index') }}" class="btn btn-secondary me-2">← Kembali</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
@endsection
