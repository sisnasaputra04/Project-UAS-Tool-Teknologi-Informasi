<h2 align="center">Data Mahasiswa</h2>

<form action="index.php?hal=siswa&" method="get">
  <div class="form-row align-items-center">
    <div class="col-sm-3 my-1">
      <label class="sr-only" for="inLineFormInputName">Name</label>
      <input type="text" name="carisis" class="form-control" id="inLineFormInputName" placeholder="Pencarian Nama Mahasiswa">
    </div>
    <div class="col-auto my-1">
      <button type="submit" class="btn btn-success">Cari Mahasiswa</button>
    </div>
    <div class="col-sm-3 my-1">
      <a href="index.php?hal=sistambah" class="btn btn-primary">Tambah Mahasiswa</a>
    </div>
  </div>
</form>

<?php
    if(isset ($_GET['carisis'])){
    $cari = $_GET['carisis'];
    echo "<b>Hasil Pencarian : ".$cari."</b>";
	}
	?>

	<table class="table">
	    <thead>
	        <tr>
	            <th scope-"col">ID Mahasiswa</th>
	            <th scope-"col">Nama Mahasiswa</th>
	            <th scope-"col">Kelas</th>
	            <th scope-"col">Nis</th>
	            <th scope="col">Jenis Kelamin</th>
				<th scope-"col">Foto Mahasiswa</th>
	            <th scope-"col">Tanggal Lahir</th>
	            <th scope-"col">Alamat</th>
	            <th scope-"col">Telepon</th>
	            <th scope="col">Email</th>
				<th scope-"col">Angkatan</th>
	            <th scope-"col">Jurusan</th>
	            <th scope="col">Aksi</th>
	        </tr>
	    </thead>
	    <?php
	        if(isset ($_GET['carisis'])){
	        	$cari = $_GET['carisis'];
	        	$tampil = mysqli_query($koneksi,"SELECT * FROM viewsiswa WHERE nama_siswa LIKE '%".$cari."%' ORDER BY id_siswa DESC");
	        }else{
	        	$tampil = mysqli_query($koneksi,"SELECT * FROM viewsiswa ORDER BY id_siswa DESC");
	        }
	        while ($data = mysqli_fetch_array($tampil)){
	    ?>
	    <tbody>
	         <tr>
	            <th scope="row"><?php echo $data['id_siswa']; ?></th>
	            <td><?php echo $data['nama_siswa']; ?></td>
	            <td><?php echo $data['kelas']; ?></td>
	            <td><?php echo $data['nis']; ?></td>
	            <td>
                    <?php
                    	if($data['jenis_kelamin'] == 'L') {
                        	echo 'Laki - laki';
                        } else {
                            echo 'Perempuan';
                        }
                    ?>
				</td>
				<td class="img-fluid">
	  				<?php if($data['foto_siswa'] != ''){ ?>
						<img src="upload/<?= $data['foto_siswa']; ?>" class="img-fluid" width="50" style="border-radius:3em; align-items:center;" alt="Foto Siswa">
	 				<?php } else{?>
						<img src="img/siswa.png" width="50" style="border-radius:3em; align-items:center;" alt="No Foto Uploaded">
					<?php }?>
		  		</td>
	            <td><?php echo $data['tgl_lahir']; ?></td>
	            <td><?php echo $data['alamat']; ?></td>
	            <td><?php echo $data['telp']; ?></td>
				<td><?php echo $data['email']; ?></td>
	            <td><?php echo $data['angkatan']; ?></td>
	            <td><?php echo $data['nama_jurusan']; ?></td>
	            <td>
	                <?php
	                echo'
	                    <a href="index.php?hal=sisedit&id='.$data['id_siswa'].'" class="btn btn-warning">Edit</a>
	                    <a href="index.php?hal=sishapus&id='.$data['id_siswa'].'" class="btn btn-danger">Hapus</a>
						<a href="index.php?hal=sisshow&id='.$data['id_siswa'].'" class="btn btn-secondary">Show</a>
	                ';?>
	            </td>
	        </tr>
	    </tbody>
	    <?php
	        }
	    ?>
	</table>