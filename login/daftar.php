<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../includes/main.css">
	<title>Daftar</title>
</head>
<body>
	<?php include '../includes/navbar-login.php' ?>
	<div class="container">
	<form style="margin: auto;" class="form-tabel" action="aksi_daftar.php" method="post">
		<h2>Daftar</h2>
		<label>Nama Lengkap :</label>
		<input required type="text" name="nama_lengkap" placeholder="Nama Lengkap"><br>
		<label>Nama Pengguna :</label>
		<input required type="text" name="nama_pengguna" placeholder="Nama Pengguna"><br>
		<label>Email :</label>
		<input type="email" name="email" placeholder="Email"><br>
		<label>Kata Sandi :</label>
		<input required type="password" name="kata_sandi" placeholder="Kata Sandi"><br>
		<label>Masukan Ulang Kata Sandi :</label>
		<input required type="password" name="ulang_kata_sandi" placeholder="Masukan Ulang Kata Sandi"><br>
		<label>Jenjang Pendidikan :</label>
		<select name="jenjang_pendidikan">
			<option value="sd">SD/MI</option>
			<option value="smp">SMP/MTS</option>
			<option value="sma">SMA/SMK</option>
			<option value="kuliah">Kuliah</option>
			<option value="lainnya" selected>Lainnya</option>
		</select><br>
		<input class="btn-simpan" type="submit" value="Daftar"	>
	</form>
	</div>
	
</body>
</html>