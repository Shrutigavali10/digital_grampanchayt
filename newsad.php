<?php
include('connection.php');  
session_start();
if (isset($_SESSION['loggedin']) != true) {
    header("location: admin.php");
    exit;
}

?>
<?php
$picpath="newspic/";
if (isset($_POST['fpicup'])) {
    $picpath = $picpath . $_FILES['image']['name'];
    if(    move_uploaded_file($_FILES['image']['tmp_name'], $picpath))
    {
        $img = $_FILES['image']['name'];
        $heading=$_POST['heading'];
        $category=$_POST['category'];
        $Description=$_POST['description'];
        $query = "insert into news (category,heading,img,descr) values ('$category','$heading','$img','$Description')";

        if ($conn->query($query)) {
            echo "<script> alert('Data add successfully') </script> ";

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
        .log
        {
            margin: 10px;
        }
    </style>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #F0F0F0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url("down-arrow.png") no-repeat right;
            background-size: 15px;
        }

        textarea {
            height: 150px;
        }

        button {
            padding: 10px 20px;
            background-color: #FF5733;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .container1 {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="glow">ADMIN PANEL </div>
    <div class="log"><a href="adlogout.php" ><button class="logout-button">Logout</button></a>
    </div>
    <br>
    <?php
    echo "Welcome " . $_SESSION['username1'];
    ?>
    <div class="menu" align="center">
        <a href="adduser.php" >Add New User</a>
        <a href="alluser.php" >All Users</a>
        <a href="newsad.php" >News</a>
        <a href="report.php" >Certificate Request</a>
        <a href="complaintad.php" >Complaint Reports</a>
    </div>
    <br><br>
    <div class="container1">
  <div class="container">
    <h2><Center>NEWS</Center></h2>
    
    <form id="newsForm" action="newsad.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="category">Category:</label>
            <select id="category" name="category">
                <option value="Notice">Notice</option>
                <option value="Announcement">Announcement</option>
                <option value="Event">Event</option>
                <option value="Recruitment">Recruitment</option>
            </select>
        </div>
        <div class="form-group">
            <label for="heading">News Heading:</label>
            <input type="text" id="heading" name="heading" required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" >
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>

        <button type="submit" id="fpicup" name="fpicup" class="btn-submit">Submit</button>
    </form>
    
    </div>
    </div><br><br>
    
    </body>

</html>