<?php
// prosedur menampilkan menu
function menu(){
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">App Pameran Mahasiswa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?hal=produk">Produk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?hal=siswa">Mahasiswa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?hal=admin">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?hal=jurusan">Jurusan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?hal=kategori">Kategori</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-primary" href="logout.php" onclick="return confirm('Apakah Anda yakin akan keluar dari website pameran Admin ini ?');">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<?php
}

//procedure untuk menampilkan halaman beranda
function beranda(){
?>
<?php
  include("koneksi.php");
  $tampil = mysqli_query($koneksi , "SELECT * FROM admin WHERE id_admin='".$_SESSION['id_admin']."'");
  $data = mysqli_fetch_array($tampil);
?>
<div class="jumbotron">
  <h1 class="display-4">Selamat Datang, <?php echo $data['nama_admin'] ?>!</h1>
  <p class="lead">Di Halaman Admin Pameran Mahasiswa</p>
  <hr class="my-4">
  <p>Email: <?php echo $data['email'] ?></p>
  <p>Alamat: <?php echo $data['alamat'] ?></p>
  <p>Telepon: <?php echo $data['telp'] ?></p>
</div>
<?php
}

//prosedur untuk menampilkan footer
function footer(){
?>
<footer class="footer bg-dark text-white">
  <div class="container text-center">
    <span class="text-muted">&copy; 2023 I Kadek Apri Sisna Saputra</span>
  </div>
</footer>
<?php
}
?>
