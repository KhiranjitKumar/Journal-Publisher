<?php

include 'database_connection.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
	header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
<title>User Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 70px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
        }

        button {
            align-self: center;
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
        }

        button:hover {
            opacity: 0.8;
        }



        .imgcontainer {
            size: 30;
            text-align: center;
            margin: 24px 30% 12px 30%;
        }

        img.avatar {
            width: 50%;
            border-radius: 30%;
        }

        .container {
            text-align: center;
            margin: 30px 30% 30px 30%;
            padding: 10px;
        }
    </style>


</head>

<body>

    <h2>Registration Form</h2>

    <form action="#" method="post">
        <div class="imgcontainer">
            <img src="images/logo.jpeg" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="name" class="name"><b>User Name</b></label>
            <input type="text" placeholder="Enter Username" name="username" value="<?php echo $username; ?>" required>

            <label for="email" class="mail"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" value="<?php echo $email; ?>" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" value="<?php echo $_POST['password']; ?>" required>

            <label for="cpassword"><b>Confirm Password</b></label>
            <input type="password" placeholder="Re-enter the password " name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>

            <button name = "submit">Register</button> <br>
            <label>
            <span class="/"><a href="index.php">Already have an account?</a></span>
            </label>

        </div>

    </form>

</body>

</html>
