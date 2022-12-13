<?php 

include '../../db/connection.php';
session_start();
if(!isset($_SESSION["admin"]))
    header("Location: ./login.php");

    if(!isset($_GET['id'])){
        header("Location:../order.php");
      }
    
    $id = $_GET['id'];

    $query_order = "SELECT * FROM tb_order WHERE id = '$id'";
    $order = mysqli_query($connection,$query_order);

    $getOrder = mysqli_fetch_array($order);


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <script src="https://kit.fontawesome.com/2b39d4f993.js" crossorigin="anonymous"></script>

    <title>Tugas Akhir</title>


  </head>
  <body >

    <style type="text/css">
      
      

    </style>
    

    <!-- Navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand p-0" href="..//index.php"><img src="../../assets/logo.png"  class="d-inline-block align-text-top"></a>
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


          <div class="nav nav-pills mb-auto col-md-3 col-lg-3">
            <div class="col-md-4 col-lg-12 col-12 w-75 btn-outline-primary mb-1 ">
              <a href="../index.php" class="nav-link link-dark">
                <i class="fa-solid fa-box"></i>
                Product
              </a>
            </div>
            <div class="nav-pills col-md-3 col-lg-3 w-75 btn-primary mb-1">
              <a href="./edit_order.php" class="nav-link link-dark active">
                <i class="fa-solid fa-file-invoice"></i>
                Order
              </a>
            </div>
            <div class=" nav-pills col-md-3 col-lg-3 w-75 btn-outline-primary mb-1">
              <a href="../customer.php" class="nav-link link-dark">
                <i class="fa-solid fa-users"></i> Customers 
              </a>
            </div>
          </div>

          <div class="col-md-9 col-lg-9 bg-light  align-items-center justify-content-center">
            <div class="container p-0">
              <div class="product align-items-center">
      
                <div class="card border-0 mb-3" style="max-width: 1920px;">
                  <div class="row g-0 align-items-center justify-content-center">
                    <div class="col-lg-12 text-center mt-3 mb-3">
                      <h2>Konfirmasi Data Pesanan</h1>
                    </div>

                    <div class="col-lg-10 col-sm-12 ">
                        <form action="../Commands/update_order.php?id=<?php echo $getOrder['id']; ?>" method="POST" enctype="multipart/form-data" class="py-5">

                        
                            <div class="mb-3 row align-items-center justify-content-center mt-5">
                            
                            <div class="col-6 text-start-50">
                                <label for="exampleInputEmail1" class="form-label col-6">Kode Pemesanan</label>
                                </div>
                                <div class="col-4 text-end">
                                <input readonly value="<?php echo $getOrder['kode_pemesanan']; ?>" name="kode_pemesanan" class="form-control col-6 text-end" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>

                            <div class="mb-3 row align-items-center justify-content-center">
                                <div class="col-6 text-start-50">
                                <label for="exampleInputEmail1" class="form-label col-6">Tanggal Pemesanan</label>
                                </div>
                                <div class="col-4 text-end">
                                <input readonly value="<?php echo $getOrder['tanggal_pesanan']; ?>" name="tanggal_pemesanan" class="form-control col-6 text-end" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>

                            <div class="mb-3 row align-items-center justify-content-center">
                                <div class="col-6 text-start-50">
                                <label for="exampleInputEmail1" class="form-label col-6">Nama Pemesan</label>
                                </div>
                                <div class="col-4 text-end">
                                <input readonly value="<?php echo $getOrder['nama_pemesan']; ?>" name="nama_pemesan" class="text-end form-control col-6" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>

                            <div class="mb-3 row align-items-center justify-content-center">
                                <div class="col-6 text-start-50">
                                <label for="exampleInputEmail1" class="form-label col-6">No. Telp</label>
                                </div>
                                <div class="col-4 text-end">
                                <input readonly value="<?php echo $getOrder['no_telp']; ?>" name="no_telp" class="form-control col-6 text-end" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>

                            <div class="mb-3 row align-items-center justify-content-center">
                                <div class="col-6 text-start-50">
                                <label for="exampleInputEmail1" class="form-label col-6">Barang Pesanan</label>
                                </div>
                                <div class="col-4 text-end">
                                <input readonly value="<?php echo $getOrder['barang_pesanan']; ?>" name="barang_pesanan" class="form-control col-6 text-end" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>

                            <div class="mb-3 row align-items-center justify-content-center">
                                <div class="col-6 text-start-50">
                                <label for="exampleInputEmail1" class="form-label col-6">Jumlah Pesanan</label>
                                </div>
                                <div class="col-4 text-end">
                                <input readonly value="<?php echo $getOrder['jumlah_pesanan']; ?>" name="jumlah_pesanan" class="form-control col-6 text-end" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>

                            <div class="mb-3 row align-items-center justify-content-center">
                                <div class="col-6 text-start-50">
                                <label for="exampleInputEmail1" class="form-label col-6">Alamat</label>
                                </div>
                                <div class="col-4 text-end">
                                <input readonly value="<?php echo $getOrder['alamat']; ?>" name="alamat" class="form-control col-6 text-end" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>

                            <div class="mb-3 row align-items-center justify-content-center">
                                <div class="col-6 text-start-50">
                                <label for="exampleInputEmail1" class="form-label col-6">Status</label>
                                </div>
                                <div class="col-4 text-end">
                                <select class="form-select" aria-label="Default select example" name="status">
                                    <option value="Menunggu Konfirmasi" <?php if($getOrder['status'] == "Menunggu Konfirmasi"){echo "SELECTED";} ?>>Menunggu Konfirmasi</option>
                                    <option value="Sedang Dikirim" <?php if($getOrder['status'] == "Sedang Dikirim"){echo "SELECTED";} ?>>Sedang Dikirim</option>
                                    <option value="Selesai" <?php if($getOrder['status'] == "Selesai"){echo "SELECTED";} ?>>Selesai</option>
                                </select>
                                </div>
                            </div>

                            <div class="mb-3 row align-items-center justify-content-center">
                                <div class="col-6 text-start-50">
                                <label for="exampleInputEmail1" class="form-label col-6">No Resi</label>
                                </div>
                                <div class="col-4 text-end">
                                <input name="no_resi" value="<?php echo $getOrder['no_resi']; ?>" class="form-control col-6 text-end" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>

                            <div class="mb-3 row align-items-center justify-content-center">
                                <div class="col-6 text-start-50">
                                <label for="exampleInputEmail1" class="form-label col-6">Bukti Pembayaran</label>
                                </div>
                                <div class="col-4 text-end">
                                <input class="form-control" type="file" name="bukti_pembayaran" id="formFile">
                                </div>
                            </div>

                            


                            <div class="mb-3 row align-items-end justify-content-end">
                            <div class="col-lg-3 col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary" name="update-order">Submit</button>
                            </div>
                            </div>
                            </div>
                        </form>
          
                    </div>
                    
                  </div>
                </div>


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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>