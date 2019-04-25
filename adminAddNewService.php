<?php 
include_once("db_config/config.php"); 
include_once('template/header.php'); 
include_once('template/nav.php');


$error_collect = array();
if (isset($_POST['submit'])) {
	//echo "hoiche";
	$title = strip_tags($_POST['title']);
	$title = ucfirst($title); 

	$serviceDetails = strip_tags($_POST['serviceDetails']); 
	$serviceDetails = ucfirst(strtolower($serviceDetails));

	if (empty($title) || empty($serviceDetails)) {
        array_push ($error_collect,"All Field must be filled out");
    }

    if(empty($error_collect)){
            $query = mysqli_query($con, "INSERT INTO services VALUES('','$title','$serviceDetails')");
            if (isset($query)) {
            	array_push($error_collect, "New sevices added successfully");
            }
            
            
    }
} 
?>

<div class="container login_form">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div>
				<?php if(in_array("All Field must be filled out", $error_collect)) echo "<h3><span style='color: #e74c3c; text-align:center'>All Field must be filled out *</span></h3><br />";?>
				<?php if(in_array("New sevices added successfully", $error_collect)) echo "<h3><span style='color: #27ae60; text-align:center'>New sevices added successfully</span></h3><br />";?> 
				<div class="panel panel-login">
					<div class="panel-heading">
						<a href="" class="active" id="login-form-link">Add New Service</a>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="POST" enctype="multipart/form-data" role="form" style="display: block;">
									<div class="form-group"> 
										<label for="title">Title</label> 
										<input type="text" name="title" class="form-control" id="title" placeholder="Title"> 
									</div> 

									<div class="form-group"> 
										<label for="serviceDetails">Service Details</label> 
										<textarea class="form-control" id="serviceDetails" name="serviceDetails" id="post_area"></textarea>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Submit">
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
</div>
<?php include_once('template/footer.php');