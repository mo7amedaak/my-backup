<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <x-bootstrap-css></x-bootstrap-css>
</head>
<body>
    <x-navbar></x-navbar>
    
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Edit Course: {{ $course->name }}</h1>
            <a href="{{ route('courses.show', $course) }}" class="btn btn-outline-secondary">
                Back to Course
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('courses.update', $course) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Course Information
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Course Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="{{ old('name', $course->name) }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="code" class="form-label">Course Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="code" name="code" 
                               value="{{ old('code', $course->code) }}" required>
                        <div class="form-text">Unique identifier for the course</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="image" class="form-label">Image URL <span class="text-danger">*</span></label>
                        <input type="url" class="form-control" id="image" name="image" 
                               value="{{ old('image', $course->image) }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" 
                                  rows="4" required>{{ old('description', $course->description) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('courses.show', $course) }}" class="btn btn-outline-secondary me-2">
                    Cancel
                </a>
                <x-button class="primary" name="Update Course"></x-button>
            </div>
        </form>
    </div>

    <x-bootstrap-js></x-bootstrap-js>
</body>
</html>