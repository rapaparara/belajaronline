<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../includes/head.php'; ?>
</head>
<body>
	<?php include '../includes/navbar.php'; ?>
	<div class="container">
		<?php include '../includes/menu.php'; ?>
		<div class="content">
			<?php  
			$id_pengguna = $_GET['id'];
			if($_SESSION['id_pengguna']==$id_pengguna){
			?>
			<form class="form-tabel" action="aksi_update_sandi.php" method="post">
			<input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna ?>">
			<label>Kata Sandi Sekarang :</label>
			<input type="password" name="kata_sandi" placeholder="Kata Sandi Sekarang"><br>
			<label>Kata Sandi Baru :</label>
			<input type="password" name="kata_sandi_baru" placeholder="Kata Sandi Sekarang"><br>
			<label>Ulang Kata Sandi Baru :</label>
			<input type="password" name="kata_sandi_baru2" placeholder="Kata Sandi Sekarang"><br>
			<input class="btn-simpan" type="submit" value="Simpan">
			</form>
		<?php } else echo "<script>alert('Ini bukan anda');document.location='pengguna.php?id=$_SESSION[id_pengguna]'</script>"; ?>
		</div>
	</div>
</body>
</html>