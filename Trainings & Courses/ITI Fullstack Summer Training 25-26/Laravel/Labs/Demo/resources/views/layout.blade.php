<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    @include('components.bootstrap-css')
</head>
<body>
    @include('components.navbar')
    
    <div class="container py-4">
        @yield('content')
    </div>
    
    @include('components.bootstrap-js')
</body>
</html>