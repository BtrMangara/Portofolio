<?php 

include '../db/connection.php';
session_start();
if(!isset($_SESSION["admin"]))
    header("Location: ./login.php");

    $id = $_SESSION['admin']['id'];
    $query= mysqli_query($connection,"SELECT * FROM tb_admin WHERE id='$id'");
    $user = mysqli_fetch_array($query);

    $query_order = "SELECT * FROM tb_order";
    $order = mysqli_query($connection,$query_order);


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


          <div class="nav nav-pills mb-auto col-md-3 col-lg-3">
            <div class="col-md-4 col-lg-12 col-12 w-75 btn-outline-primary mb-1 ">
              <a href="./index.php" class="nav-link link-dark">
                <i class="fa-solid fa-box"></i>
                Product
              </a>
            </div>
            <div class="nav-pills col-md-3 col-lg-3 w-75 btn-primary mb-1">
              <a href="#" class="nav-link link-dark active">
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
              <div class="product align-items-center">
      
                <div class="card border-0 mb-3" style="max-width: 1920px;">
                  <div class="row g-0 align-items-center justify-content-center">
                    <div class="col-lg-12 text-center mt-3 mb-3">
                      <h2>Data Pesanan</h1>
                    </div>

                    <div class="col-lg-12 mt-3 mb-3">
                    <table class="table">
                      <thead class="text-center">
                          <tr>
                          <th scope="col-lg-1">Kode Pemesanan</th>
                          <th scope="col-lg-1">Tanggal Pemesanan</th>
                          <th scope="col-lg-1">Nama Pemesan</th>
                          <th scope="col-lg-2">No Telp</th>
                          <th scope="col-lg-3">Barang Pesanan</th>
                          <th scope="col-lg-1">Jumlah Pesanan</th>
                          <th scope="col-lg-1">Alamat Pengiriman</th>
                          <th scope="col-lg-1">Status</th>
                          <th scope="col-lg-1">No Resi</th>
                          <th scope="col-lg-1">Bukti Pembayaran</th>
                          <th scope="col-lg-1">Action</th>
                          </tr>
                      </thead>

                      <tbody class="table-group">
                          <?php while ($order1 = mysqli_fetch_assoc($order)) :?>
                          <tr>
                          <th scope="row"><?php echo $order1['kode_pemesanan'];?></th>
                          <td><?php echo $order1['tanggal_pesanan'];?></td>
                          <td><?php echo $order1['nama_pemesan'];?></td>
                          <td><?php echo $order1['no_telp'];?></td>
                          <td><?php echo $order1['barang_pesanan'];?></td>
                          <td><?php echo $order1['jumlah_pesanan'];?></td>
                          <td>
                            <?php echo $order1['alamat'] .' , '; echo $order1['provinsi'].' , '; echo $order1['kabupaten'].' , '; echo $order1['kecamatan'].' , '; echo $order1['kode_pos'];?>
                          </td>
                          <?php if($order1['status'] == 'Menunggu Konfirmasi'){
                                      echo "<td class='bg-warning text-center'>";
                                      echo $order1['status'];
                                      echo"</td>";
                          }
                          elseif($order1['status'] == 'Sedang Dikirim'){
                              echo "<td class='bg-primary text-center'>";
                              echo $order1['status'];
                              echo"</td>";
                          }
                          elseif($order1['status'] == 'Selesai'){
                              echo "<td class='bg-success text-center'>";
                              echo $order1['status'];
                              echo"</td>";
                          }
                          ?>
                          <td><?php echo $order1['no_resi'];?></td>
                          <td ><img src="../assets/bukti_pembayaran/<?php echo $order1['bukti_pembayaran'];?>" class="img-fluid" style="max-width: 70px; min-width: 70px;"></td>
                          <td><a href="./pages/edit_order.php?id=<?php echo $order1['id'];?>"><button type="button" class="btn btn-primary btn-sm">Konfirmasi Data</button></a></td>
                          </tr>
                          <?php endwhile; ?>

                      </tbody>
                  </table>
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