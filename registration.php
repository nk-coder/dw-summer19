<?php 
include_once("db_config/config.php"); 
include_once('template/header.php'); 
include_once('template/nav.php'); 

?>
<?php
	$error_collect = array();

	if(isset($_POST['register-submit'])){
		//First name
		$fname = strip_tags($_POST['fname']); //Remove html tags
		$fname = str_replace(' ', '', $fname); //remove spaces
		$fname = ucfirst(strtolower($fname)); // uppercase first letter
		$_SESSION['fname'] = $fname; // Store first name into session variable.
		
		//Last name
		$lname = strip_tags($_POST['lname']); //Remove html tags
		$lname = str_replace(' ', '', $lname); //remove spaces
		$lname = ucfirst(strtolower($lname)); // uppercase first letter
		$_SESSION['lname'] = $lname; // Store last name into session variable.

		//Business name
		$business_name = strip_tags($_POST['business_name']); //Remove html tags
		$business_name = str_replace(' ', '', $business_name); //remove spaces
		$business_name = ucfirst(strtolower($business_name)); // uppercase first letter
		$_SESSION['business_name'] = $business_name; // Store last name into session variable.

		//Job title
		$job_title = strip_tags($_POST['job_title']); //Remove html tags
		$job_title = str_replace(' ', '', $job_title); //remove spaces
		$job_title = ucfirst(strtolower($job_title)); // uppercase first letter
		$_SESSION['job_title'] = $job_title; // Store last name into session variable.

		//Interested Area
		$interested_area = strip_tags($_POST['interested_area']); //Remove html tags
		$interested_area = str_replace(' ', '', $interested_area); //remove spaces
		$interested_area = ucfirst(strtolower($interested_area)); // uppercase first letter
		$_SESSION['interested_area'] = $interested_area; // Store last name into session variable.


		//Email
		$email = strip_tags($_POST['email']); //Remove html tags
		$email = str_replace(' ', '', $email); //remove spaces
		$_SESSION['email'] = $email; // Store email into session variable.

		//username
		$username = strip_tags($_POST['username']); //Remove html tags
		$username = str_replace(' ', '', $username); //remove spaces
		$_SESSION['username'] = $username; // Store username into session variable.

		//password
		$password = strip_tags($_POST['password']); //Remove html tags
		$confirmPassword = strip_tags($_POST['confirmPassword']); //Remove html tags


		if (empty($fname) || empty($lname) || empty($business_name) || empty($email) || empty($username) || empty($password)){
            array_push ($error_collect,"All Field must be filled out");
        }
        if($password!==$confirmPassword){
            array_push($error_collect,"Passwords doesn't matched");
            echo "not matched";
        }

        //check user already exits or not
        $username_check = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
        $num_of_row = mysqli_num_rows($username_check);
        if($num_of_row > 0){
            array_push($error_collect,"Username already exist");
        }

        //Email Validation
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            //Check if email already exist or not
            $email_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
            //Count the number of rows returned

            $num_row = mysqli_num_rows($email_check);
            //print_r($num_row); exit;
            if($num_row > 0){
                array_push($error_collect,"Email already exist");
            }
        }else{
            array_push($error_collect,"Invalid Format");
        }

        if(empty($error_collect)){
        	$password = md5($password);
            $query = mysqli_query($con, "INSERT INTO users VALUES('','$fname','$lname','$business_name','$job_title','$interested_area','$email','$username','$password','0')");
            array_push($error_collect, "Your registration complete successfully");
            
        }


	} 
?>

<div class="container login_form">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div>
                   <?php if(in_array("Your registration complete successfully", $error_collect)) echo "<span style='color: #e74c3c;'>Your registration complete successfully.</span><br />";
                            ?>
                </div>
				<div class="panel panel-login">
					<div class="panel-heading">
						<a href="registration.php" class="active" id="register-form-link">Register</a>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="register-form" action="" method="POST" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="fname" id="name" tabindex="1" class="form-control" placeholder="First Name" value="">
									</div>

									<div class="form-group">
										<input type="text" name="lname" id="name" tabindex="1" class="form-control" placeholder="Last Name" value="">
									</div>

									<div class="form-group">
										<input type="text" name="business_name" id="business_name" tabindex="1" class="form-control" placeholder="Business Name" value="">
									</div>

									<div class="form-group">
										<input type="text" name="job_title" id="job_title" tabindex="1" class="form-control" placeholder="Job-Title" value="">
									</div>

									<div class="form-group">
										<input type="text" name="interested_area" id="interested_area" tabindex="1" class="form-control" placeholder="Interested Area" value="">
									</div>

									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
										<?php if(in_array("Email already exist", $error_collect)) echo "<span style='color: #e74c3c;'>Email already exist.</span><br />";
                                    else if(in_array("Invalid email format", $error_collect)) echo "<span style='color: #e74c3c;'>Invalid email format.</span> <br />";?>
									</div>

									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
										<?php if(in_array("Username already exist", $error_collect)) echo "<span style='color: #e74c3c;'>Username already exist.</span><br />";?>
									</div>

									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>

									<div class="form-group">
										<input type="password" name="confirmPassword" id="confirmPassword" tabindex="2" class="form-control" placeholder="Confirm Password">
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