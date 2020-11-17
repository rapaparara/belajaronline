<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../includes/main.css">
	<title>Masuk</title>
</head>
<body>
	<?php include '../includes/navbar-login.php' ?>
	
	<div class="container">
	<form style="margin: auto;" class="form-tabel" action="aksi_masuk.php" method="post">
		<h2>Masuk</h2>
		<label>Username</label>
		<input type="text" name="nama_pengguna"><br>
		<label>Password</label>
		<input type="password" name="kata_sandi"><br>
		<input class="btn-simpan" type="submit" value="Masuk">
		<label>Belum punya akun? <a href="daftar.php">Daftar disini</a></label>
	</form>	
	</div>
</body>
</html>