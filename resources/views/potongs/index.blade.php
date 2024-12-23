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
        <h1 class="mb-4">Daftar Pemotongan Ternak</h1>

        <a href="{{ route('potongs.create') }}" class="btn btn-primary mb-3">Tambah Data Pemotongan</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kode</th>
                    <th>Jenis</th>
                    <th>Jenis Kelamin</th>
                    <th>Bobot</th>
                    <th>Tujuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($potongs as $index => $potong)
                    <tr>
                        <td>{{ $potongs->firstItem() + $index }}</td>
                        <td>{{ $potong->tgl->format('d/m/Y') }}</td>
                        <td>{{ $potong->kode }}</td>
                        <td>{{ $potong->populasi->jenis ?? 'N/A' }}</td>
                        <td>{{ $potong->populasi->jkel ?? 'N/A' }}</td>
                        <td>{{ $potong->bobot }} kg</td>
                        <td>{{ $potong->tujuan ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('potongs.show', $potong) }}" class="btn btn-sm btn-info">Lihat</a>
                            <a href="{{ route('potongs.edit', $potong) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('potongs.destroy', $potong) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data pemotongan ternak.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $potongs->links() }}
    </div>
</body>

</html>
