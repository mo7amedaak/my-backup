<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Profile</title>
    <x-bootstrap-css></x-bootstrap-css>
</head>
<body>
    <x-navbar/>

    <h3 class="text-success text-center m-5">{{ $student->name }} Data</h3>

    <table class="table table-striped w-75 m-auto border text-center align-middle">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Image</th>
                @if($student->track_id)
                <th scope="col">Student Track</th>
                @endif
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ ucfirst($student->gender) }}</td>
                <td>
                    <img src="{{ $student->image }}" alt="studentImage" width="50" height="50" >
                </td>
                @if($student->track_id)

                <td><a href="{{ route('tracks.view',$student->track_id) }}"
                        style="text-decoration: none; color:brown">{{ $student->track->name }} </a></td>

                @endif
                
                <td>
                    <div class="d-flex gap-2 justify-content-center">
                        <a href="{{ route('students.index') }}" class="btn btn-warning">Back</a>

                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <x-bootstrap-js></x-bootstrap-js>
</body>
</html>
