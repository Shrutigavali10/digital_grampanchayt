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

if(isset($_POST['houseNumber'])){
   $house=$_POST['houseNumber'];
   $name=$_POST['name'];
   $phone=$_POST['phone'];
   $person=$_POST['totalperson'];
   $ward=$_POST['wardNumber'];
   $water=$_POST['waterConnections'];
   $area=$_POST['areaOfHouse'];
   $floor=$_POST['numberOfFloors'];
   $water_rate=$water*1200;
   if($floor==1)
   {
   $land_rate=$area*3;
   }
   elseif($floor==2)
   {
    $land_rate=$area*3.5;
   }
   else
   {
        $land_rate=($area*4);
   }

   $m=0;
   $sql= "INSERT INTO `sam`.`user` ( `house_no`, `name`, `phone`, `no_person`, `ward_no`, `water_conn`,`area`,`floor`,`Water_rate`,`Land_rate`,`date`) VALUES ( '$house', '$name', '$phone', '$person', '$ward', '$water', '$area', '$floor','$water_rate','$land_rate', current_timestamp())";
   $sql1= "INSERT INTO `sam`.`2023_24` ( `house_no`, `name`,`Water_bill`,`land_bill`,`date`) VALUES ( '$house', '$name','$water_rate','$land_rate', current_timestamp())";
   $result=$conn->query($sql);
   $result1=$conn->query($sql1);
   if($result ==true)
   {
    $m=1;
   }
   else
   {
    echo "<script> alert('Due to some issue Account not created.') ";

   }

   if($result1 ==true)
   {
    $m=2;
   }
   else
   {
    echo "<script> alert('Due to some issue Account not created.') </script> ";

   }
if($m==2)
{
   echo "<script> alert('Account has been created Successfully '); </script>  ";          

}
else {
   echo "<script> alert('Due to some issue Account not created.') </script> ";

}
$conn->close();
}
?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/addnew.css">
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
        <a href="alluser.php" >All Users</a>
        <a href="newsad.php" >News</a>
        <a href="report.php" >Certificate Request</a>
        <a href="complaintad.php" >Complaint Reports</a>
  </div>
<div class="container1">
  <div class="container">
        <h2> New User Registration</h2>
        <form id="registrationForm" action="adduser.php" method="post">
            <div class="form-group">
                <label for="houseNumber">House Number:</label>
                <input type="text" id="houseNumber" name="houseNumber" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="totalperson">No of Persons :</label>
                <input type="number" id="totalperson" name="totalperson" required>
            </div>
            <div class="form-group">
                <label for="wardNumber">Ward Number:</label>
                <select id="wardNumber" name="wardNumber" required>
                    <option value="" disabled selected>Select Ward Number</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
            <div class="form-group">
                <label for="waterConnections">Number of Water Connections:</label>
                <input type="number" id="waterConnections" name="waterConnections" required>
            </div>
            <div class="form-group">
                <label for="areaOfHouse">Area of House (in sq. ft.):</label>
                <input type="number" id="areaOfHouse" name="areaOfHouse" required>
            </div>
            <div class="form-group">
                <label for="numberOfFloors">Number of Floors:</label>
                <select id="numberOfFloors" name="numberOfFloors" required>
                    <option value="" disabled selected>Select Number of Floors</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <button type="submit" class="btn-submit">Submit</button>
        </form>
    </div>
</div>
</body>

 </body>
 </html> 
