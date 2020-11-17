<?php 
include '../config/koneksi.php';
session_start();

$id = $_POST['id_pengguna'];
$kata_sandi = md5($_POST['kata_sandi']);
$kata_sandi_baru = md5($_POST['kata_sandi_baru']);
$kata_sandi_baru2 = md5($_POST['kata_sandi_baru2']);

$query = mysqli_query($db, "SELECT kata_sandi FROM pengguna WHERE id_pengguna='$id' ");

while ($row=mysqli_fetch_array($query)) {
	if($kata_sandi==$row['kata_sandi']){
		if($kata_sandi_baru==$kata_sandi_baru2){
			mysqli_query($db, "UPDATE pengguna SET kata_sandi='$kata_sandi_baru' WHERE id_pengguna = '$id' ");
			echo "<script>alert('Kata sandi berhasil diubah');document.location='edit_kata_sandi.php?id=$_SESSION[id_pengguna]'</script>";
		}
		else {
			echo "<script>alert('Kata sandi pencocok tidak sama');document.location='edit_kata_sandi.php?id=$_SESSION[id_pengguna]'</script>";
		}
	}
	else {
		echo "<script>alert('Kata sandi yang anda masukkan salah');document.location='edit_kata_sandi.php?id=$_SESSION[id_pengguna]'</script>";
	}
}


 ?>