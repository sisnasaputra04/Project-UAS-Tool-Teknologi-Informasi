<?php
    $id     = $_GET['id'];
    $tampil2 = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa='$id'");
    $data2   = mysqli_fetch_array($tampil2);
?>

<div class="alert alert-light" role="alert">
        <div class="card">
            <div class="card-header">
                <h2 align="center">Form Ubah Data Mahasiswa</h2>
            </div>

            <form method="POST" enctype="multipart/form-data">
                <div class="card-body col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" name="id_siswa" value="<?php echo $id ?>" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan ID Mahasiswa">
                            <label for="exampleInputEmail1">Nama Mahasiswa <span style="color:red;">*</span></label>
                            <input type="text" name="nama_siswa" value="<?php echo $data2['nama_siswa'] ?>" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Mahasiswa">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Kelas <span style="color:red;">*</span></label>
                            <input type="text" name="kelas" value="<?php echo $data2['kelas'] ?>" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Kelas">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Nim <span style="color:red;">*</span></label>
                            <input type="number" name="nis" value="<?php echo $data2['nis'] ?>" required class="form-control" id ="exampleInputPassword1" placeholder="Masukkan Nim">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Jenis Kelamin <span style="color:red;">*</span></label>
                                <div class="col">
                                    <label class="radio-inline mr-3">
                                        <input type="radio" name="jenis_kelamin" value="L" id="L"  <?php if($data2['jenis_kelamin'] == 'L') {echo'checked';}?> required > Laki - laki
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="jenis_kelamin" value="P" id="P" <?php if($data2['jenis_kelamin'] == 'P') {echo 'checked';}?> required> Perempuan
                                    </label>
                                </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Foto Mahasiswa</label>
                            <input type="file" name="foto_siswa" value="<?php echo $data2['foto_siswa'] ?>" class="form-control" id ="exampleInputPassword1" placeholder="Masukkan Foto Mahasiswa" accept="image/*">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Tanggal Lahir <span style="color:red;">*</span></label>
                            <input type="date" name="tgl_lahir" value="<?php echo $data2['tgl_lahir'] ?>" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Tanggal Lahir">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Alamat <span style="color:red;">*</span></label>
                            <input type="text" name="alamat" value="<?php echo $data2['alamat'] ?>" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Alamat">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Telepon <span style="color:red;">*</span></label>
                            <input type="number" name="telp" value="<?php echo $data2['telp'] ?>" required class="form-control" id ="exampleInputPassword1" placeholder="Masukkan Telepon">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Email <span style="color:red;">*</span></label>
                            <input type="email" name="email" value="<?php echo $data2['email'] ?>" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Angkatan <span style="color:red;">*</span></label>
                            <input type="number" name="angkatan" value="<?php echo $data2['angkatan'] ?>" required class="form-control" id ="exampleInputPassword1" placeholder="Masukkan Angkatan">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlSelect1">Jurusan <span style="color:red;">*</span></label>
                                <select name="id_jurusan" class="form-control" id="exampleFormControlSelect1">
                                <option value="#" disabled>-- Pilih Jurusan --</option>
                                    <?php
                                    $tampil = mysqli_query($koneksi, "SELECT * FROM jurusan");
                                    while($data=mysqli_fetch_array($tampil)){
                                        if ($data['id_jurusan']==$data2['id_jurusan'])
                                        {
                                            echo '<option selected="selected" value="'.$data['id_jurusan'].'">'.$data['nama_jurusan'].'</option>';
                                        } else {
                                            echo '<option value="'.$data['id_jurusan'].'">'.$data['nama_jurusan'].'</option>';
                                        }
                                    }?> 
                                </select>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <input type="submit" name="ubah" class="btn btn-primary" value="Simpan Perubahan">
                    <a href="index.php?hal=siswa" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div> 
</div>

<?php
    if(isset ($_POST['ubah'])){ //proses simpan perubahan data Mahasiswa
    	$id_siswa = $_POST['id_siswa'];
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
        $id_jurusan = $_POST['id_jurusan'];

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
        $ubah = mysqli_query($koneksi, 'UPDATE siswa SET nama_siswa="'.$nama_siswa.'",kelas="'.$kelas.'",nis="'.$nis.'",jenis_kelamin="'.$jenis_kelamin.'",foto_siswa="'.$foto_siswa_nama.'",tgl_lahir="'.$tgl_lahir.'",alamat="'.$alamat.'",telp="'.$telp.'",email="'.$email.'",angkatan="'.$angkatan.'",id_jurusan="'.$id_jurusan.'" WHERE id_siswa="'.$id_siswa.'"');

            echo '
                <script>
                    alert("Berhasil Mengubah Data Mahasiswa");
                    window.location="index.php?hal=siswa"; //menuju ke halaman Mahasiswa
                </script>
            ';
        }
    }
    }
?>