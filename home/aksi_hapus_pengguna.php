<?php 
include '../config/koneksi.php';

$id_pengguna = $_GET['id'];

mysqli_query($db,"DELETE FROM pengguna WHERE id_pengguna='$id_pengguna'");
header("location: lihat_pengguna.php");
 ?>
