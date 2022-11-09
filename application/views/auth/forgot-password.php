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
									<h1 class="h4 text-gray-900 mb-4" style="font-family: cambria; font-weight: bold;">Forgot your password ?</h1>
								</div>

								<?= $this->session->flashdata('message'); ?>

								<form class="user" method="post" action="<?= base_url('auth/forgotpassword'); ?>">
									<div class="form-group">
										<input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>" style="background-color: #E8E8E8;">
										<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<button type=" submit" class="btn btn-info btn-user btn-block">
										Reset Password
									</button>
								</form>
								<hr>
								<div class="text-center">
									<a class="small" href="<?= base_url('auth'); ?>">Back to login</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>
