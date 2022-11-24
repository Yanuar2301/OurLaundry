<?php  
include "Koneksi.php";
if (isset($_GET['id']))
{
	$Hapus = "DELETE FROM detailtransaksi WHERE id = '$_GET[id]'";
	$Connection->exec($Hapus);

	if ($Hapus)
	{
	?>
	<script type="text/javascript">
		Swal.fire({
			title: 'Success',
			text: 'Data Berhasil Dihapus !',
			type: 'success',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			confirmButtonText: 'Okay !'
		}).then((result) => {
			window.location.href = '?hal=detailtransaksi';
		})
	</script>
	<?php
	} 
}
?>