<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
    <x-bootstrap-css />
</head>
<body>
    <x-navbar />

    <div class="m-5">
        <h1 class="text-success w-75 m-auto">Update {{ $course->name }} Data</h1>
    </div>

    <form method="POST" action="{{ route('courses.update', $course->id) }}" class="w-75 m-auto border p-3" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Course Name</label>
            <input name="name" type="text" class="form-control" id="name" value="{{ $course->name }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Course Description</label>
            <textarea name="description" class="form-control" id="description">{{ $course->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Course Code</label>
            <input name="code" type="text" class="form-control" id="code">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Course Image</label>
            <input name="image" type="file" class="form-control" id="image">
            <div class="mt-2">
                <img src="{{ asset('uploads/courses/' . $course->image) }}" alt="Current Image" width="100">
            </div>
        </div>

        <div class="mb-3">
            <label for="track_id" class="form-label">Select Track</label>
            <select id="track_id" class="form-select" name="track_id">
                @foreach ($tracks as $track)
                    <option value="{{ $track->id }}" {{ $course->track_id == $track->id ? 'selected' : '' }}>
                        {{ $track->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>

    <x-bootstrap-js />
</body>
</html>
