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
  if (isset($_POST['book'])) {
    $userId = $_SESSION['id'];
    if (!isset($_SESSION['username'])) {
      header("Location:login.php");
    }
    $query = mysqli_query($con, "INSERT INTO booking VALUES('','$userId','$training_id')");
    
  }
?>

<div class="portfolio-single-area" style="margin-top: 50px">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="portfolio-single">
                      <div><?php if ($query==True) {
                        $mesg = "Your successfully booked for training on ".$title;
                      }; ?>
                        
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
                    </div>
                </div>
                    
                <div class="col-md-4 col-sm-12 single-download-sidebar">
                    <div class="widget theme-info price">
                    <div class="cart-box">
                     <span class="name pull-left">Price:</span>
                     <div class="sw-price pull-right"> <span class="edd_price"><?php echo $cost."$";?></span></div>
                    </div>
                    <div class="theme-price-details">
                     <ul class="recomended-service">
                        <h5>Recommended Service</h5>
                        <li>
                           <p>One-Click demo install</p>
                        </li>
                        <li>
                           <p>Professional design</p>
                        </li>
                        <li>
                           <p>Modern, Flexible, Customizable</p>
                        </li>
                        <li>
                           <p>WordPress 4.0+ Tested and Approved</p>
                        </li>
                     </ul>
                    </div>
                    </div>
                    <div class="wpb_wrapper">
                        <div class="theme-quick-info">
                            <div class="single-download-product-details">
                                <h3>Quick Information</h3>
                                <div class="info-label">
                                    <span class="quick-info-type">
                                        <p>Version:</p>
                                    </span>
                                    <span class="quick-info-detail">
                                      <p></p>
                                    </span>
                                    <span class="quick-info-type">
                                      <p>Released On:</p>
                                    </span>
                                    <span class="quick-info-detail">
                                      <p></p>
                                    </span>
                                    <span class="quick-info-type">
                                      <p>Height Resolution:</p>
                                    </span>
                                    <span class="quick-info-detail">
                                      <p></p>
                                    </span>
                                    <span class="quick-info-type">
                                      <p>Widget Ready:</p>
                                    </span>
                                    <span class="quick-info-detail">
                                      <p></p>
                                    </span>
                                    <span class="quick-info-type">
                                      <p>Responsive:</p>
                                    </span>
                                    <span class="quick-info-detail">
                                      <p></p>
                                    </span>
                                    <span class="quick-info-type">
                                      <p>Compatible Browsers:</p>
                                    </span>
                                    <span class="quick-info-detail">
                                      <p></p>
                                    </span>
                                    <span class="quick-info-type">
                                      <p>Files Included:</p>
                                    </span>
                                    <span class="quick-info-detail">
                                      <p></p>
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