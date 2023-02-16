<?php

session_start();
  if (isset($_SESSION["user"])){
    header("Location: ../user/index.php");
  }
  
include ('../db/connection.php');

if(!isset($_GET['id'])){
  header("Location:../index.php");
}

$id = $_GET['id'];


$query= mysqli_query($connection, "SELECT * FROM produk WHERE id = '$id'");
$produk = mysqli_fetch_array($query);



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
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <script src="https://kit.fontawesome.com/2b39d4f993.js" crossorigin="anonymous"></script>


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
        <a class="navbar-brand p-0" href="../index.php"><img src="../assets/logo.png"  class="d-inline-block align-text-top"></a>
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

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link text-dark" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="./product.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="./contact_us.php">Contact</a>
            </li>
          </ul>

          <ul class="nav navbar-nav d-flex ms-auto">
            
            <li class="nav-item dropdown text-center">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="fs-6 text-center">Login / Register
              </a>
              <ul class="dropdown-menu text-center ms-6 px-3 border-0" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="../user/login.php">Login</a></li>
                <li><a class="dropdown-item" href="../user/register.php">Register</a></li>
              </ul>
            </li>

          </ul>


        </div>
      </div>
    </nav>
 <!-- Navbar  -->

 

  <div class="container mt-5 gx-0">
    <div class="product align-items-center">
      
      <div class="card border-0 mb-3" style="max-width: 1920px;">
        <div class="row g-0 align-items-center justify-content-center">
          <div class="col-lg-5 col-sm-12 ">
            <div class="text-center"><img src="../assets/brand_photo/<?php echo $produk['gambar_produk']; ?>" class="mx-auto d-block img-fluid w-75" alt="..."></div>
          </div>
          <div class="col-lg-7 col-sm-12">
            <div class="card-body">
              <h2 class="card-title mb-3 p-1"><?php echo $produk['nama_produk']; ?></h2>
              <p class="card-text"><h3 class="p-1"><?php echo "Rp. " . number_format($produk['harga_produk'],0,"","."); ?></h3></p>
              <p class="card-text p-1"><span class="ms-2"><?php echo $produk['deskripsi_produk']; ?></span></p>
              <p class="card-text"><p class=" text-end">Stok Tersedia : <b><?php echo $produk['stok_produk']; ?></b> Buah</p></p>
              <p class="card-text p-1 text-center">
              <a class="text-decoration-none text-dark" href="../user/pages/order.php">
                <button type="button" class="w-50 btn btn-md btn-outline-primary rounded-pill">
                  <i class="fa-solid fa-basket-shopping"></i><span class="fs-6"> Beli Sekarang</span>
                </button>
              </a>
              </p>
            </div>
          </div>
        </div>
      </div>


      </div>

    </div>

  </div>


  <div class="container-fluid text-light mb-0">
  <footer class="navbar-fixed-bottom footer row row-cols-5 py-5  align-items-center justify-content-between">

    <div class="col">
      <a href="../index.php" class="d-flex mb-3 text-light text-decoration-none">
      <img src="../assets/logo.png" style="width: 200px;">
      </a>
      <h5 style="font-size: 15px;"> Perumahan Permata Buah Batu, Soreang, Bojong Soang</span>
    </div>


    <div class="col">
      <h5>Customer Service</h5>
      <ul class="nav flex-column">
        <li class="nav-item"><a href="#" class="nav-link p-0 text-light">Contact Us</a></li>
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