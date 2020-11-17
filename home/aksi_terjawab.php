<?php 
include '../config/koneksi.php';

$id_pertanyaan = $_POST['id_pertanyaan'];
$id_jawaban = $_POST['id_jawaban'];

mysqli_query($db,"UPDATE jawaban SET status='pilih' WHERE id_jawaban='$id_jawaban' AND id_pertanyaan='$id_pertanyaan' ");
mysqli_query($db,"UPDATE pertanyaan SET status='terjawab' WHERE id_pertanyaan='$id_pertanyaan' ");
header("location:pertanyaan.php?id=$id_pertanyaan")
 ?>