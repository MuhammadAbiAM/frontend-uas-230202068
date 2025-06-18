@extends('dashboard')

@section('content')
    <h2>Tambah Pasien</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pasien.store') }}" method="POST">
        @csrf
        <input type="text" name="nama" placeholder="Nama" class="form-control mb-2" required>
        <input type="text" name="alamat" placeholder="Alamat" class="form-control mb-2" required>
        <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control mb-2" required>
        <select name="jenis_kelamin" class="form-control mb-2" required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="L">L</option>
            <option value="P">P</option>
        </select>
        <div class="mt-3">
            <a href="{{ route('pasien.index') }}" class="btn btn-secondary me-2">← Kembali</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
@endsection
