<?php  
$hal = @$_GET['hal'];
switch ($hal) {

	case 'member':
		include "Modules/User/member/index.php";
		break;
	case 'outlet':
		include "Modules/User/outlet/index.php";
		break;

	case 'transaksi':
		include "Modules/User/transaksi/index.php";
		break;

	default:
		include "Modules/User/beranda/index.php";
		break;
}
?>