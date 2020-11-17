<?php 
include '../config/koneksi.php';
session_start();
$id_pertanyaan = $_POST['id_pertanyaan'];
$id_jawaban = $_POST['id_jawaban'];
$id_pengguna = $_POST['id_pengguna'];

$query = mysqli_query($db,"INSERT INTO suka VALUES ('','$id_pertanyaan','$id_jawaban','$id_pengguna')");
header("location: pertanyaan.php?id=$id_pertanyaan");
 ?>