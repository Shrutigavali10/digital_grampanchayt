
<?php
   session_start();
   if( isset($_SESSION['loggedin']) != true)
   { 
    header("location: admin.php");
    exit;
   }

?>
<?php
 include('connection.php');  

 if(isset($_POST['username'])){
 
   
    $username = $_POST['username'];  
    $password = $_POST['password'];  
    
    $sql= "INSERT INTO `sam`.`admin` ( `username`, `pass`) VALUES ( '$username', '$password')";
    if($conn->query($sql) ==true)
    {
        echo "<script> alert('Account has been created Successfully '); </script>  ";          
    }
    else {
    echo "<script> alert('Due to some issue Account not created. ' <br>'* Kindly check internet connection'<br>'* Same Username is not valid  '); </script>  ";
    }
    
   

 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Admin</title>
    <link rel="stylesheet" href="css/newadmin.css">
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
<div class="log"><a href="adlogout.php" ><button class="logout-button">Logout</button></a>

 <br><br>
 <?php
 echo "Welcome ".$_SESSION['username1'];
 ?>
 <div class="menu" align="center">
 <a href="adduser.php" target="detail">Add New User</a>
        <a href="alluser.php" target="detail">All Users</a>
        <a href="newsad.php" target="detail">News</a>
        <a href="report.php" target="detail">Reports</a>
        <a href="newadmin.php" target="detail">Add New Admin</a>
    </div>
  <br><br>
  <div>
    <h1>Add New Admin</h1>
    <form action="newadmin.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <br>
        <input type="submit" value="Add Admin">
    </form></div>
</body>
</html>