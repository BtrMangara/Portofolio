<?php

include '../../db/connection.php';

session_start();
if (!isset($_SESSION["user"])){
    header("Location: ../login.php");
  }

  $id1 = $_SESSION['user']['id'];
  $query2 = mysqli_query($connection, "SELECT * from tb_user WHERE id='$id1'");
  $user = mysqli_fetch_array($query2);

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
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <script src="https://kit.fontawesome.com/2b39d4f993.js" crossorigin="anonymous"></script>


    <title>Tugas Akhir</title>

    <script>
          
          function hitung(value){
            var total_harga;

            total_harga = <?php echo $produk['harga_produk'];?> * value;
            
            
            document.getElementById('total_harga').value = new Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR"}).format(total_harga);;
          }

    </script>
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
              <a class="nav-link text-dark" href="./contact_us.php">Contact</a>
            </li>
          </ul>
        
          <ul class="nav navbar-nav d-flex ms-auto me-5">
            
            <li class="nav-item dropdown text-center">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="fs-6">Hello, <?= $user['username']; ?>
              </a>
              <ul class="dropdown-menu px-6 border-0 text-center" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="./your_order.php">Your Order</a></li>
                <li><a class="dropdown-item" href="../command/logout.php">Logout</a></li>
              </ul>
            </li>

          </ul>


        </div>
      </div>
    </nav>
 <!-- Navbar  -->

 
<div class="container-fluid p-0">
  <div class="container mt-5">
    <div class="product align-items-center">
      
      <div class="card border-0 mb-3" style="max-width: 1920px;">
        <div class="row g-0 align-items-center justify-content-center">
          <div class="col-lg-10 col-sm-12 ">
            <form action="../command/input_order.php?id=<?php echo $produk['id'];?>" method="POST" enctype="multipart/form-data" class="py-5">
                <div class="mb-3 row align-items-center justify-content-center">

                    <div class="col-lg-2 col-6 text-center">
                        <img src="../../assets/brand_photo/<?php echo $produk['gambar_produk'];?>" class="img-fluid" style="max-width: 100px;">
                    </div>

                    <div class="col-lg-4 col-6">
                        <label><?php echo $produk['nama_produk'];?></label>
                    </div>

                    <div class="col-lg-1 col-6 text-sm-center mb-2">
                        Subtotal : 
                    </div>

                    <div class="col-lg-2 col-6 mb-2">
                    <input id="total_harga" readonly name="tot_harga" class="form-control col-6" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="col-lg-2 text-sm-center col-6">
                       Jumlah : 
                    </div>

                    <div class="col-lg-1 col-6">
                        <input required class="form-control col-6"  name="jumlah_pesanan" id="exampleInputEmail1" aria-describedby="emailHelp" onkeyup="hitung(this.value);">
                    </div>

                    <div class="col-12 mt-5 text-center"><h3>Detail Pesanan</h1></div>
                    
                </div>

                
                <div class="mb-3 row align-items-center justify-content-center mt-5">
                
                <div class="col-6 text-start-50">
                    <label for="exampleInputEmail1" class="form-label col-6">Nama Pemesan</label>
                    </div>
                    <div class="col-4 text-end">
                    <input readonly value="<?php echo $user['username']; ?>" name="nama_pemesan" class="form-control col-6 text-end" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="mb-3 row align-items-center justify-content-center">
                    <div class="col-6 text-start-50">
                    <label for="exampleInputEmail1" class="form-label col-6">No Telepon / No. WhatsApp</label>
                    </div>
                    <div class="col-4 text-end">
                    <input required name="no_telp" class="form-control col-6 text-end" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="mb-3 row align-items-center justify-content-center">
                    <div class="col-6 text-start-50">
                    <label for="exampleInputEmail1" class="form-label col-6">Provinsi</label>
                    </div>
                    <div class="col-4 text-end">
                    <input required name="provinsi" class="form-control col-6" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="mb-3 row align-items-center justify-content-center">
                    <div class="col-6 text-start-50">
                    <label for="exampleInputEmail1" class="form-label col-6">Kabupaten / Kota</label>
                    </div>
                    <div class="col-4 text-end">
                    <input required name="kabupaten" class="form-control col-6" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="mb-3 row align-items-center justify-content-center">
                    <div class="col-6 text-start-50">
                    <label for="exampleInputEmail1" class="form-label col-6">Kecamatan</label>
                    </div>
                    <div class="col-4 text-end">
                    <input required name="kecamatan" class="form-control col-6" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="mb-3 row align-items-center justify-content-center">
                    <div class="col-6 text-start-50">
                    <label for="exampleInputEmail1" class="form-label col-6">Kode Pos</label>
                    </div>
                    <div class="col-4 text-end">
                    <input required name="kode_pos" class="form-control col-6" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="mb-3 row align-items-center justify-content-center">
                    <div class="col-6 text-start-50">
                    <label for="exampleInputEmail1" class="form-label col-6">Alamat</label>
                    </div>
                    <div class="col-4 text-end">
                    <input required name="alamat" class="form-control col-6" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="mb-3 row align-items-end justify-content-end">
                <div class="col-lg-3 col-sm-12 text-center">
                <button type="submit" class="btn btn-primary" name="input-order">Submit</button>
                </div>
                </div>
                </div>
        </form>
          
        </div>
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