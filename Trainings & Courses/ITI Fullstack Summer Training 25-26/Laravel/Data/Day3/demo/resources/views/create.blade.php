<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Student</title>
<x-bootstrap-css></x-bootstrap-css>
</head>
<body>
    <x-navbar></x-navbar>
<div class="m-5">
    <h1 class="text-success w-75 m-auto">
    Create New Student
</h1>
</div>

<form method="POST" action="{{ route('students.store') }}" class="w-75 m-auto border p-2">
  @csrf
    {{-- Student Name --}}
    <div class="mb-3">
    <label for="exampleInputName" class="form-label">Student Name</label>
    <input name="name" type="text" class="form-control" id="exampleInputName" >
  </div>
        {{-- Student email --}}
    <div class="mb-3">
    <label for="exampleInputemail" class="form-label">Student email</label>
    <input name="email" type="email" class="form-control" id="exampleInputemail" >
  </div>

  {{-- Student Address --}}
    <div class="mb-3">
    <label for="exampleInputAddress" class="form-label">Student Address</label>
    <input name="address" type="text" class="form-control" id="exampleInputAddress" >
  </div>
   {{-- Student phone --}}
    <div class="mb-3">
    <label for="exampleInputphone" class="form-label">Student phone</label>
    <input name="phone" type="text" class="form-control" id="exampleInputphone" >
  </div>
       {{-- Student age --}}
    <div class="mb-3">
    <label for="exampleInputage" class="form-label">Student age</label>
    <input name="age" type="numder" class="form-control" id="exampleInputage" >
  </div>
    {{-- Student Image --}}

    <div class="mb-3">
    <label for="exampleInputImage" class="form-label">Student Image</label>
    <input name="image" type="text" class="form-control" id="exampleInputImage" >
  </div>

  <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="gender" value="male" checked>
  <label class="form-check-label" for="gender">
    male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="gender"  value="female" >
  <label class="form-check-label" for="gender">
   female
  </label>
</div>

  {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
  <x-button class="primary" name="Submit"></x-button>
</form>




<x-bootstrap-js></x-bootstrap-js>
</body>
</html>
