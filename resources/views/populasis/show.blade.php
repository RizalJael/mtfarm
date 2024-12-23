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
        <h1 class="mb-4">Detail Populasi</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Kode: {{ $populasi->kode }}</h5>
                <p class="card-text"><strong>Tanggal:</strong> {{ $populasi->tgl->format('d/m/Y') }}</p>
                <p class="card-text"><strong>Jenis:</strong> {{ $populasi->jenis }}</p>
                <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $populasi->jkel }}</p>
                <p class="card-text"><strong>Induk:</strong> {{ $populasi->induk }}</p>
                <p class="card-text"><strong>Sumber:</strong> {{ $populasi->sumber }}</p>
                <p class="card-text"><strong>Asal (Suplier):</strong> {{ $populasi->suplier->nama ?? 'N/A' }}</p>
                <p class="card-text"><strong>Keterangan:</strong> {{ $populasi->keterangan ?: 'Tidak ada keterangan' }}
                </p>
                <p class="card-text"><strong>Status:</strong> {{ $populasi->status }}</p>
                <p class="card-text"><strong>Dibuat pada:</strong> {{ $populasi->created_at->format('d/m/Y H:i') }}</p>
                <p class="card-text"><strong>Terakhir diupdate:</strong>
                    {{ $populasi->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('populasis.edit', $populasi) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('populasis.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>

            <form action="{{ route('populasis.destroy', $populasi) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </div>
    </div>
</body>

</html>
