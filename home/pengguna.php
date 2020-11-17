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
			$id = $_GET['id'];

			$query = mysqli_query($db,"SELECT * FROM pengguna WHERE id_pengguna='$id' ");
			while ($d = mysqli_fetch_array($query)) {
			?>
			<div class="profil">
			<h1>Profil Pengguna</h1>
			<img src="../images/<?php echo $d['fotoprofil'] ?>">
			<label>Nama Lengkap : </label>
			<label class="isi"><?php echo $d['nama_lengkap']; ?></label>
			<label>Nama Pengguna : </label>
			<label class="isi"><?php echo $d['nama_pengguna']; ?></label>
			<label>Email : </label>
			<label class="isi"><?php echo $d['email']; ?></label>
			<label>Jenjang Pendidikan :	</label>
			<label class="isi">
				 <?php 
				if ($d['jenjang_pendidikan']=='sd'){
					echo "Sekolah Dasar";
				}elseif ($d['jenjang_pendidikan']=='smp') {
					echo "Sekolah Menengah Pertama";
				}elseif ($d['jenjang_pendidikan']=='sma') {
					echo "Sekolah Menengah Atas";
				}elseif ($d['jenjang_pendidikan']=='kuliah') {
					echo "Perguruan Tinggi";
				}else {
					echo "Lainnya";}
			 ?>			
			</label>
			<?php if($_SESSION['id_pengguna']==$d['id_pengguna']) {?>
			<h1>Pengaturan</h1>
			<label><a href="edit_pengguna.php?id=<?php echo $id ?>">Edit Profil Saya</a></label>
			<label><a href="edit_kata_sandi.php?id=<?php echo $id ?>">Ganti kata sandi</a></label>
			<?php } ?>
			</div>


		<?php }  ?>
		</div>
	</div>
</body>
</html>