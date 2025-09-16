<?php

if(isset($_POST['login_submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("location:login.php?error=invalid email format");
        exit;
    }
    $pattern = '/^[\w]{4,8}$/';
    if(!preg_match($pattern, $password)){
        header("location:login.php?error=invalid password format min:4, max:8");
        exit;
    }

    $connection = new PDO("mysql:host=localhost;dbname=php-g1", "root", "");

    // $password = md5($password);


    // $sql = "select * from users where email='$email' and password='$password'";
    $sql = "select * from users where email='$email'";

    $sqlQuery = $connection->prepare($sql);
    $sqlQuery->execute();

    $userData = $sqlQuery->fetch(PDO::FETCH_ASSOC); 
    if(empty($userData)){
     header("location:login.php?error=invalid email");
     exit();
    }

    if(!password_verify($password, $userData['password'] )){
        header("location:login.php?error=invalid password");
        exit();
    }



    session_start();

    $_SESSION['user_id']= $userData['id'];
    setcookie('user_id', $userData['id'],  24*60*60);
    header("location:profile.php");
    exit();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>

    <h1 class="p-5">login</h1>

    <?php
    if (isset($_GET['msg'])) {
        echo "<p class='alert alert-success'>" . $_GET['msg'] . "</p>";
    }
    
    if (isset($_GET['error'])) {
        echo "<p class='alert alert-danger'>" . $_GET['error'] . "</p>";
    }
    ?>

    <form action="login.php" method="POST" enctype="multipart/form-data" class="row w-75 m-auto">
       
        <div class="col-12 form-group">
            <label for="">email</label>
            <input name="email" type="email" class="form-control my-2">
        </div>
        <div class="col-12 form-group">
            <label for="">password</label>
            <input name="password" type="password" class="form-control my-2">
        </div>
        

        <button class="btn btn-primary my-2" name="login_submit">submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>