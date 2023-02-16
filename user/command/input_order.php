<?php

include '../../db/connection.php';

session_start();
  if (!isset($_SESSION["user"])){
      header("Location: ./login.php");
    }

  $id = $_GET['id'];
  $query= mysqli_query($connection, "SELECT * FROM produk WHERE id = '$id'");
  $produk = mysqli_fetch_array($query);

    

if(isset($_POST['input-order'])){

    $kode_pemesanan = "7SRC - ".rand(1111,9999);
    $tanggal_pesanan = date_create('now')->format('d-m-Y');
    $id_pemesan = $_SESSION['user']['id'];
    $nama =  $_POST['nama_pemesan'];
    $no_telp = $_POST['no_telp'];
    $provinsi = $_POST['provinsi'];
    $kabupaten = $_POST['kabupaten'];
    $kecamatan = $_POST['kecamatan'];
    $kode_pos = $_POST['kode_pos'];
    $alamat =  $_POST['alamat'];
    $barang_pesanan = $produk['nama_produk'];
    $jumlah_pesanan = $_POST['jumlah_pesanan'];
    $total_harga = $_POST['tot_harga'];
    

    if($nama != ""){
        $query = "INSERT INTO tb_order (kode_pemesanan,tanggal_pesanan,id_pemesan,nama_pemesan,no_telp,provinsi,kabupaten,kecamatan,kode_pos,alamat,barang_pesanan,jumlah_pesanan,total_harga) 
        VALUES ('$kode_pemesanan','$tanggal_pesanan','$id_pemesan','$nama','$no_telp','$provinsi','$kabupaten','$kecamatan','$kode_pos','$alamat','$barang_pesanan','$jumlah_pesanan','$total_harga'
        )";

        $result = mysqli_query($connection, $query);
    
        if (!$result){
            die("query gagal dijalankan : " . mysqli_errno($connection)) .
            " - " . mysqli_error($connection);
        } else{
            echo "<script>alert('Pemesanan Berhasil Berhasil!'); window.location='../pages/desc_product.php?id=$id';</script>";
        }
    
        }else{
        echo "<script>alert('Gagal Mereservasi Tempat .'); window.location=../pages/desc_product.php?id=$id';</script>";
        }
    }

    else{
    header("Location: ../index.php");
    }


    


?>