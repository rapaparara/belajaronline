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
			<?php 
			$id_pengguna= $_SESSION['id_pengguna'];
			$id = $_GET['id'];
			$query = mysqli_query($db,"SELECT * FROM pertanyaan INNER JOIN pengguna ON pertanyaan.id_pengguna = pengguna.id_pengguna WHERE id_pertanyaan = '$id'");
			$query2 = mysqli_query($db,"SELECT * FROM jawaban INNER JOIN pengguna ON jawaban.id_pengguna = pengguna.id_pengguna WHERE id_pertanyaan = '$id'");
			$jumlah = mysqli_num_rows($query2);
			while ($row = mysqli_fetch_array($query)) {
				 ?>
			<div class="info-pengguna">
				<img src="../images/<?php echo $row['fotoprofil'] ?>">
				<div class="info-keterangan">
			 	<p>Ditanyakan oleh : <a href="pengguna.php?id=<?php echo $row['id_pengguna'] ?>"><?php echo $row['nama_lengkap'] ?></a></p>
				<p><?php echo "Pada : ".$row['waktu'];  ?></p>
				</div>
			</div>
			 <h2><?php echo $row['isi_pertanyaan']; ?><button style="margin-left: 10px;"><a href="aksi_hapus_pertanyaan.php?id=<?php echo $row['id_pertanyaan']; ?>">Hapus</a></button></h2>
			 <p>Jawaban:</p>
			 <?php
			 if($jumlah>0){
			 		?>
			 		<table>
			 			<?php while($row2=mysqli_fetch_array($query2)){ ?>
			 				<tr>
			 					<td><?php echo $row2['nama_lengkap'].":".$row2['isi_jawaban']; ?></td>
			 					<td><button style="margin-left: 10px;"><a href="aksi_hapus_jawaban.php?id=<?php echo $row2['id_jawaban']; ?>">Hapus</a></button></td>
			 				</tr>
			 			<?php } ?>
			 		</table>
			 		<?php 
			 }
			}
			 ?>
		</div>
	
</body>
</html>