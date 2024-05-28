<?Php session_start();

if ($_SESSION['fname']) {
    $currentUser=$_SESSION['fname'];
    $hd_nam = $_SESSION['nam'];
   $depart = $_SESSION['depart'];
  }


$avb = '';
include("./connect.php");

if (isset($_POST['submit'])) {
    $fnam=mysqli_real_escape_string($conn, $_POST['fname']);
    $lnam=mysqli_real_escape_string($conn, $_POST['lname']);
    $contact=mysqli_real_escape_string($conn, $_POST['cont']);
    $email=mysqli_real_escape_string($conn, $_POST['mail']);
    $pasw=mysqli_real_escape_string($conn, $_POST['psw']);
    $role = "director";




    $comp = "SELECT * FROM hod WHERE contact =  '$contact' OR password = '$pasw'";
    $result= mysqli_query($conn, $comp);
    if(mysqli_num_rows($result) >0) {
        $avb = 'This Account Exist';
       // header('location:s_user_login.php');
    }
    else {

    $role = "director";
    $sql = "INSERT INTO hod (first_name, last_name, contact, email, password, role ) VALUES ('$fnam', '$lnam', '$contact', '$email', '$pasw', '$role')";
     if (!mysqli_query($conn, $sql)) {
        echo 'there is ab error' .mysqli_error($conn);
        # code...
     }

     else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('New Company HR Succesfully Added')
        window.location.href='department/gst_department.php';
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
    <link rel="stylesheet" href="./componnent/styles.css">
    <title>Add co_director_iot</title>
</head>
<body>
<header class="head" style="background-color: Navy;">
        <ul class="link"> 
       
        <a href="./department/gst_department.php">BACK</a>
    </ul>
    </header>
    <center>
        <h1 class="hd">ONLINE INDUSTRIAL TRAINING APPLICATION SYSTEM</h1>
</center>


<center>
<div class="rfm" >
        <form action="./add_co_director.php" method="POST">
        <h1>Add NEW COMPANY HR</h1>
        <h3 style="color: red;">
            <?php
            echo $avb;
            ?>
        </h3>
            <label for="fname">firstName</label>
        <input type="text" name="fname" required>
        <label for="lname">LastName</label>
        <input type="text" name="lname" required>
        <label for="contact">Contact</label>
        <input type="number" name="cont" required>
        <label for="email">Email</label>
        <input type="email" name="mail" required>
        <label for="password">Password</label>
        <input type="Password" name="psw" required>
        <input id="sbmt" type="submit" name="submit">
        </form>
</div>
        </center>
</body>
</html>