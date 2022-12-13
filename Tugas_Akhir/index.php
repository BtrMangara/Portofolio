<?php
  include './db/connection.php';
  session_start();
  if (isset($_SESSION["user"])){
    header("Location: ./user/index.php");
  }


  $query = "SELECT * FROM produk";
  $produk = mysqli_query($connection, $query); 

  // $product = mysqli_fetch_array($produk);

  // $deskripsi = $product['deskripsi_produk'];
  // $new_deskripsi=  mb_strimwidth($deskripsi, 0, 149);
  
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
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
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
        <a class="navbar-brand p-0" href="./index.php"><img src="./assets/logo.png"  class="d-inline-block align-text-top"></a>
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
          <ul class="nav navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link text-dark" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="./pages/product.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="./pages/contact_us.php">Contact</a>
            </li>
          </ul>

          <ul class="nav navbar-nav d-flex ms-auto">
            
            <li class="nav-item dropdown text-center">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="fs-6 text-center">Login / Register
              </a>
              <ul class="dropdown-menu text-center ms-6 px-3 border-0" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="./user/login.php">Login</a></li>
                <li><a class="dropdown-item" href="./user/register.php">Register</a></li>
              </ul>
            </li>

          </ul>


        </div>
      </div>
    </nav>
 <!-- Navbar  -->

 <div class="container-fluid p-0 carousel py-0">
   <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./assets/banner.jpg" class="d-block w-100 img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./assets/banner3.jpg" class="d-block w-100 img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./assets/banner2.jpg" class="d-block w-100 img-fluid" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
 </div>

  <div class="container-fluid mt-5">
    <div class="product align-items-center">
      <h2 class="textproduct"><span style="background-color: #f5f5f5;">Product</span></h2>
      <div class="row gx-0">

      <?php while ($products = mysqli_fetch_assoc($produk)) :
        
        ?>
         <div class="col-lg-4 col-md-4 col-12 p-5">
          <a href="./pages/desc_product.php?id=<?php echo $products['id']; ?>" class="text-decoration-none text-dark">
            <div class="card mb-4 rounded-3 shadow-sm align-items-center">
              <div class="card-body">
                <div class="text-center"><img src="./assets/brand_photo/<?php echo $products['gambar_produk']; ?>" class="img-fluid w-75 "></div>
                <h4 class="card-title pricing-card-title"><?php echo $products['nama_produk']; ?><small class="text-muted fw-light"></small></h4>
                <ul class="list-unstyled mt-3 mb-4">
                  <li><h4><?php echo "Rp. " . number_format($products['harga_produk'],0,"","."); ?></h3></li>
                  <li><?php $deskripsi = $products['deskripsi_produk']; 
                  $new_deskripsi=  mb_strimwidth($deskripsi, 0, 149);
                  echo $new_deskripsi; ?> <b>Read More</b>...</li>
                  
                  <li class="mt-3 text-end">Stok Tersedia : <b><?php echo $products['stok_produk']; ?></b> Buah</li>
                </ul>
              </div>
            </div>
             </a>
          </div>
        <?php endwhile; ?>
       
      </div>

    </div>

  </div>


        
  <div class="container-fluid text-light mb-0">
  <footer class="navbar-fixed-bottom footer row row-cols-5 py-5 align-items-center justify-content-between">

    <div class="col">
      <a href="./index.php" class="d-flex mb-3 text-decoration-none text-light">
      <img src="./assets/logo.png" style="width: 200px;">
      <h5 style="font-size: 15px;"> Perumahan Permata Buah Batu, Soreang, Bojong Soang</span>
      </a>
    </div>


    <div class="col">
      <h5>Customer Service</h5>
      <ul class="nav flex-column">
        <li class="nav-item"><a href="./pages/contact_us.php" class="nav-link p-0 text-light">Contact Us</a></li>
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