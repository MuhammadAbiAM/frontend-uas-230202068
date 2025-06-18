@extends('dashboard')

@section('content')
    <h2>Edit Obat</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('obat.update', $obat['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nama_obat" value="{{ $obat['nama_obat'] }}" class="form-control mb-2" required>
        <input type="text" name="kategori" value="{{ $obat['kategori'] }}" class="form-control mb-2" required>
        <input type="number" name="stok" value="{{ $obat['stok'] }}" class="form-control mb-2" required>
        <input type="number" name="harga" value="{{ $obat['harga'] }}" class="form-control mb-2" required>
        <div class="mt-3">
            <a href="{{ route('obat.index') }}" class="btn btn-secondary me-2">← Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
