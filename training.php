<?php 
include_once("db_config/config.php");
include_once('template/header.php'); 
include_once('template/nav.php');

?>


<div class="portfolio-area">
    <div class="container">
        <div class="row">
            <div class="portfolio-title text-center">
                <h2>Training we provide</h2>
                <p>webFix is a modern, clean and professional multi-purpose Business theme, It is fully responsive, it looks stunning on all types of screens and devices. It is super for Business, Creative Agency, Architechture, Digital Agency, Minimal, Resume Portfolio, Startup Business and Many more categories.</p>
            </div>
        </div>
        <div class="row">
        <?php
			$trainingQuery = mysqli_query($con,"SELECT * FROM training");
			while($row = mysqli_fetch_assoc($trainingQuery)) {?>
				
	                <div class="col-md-4 col-md-6">
						<div class="demo-single">
							<div class="demo-single-img">
								<a href="#">
									<img src="<?php echo "img/training/".$row['image']; ?>" alt="Image">
								</a>
								<div class="demo-single-overlay">
									<div class="demo-single-overlay-tbl">
										<div class="demo-single-overlay-tblcell">
											<a href="trainingDetails.php?training_id=<?php echo $row['id'];?>" >Book Now</a>
										</div>
									</div>
								</div>
							</div>
							<h3><?php echo $row['title']."<br>"."Cost= ".$row['cost']."$"; ?></h3>
						</div>
					</div>
	            
			<?php } ?>
        </div>
    </div>
</div>

 <?php include_once('template/footer.php');