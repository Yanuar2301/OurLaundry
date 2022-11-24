<div class="row">
	<div class="col-12">
		<div class="card card-chart">
			<div class="card-header">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h2 class="card-tittle">OUTLET</h2>
						

					</div>
					<div class="col-sm-6 text-right">
						<a href="?hal=outlet&aksi=Tambah" class="btn btn-sm btn-success mb-3">
							<i class="tim-icons tim-icons-lg icon-simple-add"></i>
							&nbsp;
							TAMBAH DATA
						</a>

				<div class="col-sm-12 text-right">
						<a href="laporan/outlet/laporan_print.php" onclick="print_d()" class="btn btn-sm btn-success mb-5">
							<i class="fa fa-print"></i></i>&nbsp;&nbsp;PRINT</a>
						<a href="laporan/outlet/laporan_pdf.php" onclick="print_d()" class="btn btn-sm btn-success mb-5">
							<i class="fa fa-print"></i></i>&nbsp;&nbsp;PDF</a>
						<a href="laporan/outlet/laporan_excel.php" onclick="print_d()" class="btn btn-sm btn-success mb-5">
							<i class="fa fa-print"></i></i>&nbsp;&nbsp;EXCEL</a>
				</div>
						<form method="POST">
							<input type="text" placeholder="Masukan Nama Outlet" class="form-control w-50 float-right" name="kata">
							<button class="btn btn-success btn-sm w-50" name="cari">
								<i class="tim-icons tim-icons-lg icon-tap-02"></i>
							</button>
						</form>
					</div>
				</div>
			</div>
			<div class="card-body">
				<hr style="border: 1px solid #fafafa; border-radius: 50px;">
				<table class="table tablesorter">
					<thead align="center">
						<tr>
							<th>NO</th>
							<th>ID</th>
							<th>Nama Outlet</th>
							<th>Alamat</th>
							<th>Nomor Telepon</th>
							<th>
								<i class="tim-icons tim-icons-lg icon-settings"></i>
							</th>
						</tr>
					</thead>
					<tbody align="center">
						<?php
						if (isset($_POST['cari']))
						{
							$Keywoard = $_POST['kata'];
							$Query = "SELECT * FROM outlet WHERE nama LIKE '%$Keywoard%'";
						} else {
							$Query = "SELECT * FROM outlet";
						}
						$No = 1;
						$Qry = $Connection->query($Query);
						while ($data = $Qry->fetch(PDO::FETCH_ASSOC))
						{
						?>
						<tr>
							<td><?php echo $No++; ?></td>
							<td><?php echo $data['id']; ?></td>
							<td><?php echo ucfirst($data['nama']); ?></td>
							<td><?php echo ucfirst($data['alamat']); ?></td>
							<td><?php echo ucfirst($data['tlp']); ?></td>
							<td>
								<a href="?hal=outlet&aksi=Ubah&id=<?php echo $data['id']; ?>" class="btn btn-sm btn-warning">
									<i class="tim-icons tim-icons-lg icon-pencil"></i>
								</a>
								&nbsp;
								<a href="?hal=outlet&aksi=Hapus&id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger">
									<i class="tim-icons tim-icons-lg icon-trash-simple"></i>
								</a>
							</td>
						</tr>
						<?php  
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>