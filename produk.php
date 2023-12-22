<h2 align="center">Data Produk</h2>

<form action="index.php?hal=produk&" method="get">
  <div class="form-row align-items-center">
    <div class="col-sm-3 my-1">
      <label class="sr-only" for="inLineFormInputName">Name</label>
      <input type="text" name="caripro" class="form-control" id="inLineFormInputName" placeholder="Pencarian Nama Produk">
    </div>
    <div class="col-auto my-1">
      <button type="submit" class="btn btn-success">Cari Produk</button>
    </div>
    <div class="col-sm-3 my-1">
      <a href="index.php?hal=protambah" class="btn btn-primary">Tambah Produk</a>
    </div>
  </div>
</form>

<?php
    if(isset ($_GET['caripro'])){
    $cari = $_GET['caripro'];
    echo "<b>Hasil Pencarian : ".$cari."</b>";
	}
	?>

	<table class="table">
	    <thead>
	        <tr>
	            <th scope-"col">ID Produk</th>
	            <th scope-"col">Nama Produk</th>
	            <th scope-"col">Deskripsi Produk</th>
	            <th scope-"col">Foto Produk</th>
	            <th scope-"col">Tanggal Pembuatan</th>
	            <th scope="col">Kategori</th>
	            <th scope-"col">Nama Mahasiswa</th>
	            <th scope="col">Aksi</th>
	        </tr>
	    </thead>
	    <?php
	        if(isset ($_GET['caripro'])){
	        	$cari = $_GET['caripro'];
	        	$tampil = mysqli_query($koneksi,"SELECT * FROM viewproduk WHERE nama_produk LIKE '%".$cari."%' ORDER BY id_produk DESC");
	        }else{
	        	$tampil = mysqli_query($koneksi,"SELECT * FROM viewproduk ORDER BY id_produk DESC");
	        }
	        while ($data = mysqli_fetch_array($tampil)){
	    ?>
	    <tbody>
	         <tr>
	            <th scope="row"><?php echo $data['id_produk']; ?></th>
	            <td><?php echo $data['nama_produk']; ?></td>
	            <td><?php echo $data['deskripsi_produk']; ?></td>
				<td class="img-fluid">
	  				<?php if($data['foto_produk'] != ''){ ?>
						<img src="upload_produk/<?= $data['foto_produk']; ?>" class="img-fluid" width="50" style="border-radius:3em; align-items:center;" alt="Foto Produk">
	 				<?php } else{?>
						<img src="img/no-select.png" width="50" style="border-radius:3em; align-items:center;" alt="No Foto Uploaded">
					<?php }?>
		  		</td>
				<td><?php echo $data['tgl_pembuatan']; ?></td>
				<td><?php echo $data['nama_kategori']; ?></td>
	            <td><?php echo $data['nama_siswa']; ?></td>
	            <td>
	                <?php
	                echo'
	                    <a href="index.php?hal=proedit&id='.$data['id_produk'].'" class="btn btn-warning">Edit</a>
	                    <a href="index.php?hal=prohapus&id='.$data['id_produk'].'" class="btn btn-danger">Hapus</a>
						<a href="index.php?hal=proshow&id='.$data['id_produk'].'" class="btn btn-secondary">Show</a>
	                ';?>
	            </td>
	        </tr>
	    </tbody>
	    <?php
	        }
	    ?>
	</table>