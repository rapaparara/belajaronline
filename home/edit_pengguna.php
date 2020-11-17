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
			$id_pengguna = $_GET['id'];
			if($_SESSION['id_pengguna']==$id_pengguna){
			$query = mysqli_query($db,"SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna' ");
			while ($d = mysqli_fetch_array($query)) {
			?>
			<form class="form-tabel" action="aksi_update_pengguna.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna ?>">
			<label><img style="height: 80px;" src="../images/<?php echo $d['fotoprofil'] ?>"></label>
			<label>Ganti Foto Profil :</label>
			<label><input type="file" name="fotoprofil" ></label>
			<p>Abaikan apabila tidak ingin mengganti</p>
			<label>Nama Lengkap :</label>
			<input type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $d['nama_lengkap'] ?>">
			<label>Nama Pengguna :</label>
			<input type="text" name="nama_pengguna" placeholder="Nama Pengguna" value="<?php echo $d['nama_pengguna'] ?>">
			<label>Email :</label>
			<input type="email" name="email" placeholder="Email" value="<?php echo $d['email'] ?>">
			<label>Jenjang Pendidikan :</label>
			<select name="jenjang_pendidikan">
				<option value="sd" <?php if($d['jenjang_pendidikan']=='sd') echo 'selected'; ?> >SD/MI</option>
				<option value="smp" <?php if($d['jenjang_pendidikan']=='smp') echo 'selected'; ?> >SMP/MTS</option>
				<option value="sma" <?php if($d['jenjang_pendidikan']=='sma') echo 'selected'; ?> >SMA/SMK</option>
				<option value="kuliah" <?php if($d['jenjang_pendidikan']=='kuliah') echo 'selected'; ?> >Kuliah</option>
				<option value="lainnya" <?php if($d['jenjang_pendidikan']=='lainnya') echo 'selected'; ?> >Lainnya</option>
			</select>
			<input class="btn-simpan" type="submit" value="Simpan">
			</form>
		<?php }  
			} else echo "<script>alert('Ini bukan anda');document.location='pengguna.php?id=$_SESSION[id_pengguna]'</script>";
		?>
		</div>
	</div>
</body>
</html>