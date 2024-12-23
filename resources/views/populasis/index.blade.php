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
        <h1 class="mb-4">Daftar Populasi</h1>

        <a href="{{ route('populasis.create') }}" class="btn btn-primary mb-3">Tambah Populasi Baru</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Kode</th>
                    <th>Jenis</th>
                    <th>Jenis Kelamin</th>
                    <th>Asal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($populasis as $populasi)
                    <tr>
                        <td>{{ $populasi->tgl->format('d/m/Y') }}</td>
                        <td>{{ $populasi->kode }}</td>
                        <td>{{ $populasi->jenis }}</td>
                        <td>{{ $populasi->jkel }}</td>
                        <td>{{ $populasi->suplier->nama ?? 'N/A' }}</td>
                        <td>{{ $populasi->status }}</td>
                        <td>
                            <a href="{{ route('populasis.show', $populasi) }}" class="btn btn-sm btn-info">Lihat</a>
                            <a href="{{ route('populasis.edit', $populasi) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('populasis.destroy', $populasi) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data populasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $populasis->links() }}
    </div>
</body>

</html>
