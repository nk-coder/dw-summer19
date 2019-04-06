<?php 

include_once('template/header.php'); 
include_once('template/nav.php'); 

?>

<div class="container login_form">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<a href="registration.php" class="active" id="register-form-link">Register</a>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="register-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" value="">
									</div>
									<div class="form-group">
										<input type="text" name="address" id="address" tabindex="1" class="form-control" placeholder="Address" value="">
									</div>
									<div class="form-group">
										<input type="text" name="zip-code" id="zip-code" tabindex="1" class="form-control" placeholder="Zip-code" value="">
									</div>
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
									<div class="form-group">
		                                <div class="row">
		                                    <div class="col-lg-12">
			                                    <div class="text-center">
			                                       Alredy Registred?
			                                       <a href="login.php" tabindex="5" class="forgot-password">Login</a>
			                                    </div>
		                                 	</div>
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
          <!--End signup -->
 <?php include_once('template/footer.php');