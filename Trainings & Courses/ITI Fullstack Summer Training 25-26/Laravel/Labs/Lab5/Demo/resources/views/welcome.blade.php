<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <x-bootstrap-css></x-bootstrap-css>

</head>
<body>

<x-navbar></x-navbar>

    <h1 style="text-align: center;color:#FF2D20 ; font-size:20px; margin-top:50px;
 ">Welcome Please Click On The Button To View All Students or All Tracks</h1>

<div class="d-flex w-75 m-auto justify-content-center">
    <a href="{{ route('students.index') }}"><button class="btn btn-primary m-1">All Students</button></a>
    <a href="{{ route('tracks.index') }}"><button class="btn btn-primary m-1">All Tracks</button></a>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>







</html>
