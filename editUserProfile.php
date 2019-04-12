<?php 
include_once('template/header.php'); 
include_once('template/nav.php'); 

?>

<div class="services-area area-padding">
	<div class="container">
		<div class="row">
			<h2>User Information</h2>
			
			<form class="form-horizontal">
				<fieldset>

				<!-- Form Name -->
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="textinput">Email</label>  
				  <div class="col-md-4">
				  	<input id="textinput" name="textinput" placeholder="input your email" class="form-control input-md" required="" type="text">
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="textinput">Surname</label>  
				  <div class="col-md-4">
				  	<input id="textinput" name="textinput" placeholder="input your surname" class="form-control input-md" required="" type="text">
				    
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="textinput">Name</label>  
				  <div class="col-md-4">
				  	<input id="textinput" name="textinput" placeholder="input your name" class="form-control input-md" required="" type="text">
				    
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="selectbasic">Position</label>
				  <div class="col-md-4">
				    <select id="selectbasic" name="selectbasic" class="form-control">
				      <option value="1">Senior Java Developer</option>
				      <option value="2">Project Manager</option>
				    </select>
				  </div>
				</div>

				<!-- File Button --> 
				<div class="form-group">
				  <label class="col-md-4 control-label" for="uploadPhoto">Upload photo</label>
				  <div class="col-md-4">
				    <input id="uploadPhoto" name="uploadPhoto" class="input-file" type="file">
				  </div>
				</div>

				<!-- Button (Double) -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="save"></label>
				  <div class="col-md-8">
				    <button id="save" name="save" class="btn btn-success">Save</button>
				    <button id="cancel" name="cancel" class="btn btn-danger">Cancel</button>
				  </div>
				</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
<?php include_once('template/footer.php');