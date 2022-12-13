<?php

include '../../db/connection.php';

$id = $_GET['id'];
$query = mysqli_query($connection,"SELECT * FROM produk WHERE id = '$id';");
$data = mysqli_fetch_array($query);
$gambar = $data['gambar_produk'];

$kode = mysqli_query($connection, "DELETE FROM produk WHERE id=$id");
unlink('../../assets/brand_photo/'.$gambar);

header("Location:../index.php");

?>