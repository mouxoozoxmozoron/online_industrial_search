
<?php session_start();
include("./connect.php");

$ntn = "";
if ($_SESSION['nam']) {
  $currentUser=$_SESSION['nam'];
  $did =  $_SESSION['hd_id'];
}


 if (isset($_POST['submit'])){
    
    $cps=mysqli_real_escape_string($conn, $_POST['cpsw']);
    // THE ltrim() FUNCTION IS USED TO AVOID SPACES IN STARTING POINT
    $nps=ltrim(mysqli_real_escape_string($conn, $_POST['npsw']));

$all="SELECT * FROM hod WHERE id=$did";
$data = mysqli_query($conn, $all);
while($all = mysqli_fetch_assoc($data)){
    $pswd = $all['password'];
  $d_id = $all['id'];
   }


if ($pswd==$cps && $nps !=null) {
    $proces = mysqli_query($conn, "UPDATE `hod` SET `password`='$nps' WHERE id=$did");

    echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Password Updated')
window.location.href='profile.php';
</SCRIPT>");
}
else {
   $ntn = 'You Entered Wrong Current Password! or an " " New Password';
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
    <link 
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" 
    rel="stylesheet"
   />
    <title>Directors panel</title>
</head>
<body>
<header class="head" style="background-color: navy;">
        <ul class="link">
            <a href="./profile.php"> BACK</a>
    </ul>
</header>
<center>
<div class="card" >
    
<form class="cpfrm" action="./change_pasw.php" method="POST">
    <h2 id="h1">Update Password<h2>
        <h2 id="ale" ><?php echo $ntn ?></h2>
<section>
<label for="">Current Password</label> <br>
<input type="text" name="cpsw" required > <br>
</section>
<section>
<label for="">New Password</label> <br>
<input type="text" name="npsw" required >
</section>
<input id="cpsb" type="submit" name="submit" >
</form>
</div>
</center>
</body>

<style>
#ale{
  color: rgb(226, 20, 20);
  font-size: 17px;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
</style>
</html>