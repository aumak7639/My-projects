<?php include("header.php") ?>


        
        <!-- Page Header Section Start Here -->
        <section class="page-header bg_img padding-tb">
            <div class="overlay"></div>
            <div class="container">
                <div class="page-header-content-area">
                    <h4 class="ph-title">My Account</h4>
                    <ul class="lab-ul">
                        <li><a href="index.php">Home</a></li>
                        <li><a class="active">My Account</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- Page Header Section Ending Here -->
		
		
        <!-- Shop Cart Page Section start here -->		            
	    <div class="shop-cart padding-tb ">
            <div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
						<!-- Login Form s-->
						<form  class="form_login">
							<div class="login-form">
								<h4 class="login-title">Login</h4>
								<div class="row">
									<div class="col-md-12 col-12">
										<label>Email Address*</label>
										<input type="email" name="email" placeholder="Email Address" required>
									</div>
									<div class="col-12 mb--20">
										<label>Password</label>
											<input type="password" name="password" placeholder="Password" required>
											</div>
									<div class="col-md-8">
										<div class="check-box">
											<input type="checkbox" id="remember_me">
											<label for="remember_me">Remember me</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="forgotton-password_info">
											<a href="#"> Forgotten pasward?</a>
										</div>
									</div>
									<div class="col-md-12">
										<button class="umino-login_btn">Login</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
						<form class="form_register">
							<div class="login-form">
								<h4 class="login-title">Register</h4>
								<div class="row">
									<div class="col-md-6 col-12 mb--20">
										<label>First Name</label>
										<input class="required" type="text" name="first_name" placeholder="First name" required>
									</div>
									<div class="col-md-6 col-12 mb--20">
										<label>Last Name</label>
										<input class="required" type="text" name="last_name" placeholder="Last name" required>
									</div>
									<div class="col-md-12">
										<label>Email Address*</label>
										<input class="required" type="email" name="email" placeholder="Email Address" required>
									</div>
									<div class="col-md-6">
										<label>Password</label>
										<input class="required" type="password" name="password" placeholder="Password" maxlength="15" minlength="8" pattern="(?=.*\d).{8,}" oninvalid="this.setCustomValidity('Please enter atleast one numeric and minimum of 8 characters')" required>
									</div>
									<div class="col-md-6">
										<label>Confirm Password</label>
										<input class="required" type="password" name="confirm_password" placeholder="Confirm Password" maxlength="15" minlength="8" pattern="(?=.*\d).{8,}" oninvalid="this.setCustomValidity('Please enter atleast one numeric and minimum of 8 characters')" required>
							</div>
									<div class="col-12">
										<button class="umino-register_btn">Register</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
						<!-- Login Form s-->
						<form action="#" class="form_register">
							<div class="login-form">
								<h4 class="login-title">Forgot Password</h4>
								<div class="row">
									<div class="col-md-12 col-12">
										<label>Registered Email Address*</label>
										<input type="email" placeholder="Email Address">
									</div>
									<div class="col-md-12">
										<button class="umino-login_btn">Request</button>
									</div>
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
        <!-- Shop Cart Page Section ending here -->

<?php include("footer.php") ?>
	
