<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Track</title>
    <x-bootstrap-css />
</head>
<body>
    <x-navbar />

    <div class="container mt-5">
        <h2 class="text-center text-success">Create New Track</h2>

        <form action="{{ route('tracks.store') }}" method="POST" enctype="multipart/form-data" class="w-50 m-auto">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Track Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Track Description</label>
                <textarea name="description" class="form-control" id="description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Track Image</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>

            <button type="submit" class="btn btn-success w-100">Create</button>
        </form>
    </div>
</body>
</html>
