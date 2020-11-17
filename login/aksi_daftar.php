<?php 
include '../config/koneksi.php';

$nama_lengkap = $_POST['nama_lengkap'];
$nama_pengguna = $_POST['nama_pengguna'];
$email = $_POST['email'];
$kata_sandi = md5($_POST['kata_sandi']);
$ulang_kata_sandi = md5($_POST['ulang_kata_sandi']);
$jenjang_pendidikan = $_POST['jenjang_pendidikan'];


if ($kata_sandi == $ulang_kata_sandi){
	$query = mysqli_query($db,"INSERT INTO pengguna VALUES ('','$nama_lengkap','$nama_pengguna','$email','$kata_sandi','pengguna','$jenjang_pendidikan','default.png')");
	if($query) echo "<script>alert('Pendaftaran berhasil');document.location='index.php'</script>";
	}else {
		echo "<script>alert('Kata sandi pencocok tidak sama');document.location='daftar.php'</script>";
	}
 ?>
