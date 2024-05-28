
<?php session_start();
require_once ("./connect.php");
//$up= (isset($_GET['update_id']) ? $_GET['update_id'] : '');
   if ( (isset($_GET['update_id']) ? $_GET['update_id'] : '')) {
    $up= (isset($_GET['update_id']) ? $_GET['update_id'] : '');
    $sql = "SELECT * FROM compaNy WHERE id = $up";
  $data = mysqli_query($conn, $sql);
  if (!$data) {
    echo 'error' . mysqli_error($conn);
  }
else{

 while($all = mysqli_fetch_assoc($data)){
  $name = $all['co_name'];
  $email = $all['email'];
$contact = $all['co_contact'];
$location = $all['location'];
$url = $all['URL'];
$desc = $all['co_description'];
$intake = $all['max_intake'];
$sts = $all['co_status'];
$cod=$all['id'];
 }
 }
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
    $id_hdn=mysqli_real_escape_string($conn, $_POST['hdn']); 
  



   $sql = mysqli_query($conn, "UPDATE `company` SET `co_name`='$nam',`email`='$mail', `co_contact`='$contact', `location`='$lo',
    `URL`='$lin',`co_description`='$de', `max_intake`='$no',`co_status`='$status'   WHERE id=$id_hdn");
  
if ($sql) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Succesfully Updated')
window.location.href='dir_all_comp.php';
</SCRIPT>");
}
else {
   echo 'error'.mysqli_error($conn);
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
<header class="head">
      <ul class="link"> 
     
      <a href="./dir_all_comp.php">BACK</a>
  </ul>
  </header>
  <center>
      <h1 class="hd">ONLINE INDUSTRIAL TRAINING SEARCH</h1>
</center>
    <center>
<div class="rfm">
        <form action="./co_edit.php" method="POST">
            <h2>Update<?php echo " "; echo $name ?> Company</h2>
            <input type="hidden" name="hdn"  value="<?php echo $cod ?>" >
            <label for="cname">Company Name</label> <br>
        <input type="text" name="cname" value="<?php echo $name ?>" required> 
        <label for="email">Email</label><br>
        <input type="email" name="mail" value="<?php echo $email ?>" required><br>
        <label for="contact">Contact</label><br>
        <input type="number" name="cont"   value="<?php echo $contact ?>" required><br>
        <label for="location">Location</label><br>
        <input type="text" name="loc"  value="<?php echo $location ?>" required><br>
        <label for="url">Company URL</label><br>
        <input type="text" name="link"  value="<?php echo $url?>" required><br>
        <label for="description">Description</label><br>
        <input type="text" name="desc" value="<?php echo $desc ?>"  required><br>
        <label for="intake">Maximum Field intake</label><br>
        <input type="number" name="intake" value="<?php echo $intake ?>"  required><br>
        <label for="status">Company Field status</label><br>
        <select name="status" id="" ><br>
            <option value="Open">Open</option>
            <option value="Closed">Closed</option>
        </select><br>
        <input id="sbmt" type="submit" name="submit"><br>
        </form>
        </center>
    
</body>
</html>