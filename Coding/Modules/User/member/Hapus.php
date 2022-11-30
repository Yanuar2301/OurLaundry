<?php  
include "koneksi.php";
if (isset($_GET['id']))
{
	$Hapus = "DELETE FROM member WHERE id = '$_GET[id]'";
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
			window.location.href = '?hal=member';
		})
	</script>
	<?php
	} 
}
?>