<?php

include '../../db/connection.php';

if(!isset($_GET['id'])){
    header("Location:../pages/edit_order.php");
}

$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM tb_order WHERE id='$id';");
$order = mysqli_fetch_array($query);

if(isset($_POST['update-order'])){
 
    $status = $_POST['status'];
    $no_resi = $_POST['no_resi'];
    $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
    
    if($bukti_pembayaran != ""){

    $extension_accepted = ['png', 'jpg', 'svg','webp'];
    $x = explode('.', $bukti_pembayaran);
    $extension = strtolower(end($x));
    $file_tmp = $_FILES['bukti_pembayaran']['tmp_name'];
    $rand = rand(1,999);
    $new_name = $rand . '-' . $bukti_pembayaran;

    if(in_array ($extension, $extension_accepted)){
        unlink('../../assets/bukti_pembayaran/'.$order['bukti_pembayaran']);
        move_uploaded_file($file_tmp, '../../assets/bukti_pembayaran/' . $new_name);

        $query = "UPDATE tb_order SET status = '$status', no_resi = '$no_resi', bukti_pembayaran = '$new_name'  WHERE id=$id
            ";
        

        $result = mysqli_query($connection, $query);
        if (!$result){
            die("query gagal dijalankan : " . mysqli_errno($connection)) .
            " - " . mysqli_error($connection);
        } else{
            echo "<script>alert('Data Berhasil Diubah.'); window.location='../order.php';</script>";
        }

    }else{
        echo "<script>alert('Ekstensi Tidak Diperbolehkan .'); window.location='../pages/edit_order.php?id=$id';</script>";
    }


    }

    else{
        $query = "UPDATE tb_order SET status = '$status', no_resi = '$no_resi'  WHERE id=$id";

    $result = mysqli_query($connection, $query);
    
    if (!$result){
        die("query gagal dijalankan : " . mysqli_errno($connection)) .
        " - " . mysqli_error($connection);
    } else{
        echo "<script>alert('Data Berhasil Diubah.'); window.location='../order.php';</script>";
    }

    
    }

}

?>