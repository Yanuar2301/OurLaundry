<?php  
$hal = @$_GET['hal'];
switch ($hal) {

	case 'member':
		include "Modules/Administrator/member/index.php";
		break;
	
	case 'paket':
		include "Modules/Administrator/paket/index.php";
		break;

	case 'outlet':
		include "Modules/Administrator/outlet/index.php";
		break;

	case 'detailtransaksi':
		include "Modules/Administrator/detailtransaksi/index.php";
		break;


	case 'user':
		include "Modules/Administrator/user/index.php";
		break;


	case 'transaksi':
		include "Modules/Administrator/transaksi/index.php";
		break;


	default:
		include "Modules/Administrator/beranda/index.php";
		break;
}
?>