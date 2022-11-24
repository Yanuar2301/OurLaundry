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

$id = $_POST['id'];
$id_outlet = $_POST['id_outlet'];
$kode_invoice = $_POST['kode_invoice'];
$id_member = $_POST['id_member'];
$tgl = $_POST['tgl'];
$batas_waktu = $_POST['batas_waktu'];
$tgl_bayar = $_POST['tgl_bayar'];
$status = $_POST['status'];
$dibayar = $_POST['dibayar'];
$id_user = $_POST['id_user'];

if (isset($_POST['Tambah']))
{
	$Query = "INSERT INTO transaksi VALUES ('$id', '$id_outlet', '$kode_invoice', '$id_member', '$tgl','$batas_waktu','$tgl_bayar','$status','$dibayar','$id_user')";
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
								<label>Kode_Invoice</label>
								<input type="text" placeholder="Kode Invoice" class="form-control" name="kode_invoice">
							</div>


							<div class="form-group">
								<label>ID Member:</label>
								<select class="form-control" name="id_member">
									<option style="background: black;">-- Pilih ID Member --</option>
									<?php  
									$Query = "SELECT * FROM member";
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

							<div class="form-group">
								<label>Batas Waktu</label>
								<input type="date" placeholder="Batas Waktu" class="form-control" name="batas_waktu">
							</div>	

							<div class="form-group">
								<label>Tanggal Bayar</label>
								<input type="date" placeholder="Tanggal Bayar" class="form-control" name="tgl_bayar">
							</div>

							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status">
									<option style="background: black;">-- Pilih Status --</option>
									<option value="baru" style="background: black;">Baru</option>
									<option value="proses" style="background: black;">Proses</option>
									<option value="selesai" style="background: black;">Selesai</option>
									<option value="diambil" style="background: black;">Diambil</option>
								</select>
							</div>

							<div class="form-group">
								<label>Dibayar</label>
								<select class="form-control" name="dibayar">
									<option style="background: black;">-- Pilih Status --</option>
									<option value="dibayar" style="background: black;">Dibayar</option>
									<option value="belum_bayar" style="background: black;">Belum Bayar</option>
								</select>
							<div class="form-group">
								<label>ID User:</label>
								<select class="form-control" name="id_user">
									<option style="background: black;">-- Pilih ID Member --</option>
									<?php  
									$Query = "SELECT * FROM user";
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


							<input type="submit" class="btn btn-success mb-3 float-right" name="Tambah">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>