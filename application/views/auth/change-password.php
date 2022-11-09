<div class="container-fluid" style="background-color: #E8E8E8;">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-lg-4">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">

						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<img src="<?= base_url('/assets/img/Logo GBI Jogosetran.jpeg') ?>" width="140" height="143">
								</div> <br>
								<div class="text-center">
									<h1 class="h4 text-gray-900" style="font-family: cambria; font-weight: bold;">Change your password for</h1>
									<h5 class="mb-4"><?= $this->session->userdata('reset_email') ?></h5>
								</div>

								<?= $this->session->flashdata('message'); ?>

								<form class="user" method="post" action="<?= base_url('auth/changepassword'); ?>">
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Enter New Password..." style="background-color: #E8E8E8;">
										<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password..." style="background-color: #E8E8E8;">
										<?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<button type=" submit" class="btn btn-info btn-user btn-block">
										Change Password
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>
