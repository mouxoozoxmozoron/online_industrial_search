<?php session_start();

include("./connect.php");
$inc = "";

if (isset($_POST['submit'])){
    
   $call=mysqli_real_escape_string($conn, $_POST['cont']);
   $psw=mysqli_real_escape_string($conn, $_POST['psd']);

    $details = "SELECT * FROM users  WHERE password = '$psw' AND contact ='$call'";
   
   $result= mysqli_query($conn, $details);
 
if(mysqli_num_rows($result) >0) {
 


    $rows=mysqli_fetch_assoc($result);
   $role=$rows['role'];
    $mail=$rows['email'];
    //initialize session
    $_SESSION['fname']=$rows['fname'];
    $_SESSION['id']=$rows['id'];
    

   if ($role=="Admin") {
        header('location:a_panel.php');
        # code...
    }
   elseif ($role=="Student") {
        # code...
       header('location:std_panel.php');
    }
    elseif ($role=="hod") {
        # code...
       header('location:department/gst_department.php');
    }
    
}
else {
    
    $inc = 'incorrect contact or password';
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
<body>
   <header class="head">
      <ul class="link"> 
     
      <a href="./index.html">HOME</a>
  </ul>
  </header>
  <center>
      <h1 class="hd">ONLINE INDUSTRIAL TRAINING SEARCH</h1>
</center>

<center> 
<div class="rfm">
        <form action="./p_user_login.php" method="POST">
      
        <h1>Login to you Account</h1>
<h2 id="inc" >
<?php 
echo $inc;
?>

</h2>

    
        <label for="contact">Contact</label>
        <input type="text" name="cont" required>
        <label for="password">Password</label>
        <input type="Password" name="psd" required>
        <input id="sbmt" type="submit" name="submit">
</form>
</div>
</center>


<style>
#inc{
    color: red;
    font-size: 22px;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

</style>
</body>
</html>