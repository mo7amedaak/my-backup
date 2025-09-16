<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <x-bootstrap-css />
</head>
<body>
    <x-navbar />

    <div class="m-5">
        <h1 class="text-primary w-75 m-auto">Create New Course</h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger w-75 m-auto">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('courses.store') }}" class="w-75 m-auto border p-3" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Course Name</label>
            <input name="name" type="text" class="form-control" id="name">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Course Description</label>
            <textarea name="description" class="form-control" id="description" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Course Code</label>
            <input name="code" type="text" class="form-control" id="code">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Course Image</label>
            <input name="image" type="file" class="form-control" id="image">
        </div>

        <div class="mb-3">
            <label for="track_id" class="form-label">Choose Track</label>
            <select name="track_id" class="form-select" id="track_id">
                @foreach ($tracks as $track)
                    <option value="{{ $track->id }}">{{ $track->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
    </form>

    <x-bootstrap-js />
</body>
</html>
