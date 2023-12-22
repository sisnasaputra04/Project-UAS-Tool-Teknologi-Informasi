<h2 align="center">Data Admin</h2>

<form action="index.php?hal=admin&" method="get">
  <div class="form-row align-items-center">
    <div class="col-sm-3 my-1">
      <label class="sr-only" for="inLineFormInputName">Name</label>
      <input type="text" name="cariadm" class="form-control" id="inLineFormInputName" placeholder="Pencarian Nama Admin">
    </div>
    <div class="col-auto my-1">
      <button type="submit" class="btn btn-success">Cari Admin</button>
    </div>
    <div class="col-sm-3 my-1">
      <a href="index.php?hal=admtambah" class="btn btn-primary">Tambah Admin</a>
    </div>
  </div>
</form>

<?php
    if(isset ($_GET['cariadm'])){
    $cari = $_GET['cariadm'];
    echo "<b>Hasil Pencarian : ".$cari."</b>";
	}
	?>

	<table class="table">
	    <thead>
	        <tr>
	            <th scope-"col">ID Admin</th>
	            <th scope-"col">Nama Admin</th>
	            <th scope="col">Email</th>
				<th scope-"col">Password</th>
	            <th scope-"col">Alamat</th>
	            <th scope="col">Telepon</th>
	            <th scope="col">Aksi</th>
	        </tr>
	    </thead>
	    <?php
	        if(isset ($_GET['cariadm'])){
	        	$cari = $_GET['cariadm'];
	        	$tampil = mysqli_query($koneksi,"SELECT * FROM admin WHERE nama_admin LIKE '%".$cari."%' ORDER BY id_admin DESC");
	        }else{
	        	$tampil = mysqli_query($koneksi,"SELECT * FROM admin ORDER BY id_admin DESC");
	        }
	        while ($data = mysqli_fetch_array($tampil)){
	    ?>
	    <tbody>
	         <tr>
	            <th scope="row"><?php echo $data['id_admin']; ?></th>
	            <td><?php echo $data['nama_admin']; ?></td>
	            <td><?php echo $data['email']; ?></td>
				<td><?php echo $data['password']; ?></td>
	            <td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['telp']; ?></td>
	            <td>
	                <?php
	                echo'
	                    <a href="index.php?hal=admedit&id='.$data['id_admin'].'" class="btn btn-warning">Edit</a>
	                    <a href="index.php?hal=admhapus&id='.$data['id_admin'].'" class="btn btn-danger">Hapus</a>
	                ';?>
	            </td>
	        </tr>
	    </tbody>
	    <?php
	        }
	    ?>
	</table>