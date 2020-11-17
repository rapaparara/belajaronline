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
			<h1>Daftar Nama Pengguna</h1>
			<?php 
				$query = mysqli_query($db,"SELECT * FROM pengguna");
			 ?>
			<table>
				<?php while($row = mysqli_fetch_array($query)){ ?>
					<tr>
						<td><?php echo $row['nama_lengkap'];?></td>
						<td><button><a href="aksi_hapus_pengguna.php?id=<?php echo $row['id_pengguna']; ?>">Hapus</a></button></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	
</body>
</html>