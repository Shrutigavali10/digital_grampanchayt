<?php

include('connection.php');
if (isset($_POST['username_ad'])) {


  $username = $_POST['username_ad'];
  $password = $_POST['password_ad'];

  //to prevent from mysqli injection  
  $username = stripcslashes($username);
  $password = stripcslashes($password);
  $username = mysqli_real_escape_string($conn, $username);
  $password = mysqli_real_escape_string($conn, $password);

  $sql = "select *from admin where username = '$username' and pass = '$password'";
  // echo $sql;
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);

  if ($count == 1) {
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username1'] = $username;
    header('location:admin1.php');
  } else {
    echo "<script> alert('Invalid Username And Password'); </script>  ";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/homestyle.css" rel="stylesheet" type="text/css" media="all" />
  <link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
  <script type="text/javascript" src="js/memenu.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <script src="js/jquery-1.11.0.min.js"></script>

  <title>Admin Login</title>
  <!-- <link rel="stylesheet" href="css/style.css"> -->

  <script>
    function validateLogin() {

      const username = document.getElementById("username_ad").value;
      const password = document.getElementById("password_ad").value;

      if (!username || !password) {
        alert("Login failed. Please enter both username and password.");
        return false;
      }
      return true;
    }
  </script>
  <style>
    .login-form {
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
    }

    .login-form label {
      display: block;
      margin-bottom: 5px;
    }

    .login-form input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
    }

    .login-form button {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .container1 {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      /* padding: 20px; */
      width: 320px;
    }

    .ssm {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 70vh;
      background-color: #f2f2f2;
    }

    footer {
      text-align: center;
      padding: 3px;

    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="top-header">

    <div class="container">

      <div class="top-header-main">
        <div class="col-md-6 top-header-left">
          <div class="container">
            <h1 class=text-center> <a href="home.php">
                <h1><b>किणी ग्रामपंचायत</b></h1>
              </a></h1>
            <p>
            <h4 style="text-align:center;color:white">⌚<i><b> गावाचा विकास हाच आमचा ध्यास</b> </i>⌚</h4>
            </p>
            <hr>

          </div>

        </div>

      </div>
    </div>
  </div>

  <div>
    <div class="header-bottom">
      <div class="container">
        <div class="header">
          <div class="col-md-9 header-left">

            <div class="top-nav">
              <ul class="memenu skyblue">
                <li class="active"><a href="home.php"><b style="color: black">
                      <h4>Home</h4>
                    </b></a></li>
                <li class="grid"><a href="news.php"><b style="color: black">
                      <h4>News</h4>
                    </b></a></li>
                <li class="grid"><a href="member.php"><b style="color: black">
                      <h4>Member</h4>
                    </b></a></li>
                <li class="grid"><a href="contact.php"><b style="color: black">
                      <h4>Contact</h4>
                    </b></a></li>
                <li class="grid"><a href="user.php"><b style="color: black">
                      <h4>User Login</h4>
                    </b></a></li>
                <li class="grid"><a href="admin.php"><b style="color: black">
                      <h4>Admin Login</h4>
                    </b></a></li>
              </ul>
              <div class="clearfix"> </div>
            </div>
          </div>


        </div>



      </div>
    </div>

    <div class="ssm">
      <div class="container1">
        <form class="login-form" action="admin.php" method="post" onsubmit="return validateLogin()">
          <h1>Admin Login</h1>
          <label for="username_ad">Username</label>
          <input type="text" id="username_ad" name="username_ad">
          <label for="password_ad">Password</label>
          <input type="password" id="password_ad" name="password_ad">
          <button type="submit">Login</button>
        </form>
      </div>
    </div>





    <table border="4" width="100%">
      <th bgcolor=gray>
        <footer>
          <br><br>
          <p><b>
              <h4>किणी ग्रामपंचायत</h4>
            </b> <br>
          <p><b>
              <h4>Contact: 9307834947 </h4>
            </b></p>
          <p><b>
              <h4>Email-kini@gmail.com</h4>
            </b></p><br>

          </p>
        </footer>
      </th>
    </table>

</body>

</html>