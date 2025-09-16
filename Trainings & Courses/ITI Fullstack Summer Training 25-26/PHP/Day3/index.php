<?php

// connect database 
// new mysqli("localhost", "root", "");
// new PDO("type:host=localhost;dbname=", "root", "");

/**
 * open connection with database
 * create sql query as string
 * convert sql string sql query
 * run query
 */


$connection = new PDO("mysql:host=localhost;dbname=php-g1", "root", "");
// $sql = "select * from users";

// $sqlQuery = $connection->prepare($sql);

// $sqlQuery->execute();

// $data = $sqlQuery->fetchAll(PDO::FETCH_ASSOC);

// print_r($data);

$name = "toqa";
$email = "toqa@gmail.com";
$password = "wsdefghj";

// $sql = "insert into users (name, email, password) value('mona', 'mona@gmail.com', '15efr' )";


// $sql = "insert into users (name, email, password) value('$name',' $email', '$password' )";


$sql = "update users set image= 'profile.png' where image is null";

// $sqlQuery = $connection->prepare($sql);
// $sqlQuery->execute();

// echo "data inserted successfully";
echo "data updated successfully";




?>