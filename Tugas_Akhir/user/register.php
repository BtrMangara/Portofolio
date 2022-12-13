<?php

session_start();
if (isset($_SESSION["user"])){
  header("Location: ./index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tugas Akhir</title>


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
 

    <div class="container-fluid">
        <div class="form-login d-flex justify-content-center align-items-center vh-100">
            <div class="border-0">
            
                <div class="row g-0 justify-content-center align-items-center d-flex">
                <?php 
    			if(isset($_GET['message'])){
      				if($_GET['message'] == 1){
        				echo "
        					<div class='col-lg-9 col-sm-12 alert alert-danger m-0 border-0' role='alert'>
              				Maaf Email Sudah Pernah Digunakan
          					</div>
      						";
    				}
                    elseif($_GET['message'] == 2){
                        echo "
        					<div class='col-lg-9 col-sm-12 alert alert-success m-0 border-0' role='alert'>
              				Anda Berhasil Mendaftar, Silahkan Login
          					</div>
      						";
                    }
  				}
 			     ?>
                        <div class="col-lg-5 col-sm-12 shadow-lg bg-body">
                        <img src="../assets/bg-login.jpg" class="img-fluid rounded-start" style="min-height: 462px;" alt="...">
                        </div>
                        <div class="col-lg-4 col-sm-12 p-5 bg-dark rounded-end shadow-lg bg-body">
                            <div class="card-body">
                                <h5 class="card-title">Sign Up</h5>
                                <div id="emailHelp" class="form-text mb-2 mt-2">Already Have Account ? 
                                        <a href="login.php" style="text-decoration: none;">Login</a>
                                </div>
                                <form action="./command/register-user.php" method="POST" enctype="multipart/form-data">
                                    
                                    <div class="mb-2">
                                    <label for="exampleInputEmail1" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="user">
                                    </div>

                                    <div class="mb-2">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email">
                                    </div>

                                    <div class="mb-2">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password">
                                    </div>
                               
                                <button name="register" type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>

                </div>
                </div>
            </div>
    </div>
	

	<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>
</html>