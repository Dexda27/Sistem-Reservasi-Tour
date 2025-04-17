<div class="container card p-4 mt-4 mb-5 ">
	<?php 
if ($this->session->userdata('id') != '') {
		$id = $this->session->userdata('id');
	}else{
		$id = null;
	} 
	
	if ($this->session->userdata('notif')): 
		echo $this->session->userdata('notif'); 
	endif

	?>
	<div> 
		<div class="row">
			<div class="col-md-12">
				<h3 class="fw-bold">Change Password</h3>
			</div>
			<div class="col-md-5"> 
				<div class="mb-4">
					<form>
						<div class="my-3 px-4 py-3" style="border:1px solid #dbdade;">
							<div>
								<label for="username" class="form-label">Username</label>
								<input
								autocomplete="off"
								autofocus
								type="text"
								class="form-control"
								id="username"
								placeholder="Johndoe"
								name="username"
								aria-describedby="defaultFormControlHelp" />
								<div id="defaultFormControlHelp" class="form-text"> 
									*masukan username yang telah terdaftar
								</div>
							</div>
							<div>
								<label for="email" class="form-label">Email</label>
								<input
								autocomplete="off"
								type="email"
								class="form-control"
								id="email"
								placeholder="example@gmail.com"
								name="email"
								aria-describedby="defaultFormControlHelp" />
								<div id="defaultFormControlHelp" class="form-text"> 
									*masukan email yang telah terdaftar
								</div>
							</div>
							<div class="mt-3 d-flex justify-content-end">
								<button type="button" class="btn btn-primary" id="getAcc">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div> 
			<div class="col-md-1"></div>
			<div class="col-md-5"> 
				<div class="mb-4">
					<form action="<?= base_url('ChangePassword/update/'.$id); ?>" method="POST" id="form">
						<div class="my-3 px-4 py-3" style="border:1px solid #dbdade;">
							<div class="form-password-toggle">
								<label class="form-label" for="pass">Password</label>
								<div class="input-group input-group-merge">
									<input
									type="password"
									class="form-control"
									placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
									name="pass"
									id="pass" 
									aria-describedby="basic-default-password" readonly/>
									<span class="input-group-text cursor-pointer" id="mata">
										<i class="ti ti-eye-off" id="matanya"></i>
									</span>
								</div>
								<small class="text-danger">
									<?php echo $this->session->flashdata('error_validation'); ?>
								</small>
							</div> 
							<div class="mt-3 d-flex justify-content-end">
								<button type="submit" class="btn btn-primary" id="update" disabled>Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div> 
		</div> 
	</div>
</div>


<script>

	$(document).ready(function(){ 

		$('#getAcc').on('click',function(){  

			var data = {
				email : $('#email').val(),
				username : $('#username').val(),
			};
			$.ajax({
				url : '<?= base_url('ChangePassword/getAcc/');?>',
				type : 'POST',
				data : data, 
				success : function (response){ 
					console.log(response);
					if(response == 'true'){ 
						$('#getAcc').attr('disabled','true');
						$('#email').attr('readonly','true');
						$('#username').attr('readonly','true');

						$('#update').removeAttr('disabled');
						$('#pass').removeAttr('readonly');
						$('#pass').focus();
						toastr.success("Silahkan masukan password yang baru!", 'Success', {
							closeButton: true,
							tapToDismiss: false,
							progressBar: true
						});
					}else{ 
						toastr.error("Email atau Username tidak terdaftar atau salah!", 'Error', {
							closeButton: true,
							tapToDismiss: false,
							progressBar: true
						});
					}
				},
				error : function (xhr, status, error) {
					console.error('gagal mengubah sesi' + error);
				}

			});

		});  
	});
</script>