<h2 align="center">Data Kategori</h2>

<form action="index.php?hal=kategori&" method="get">
  <div class="form-row align-items-center">
    <div class="col-sm-3 my-1">
      <label class="sr-only" for="inLineFormInputName">Name</label>
      <input type="text" name="carikat" class="form-control" id="inLineFormInputName" placeholder="Pencarian Nama Kategori">
    </div>
    <div class="col-auto my-1">
      <button type="submit" class="btn btn-success">Cari Kategori</button>
    </div>
    <div class="col-sm-3 my-1">
      <a href="index.php?hal=kattambah" class="btn btn-primary">Tambah Kategori</a>
    </div>
  </div>
</form>

<?php
    if(isset ($_GET['carikat'])){
    $cari = $_GET['carikat'];
    echo "<b>Hasil Pencarian : ".$cari."</b>";
	}
	?>

	<table class="table">
	    <thead>
	        <tr>
	            <th scope-"col">ID Kategori</th>
	            <th scope-"col">Nama Kategori</th>
	            <th scope="col">Aksi</th>
	        </tr>
	    </thead>
	    <?php
	        if(isset ($_GET['carikat'])){
	        	$cari = $_GET['carikat'];
	        	$tampil = mysqli_query($koneksi,"SELECT * FROM kategori WHERE nama_kategori like '%".$cari."%'");
	        }else{
	        	$tampil = mysqli_query($koneksi,"SELECT * FROM kategori");
	        }
	        while ($data = mysqli_fetch_array($tampil)){
	    ?>
	    <tbody>
	         <tr>
	            <th scope="row"><?php echo $data['id_kategori']; ?></th>
	            <td><?php echo $data['nama_kategori']; ?></td>
	            <td>
	                <?php
	                echo'
	                    <a href="index.php?hal=katedit&id='.$data['id_kategori'].'" class="btn btn-warning">Edit</a>
	                    <a href="index.php?hal=kathapus&id='.$data['id_kategori'].'" class="btn btn-danger">Hapus</a>
	                ';?>
	            </td>
	        </tr>
	    </tbody>
	    <?php
	        }
	    ?>
	</table>