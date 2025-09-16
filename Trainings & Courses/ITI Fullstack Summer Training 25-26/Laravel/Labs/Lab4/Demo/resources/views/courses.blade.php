<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <x-bootstrap-css />
</head>
<body>

<x-navbar />

<div class="m-5 d-flex justify-content-around">
    <h3 class="text-success text-center">All Courses Page</h3>
    <a href="{{ route('courses.create') }}">
        <x-button class="success" name="Create Course"></x-button>
    </a>
</div>

<table class="table table-striped w-75 m-auto border">
    <thead>
        <tr>
            <th>CourseName</th>
            <th>Track</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
        <tr>
            <td>{{ $course->name }}</td>
            <td>{{ $course->track->name ?? 'N/A' }}</td>
            <td class="d-flex gap-2">
                <a href="{{ route('courses.view', $course->id) }}">
                    <x-button class="warning" name="Show" />
                </a>
                <a href="{{ route('courses.edit', $course->id) }}">
                    <x-button class="primary" name="Edit" />
                </a>
                <form action="{{ route('courses.destroy', $course->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-5 d-flex justify-center align-items-center">
    {{ $courses->links() }}
</div>

<x-bootstrap-js />
</body>
</html>
