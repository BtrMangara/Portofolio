<?php

include '../../db/connection.php';

function registerUser($user, $email, $password){
    
    global $connection;

    $query = "INSERT INTO tb_user (username, email, password) VALUES ('$user','$email','$password')";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query gagal dijalankan : " . mysqli_errno($connection). "-" .mysqli_error($connection));
    }

}

if(isset($_POST['register'])){
    
    $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $user = filter_input(INPUT_POST,'user',FILTER_SANITIZE_STRING);

    $queryValidation = "SELECT * FROM tb_user WHERE email = '$email'";
    $resultValidation = mysqli_num_rows(mysqli_query($connection, $queryValidation));

    

    if($resultValidation > 0){
        header("Location:../register.php?message=1");
    }
    else{
        registerUser($user, $email, $password);
        header("Location:../register.php?message=2");
    }

}

?>