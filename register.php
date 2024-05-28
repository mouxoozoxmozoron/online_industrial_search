<?php

$notify = "";
$avb = "";


include('./connect.php');

if (isset($_POST['submit'])) {
    $fnam=mysqli_real_escape_string($conn, $_POST['fname']);
    $lnam=mysqli_real_escape_string($conn, $_POST['lname']);
    $reg=mysqli_real_escape_string($conn, $_POST['regno']);
    $rol=mysqli_real_escape_string($conn, $_POST['role']);
    $contact=mysqli_real_escape_string($conn, $_POST['cont']);
    $email=ltrim(mysqli_real_escape_string($conn, $_POST['mail']));
    $pasw=ltrim(mysqli_real_escape_string($conn, $_POST['psw']));
    $mname=ltrim(mysqli_real_escape_string($conn, $_POST['mname']));
    # code...

    
    $comp = "SELECT * FROM hod WHERE contact =  '$contact' OR email = '$email'";
    $result= mysqli_query($conn, $comp);
    if(mysqli_num_rows($result) >0) {
        $avb = 'This Account Exist';
       // header('location:s_user_login.php');
    }
    else {
        
    
    $sql = "INSERT INTO hod (first_name, last_name, regnum, role, contact, email, password, m_name )
    VALUES ('$fnam', '$lnam', '$reg', '$rol', '$contact', '$email', '$pasw','$mname')";
     if (!mysqli_query($conn, $sql)) {
        echo 'there is ab error' .mysqli_error($conn);
        # code...
     }
     else{
        //echo'Well! yur Account is ready now ';
        $notify = "Account Succesfully created";
       
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
    <title>register</title>
</head>
<body>
<header class="head" style="background-color: darkblue;">
        <ul class="link"> 
        <a href="./index.html">HOME</a>
    </ul>
    </header>
    <center>
        <h1 class="hd">ONLINE INDUSTRIAL TRAINING SEARCH</h1>
</center>

<center>
    <div class="rfm">
        <form action="./register.php" method="POST">
        <h1>Register here</h1>


          <h2 id="not" </h2> <?php echo $notify ;
          ?> 
          </h2>
          <h2 id="notion" </h2> <?php echo $avb ;
          ?> 
          </h2>
            <label for="fname">firstName</label>  <br>
        <input type="text" name="fname" required> <br>

        <label for="fname">Middle Name</label> <br>
        <input type="text" name="mname" required> <br>

        <label for="fname">LastName</label> <br>
        <input type="text" name="lname" required> <br>
        <label for="regn">Reg-Number</label> <br>
        <input type="text" name="regno" required> <br>
        <label for="role">Your Role</label><br>
        <select name="role" id="">
            <option class="opt" value="Student">Student</option>
        </select> <br>
        <label for="contact">Contact</label><br>
        <input type="number" name="cont" required><br>
        <label for="email">Email</label><br>
        <input type="email" name="mail" required><br>
        <label for="password">Password</label><br>
        <input type="Password" name="psw" required><br>
        <input id="sbmt" type="submit" name="submit">
            <a id="lgn" href="./s_user_login.php">login?</a>
        </form>

    </div>
</center>
<style>
    #not{
 color: rgb(157, 230, 48);
 font-size: 22px;
 font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
#notion{
 color: red;
 font-size: 22px;
 font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
#lgn{
    color: white;
    font-size: 22px;
 font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
</style>
</body>
</html>