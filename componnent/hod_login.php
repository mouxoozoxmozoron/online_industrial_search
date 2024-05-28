<?php session_start();

include("./connect.php");

if (isset($_POST['submit'])){
    
   $call=mysqli_real_escape_string($conn, $_POST['cont']);
   $psw=mysqli_real_escape_string($conn, $_POST['psd']);

    $details = "SELECT * FROM hod WHERE password = '$psw' AND contact ='$call'";
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
    $_SESSION['fname']=$rows['email'];
   if ($role=="CSM") {
        header('location:department/csm_department.php');
        # code...
    }
   elseif ($role=="LMV") {
        # code...
       header('location:department/lmv_department.php');
    }
    //Add all other department
}
else {
    echo "incorrect contact or password";
}

}

?>


<!DOCTYPE html>
<html lang="en">
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
     
      <a href="">BACK</a>
  </ul>
  </header>
  <center>
      <h1 class="hd">ONLINE INDUSTRIAL TRAINING SEARCH</h1>
</center>

<center>
<div class="rfm" >
        <form action="./s_user_login.php" method="POST">
        <h1>Login to your account</h1>
        <label for="contact">Contact</label>
        <input type="text" name="cont" required>
        <label for="password">Password</label>
        <input type="Password" name="psd" required>
        <input id="sbmt" type="submit" name="submit">
</form>
</div>
</center>
</body>
</html>