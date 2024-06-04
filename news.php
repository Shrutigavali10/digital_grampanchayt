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
  <title>NEWS</title>
  
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


</head>
<body>
<div class="top-header">

<div class="container">

  <div class="top-header-main">
    <div class="col-md-6 top-header-left">
     <div class="container">
                <h1 class=text-center> <a href="home.php"><h1><b>किणी ग्रामपंचायत</b></h1></a></h1>
              <p><h4 style="text-align:center;color:white" >⌚<i><b> गावाचा विकास हाच आमचा ध्यास</b> </i>⌚</h4></p>
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
					<li class="active"><a href="home.php"><b style="color: black"><h4>Home</h4></b></a></li>
                        <li class="grid"><a href="news.php"><b style="color: black"><h4>News</h4></b></a></li>
                        <li class="grid"><a href="member.php"><b style="color: black"><h4>Member</h4></b></a></li>
                        <li class="grid"><a href="contact.php"><b style="color: black"><h4>Contact</h4></b></a></li>
                        <li class="grid"><a href="user.php"><b style="color: black"> <h4>User Login</h4></b></a></li>
						<li class="grid"><a href="admin.php"><b style="color: black"> <h4>Admin Login</h4></b></a></li>
					</ul>
				 <div class="clearfix"> </div>
				</div>
			</div>
				
				
		</div>
			 

			
	</div>
  </div>
  


<hr>
  <h2>News</h2>
  <hr>
  <table class="center">
    <tr>
      <!-- <th>News_ID</th> -->
      <th>Category</th>
      <th>Heading of News</th>
      <th>Image</th>
      <th>Description</th>
    </tr>
    <?php
    // Assuming you have established a database connection
	include('connection.php'); 
    

    $sql = "SELECT * FROM news order by N_id desc";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        // echo "<td>" . $row["N_id"] . "</td>";
        echo "<td>" . $row["category"] . "</td>";
        echo "<td>" . $row["heading"] . "</td>";
        echo "<td><a href='newspic/" . $row["img"] . "' target='blank'><img src='newspic/" . $row["img"] . "' width='100'></a></td>";
        echo "<td>" . $row["descr"] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='5'>No news found</td></tr>";
    }

    $conn->close();
    ?>
  </table>
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
</body>
</html>





  