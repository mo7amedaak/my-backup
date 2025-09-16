<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Students - {{ $course->name }}</title>
    <x-bootstrap-css></x-bootstrap-css>
</head>
<body>
    <x-navbar></x-navbar>
    
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">
                Manage Students: {{ $course->name }}
            </h1>
            <a href="{{ route('courses.show', $course) }}" class="btn btn-outline-secondary">
                Back to Course
            </a>
        </div>

        <div class="alert alert-info">
            Select students to enroll in this course
        </div>

        <form action="{{ route('courses.update-students', $course) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title mb-0">Available Students</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Track</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>
                                            <input class="form-check-input" type="checkbox" 
                                                   name="student_ids[]" value="{{ $student->id }}"
                                                   {{ $course->students->contains($student->id) ? 'checked' : '' }}>
                                        </td>
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
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <x-button class="primary" name="Save Enrollment"></x-button>
            </div>
        </form>
    </div>

    <x-bootstrap-js></x-bootstrap-js>
</body>
</html>