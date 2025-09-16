<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <x-bootstrap-css></x-bootstrap-css>
</head>
<body>
    <x-navbar></x-navbar>
    
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Create New Course</h1>
            <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">
                Back to Courses
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

        <form action="{{ route('courses.store') }}" method="POST">
            @csrf
            
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Course Information
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Course Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="{{ old('name') }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="code" class="form-label">Course Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="code" name="code" 
                               value="{{ old('code') }}" required>
                        <div class="form-text">Unique identifier for the course</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="image" class="form-label">Image URL <span class="text-danger">*</span></label>
                        <input type="url" class="form-control" id="image" name="image" 
                               value="{{ old('image') }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" 
                                  rows="4" required>{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-secondary me-2">
                    Reset
                </button>
                <x-button class="primary" name="Create Course"></x-button>
            </div>
        </form>
    </div>

    <x-bootstrap-js></x-bootstrap-js>
</body>
</html>