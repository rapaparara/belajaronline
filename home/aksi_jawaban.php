<?php 

session_start();
include '../config/koneksi.php';

date_default_timezone_set('Asia/Singapore');
$waktu = date('Y-m-d h:i:s');
$id_pengguna = $_SESSION['id_pengguna'];
$id_pertanyaan = $_POST['id_pertanyaan'];
$isi_jawaban = $_POST['isi_jawaban'];

mysqli_query($db,"INSERT INTO jawaban VALUES ('','$id_pertanyaan','$id_pengguna','tidak','$isi_jawaban','$waktu')");
header("location:index.php")

 ?>