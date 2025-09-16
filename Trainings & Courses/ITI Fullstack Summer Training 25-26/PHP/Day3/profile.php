<?php


setcookie("test", "efrg", time()+24*60*60);

session_start();
if(!isset($_SESSION['user_id'])){
    header("location:login.php?msg=please login first");
    exit();
}
$id = $_SESSION['user_id'];
$connection = new PDO("mysql:host=localhost;dbname=php-g1", "root", "");


$sql = "select * from users where id = $id";

$sqlQuery = $connection->prepare($sql);
$sqlQuery->execute();

$userData = $sqlQuery->fetch(PDO::FETCH_ASSOC);

if(empty($userData)){
    header("location:login.php");
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>user profile</h1>
    <p>name:<?php echo $userData['name']?></p>
    <p>email:<?= $userData['email']?></p>
</body>
</html>