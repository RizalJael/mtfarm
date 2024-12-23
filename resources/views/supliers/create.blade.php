<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah data</title>
</head>

<body>
    <div class="container">
        <h1>Add New Supplier</h1>

        <form action="{{ route('supliers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Name</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    name="nama" value="{{ old('nama') }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat">Address</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="no_telp">Phone Number</label>
                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                    name="no_telp" value="{{ old('no_telp') }}">
                @error('no_telp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="catatan">Notes</label>
                <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan">{{ old('catatan') }}</textarea>
                @error('catatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Supplier</button>
            <a href="{{ route('supliers.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>
