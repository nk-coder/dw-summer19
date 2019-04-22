<?php 
include_once("db_config/config.php");
include_once('template/header.php'); 
include_once('template/nav.php');


  if(isset($_GET['training_id'])){
      $training_id = $_GET['training_id'];
  }

  $training_data = mysqli_query($con, "SELECT * FROM training WHERE id='$training_id' ");
  $row = mysqli_fetch_array($training_data);

  $title = $row['title'];
  $image = $row['image'];
  $description = $row['description'];
  $cost = $row['cost'];
  $startDate = $row['startDate'];
  $start_time = $row['start_time'];
  $end_time = $row['end_time'];
  $duration = $row['duration'];
?>

<?php
   $error_find = array();
   if (isset($_POST['book'])) {
      $userId = $_SESSION['id'];
      $booking_query = mysqli_query($con, "SELECT * FROM booking");
      $bq = mysqli_fetch_array($booking_query);
      $trainingID = $bq['training_id'];
      $customerID = $bq['customer_id'];
      if ($training_id == $trainingID && $userId == $customerID ) {
         array_push ($error_find,"You already booked for this course!!");
      }
      if (!isset($_SESSION['username'])) {
         header("Location:login.php");
      }
      if(empty($error_find)){ 
      $query = mysqli_query($con, "INSERT INTO booking VALUES('','$userId','$training_id')");
      array_push ($error_find,"Your booking is complete successfully");
      }
   }
?>

<div class="portfolio-single-area" style="margin-top: 50px">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="portfolio-single">
                      <div><?php if(in_array("You already booked for this course!!", $error_find)) echo "<h3><span style='color: #e74c3c; text-align:center'>You already booked for this course!!</span></h3><br />";?>

                      <?php if(in_array("Your booking is complete successfully", $error_find)) echo "<h3><span style='color: #27ae60; text-align:center'>Your booking is complete successfully</span></h3><br />";?>
                        
                      </div>
                        <div class="portfoloi-single-title">
                            <h2><?php echo $title;?></h2>
                        </div>
                        

                        <div class="s-image image-fulwidth">
                            <form action="" method="POST">
                              <input class="title-single" type="submit" name="book" value="Book">
                            </form>
                            <img src="<?php echo "img/training/".$image;?>">
                        </div>
                        <div class="s-image image-fulwidth">
                            <h3 class="title-single">Course Description</h3>
                            <p><?php echo $description;?></p>
                        </div>
                    </div>
                </div>
                    
                <div class="col-md-4 col-sm-12 single-download-sidebar">
                    <div class="widget theme-info price">
                    <div class="cart-box">
                     <span class="name pull-left">Price:</span>
                     <div class="sw-price pull-right"> <span class="edd_price"><?php echo $cost."$";?></span></div>
                    </div>
                    
                    </div>
                    <div class="wpb_wrapper">
                        <div class="theme-quick-info">
                            <div class="single-download-product-details">
                                <h3>Quick Information</h3>
                                <div class="info-label">
                                    <span class="quick-info-type">
                                        <p>Cost:</p>
                                    </span>
                                    <span class="quick-info-detail">
                                      <p><?php echo $cost." $"; ?></p>
                                    </span>
                                    <span class="quick-info-type">
                                      <p>Start At:</p>
                                    </span>
                                    <span class="quick-info-detail">
                                      <p><?php echo $startDate; ?></p>
                                    </span>
                                    <span class="quick-info-type">
                                      <p>Class Start:</p>
                                    </span>
                                    <span class="quick-info-detail">
                                      <p><?php echo $start_time; ?></p>
                                    </span>
                                    <span class="quick-info-type">
                                      <p>Class End:</p>
                                    </span>
                                    <span class="quick-info-detail">
                                      <p><?php echo $end_time; ?></p>
                                    </span>
                                    <span class="quick-info-type">
                                      <p>Course Duration:</p>
                                    </span>
                                    <span class="quick-info-detail">
                                      <p><?php echo $duration; ?></p>
                                    </span>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once('template/footer.php');