<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Track Details</title>
    <x-bootstrap-css />
</head>
<body>

<x-navbar />

<h3 class="text-success text-center"> {{ $track->name }} Data</h3>

<table class="table table-striped w-75 m-auto border">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $track->id }}</td>
            <td>{{ $track->name }}</td>
            <td>{{ $track->description }}</td>
            <td>
                <img src="{{ asset('uploads/' . $track->image) }}" alt="trackImage" width="100">
            </td>
            <td>
                <a href="{{ route('tracks.index') }}" class="btn btn-warning mb-1">Back</a>
                
                <a href="{{ route('tracks.edit', $track->id) }}" class="btn btn-primary mb-1">Edit</a>

                <form action="{{ route('tracks.destroy', $track->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mb-1" onclick="return confirm('Are you sure you want to delete this track?')">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>

</body>
</html>
