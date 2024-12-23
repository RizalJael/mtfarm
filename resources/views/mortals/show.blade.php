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
        <h1 class="mb-4">Detail Kematian Ternak</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Informasi Kematian</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>Tanggal Kematian:</th>
                        <td>{{ $mortal->tgl->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <th>Kode Ternak:</th>
                        <td>{{ $mortal->kode }}</td>
                    </tr>
                    <tr>
                        <th>Penyebab Kematian:</th>
                        <td>{{ $mortal->penyebab }}</td>
                    </tr>
                </table>
            </div>
        </div>

        @if ($mortal->populasi)
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Informasi Ternak</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Jenis:</th>
                            <td>{{ $mortal->populasi->jenis }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin:</th>
                            <td>{{ $mortal->populasi->jkel }}</td>
                        </tr>
                        <tr>
                            <th>Induk:</th>
                            <td>{{ $mortal->populasi->induk }}</td>
                        </tr>
                        <tr>
                            <th>Sumber:</th>
                            <td>{{ $mortal->populasi->sumber }}</td>
                        </tr>
                        <tr>
                            <th>Asal:</th>
                            <td>{{ $mortal->populasi->asal }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        @endif

        <div class="mt-4">
            <a href="{{ route('mortals.edit', $mortal) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('mortals.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
            <form action="{{ route('mortals.destroy', $mortal) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </div>
    </div>
</body>

</html>
