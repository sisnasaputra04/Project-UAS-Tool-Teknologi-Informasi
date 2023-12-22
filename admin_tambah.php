<div class="alert alert-light" role="alert">
    <div class="card">
        <div class="card-header">
            <h2 align="center">Form Tambah Data Admin</h2>
        </div>
        <form method="POST">
            <div class="card-body col-md-12">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Nama Admin <span style="color:red;">*</span></label>
                        <input type="text" name="nama_admin" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Admin">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Email <span style="color:red;">*</span></label>
                        <input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Password <span style="color:red;">*</span></label>
                        <input type="password" name="password" required class="form-control" id ="exampleInputPassword1" placeholder="Masukkan Password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Alamat <span style="color:red;">*</span></label>
                        <input type="text" name="alamat" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Alamat">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputPassword1">Telepon <span style="color:red;">*</span></label>
                        <input type="number" name="telp" required class="form-control" id ="exampleInputPassword1" placeholder="Masukkan Telepon">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                <a href="index.php?hal=admin" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?php
    if(isset ($_POST['simpan'])){ //proses simpan data admin
    	$nama_admin = $_POST['nama_admin'];
	    $email = $_POST['email'];
        $password = md5($_POST['password']);
        //$password = base64_encode($_POST['password']);
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];

	    $simpan = mysqli_query($koneksi, 'INSERT INTO admin(nama_admin, email, password, alamat, telp) VALUES ("'.$nama_admin.'","'.$email.'","'.$password.'","'.$alamat.'","'.$telp.'")');
	    if ($simpan){
		    echo '
		        <script>
		            alert("Berhasil Menambah Data Admin");
		            window.location="index.php?hal=admin"; //menuju ke halaman admin
		        </script>
		    ';
        }
    }
?>