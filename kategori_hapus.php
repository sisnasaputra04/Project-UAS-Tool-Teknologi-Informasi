<?php
	$id     = $_GET['id'];
	$tampil = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'");
	$data   = mysqli_fetch_array($tampil);
?>

<div class="alert alert-light" role="alert">
	<h2 align="center">Hapus Data Kategori</h2>
	<form method="POST">
		<div class="form-group">
			<div class="alert alert-danger" role="alert">
			<h6>Yakin Akan Menghapus Data Kategori <b><?php echo $data['nama_kategori'] ?></b> ?</h6>
			<input type="hidden" name="id_kategori" value="<?php echo $id ?>" required class="form-control">
			<input type="submit" name="hapus" class="btn btn-primary" value="Hapus">
			<a href="index.php?hal=kategori" class="btn btn-secondary">Batal</a>
			</div>
		</div>
	</form>
</div>

<?php
	if(isset ($_POST['hapus'])){ //proses hapus data kategori
		$id_kategori	= $_POST['id_kategori'];

		$ubah = mysqli_query($koneksi, 'DELETE FROM kategori WHERE id_kategori="'.$id_kategori.'"');
		if ($ubah){
			echo '
				<script>
					alert("Berhasil Menghapus Data Kategori");
					window.location="index.php?hal=kategori"; //menuju ke halaman kategori
				</script>
			';
		}
	}
?>