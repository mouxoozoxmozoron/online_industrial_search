<?php session_start();
include("./connect.php");

if ($_SESSION['nam']) {
    $currentUser=$_SESSION['nam'];
    $cid =  $_SESSION['hd_id'];
  }
 
$all="SELECT * FROM hod WHERE id=$cid";
$data = mysqli_query($conn, $all);
while($all = mysqli_fetch_assoc($data)){
    $fname = $all['first_name'];
    $lname = $all['last_name'];
    $reg = $all['regnum'];
  $contact = $all['contact'];
  $mail = $all['email'];
  $std_id = $all['id'];
   }


 if (isset($_POST['submit'])) {
      $fnam= ltrim( mysqli_real_escape_string($conn, $_POST['fname'])) ;
    $lnam=ltrim(mysqli_real_escape_string($conn, $_POST['lname']));
    $rg=ltrim( mysqli_real_escape_string($conn, $_POST['rg']));
      $cont=ltrim(mysqli_real_escape_string($conn, $_POST['cont']));
    $email=ltrim(mysqli_real_escape_string($conn, $_POST['mail']));
    $id_hdn=ltrim(mysqli_real_escape_string($conn, $_POST['hdn'])); 
  


if ($fnam !=null &&  $lnam !=null && $rg !=null && $cont !=null && $email !=null ) {


   $sql = mysqli_query($conn, "UPDATE `hod` SET `first_name`='$fnam',`last_name`='$lnam', `regnum`='$rg', `contact`='$cont',
    `email`='$email' WHERE id=$id_hdn");
  
if ($sql) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Profile Succesfully Updated')
window.location.href='stdt_profile.php';
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
     
      <a href="./stdt_profile.php">BACK</a>
  </ul>
  </header>
  <center>
      <h1 class="hd">ONLINE INDUSTRIAL TRAINING SEARCH</h1>
</center>
    <center>
<div class="rfm">
        <form action="./stdt_prof_upd.php" method="POST">
        <h2 style="color:white;font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif "
         >Profile Update</h2>
            <input type="hidden" name="hdn"  value="<?php echo $std_id ?>" >
            <label for="fname">First Name</label> <br>
        <input type="text" name="fname" value="<?php echo $fname ?>" required> 
        <label for="lnam">Last Name</label><br>
        <input type="text" name="lname" value="<?php echo $lname ?>" required><br>
        <label for="reg.num">Reg_Number</label><br>
        <input type="text" name="rg"   value="<?php echo $reg ?>" required><br>
        <label for="cont">Contact</label><br>
        <input type="number" name="cont"  value="<?php echo $contact ?>" required><br>
        <label for="mail">Email</label><br>
        <input type="email" name="mail"  value="<?php echo $mail?>" required><br>
           <input id="sbmt" type="submit" name="submit"><br>
        </form>
        </center>
    
</body>
</html>