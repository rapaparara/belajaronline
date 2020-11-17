<!DOCTYPE html>
<html lang="en">
<head>
	<?php  
	include '../includes/head.php';
	?>
</head>
<body>
	<?php include '../includes/navbar.php'; ?>
	<div class="container">
		<?php include '../includes/menu.php'; ?>
		<div class="content">
			<div class="pertanyaan">
			<h1>Pertanyaan Saya</h1>
			<?php 
				$id_pengguna = $_SESSION['id_pengguna'];
				$query = mysqli_query($db,"SELECT * FROM pertanyaan where id_pengguna = '$id_pengguna' ");
				$jumlah = mysqli_num_rows($query);
				if ($jumlah > 0) {
					while ($row = mysqli_fetch_array($query)) {
				 ?>
				<h2><a href="pertanyaan.php?id=<?php echo $row['id_pertanyaan']; ?>"><?php echo $row['isi_pertanyaan']; ?></a></h2>
				<?php } 
					}else{
						echo "Anda belum membuat pertanyaan";
				   } ?>
			</div>
		</div>
	</div>
</body>
</html>