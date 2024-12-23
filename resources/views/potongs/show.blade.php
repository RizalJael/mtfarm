<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1 class="mb-4">Detail Pemotongan Ternak</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Informasi Pemotongan</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>Tanggal Pemotongan</th>
                        <td>{{ $potong->tgl->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <th>Kode Ternak</th>
                        <td>{{ $potong->kode }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Ternak</th>
                        <td>{{ $potong->populasi->jenis ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $potong->populasi->jkel ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Bobot</th>
                        <td>{{ $potong->bobot }} kg</td>
                    </tr>
                    <tr>
                        <th>Tujuan Pemotongan</th>
                        <td>{{ $potong->tujuan ?? 'N/A' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('potongs.edit', $potong) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('potongs.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
            <form action="{{ route('potongs.destroy', $potong) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </div>
    </div>
</body>

</html>
