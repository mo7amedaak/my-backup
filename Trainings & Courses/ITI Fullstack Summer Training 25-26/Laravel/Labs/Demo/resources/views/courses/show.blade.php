<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <x-bootstrap-css></x-bootstrap-css>
</head>
<body>
    <x-navbar></x-navbar>
    
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">{{ $course->name }}</h1>
            <div>
                <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">
                    Back to Courses
                </a>
            </div>
        </div>

        <div class="row">
            <!-- Course Information -->
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title mb-0">Course Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <img src="{{ $course->image }}" alt="Course Image" class="img-fluid rounded">
                        </div>
                        
                        <div class="mb-3">
                            <h5>Description</h5>
                            <p>{{ $course->description }}</p>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Code</h5>
                                <p class="text-muted">{{ $course->code }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Created At</h5>
                                <p class="text-muted">{{ $course->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Actions -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title mb-0">Actions</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning">
                                Edit Course
                            </a>
                            
                            <a href="{{ route('courses.manage-students', $course) }}" class="btn btn-info">
                                Manage Students
                            </a>
                            
                            <a href="{{ route('courses.manage-tracks', $course) }}" class="btn btn-secondary">
                                Manage Tracks
                            </a>
                            
                            <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-grid">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Delete Course
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Stats -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title mb-0">Statistics</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Students Enrolled:</span>
                            <span class="badge bg-primary">{{ $course->students->count() }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Associated Tracks:</span>
                            <span class="badge bg-secondary">{{ $course->tracks->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tracks Section -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                <h3 class="card-title mb-0">Associated Tracks</h3>
            </div>
            <div class="card-body">
                @if($course->tracks->count() > 0)
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($course->tracks as $track)
                            <span class="badge bg-primary fs-6">{{ $track->name }}</span>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info mb-0">
                        No tracks associated with this course yet.
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Students Section -->
        <div class="card">
            <div class="card-header bg-info text-white">
                <h3 class="card-title mb-0">Enrolled Students</h3>
            </div>
            <div class="card-body">
                @if($course->students->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Track</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($course->students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>
                                            @if($student->track)
                                                <span class="badge bg-secondary">{{ $student->track->name }}</span>
                                            @else
                                                <span class="text-muted">No track</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info mb-0">
                        No students enrolled in this course yet.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <x-bootstrap-js></x-bootstrap-js>
</body>
</html>