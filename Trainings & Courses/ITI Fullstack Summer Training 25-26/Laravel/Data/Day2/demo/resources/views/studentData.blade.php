<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<h3 class="text-success text-center"> {{ $student->Name }} Data</h3>



<table class="table table-striped w-75 m-auto border">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Image</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

<tr>
    <td>{{ $student->id}}</td>
    <td>{{ $student->name}}</td>
    <td>{{ $student->address }}</td>
    <td><img src="{{ $student->image}}" alt="studentImage" srcset=""></td>
    <td>
        <a href="{{ route('students.index') }}"><button class="btn btn-warning">Back</button></a>
        <a href="http://"><button class="btn btn-danger">Delete</button></a>

    </td>
</tr>

  </tbody>
</table>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
