<?php
if (isset($_GET['id']))
{
	$Query = $Connection->query("SELECT * FROM paket WHERE id	 = '$_GET[id]'");
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
						<a href="?hal=paket" class="btn btn-sm btn-danger mb-3">
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
								<label>ID:</label>
								<input type="text" class="form-control" name="id" value="<?php echo $data['id']; ?>" readonly>
							</div>
							<div class="form-group">
								<label>ID Outlet</label>
								<select class="form-control" name="id_outlet">
								<option value="<?php echo $data['id_outlet']; ?>"><?php echo $data['id_outlet']; ?></option>
									<?php  
									$Query = "SELECT * FROM outlet";
									$Qry = $Connection->query($Query);
									while($data = $Qry->fetch(PDO::FETCH_ASSOC))
									{
									?>
									<option style="background: black;" value="<?php echo $data['id'] ?>"><?php echo $data['id'] . " | " . $data['nama']; ?></option>
									<?php  
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label>Jenis</label>
								<select class="form-control" name="jenis">
									<option value="<?php echo $data['jenis'] ?>"><?php echo $data['jenis']; ?></option>
								<option style="background: black;">-- Pilih Jenis --</option>	
									<option value="kiloan" style="background: black;">Kiloan</option>
									<option value="selimut" style="background: black;">Selimut</option>
									<option value="bed_cover" style="background: black;">Bed Cover</option>
									<option value="kaos" style="background: black;">Kaos</option>
									<option value="lain" style="background: black;">lain</option>
								</select>							
							</div>
							<div class="form-group">
								<label>Nama Paket</label>
								<input type="" placeholder="Nama Paket" class="form-control" name="nama_paket">
							</div>

							<div class="form-group">
								<label>Harga</label>
								<input type="" placeholder="Harga" class="form-control" name="harga">
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
$id_outlet = $_POST['id_outlet'];
$jenis = $_POST['jenis'];
$nama_paket = $_POST['nama_paket'];
$harga = $_POST['harga'];

if (isset($_POST['Update']))
{
	$Querys = "UPDATE paket SET id = '$id',
										 id_outlet = '$id_outlet',
										 jenis = '$jenis',
										 nama_paket = '$nama_paket',
										 harga = '$harga'
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
			window.location.href = '?hal=paket';
		})
	</script>
	<?php
	}
}
?>