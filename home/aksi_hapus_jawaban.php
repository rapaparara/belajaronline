<?php 
include '../config/koneksi.php';

$id_jawaban = $_GET['id'];

mysqli_query($db,"DELETE FROM jawaban WHERE id_jawaban='$id_jawaban'");
header("location: lihat_pertanyaan.php");
 ?>
