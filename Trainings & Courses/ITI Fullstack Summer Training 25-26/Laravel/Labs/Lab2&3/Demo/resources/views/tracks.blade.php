<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>students</title>
    <x-bootstrap-css></x-bootstrap-css>
</head>
<body>

<x-navbar></x-navbar>

<div class="m-5 d-flex justify-content-around">
    <h3 class="text-success text-center ">All Tracks Page</h3>
    <a href="{{ route('tracks.create') }}">
        <x-button class="success" name="Create Track"></x-button>
    </a>
</div>


<table class="table table-striped w-75 m-auto border">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">description</th>
      <th scope="col">Image</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach ($tracks as $track )
<tr>
    <td>{{ $track->id}}</td>
    <td>{{ $track->name}}</td>
    <td>{{ $track->description }}</td>
    <td><img src="{{ $track->image}}" alt="trackImage" srcset=""></td>
    <td class="d-flex gap-2">
        <a href="{{ route('tracks.view', $track->id) }}">
            <x-button class="warning" name="Show"></x-button>
        </a>
        <a href="{{ route('tracks.edit', $track->id) }}">
            <x-button class="primary" name="Edit"></x-button>
        </a>
        <form action="{{ route('tracks.destroy', $track->id) }}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger">Delete</button>
        </form>
    </td>


</tr>
@endforeach
  </tbody>
</table>