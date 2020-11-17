<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../includes/head.php' ?>
</head>
<body>
	<?php include '../includes/navbar.php' ?>

	<div class="container">
		<?php include '../includes/menu.php' ?>
		<div class="content">
			<h1>Masukkan Pertanyaan</h1>
			<form class="form-tabel" action="aksi_pertanyaan.php" method="post">
				<textarea required name="isi_pertanyaan"></textarea>
				<label>Kategori :</label>
				<select name="kategori">
				<?php 
				$query = mysqli_query($db,"SELECT * FROM kategori");
				while($d = mysqli_fetch_array($query)){
				?>
				<option value="<?php echo $d['id_kategori'] ?>"><?php echo $d['nama_kategori']; ?></option>
				<?php } ?>
				</select>
				<input class="btn-simpan" type="submit" value="Tanyakan">
			</form>
		</div>	
	</div>
	
</body>
</html>