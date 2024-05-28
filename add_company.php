<?Php

$alert = "";
session_start();
include("./connect.php");

if ($_SESSION['nam']) {
    $currentUser=$_SESSION['nam'];
    $did =  $_SESSION['hd_id'];
  }


if (isset($_POST['submit'])) {
    $nam=mysqli_real_escape_string($conn, $_POST['cname']);
    $mail=mysqli_real_escape_string($conn, $_POST['mail']);
    $contact=mysqli_real_escape_string($conn, $_POST['cont']);
    $lo=mysqli_real_escape_string($conn, $_POST['loc']);
    $lin=mysqli_real_escape_string($conn, $_POST['link']);
    $de=mysqli_real_escape_string($conn, $_POST['desc']);
    $no=mysqli_real_escape_string($conn, $_POST['intake']);
    $status=mysqli_real_escape_string($conn, $_POST['status']);

     
    
    # code...


    $sql = "INSERT INTO company (co_name, email, co_contact, location, URL, co_description, max_intake, co_status, director_id )
    VALUES ('$nam', '$mail', '$contact', ' $lo', '$lin', '$de', '$no', '$status', '$did')";
     
     if ((!mysqli_query($conn, $sql))) {
        # code...
         echo 'there is ab error' .mysqli_error($conn);
     }
     else{
      $alert = "Company Added Succesfuly";
     }

}


?>

<!DOCTYPE html>
<html lang="en">
<meta name="Viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./componnent/styles.css">
    <title>Add co_director_iot</title>
</head>
<body>
<header class="head" style="background-color: navy;">
      <ul class="link"> 
     
      <a href="./dir_panel.php">BACK</a>
  </ul>
  </header>
  <center>
    <?php echo $did ?>
      <h1 class="hd">ONLINE INDUSTRIAL TRAINING SEARCH</h1>
</center>


    <center>
<div class="rfm">
        <form action="./add_company.php" method="POST">
          
        <h2 style="color:green">
            <?php echo $alert;   ?>
        </h2>

        <label for="cname">Company Name</label> <br>
        <input type="text" name="cname" required> 
        <label for="email">Email</label><br>
        <input type="email" name="mail" required><br>
        <label for="contact">Contact</label><br>
        <input type="text" name="cont" required><br>
        <label for="location">Location</label><br>
        <input type="text" name="loc" required><br>
        <label for="url">Company URL</label><br>
        <input type="text" name="link" required><br>
        <label for="description">Description</label><br>
        <input type="text" name="desc" required><br>
        <label for="intake">Maximum Field intake</label><br>
        <input type="number" name="intake" required><br>
        <label for="status">Company Field status</label><br>
        <select name="status" id=""><br>
            <option value="Open">Open</option>
            <option value="Closed">Closed</option>
        </select><br>
        <input id="sbmt" type="submit" name="submit"><br>
        </form>
        </center>
    
</body>
</html>