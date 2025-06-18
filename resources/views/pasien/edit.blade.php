@extends('dashboard')

@section('content')
    <h2>Edit Pasien</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pasien.update', $pasien['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nama" value="{{ $pasien['nama'] }}" class="form-control mb-2" required>
        <input type="text" name="alamat" value="{{ $pasien['alamat'] }}" class="form-control mb-2" required>
        <input type="date" name="tanggal_lahir" value="{{ $pasien['tanggal_lahir'] }}" class="form-control mb-2" required>
        <select name="jenis_kelamin" class="form-control mb-2" required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="L" {{ $pasien['jenis_kelamin'] === 'L' ? 'selected' : '' }}>L</option>
            <option value="P" {{ $pasien['jenis_kelamin'] === 'P' ? 'selected' : '' }}>P</option>
        </select>
        <div class="mt-3">
            <a href="{{ route('pasien.index') }}" class="btn btn-secondary me-2">← Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
