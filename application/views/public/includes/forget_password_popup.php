
		<div id="forget-password-popup" class="modal fade" role="dialog">
			<div class="modal-dialog">	
				<div class="modal-content">
					<div class="modal-body">
						<button data-dismiss="modal" class="close">×</button>
						<div class="col2-set mt-15">
							<div class="col-lg-12">
								<div class="form-design">
									<form class="login-form form_forget_password">
										<div class="row">
											<div class="col-md-12 col-12">
												<h4>Forget password?</h4>
											</div>
											<div class="col-md-12 col-12" id="forget_password_mobile">
												<input name="phone" type="number" maxlength="10" minlength="10" placeholder="Mobile number" autocomplete="off">
											</div>
											<div class="col-md-12 col-12">
												<a href="javascript:void(0);" data-dismiss="modal" data-target="#login" data-toggle="modal">If you remember password, login here.</a>
											</div>
											<div class="col-md-12 col-12 submtit">
												<button type="submit" class="umino-login_btn">Submit</button>
											</div>
										</div>
									</form>
									<form class="login-form hide form_forget_password_otp">
										<div class="row">
											<div class="col-md-12 col-12">
												<h4>One Time Password</h4>
											</div>
											<div class="col-md-12 col-12">
												<input name="otp" type="number" maxlength="5" minlength="5" placeholder="OTP" autocomplete="off" required>
											</div>
											<div class="col-md-12 col-12">
												<a href="javascript:void(0);" data-dismiss="modal" data-target="#login" data-toggle="modal">
													If you remember password, login here.
												</a>
											</div>
											<div class="col-md-12 col-12 submtit">
												<button class="umino-login_btn">Submit</button>
											</div>
										</div>
									</form>
									<form class="login-form hide form_set_forget_password">
										<div class="row">
											<div class="col-md-12 col-12">
												<h4>Set New Password</h4>
											</div>
											<div class="col-md-12 col-12">
												<input name="password" type="password" placeholder="Password" autocomplete="off" required>
											</div>
											<div class="col-md-12 col-12">
												<input name="confirm_password" type="password" placeholder="Confirm Password" autocomplete="off" required>
											</div>
											<div class="col-md-12 col-12">
												<a href="javascript:void(0);" data-dismiss="modal" data-target="#login" data-toggle="modal">If you remember password, login here.</a>
											</div>
											<div class="col-md-12 col-12 submtit">
												<button class="umino-login_btn">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>  
			</div>  
		</div>
	