<?php
error_reporting(0);
$Tampil = "SELECT max(id) as MAXKODE FROM outlet";
$Query = $Connection->query($Tampil);
foreach($Query as $data)
{
	$kode = $data['MAXKODE'];
	$noUrut = (int) substr($kode, 2, 2);
	@$noUrut++;
	$char = "O";
	$Kos = $char . sprintf("%03s", $noUrut);
}

$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];

if (isset($_POST['Tambah']))
{
	$Query = "INSERT INTO outlet VALUES ('$id', '$nama', '$alamat',  '$tlp')";
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
			window.location.href = '?hal=outlet';
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
			window.location.href = '?hal=outlet&aksi=Tambah';
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
						<a href="?hal=outlet" class="btn btn-sm btn-danger mb-3">
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
								<label>Nama</label>
								<input type="text" placeholder="Nama" class="form-control" name="nama">
							</div>
							<div class="form-group">
								<label>Alamat:</label>
								<input type="text" placeholder="Alamat" class="form-control" name="alamat">
							</div>
							<div class="form-group">
								<label>Nomor Telepon</label>
								<input type="number" placeholder="Nomor Telepon" class="form-control" name="tlp">
							</div>
							<input type="submit" class="btn btn-success mb-3 float-right" name="Tambah">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>