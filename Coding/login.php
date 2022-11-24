<?php 

	ob_start();
	session_start();
	if(isset($_SESSION['akun_username']))  header("location: index.php");
	include "Assets/includes/config.php ";



	/* Proses Login*/
	if(isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql_login = mysqli_query($koneksi, "SELECT * FROM `admin` WHERE username = '$username' AND password = '$password'");

		if(mysqli_num_rows($sql_login)>0) {
			$row_akun = mysqli_fetch_array($sql_login);
			$_SESSION['id'] = $row_akun['id'];
			$_SESSION['username'] = $row_akun['username'];
			header("location: index.php");
			}else{
				header("location: login.php?login-gagal");
			}
		}



?>






<?php
define('LOGIN', 'LOGIN');

include ('session.php');
// session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="assets/css/Login.css?6">
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
				<input type="password" name="password" id="password" placeholder="Password">
			</div>
			<?php 

			if(isset($_GET['login-gagal'])) {?>
			<tr>
				<td>
					<div> 
						<p>Maaf, Username / Password yang anda masukan salah</p>
					</div>
				</td>
			</tr>
		<?php }?>
			<button type="submit" name="login"><i class="fa fa-sign-in"></i>&nbsp;Masuk</button>
		</form>
		</div>
	</section>
	
</body>
</html>

<?php  

mysqli_close($koneksi);
ob_end_flush();

?>