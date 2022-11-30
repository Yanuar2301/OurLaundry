<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header bg-danger pb-2">
				<h4 class="card-title"><i class="tim-icons tim-icons-lg icon-notes"></i>&nbsp;DATA MEMBER</h4>
				<h6 class="card-subtitle">Total Data</h6>
			</div>
			<div class="card-body" style="background: linear-gradient(0deg,#ba54f5,#e14eca);">
				<p class="text-center pt-4 pb-4" style="font-size: 32px;">
					<?php echo $Rows = $Connection->query("SELECT COUNT(*) FROM member")->fetchColumn(); ?>
				</p>
			</div>
		</div>	
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header bg-warning pb-2">
				<h4 class="card-title"><i class="tim-icons tim-icons-lg icon-paper"></i>&nbsp;DATA TRANSAKSI</h4>
				<h6 class="card-subtitle">Total Data</h6>
			</div>
			<div class="card-body" style="background: linear-gradient(0deg,#ba54f5,#e14eca);">
				<p class="text-center pt-4 pb-4" style="font-size: 32px;">
					<?php echo $Rows = $Connection->query("SELECT COUNT(*) FROM transaksi ")->fetchColumn(); ?>
				</p>
			</div>
		</div>
	</div> 
	<div class="col-md-5">
		<div class="card">
			<div class="card-header bg-warning pb-2">
				<h4 class="card-title"><i class="tim-icons tim-icons-lg icon-paper"></i>&nbsp;DATA OUTLET</h4>
				<h6 class="card-subtitle">Total Data</h6>
			</div>
			<div class="card-body" style="background: linear-gradient(0deg,#ba54f5,#e14eca);">
				<p class="text-center pt-4 pb-4" style="font-size: 32px;">
					<?php echo $Rows = $Connection->query("SELECT COUNT(*) FROM outlet ")->fetchColumn(); ?>
				</p>
			</div>
		</div>
	</div> 
	<div class="col-md-5">
		<div class="card">
			<div class="card-header bg-warning pb-2">
				<h4 class="card-title"><i class="tim-icons tim-icons-lg icon-paper"></i>&nbsp;DATA PEKERJA</h4>
				<h6 class="card-subtitle">Total Data</h6>
			</div>
			<div class="card-body" style="background: linear-gradient(0deg,#ba54f5,#e14eca);">
				<p class="text-center pt-4 pb-4" style="font-size: 32px;">
					<?php echo $Rows = $Connection->query("SELECT COUNT(*) FROM pekerja ")->fetchColumn(); ?>
				</p>
			</div>
		</div>
	</div> 
</div> 

