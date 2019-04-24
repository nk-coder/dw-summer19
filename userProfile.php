<?php 
include_once("db_config/config.php"); 
include_once('template/header.php'); 
include_once('template/nav.php');
 
if (isset($_SESSION['username'])) {
	$session_username = $_SESSION['username'];
	$sqlQuery = mysqli_query($con,"SELECT * FROM users WHERE username='$session_username'");
	while($sq = mysqli_fetch_array($sqlQuery)){
		$id = $sq['id'];
		$username = $sq['username'];
		$fname = $sq['first_name'];
		$lname = $sq['last_name'];
		$email = $sq['email'];
		$job_title = $sq['job_title'];
		$business_name = $sq['business_name'];
		$interested_area = $sq['interested_area'];
		$registration_no = $sq['registration_no'];

	}?>

	<div class="services-area area-padding">
			<div class="container">
				<div class="row">
				         <div class="col-md-4" >
						   <!--  <img src="https://secure.gravatar.com/avatar/de9b11d0f9c0569ba917393ed5e5b3ab?s=140&r=g&d=mm" class="img-circle"> -->
				        </div> 
			        
				        <div class="col-md-6">
				            <h3><?php echo $username; ?></h3>
				            <h6><b>Name:</b> <?php echo $fname. ' '. $lname; ?></h6>
				            <h6><b>Email:</b> <?php echo $email; ?></h6>
				            <h6><b>Business Name:</b> <?php echo $business_name; ?></h6>
				            <h6><b>Job Title:</b> <?php echo $job_title; ?></h6>
				            <h6><b>Interested Area:</b> <?php echo $interested_area; ?></h6>
				        </div>

				        <div class="col-md-2">
				            <div class="btn-group">
				                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="">
				                    Action 
				                    <span class="icon-cog icon-white"></span><span class="caret"></span>
				                </a>
				                <ul class="dropdown-menu">
				                    <li><a href="editUserProfile.php?id=<?php echo $id ?>"><span class="icon-wrench"></span> Modify</a></li>
				                    <li><a href="#"><span class="icon-trash"></span> Delete</a></li>
				                </ul>
				            </div>
				        </div>
				</div>
			</div>
		</div>

	<?php
}else{
	header("Location:login.php");
}
?>



		
				




<?php include_once('template/footer.php');?>