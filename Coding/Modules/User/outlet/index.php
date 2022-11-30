<?php  
$aksi = @$_GET['aksi'];
switch ($aksi) {
	default:
		include "Lihat.php";
		break;
}

?>