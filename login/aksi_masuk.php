<?php 
include '../config/koneksi.php';
 session_start();
$nama_pengguna = $_POST['nama_pengguna'];
$kata_sandi = md5($_POST['kata_sandi']);

$query = mysqli_query($db,"SELECT * FROM pengguna WHERE nama_pengguna ='$nama_pengguna' AND kata_sandi='$kata_sandi'");
while($row=mysqli_fetch_array($query)){
	$_SESSION['id_pengguna'] = $row['id_pengguna'];
	$_SESSION['nama_lengkap'] = $row['nama_lengkap'];
}

$cek = mysqli_num_rows($query);
	if ($cek > 0) {
		$_SESSION['nama_pengguna'] = $nama_pengguna;
		header("location:../home/index.php");
	}else{
		echo "gagal masuk";
		header("location:index.php");
	}
 ?>

