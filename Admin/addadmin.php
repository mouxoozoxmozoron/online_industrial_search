<?php session_start();
include("../connect.php");

$avb='';

if ($_SESSION['nam']) {
    $currentUser=$_SESSION['nam'];
    $cid =  $_SESSION['hd_id'];
  }

if (isset($_POST['submit'])) {
    $fnam=mysqli_real_escape_string($conn, $_POST['fname']);
    $lnam=mysqli_real_escape_string($conn, $_POST['lname']);
    $rol=mysqli_real_escape_string($conn, $_POST['role']);
    $contact=mysqli_real_escape_string($conn, $_POST['cont']);
    $email=mysqli_real_escape_string($conn, $_POST['mail']);
    $pasw=mysqli_real_escape_string($conn, $_POST['psw']);
    # code...

    $comp = "SELECT * FROM hod WHERE contact =  '$contact' OR password = '$pasw'";
    $result= mysqli_query($conn, $comp);
    if(mysqli_num_rows($result) >0) {
        $avb = 'This Account Exist';
       // header('location:s_user_login.php');
    }
    else {

    $sql = "INSERT INTO hod(first_name, last_name, role, contact, email, password ) VALUES ('$fnam', '$lnam', '$rol', '$contact', ' $email', '$pasw')";
     if (!mysqli_query($conn, $sql)) {
        echo 'there is ab error' .mysqli_error($conn);
        # code...
     }
     else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Assistant Admin succesfull AddeD')
        window.location.href='../a_panel.php';
        </SCRIPT>");
     }
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
    <link rel="stylesheet" href="../componnent/styles.css">
    <title>admin</title>
</head>
<body>
<header class="head">
        <ul class="link"> 
        <a href="../a_panel.php">HOME</a>
    </ul>
    </header>
    <center>
        <h1 class="hd">ONLINE INDUSTRIAL TRAINING SEARCH</h1>
</center>

<center>
    <div class="rfm">
        <form action="./addadmin.php" method="POST">
        <h1>ADD ASSISTANT ADMIN</h1>
        <h1 style="color: red;">
            <?php
            echo $avb;
            ?>
        </h1>
            <label for="fname">firstName</label>  <br>
        <input type="text" name="fname" required> <br>
        <label for="lname">LastName</label> <br>
        <input type="text" name="lname" required> <br>
        <label for="role">Role</label><br>
        <select name="role" id="">
            <option value="Admin">Admin</option>
        </select> <br>
        <label for="contact">Contact</label><br>
        <input type="number" name="cont" required><br>
        <label for="email">Email</label><br>
        <input type="email" name="mail" required><br>
        <label for="password">Password</label><br>
        <input type="Password" name="psw" required><br>
        <input id="sbmt" type="submit" name="submit"><br>
        </form>

    </div>
</center>
    

<style>
    
</style>
</body>
</html>