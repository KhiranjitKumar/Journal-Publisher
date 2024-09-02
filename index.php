<?php

include 'database_connection.php';


session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email ='$email' AND password ='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: welcome.php");
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>User Login</title>
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

    <h2>Login Form</h2>

    <form action="" method="post">
        <div class="imgcontainer">
            <img src="images/logo.jpeg" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="email" class="mail"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            <div>
                <button name="submit">Login</button> <br>
            </div>
            <p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>

        </div>

    </form>

</body>

</html>