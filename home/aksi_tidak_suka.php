<?php 
include '../config/koneksi.php';
session_start();
$id_pertanyaan = $_POST['id_pertanyaan'];
$id_jawaban = $_POST['id_jawaban'];
$id_pengguna = $_POST['id_pengguna'];

mysqli_query($db,"DELETE FROM suka WHERE id_pertanyaan='$id_pertanyaan' AND id_jawaban='$id_jawaban' AND id_pengguna='$id_pengguna'");
header("location: pertanyaan.php?id=$id_pertanyaan");
 ?>