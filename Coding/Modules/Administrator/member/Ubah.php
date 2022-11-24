<?php
if (isset($_GET['id']))
{
	$Query = $Connection->query("SELECT * FROM member WHERE id	 = '$_GET[id]'");
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
						<a href="?hal=member" class="btn btn-sm btn-danger mb-3">
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
								<label>Nama</label>
								<input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
							</div>
							<div class="form-group">
								<label>Alamat</label>
							<input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>">

							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select class="form-control" name="jenis_kelamin">
									<option value="<?php echo $data['jenis_kelamin'] ?>"><?php echo $data['jenis_kelamin']; ?></option>
								<option style="background: black;">-- Pilih Jenis Kelamin --</option>	
									<option value="P" style="background: black;">P</option>
									<option value="L" style="background: black;">L</option>
								</select>							
							</div>

							<div class="form-group">
								<label>No Telpon</label>
								<input type="number" class="form-control" name="tlp" value="<?php echo $data['tlp']; ?>">
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
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tlp = $_POST['tlp'];

if (isset($_POST['Update']))
{
	$Querys = "UPDATE member SET id = '$id',
										 nama = '$nama',
										 alamat = '$alamat',
										 jenis_kelamin = '$jenis_kelamin',
										 tlp = '$tlp'
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
			window.location.href = '?hal=member';
		})
	</script>
	<?php
	}
}
?>