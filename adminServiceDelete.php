<?php 
include_once("db_config/config.php");

if (isset($_GET['delete'])){
 $idForDelete = $_GET['delete'];
 $delete_sql = mysqli_query($con,"DELETE FROM services WHERE id='$idForDelete'");
 
 
 if ($delete_sql){
   header('location:adminServiceView.php');
 }else{
  
 }
}
?>