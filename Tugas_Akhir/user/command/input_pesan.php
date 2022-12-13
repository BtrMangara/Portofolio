<?php
include ('../../db/connection.php');

if(isset($_POST['submit_pesan'])){
    $nama = $_POST['nama'];
    $email= $_POST['email'];
    $pesan = $_POST['pesan'];
    
    $query = "INSERT INTO tb_pesan(nama,email,pesan) VALUES (
        '$nama','$email','$pesan'
    )";

    $result = mysqli_query($connection, $query);
    
    if (!$result){
        die("query gagal dijalankan : " . mysqli_errno($connection)) .
        " - " . mysqli_error($connection);
    } else{
        echo "<script>alert('Pesan Berhasil Dikirim.'); window.location='../pages/contact_us.php';</script>";
    }

    
}



?>