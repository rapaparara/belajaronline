<?php 
include '../config/koneksi.php';

$id_kategori = $_GET['id'];

mysqli_query($db,"DELETE FROM kategori WHERE id_kategori='$id_kategori'");
header("location: kategori.php");
 ?>
