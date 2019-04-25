<?php 
include_once("db_config/config.php"); 
include_once('template/header.php'); 
include_once('template/nav.php');

if (isset($_SESSION['username']) && $_SESSION['user_type']==1) {?>
</br>
</br>
</br>
</br>

<div class="container">
	<div id="page-wrapper">
		<div class="main-page">
			<div class="tables">
				<h2 class="title1">Service List</h2>
				<div class="bs-example widget-shadow" data-example-id="hoverable-table"> 
					<h4>View all Service:</h4>
					<a href="adminAddNewService.php"><span class="btn btn-info">Add New Service</span></a> <hr>
					<table class="table table-hover"> 
						<thead> 
							<tr> 
								<th>id</th> 
								<th>Service Title</th>  
								<th>Description</th>
								<th>Action</th>

							</tr> 
						</thead>
						<?php 
						$viewQuery = mysqli_query($con,"SELECT * FROM services");
						
						$srNo = 0;
						$result = mysqli_num_rows($viewQuery);
						//var_dump($result);
						if ($result > 0) {
						while ($vq=mysqli_fetch_array($viewQuery)) {
							$service_id = $vq["id"];
							$serviceTitle = $vq["service_title"];
							$description = $vq["description"];
							$srNo++;
						?> 
						<tbody> 
							<tr> 
								<th scope="row"><?php echo $srNo ?></th> 
								<td><?php echo $serviceTitle;?></td> 
								<td><?php echo $description;?></td>
								<td>
									<a href="adminServiceEdit.php?edit=<?php echo $service_id; ?>"><span class="btn btn-warning">Edit</span></a> 
									<a href="adminServiceDelete.php?delete=<?php echo $service_id; ?>"><span class="btn btn-danger">Delete</span></a> 
								</td>
							</tr>  
						</tbody> 
						<?php } 
					}else{
						echo "<h3>There is no service added yet.</h3>";
					}

						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
	
<?php }else{
	header("Location:login.php");
}
?>


<?php include_once('template/footer.php');