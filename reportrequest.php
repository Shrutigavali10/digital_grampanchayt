<?php
   session_start();
   if( isset($_SESSION['loggedin1']) != true)
   { 
    header("location: user.php");
    exit;
   }

   include('connection.php');  
   $suhel1234=$_SESSION['username2'];


?>

<?php
$picpath="proofpic/";
if (isset($_POST['fpicup'])) {
    $picpath = $picpath . $_FILES['image']['name'];
    if(    move_uploaded_file($_FILES['image']['tmp_name'], $picpath))
    {
        $img = $_FILES['image']['name'];
        $name=$_POST['applicantName'];
        $date=$_POST['dateOfApplication'];
        $contact=$_POST['contactInfo'];
        $certificateType=$_POST['certificateType'];

        $query = "insert into request (name,date,contact,proof,type) values ('$name','$date','$contact','$img','$certificateType')";

        if ($conn->query($query)) {
            echo "<script> alert('Request Send Successfully') </script> ";

        }
        else
        {
            echo "<script> alert('Someting Wrong') </script> ";

        }
    }
    else
    {
        echo "<script> alert('Problem in file') </script> ";

    }

}
else
{
    // echo "<script> alert('Please ') </script> ";

}
$conn->close();

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
   <title>Certificate Request</title>
   <style>
  

  h2 {
    text-align: center;
  }

  
  th, td {
    padding: 10px;
    border: 1px solid #ccc;
  }

  th {
    font-weight: bold;
    text-align: left;
  }

  img {
    cursor: pointer;
  }
 .center
 {
    width: 90%;
    border-collapse: collapse;
    margin-top: 20px;
   margin-left: auto;
margin-right: auto;
      background-color: #F0F0F0;

 }
</style>

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
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Additional styles for the container that holds dynamically added fields */
        #additionalFieldsContainer {
            margin-top: 20px;
        }

    </style>

    <h1>Certificate Request Form</h1>
    <form id="certificateForm" action="reportrequest.php" method="post" enctype="multipart/form-data">
        <label for="applicantName">Name:</label>
        <input type="text" id="applicantName" name="applicantName" required>

        <label for="dateOfApplication">Date</label>
        <input type="date" id="dateOfApplication" name="dateOfApplication" required>

        <label for="contactInfo">Contact</label>
        <input type="text" id="contactInfo" name="contactInfo" required>
      
        <label for="image">Proof</label>
        <input type="file" id="image" name="image" required><br>
        
         <br><br>
        <label for="certificateType">Certificate Type:</label>
        <select id="certificateType" name="certificateType" required>
            <option value="Birth Certificate">Birth Certificate</option>
            <option value="Death Certificate">Death Certificate</option>
            <option value="Marriage Certificate">Marriage Certificate</option>
            <option value="Domicile Certificate">Domicile Certificate</option>
        </select>

        <button type="submit" id="fpicup" name="fpicup" class="btn-submit">Submit</button>
    </form>
<br><br>
    
    <style>
    footer{
					text-align:center;
					padding:3px;

				}
 </style>
  <table border="4" width="100%">
				<th bgcolor=gray>
				<footer>
				    <br><br>
					<p><b><h4>किणी ग्रामपंचायत</h4></b> <br>
					<p><b><h4>Contact: 9307834947 </h4></b></p>
					<p><b><h4>Email-kini@gmail.com</h4></b></p><br>

					</p>
			</footer>
			</th>
			</table>
</html>
