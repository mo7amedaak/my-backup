<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <x-bootstrap-css />
</head>
<body>
    <x-navbar />

    <h3 class="text-success text-center m-5">{{ $course->name }} Details</h3>

    <table class="table table-striped w-75 m-auto border text-center align-middle">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Course Name</th>
                <th scope="col">Course Code</th>
                <th scope="col">Track</th>
                <th scope="col">Description</th>
                <th scope="col">Students Enrolled</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->code }}</td>
                <td>
                    @if($course->track)
                        <a href="{{ route('tracks.view', $course->track->id) }}"
                           style="text-decoration: none; color: brown">
                           {{ $course->track->name }}
                        </a>
                    @else
                        <span class="text-muted">No Track</span>
                    @endif
                </td>
                <td>{{ $course->description }}</td>
                <td>
                    @if($course->students->count())
                        <ul class="list-unstyled">
                            @foreach($course->students as $student)
                                <li>
                                    <a href="{{ route('students.show', $student->id) }}">
                                        {{ $student->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <span class="text-muted">No Students</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex gap-2 justify-content-center">
                        <a href="{{ route('courses.index') }}" class="btn btn-warning">Back</a>

                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <x-bootstrap-js />
</body>
</html>
