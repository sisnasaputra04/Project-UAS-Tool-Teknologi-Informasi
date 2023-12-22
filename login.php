<?php
session_start();
if (isset($_SESSION['sesi']) && $_SESSION['sesi']=='admin'){
    header("location:index.php");
}else{
    include("koneksi.php");
?>

<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="stylelogin.css">
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/icon-48x48.png" type="image/x-icon">
    <title>Halaman Login</title>
</head>

<body>
    <div class="container">
        <h1>LOGIN</h1>
        <form method="post">
            <label>Username</label><br>
            <input type="email" name="email" placeholder="admin@gmail.com"><br>
            <label>Password</label><br>
            <input type="password" name="password" placeholder="admin"><br>
            <input type="submit" name="submit" value="login">
        </form>
    </div>

<?php
if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $password= md5($_POST['password']);

    $login = mysqli_query($koneksi,"SELECT * FROM admin WHERE email='".$email."' AND password='".$password."' LIMIT 1");
    $data = mysqli_fetch_array($login);
    
    if($login->num_rows > 0){
        $_SESSION['sesi']='admin';
        $_SESSION['id_admin']=$data['id_admin'];
        echo '
            <script>
                alert("Anda Berhasil Login dan Menuju Ke Halaman Admin");
                window.location = "index.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Maaf Email dan Password tidak sesuai!");
                window.location = "index.php";
            </script>
        ';
    }
}
?>

</body>
</html>
<?php }?>