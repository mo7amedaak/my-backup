<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Student</title>
    <x-bootstrap-css></x-bootstrap-css>
</head>
<body>
    <x-navbar/>

    <div class="m-5">
        <h1 class="text-success w-75 m-auto">
            Update {{ $student->name }} Data
        </h1>
    </div>

    <form method="POST" action="{{ route('students.update', $student->id) }}" class="w-75 m-auto border p-2">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Student Name</label>
            <input name="name" type="text" class="form-control" id="name" value="{{ $student->name }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Student Email</label>
            <input name="email" type="email" class="form-control" id="email" value="{{ $student->email }}">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Student Phone</label>
            <input name="phone" type="text" class="form-control" id="phone" value="{{ $student->phone }}">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Student Address</label>
            <input name="address" type="text" class="form-control" id="address" value="{{ $student->address }}">
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Student Age</label>
            <input name="age" type="number" class="form-control" id="age" value="{{ $student->age }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Student Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ $student->gender == 'male' ? 'checked' : '' }}>
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ $student->gender == 'female' ? 'checked' : '' }}>
                <label class="form-check-label" for="female">Female</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Student Image (URL)</label>
            <input name="image" type="text" class="form-control" id="image" value="{{ $student->image }}">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>

    <x-bootstrap-js></x-bootstrap-js>
</body>
</html>
