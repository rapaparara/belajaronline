<?php 
include '../config/koneksi.php';

$nama_lengkap = $_POST['nama_lengkap'];
$nama_pengguna = $_POST['nama_pengguna'];
$email = $_POST['email'];
$jenjang_pendidikan = $_POST['jenjang_pendidikan'];
$id_pengguna = $_POST['id_pengguna'];
$fotoprofil = $_FILES['fotoprofil']['name'];

if($fotoprofil!='') {
	$ekstensi_boleh = array('jpg','JPG','png','PNG');
	$x = explode('.', $fotoprofil);
	$ekstensi = strtolower(end($x));
	$file_tmp = $_FILES['fotoprofil']['tmp_name'];
	$fotoprofil_baru = $nama_pengguna.'-'.time().'.'.$ekstensi;


	if(in_array($ekstensi, $ekstensi_boleh)==true){
		move_uploaded_file($file_tmp, '../images/'.$fotoprofil_baru);

		mysqli_query($db,"UPDATE pengguna SET nama_pengguna='$nama_pengguna',nama_lengkap='$nama_lengkap',email='$email',jenjang_pendidikan='$jenjang_pendidikan',fotoprofil='$fotoprofil_baru' WHERE id_pengguna = $id_pengguna ");
		header("location:pengguna.php?id=$id_pengguna");
	} else {
		echo "<script>alert('Ekstensi ini tidak diperbolehkan');document.location='index.php'</script>";
	}
} else {
	mysqli_query($db,"UPDATE pengguna SET nama_pengguna='$nama_pengguna',nama_lengkap='$nama_lengkap',email='$email',jenjang_pendidikan='$jenjang_pendidikan' WHERE id_pengguna = $id_pengguna ");
	header("location:pengguna.php?id=$id_pengguna");
}

 ?>