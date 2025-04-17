 <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">

 <style>
 	/* Tambahkan gaya khusus untuk modal yang muncul dari kanan */
 	.modal.right .modal-dialog {
 		position: fixed;
 		margin: 0;
 		width: 400px;
 		height: 98%;
 		right: 0;
 		top: 3;
 		bottom: 0;
 		transform: translate3d(100%, 0, 0);
 		transition: transform 0.3s ease-out;
 	}
 	.modal.right .modal-content {
 		height: 100%;
/* 		overflow-y: auto;*/
}
.modal.right.show .modal-dialog {
	transform: translate3d(0, 0, 0);
}
</style>

<div id="calendar"></div>

<!-- Modal -->
<form method="POST" id="formm">
	<div class="modal right fade" id="modalScrollable" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalScrollableTitle">
						<span id="tour_code">tour code</span>
						<small id="dob" class="text-muted">Date Of Booking</small>
					</h5>
					<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"></button>
				</div>
				<div class="modal-body" id="modalBody">
					<div class="row g-2">
						<div class="col mb-0">
							<label for="guestName" class="form-label">Guest Name</label>
							<input required autocomplete="off" name="guestName" type="text" id="guestName" class="form-control" placeholder="John Doe" />
						</div>
						<div class="col mb-0">
							<label for="dobBasic" class="form-label">Date Of Booking</label>
							<input required autocomplete="off" name="dob" type="date" id="dobBasic" class="form-control"/>
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-0">
							<label for="contact" class="form-label">Contact</label>
							<input required autocomplete="off" name="contact" type="text" id="contact" class="form-control" placeholder="x@example.xx" />
						</div>
						<div class="col mb-0">
							<label for="pax" class="form-label">Pax</label>
							<input required autocomplete="off" name="pax" type="number" id="pax" class="form-control" placeholder="4" min="0" />
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-0">
							<label for="program" class="form-label">Program</label>
							<select name="program" class="form-select" id="program" required>
								<option selected disabled>pilih program</option>
								<?php foreach ($programs as $program): ?> 
									<option value="<?=$program['id'] ?>"><?=$program['nama_program'];?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col mb-0">
							<label for="activity" class="form-label">Activity</label>
							<input required autocomplete="off" name="activity" type="text" id="activity" class="form-control" placeholder="example activity"/>
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-0">
							<label for="hotel" class="form-label">Hotel</label>
							<input required autocomplete="off" name="hotel" type="text" id="hotel" class="form-control" placeholder="Hotel Example " />
						</div>
						<div class="col mb-0">
							<label for="guide" class="form-label">Guide</label>
							<select name="guide" class="form-select" id="guide" required>
								<option selected disabled>pilih guide</option>
								<?php foreach ($guides as $guide): ?> 
									<option value="<?=$guide['id'] ?>"><?=$guide['guide_name'];?> - <?=$guide['nama_bahasa'];?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-0">
							<label for="sopir" class="form-label">Sopir</label>
							<select name="sopir" class="form-select" id="sopir" required>
								<option selected disabled>pilih sopir</option>
								<?php foreach ($sopirs as $sopir): ?> 
									<option value="<?=$sopir['id'] ?>"><?=$sopir['nama_sopir'];?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col mb-0">
							<label for="kendaraan" class="form-label">Kendaraan</label>
							<select name="kendaraan" class="form-select" id="kendaraan" required>
								<option selected disabled>pilih kendaraan</option>
								<?php foreach ($kendaraans as $kendaraan): ?> 
									<option value="<?=$kendaraan['id'] ?>"><?=$kendaraan['jenis_kendaraan'];?> - <?=$kendaraan['kapasitas'];?> </option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-0">
							<label for="pickup" class="form-label">Pickup</label>
							<input required autocomplete="off" name="pickup" type="time" id="pickup" class="form-control" />
						</div>
						<div class="col mb-0">
							<label for="bahasa" class="form-label">Bahasa</label>
							<select name="bahasa" class="form-select" id="bahasa" required>
								<option selected disabled>pilih bahasa</option>
								<?php foreach ($bahasas as $bahasa): ?> 
									<option value="<?=$bahasa['id'] ?>"><?=$bahasa['nama_bahasa'];?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-0">
							<label for="remarks" class="form-label">Remarks</label>
							<input required autocomplete="off" name="remarks" type="text" id="remarks" class="form-control" placeholder="xxxxx xxxx xxxxxx" />
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-0">
							<label for="flightArrivalCode" class="form-label">Flight Arrival Code</label>
							<input required autocomplete="off" name="flightArrivalCode" type="text" id="flightArrivalCode" class="form-control" placeholder="XX-000" />
						</div>
						<div class="col mb-0">
							<label for="eta" class="form-label">ETA</label>
							<input required autocomplete="off" name="eta" type="time" id="eta" class="form-control" />
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-0">
							<label for="flightDepactureCode" class="form-label">Flight Depacture Code</label>
							<input required autocomplete="off" name="flightDepactureCode" type="text" id="flightDepactureCode" class="form-control"	placeholder="XX-000" />
						</div>
						<div class="col mb-0">
							<label for="etd" class="form-label">ETD</label>
							<input required autocomplete="off" name="etd" type="time" id="etd" class="form-control" />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
						Close
					</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</form>


<script>
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			eventColor: '#9b92f4',
			eventTextColor : '#fff',
			eventBackgroundColor : '#9b92f4',
			events: '<?=base_url("reservation/get_reservation");?>',
			eventClick: function(event) {
				console.log(event)
				$('#tour_code').text(event.title);
				$('#dob').text(event.dob);
				$('#formm').attr('action','<?= base_url('Reservation/updateReservasi/');?>'+event.id);

				$('#guestName').val(event.guest_name);
				$('#dobBasic').val(event.dob);
				$('#contact').val(event.contact);
				$('#pax').val(event.pax);
				$('#program').val(event.program_id);
				$('#activity').val(event.activity);
				$('#guide').val(event.guide_id);
				$('#hotel').val(event.hotel);
				$('#sopir').val(event.sopir_id);
				$('#kendaraan').val(event.transport_id);
				$('#pickup').val(event.pickup);
				$('#bahasa').val(event.bahasa_id);
				$('#remarks').val(event.remarks); 
				$('#flightArrivalCode').val(event.flight_arrival_code);
				$('#eta').val(event.eta);
				$('#flightDepactureCode').val(event.flight_departure_code);
				$('#etd').val(event.etd);


				$('#modalScrollable').modal('show');
			}
		});

	});
</script>