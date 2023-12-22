<?php
    $id     = $_GET['id'];
	$tampil = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'");
	$data   = mysqli_fetch_array($tampil);
?>

 <div class="alert alert-light" role="alert">
	<div class="card">
		<div class="card-header">
			<h2 align="center">Form Ubah Data Kategori</h2>
		</div>
		<form method="POST">
			<div class="card-body col-md-12">
				<div class="form-row">
					<div class="form-group col-md-12">
						<input type="hidden" name="id_kategori" value="<?php echo $id ?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan ID Kategori">
						<label for="exampleInputEmail1">Nama Kategori <span style="color:red;">*</span></label>
						<input type="text" name="nama_kategori" value="<?php echo $data['nama_kategori'] ?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emaiHelp" placeholder="Masukkan Nama Kategori">
					</div>
				</div>
			</div>
			<div class="card-footer">
				<input type="submit" name="ubah" class="btn btn-primary" value="Simpan Perubahan">
				<a href="index.php?hal=kategori" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>
 </div>

 <?php
 	if(isset($_POST['ubah'])){ //proses simpan perubahan data kategori
 		$id_kategori 	=	$_POST['id_kategori'];
 		$nama_kategori 	=	$_POST['nama_kategori'];

 		$ubah = mysqli_query($koneksi, 'UPDATE kategori SET nama_kategori="'.$nama_kategori.'" WHERE id_kategori="'.$id_kategori.'"');
 		if ($ubah){
 			echo '
 				<script>
 					alert("Berhasil Mengubah Data Kategori");
 					window.location="index.php?hal=kategori"; //menuju ke halaman kategori
 				</script>
 			';
 		}
 	}
 ?>