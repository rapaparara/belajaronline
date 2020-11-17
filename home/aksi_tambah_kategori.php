<?php 
include '../config/koneksi.php';

$nama_kategori = $_POST['nama_kategori'];

mysqli_query($db,"INSERT INTO kategori VALUES ('','$nama_kategori')");
header("location:kategori.php")

 ?>