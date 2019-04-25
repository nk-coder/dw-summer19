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
				<h2 class="title1">Message List</h2>
				<div class="bs-example widget-shadow" data-example-id="hoverable-table"> 
					<h4>View all Message:</h4> <hr>
					<table class="table table-hover"> 
						<thead> 
							<tr> 
								<th>id</th> 
								<th>Sender Name</th>  
								<th>Sender Email</th>
								<th>Subject</th>
								<th>Message</th>

							</tr> 
						</thead>
						<?php 
						$viewQuery = mysqli_query($con,"SELECT * FROM message ORDER BY id DESC");
						
						$srNo = 0;
						$result = mysqli_num_rows($viewQuery);
						//var_dump($result);
						if ($result > 0) {
						while ($vq=mysqli_fetch_array($viewQuery)) {
							$message_id = $vq["id"];
							$sender_name = $vq["sender_name"];
							$sender_email = $vq["sender_email"];
							$subject = $vq["subject"];
							$message = $vq["message"];
							$srNo++;
						?> 
						<tbody> 
							<tr> 
								<th scope="row"><?php echo $srNo ?></th> 
								<td><?php echo $sender_name;?></td> 
								<td><?php echo $sender_email;?></td>
								<td><?php echo $subject;?></td>
								<td><?php echo $message;?></td>
								
							</tr>  
						</tbody> 
						<?php } 
					}else{
						echo "<h3>There is no Message.</h3>";
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