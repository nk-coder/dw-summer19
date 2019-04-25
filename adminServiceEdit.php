<?php 
include_once("db_config/config.php"); 
include_once('template/header.php'); 
include_once('template/nav.php'); 
?>
<!-- collect data according to logged in user -->
<?php 
	$serviceID = $_GET['edit'];
	
	$serviceQuery = mysqli_query($con,"SELECT * FROM services WHERE id='$serviceID'");

	$sq=mysqli_fetch_array($serviceQuery);
	$serviceTitle = $sq['service_title'];
	$description = $sq['description'];
?>

<!-- submit update data -->


<?php
    $error_collect = array();
if (isset($_POST['update'])) {
	//echo "hoiche";
	$service_title = strip_tags($_POST['service_title']);
	$service_title = ucfirst($service_title); 

	$serviceDetails = strip_tags($_POST['serviceDetails']); 
	$serviceDetails = ucfirst(strtolower($serviceDetails));


	if (empty($service_title) || empty($serviceDetails)) {
        array_push ($error_collect,"All Field must be filled out");
    }

    if(empty($error_collect)){
        $query = mysqli_query($con, "UPDATE `services` SET `service_title`='$service_title',`description`='$serviceDetails' WHERE id='$serviceID'");

        array_push($error_collect, "Service Update successfully");
    }
} 
?>


<div class="services-area area-padding">
	<div class="container">
		<div class="row">
			<h2>Update Service</h2><hr>
			
			<div>
                   <?php if(in_array("Service Update successfully", $error_collect)) echo "<h3><span style='color: #27ae60; text-align:center''>Service Update successfully</span></h3><br />";?>
                    <?php if(in_array("All Field must be filled out", $error_collect)) echo "<h3><span style='color: #e74c3c; text-align:center'>All Field must be filled out</span></h3><br />";?> 
                </div>
			
			<form class="form-horizontal" action="" method="POST">
				<fieldset>

					<!-- Form Name -->
					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="service_title">Service Title</label>  
					  <div class="col-md-4">
					  	<input id="service_title" name="service_title" class="form-control input-md" required="" type="text" value="<?php echo $serviceTitle ?>">
					  </div>
					</div>

					<div class="form-group">
					  <label class="col-md-4 control-label" for="serviceDetails">Service Details</label>  
					  <div class="col-md-4">
					  	<textarea id="serviceDetails" name="serviceDetails" class="form-control input-md" required="" type="text" ><?php echo $description ?></textarea> 
					  </div>
					</div>

					<!-- Button (Double) -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="save"></label>
					  <div class="col-md-8">
					    <button id="save" name="update" class="btn btn-success">Update</button>
					    <a id="cancel" href="adminServiceView.php" class="btn btn-danger">Cancel</a>
					  </div>
					</div>
				</fieldset>
			</form>
			
			<hr>
		</div>
	</div>
</div>

<?php include_once('template/footer.php');