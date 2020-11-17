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
			<h1>Kategori</h1>
			<?php 
			$query = mysqli_query($db,"SELECT * FROM kategori");
				?>
				<table>
					<?php
					while($row=mysqli_fetch_array($query)){
						?>
					<tr>
						<td><?php echo $row['nama_kategori'];?></td>
						<td><button><a href="aksi_hapus_kategori.php?id=<?php echo $row['id_kategori']; ?>">Hapus</a></button></td>
					</tr>
					  <?php } ?>
				</table>
			  <form class="form-tabel" action="aksi_tambah_kategori.php" method="post">
			  	<label>Tambah Kategori</label>
			  	<input type="text" name="nama_kategori"><input class="btn-simpan" type="submit" name="simpan" value="Simpan">
			  </form>
		</div>
	
</body>
</html>