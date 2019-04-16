<?php 
include_once("db_config/config.php"); 
include_once('template/header.php'); 
include_once('template/nav.php'); 
?>
<!-- collect data according to logged in user -->
<?php 
	$userId = $_GET['id'];
	$UserQuery = mysqli_query($con,"SELECT * FROM users WHERE id='$userId'");

	$uq=mysqli_fetch_array($UserQuery);
	$userID = $uq['id'];
	$fname = $uq['first_name'];
	$lname = $uq['last_name'];
	$business_name = $uq['business_name'];
	$job_title = $uq['job_title'];
	$interested_area = $uq['interested_area'];
?>

<!-- submit update data -->


<?php
    $error_collect = array();
	if (isset($_POST['login_submit'])) {
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

		if (empty($fname) || empty($lname) || empty($business_name)){
            array_push ($error_collect,"All Field must be filled out");
        }
        if(empty($error_collect)){
            $update_query = mysqli_query($con, "UPDATE `users` SET `first_name`= '$fname',`last_name`='$lname',`business_name`='$business_name',`job_title`='$job_title',`interested_area`='$interested_area' WHERE id='$userId'");
            array_push($error_collect, "Your Updated successfully");
            
        }
	}
?>

<div class="services-area area-padding">
	<div class="container">
		<div class="row">
			<h2>User Information</h2><hr>
			
			<div>
                    <?php if(in_array("Your Updated successfully", $error_collect)) echo "<h3><span style='color: #27ae60; text-align:center''>Your Updated successfully.</span></h3><br />";?>
                    <?php if(in_array("All Field must be filled out", $error_collect)) echo "<h3><span style='color: #e74c3c; text-align:center'>All Field must be filled out</span></h3><br />";?>
                </div>
			
			<form class="form-horizontal" action="" method="POST">
				<fieldset>

					<!-- Form Name -->
					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="fname">First Name</label>  
					  <div class="col-md-4">
					  	<input id="fname" name="fname" class="form-control input-md" required="" type="text" value="<?php echo $fname ?>">
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="lname">Last Name</label>  
					  <div class="col-md-4">
					  	<input id="lname" name="lname" class="form-control input-md" required="" type="text" value="<?php echo $lname ?>">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="business_name">Business Name</label>  
					  <div class="col-md-4">
					  	<input id="business_name" name="business_name" class="form-control input-md" required="" type="text" value="<?php echo $business_name ?>">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="job_title">Job Title</label>  
					  <div class="col-md-4">
					  	<input id="job_title" name="job_title" class="form-control input-md" required="" type="text" value="<?php echo $job_title ?>">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="interested_area">Interested Area</label>  
					  <div class="col-md-4">
					  	<input id="interested_area" name="interested_area" class="form-control input-md" required="" type="text" value="<?php echo $interested_area ?>">
					    
					  </div>
					</div>

					<!-- Select Basic -->
					<!-- <div class="form-group">
					  <label class="col-md-4 control-label" for="job_title">Job Title</label>
					  <div class="col-md-4">
					    <select id="job_title" name="job_title" class="form-control">
					      <option value="1">Senior Java Developer</option>
					      <option value="2">Project Manager</option>
					    </select>
					  </div>
					</div> -->

					<!-- File Button --> 
					<!-- <div class="form-group">
					  <label class="col-md-4 control-label" for="uploadPhoto">Upload photo</label>
					  <div class="col-md-4">
					    <input id="uploadPhoto" name="uploadPhoto" class="input-file" type="file">
					  </div>
					</div> -->
					

					<!-- Button (Double) -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="save"></label>
					  <div class="col-md-8">
					    <button id="save" name="login_submit" class="btn btn-success">Update</button>
					    <button id="cancel" href="userProfile.php" name="cancel" class="btn btn-danger">Cancel</button>
					  </div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>

<?php include_once('template/footer.php');




