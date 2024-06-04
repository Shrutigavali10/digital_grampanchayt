<?php
   session_start();
   if( isset($_SESSION['loggedin1']) != true)
   { 
    header("location: user.php");
    exit;
   }

   include('connection.php');  
   $suhel1234=$_SESSION['username2'];
    if(isset($_POST['description']))
    {
        $name=$_POST['name'];
        $location=$_POST['location'];
        $complaint=$_POST['complaint-type'];
        $description=$_POST['description'];
        $sql= "INSERT INTO `sam`.`complaint` ( `house_no`, `name`, `location`, `type`, `descr`, `date`) VALUES ( '$suhel1234', '$name', '$location', '$complaint', '$description', current_timestamp())";
        
        if($conn->query($sql) ==true)
       {
         header('location:user1.php');
         exit;
       }
       else 
       {
         echo "ERROR: $sql <br> $conn->error";
       }

$con->close();
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">

   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/homestyle.css" rel="stylesheet" type="text/css" media="all" />
   <link href="css/complaint.css" rel="stylesheet" type="text/css" media="all" />
   <link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
   <script type="text/javascript" src="js/memenu.js"></script>
   <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
   <script src="js/jquery-1.11.0.min.js"></script>
   <title>User Login</title>
  

   <style>
      

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
      .welcome
        {
            font-size:20px;
            border: 2px  solid black;
            width: 300px;
            margin-left: 15px;
        }
        .info
        {   
            height:400px;
            width:80%;
            margin-left:150px;
            margin-right:50px;
            margin-top:50px;
            margin-bottom:50px;
            border: 2px solid black
        }
        
        .house
        {
            font-size:22px;
            margin-top:20px;
            margin-left:25px;
        }
        .pname
        {
            font-size:22px;
            margin-top:20px;
            margin-left:20px;
        }
        .page
        {
            font-size:22px;
            margin-top:20px;
            margin-left:70px; 
        }
        .photo
        {   margin-left:5px;
            height:80px;
            width:100px;
        }
        .reports
        {  
            margin-top:40px;
            margin-left:350px;
            font-size:22px;
        }
        .footer1{
             background-color: #808080 ;
        }.logout-button {
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
   <div class="top-header">

      <div class="container">

         <div class="top-header-main">
            <div class="col-md-6 top-header-left">
               <div class="container">
                  <h1 class=text-center> <a href="user1.php">
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
                       
                        
                        <!-- <li class="grid"><a href="adlogout.php"><b style="color: black">
                                 <h4>Logout</h4>
                              </b></a></li> -->
                              <li class="grid"><a href="user1.php"><b style="color: black"><h4>Home</h4></b></a></li>
                              <li class="grid"><a href="bill.php"><b style="color: black"><h4>Bill Details</h4></b></a></li>
                        <li class="grid"><a href="reportrequest.php"><b style="color: black"><h4>Report Request</h4></b></a></li>
                        <li class="grid"><a href="complaint.php"><b style="color: black"><h4>Complaint</h4></b></a></li>
                              <li>
                              <div class="log"><a href="adlogout.php" ><button class="logout-button">Logout</button></a>

                              </li><br>
                     </ul>
                     <div class="clearfix"> </div>
                  </div>
               </div>


            </div>



         </div>
      </div>
      <b><hr></b>

      


    <div class="container12">
        <h1>Complaint</h1>
        <form id="complaint-form" action="complaint.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <!-- <label for="contact">Contact Information:</label>
            <input type="text" id="contact" name="contact" required> -->

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="complaint-type">Type of Complaint:</label>
            <select id="complaint-type" name="complaint-type">
                <option value="Infrastructure">Infrastructure</option>
                <option value="Sanitation">Sanitation</option>
                <option value="Public Services">Public Services</option>
            </select>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            

            <button type="submit">Submit Complaint</button>
        </form>
    </div>




    
<br><br><br>
      
         <div class="footer1">
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
            </div>
         
</body>

</html>