<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Track</title>
    <x-bootstrap-css />
</head>
<body>
    <x-navbar />

    <div class="container mt-5">
        <h2 class="text-center text-primary">Update Track</h2>

        <form action="{{ route('tracks.update', $track->id) }}" method="POST" enctype="multipart/form-data" class="w-50 m-auto">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Track Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $track->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Track Description</label>
                <textarea name="description" class="form-control" id="description" required>{{ $track->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Track Image</label>
                <input type="file" name="image" class="form-control" id="image">
                <img src="{{ asset('uploads/' . $track->image) }}" class="mt-2" width="100">
            </div>

            <div class="mb-3">
                <label for="courses">Courses:</label>
                <select name="courses[]" class="form-select" multiple>
                    @foreach($allCourses as $course)
                        <option value="{{ $course->id }}" @if($course->track_id == $track->id) selected @endif>
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Update</button>
        </form>
    </div>
</body>
</html>
