<?php

include '../../db/connection.php';
session_start();

if(!isset($_SESSION['admin'])){
    header("Location:../pages/edit_order.php");
}

$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM produk WHERE id='$id';");
$produk = mysqli_fetch_array($query);

if(isset($_POST['update_produk'])){
 
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $stok_produk = $_POST['stok_produk'];
    $gambar_produk = $_FILES['gambar_produk']['name'];
    
    if($gambar_produk != ""){

    $extension_accepted = ['png', 'jpg', 'svg','webp'];
    $x = explode('.', $gambar_produk);
    $extension = strtolower(end($x));
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];
    $rand = rand(1,999);
    $new_name = $rand . '-' . $gambar_produk;

    if(in_array ($extension, $extension_accepted)){
        unlink('../../assets/brand_photo/'.$produk['gambar_produk']);
        move_uploaded_file($file_tmp, '../../assets/brand_photo/' . $new_name);

        $query = "UPDATE produk SET nama_produk = '$nama_produk', harga_produk = '$harga_produk', deskripsi_produk = '$deskripsi_produk', stok_produk = '$stok_produk', gambar_produk = '$new_name'  WHERE id=$id
            ";
        

        $result = mysqli_query($connection, $query);
        if (!$result){
            die("query gagal dijalankan : " . mysqli_errno($connection)) .
            " - " . mysqli_error($connection);
        } else{
            echo "<script>alert('Data Berhasil Diubah.'); window.location='../index.php';</script>";
        }

    }else{
        echo "<script>alert('Ekstensi Tidak Diperbolehkan .'); window.location='../pages/edit_produk.php?id=$id';</script>";
    }


    }

    // else{
    //     $query = "UPDATE tb_order SET status = '$status', no_resi = '$no_resi'  WHERE id=$id";

    // $result = mysqli_query($connection, $query);
    
    // if (!$result){
    //     die("query gagal dijalankan : " . mysqli_errno($connection)) .
    //     " - " . mysqli_error($connection);
    // } else{
    //     echo "<script>alert('Data Berhasil Diubah.'); window.location='../order.php';</script>";
    // }

    
    // }

}

?>