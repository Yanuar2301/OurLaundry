<?php
if (isset($_GET['id']))
{
	$Query = $Connection->query("SELECT * FROM detailtransaksi WHERE id	 = '$_GET[id]'");
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
						<a href="?hal=detailtransaksi" class="btn btn-sm btn-danger mb-3">
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
								<label>ID</label>
								<input type="text" class="form-control" name="id" value="<?php echo $data['id']; ?>" readonly>
							</div>
							<div class="form-group">
								<label>ID Transaksi</label>
								<select class="form-control" name="id_transaksi">
								<option value="<?php echo $data['id_transaksi']; ?>"><?php echo $data['id_transaksi']; ?></option>
									<?php  
									$Query = "SELECT * FROM transaksi";
									$Qry = $Connection->query($Query);
									while($data = $Qry->fetch(PDO::FETCH_ASSOC))
									{
									?>
									<option style="background: black;" value="<?php echo $data['id'] ?>"><?php echo $data['id']; ?></option>
									<?php  
									}
									?>
								</select>
							</div>
							
							<div class="form-group">
								<label>ID Paket</label>
								<select class="form-control" name="id_paket">
								<option value="<?php echo $data['id_paket']; ?>"><?php echo $data['id_paket']; ?></option>
									<?php  
									$Query = "SELECT * FROM paket";
									$Qry = $Connection->query($Query);
									while($data = $Qry->fetch(PDO::FETCH_ASSOC))
									{
									?>
									<option style="background: black;" value="<?php echo $data['id'] ?>"><?php echo $data['id'] . " | " . $data['nama_paket']; ?></option>; ?></option>
									<?php  
									}
									?>
								</select>
							</div>


							<div class="form-group">
								<label>QTY</label>	
								<input type="number" class="form-control" name="qty" value="<?php echo $data['qty']; ?>">
							</div>
							<div class="form-group">
								<label>Keterangan</label>	
								<input type="text" class="form-control" name="keterangan" value="<?php echo $data['keterangan']; ?>">
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
$id = $_POST['id'];
$id_transaksi = $_POST['id_transaksi'];
$id_paket = $_POST['id_paket'];
$qty = $_POST['qty'];
$keterangan = $_POST['keterangan'];

if (isset($_POST['Update']))
{
	$Querys = "UPDATE detailtransaksi SET id = '$id',
										 id_transaksi = '$id_transaksi',
										 id_paket = '$id_paket',
										 qty = '$qty',
										 keterangan = '$keterangan'
										 WHERE id = '$_GET[id]'";
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
			window.location.href = '?hal=detailtransaksi';
		})
	</script>
	<?php
	}
}
?>