<?php 

$server = "localhost";
$user = "root";
$password = "";
$database = "editor";

$conn = mysqli_connect($server, $user, $password, $database);

if($conn->connect_error ) {
        die("Connection Failed".$conn->connect_error);
    
}

?>