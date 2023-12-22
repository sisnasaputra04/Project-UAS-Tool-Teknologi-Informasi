<div class="alert alert-light" role="alert">
    <div class="card">
        <div class="card-header">
            <h2 align="center">Form Tambah Data Kategori</h2>
        </div>
    <form method="POST">
        <div class="card-body col-md-12">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Nama Kategori <span style="color:red;">*</span></label>
                    <input type="text" name="nama_kategori" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Kategori">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
            <a href="index.php?hal=kategori" class="btn btn-secondary">Batal</a>
        </div>
    </form>
    </div>
</div>

<?php
    if(isset ($_POST['simpan'])){ //proses simpan data kategori
    	$nama_kategori = $_POST['nama_kategori'];

	    $simpan = mysqli_query($koneksi, 'INSERT INTO kategori(nama_kategori) VALUES ("'.$nama_kategori.'")');
	    if ($simpan){
		    echo '
		        <script>
		            alert("Berhasil Menambah Data Kategori");
		            window.location="index.php?hal=kategori"; //menuju ke halaman kategori
		        </script>
		    ';
        }
    }
?>