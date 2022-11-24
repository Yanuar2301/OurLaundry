<?php

// echo $_SERVER['PHP_SELF'];

if(!isset($_SESSION ['sukses']) || empty($_SESSION ['sukses'])) {
	if(defined('login')) {
		header('Location: login.php');
	}	
}


if(isset($_POST['login'])){
	include "koneksi.php";
	$username=$_POST['username'];
	$password=$_POST['password'];

	$query=$Connection->prepare("SELECT * FROM petugas WHERE username=:username and password=:password");
	$query->BindParam(":username", $username);
	$query->BindParam(":password", $password);
	$query->execute();

	if($query->rowCount()>0){
		$_SESSION ['sukses']="sukses";
		$data=$query->fetch();
		if($data['nama_level']=="administrator"){
			$_SESSION['username']=$data['username'];
			$_SESSION['nama_level']=$data['nama_level'];
			header("location:index.php?login=1");
		}else{
			$_SESSION['username']=$data['username'];
			$_SESSION['level']=$data['level'];
			header('location:petugas.php?login=2');		}
	}
	else{

		echo "<script language='javascript'> alert('Koreksi Username dan Password Anda')</script>";
	}
}
?>