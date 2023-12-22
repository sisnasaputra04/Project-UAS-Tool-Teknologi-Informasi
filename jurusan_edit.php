<?php
    $id     = $_GET['id'];
	$tampil = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jurusan='$id'");
	$data   = mysqli_fetch_array($tampil);
?>

 <div class="alert alert-light" role="alert">
	<div class="card">
		<div class="card-header">
 			<h2 align="center">Form Ubah Data Jurusan</h2>
		</div>
		<form method="POST">
			<div class="card-body col-md-12">
				<div class="form-row">
					<div class="form-group col-md-12">
						<input type="hidden" name="id_jurusan" value="<?php echo $id ?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan ID Jurusan">
						<label for="exampleInputEmail1">Nama Jurusan <span style="color:red;">*</span></label>
						<input type="text" name="nama_jurusan" value="<?php echo $data['nama_jurusan'] ?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emaiHelp" placeholder="Masukkan Nama Jurusan">
					</div>
				</div>
			</div>
			<div class="card-footer">
				<input type="submit" name="ubah" class="btn btn-primary" value="Simpan Perubahan">
				<a href="index.php?hal=jurusan" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>
 </div>

 <?php
 	if(isset($_POST['ubah'])){ //proses simpan perubahan data jurusan
 		$id_jurusan 	=	$_POST['id_jurusan'];
 		$nama_jurusan 	=	$_POST['nama_jurusan'];

 		$ubah = mysqli_query($koneksi, 'UPDATE jurusan SET nama_jurusan="'.$nama_jurusan.'" WHERE id_jurusan="'.$id_jurusan.'"');
 		if ($ubah){
 			echo '
 				<script>
 					alert("Berhasil Mengubah Data Jurusan");
 					window.location="index.php?hal=jurusan"; //menuju ke halaman jurusan
 				</script>
 			';
 		}
 	}
 ?>