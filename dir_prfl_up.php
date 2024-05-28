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

 if (isset($_POST['submit'])) {
      $fnam= ltrim( mysqli_real_escape_string($conn, $_POST['fname'])) ;
    $lnam=ltrim(mysqli_real_escape_string($conn, $_POST['lname']));
      $cont=ltrim(mysqli_real_escape_string($conn, $_POST['cont']));
    $email=ltrim(mysqli_real_escape_string($conn, $_POST['mail']));
    $id_hdn=ltrim(mysqli_real_escape_string($conn, $_POST['hdn'])); 
  


if ($fnam !=null &&  $lnam !=null && $cont !=null && $email !=null ) {


   $sql = mysqli_query($conn, "UPDATE `director` SET `first_name`='$fnam',`last_name`='$lnam', `contact`='$cont',
    `email`='$email' WHERE id=$id_hdn");
  
if ($sql) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Profile Succesfully Updated')
window.location.href='profile.php';
</SCRIPT>");
}
else {
   echo 'error'.mysqli_error($conn);
}
}
else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Value Cant be empty or full of white Spaces,Please! Try Again');

    </SCRIPT>");
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
    <title>profile Update</title>
</head>
<body>
<header class="head" style="background-color: navy;">
      <ul class="link"> 
     
      <a href="./profile.php">BACK</a>
  </ul>
  </header>
  <center>
      <h1 class="hd">ONLINE INDUSTRIAL TRAINING SEARCH</h1>
</center>
    <center>
<div class="rfm">
        <form action="./dir_prfl_up.php" method="POST">
        <h2 style="color:white;font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif "
         >Profile Update</h2>
            <input type="hidden" name="hdn"  value="<?php echo $did ?>" >
            <label for="fname">First Name</label> <br>
        <input type="text" name="fname" value="<?php echo $fname ?>" required> 
        <label for="lnam">Last Name</label><br>
        <input type="text" name="lname" value="<?php echo $lname ?>" required><br>
        <label for="cont">Contact</label><br>
        <input type="number" name="cont"  value="<?php echo $contact ?>" required><br>
        <label for="mail">Email</label><br>
        <input type="email" name="mail"  value="<?php echo $mail?>" required><br>
           <input id="sbmt" type="submit" name="submit"><br>
        </form>
        </center>
    
</body>
</html>