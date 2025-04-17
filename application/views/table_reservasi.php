<h2 class="mt-4"><?= $url ?> List</h2>
<table class="table mt-3">
	<thead class="thead-dark">
		<tr>
			<th>NO</th>
			<th>DOB</th>
			<th>DATE</th>
			<th>NAMA PROGRAM</th>
			<th>PAX</th>
			<th>AGENT</th>
			<th>TOUR CODE</th>
			<th>CONTACT</th>
			<th>TAGIHAN</th>
			<th>action</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				1
			</td>
			<td>
				24 Mei 2024
			</td>
			<td>
				24 Mei 2024
			</td>
			<td>
				Diving Nusa Lembongan
			</td>
			<td>
				4
			</td>
			<td>
				Asep
			</td>
			<td>
				TC-2405240004
			</td>
			<td>
				089123135551
			</td>
			<td>
				Rp.190.000
			</td>
			<td>
				<div class="d-flex">
					<button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalTop">
						<label class="fa fa-info"></label>
					</button>
					<button class="btn btn-outline-success btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#modalTopForm">
						<label class="fa fa-pencil"></label>
					</button>
					<button class="btn btn-outline-danger btn-sm">
						<label class="fa fa-trash"></label>
					</button>
				</div>
			</td>
		</tr>
	</tbody>
</table>

<!-- Modal Detail-->
<div class="modal modal-top fade" id="modalTop" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTopTitle" style="text-transform: capitalize;">TC-2405240004</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12 mb-4 mb-xl-0">
						<div class="demo-inline-spacing mt-3">
							<div class="row">
								<div class="col-lg-5">
									<div class="list-group">
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">No : </small><br>
											1
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">DOB : </small><br>
											24 Mei 2024
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">DATE : </small><br>
											24 Mei 2024
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">NAMA PROGRAM : </small><br>
											Diving Nusa Lembongan
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">PAX : </small><br>
											4
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">AGENT : </small><br>
											Asep
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">TOUR CODE : </small><br> TC-2405240004
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">CONTACT : </small><br>
											089123135551
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">ACTIVITY : </small><br>
											Diving
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">HOTEL : </small><br>
											Nusa Lembongan Hotel
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">FLIGHT ARRIVAL CODE : </small><br>
											FAC0001
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">ETA : </small><br>
											-
										</span>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="list-group">
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">FLIGHT DEPACTURE CODE :
											</small><br>
											FDC0001
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">ETD : </small><br>
											-
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">PICKUP : </small><br>
											-
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">GUIDE : </small><br>
											Yanto
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">LANGUAGE : </small><br>
											Portugal
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">NOMOR KENDARAAN :
											</small><br>
											DK0001ZC
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">SOPIR : </small><br>
											Yanto
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">REMARKS : </small><br>
											-
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">INPUT BY :</small><br>
											Admin
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">EDIT BY :</small><br>
											Admin
										</span>
										<span class="list-group-item list-group-item-action">
											<small class="fw-bold">TAGIHAN : </small><br>
											Rp.190 000
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-warning">Previous</button>
				<button type="button" class="btn btn-sm btn-success">Next</button>
				<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
					Close
				</button>
			</div>
		</div>
	</div>
</div>
<!-- Tutup Modal Detail -->

<!-- Modal Form-->
<form action="/" method="POST">
	<div class="modal modal-top fade" id="modalTopForm" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTopTitle" style="text-transform: capitalize;">TC-2405240004</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12 mb-4 mb-xl-0">
							<div class="demo-inline-spacing mt-3">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="">
												DOB
											</label>
											<input type="date" class="form-control">
										</div>
										<div class="form-group">
											<label for="">
												Date
											</label>
											<input type="date" class="form-control">
										</div>
										<div class="form-group">
											<label for="nama_program">
												Nama Program
											</label>
											<select class="form-select" name="nama_program" id="nama_program">
												<option disabled selected>Nama Program</option>
											</select>
										</div>
										<div class="form-group">
											<label for="">
												Pax
											</label>
											<input type="number" class="form-control">
										</div>
										<div class="form-group">
											<label for="">
												Agent
											</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">
												Tour Code
											</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">
												Contact
											</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">
												Activity
											</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">
												Hotel
											</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">
												Flight Arrival Code
											</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">
												ETA
											</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="">
												Flight Depacture Code
											</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">
												ETD
											</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">
												Pickup
											</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">
												Nama Guide
											</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">
												Language
											</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="NomorKendaraan">
												Nomor Kendaraan
											</label>
											<select class="form-select" name="NomorKendaraan" id="NomorKendaraan">
												<option disabled selected>Nomor Kendaraan</option>
											</select>
										</div>
										<div class="form-group">
											<label for="">
												Nama Sopir
											</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">
												Remarks
											</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">
												Edit By
											</label>
											<select class="form-select" name="EditBy" id="EditBy">
												<option disabled selected>Edit By</option>
											</select>
										</div>
										<div class="form-group">
											<label for="">
												Input By
											</label>
											<select class="form-select" name="inputBy" id="inputBy">
												<option disabled selected>Input By</option>
											</select>
										</div>
										<div class="form-group">
											<label for="">
												Tagihan
											</label>
											<input type="number" class="form-control">
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
<!-- Tutup Modal Form -->
