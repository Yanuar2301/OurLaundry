<?php
if (isset($_GET['id']))
{
	$Query = $Connection->query("SELECT * FROM user WHERE id = '$_GET[id]'");
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
								<label>ID:</label>
								<input type="text" class="form-control" name="id" value="<?php echo $data['id']; ?>" readonly>
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="text" class="form-control" name="password" value="<?php echo $data['password']; ?>">
							</div>
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
								<label>Role</label>
								<select class="form-control" name="role">
									<option value="<?php echo $data['role'] ?>"><?php echo $data['role']; ?></option>
								<option style="background: black;">-- Nama Role --</option>
									<option value="admin" style="background: black;">Admin</option>
									<option value="kasir" style="background: black;">Kasir</option>
									<option value="owner" style="background: black;">Owner</option>
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
$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$id_outlet = $_POST['id_outlet'];
$role = $_POST['role'];

if (isset($_POST['Update']))
{
	$Querys = "UPDATE user SET id = '$id',
										 nama = '$nama',
										 username = '$username',
										 password = '$password',
										 id_outlet = '$id_outlet',
										 role = '$role'
										 
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
			window.location.href = '?hal=user';
		})
	</script>
	<?php
	}
}
?>