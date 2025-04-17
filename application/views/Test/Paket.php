<?php echo $this->session->flashdata('notif'); ?>
<div class="container"> 
	<div class="row"> 
		<div class="col-8"></div>
		<div class="col-4">
			<input type="text" class="form-control" id="search" placeholder="search ... ">
		</div>
		<form action="<?= base_url("Reservation/saveProgram"); ?>" method="POST">
			<div class="col-12"> 
				<div class="card mt-2"> 
					<h5 class="card-header">Pilih Destinasi</h5>
					<div class="card-body">
						<div class="row">
							<div class="col-12 row" id="list-program">
								<?php foreach ($programs as $program): ?> 
									<div class="col-md-4 mb-md-0 my-2"> 
										<div class="form-check custom-option custom-option-basic">
											<label class="form-check-label custom-option-content" for="customRadioTemp1-<?=$program->id?>">
												<input name="customRadioTemp" class="form-check-input" type="radio" value="<?=$program->id?>" id="customRadioTemp1-<?=$program->id?>">
												<span class="custom-option-header"> 
													<span class="h6 mb-0 "><?=$program->nama_program;  ?></span> 
													<small class="text-muted">
														Rp. <?=$program->harga_program;   ?> 
														<span class="badge bg-label-warning"><?=$program->durasi."days";?> </span>
													</small> 
												</span>
												<span class="custom-option-body">
													<small><?=$program->deskripsi;   ?></small> 
												</span>
												<span class="custom-option-footer"><br><br>
													<?php foreach (explode(", ", $program->produk_terkait) as $area): ?>
														<small class="badge bg-label-primary m-1"> <?=$area  ?> </small>
													<?php endforeach ?> 
												</span>
											</label>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="col-12"> 
								<div class="d-flex justify-content-between"> 
									<button class="btn btn-secondary" disabled>Previous</button>  
									<button class="btn btn-primary" type="submit">Next</button> 
								</div>
							</div> 
						</div>
					</div>
				</div> 
			</div>
		</form> 
	</div>
</div>

<script>
	$(document).ready(function(){
		$('#search').on('input', function() {
			var searchValue = $(this).val();
			var selectedProgram = $('input[name="customRadioTemp"]:checked').val();

			$.ajax({
				type: 'POST',
				url: '<?=base_url('Reservation/searchProgram/');?>',
				data: {search: searchValue},
				dataType: 'json',
				success: function(response) {
					var programsHtml = '';
					$.each(response, function(index, program) {
						var checked = selectedProgram == program.id ? 'checked' : '';
						var products = program.produk_terkait.split(", ").map(function(area) {
							return '<small class="badge bg-label-primary m-1">' + area + '</small>';
						}).join('');
						programsHtml += '<div class="col-md-4 mb-md-0 my-2">' +
						'<div class="form-check custom-option custom-option-basic">' +
						'<label class="form-check-label custom-option-content" for="customRadioTemp1-' + program.id + '">' +
						'<input name="customRadioTemp" class="form-check-input" type="radio" value="' + program.id + '" id="customRadioTemp1-' + program.id + '" ' + checked + '>' +
						'<span class="custom-option-header">' +
						'<span class="h6 mb-0">' + program.nama_program + '</span>' +
						'<small class="text-muted">' +
						'Rp. ' + program.harga_program +
						'<span class="badge bg-label-warning">' + program.durasi + ' days</span>' +
						'</small>' +
						'</span>' +
						'<span class="custom-option-body">' +
						'<small>' + program.deskripsi + '</small>' +
						'</span>' +
						'<span class="custom-option-footer"><br><br>' +
						products +
						'</span>' +
						'</label>' +
						'</div>' +
						'</div>';
					});
					$('#list-program').html(programsHtml);
				}
			});
		});
	});

</script>