<?php
error_reporting(0);
$Tampil = "SELECT max(id) as MAXKODE FROM paket";
$Query = $Connection->query($Tampil);
foreach($Query as $data)
{
	$kode = $data['MAXKODE'];
	$noUrut = (int) substr($kode, 2, 3);
	@$noUrut++;
	$char = "DP";
	$Kos = $char . sprintf("%03s", $noUrut);
}

$id = $_POST['id'];
$id_outlet = $_POST['id_outlet'];
$jenis = $_POST['jenis'];
$nama_paket = $_POST['nama_paket'];
$harga = $_POST['harga'];

if (isset($_POST['Tambah']))
{
	$Query = "INSERT INTO paket VALUES ('$id', '$id_outlet', '$jenis', '$nama_paket', '$harga')";
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
			window.location.href = '?hal=paket';
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
			window.location.href = '?hal=paket&aksi=Tambah';
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
						<a href="?hal=KELAS" class="btn btn-sm btn-danger mb-3">
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
								<label>Jenis</label>
								<select class="form-control" name="jenis">
									<option style="background: black;">-- Pilih Nama Jenis --</option>
									<option value="kiloan" style="background: black;">Kiloan</option>
									<option value="selimut" style="background: black;">Selimut</option>
									<option value="bed_cover" style="background: black;">Bed Cover</option>
									<option value="kaos" style="background: black;">Kaos</option>
									<option value="lain" style="background: black;">Lain</option>
									
								</select>
								<div class="form-group">
								<label>Nama Paket</label>
								<input type="text" placeholder="Nama Paket" class="form-control" name="nama_paket">
							</div>

							<div class="form-group">
								<label>Harga</label>
								<input type="" placeholder="Harga" class="form-control" name="harga">
							</div>

							<input type="submit" class="btn btn-success mb-3 float-right" name="Tambah">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>