<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SUplier</title>
</head>

<body>
    <h1>Suppliers</h1>
    <a href="{{ route('supliers.create') }}" class="btn btn-primary">Add New Supplier</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>catatan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($supliers as $suplier)
                <tr>
                    <td>{{ $suplier->nama }}</td>
                    <td>{{ $suplier->alamat }}</td>
                    <td>{{ $suplier->no_telp }}</td>
                    <td>{{ $suplier->catatan }}</td>
                    <td>
                        <a href="{{ route('supliers.show', $suplier) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('supliers.edit', $suplier) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('supliers.destroy', $suplier) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
