<?php
include 'include/navbar.php'
?>

<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Welcome</title>
    <style>
        
        .btn {
            align-self: center;
            background-color: DodgerBlue;
            border: none;
            color: white;
            padding: 12px 16px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: RoyalBlue;
        
        }
        .welcome{
            padding: 15px 16px;
            text-align: center;

        }
    </style>
</head>

<body>
    <div class="welcome">
        <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?> <br>
        <a href="editor.php" class="btn" ><i class="fa fa-folder"></i>Create Article</a>
       
        <a href="showdata.php" class="btn" ><i class="fa fa-folder"></i>Edit Article</a>
        
    </div>
    <BR></BR>
</body>
<br></br>


</body>

</html>