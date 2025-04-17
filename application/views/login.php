<div class="authentication-wrapper authentication-cover authentication-bg">
	<div class="authentication-inner row"> 
		<div class="d-none d-lg-flex col-lg-7 p-0">
			<div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
				<img src="<?=base_url('assets/img/illustrations/auth-login-illustration-light.png');?>" alt="auth-login-cover" class="img-fluid my-5 auth-illustration" data-app-light-img="illustrations/auth-login-illustration-light.png" data-app-dark-img="illustrations/auth-login-illustration-dark.png" />

				<img src="<?=base_url('assets/img/illustrations/bg-shape-image-light.png');?>" alt="auth-login-cover" class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png"  data-app-dark-img="illustrations/bg-shape-image-dark.png" />
			</div>
		</div> 

		<div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
			<div class="w-px-400 mx-auto"> 
				<h3 class="mb-1 fw-bold">Welcome to Senang Tours & Travel! 👋</h3> 
				<form id="formAuthentication" class="mb-3"action="<?= base_url('/login'); ?>" method="post">
					<div class="mb-3">
						<label for="username" class="form-label">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Enter your username"value="<?php echo set_value('username'); ?>" autofocus autocomplete="off" />
					</div>
					<div class="mb-3 form-password-toggle">
						<div class="d-flex justify-content-between">
							<label class="form-label" for="password">Password</label>
							<a href="<?=base_url('Auth/ForgotPassword/')   ?> ">
								<small>Forgot Password?</small>
							</a>
						</div>
						<div class="input-group input-group-merge">
							<input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
							<span class="input-group-text cursor-pointer" id="mata"><i class="ti ti-eye-off" id="matanya"></i></span>
						</div>
					</div> 
					<button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
				</form>
			</div> 
		</div>
	</div> 
</div>
</div>
<script>  
	$(document).ready(function(){ 
		$('#mata').on('click',()=>{ 
			if ($('#password').attr("type") == "password") {
				$('#matanya').removeClass("ti-eye-off");
				$('#matanya').addClass("ti-eye");
				$('#password').removeAttr("type");
				$('#password').attr("type","text"); 
			}else{ 
				$('#matanya').removeClass("ti-eye");
				$('#matanya').addClass("ti-eye-off");
				$('#password').removeAttr("type");
				$('#password').attr("type","password"); 
			}
		});
	});
</script> 