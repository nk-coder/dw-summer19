<?php 
include_once("db_config/config.php"); 
include_once('template/header.php'); 
include_once('template/nav.php');
?>
</br>
</br>
</br>
</br>

<div class="container">
	<div class="row">
<div id="page-wrapper">
		<div class="main-page">
			<div class="tables">
				<h2 class="title1">Bookin List</h2>
				<div class="bs-example widget-shadow" data-example-id="hoverable-table"> 
						<h4>View all Portfolio Category:</h4><hr>
						<table class="table table-hover"> 
							<thead> 
								<tr> 
									<th>id</th> 
									<th>Title</th> 
									<th>cost</th>
									<th>Start Time</th>
									<th>Class start</th>
									<th>Class End</th>
									<th>Course Duration</th>
								</tr> 
							</thead>
							<?php 
							$viewQuery = mysqli_query($con,"SELECT * FROM `training` JOIN booking ON (booking.training_id = training.id) JOIN users ON(booking.customer_id=users.id)");
							$srNo = 0;
							$result = mysqli_num_rows($viewQuery);
							//var_dump($result);
							if ($result > 0) {
								while ($vq=mysqli_fetch_array($viewQuery)) {
									
									$title = $vq["title"];
									$cost = $vq["cost"];
									$startDate = $vq["startDate"];
									$start_time = $vq["start_time"];
									$end_time = $vq["end_time"];
									$duration = $vq["duration"];
									$srNo++;
								?>
								<tbody> 
									<tr> 
										<th scope="row"><?php echo $srNo;?></th> 
										<td><?php echo $title;?></td> 
										<td><?php echo $cost."$";?></td>
										<td><?php echo $startDate;?></td>
										<td><?php echo $start_time;?></td>
										<td><?php echo $end_time;?></td>
										<td><?php echo $duration; ?></td>
										
									</tr>  
								</tbody>
							<?php
								} 
							}else{
								echo "<h3>You have not yet booked any training</h3>";
							}
						?>
						</table>
					</div>
			</div>


		<div>	
	</div>
</div>
</div>

<?php include_once('template/footer.php');