<?php 
include_once("db_config/config.php"); 
include_once('template/header.php'); 
include_once('template/nav.php'); 


$error_collect = array();
if(isset($_POST['submit'])) {
  //echo "hoiche";
  $name = strip_tags($_POST['name']);
  $name = str_replace(' ', '', $name);
  $name = ucfirst($name); 

  $email = strip_tags($_POST['email']); 
  $email = str_replace(' ', '', $email); 

  $subject = strip_tags($_POST['subject']);
  $subject = str_replace(' ', '', $subject);
  $subject = ucfirst($subject);

  $message = strip_tags($_POST['message']); 
  $message = ucfirst(strtolower($message));

  if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        array_push ($error_collect,"All Field must be filled out");
  }

  //Email Validation
  if (filter_var($email, FILTER_VALIDATE_EMAIL)){
      $email = filter_var($email, FILTER_VALIDATE_EMAIL);
  }else{
      array_push($error_collect,"Invalid Format");
  }

    if(empty($error_collect)){
            $query = mysqli_query($con, "INSERT INTO message VALUES('','$name','$email','$subject','$message')");
            array_push($error_collect, "Your message send successfully");
            
    }
}
?>
<div class="container login_form">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div>
        <?php if(in_array("All Field must be filled out", $error_collect)) echo "<h3><span style='color: #e74c3c; text-align:center'>All Field must be filled out *</span></h3><br />";?>
        <?php if(in_array("Your message send successfully", $error_collect)) echo "<h3><span style='color: #27ae60; text-align:center'>Your message send successfully</span></h3><br />";?> 
        <div class="panel panel-login">
          <div class="panel-heading">
            <a href="" class="active" id="login-form-link">Contact With Us</a>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="login-form" action="" method="POST" enctype="multipart/form-data" role="form" style="display: block;">
                  <div class="form-group"> 
                    <label for="name">Your Name</label> 
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"> 
                  </div> 
                  <div class="form-group"> 
                    <label for="email">Your Email</label> 
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email"> 
                  </div> 
                  <?php if(in_array("Invalid Format", $error_collect)) echo "<h3><span style='color: #e74c3c; text-align:center'>Invalid Format</span></h3><br />";?>
                  
                  <div class="form-group"> 
                    <label for="subject">Subject</label> 
                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject"> 
                  </div> 

                  <div class="form-group"> 
                    <label for="message">Message</label> 
                    <textarea class="form-control" id="message" name="message" id="post_area"></textarea>
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
</div><!-- Start contact Area -->
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
  <!-- End Contact Area -->
  
  <?php include_once('template/footer.php');