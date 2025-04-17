<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 mb-4 col-md-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between">
					<h5 class="card-title mb-0">Statistics</h5>
					<small class="text-muted">Diperbaharui setiap bulan</small>
				</div>
				<div class="card-body pt-2">
					<div class="row gy-3">
						<div class="col-md-2 col-6 mx-3">
							<div class="d-flex align-items-center">
								<div class="badge rounded-pill bg-label-primary me-3 p-2">
									<i class="ti ti-chart-pie-2 ti-sm"></i>
								</div>
								<div class="card-info">
									<h5 class="mb-0"><?=$agentStats['reservasi_count'];?> </h5>
									<small>Reservasi</small>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-6 mx-3">
							<div class="d-flex align-items-center">
								<div class="badge rounded-pill bg-label-info me-3 p-2">
									<i class="ti ti-shopping-cart ti-sm"></i>
								</div>
								<div class="card-info">
									<h5 class="mb-0"><?=$agentStats['paket_count'];?></h5>
									<small>Paket</small>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-6 mx-3">
							<div class="d-flex align-items-center">
								<div class="badge rounded-pill bg-label-warning me-3 p-2">
									<i class="ti ti-shopping-cart-plus ti-sm"></i>
								</div>
								<div class="card-info">
									<h5 class="mb-0"><?=$agentStats['custom_count'];?></h5>
									<small>Custom</small>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-6 mx-3">
							<div class="d-flex align-items-center">
								<div class="badge rounded-pill bg-label-success me-3 p-2">
									<i class="ti ti-currency-dollar ti-sm"></i>
								</div>
								<div class="card-info">
									<h5 class="mb-0"><?=  number_format(($agentStats['paid_count'] == null || $agentStats['paid_count'] <= 0 )? 0 : $agentStats['paid_count'], 2, ',', '.');?></h5>
									<small>Paid</small>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-6 mx-3">
							<div class="d-flex align-items-center">
								<div class="badge rounded-pill bg-label-danger me-3 p-2">
									<i class="ti ti-alert-octagon ti-sm"></i>
								</div>
								<div class="card-info">
									<h5 class="mb-0"><?=$agentStats['nonpaid_count'];?></h5>
									<small>Pending</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-2 col-md-4 col-6 mt-4 mb-4">
			<div class="card">
				<div class="card-header pb-3">
					<h5 class="card-title mb-0">Report</h5>
					<small class="text-muted">Weekly Reservation Summary</small>
				</div>
				<div class="card-body">
					<div id="ordersLastWeek"></div>
					<div class="d-flex justify-content-between align-items-center gap-3">
						<h4 class="mb-0">
							<?= ($weekCount[0]->date); ?>
						</h4>
						<small class="text-<?= ($persentasePerWeek >= 0) ? 'success' : 'danger'?>">
							<?php echo round($persentasePerWeek, 2); ?>%
						</small>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-5 col-md-4 col-6  mt-4 mb-4">
			<div class="card">
				<div class="card-header pb-1">
					<h5 class="card-title mb-0">Monthly</h5>
					<small class="text-muted">Weekly Reservation Summary</small>
				</div>
				<div class="card-body">
					<div id="orderReceived"></div>
					<div class="d-flex justify-content-between align-items-center gap-3 pb-2">
						<h4 class="mb-0">
							<?= ($monthCount[0]->date); ?>
						</h4>
						<small class="text-<?= ($persentasePerMonth >= 0) ? 'success' : 'danger'?>">
							<?php echo round($persentasePerMonth, 2); ?>%
						</small>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-5 col-md-4 col-6 mt-4 mb-4">
			<div class="card">
				<div class="card-header pb-0">
					<h5 class="card-title mb-0">Yearly</h5>
					<small class="text-muted">Annual Reservation Summary</small>
				</div>
				<div id="salesLastYear"></div>
				<div class="card-body pt-0">
					<div class="d-flex justify-content-between align-items-center mt-3 gap-3">
						<h4 class="mb-0">	<?= ($yearCount[0]->date); ?></h4>
						<small class="text-<?= ($persentasePerYear >= 0) ? 'success' : 'danger'?>"> <?= round($persentasePerYear,2)?> %</small>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<script id="dataFromPHP" type="application/json">
	<?=$week;?> 
</script>

<script id="dataMounth" type="application/json">
	<?=$month;?> 
</script>

<script id="dataYear" type="application/json">
	<?=$year;?> 
</script>