<?php 
	include '../../db/connection.php';

	if(isset($_POST['login'])){
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_EMAIL);
		$query = mysqli_query($connection, "SELECT * FROM tb_user WHERE email = '$email'");
		$user = mysqli_fetch_array($query);

		if($user){
			if(password_verify($password, $user['password'])){
				session_start();
				$_SESSION["user"] = $user;
				header("Location: ../index.php");
			}
			else{
				header("Location: ../login.php?message=1");
			}
		}
		else{
            header("Location: ../login.php?message=1");
        }
	}
?>