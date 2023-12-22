<?php
session_start();
if(!isset($_SESSION['sesi']) && $_SESSION['sesi']!='admin'){
  header("location:login.php");
}else{
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/icon-48x48.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Aplikasi Pameran Mahasiswa</title>
  </head>
  <body>
    <?php
    include("koneksi.php"); //memanggil file koneksi.php
    include("function.php"); //memanggil file function.php
    menu(); //memanggil prosedur menu

    if(isset($_GET['carijur'])){
      include("jurusan.php");
    } else if(isset($_GET['carikat'])){
      include ("kategori.php");
    } else if(isset($_GET['cariadm'])){
      include ("admin.php");
    } else if(isset($_GET['carisis'])){
      include ("siswa.php");
    } else if(isset($_GET['caripro'])){
      include ("produk.php");
    } else if(isset($_GET['hal'])){
      $hal=$_GET['hal'];
    if($hal=='jurusan'){
      include("jurusan.php");
    }else if($hal=='jurtambah'){
      include("jurusan_tambah.php");
    }else if($hal=='juredit'){
      include("jurusan_edit.php");
    }else if($hal=='jurhapus'){
      include("jurusan_hapus.php");
    }else if($hal=='kategori'){
      include("kategori.php");
    }else if($hal=='kattambah'){
      include ("kategori_tambah.php");
    }else if($hal=='katedit'){
      include("kategori_edit.php");
    }else if($hal=='kathapus'){
      include("kategori_hapus.php");
    }else if($hal=='admin'){
      include("admin.php");
    }else if($hal=='admtambah'){
      include ("admin_tambah.php");
    }else if($hal=='admedit'){
      include("admin_edit.php");
    }else if($hal=='admhapus'){
      include("admin_hapus.php");
    }else if($hal=='siswa'){
      include("siswa.php");
    }else if($hal=='sistambah'){
      include ("siswa_tambah.php");
    }else if($hal=='sisedit'){
      include("siswa_edit.php");
    }else if($hal=='sisshow'){
      include("siswa_show.php");
    }else if($hal=='sishapus'){
      include("siswa_hapus.php");
    }else if($hal=='produk'){
      include("produk.php");
    }else if($hal=='protambah'){
      include ("produk_tambah.php");
    }else if($hal=='proedit'){
      include("produk_edit.php");
    }else if($hal=='proshow'){
      include("produk_show.php");
    }else if($hal=='prohapus'){
      include("produk_hapus.php");
    }
  }else{
      beranda(); //memanggil prosedur beranda
    }

    footer(); //memanggil prosedur footer
    ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="bootstrap/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="bootstrap/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<?php }?>