<!DOCTYPE html>
<html lang="en">

<head>

  <title>Welcome To iJournal</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    a {
      text-decoration: none;
    }

    li {
      list-style: none;
    }

    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px;
      background-color: teal;
      color: #fff;
    }

    .nav-links a {
      color: #fff;
    }


    .logo {
      font-size: 32px;
    }


    .menu {
      display: flex;
      gap: 1em;
      font-size: 18px;
    }

    .menu li:hover {
      background-color: #4c9e9e;
      border-radius: 5px;
      transition: 0.3s ease;
    }

    .menu li {
      padding: 5px 14px;
    }


    .services {
      position: relative;
    }

    .dropdown {
      background-color: rgb(1, 139, 139);
      padding: 1em 0;
      position: absolute;
      display: none;
      border-radius: 8px;
      top: 35px;
    }

    .dropdown li+li {
      margin-top: 10px;
    }

    .dropdown li {
      padding: 0.5em 1em;
      width: 8em;
      text-align: center;
    }

    .dropdown li:hover {
      background-color: #4c9e9e;
    }

    .services:hover .dropdown {
      display: block;
    }
  </style>


</head>

<body>
  <nav class="navbar">

    <div class="logo"><img src="images/logo.jpeg" height="75" width="75" alt="Avatar" class="avatar">
    </div>


    <ul class="nav-links">


      <div class="menu">
        <li><a href="welcome.php">Home</a></li>
        <li><a href="login.php">Account</a></li>
        <li class="services">
          <a>Contact</a>

          <ul class="dropdown">
            <li><a href="https://adtu.in/amrit/include/research-paper.php">Official Website </a></li>

          </ul>
        </li>
        <li><a href="https://adtu.in/about">About</a></li>
        <li><a href="logout.php">Logout</a></li>
      </div>
    </ul>
  </nav>
</body>

</html>