<?php 
	include '../../db/connection.php';

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$query = mysqli_query($connection, "SELECT * FROM tb_admin WHERE email = '$email' and password = '$password'");
		$user = mysqli_fetch_array($query);

		if ($user > 0) { 
			session_start();
			$_SESSION['admin'] = $user;
			header("Location: ../index.php");
		}
		else {
			header("Location: ../login.php?message=1");
		}
	}
?>