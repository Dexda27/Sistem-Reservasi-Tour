<div class="row">
	<div class="col-lg-8 mb-4 col-md-12">
		<div class="card">
			<div class="card-header d-flex justify-content-between">
				<h5 class="card-title mb-0">Report</h5>
				<small class="text-muted">Diperbaharui setiap bulan</small>
			</div>
			<div class="card-body pt-2">
				<div class="row gy-3">
					<div class="col-md-3 col-6">
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
					<div class="col-md-3 col-6">
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
					<div class="col-md-3 col-6">
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
					<div class="col-md-3 col-6">
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


</div>
<script id="bulanPertama" type="application/json">
	<?=$bulanPertama;?> 
</script>

<script id="bulanKedua" type="application/json">
	<?=$bulanKedua;?> 
</script>