<div class="col-12 pb-4"> 
        <div class="card"> 
          	<h5 class="card-header py-2"><?= $url ?> list</h5>
          	<div class="card-body border-top">
        		<div class="row pt-4">
					
					<table class="table mt-3" id="table">
						<thead class="thead-dark">
							<tr>
								<th>NO</th>
								<th>Tour Code</th>
								<th>Nama Tamu</th>
								<th>Deskripsi</th>
								<th>Total</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							foreach ($tagihans as $tagihan) :
								$no++;
							?>
								<tr>
									<td>
										<?= $no;  ?>
									</td>
									<td>
										<?= $tagihan->tour_code;  ?>
									</td>
									<td>
										<?= $tagihan->guest_name;  ?>
									</td>
									<td>
										<?= $tagihan->deskripsi;  ?>
									</td>
									<td>
										<?= $tagihan->total;  ?>
									</td>
									<td>
										<?php if ($tagihan->status == "pending") {
											$bg = "bg-warning";
										} elseif ($tagihan->status == "paid") {
											$bg = "bg-success";
										} elseif ($tagihan->status == "overdue") {
											$bg = "bg-danger";
										} else {
											$bg = "bg-danger";
										}
										?>
										<span class="badge <?= $bg ?>"><?= $tagihan->status; ?></span>
									</td>
									<td>
										<div class="d-flex">
											<a class="btn btn-outline-warning btn-sm" href="invoice/<?= $tagihan->id ?>">
												<label class="fa fa-eye"></label>
											</a>
											<?php if ($this->session->userdata("role_id") == "1" && $tagihan->status != "paid"|| $this->session->userdata("role_id") == "4" && $tagihan->status != "paid") : ?>
												<button class="btn btn-outline-success btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#modalTopForm-<?= $tagihan->id ?>">
													<label class="fa fa-pencil"></label>
												</button>
											<?php endif; ?>
										</div>
									</td>
								</tr>
							<?php endforeach ?>
					
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>

<?php foreach ($tagihans as $tagihan) : ?>
	<form action="<?= base_url("Tagihan/updateStatus/" . $tagihan->id); ?>" method="POST">
		<div class="modal modal-top fade" id="modalTopForm-<?= $tagihan->id ?>" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalTopTitle" style="text-transform: capitalize;"><?= $tagihan->tour_code ?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-12 mb-4 mb-xl-0">
								<div class="demo-inline-spacing mt-3">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="">
													Status
												</label>
												<select name="status" class="form-select" required>
													<option selected disabled>Pilih Status</option>
													<option value="pending">Pending</option>
													<option value="paid">Paid</option>
													<option value="overdue">Overdue</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-sm btn-primary">
							Submit
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php endforeach; ?>
<script>
	let table = new DataTable('#table');
</script>
