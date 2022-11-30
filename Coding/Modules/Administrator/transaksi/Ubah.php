<?php
if (isset($_GET['id']))
{
	$Query = $Connection->query("SELECT * FROM transaksi WHERE id = '$_GET[id]'");
	$data = $Query->fetch(PDO::FETCH_ASSOC);
}
?>
<div class="row">
	<div class="col-12">
		<div class="card card-chart">
			<div class="card-header">
				<div class="row">
					<div class="col-sm-6 text-left">
						
						<h2 class="card-tittle">Ubah Data</h2>
					</div>
					<div class="col-sm-6 text-right">
						<a href="?hal=transaksi" class="btn btn-sm btn-danger mb-3">
							<i class="tim-icons tim-icons-lg icon-minimal-left"></i>
							&nbsp;
							KEMBALI
						</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row justify-content-center">
					<div class="col-md-6">
						<form method="POST">
							
							<div class="form-group">
								<label>Kode Invoice</label>
								<input type="text" class="form-control" name="kode_invoice" value="<?php echo $data['kode_invoice']; ?>">
							</div>

							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status">
									<option value="<?php echo $data['status'] ?>"><?php echo $data['status']; ?></option>
								<option style="background: black;">-- Pilih Status --</option>	
									<option value="baru" style="background: black;">Baru</option>
									<option value="diproses" style="background: black;">Diproses</option>
									<option value="selesai" style="background: black;">Selesai</option>
									<option value="diambil" style="background: black;">Diambil</option>

								</select>							
							</div>

							<div class="form-group">
								<label>Tanggal</label>
								<input type="text" class="form-control" name="tgl" value="<?php echo $data['tgl_masuk']; ?>" readonly >
							</div>

							<div class="form-group">
								<label>Batas Waktu</label>
								<input type="date" class="form-control" name="batas_waktu" value="<?php echo $data['batas_waktu']; ?>">
							</div>	


							<div class="form-group">
								<label>Tanggal Bayar</label>
								<input type="date" class="form-control" name="tgl_bayar" value="<?php echo $data['tgl_bayar']; ?>">
							</div>


							<div class="form-group">
								<label>Dibayar</label>
								<select class="form-control" name="dibayar">
									<option style="background: black;">-- Pilih Status --</option>
									<option value="dibayar" style="background: black;">Dibayar</option>
									<option value="belum bayar" style="background: black;">Belum Bayar</option>
								</select>
							</div>
							<input type="submit" class="btn btn-success mb-4 float-left" name="Update">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php  
error_reporting(0);
$status = $_POST['status'];
$kode_invoice = $_POST['kode_invoice'];
$dibayar = $_POST['dibayar'];
$tgl_bayar = $_POST['tgl_bayar'];
$batas_waktu = $_POST['batas_waktu'];


if (isset($_POST['Update']))
{
	$Querys = "UPDATE `transaksi` SET `kode_invoice`='$kode_invoice',`tgl_bayar`='$tgl_bayar',`batas_waktu`='$batas_waktu', `status`='$status',`dibayar`='$dibayar' WHERE `id` = '$_GET[id]'";
	$Connection->exec($Querys);
	if ($Query)
	{
	?>
	<script type="text/javascript">
		Swal.fire({
			title: 'Success',
			text: 'Data Berhasil Diubah !',
			type: 'success',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			confirmButtonText: 'Okay !'
		}).then((result) => {
			window.location.href = '?hal=transaksi';
		})
	</script>
	<?php
	}
}
?>