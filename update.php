<?php
include('database_connection.php');

if(isset($_POST['html']) && isset($_POST['id']) && $_POST['id']>0){
	$html=mysqli_real_escape_string($con,$_POST['html']);
	$id=mysqli_real_escape_string($con,$_POST['id']);
	
	mysqli_query($con,"update content set content='$html' where id='$id'");
	echo "Data updated";
	
}
?>