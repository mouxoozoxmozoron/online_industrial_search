<?php session_start();
include("./connect.php");


if ($_SESSION['nam']) {
    $currentUser=$_SESSION['nam'];
    $did =  $_SESSION['hd_id'];
  }


$all="SELECT * FROM hod WHERE id=$did";
$data = mysqli_query($conn, $all);
while($all = mysqli_fetch_assoc($data)){
    $fname = $all['first_name'];
    $lname = $all['last_name'];
  $contact = $all['contact'];
  $mail = $all['email'];
  $d_id = $all['id'];
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
    <link 
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" 
    rel="stylesheet"
   />
    <title>Profile</title>
</head>
<body>
<header class="head" style="background-color: navy;">
        <ul class="link">
            <a href="./dir_panel.php"> BACK</a>
    </ul>
</header>
<center>
<div class="card2" > 
    <h2>Profile</h2>
    <div id="s2" >
    <p>First Name <h4><?php echo $fname ?></h4> </p> <br>
    <p>Last Name<h4><?php echo $lname ?></h4> </p> <br>
    <p>Contact <h4><?php echo $contact ?></h4></p> <br>
    <p>Email<h4><?php echo $mail ?></h4> </p> <br>
</div>
<div id="s1">
    <section id="sps" >
    <a id="a1" href="./change_pasw.php">Change password</a>
    <a href="./dir_prfl_up.php">Update Profile</a>
    </section>
</div>
</div>
</center>
</body>