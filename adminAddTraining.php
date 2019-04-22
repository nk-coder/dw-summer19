<?php 
include_once("db_config/config.php"); 
include_once('template/header.php'); 
include_once('template/nav.php');


$error_collect = array();
if (isset($_POST['submit'])) {
	//echo "hoiche";
	$title = strip_tags($_POST['title']);
	$title = ucfirst($title); 

	$image = $_FILES["image"]["name"];

	$trainingDetails = strip_tags($_POST['trainingDetails']); 
	$trainingDetails = ucfirst(strtolower($trainingDetails));

	$cost = strip_tags($_POST['cost']); 
	$startDate = $_POST['startDate']; 
	$classTime = $_POST['classTime']; 
	$endTime = $_POST['endTime']; 
	$duration = $_POST['duration'];

	if (empty($title) || empty($image) || empty($trainingDetails) || empty($cost) || empty($startDate) || empty($classTime)|| empty($endTime)|| empty($duration)) {
        array_push ($error_collect,"All Field must be filled out");
    }

    if(empty($error_collect)){
            $query = mysqli_query($con, "INSERT INTO training VALUES('','$title','$trainingDetails','$image','$cost','$startDate','$classTime','$endTime','$duration')");
            move_uploaded_file($_FILES["image"]["tmp_name"], "img/training/".$image);
            array_push($error_collect, "New Training successfully");

    	//echo  $title, $trainingDetails, $image, $cost,$startDate;
            
        }
} 
?>

<div class="container login_form">
      <div class="row">
         <div class="col-md-6 col-md-offset-3">
            <div>
               <!-- <?php if(in_array("All Field must be filled out", $err_collect)) echo "<h3><span style='color: #e74c3c; text-align:center'>All Field must be filled out *</span></h3><br />";?>
               <?php if(in_array("New Training successfully", $err_collect)) echo "<h3><span style='color: #27ae60; text-align:center'>New Training successfully</span></h3><br />";?> -->
            </div>
            <div class="panel panel-login">
               <div class="panel-heading">
                  <a href="" class="active" id="login-form-link">Add New Training</a>
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
								<label for="exampleInputFile">Chose Your Photo</label> 
								<input type="file" name="image" id="exampleInputFile" required=""> 
							</div> 
							<div class="form-group"> 
								<label for="trainingDetails">Training Details</label> 
								<textarea class="form-control" id="trainingDetails" name="trainingDetails" id="post_area"></textarea>
							</div>

							<div class="form-group"> 
								<label for="Cost">Training cost</label> 
								<input type="text" class="form-control" name="cost" id="Cost" required=""> 
							</div>
							<div class="form-group"> 
								<label for="startDate">Start Date</label> 
								<input type="date" class="form-control" name="startDate" id="startDate" required=""> 
							</div>
							<div class="form-group"> 
								<label for="classTime">Class start At</label> 
								<input type="time" class="form-control" name="classTime" id="classTime" required=""> 
							</div>
							<div class="form-group"> 
								<label for="endTime">Class end At</label> 
								<input type="time" class="form-control" name="endTime" id="endTime" required=""> 
							</div>
							<div class="form-group"> 
								<label for="duration">Duration of Training</label> 
								<input type="text" class="form-control" name="duration" id="duration" required=""> 
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
	 <?php include_once('template/footer.php');