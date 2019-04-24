<?php 
include_once("db_config/config.php");

if (isset($_GET['delete'])){
 $idForDelete = $_GET['delete'];
 $delete_sql = mysqli_query($con,"DELETE FROM training WHERE id='$idForDelete'");
 
 
 if ($delete_sql){
   header('location:adminTrainingView.php');
 }else{
  
 }
}
?>