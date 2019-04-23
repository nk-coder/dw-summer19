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
	<div id="page-wrapper">
		<div class="main-page">
			<div class="tables">
				<h2 class="title1">Training List</h2>
				<div class="bs-example widget-shadow" data-example-id="hoverable-table"> 
					<h4>View all Training:</h4>
					<a href="adminAddTraining.php"><span class="btn btn-info">Add New Training</span></a> <hr>
					<table class="table table-hover"> 
						<thead> 
							<tr> 
								<th>id</th> 
								<th>Course Title</th>  
								<th>cost</th>
								<th>Start Time</th>
								<th>Class start</th>
								<th>Class End</th>
								<th>Course Duration</th>
								<th>Active</th>
								<th>Action</th>

							</tr> 
						</thead>
						<?php 
						$viewQuery = mysqli_query($con,"SELECT * FROM training");
						
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
							$active = $vq["active"];
							$srNo++;
						?> 
						<tbody> 
							<tr> 
								<th scope="row"><?php echo $srNo ?></th> 
								<td><?php echo $title;?></td> 
								<td><?php echo $cost."$";?></td>
								<td><?php echo $startDate;?></td>
								<td><?php echo $start_time;?></td>
								<td><?php echo $end_time;?></td>
								<td><?php echo $duration; ?></td>
								<td><?php echo $active; ?></td>
								<td>
									<a href="editPost.php?edit=<?php echo $postId; ?>"><span class="btn btn-warning">Edit</span></a> 
									<a href="deletePost.php?delete=<?php echo $postId; ?>"><span class="btn btn-danger">Delete</span></a> 
								</td>
							</tr>  
						</tbody> 
						<?php } 
					}else{
						echo "<h3>There is no Training added yet.</h3>";
					}

						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once('template/footer.php');