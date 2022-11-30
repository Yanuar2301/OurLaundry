<?php
if (isset($_GET['id']))
{
	$Query = $Connection->query("SELECT * FROM transaksi WHERE id = '$_GET[id]'");
	$data = $Query->fetch(PDO::FETCH_ASSOC);
	$id_login = $_SESSION['id'];
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
								<label>ID Outlet:</label>
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
								<label>ID Member:</label>
								<select class="form-control" name="id_member">
									<option style="background: black;">-- Pilih ID Member --</option>
									<?php  
									$Query = "SELECT * FROM member WHERE id_login = '$id_login'";
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
								<input type="date" class="form-control" name="tgl" value="<?php echo $data['tgl']; ?>">
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

$id_outlet = $_POST['id_outlet'];
$id_member = $_POST['id_member'];
$tgl = $_POST['tgl'];


if (isset($_POST['Update']))
{
	$Querys = "UPDATE `transaksi` SET `id_outlet`='$id_outlet',`id_member`='$id_member', `tgl_masuk`='$tgl' WHERE `id` = '$_GET[id]'";
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