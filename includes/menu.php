<div class="menu">
			<div class="menu-head">
				<?php 
				$query = mysqli_query($db, "SELECT * FROM pengguna WHERE id_pengguna='$_SESSION[id_pengguna]' ");
				while($row=mysqli_fetch_array($query)) {?>
				<img src="<?php echo '../images/'.$row['fotoprofil'] ?>">
				<label><a href="../home/pengguna.php?id=<?php echo $row['id_pengguna'] ?>"><?php echo $row['nama_lengkap'] ?></a></label>
			</div>
			<?php 
			if($row['peran']=='admin'){
			 ?>
			 <ul>
				<li><a href="../home/lihat_pertanyaan.php">Lihat Pertanyaan</a></li>
				<li><a href="../home/lihat_pengguna.php">Lihat Pengguna</a></li>
				<li><a href="../home/kategori.php">Tambah Kategori</a></li>
			</ul>
			<?php }else{?>
				<ul>
				<li><a href="../home/buat_pertanyaan.php">Ajukan Pertanyaan</a></li>
				<li><a href="../home/pertanyaanku.php">Pertanyaan Saya</a></li>
				<li><a href="../home/jawabanku.php">Jawaban Saya</a></li>
			</ul>
			<?php
			}
			 } ?>
		</div>