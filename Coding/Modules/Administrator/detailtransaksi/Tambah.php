<?php
error_reporting(0);
$Tampil = "SELECT max(id) as MAXKODE FROM detailtransaksi";
$Query = $Connection->query($Tampil);
foreach($Query as $data)
{
	$kode = $data['MAXKODE'];
	$noUrut = (int) substr($kode, 2, 3);
	@$noUrut++;
	$char = "DT";
	$Kos = $char . sprintf("%03s", $noUrut);
}

$id = $_POST['id'];
$id_transaksi = $_POST['id_transaksi'];
$id_paket = $_POST['id_paket'];
$qty = $_POST['qty'];
$keterangan = $_POST['keterangan'];

if (isset($_POST['Tambah']))
{
	$Query = "INSERT INTO detailtransaksi VALUES ('$id', '$id_transaksi', '$id_paket', '$qty', '$keterangan')";
	$Connection->exec($Query);
	if ($Query)
	{
	?>
	<script type="text/javascript">
		Swal.fire({
			title: 'Success',
			text: 'Data Berhasil Disimpan !',
			type: 'success',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			confirmButtonText: 'Okay !'
		}).then((result) => {
			window.location.href = '?hal=detailtransaksi';
		})
	</script>
	<?php	
	} else {
	?>
	<script type="text/javascript">
		Swal.fire({
			title: 'Failed',
			text: 'Data Gagal Disimpan !',
			type: 'success',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			confirmButtonText: 'Okay !'
		}).then((result) => {
			window.location.href = '?hal=detailtransaksi&aksi=Tambah';
		})
	</script>
	<?php
	}
}
?>
<div class="row">
	<div class="col-12">
		<div class="card card-chart">
			<div class="card-header">
				<div class="row">
					<div class="col-sm-6 text-left">
						
						<h2 class="card-tittle">Tambah Data</h2>
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
								<input type="text" class="form-control" name="id" value="<?php echo $Kos; ?>" readonly>
							</div>

							<div class="form-group">
								<label>ID Transaksi</label>
								<select class="form-control" name="id_transaksi">
									<option style="background: black;">-- Pilih ID Transaksi --</option>
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
									<option style="background: black;">-- Pilih ID Paket --</option>
									<?php  
									$Query = "SELECT * FROM paket";
									$Qry = $Connection->query($Query);
									while($data = $Qry->fetch(PDO::FETCH_ASSOC))
									{
									?>
									<option style="background: black;" value="<?php echo $data['id'] ?>"><?php echo $data['id'] . " | " . $data['nama_paket']; ?></option>
									<?php  
									}
									?>
								</select>
							</div>


							<div class="form-group">
								<label>QTY</label>
								<input type="text" placeholder="QTY" class="form-control" name="qty">
							</div>

							<div class="form-group">
								<label>Nomor Keterangan</label>
								<input type="text" placeholder="Keterangan" class="form-control" name="keterangan">
							</div>
							<input type="submit" class="btn btn-success mb-3 float-right" name="Tambah">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>