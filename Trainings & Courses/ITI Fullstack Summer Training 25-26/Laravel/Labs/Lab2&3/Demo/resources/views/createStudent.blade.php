<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <x-bootstrap-css />
</head>
<body>
    <x-navbar />

    <div class="m-5">
        <h1 class="text-primary w-75 m-auto">Create New Student</h1>
    </div>

    <form method="POST" action="{{ route('students.store') }}" class="w-75 m-auto border p-2">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Student Name</label>
            <input name="name" type="text" class="form-control" id="name">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Student Email</label>
            <input name="email" type="email" class="form-control" id="email">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Student Phone</label>
            <input name="phone" type="text" class="form-control" id="phone">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Student Address</label>
            <input name="address" type="text" class="form-control" id="address">
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Student Age</label>
            <input name="age" type="number" class="form-control" id="age">
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Student Gender</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                <label class="form-check-label" for="female">Female</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Student Image</label>
            <input name="image" type="text" class="form-control" id="image">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>

    <x-bootstrap-js />
</body>
</html>
