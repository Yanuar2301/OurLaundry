<?php  
$aksi = @$_GET['aksi'];
switch ($aksi) {

	case 'Tambah':
		include "Tambah.php";
		break;


	case 'Ubah':
		include "Ubah.php";
		break;


	case 'Hapus':
		include "Hapus.php";
		break;
	
	default:
		include "Lihat.php";
		break;
}

?>