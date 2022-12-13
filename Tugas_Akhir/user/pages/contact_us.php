<?php

include ('../../db/connection.php');
session_start();
  if (!isset($_SESSION["user"])){
      header("Location: ../login.php");
    }

  $id = $_SESSION['user']['id'];
  $query2 = mysqli_query($connection, "SELECT * from tb_user WHERE id='$id'");
  $user = mysqli_fetch_array($query2);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <title>Tugas Akhir</title>
  </head>
  <body>

    <style type="text/css">
      
      footer{
        background-color: #d6671a;
        box-shadow: 1px -8px 14px 2px rgba(0,0,0,0.26);
        -webkit-box-shadow: 1px -8px 14px 2px rgba(0,0,0,0.26);
        -moz-box-shadow: 1px -8px 14px 2px rgba(0,0,0,0.26);
      }

      .textproduct {

         width: 100%; 
         text-align: center; 
         border-bottom: 1px solid #000; 
         line-height: 0.1em;
         margin: 10px 0 20px; 
      } 

      .textproduct span { 
          background:#fff; 
          padding:0 10px; 
      }

      li{
        list-style-type: none;
      }

    </style>
    

    <!-- Navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand p-0" href="../index.php"><img src="../../assets/logo.png"  class="d-inline-block align-text-top"></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link text-dark" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="./product.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="#">Contact</a>
            </li>
          </ul>

          <ul class="nav navbar-nav d-flex ms-auto">
            
            <li class="nav-item dropdown text-center">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="fs-6 text-center">Hello, <?=$user['username']?>
              </a>
              <ul class="dropdown-menu text-center ms-6 px-3 border-0" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./your_order.php">Your Order</a></li>
              <li><a class="dropdown-item" href="../command/logout.php">Logout</a></li>
              </ul>
            </li>

          </ul>

        </div>
      </div>
    </nav>
 <!-- Navbar  -->

 
  <div class="container container-sm-fluid mt-lg-5 mt-sm-0 py-1">
    <div class="product align-items-center bg-light p-lg-5 p-sm-0 mx-lg-5 mx-sm-0 shadow-sm rounded-2">
      <h3 class="text-center mt-3"> CONTACT US</h3>
      
      
      <div class="row gx-0 mt-lg-6 col-sm-12 mt-sm-0 ">
        
      <div class="col-lg-6 col-6 text-center mt-3">
      <a href="https://www.instagram.com/ssansrce/">
        <img src="../../assets/instagram-logo.svg" class="img-fluid" style="max-width: 50px;">
      </a>
      </div>

        <div class="col-lg-6 col-6 text-center mt-3">
        <a href="https://wa.me/6282274544344">
        <img src="../../assets/whatsapp-logo.svg" class="img-fluid" style="max-width: 50px;">
        </a>  
        </div>

      </div>

      <div class="row gx-0 mt-3 px-5">
        <div class="col-lg-12 col-sm-6">
            <form method="POST" enctype="multipart/form-data" action="../command/input_pesan.php">
            
                <div class="col-sm-12">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name<span class="text-danger">*</span></label>
                    <input required name="nama" type="text" class="form-control" id="exampleInputPassword1" readonly value="<?=$user['username']?>">
                </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email<span class="text-danger">*</span></label>
                    <input required name="email" type="email" class="form-control" id="exampleInputPassword1" readonly value="<?=$user['email']?>">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Messages<span class="text-danger">*</span></label>
                    <textarea required name="pesan" class="form-control" id="exampleFormControlTextarea1" rows="4" style="resize: none;"></textarea>
                </div>

            
                <div class="text-end mb-3">
                <button type="submit" class="btn btn-dark" name="submit_pesan">Submit</button>
                </div>
            </form>
        </div>
       </div>
           
      

    </div>

  </div>


  <div class="container-fluid text-light mb-0">
  <footer class="navbar-fixed-bottom footer row row-cols-5 py-5 align-items-center justify-content-between">

    <div class="col">
      <a href="../index.php" class="d-flex mb-3 text-decoration-none text-light">
      <img src="../../assets/logo.png" style="width: 200px;">
      <h5 style="font-size: 15px;"> Perumahan Permata Buah Batu, Soreang, Bojong Soang</span>
      </a>
    </div>


    <div class="col">
      <h5>Customer Service</h5>
      <ul class="nav flex-column">
        <li class="nav-item"><a href="./contact_us.php" class="nav-link p-0 text-light">Contact Us</a></li>
      </ul>
    </div>

    <div class="col">

      <ul class="nav flex-column">
        <li class="nav-item">
          <a href="https://wa.me/6282274544344" class="nav-link p-0 text-light fw-bold"><i class="bi bi-whatsapp">  +62 822-7454-4344 </i></a>
          <a href="https://www.instagram.com/ssansrce/" class="nav-link p-0 text-light fw-bold"><i class="bi bi-instagram">  Sansrce</i></i></a>
        </li>
      </ul>
    </div>
  </footer>
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