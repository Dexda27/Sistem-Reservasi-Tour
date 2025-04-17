<div class="authentication-wrapper authentication-basic px-4">
	<?php  echo $this->session->userdata('notif'); ?>
	<div class="authentication-inner py-4">
		<?php if($url == 'Kode'):?>
			<?php  if ($this->session->userdata('email') == null AND $this->session->userdata('id') == null AND $this->session->userdata('kode') == null ) { redirect('Login/', 'refresh');}?>
			<!--  Two Steps Verification -->
			<div class="card">
				<div class="card-body">
					<!-- Logo -->
					<div class="app-brand justify-content-center mb-4 mt-2">
						<a href="<?=base_url();?>" class="app-brand-link gap-2">
							<span class="app-brand-logo demo">
								<svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
									fill-rule="evenodd"
									clip-rule="evenodd"
									d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
									fill="#7367F0" />
									<path
									opacity="0.06"
									fill-rule="evenodd"
									clip-rule="evenodd"
									d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
									fill="#161616" />
									<path
									opacity="0.06"
									fill-rule="evenodd"
									clip-rule="evenodd"
									d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
									fill="#161616" />
									<path
									fill-rule="evenodd"
									clip-rule="evenodd"
									d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
									fill="#7367F0" />
								</svg>
							</span>
							<span class="app-brand-text demo text-body fw-bold ms-1">Senang tours and travel</span>
						</a>
					</div>
					<!-- /Logo -->
					<h4 class="mb-1 pt-2">Verifikasi Dua Langkah 💬</h4>
					<p class="text-start mb-4">
						Kami mengirimkan kode ke email kamu. Masukan kode tersebut pada kolom input dibawah
						<span class="fw-bold d-block mt-2">1 2 3 4 5 6</span>
					</p>
					<p class="mb-0 fw-semibold">Ketik 6 digit kode keamanan kamu</p>
					<form id="twoStepsForm" action="<?=base_url('Auth/Cek_kode');?>" method="POST">
						<div class="mb-3">
							<div
							class="auth-input-wrapper d-flex align-items-center justify-content-sm-between numeral-mask-wrapper">
							<?php for ($i=1; $i <= 6 ; $i++) : ?>
								<input
								type="text"
								class="form-control auth-input h-px-50 text-center numeral-mask text-center h-px-50 mx-1 my-2"
								maxlength="1" name="kode-<?=$i?>"
								autofocus autocomplete="off" required/>
							<?php endfor; ?>
						</div>
					</div>
					<button class="btn btn-primary d-grid w-100 mb-3">Verifikasi akun saya</button>
					<div class="text-center">
						Tidak Mendapatkan kode?
						<a href="<?=base_url('Auth/ForgotPassword');?>"> Resend </a>
					</div>
				</form>
			</div>
		</div>
		<!-- / Two Steps Verification -->



	<?php elseif($url == 'Password'): ?>
		<?php  if ($this->session->userdata('email') == null AND $this->session->userdata('id') == null AND $this->session->userdata('kode') == null ) { redirect('Login/', 'refresh');}?>

		<!-- Reset Password -->
		<div class="card">
			<div class="card-body">
				<!-- Logo -->
				<div class="app-brand justify-content-center mb-4 mt-2">
					<a href="<?=base_url();?>" class="app-brand-link gap-2">
						<span class="app-brand-logo demo">
							<svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
								fill-rule="evenodd"
								clip-rule="evenodd"
								d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
								fill="#7367F0" />
								<path
								opacity="0.06"
								fill-rule="evenodd"
								clip-rule="evenodd"
								d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
								fill="#161616" />
								<path
								opacity="0.06"
								fill-rule="evenodd"
								clip-rule="evenodd"
								d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
								fill="#161616" />
								<path
								fill-rule="evenodd"
								clip-rule="evenodd"
								d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
								fill="#7367F0" />
							</svg>
						</span>
						<span class="app-brand-text demo text-body fw-bold ms-1">Senang tours and travel</span>
					</a>
				</div>
				<!-- /Logo -->
				<h4 class="mb-1 pt-2">Reset Password 🔒</h4>
				<p class="mb-4">untuk <span class="fw-bold"><?=$this->session->userdata('email');?></span></p>
				<form id="formAuthentication" action="<?=base_url('Auth/UbahPassword')?>" method="POST">
					<small class="text-danger"><?php echo validation_errors(); ?></small>
					<div class="mb-3 form-password-toggle">
						<label class="form-label" for="password">Password Baru</label>
						<div class="input-group input-group-merge">
							<input
							type="password"
							id="password"
							class="form-control"
							name="password"
							placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
							aria-describedby="password" />
							<span class="input-group-text cursor-pointer" id="mata1">
								<i class="ti ti-eye-off" id="matanya1"></i>
							</span>
						</div>
					</div>
					<div class="mb-3 form-password-toggle">
						<label class="form-label" for="confirm-password">Konfirmasi Password</label>
						<div class="input-group input-group-merge">
							<input
							type="password"
							id="confirm-password"
							class="form-control"
							name="confirm-password"
							placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
							aria-describedby="password" />
							<span class="input-group-text cursor-pointer" id="mata2">
								<i class="ti ti-eye-off" id="matanya2"></i>
							</span>
						</div>
					</div>
					<button class="btn btn-primary d-grid w-100 mb-3"> Set Password Baru</button>
				</form>
			</div>
		</div>
		<!-- /Reset Password -->



	<?php else: ?> 
		<!-- Email -->
		<div class="card">
			<div class="card-body">
				<!-- Logo -->
				<div class="app-brand justify-content-center mb-4 mt-2">
					<a href="<?=base_url();?>" class="app-brand-link gap-2">
						<span class="app-brand-logo demo">
							<svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
								fill-rule="evenodd"
								clip-rule="evenodd"
								d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
								fill="#7367F0" />
								<path
								opacity="0.06"
								fill-rule="evenodd"
								clip-rule="evenodd"
								d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
								fill="#161616" />
								<path
								opacity="0.06"
								fill-rule="evenodd"
								clip-rule="evenodd"
								d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
								fill="#161616" />
								<path
								fill-rule="evenodd"
								clip-rule="evenodd"
								d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
								fill="#7367F0" />
							</svg>
						</span>
						<span class="app-brand-text demo text-body fw-bold ms-1">Senang tours and travel</span>
					</a>
				</div>
				<!-- /Logo -->
				<h4 class="mb-1 pt-2">Lupa Password 💬</h4>
				<p class="text-start mb-4">
					Masukan email kamu yang telah terdaftar. Kami akan mengirimkan kode ke email kamu
					<span class="fw-bold d-block mt-2">Example@gmail.com</span>
				</p> 
				<form id="formAuthentication" action="<?=base_url('Auth/getEmail/');?>" method="POST">
					<div class="mb-3">  
						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autocomplete="off" />
						</div>
					</div>
					<button class="btn btn-primary d-grid w-100 mb-3" type="submit">Kirim kode </button>
					<div class="text-center"> 
						<a href="<?=base_url('Login/');?>"> Login? </a>
					</div>
				</form>
			</div>
		</div>
		<!-- /Email -->
	<?php endif; ?>
</div>
</div>


<script>  
	$(document).ready(function(){ 
		$('#mata1').on('click',()=>{ 
			if ($('#password').attr("type") == "password") {
				$('#matanya1').removeClass("ti-eye-off");
				$('#matanya1').addClass("ti-eye");
				$('#password').removeAttr("type");
				$('#password').attr("type","text"); 
			}else{ 
				$('#matanya1').removeClass("ti-eye");
				$('#matanya1').addClass("ti-eye-off");
				$('#password').removeAttr("type");
				$('#password').attr("type","password"); 
			}
		});

		$('#mata2').on('click',()=>{ 
			if ($('#confirm-password').attr("type") == "password") {
				$('#matanya2').removeClass("ti-eye-off");
				$('#matanya2').addClass("ti-eye");
				$('#confirm-password').removeAttr("type");
				$('#confirm-password').attr("type","text"); 
			}else{ 
				$('#matanya2').removeClass("ti-eye");
				$('#matanya2').addClass("ti-eye-off");
				$('#confirm-password').removeAttr("type");
				$('#confirm-password').attr("type","password"); 
			}
		});


	});
</script> 