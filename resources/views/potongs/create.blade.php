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
        <h1 class="mb-4">Tambah Data Pemotongan Ternak</h1>

        <form action="{{ route('potongs.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="tgl">Tanggal Pemotongan</label>
                <input type="date" class="form-control @error('tgl') is-invalid @enderror" id="tgl"
                    name="tgl" value="{{ old('tgl') }}" required>
                @error('tgl')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kode">Kode Ternak</label>
                <select class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" required>
                    <option value="">Pilih Kode Ternak</option>
                    @foreach ($populasis as $populasi)
                        <option value="{{ $populasi->kode }}" {{ old('kode') == $populasi->kode ? 'selected' : '' }}>
                            {{ $populasi->kode }} - {{ $populasi->jenis }} ({{ $populasi->jkel }})
                        </option>
                    @endforeach
                </select>
                @error('kode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="bobot">Bobot (kg)</label>
                <input type="number" class="form-control @error('bobot') is-invalid @enderror" id="bobot"
                    name="bobot" value="{{ old('bobot') }}" required min="1" step="0.1">
                @error('bobot')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tujuan">Tujuan Pemotongan</label>
                <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan"
                    name="tujuan" value="{{ old('tujuan') }}">
                @error('tujuan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('potongs.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>

</html>
