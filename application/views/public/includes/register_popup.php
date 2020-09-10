<div id="register" class="modal fade" role="dialog">
	<div class="modal-dialog">	
		<div class="modal-content">
			<div class="modal-body">
				<button data-dismiss="modal" class="close">×</button>
				<div class="col2-set mt-15">
					<div class="col-lg-12">
						<div class="form-design">
							<form class="ps-form__content form_register">
								<div class="login-form">
									<h4 class="login-title">Register with us</h4>
									<div class="col-md-12 col-12">
										<input class="required" type="text" name="first_name" placeholder="First name" required>
									</div>
									<div class="col-md-12 col-12">
										<input class="required" type="text" name="last_name" placeholder="Last name" required>
									</div>
									<div class="col-md-12 col-12">
										<input class="required" type="text" name="phone_number" placeholder="Mobile number" required>
									</div>
									<div class="col-md-12 col-12">
										<input class="required" type="password" name="password" placeholder="Password" maxlength="15" minlength="8" pattern="(?=.*\d).{8,}" oninvalid="this.setCustomValidity('Please enter atleast one numeric and minimum of 8 characters')" required>
									</div>
									<div class="col-md-12 col-12">
										<input class="required" type="password" name="confirm_password" placeholder="Confirm Password" maxlength="15" minlength="8" pattern="(?=.*\d).{8,}" oninvalid="this.setCustomValidity('Please enter atleast one numeric and minimum of 8 characters')" required>
									</div>
									<div class="col-md-12 col-12">
										<div class="check-box">
											<input type="checkbox" name="agreement" id="agreement">
											<label for="agreement">I agree with <a href="<?=base_url()?>terms-conditions" target="_blank">terms and conditions</label>
										</div>
									</div>
									<br>
									<hr>
									<div class="col-md-12">
										<div class="forgotton-password_info">
											<a href="javascript:void(0);" data-dismiss="modal" aria-label="Close" data-dismiss="modal" data-target="#login" data-toggle="modal"> If you have an account, login here.</a>
										</div>
									</div>
									<div class="col-md-12 col-12 submtit">
										<button class="umino-login_btn" type="submit">Register</button>
									</div>
								</div>
							</form>
							<form class="ps-form__content hide registerPostOTP">
								<div class="login-form">
									<h4 class="login-title">One Time Password</h4>
									<div class="col-md-12 col-12">
										<input class="required" type="number" name="otp" placeholder="OTP" required>
									</div>
									<div class="col-md-12 col-12 submtit">
										<button class="umino-login_btn" type="submit">Submit</button>
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