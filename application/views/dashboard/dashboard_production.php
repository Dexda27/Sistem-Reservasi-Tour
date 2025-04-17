<h4 class="fw-bold py-3 mb-3"><span class="text-muted fw-light"> Dashboard /</span> Production</h4>
<div class="row gy-3">
	<div class="col-lg-3 col-sm-6 mb-4">
		<div class="card p-2">
			<div class="card-body d-flex justify-content-between align-items-center">
				<div class="card-title mb-0">
					<h4 class="mb-0 me-2">
						<?= $programStats['jumlahProduk']  ?> 
					</h4>
					<small class="text-muted">Total Product</small>
				</div>
				<div class="card-icon">
					<span class="badge bg-label-warning rounded-pill p-2">
						<i class="tf-icons ti ti-color-swatch"></i>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6 mb-4">
		<div class="card p-2">
			<div class="card-body d-flex justify-content-between align-items-center">
				<div class="card-title mb-0">
					<h5 class="mb-0 me-2">
						<?= $programStats['jumlahProgram']  ?> 
					</h5>
					<small>Total Program</small>
				</div>
				<div class="card-icon">
					<span class="badge bg-label-danger rounded-pill p-2">
						<i class="tf-icons ti ti-table-options"></i>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6 col-md-6">
		<div class="card">
			<div class="card-body d-flex justify-content-between">
				<div class="d-flex flex-column">
					<div class="card-title mb-auto">
						<h5 class="mb-1 text-nowrap">Program</h5>
						<small>Monthly Report</small>
					</div>
					<div class="chart-statistics">
						<h3 class="card-title mb-1"> 
							<?= $programStats['jumlahProgram']  ?> 
						</h3>
					</div>
				</div>
				<div id="generatedLeadsChart"></div>
			</div>
		</div>
	</div> 
	<div class="col-lg-6 col-md-6">
		<div class="card">
			<div class="card-body d-flex justify-content-between">
				<div class="d-flex flex-column">
					<div class="card-title mb-auto">
						<h5 class="mb-1 text-nowrap">Product</h5>
						<small>Monthly Report</small>
					</div>
					<div class="chart-statistics">
						<h3 class="card-title mb-1">
							<?= $programStats['jumlahProduk']  ?> 
						</h3>
					</div>
				</div>
				<div id="generatedLeadsChartProduk"></div>
			</div>
		</div>
	</div> 
</div>
<script id="dataProgram" type="application/json"> 
	<?= $program  ?> 
</script> 
<script id="dataProduk" type="application/json"> 
	<?= $produk  ?> 
</script>