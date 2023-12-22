<?php
    $id     = $_GET['id'];
	$tampil = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$id'");
	$data   = mysqli_fetch_array($tampil);
?>

 <div class="alert alert-light" role="alert">
	<div class="card">
		<div class="card-header">
			<h2 align="center">Form Ubah Data Admin</h2>
		</div>
 	
		<form method="POST">
			<div class="card-body col-md-12">
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="hidden" name="id_admin" value="<?php echo $id ?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan ID Admin">
						<label for="exampleInputEmail1">Nama Admin <span style="color:red;">*</span></label>
						<input type="text" name="nama_admin" value="<?php echo $data['nama_admin'] ?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emaiHelp" placeholder="Masukkan Nama Admin">
					</div>
					<div class="form-group col-md-6">
						<label for="exampleInputEmail1">Email <span style="color:red;">*</span></label>
						<input type="email" name="email" value="<?php echo $data['email'] ?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emaiHelp" placeholder="Masukkan Email">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="exampleInputPassword1">Password <span style="color:red;">*</span></label>
						<input type="password" name="password" value="<?php echo $data['password'] ?>" required class="form-control" id= "exampleInputPassword1" placeholder="Masukkan Password">
					</div>
					<div class="form-group col-md-6">
						<label for="exampleInputEmail1">Alamat <span style="color:red;">*</span></label>
						<input type="text" name="alamat" value="<?php echo $data['alamat'] ?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emaiHelp" placeholder="Masukkan Alamat">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="exampleInputPassword1">Telepon <span style="color:red;">*</span></label>
						<input type="number" name="telp" value="<?php echo $data['telp'] ?>" required class="form-control" id= "exampleInputPassword1" placeholder="Masukkan Telepon">
					</div>
				</div>
			</div>
			<div class="card-footer">
				<input type="submit" name="ubah" class="btn btn-primary" value="Simpan Perubahan">
				<a href="index.php?hal=admin" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>
 </div>

 <?php
 	if(isset($_POST['ubah'])){ //proses simpan perubahan data admin
 		$id_admin 	=	$_POST['id_admin'];
 		$nama_admin 	=	$_POST['nama_admin'];
 		$email 			= 	$_POST['email'];
		$password 	=	md5($_POST['password']);
        //$password = base64_encode($_POST['password']);
 		$alamat 	=	$_POST['alamat'];
 		$telp 			= 	$_POST['telp'];

 		$ubah = mysqli_query($koneksi, 'UPDATE admin SET nama_admin="'.$nama_admin.'",email="'.$email.'",password="'.$password.'",alamat="'.$alamat.'",telp="'.$telp.'" WHERE id_admin="'.$id_admin.'"');
 		if ($ubah){
 			echo '
 				<script>
 					alert("Berhasil Mengubah Data Admin");
 					window.location="index.php?hal=admin"; //menuju ke halaman admin
 				</script>
 			';
 		}
 	}
 ?>