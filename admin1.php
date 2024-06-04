<?php
   session_start();
   if( isset($_SESSION['loggedin']) != true)
   { 
    header("location: admin.php");
    exit;
   }

?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/admin.css">
    <style>
        .logout-button {
            padding: 10px 20px;
            background-color: #1c0cf1;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;

        }

     
    </style>
 </head>
 <body>
 <div class="glow">ADMIN PANEL</div>
 <div class="log"><a href="adlogout.php" ><button class="logout-button">Logout</button></a></div>

 <br><br>
 <?php
 echo "Welcome ".$_SESSION['username1'];
 ?>
 <div class="menu" align="center">
 <a href="adduser.php" >Add New User</a>
        <a href="alluser.php" >All Users</a>
        <a href="newsad.php">News</a>
        <a href="report.php" >Certificate Request</a>
        <a href="complaintad.php" >Complaint Reports</a>
  </div>
    </body>
 </html>

