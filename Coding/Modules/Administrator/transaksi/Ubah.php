<?php
if (isset($_GET['id']))
{
	$Query = $Connection->query("SELECT * FROM transaksi WHERE id = '$_GET[id]'");
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
								<label>ID:</label>
								<input type="text" class="form-control" name="id" value="<?php echo $data['id']; ?>" readonly>
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
								<label>Kode Invoice</label>
								<input type="text" class="form-control" name="kode_invoice" value="<?php echo $data['kode_invoice']; ?>">
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
								<input type="date" class="form-control" name="tgl" value="<?php echo $data['tgl']; ?>">
							</div>


							<div class="form-group">
								<label>Batas Waktu</label>
								<input type="date" class="form-control" name="batas_aktu" value="<?php echo $data['batas_waktu']; ?>">
							</div>	


							<div class="form-group">
								<label>Tanggal Bayar</label>
								<input type="date" class="form-control" name="tgl_bayar" value="<?php echo $data['tgl_bayar']; ?>">
							</div>


							<div class="form-group">
								<label>Biaya Tambahan</label>
								<input type="text" class="form-control" name="biaya_tambahan" value="<?php echo $data['biaya_tambahan']; ?>">
							</div>


							<div class="form-group">
								<label>Diskon</label>
								<input type="text" class="form-control" name="diskon" value="<?php echo $data['diskon']; ?>">
							</div>


							<div class="form-group">
								<label>Pajak</label>
								<input type="text" class="form-control" name="pajak" value="<?php echo $data['pajak']; ?>">
							</div>


							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status">
									<option value="<?php echo $data['status'] ?>"><?php echo $data['status']; ?></option>
								<option style="background: black;">-- Pilih Status --</option>	
									<option value="baru" style="background: black;">Baru</option>
									<option value="diproses" style="background: black;">Diproses</option>
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


							</div>
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
$kode_invoice = $_POST['kode_invoice'];
$id_member = $_POST['id_member'];
$tgl = $_POST['tgl'];
$batas_waktu = $_POST['batas_waktu'];
$tgl_bayar = $_POST['tgl_bayar'];
$biaya_tambahan = $_POST['biaya_tambahan'];
$diskon = $_POST['diskon'];
$pajak = $_POST['pajak'];
$status = $_POST['status'];
$dibayar = $_POST['dibayar'];
$id_user = $_POST['id_user'];

if (isset($_POST['Update']))
{
	$Querys = "UPDATE transaksi SET id = '$id',
										 id_outlet = '$id_outlet',
										 kode_invoice = '$kode_invoice',
										 id_member = '$id_member',
										 tgl = '$tgl',
										 batas_waktu = '$batas_waktu',
										 tgl_bayar = '$tgl_bayar',
										 biaya_tambahan = '$biaya_tambahan',
										 diskon = '$diskon',
										 pajak = '$pajak',
										 status = '$status',
										 dibayar = '$dibayar',
										 id_user = '$id_user'
										 
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
			window.location.href = '?hal=transaksi';
		})
	</script>
	<?php
	}
}
?>