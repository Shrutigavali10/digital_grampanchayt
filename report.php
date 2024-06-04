<?php
   session_start();
   if( isset($_SESSION['loggedin']) != true)
   { 
    header("location: admin.php");
    exit;
   }
   include('connection.php');  

?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
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
 <div class="log"><a href="adlogout.php" ><button class="logout-button">Logout</button></a>

 <br><br>
 <?php
 echo "Welcome ".$_SESSION['username1'];
 ?>
 <div class="menu" align="center">
 <a href="adduser.php">Add New User</a>
        <a href="alluser.php">All Users</a>
        <a href="newsad.php">News</a>
        <a href="report.php">Certificate Request</a>
        <a href="complaintad.php">Complaint Reports</a>
  </div>

  <div class="container my-4">
    <center><b>  <h2>Certificate Request</h2></b></center>
    
  </div>
  <style>
  #myTable {
    margin: 15 auto;
  }
</style>
<br><br><br>
  <div class="container my-4" >


    <table class="table" id="myTable">
      <thead>
        <tr>
        <th scope="col">Request Id</th>
        <th scope="col">Name </th>
        <th scope="col">Date </th>
        <th scope="col">Contact </th>
        <th scope="col">Proof </th>
        <th scope="col">Type </th>
        </tr>
      </thead>
      <tbody>
      <?php
    // Assuming you have established a database connection
	include('connection.php'); 
    

    $sql = "SELECT * FROM request order by sno desc";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["sno"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["contact"] . "</td>";
        echo "<td><a href='newspic/" . $row["proof"] . "' target='blank'><img src='newspic/" . $row["proof"] . "' width='100'></a></td>";
        echo "<td>" . $row["type"] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='5'>No Request found</td></tr>";
    }

    $conn->close();
    ?>


      </tbody>
    </table>
  </div>
  
  <hr>
  
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

 
  
 </body>
 </html> 
