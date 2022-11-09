<div class="container-fluid" style="background-color: #E8E8E8;">

	<div class="row justify-content-center">

		<div class="col-lg-8">
			<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<img src="<?= base_url('/assets/img/Logo GBI Jogosetran.png') ?>" width="140" height="143">
								</div><br>
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4" style="font-family: cambria; font-weight: bold;">Create an Account</h1>
								</div>
								<form class="user" method="POST" action="<?= base_url('auth/registration') ?>">
									<div class="form-group">
										<input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full name" value="<?= set_value('name'); ?>" style="background-color: #E8E8E8;">
										<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>" style="background-color: #E8E8E8;">
										<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group row">
										<div class="col-sm-6 mb-3 mb-sm-0">
											<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password" style="background-color: #E8E8E8;">
											<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="col-sm-6">
											<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password" style="background-color: #E8E8E8;">
										</div>
									</div>
									<button type="submit" class="btn btn-info btn-user btn-block">
										Register Account
									</button>
								</form>
								<hr>
								<div class="text-center">
									<a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
								</div>
								<div class="text-center">
									<a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
