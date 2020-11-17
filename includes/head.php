<?php 
	session_start();
	if (!$_SESSION['nama_pengguna']) {
		// header("location:../login/");
		echo "<script>alert('Maaf, Anda harus masuk terlebih dahulu');document.location='../login/'</script>";
	}
	include '../config/koneksi.php';
	 ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../includes/main.css">
	<title>Open Belajar Online</title>