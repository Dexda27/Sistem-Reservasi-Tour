	<div class="container">
		<div class="row">
			<form action="<?= base_url("Reservation/createReservasi/"); ?>" method="POST">
				<div class="col-12">
					<div class="card mt-2">
						<h5 class="card-header">Isi Data Tamu</h5>
						<div class="card-body">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="name">Name</label>
										<input type="hidden" name="id" value="<?= $id ? $id : null?>">
										<input autocomplete="off" type="text" class="form-control" name="name" id="name">
									</div>
									<div class="form-group">
										<label for="tour_code">Tour Code</label>
										<input autocomplete="off" type="text" class="form-control" name="tour_code" id="tour_code">
									</div>
									<div class="form-group">
										<label for="contact">Contact</label>
										<input autocomplete="off" type="text" class="form-control" name="contact" id="contact">
									</div>
									<div class="form-group">
										<label for="pax">Pax</label>
										<input autocomplete="off" type="number" class="form-control" name="pax" id="pax">
									</div>
									<div class="form-group">
										<label for="country">Bahasa</label>
										<select class="form-select" name="bahasa" id="">
											<option disabled selected>Pilih Bahasa</option>
											<?php foreach ($bahasa as $b): ?>
												<option value="<?=$b->id;?>"><?=$b->nama_bahasa;?> </option>
											<?php endforeach ?>
										</select>
									</div>
									<div class="form-group">
										<label for="remarks">Remarks</label>
										<input autocomplete="off" type="text" class="form-control" name="remarks" id="remarks">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="dob">DOB</label>
										<input autocomplete="off" type="date" class="form-control" name="dob" id="dob">
									</div>
									<div class="form-group">
										<label for="date">Date</label>
										<input autocomplete="off" type="date" class="form-control" name="date" id="date">
									</div>
									<div class="form-group">
										<label for="fac">Flight Arraival Code</label>
										<input autocomplete="off" type="text" class="form-control" name="fac" id="fac">
									</div>
									<div class="form-group">
										<label for="eta">ETA</label>
										<input autocomplete="off" type="text" class="form-control" name="eta" id="eta">
									</div>
									<div class="form-group">
										<label for="fdc">Flight Depacture Code</label>
										<input autocomplete="off" type="text" class="form-control" name="fdc" id="fdc">
									</div>
									<div class="form-group">
										<label for="etd">ETD</label>
										<input autocomplete="off" type="text" class="form-control" name="etd" id="etd">
									</div>
								</div>
								<div class="col-12">
									<div class="d-flex align-items-center justify-content-between mt-2">
										<a class="btn btn-secondary" href="<?=base_url("Reservation/Paket/");?>">Previous</a>
										<button class="btn btn-outline-primary" type="submit">Submit</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
