<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php include '../includes/head.php'; ?>
</head>
<body>
	<?php include '../includes/navbar.php'; ?>
	<div class="container">
		<?php include '../includes/menu.php'; ?>
		<div class="content">
			<div class="pertanyaan">
			<?php 
			$id_pengguna= $_SESSION['id_pengguna'];
			$id = $_GET['id'];
			if($id==""){
				echo "<script>alert('Pertanyaan tidak ditemukan');document.location='index.php'</script>";
			} else {
			$query = mysqli_query($db,"SELECT * FROM pertanyaan INNER JOIN pengguna ON pertanyaan.id_pengguna = pengguna.id_pengguna WHERE id_pertanyaan = '$id'");
			$query2 = mysqli_query($db,"SELECT * FROM jawaban INNER JOIN pengguna ON jawaban.id_pengguna = pengguna.id_pengguna WHERE id_pertanyaan = '$id'");
			$jumlah = mysqli_num_rows($query2);
			while ($row = mysqli_fetch_array($query)) {
				 ?>
			<div class="kolom-pertanyaan">
			<div class="info-pengguna">
				<img src="../images/<?php echo $row['fotoprofil'] ?>">
				<div class="info-keterangan">
			 	<b><a href="pengguna.php?id=<?php echo $row['id_pengguna'] ?>"><?php echo $row['nama_lengkap'] ?></a></b>
				<p><?php echo "Pada : ".$row['waktu'];  ?></p>
				</div>
			</div>
			<h2><?php echo $row['isi_pertanyaan']; ?></h2>
			</div>
			 <?php 
			 	if ($id_pengguna == $row['id_pengguna']) {
					if ($jumlah > 0) {
			 		while ($row2 = mysqli_fetch_array($query2)){
			 			if ($row2['status']=='pilih') {
			 				echo "<h4>Jawaban yang anda pilih :</h4>";	
			 				}
			 			?>
			 			<div class="kolom-pertanyaan">
						<div class="info-pengguna">
							<img src="../images/<?php echo $row2['fotoprofil'] ?>">
							<div class="info-keterangan">
						 	<b><a href="pengguna.php?id=<?php echo $row2['id_pengguna'] ?>"><?php echo $row2['nama_lengkap'] ?></a></b>
							<p><?php echo "Pada : ".$row2['waktu'];  ?></p>
							</div>
						</div>
			 			<h2><?php echo $row2['isi_jawaban']; ?></h2>
			 			<?php
			 			if ($row['status']=='belum'){
			 			?>
			 			<form action="aksi_terjawab.php" method="post">
			 				<input type="hidden" name="id_jawaban" value="<?php echo $row2['id_jawaban']; ?>">
			 				<input type="hidden" name="id_pertanyaan" value="<?php echo $row['id_pertanyaan']; ?>">
			 				<input class="btn-simpan" type="submit" name="terjawab" value="Pilih Jawaban">
			 			</form>
						</div>
			 			<?php
			 		}else{
			 			if ($row2['status']=='pilih') {
			 				echo "<br><h4>Jawaban lainnya :</h4>";
			 			}
			 		}
					} 
			 		} else echo "Belum ada Jawaban untuk pertanyaan ini.";
			 	} else {
			 		if($row['status']=='belum'){
			 ?>
			<form class="form-tabel" action="aksi_jawaban.php" method="post">
				<label>Masukan Jawaban</label>
				<textarea name="isi_jawaban"></textarea>
				<input type="hidden" name="id_pertanyaan" value=" <?php echo $row['id_pertanyaan'] ?> ">
				<input class="btn-simpan" type="submit" value="Jawab">
			</form>
		<?php 		}else{
						$query3=mysqli_query($db, "SELECT * FROM jawaban INNER JOIN pengguna ON jawaban.id_pengguna = pengguna.id_pengguna WHERE id_pertanyaan = '$id' AND status = 'pilih'");
						while($row3 = mysqli_fetch_array($query3)){?>
							<h4>Jawaban yang terpilih :</h4>
							<div class="kolom-pertanyaan">
							<div class="info-pengguna">
							<img src="../images/<?php echo $row3['fotoprofil'] ?>">
							<div class="info-keterangan">
						 	<b><a href="pengguna.php?id=<?php echo $row3['id_pengguna'] ?>"><?php echo $row3['nama_lengkap'] ?></a></b>
							<p><?php echo "Pada : ".$row3['waktu'];  ?></p>
							</div>
							</div>
			 				<h2><?php echo $row3['isi_jawaban']; ?></h2>
							</div>
								<?php 
								$id_pertanyaan = $row3['id_pertanyaan'];
								$id_jawaban = $row3['id_jawaban'];
								$query4=mysqli_query($db,"SELECT * FROM suka WHERE id_pertanyaan ='$id_pertanyaan' AND id_jawaban='$id_jawaban'AND id_pengguna='$id_pengguna'");
								$query5=mysqli_query($db,"SELECT * FROM suka WHERE id_pertanyaan='$id_pertanyaan'");
								$jumlah = mysqli_num_rows($query5);
									$row4=mysqli_fetch_array($query4);
									echo "Pertanyaan ini di sukai oleh ".$jumlah." orang";
								if($row4['id_pengguna']==$id_pengguna){
								 ?>
								 <form action="aksi_tidak_suka.php" method="post">
								<input type="hidden" name="id_pertanyaan" value="<?php echo $row3['id_pertanyaan']; ?>">
								<input type="hidden" name="id_pengguna" value="<?php echo $_SESSION['id_pengguna']; ?>">
								<input type="hidden" name="id_jawaban" value="<?php echo $row3['id_jawaban']; ?>">
								<input class="btn-simpan" type="submit" name="tidak_suka" value="tidak suka">
								</form>
								<?php 
								}else{
								 ?>
								 <form action="aksi_suka.php" method="post">
								<input type="hidden" name="id_pertanyaan" value="<?php echo $row3['id_pertanyaan']; ?>">
								<input type="hidden" name="id_pengguna" value="<?php echo $_SESSION['id_pengguna']; ?>">
								<input type="hidden" name="id_jawaban" value="<?php echo $row3['id_jawaban']; ?>">
								<input class="btn-simpan" type="submit" name="suka" value="suka">
								</form>
							<?php }
								?>
							
							<?php
						}
					}
				}
			} 
		}
		?>
		</div>
		</div>
	</div>
</body>
</html>