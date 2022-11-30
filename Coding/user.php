<?php 

	ob_start();
	session_start();
	if(!isset($_SESSION['id']))  header("location: login.php");
	include "Assets/includes/config.php ";

?>




<?php include "koneksi.php"; define('HOME', 'HOME');
include "session.php";?>
<!DOCTYPE html>
<html>
<head>
	<!-- Required Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>APLIKASI PENGELOLAAN LAUNDRY</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Default CSS -->
	<link rel="icon" href="assets/img/transaksi.png" type="image/x-icon">

	<!-- Fonts and icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Poppins:500|Viga" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
 	<!-- Nucleo Icons -->
  	<link href="Assets/css/nucleo-icons.css" rel="stylesheet" />
  	<!-- CSS Files -->
  	<link href="Assets/css/black-dashboard.min.css?v=1.0.0" rel="stylesheet" />
  	<!-- Sweet Alert -->
  	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
</head>
<body>

	<div class="wrapper">
		<div class="sidebar">
	      	<div class="sidebar-wrapper">
	        	<div class="logo">
	          		</a>
	          		<a href="#" class="simple-text logo-normal">
	            	APLIKASI PENGELOLAAN LAUNDRY
	          		</a>
	          	</div>
	          	<ul class="nav">
		          <li class="<?php echo	!isset($_GET['hal']) ? 'active' : ''; ?>">
		            <a href="?">
						<i class=""></i>
		              <p>BERANDA</p>
		            </a>
		          </li>

				  <li class="<?php echo	isset($_GET['hal']) && $_GET['hal'] == 'member' ? 'active' : ''; ?>">
		            <a href="?hal=member">
		              <i class=""></i>
		              <p>Buat Member</p>
		            </a>
		          </li>
		          <li class="<?php echo	isset($_GET['hal']) && $_GET['hal'] == 'outlet' ? 'active' : ''; ?>">
		            <a href="?hal=outlet">
		              <i class=""></i>
		              <p>Data OUTLET</p>
		            </a>
		          </li>
		          <li class="<?php echo	isset($_GET['hal']) && $_GET['hal'] == 'transaksi' ? 'active' : ''; ?>">
		            <a href="?hal=transaksi">
		              <i class=""></i>
		              <p>TRANSAKSI</p>
		            </a>
		          </li>
		        </ul>
	        </div>
        </div>
        <div class="main-panel">
        	<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        		<div class="container-fluid">
        			<div class="navbar-wrapper">
        				<div class="navbar-toggle d-inline">
	        				<button type="button" class="navbar-toggler">
				                <span class="navbar-toggler-bar bar1"></span>
				                <span class="navbar-toggler-bar bar2"></span>
				                <span class="navbar-toggler-bar bar3"></span>
				            </button>
				        </div>
			            <!-- a class="navbar-brand" href="#">
			            	<?php  
			            	if (isset($_GET['hal']))
			            	{
			            		if ($_GET['hal'] == 'tb_detail_transaksi')
			            		{
			            			print "tb_detail_transaksi";
			            		} elseif ($_GET['hal'] == 'tb_member')
			            		{
			            			print "tb_member";
			            		} elseif ($_GET['hal'] == 'tb_transaksi')
			            		{
			            			print "tb_transaksi";
			            		}
			            	} else {
			            		print "BERANDA";
			            	}
			            	?>
			            </a> -->
        			</div>
        			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
			            <span class="navbar-toggler-bar navbar-kebab"></span>
			            <span class="navbar-toggler-bar navbar-kebab"></span>
			            <span class="navbar-toggler-bar navbar-kebab"></span>
		          	</button>
		          	<div class="collapse navbar-collapse" id="navigation">
			            <ul class="navbar-nav ml-auto">
			              	<li class="dropdown nav-item">
				                <a href="logout.php" class="dropdown-toggle nav-link" data-toggle="dropdown">
				                  <div class="photo">
				                    <img src="assets/img/orang4.png" alt="">
				                  </div>
				                  <b class="caret d-none d-lg-block d-xl-block"></b>
				                  <p class="d-lg-none">
				                    Log out
				                  </p>
				                </a>
				                <ul class="dropdown-menu dropdown-navbar">
				                  <li class="nav-link">
				                  	<a href="Logout.php?Logout=True" class="nav-item dropdown-item">Log out</a>
				                  </li>
				                </ul>
				            </li>
			            </ul>
			        </div>
        		</div>
        	</nav>
        	<div class="content">
        		<?php include"Modules/User/index.php"; ?>
        	</div>
        </div>
	</div>



	<!--   Core JS Files   -->
	<script src="Assets/js/core/jquery.min.js"></script>
	<script src="Assets/js/core/popper.min.js"></script>
	<script src="Assets/js/core/bootstrap.min.js"></script>
	<script src="Assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
</body>
</html>

<?php  

mysqli_close($koneksi);
ob_end_flush();

?>