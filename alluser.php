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
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   if (isset( $_POST['houseNumber'])){
     
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
   elseif($floor==3)
   {
    $land_rate=$area*4;
   }
   else
   {
    $land_rate=$area*3;
   }
   
   
    $sql = "UPDATE `user` SET `name` = '$name' , `phone` = '$phone' , `no_person` = '$person' , `ward_no` = '$ward' , `water_conn` = '$water' ,`area` = '$area' ,  `floor` = '$floor' , `Water_rate` = '$water_rate' , `Land_rate` = '$land_rate' WHERE `user`.`house_no` = $house";
    $sql1= "UPDATE `2023_24` SET `house_no` = '$house', `name` = '$name' ,`Water_bill` = '$water_rate' ,`land_bill` = '$land_rate' WHERE `2023_24`.`house_no` = $house";
    $result = mysqli_query($conn, $sql);
    $result1=mysqli_query($conn, $sql1);
     if($result && $result1)
   {
      echo "<script> alert('information has been Successfully updated'); </script>  ";          

   }
   else
   {
      echo "<script> alert('information not updated Successfully'); </script>  ";          

   }
   }
   else{
      echo "<script> alert('Try again later'); </script>  ";          

   }
   }
?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
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
        .log
        {
          margin: 10px;
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
 <a href="adduser.php" >Add New User</a>
        <a href="alluser.php" >All Users</a>
        <a href="newsad.php" >News</a>
        <a href="report.php" >Certificate Request</a>
        <a href="complaintad.php" >Complaint Reports</a>
      </div>





  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form id="registrationForm" action="alluser.php" method="post">
        <div class="modal-body">
            <div class="form-group">
                <input type="hidden" id="houseEdit" name="houseNumber" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="nameEdit" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phoneEdit" name="phone" required>
            </div>
            <div class="form-group">
                <label for="totalperson">No of Persons :</label>
                <input type="number" id="personEdit" name="totalperson" required>
            </div>
            <div class="form-group">
                <label for="wardNumber">Ward Number:</label>
                <select id="wardEdit" name="wardNumber" required>
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
                <input type="number" id="waterEdit" name="waterConnections" required>
            </div>
            <div class="form-group">
                <label for="areaOfHouse">Area of House (in sq. ft.):</label>
                <input type="number" id="areaEdit" name="areaOfHouse" required>
            </div>
            <div class="form-group">
                <label for="numberOfFloors">Number of Floors:</label>
                <select id="floorEdit" name="numberOfFloors" required>
                    <option value="" disabled selected>Select Number of Floors</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn-submit">Save changes</button>
          </div>
        </form>
      </div>
    </div>
      </div>
  

  <div class="container my-4">
    <center><b><h2>All VILLAGERS</h2></b></center>
    
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
          <th scope="col">House No.</th>
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th scope="col">No.Person</th>
          <th scope="col">Ward No.</th>
          <th scope="col">Conn.Water</th>
          <th scope="col">area</th>
          <th scope="col">floor</th>
          <th scope="col">Water Bill(rs.)</th>
          <th scope="col">Land Bill(rs.)</th>
          <th scope="col">date</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `user`";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
            <td>".$row['house_no']. "</td>
            <td>".$row['name']. "</td>
            <td>".$row['phone']. "</td>
            <td>".$row['no_person']. "</td>
            <td>".$row['ward_no']. "</td>
            <td>".$row['water_conn']. "</td>
            <td>".$row['area']. "</td>
            <td>".$row['floor']. "</td>
            <td>".$row['Water_rate']. "</td>
            <td>".$row['Land_rate']. "</td>
            <td>".$row['date']. "</td>
       
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['house_no'].">Edit</button> </td>
          </tr>";
        } 
      
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

  <script>
      $(document).ready(function () {
      $('#myTable').DataTable();

     });
  </script>
  
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit");
        tr = e.target.parentNode.parentNode;
        name = tr.getElementsByTagName("td")[1].innerText;
        phone = tr.getElementsByTagName("td")[2].innerText;
        person = tr.getElementsByTagName("td")[3].innerText;
        ward = tr.getElementsByTagName("td")[4].innerText;
        water = tr.getElementsByTagName("td")[5].innerText;
        area = tr.getElementsByTagName("td")[6].innerText;
        floor = tr.getElementsByTagName("td")[7].innerText;
        console.log(name, phone, person, ward, water,area,floor);
        nameEdit.value = name;
        phoneEdit.value = phone;
        personEdit.value = person;
        wardEdit.value = ward;
        waterEdit.value = water;
        areaEdit.value = area;
        floorEdit.value = floor;
        houseEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })

    
  </script>
 </body>
 </html> 
