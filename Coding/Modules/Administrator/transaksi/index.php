<?php  
$aksi = @$_GET['aksi'];
switch ($aksi) {

	case 'Ubah':
		include "Ubah.php";
		break;

	default:
		include "Lihat.php";
		break;
}

?>