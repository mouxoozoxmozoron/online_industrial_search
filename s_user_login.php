<?php session_start();

include("./connect.php");
$inc = "";

if (isset($_POST['submit'])){
    
   $cont=mysqli_real_escape_string($conn, $_POST['cont']);
   $psw=mysqli_real_escape_string($conn, $_POST['psd']);

   if ($cont =='oits001' && $psw == 'oits') {
    $_SESSION['nam'] = 'oits000Admin';
    $_SESSION['hd+id'] = '001';
    header('location:a_panel.php');
   }
   else {
    
   

    $details = ltrim( "SELECT * FROM hod WHERE password = '$psw' AND email ='$cont'");
   $result= mysqli_query($conn, $details);
  
if(mysqli_num_rows($result) >0) {
    //check for role
    $rows=mysqli_fetch_assoc($result);
    //for page re-direction
   $role=$rows['department'];
   $role=$rows['role']; //role
   //for session identification
    $mail=$rows['email'];
    //initialize session
    $_SESSION['fname']=$rows['email']; //email
    $_SESSION['nam']=$rows['first_name']; //name
    $_SESSION['hd_id']=$rows['id']; //id
   // $_SESSION['depart']=$rows['department'];
//redirect user directly to his page
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
elseif ($role=="director") {
    # code...
    header('location:dir_panel.php');
}
}
else {
    $inc = "incorrect contact or password";
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
    <link rel="stylesheet" href="./componnent/styles.css">
    <title>Login</title>
</head>
<body>
<header class="head" style="background-color: navy;">
      <ul class="link"> 
     
      <a href="./index.html">BACK</a>
  </ul>
  </header>
  <center>
      <h1 class="hd">ONLINE INDUSTRIAL TRAINING APPLICATION</h1>
</center>

<center>
<div class="rfm" >
    
        <form action="./s_user_login.php" method="POST">
        <h1>Login to your account</h1>
        <h2 id="inc" >
<?php 
echo $inc;
?>

</h2>
        <label for="mail">Email</label>
        <input type="Email" name="cont" required>
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