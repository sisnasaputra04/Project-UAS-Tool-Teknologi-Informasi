<?php
	$id     = $_GET['id'];
	$tampil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id'");
	$data   = mysqli_fetch_array($tampil);
?>

<div class="alert alert-light" role="alert">
	<h2 align="center">Hapus Data Produk</h2>
	<form method="POST">
		<div class="form-group">
			<div class="alert alert-danger" role="alert">
			<h6>Yakin Akan Menghapus Data Produk <b><?php echo $data['nama_produk'] ?></b> ?</h6>
			<input type="hidden" name="id_produk" value="<?php echo $id ?>" required class="form-control">
			<input type="submit" name="hapus" class="btn btn-primary" value="Hapus">
			<a href="index.php?hal=produk" class="btn btn-secondary">Batal</a>
			</div>
		</div>
	</form>
</div>

<?php
	if(isset ($_POST['hapus'])){ //proses hapus data produk
		$id_produk	= $_POST['id_produk'];

		$ubah = mysqli_query($koneksi, 'DELETE FROM produk WHERE id_produk="'.$id_produk.'"');
		if ($ubah){
			echo '
				<script>
					alert("Berhasil Menghapus Data Produk");
					window.location="index.php?hal=produk"; //menuju ke halaman produk
				</script>
			';
		}
	}
?>