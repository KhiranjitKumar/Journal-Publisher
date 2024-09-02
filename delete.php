<?php 
include 'database_connection.php';
$con = mysqli_connect('localhost', 'root', '', 'editor');
$deleteid = $_GET['delid'];
$deletequery = "DELETE FROM `journal` WHERE article_id = $deleteid";
$query = mysqli_query($con, $deletequery);
header('location:showdata.php');
?>