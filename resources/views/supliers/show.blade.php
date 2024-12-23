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
        <h1>Supplier Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $suplier->nama }}</h5>
                <p class="card-text"><strong>Address:</strong> {{ $suplier->alamat ?: 'N/A' }}</p>
                <p class="card-text"><strong>Phone Number:</strong> {{ $suplier->no_telp ?: 'N/A' }}</p>
                <p class="card-text"><strong>Notes:</strong> {{ $suplier->catatan ?: 'N/A' }}</p>
                {{-- <p class="card-text"><strong>Created at:</strong> {{ $suplier->created_at->format('d/m/Y H:i') }}</p>
                    <p class="card-text"><strong>Last updated:</strong> {{ $suplier->updated_at->format('d/m/Y H:i') }}</p> --}}
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('supliers.edit', $suplier->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('supliers.index') }}" class="btn btn-secondary">Back to List</a>

            <form action="{{ route('supliers.destroy', $suplier->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this supplier?')">Delete</button>
            </form>
        </div>
    </div>

</body>

</html>
