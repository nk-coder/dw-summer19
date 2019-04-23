<?php 

include_once('db_config/config.php'); 
include_once('template/header.php'); 
include_once('template/nav.php');
?>

<!-- Start Service area -->
<div class="top-padding">
  <div class="container">
    <div class="vedioBoxBg pTopBtm80">
         <h3 class="text-center caps pBtm40 titlefont fontWgt700" style="color:#3f3333;"><span>feature</span> video</h3><hr>
        <div class="vedioBox">
            <div class="vedioBoxShdo">
                <div class="row">
                    <div class="col-md-12">
                        <div class="vedioBoxIn">
                           <iframe width="560" height="315" src="https://www.youtube.com/embed/XHbXSY0A0aU" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

</div><hr>

<div class="top-padding">
  <div class="container">
      <div class="row">
        <h2><span style="color: #3ec1d5;">Services</span> we Provide</h2><hr>

        <?php
          $service_query=mysqli_query($con, "SELECT * FROM services ORDER BY id ASC LIMIT 3");
          $result = mysqli_num_rows($service_query);
            //var_dump($result);
            if ($result > 0) {
            while ($sq=mysqli_fetch_array($service_query)) {
              $title = $sq["service_title"];
              $description = $sq["description"];
        ?>
    <div class="col-md-4">
      <h3><?php echo $title; ?></h3><hr>
      <p style="text-align: justify;"><?php echo $description; ?></p><br>
    </div>
    <?php } 
          }else{
            echo "<h3>No service have</h3>";
          }

            ?>

    <!-- <div class="col-md-4">
      <h3>Lorem Ipsum</h3><hr>
      <p style="text-align: justify;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p><br>
    </div>

    <div class="col-md-4">
      <h3>Lorem Ipsum</h3><hr>
      <p style="text-align: justify;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p><br>
    </div> -->
  </div>
  </div>
</div>
  <!-- End Service area -->
 <?php include_once('template/footer.php');