<?php 
include '../config/koneksi.php';

$id_pertanyaan = $_GET['id'];

mysqli_query($db,"DELETE FROM pertanyaan WHERE id_pertanyaan='$id_pertanyaan'");
header("location: lihat_pertanyaan.php");
 ?>
