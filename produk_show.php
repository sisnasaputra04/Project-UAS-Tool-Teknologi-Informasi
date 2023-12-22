<?php
	$id = $_GET['id'];
	$tampil = mysqli_query($koneksi , "SELECT * FROM viewproduk WHERE id_produk = $id");
	$data = mysqli_fetch_array($tampil);
?>



<div class="alert alert-light" role="alert">
	<div class="card">
		<div class="card-header">
			<h2 align="center">Form Detail Data <?php echo $data['nama_produk']?></h2>
		</div>
		<div class="card-body">
			<div class="form-row">
				<div class="col-md-12 text-center">
					<p class="form-control">
						<?php if($data['foto_produk'] != ''){ ?>
							<img src="upload_produk/<?= $data['foto_produk']; ?>" class="img" style="border:3px solid black; border-radius:1em; opacity:1;" width="500" alt="Foto Produk">
						<?php } else{?>
								<img src="img/no-select.png" width="500"style="border-radius:3em; border:1px solid black; align-items:center;" alt="No Foto Uploaded">
						<?php }?>
					</p>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<p class="form-control"> Nama Produk : <b><?php echo $data['nama_produk'] ?></b></p>
					<p class="form-control"> Tanggal Pembuatan : <b><?php echo $data['tgl_pembuatan'] ?></b></p>
					<p class="form-control"> Kelas Mahasiswa : <b><?php echo $data['kelas'] ?></b></p>
					<p class="form-control"> NIM Mahasiswa : <b><?php echo $data['nis'] ?></b></p>
					<p class="form-control"> Jenis Kelamin Mahasiswa : <b><?php
										if($data['jenis_kelamin'] == 'L') {
												echo 'Laki - laki';
										} else {
												echo 'Perempuan';
										}
										?></b></p>
					<p class="form-control"> Tanggal Lahir  Mahasiswa : <b><?php echo $data['tgl_lahir'] ?></b></p>
				</div>
				<div class="form-group col-md-6">
					<p class="form-control"> Nama Mahasiswa : <b><?php echo $data['nama_siswa'] ?></b></p>
					<p class="form-control"> Kategori : <b><?php echo $data['nama_kategori'] ?></b></p>
					<p class="form-control"> Alamat Mahasiswa : <b><?php echo $data['alamat'] ?></b></p>
					<p class="form-control"> Nomor Telepon Mahasiswa : <b><?php echo $data['telp'] ?></b></p>
					<p class="form-control"> Email Mahasiswa : <b><?php echo $data['email'] ?></b></p>
					<p class="form-control"> Mahasiswa Angkatan : <b><?php echo $data['angkatan'] ?></b></p>
				</div>
				<div class="form-group col-md-12">
					<p class="form-control"> Deskripsi Produk : <b><?php echo $data['deskripsi_produk'] ?></b></p>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
			<a href="index.php?hal=produk" class="btn btn-secondary">Kembali</a>
		</div>
	</div>
</div>

<!-- <div class="card mb-3">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
</div> -->

