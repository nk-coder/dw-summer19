<?php 
include_once("db_config/config.php"); 
include_once('template/header.php'); 
include_once('template/nav.php'); 
?>
<!-- collect data according to logged in user -->
<?php 
	$trainingID = $_GET['edit'];
	
	$trainingQuery = mysqli_query($con,"SELECT * FROM training WHERE id='$trainingID'");

	$tq=mysqli_fetch_array($trainingQuery);
	$training_id = $tq['id'];
	$title = $tq['title'];
	$description = $tq['description'];
	$cost = $tq['cost'];
	$startDate = $tq['startDate'];
	$start_time = $tq['start_time'];
	$end_time = $tq['end_time'];
	$duration = $tq['duration'];
	$active = $tq['active'];
?>

<!-- submit update data -->


<?php
    $error_collect = array();
if (isset($_POST['update'])) {
	//echo "hoiche";
	$title = strip_tags($_POST['title']);
	$title = ucfirst($title); 

	$trainingDetails = strip_tags($_POST['trainingDetails']); 
	$trainingDetails = ucfirst(strtolower($trainingDetails));

	$cost = strip_tags($_POST['cost']); 
	$startDate = $_POST['startDate']; 
	$classTime = $_POST['class_satrt']; 
	$endTime = $_POST['class_end']; 
	$duration = $_POST['duration'];
	$active = $_POST['active'];

	if (empty($title) || empty($trainingDetails) || empty($cost) || empty($startDate) || empty($classTime)|| empty($endTime)|| empty($duration)|| empty($active)) {
        array_push ($error_collect,"All Field must be filled out");
    }

    if(empty($error_collect)){
        $query = mysqli_query($con, "UPDATE `training` SET `title`='$title',`description`='$trainingDetails',`cost`='$cost',`startDate`='$startDate',`start_time`='$classTime',`end_time`='$endTime',`duration`='$duration',`active`='$active' WHERE id='$trainingID'");

        array_push($error_collect, "Training Update successfully");
    }
} 
?>


<div class="services-area area-padding">
	<div class="container">
		<div class="row">
			<h2>Update Training</h2><hr>
			
			<div>
                   <?php if(in_array("Training Update successfully", $error_collect)) echo "<h3><span style='color: #27ae60; text-align:center''>Training Update successfully</span></h3><br />";?>
                    <?php if(in_array("All Field must be filled out", $error_collect)) echo "<h3><span style='color: #e74c3c; text-align:center'>All Field must be filled out</span></h3><br />";?> 
                </div>
			
			<form class="form-horizontal" action="" method="POST">
				<fieldset>

					<!-- Form Name -->
					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="title">Title</label>  
					  <div class="col-md-4">
					  	<input id="title" name="title" class="form-control input-md" required="" type="text" value="<?php echo $title ?>">
					  </div>
					</div>

					<div class="form-group">
					  <label class="col-md-4 control-label" for="trainingDetails">Training Details</label>  
					  <div class="col-md-4">
					  	<textarea id="trainingDetails" name="trainingDetails" class="form-control input-md" required="" type="text" ><?php echo $description ?></textarea> 
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="cost">Cost</label>  
					  <div class="col-md-4">
					  	<input id="cost" name="cost" class="form-control input-md" required="" type="text" value="<?php echo $cost ?>">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="startDate">Start Date</label>  
					  <div class="col-md-4">
					  	<input id="startDate" name="startDate" class="form-control input-md" required="" type="date" value="<?php echo $startDate ?>">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="class_satrt">Class Start</label>  
					  <div class="col-md-4">
					  	<input id="class_satrt" name="class_satrt" class="form-control input-md" required="" type="time" value="<?php echo $class_satrt ?>">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="class_end">Class End</label>  
					  <div class="col-md-4">
					  	<input id="class_end" name="class_end" class="form-control input-md" required="" type="time" value="<?php echo $class_end ?>">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="duration">Duration</label>  
					  <div class="col-md-4">
					  	<input id="duration" name="duration" class="form-control input-md" required="" type="text" value="<?php echo $duration ?>">
					    
					  </div>
					</div>

					<div class="form-group">
					  <label class="col-md-4 control-label" for="status">Status</label>  
					  <div class="col-md-4">
					  	<input id="status" name="active" class="form-control input-md" required="" type="text" value="<?php echo $active ?>">
					    
					  </div>
					</div>

					<!-- Button (Double) -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="save"></label>
					  <div class="col-md-8">
					    <button id="save" name="update" class="btn btn-success">Update</button>
					    <button id="cancel" href="adminTrainingView.php" name="cancel" class="btn btn-danger">Cancel</button>
					  </div>
					</div>
				</fieldset>
			</form>
			
			<hr>
		</div>
	</div>
</div>

<?php include_once('template/footer.php');