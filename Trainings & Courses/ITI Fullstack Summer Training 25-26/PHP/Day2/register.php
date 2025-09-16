<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>

    <h1 class="p-5">welcome in our webSite</h1>

    <?php
    if (isset($_GET['error'])) {
        echo "<p class='alert alert-danger'>" . $_GET['error'] . "</p>";
    }
    ?>
   
    <form action="server.php?message=defgh" method="POST" enctype="multipart/form-data" class="row w-75 m-auto">
        <div class="col-12 form-group">
            <label for="">username</label>
            <input name="name" type="text" class="form-control my-2">
        </div>
        <div class="col-12 form-group">
            <label for="">email</label>
            <input name="email" type="email" class="form-control my-2">
        </div>
        <div class="col-12 form-group">
            <label for="">password</label>
            <input name="password" type="password" class="form-control my-2">
        </div>
        <div class="col-12 form-group">
            <label for="">profile image</label>
            <input name="image" type="file" class="form-control my-2">
        </div>

        <button class="btn btn-primary my-2">submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>