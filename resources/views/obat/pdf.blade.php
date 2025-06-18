<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($obat as $o)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $o['nama_obat'] }}</td>
                <td>{{ $o['kategori'] }}</td>
                <td>{{ $o['stok'] }}</td>
                <td>{{ $o['harga'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
