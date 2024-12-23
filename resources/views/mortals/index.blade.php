<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mortals</title>
</head>

<body>
    <div class="container">
        <h1 class="mb-4">Daftar Kematian Ternak</h1>

        <a href="{{ route('mortals.create') }}" class="btn btn-primary mb-3">Tambah Data Kematian</a>

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
                    <th>Penyebab</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mortals as $index => $mortal)
                    <tr>
                        <td>{{ $mortals->firstItem() + $index }}</td>
                        <td>{{ $mortal->tgl->format('d/m/Y') }}</td>
                        <td>{{ $mortal->kode }}</td>
                        <td>{{ $mortal->populasi->jenis ?? 'N/A' }}</td>
                        <td>{{ $mortal->populasi->jkel ?? 'N/A' }}</td>
                        <td>{{ $mortal->penyebab }}</td>
                        <td>
                            <a href="{{ route('mortals.show', $mortal) }}" class="btn btn-sm btn-info">Lihat</a>
                            <a href="{{ route('mortals.edit', $mortal) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('mortals.destroy', $mortal) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data kematian ternak.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $mortals->links() }}
    </div>
</body>

</html>
