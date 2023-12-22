<h2 align="center">Data Jurusan</h2>

<form action="index.php?hal=jurusan&" method="get">
  <div class="form-row align-items-center">
    <div class="col-sm-3 my-1">
      <label class="sr-only" for="inLineFormInputName">Name</label>
      <input type="text" name="carijur" class="form-control" id="inLineFormInputName" placeholder="Pencarian Nama Jurusan">
    </div>
    <div class="col-auto my-1">
      <button type="submit" class="btn btn-success">Cari Jurusan</button>
    </div>
    <div class="col-sm-3 my-1">
      <a href="index.php?hal=jurtambah" class="btn btn-primary">Tambah Jurusan</a>
    </div>
  </div>
</form>

<?php
    if(isset ($_GET['carijur'])){
    $cari = $_GET['carijur'];
    echo "<b>Hasil Pencarian : ".$cari."</b>";
	}
	?>

	<table class="table">
	    <thead>
	        <tr>
	            <th scope-"col">ID Jurusan</th>
	            <th scope-"col">Nama Jurusan</th>
	            <th scope="col">Aksi</th>
	        </tr>
	    </thead>
	    <?php
	        if(isset ($_GET['carijur'])){
	        	$cari = $_GET['carijur'];
	        	$tampil = mysqli_query($koneksi,"SELECT * FROM jurusan WHERE nama_jurusan like '%".$cari."%'");
	        }else{
	        	$tampil = mysqli_query($koneksi,"SELECT * FROM jurusan");
	        }
	        while ($data = mysqli_fetch_array($tampil)){
	    ?>
	    <tbody>
	         <tr>
	            <th scope="row"><?php echo $data['id_jurusan']; ?></th>
	            <td><?php echo $data['nama_jurusan']; ?></td>
	            <td>
	                <?php
	                echo'
	                    <a href="index.php?hal=juredit&id='.$data['id_jurusan'].'" class="btn btn-warning">Edit</a>
	                    <a href="index.php?hal=jurhapus&id='.$data['id_jurusan'].'" class="btn btn-danger">Hapus</a>
	                ';?>
	            </td>
	        </tr>
	    </tbody>
	    <?php
	        }
	    ?>
	</table>