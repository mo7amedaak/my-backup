<?php 
$formData = $_POST;
// print_r($_FILES);

$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if($_FILES['image']){
    $image = $_FILES['image'];
    if(!is_dir('users_profile')){
        mkdir('usersProfile');
    }
    if($image['size'] > 1024*1024){
            header("location:register.php?error=invalid size");

            exit();
    }

    $newImgName = uniqid() . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);

    move_uploaded_file($image['tmp_name'], './usersProfile/'. $newImgName);
}
$user = [
    'name'=> $username,
    'email'=> $email,
    'password'=> $password,
    'image'=> $newImgName,
];

// $userJson= json_encode($user); // convert assosiative array  to json
// json_decode(); // json to array
if(!file_exists('database.json')){
    file_put_contents('database.json', '[]');
}
$oldData = file_get_contents('database.json');
// echo $oldData;

$oldDataV2 = json_decode($oldData, true);

// $oldDataV2[]=$user;
array_push($oldDataV2, $user);

$newJsonData = json_encode($oldDataV2);

file_put_contents('database.json', $newJsonData);

echo "data inserted successfully";

header("location:users_data.php?msg=registeration is successfully");

// [
//     {
//         'name' : "eman",
//     }
// ]
