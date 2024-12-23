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
        <h1 class="mb-4">Tambah Populasi Baru</h1>

        <form action="{{ route('populasis.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="tgl">Tanggal</label>
                <input type="date" class="form-control @error('tgl') is-invalid @enderror" id="tgl"
                    name="tgl" value="{{ old('tgl') }}" required>
                @error('tgl')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jenis">Jenis</label>
                <select class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis"
                    required>
                    <option value="">Pilih Jenis Hewan</option>
                    <option value="Domba" {{ old('jenis') == 'Domba' ? 'selected' : '' }}>Domba</option>
                    <option value="Kambing" {{ old('jenis') == 'Kambing' ? 'selected' : '' }}>Kambing</option>
                    <option value="Sapi" {{ old('jenis') == 'Sapi' ? 'selected' : '' }}>Sapi</option>
                </select>
                @error('jenis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="jkel">Jenis Kelamin</label>
                <select class="form-control @error('jkel') is-invalid @enderror" id="jkel" name="jkel" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Jantan" {{ old('jkel') == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                    <option value="Betina" {{ old('jkel') == 'Betina' ? 'selected' : '' }}>Betina</option>
                    <option value="Anak" {{ old('jkel') == 'Anak' ? 'selected' : '' }}>Anak</option>
                </select>
                @error('jkel')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode"
                    name="kode" value="{{ old('kode') }}" required>
                @error('kode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="induk">Induk</label>
                <input type="text" class="form-control @error('induk') is-invalid @enderror" id="induk"
                    name="induk" value="{{ old('induk') }}" required>
                @error('induk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="sumber">Sumber</label>
                <select class="form-control @error('sumber') is-invalid @enderror" id="sumber" name="sumber"
                    required>
                    <option value="">Pilih Sumber</option>
                    <option value="Suplier" {{ old('sumber') == 'Suplier' ? 'selected' : '' }}>Suplier</option>
                    <option value="Kelahiran" {{ old('sumber') == 'Kelahiran' ? 'selected' : '' }}>Kelahiran</option>
                </select>
                @error('sumber')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="asal">Asal (Suplier)</label>
                <select class="form-control @error('asal') is-invalid @enderror" id="asal" name="asal" required>
                    <option value="">Pilih Suplier</option>
                    @foreach ($supliers as $suplier)
                        <option value="{{ $suplier->nama }}" {{ old('asal') == $suplier->nama ? 'selected' : '' }}>
                            {{ $suplier->nama }}
                        </option>
                    @endforeach
                </select>
                @error('asal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status"
                    required>
                    <option value="">Pilih Status</option>
                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif
                    </option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('populasis.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>

</html>
