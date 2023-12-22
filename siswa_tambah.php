<div class="alert alert-light" role="alert">
    
        <div class="card">
            <div class="card-header">
                <h2 align="center">Form Tambah Data Mahasiswa</h2>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="card-body col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Nama Mahasiswa <span style="color:red;">*</span></label>
                            <input type="text" name="nama_siswa" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Mahasiswa">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Kelas <span style="color:red;">*</span></label>
                            <input type="text" name="kelas" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Kelas">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Nim <span style="color:red;">*</span></label>
                            <input type="number" name="nis" required class="form-control" id ="exampleInputPassword1" placeholder="Masukkan Nim">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Jenis Kelamin <span style="color:red;">*</span></label>
                                <div class="col">
                                <label class="radio-inline mr-3">
                                    <input type="radio" name="jenis_kelamin" value="L" id="L" required > Laki - laki
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" value="P" id="P" required> Perempuan
                                </label>
                                </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Foto Mahasiswa</label>
                            <input type="file" name="foto_siswa" class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Foto Mahasiswa" accept="image/*">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Tanggal Lahir <span style="color:red;">*</span></label>
                            <input type="date" name="tgl_lahir" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Tanggal Lahir">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Alamat <span style="color:red;">*</span></label>
                            <input type="text" name="alamat" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Alamat">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Telepon <span style="color:red;">*</span></label>
                            <input type="number" name="telp" required class="form-control" id ="exampleInputPassword1" placeholder="Masukkan Telepon">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Email <span style="color:red;">*</span></label>
                            <input type="email" name="email" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Angkatan <span style="color:red;">*</span></label>
                            <input type="number" name="angkatan" required class="form-control" id ="exampleInputPassword1" placeholder="Masukkan Angkatan">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlSelect1">Jurusan <span style="color:red;">*</span></label>
                            <select name="id_jurusan" class="form-control" id="exampleFormControlSelect1">
                            <option value="#" disabled>-- Pilih Jurusan --</option>
                                <?php
                                $tampil = mysqli_query($koneksi, "SELECT * FROM jurusan");
                                while($data=mysqli_fetch_array($tampil))
                                {
                                ?>
                                <option value="<?php echo $data['id_jurusan'] ?>"><?php echo $data['nama_jurusan'] ?></option>
                                <?php } ?> 
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                    <a href="index.php?hal=siswa" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>  
    
</div>

<?php
    if(isset ($_POST['simpan'])){ //proses simpan data siswa
	    $nama_siswa = $_POST['nama_siswa'];
        $kelas = $_POST['kelas'];
        $nis = $_POST['nis'];
	    $jenis_kelamin = $_POST['jenis_kelamin'];
        $foto_siswa = $_FILES['foto_siswa'];
        $foto_siswa_nama = $_FILES['foto_siswa']['name'];
        $foto_siswa_size = $_FILES['foto_siswa']['size'];
        $foto_siswa_tmp_name = $_FILES['foto_siswa']['tmp_name'];
        $tgl_lahir = $_POST['tgl_lahir'];
	    $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $email = $_POST['email'];
	    $angkatan = $_POST['angkatan'];
        $id_jurusan  = $_POST['id_jurusan'];

    if(isset($foto_siswa)){
    if($foto_siswa_size > 4044070){
        echo '
        <script>
          alert("Maaf , Ukuran foto mahasiswa anda terlalu besar !");
          window.history.go(-1);
        </script>
        ';
    }else{
        move_uploaded_file( $foto_siswa_tmp_name,'upload/'.$foto_siswa_nama);
	    $simpan = mysqli_query($koneksi, 'INSERT INTO siswa(nama_siswa,kelas,nis,jenis_kelamin,foto_siswa,tgl_lahir,alamat,telp,email,angkatan,id_jurusan) VALUES ("'.$nama_siswa.'","'.$kelas.'","'.$nis.'","'.$jenis_kelamin.'","'.$foto_siswa_nama.'","'.$tgl_lahir.'","'.$alamat.'","'.$telp.'","'.$email.'","'.$angkatan.'","'.$id_jurusan.'")');
	    
		    echo '
		        <script>
		            alert("Berhasil Menambah Data Mahasiswa");
		            window.location="index.php?hal=siswa"; //menuju ke halaman Mahasiswa
		        </script>
		    ';
        }
    }
    }
?>