<?php session_start();

include("./connect.php");
$alert = "";


if (isset($_POST['submit'])){
    
   $call=mysqli_real_escape_string($conn, $_POST['cont']);
   $psw=mysqli_real_escape_string($conn, $_POST['psd']);

    $details = "SELECT * FROM director WHERE password = '$psw' AND contact ='$call'";
   $result= mysqli_query($conn, $details);
  
if(mysqli_num_rows($result) >0) {
   //echo "User exist";

    # code...

    //check for role
    $rows=mysqli_fetch_assoc($result);
    //for page re-direction
   $role=$rows['department'];
   //for session identification
    $mail=$rows['email'];
    //initialize session
    $_SESSION['fname']=$rows['first_name'];
    $_SESSION['d_id']=$rows['id'];
   //if ($role=="CSM") {
       // header('location:department/csm_department.php');
        # code...
    //}
   //elseif ($role=="LMV") {
        # code...
       //header('location:department/lmv_department.php');
    //}
    //Add all other department

    header('location:dir_panel.php');
}
else {
   $alert="incorrect contact or password";
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
    <title>Login</title>
</head>
<body>
<header class="head">
      <ul class="link"> 
     
      <a href="./index.html">BACK</a>
  </ul>
  </header>
  <center>
      <h1 class="hd">ONLINE INDUSTRIAL TRAINING SEARCH</h1>
</center>

<center>
<div class="rfm" >
        <form  action="./director_login.php" method="POST">
            <h1>Company Director login</h1> <br>
            <h3 id="ale" >
                <?php
               echo $alert;
                ?>
            </h3>
        <label for="contact">Contact</label><br>
        <input type="text" name="cont" required> <br>
        <label for="password">Password</label><br>
        <input type="Password" name="psd" required><br>
        <input id="sbmt" type="submit" name="submit">
</form>
</div>
</center>



<style>

#ale{
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
color: red;
font-size: 18px;
}

</style>
</body>
</html>