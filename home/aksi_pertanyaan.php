<?php 

session_start();
include '../config/koneksi.php';

date_default_timezone_set('Asia/Singapore');
$waktu = date('Y-m-d h:i:s');
$id_pengguna = $_SESSION['id_pengguna'];
$isi_pertanyaan = $_POST['isi_pertanyaan'];
$kategori = $_POST['kategori'];

mysqli_query($db,"INSERT INTO pertanyaan VALUES ('','$id_pengguna','$kategori','belum','$isi_pertanyaan','$waktu')");
header("location:index.php")

 ?>