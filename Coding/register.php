<?php 

	ob_start();
	session_start();
	if(isset($_SESSION['akun_username']))  header("location: index.php");
	include "Assets/includes/config.php ";

    if(isset($_POST['daftar'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_com = $_POST['konpassword'];
        if ($password === $password_com){
            // cek username
            $hasil = mysqli_query($koneksi, "SELECT username FROM login WHERE username = '$username'");
            if(mysqli_fetch_assoc($hasil)){
                header("location: register.php?register-gagal-username");
            }else{
                $sql = mysqli_query($koneksi,"INSERT INTO `login`( `username`, `password`, `nama`) VALUES ('$username','$password','$nama')");
                if ($sql){
                    header("location: login.php");
                }else{
                    header("location: register.php?register-gagal");
                }
            }
        }else{
            header("location: register.php?register-gagal");
        }
    }

?>






<?php
define('REGISTER', 'REGISTER');

include ('session.php');
// session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>REGISTER</title>
	<link rel="stylesheet" type="text/css" href="assets/css/Register.css?3">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="icon" href="assets/img/transaksi.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="nav-header">
		<a href="login.php" class="nav-logo"><img src="assets/img/logo_login.jpg"></a>
		<p>OurLaundry</p>
	</div>
	<section>
		<div class="background">
			<img src="Assets/img/logo_login.jpg">
		<form method="POST">
			<div class="form-input">
                <input type="text" name="username" id="username" placeholder="Username">
            <div class="form-input">
				<input type="text" name="nama" id="username" placeholder="Nama">
			<div class="form-input">
				<input type="password" name="password" id="password" placeholder="Password">
			</div>
			<div class="form-input">
				<input type="password" name="konpassword" id="password" placeholder="KonfirmasiPassword">
			</div>
            <?php 

			if(isset($_GET['register-gagal-username'])) {?>
			<tr>
                <div> 
                    <p>Maaf, Username Sudah digunakan</p>
                </div>
			</tr>
		<?php }?>
            <?php 

			if(isset($_GET['register-gagal'])) {?>
			<tr>
                <div> 
                    <p>Maaf, Registerasi Gagal</p>
                </div>
			</tr>
		<?php }?>
			<button type="submit" name="daftar"><i class="fa fa-sign-in"></i>&nbsp;Register</button>
			<p class="register-register-text">Mempunyai Akun? <a href="login.php">Login disini</a>.</p>
		</form>
		</div>
	</section>
	
</body>
</html>

<?php  

mysqli_close($koneksi);
ob_end_flush();

?>