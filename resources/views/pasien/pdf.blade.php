<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pasien as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p['nama'] }}</td>
                <td>{{ $p['alamat'] }}</td>
                <td>{{ $p['tanggal_lahir'] }}</td>
                <td>{{ $p['jenis_kelamin'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
