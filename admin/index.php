<?php 

include '../db/connection.php';
session_start();
if(!isset($_SESSION["admin"]))
    header("Location: ./login.php");

    $id = $_SESSION['admin']['id'];
    $query= mysqli_query($connection,"SELECT * FROM tb_admin WHERE id='$id'");
    $user = mysqli_fetch_array($query);

    $query_barang = mysqli_query($connection,"SELECT * from produk");
    

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <script src="https://kit.fontawesome.com/2b39d4f993.js" crossorigin="anonymous"></script>

    <title>Tugas Akhir</title>
    <script src="https://cdn.tiny.cloud/1/wx7j44vqmj421ag5227e83hkkd8lfr9q9dyqk9cc1sc9tvvx/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        
        <script>
             tinymce.init({
               selector: '#editor',
               resize : false,
               menubar : false,
               statusbar : false
              });
        </script>

  </head>
  <body >

    <style type="text/css">
      
      

    </style>
    

    <!-- Navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand p-0" href="./index.php"><img src="../assets/logo.png"  class="d-inline-block align-text-top"></a>
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
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="./Commands/logout.php">Sign out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 <!-- Navbar  -->

 

  <div class="container-fluid mt-3">
      
      
      <div class="row align-items-center justify-content-center">

          <div class="nav nav-pills mb-auto col-md-3 col-lg-3 ">
            <div class="col-md-3 col-lg-3 col-12 w-75 btn-primary mb-1 ">
              <a href="./index.php" class="nav-link link-dark active">
                <i class="fa-solid fa-box"></i>
                Product
              </a>
            </div>
            <div class="nav-pills col-md-3 col-lg-3 w-75 btn-outline-primary mb-1">
              <a href="./order.php" class="nav-link link-dark">
                <i class="fa-solid fa-file-invoice"></i>
                Order
              </a>
            </div>
            <div class=" nav-pills col-md-3 col-lg-3 w-75 btn-outline-primary mb-1">
              <a href="./customer.php" class="nav-link link-dark">
                <i class="fa-solid fa-users"></i> Customers 
              </a>
            </div>
          </div>

          <div class="col-md-9 col-lg-9 bg-light  align-items-center justify-content-center">
            <div class="container p-0">
              <h2 class="text-center">Data Produk</h2>

              <div class="input-data p-2">
                <h4 class="ms-1">Input Data</h4>

                <form action="./commands/input_data.php" method="POST" enctype="multipart/form-data">
                    
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                            <input required type="text" class="form-control" placeholder="Nama Produk" name="nama_produk">
                        </div>  
                        

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Harga Produk</label>
                            <input required type="text" class="form-control" name="harga_produk" placeholder="Harga Produk">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi Produk</label>
                            <textarea id="editor" class="form-control" name="deskripsi_produk" placeholder="Deskripsi Produk">
                            </textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Stok Produk</label>
                            <input required type="text" class="form-control" name="stok_produk" placeholder="Stok Produk">
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Gambar Produk</label>
                            <input class="form-control" type="file" id="formFile" name="gambar_produk">
                        </div>

                          <button name="submit" type="submit" class="btn btn-primary">Submit</button>

                    </form>

                    <div class="col-12 table-responsive mt-5">
                      
                    <table class="table table-sm table-bordered m-auto" style="max-width: 1000px; min-width: 1200px;">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">Nama Produk</th>
                          <th scope="col">Harga Produk</th>
                          <th scope="col">Deskripsi Produk</th>
                          <th scope="col">Stok Produk</th>
                          <th scope="col">Gambar Produk</th>
                          <th colspan="2" scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while ($query_barang1 = mysqli_fetch_assoc($query_barang)) :?>
                        <tr>
                          <td scope="row"><?= $query_barang1['nama_produk'] ?></th>
                          <td><?= "Rp. " . number_format($query_barang1['harga_produk'],0,"","."); ?></td>
                          <td><?php echo nl2br($query_barang1['deskripsi_produk']); ?> </td>
                          <td class="text-center"><?= $query_barang1['stok_produk'] ?></td>
                          <td class="text-center">
                          <img src="../assets/brand_photo/<?= $query_barang1['gambar_produk'] ?>" class="img-fluid">
                          </td>
                          <td><a href="./pages/edit_produk.php?id=<?= $query_barang1['id'] ?>">Edit</a></td>
                          <td><a href="./Commands/delete_data.php?id=<?= $query_barang1['id'] ?>">Delete</a></td>
                        </tr>
                      <?php endwhile; ?>
                      </tbody>
                    </table>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </html>