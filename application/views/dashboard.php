<div class="row">
	<div class="col-lg-12 mb-4 col-md-12">
		<div class="card">
			<div class="card-header d-flex justify-content-between">
				<h5 class="card-title mb-0">Report</h5>
				<small class="text-muted">Diperbaharui setiap bulan</small>
			</div>
			<div class="card-body pt-2">
				<div class="row gy-3">
					<div class="col-md-2 col-6">
						<div class="d-flex align-items-center">
							<div class="badge rounded-pill bg-label-primary me-3 p-2">
								<i class="ti ti-chart-pie-2 ti-sm"></i>
							</div>
							<div class="card-info">
								<h5 class="mb-0"><?= $accountingStats['reservasi_count']?> </h5>
								<small>Sales</small>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-6">
						<div class="d-flex align-items-center">
							<div class="badge rounded-pill bg-label-danger me-3 p-2">
								<i class="ti ti-shopping-cart ti-sm"></i>
							</div>
							<div class="card-info">
								<h5 class="mb-0">
									<?=  number_format(($accountingStats['nonpaid_count'] == null || $accountingStats['nonpaid_count'] <= 0 )? 0 : $accountingStats['nonpaid_count'], 2, ',', '.');?>
								</h5>
								<small>Non Paid</small>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-6">
						<div class="d-flex align-items-center">
							<div class="badge rounded-pill bg-label-success me-3 p-2">
								<i class="ti ti-credit-card ti-sm"></i>
							</div>
							<div class="card-info">
								<h5 class="mb-0">
									<?=  number_format(($accountingStats['paid_count'] == null || $accountingStats['paid_count'] <= 0 )? 0 : $accountingStats['paid_count'], 2, ',', '.');?>
								</h5>
								<small>Revenue</small>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-6">
						<div class="d-flex align-items-center">
							<div class="badge rounded-pill bg-label-success me-3 p-2">
								<i class="ti ti-currency-dollar ti-sm"></i>
							</div>
							<div class="card-info">
								<h5 class="mb-0">
									<?=  number_format(($accountingStats['paidyear_count'] == null || $accountingStats['paidyear_count'] <= 0 )? 0 : $accountingStats['paidyear_count'], 2, ',', '.');?>
								</h5>
								<small>Revenue</small>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-6">
						<div class="d-flex align-items-center">
							<div class="badge rounded-pill bg-label-warning me-3 p-2">
								<i class="tf-icons ti ti-color-swatch"></i>
							</div>
							<div class="card-info">
								<h5 class="mb-0">
									<?= $programStats['jumlahProduk']  ?> 
								</h5>
								<small>Product</small>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-6">
						<div class="d-flex align-items-center">
							<div class="badge rounded-pill bg-label-info me-3 p-2">
								<i class="tf-icons ti ti-table-options"></i>
							</div>
							<div class="card-info">
								<h5 class="mb-0">
									<?= $programStats['jumlahProgram']  ?>
								</h5>
								<small>Program</small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 mb-4">
		<div class="card">
			<div class="card-header pb-0">
				<h5 class="card-title mb-0">Income</h5>
				<!-- <small class="text-muted">This Month</small> -->
			</div>
			<div class="card-body">
				<div id="profitLastMonth"></div>
				<div class="d-flex justify-content-between align-items-center mt-3 gap-3">
					<h4 class="mb-0">
						<?=  number_format(($accountingStats['income_kotor'] == null || $accountingStats['income_kotor'] <= 0 )? 0 : $accountingStats['income_kotor'], 2, ',', '.');?>
					</h4>
					<small class="text-success"><?=$persentasePerMonthAccounting ?>%</small>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 row">
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
</div>
<script id="bulanPertama" type="application/json">
	<?=$bulanPertama;?> 
</script>

<script id="bulanKedua" type="application/json">
	<?=$bulanKedua;?> 
</script>


<script id="dataProgram" type="application/json"> 
	<?= $program  ?> 
</script> 

<script id="dataProduk" type="application/json"> 
	<?= $produk  ?> 
</script>