<?php
    $id     = $_GET['id'];
    $tampil2 = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id'");
    $data2   = mysqli_fetch_array($tampil2);
?>

<div class="alert alert-light" role="alert">
    <div class="card">
        <div class="card-header">
            <h2 align="center">Form Ubah Data Produk</h2>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="card-body col-md-12">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="hidden" name="id_produk" value="<?php echo $id ?>" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan ID Produk">
                        <label for="exampleInputEmail1">Nama Produk <span style="color:red;">*</span></label>
                        <input type="text" name="nama_produk" value="<?php echo $data2['nama_produk'] ?>" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Produk">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Deskripsi Produk <span style="color:red;">*</span></label>
                        <input type="text" name="deskripsi_produk" value="<?php echo $data2['deskripsi_produk'] ?>" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Deskripsi Produk">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Foto Produk</label>
                        <input type="file" name="foto_produk" value="<?php echo $data2['foto_produk'] ?>" class="form-control" id ="exampleInputPassword1" placeholder="Masukkan Foto Produk" accept="image/*">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Tanggal Pembuatan <span style="color:red;">*</span></label>
                        <input type="date" name="tgl_pembuatan" value="<?php echo $data2['tgl_pembuatan'] ?>" required class="form-control" id ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Tanggal Pembuatan">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlSelect1">Nama Kategori <span style="color:red;">*</span></label>
                        <select name="id_kategori" class="form-control" id="exampleFormControlSelect1">
                        <option value="#" disabled>-- Pilih Kategori --</option>
                            <?php
                            $tampil = mysqli_query($koneksi, "SELECT * FROM kategori");
                            while($data=mysqli_fetch_array($tampil)){
                                if ($data['id_kategori']==$data2['id_kategori'])
                                {
                                    echo '<option selected="selected" value="'.$data['id_kategori'].'">'.$data['nama_kategori'].'</option>';
                                } else {
                                    echo '<option value="'.$data['id_kategori'].'">'.$data['nama_kategori'].'</option>';
                                }
                            }?> 
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlSelect1">Nama Mahasiswa <span style="color:red;">*</span></label>
                        <select name="id_siswa" class="form-control" id="exampleFormControlSelect1">
                        <option value="#" disabled>-- Pilih Mahasiswa --</option>
                            <?php
                            $tampil = mysqli_query($koneksi, "SELECT * FROM siswa");
                            while($data=mysqli_fetch_array($tampil)){
                                if ($data['id_siswa']==$data2['id_siswa'])
                                {
                                    echo '<option selected="selected" value="'.$data['id_siswa'].'">'.$data['nama_siswa'].'</option>';
                                } else {
                                    echo '<option value="'.$data['id_siswa'].'">'.$data['nama_siswa'].'</option>';
                                }
                            }?> 
                        </select>
                    </div>
                    </div>
            </div>
            <div class="card-footer">
                <input type="submit" name="ubah" class="btn btn-primary" value="Simpan Perubahan">
                <a href="index.php?hal=produk" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?php
    if(isset ($_POST['ubah'])){ //proses simpan perubahan data produk
    	$id_produk = $_POST['id_produk'];
        $nama_produk = $_POST['nama_produk'];
        $deskripsi_produk = $_POST['deskripsi_produk'];
        $foto_produk = $_FILES['foto_produk'];
        $foto_produk_nama = $_FILES['foto_produk']['name'];
        $foto_produk_size = $_FILES['foto_produk']['size'];
        $foto_produk_tmp_name = $_FILES['foto_produk']['tmp_name'];
        $tgl_pembuatan = $_POST['tgl_pembuatan'];
        $id_kategori = $_POST['id_kategori'];
        $id_siswa = $_POST['id_siswa'];

    if(isset($foto_produk)){
    if($foto_produk_size > 4044070){
        echo '
        <script>
          alert("Maaf , Ukuran foto produk anda terlalu besar !");
          window.history.go(-1);
        </script>
        ';
    }else{
        move_uploaded_file( $foto_produk_tmp_name,'upload_produk/'.$foto_produk_nama);
        $ubah = mysqli_query($koneksi, 'UPDATE produk SET nama_produk="'.$nama_produk.'",deskripsi_produk="'.$deskripsi_produk.'",foto_produk="'.$foto_produk_nama.'",tgl_pembuatan="'.$tgl_pembuatan.'",id_kategori="'.$id_kategori.'",id_siswa="'.$id_siswa.'" WHERE id_produk="'.$id_produk.'"');
        
            echo '
                <script>
                    alert("Berhasil Mengubah Data Produk");
                    window.location="index.php?hal=produk"; //menuju ke halaman produk
                </script>
            ';
        }
    }
    }
?>