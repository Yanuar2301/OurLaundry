<?php
error_reporting(0);
$Tampil = "SELECT max(id) as MAXKODE FROM transaksi";
$Query = $Connection->query($Tampil);
foreach($Query as $data)
{
	$kode = $data['MAXKODE'];
	$noUrut = (int) substr($kode, 2,2);
	@$noUrut++;
	$char = "T";
	$Kos = $char . sprintf("%03s", $noUrut);
}

$id_login = $_SESSION['id'];
$id = $Kos;
$id_outlet = $_POST['id_outlet'];
$id_member = $_POST['id_member'];
$tgl = $_POST['tgl'];

if (isset($_POST['Tambah']))
{
	$Query = "INSERT INTO transaksi VALUES ('Menunggu', '$id_outlet', 'Menunggu', '$id_member', '$tgl','Menunggu','Menunggu','Menunggu','Menunggu','$id_login')";
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
			window.location.href = '?hal=transaksi';
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
			window.location.href = '?hal=transaksi&aksi=Tambah';
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
						<a href="?hal=user" class="btn btn-sm btn-danger mb-3">
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
								<label>ID Outlet:</label>
								<select class="form-control" name="id_outlet">
									<option style="background: black;">-- Pilih ID Outlet --</option>
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
								<label>ID Member:</label>
								<select class="form-control" name="id_member">
									<option style="background: black;">-- Pilih ID Member --</option>
									<?php  
									$Query = "SELECT * FROM member WHERE id_login = '$id_login' ";
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
								<label>Tanggal</label>
								<input type="date" placeholder="Tanggal" class="form-control" name="tgl">
							</div>

							<input type="submit" class="btn btn-success mb-3 float-right" name="Tambah">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>