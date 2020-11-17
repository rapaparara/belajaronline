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
			<h1>Daftar Pertanyaan</h1>
			<?php 
				if (isset($_GET['cari'])){
					$cari = $_GET['cari'];
					$query2 = mysqli_query($db,"SELECT * FROM pertanyaan WHERE isi_pertanyaan LIKE '%".$cari."%' ");
					$query2 = mysqli_query($db,"SELECT * FROM jawaban INNER JOIN pengguna ON jawaban.id_pengguna = pengguna.id_pengguna WHERE id_pertanyaan = '$id'");
					while ($d = mysqli_fetch_array($query2)) {
						?>
						<h2><a href="pertanyaan.php?id=<?php echo $d['id_pertanyaan']; ?>"><?php echo $d['isi_pertanyaan']; ?></a></h2>
						<?php
					}
					}else{
						$query = mysqli_query($db,"SELECT * FROM pertanyaan");
						while ($row = mysqli_fetch_array($query)) {
							 ?>
						 <h2><a href="detail_pertannyaan.php?id=<?php echo $row['id_pertanyaan']; ?>"><?php echo $row['isi_pertanyaan']; ?></a></h2>

						 <?php
						 $query5=mysqli_query($db,"SELECT * FROM suka WHERE id_pertanyaan='$row[id_pertanyaan]'");
						$jumlah = mysqli_num_rows($query5);
						echo "Pertanyaan ini di sukai oleh ".$jumlah." orang";
						  } 
						 	}
						 	?>
		</div>
	
</body>
</html>