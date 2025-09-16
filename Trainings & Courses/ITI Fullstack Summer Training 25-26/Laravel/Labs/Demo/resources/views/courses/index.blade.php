<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <x-bootstrap-css></x-bootstrap-css>
</head>
<body>
    <x-navbar></x-navbar>
    
    <div class="container my-4">
        @if(session('success'))
            <div class="alert alert-success mt-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">All Courses</h2>
            <a href="{{ route('courses.create') }}" class="btn btn-primary">
                Create New Course
            </a>
        </div>

        <table class="table table-striped border">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Students</th>
                    <th>Tracks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td><span class="badge bg-secondary">{{ $course->code }}</span></td>
                        <td>{{ $course->students->count() }}</td>
                        <td>{{ $course->tracks->count() }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('courses.show', $course) }}" class="btn btn-sm btn-info">
                                Show
                            </a>
                            <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('courses.destroy', $course) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $courses->links() }}
        </div>
    </div>

    <x-bootstrap-js></x-bootstrap-js>
</body>
</html>