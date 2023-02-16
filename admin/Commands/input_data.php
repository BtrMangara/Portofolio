<?php

    include '../../db/connection.php';

    if(isset($_POST['submit'])){
        $nama = $_POST['nama_produk'];
        $harga = $_POST['harga_produk'];
        $deskripsi = $_POST['deskripsi_produk'];
        $stok = $_POST['stok_produk'];
        $gambar = $_FILES['gambar_produk']['name'];
        
        if($gambar != ""){

        $extension_accepted = ['png', 'jpg', 'svg','webp'];
        $x = explode('.', $gambar);
        $extension = strtolower(end($x));
        $file_tmp = $_FILES['gambar_produk']['tmp_name'];
        $rand = rand(1,999);
        $new_name = $rand . '-' . $gambar;

        if(in_array ($extension, $extension_accepted)){
            move_uploaded_file($file_tmp, '../../assets/brand_photo/' . $new_name);

            $query = "INSERT INTO produk (nama_produk,harga_produk,deskripsi_produk,stok_produk,gambar_produk) VALUES (
                '$nama','$harga','$deskripsi','$stok','$new_name'
            )";
    
            $result = mysqli_query($connection, $query);
            if (!$result){
                die("query gagal dijalankan : " . mysqli_errno($connection)) .
                " - " . mysqli_error($connection);
            } else{
                echo "<script>alert('Data Berhasil Ditambah.'); window.location='../index.php';</script>";
            }

        }else{
            echo "<script>alert('Ekstensi Tidak Diperbolehkan .'); window.location='../index.php';</script>";
        }


        }

        else{
        $query = "INSERT INTO produk (nama_produk,harga_produk,deskripsi_produk,stok_produk) VALUES (
            '$nama','$harga','$deskripsi','$stok'
        )";

        $result = mysqli_query($connection, $query);
        
        if (!$result){
            die("query gagal dijalankan : " . mysqli_errno($connection)) .
            " - " . mysqli_error($connection);
        } else{
            echo "<script>alert('Data Berhasil Ditambah.'); window.location='../index.php';</script>";
        }

        
        }

    }

    else{
        header("Location: ../index.php");
    }

?>