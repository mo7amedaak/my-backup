<?php 

$data = file_get_contents('database.json');

$usersData = json_decode($data, true);


// print_r($usersData);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

if(isset($_GET['msg'])){
    echo "<p style='color:red'>".$_GET['msg']. "</p>";
}
?>

    <table border="1">
        <thead>
            <th>name</th>
            <th>email</th>
            <th>image</th>
        </thead>
        <tbody>
        <?php
        foreach( $usersData as $user ) {
            echo "<tr>";
            echo "<td>".$user['name'] ."</td>";
            echo "<td>".$user['email'] ."</td>";
            echo "<td> 
            <img width=100px height=100px src='./usersProfile/". $user['image']. "'>
            " ."</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>