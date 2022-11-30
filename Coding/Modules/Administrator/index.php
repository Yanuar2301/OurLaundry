<?php  
$hal = @$_GET['hal'];
switch ($hal) {

	case 'member':
		include "Modules/Administrator/member/index.php";
		break;
	
	case 'outlet':
		include "Modules/Administrator/outlet/index.php";
		break;

	case 'pekerja':
		include "Modules/Administrator/pekerja/index.php";
		break;
		
	case 'transaksi':
		include "Modules/Administrator/transaksi/index.php";
		break;

	default:
		include "Modules/Administrator/beranda/index.php";
		break;
}
?>