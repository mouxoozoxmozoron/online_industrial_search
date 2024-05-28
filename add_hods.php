<?Php

include("./connect.php");
$avb = '';
$notify = '';
//get department name
$sql2 = "SELECT depart_name FROM `department`";
$result2 = mysqli_query($conn, $sql2);
$options = mysqli_fetch_all($result2, MYSQLI_ASSOC);




if (isset($_POST['submit'])) {
    $fnam=mysqli_real_escape_string($conn, $_POST['fname']);
    $lnam=mysqli_real_escape_string($conn, $_POST['lname']);
    $dep=mysqli_real_escape_string($conn, $_POST['depart']);
    $contact=mysqli_real_escape_string($conn, $_POST['cont']);
    $email=mysqli_real_escape_string($conn, $_POST['mail']);
    $pasw=mysqli_real_escape_string($conn, $_POST['psw']);
    # code...

    $role = "hod";

    $comp = "SELECT * FROM hod WHERE contact =  '$contact' OR password = '$pasw'";
    $result= mysqli_query($conn, $comp);
    if(mysqli_num_rows($result) >0) {
        $avb = 'This Account Exist';
       // header('location:s_user_login.php');
    }
    else {


    //ger department id
    $sqld = "SELECT * from `department` WHERE depart_name = '$dep'";
    $all= mysqli_query($conn , $sqld);
    $row=mysqli_fetch_assoc($all);
    $d_id=$row['depart_id'];
    //$cdr_id = $rows['director_id'];


    $sql = "INSERT INTO hod (first_name, last_name, department_id, contact, email, password, role ) VALUES ('$fnam', '$lnam', '$d_id', '$contact', '$email', '$pasw', '$role')";
     if (!mysqli_query($conn, $sql)) {
        echo 'there is ab error' .mysqli_error($conn);
        # code...
     }
     else{
        $notify = 'New HOD Adeed Succesfully';
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
    <title>Add..hods_iot</title>
</head>
<body>
<header class="head">
        <ul class="link"> 
       
        <a href="./a_panel.php">BACK</a>
    </ul>
    </header>
    <center>
        <h1 class="hd">ONLINE INDUSTRIAL TRAINING APPLICATION SYSTEM</h1>
</center>

<center>
<div class="rfm">
        <form action="./add_hods.php" method="POST">
        <h1>Add new HOD</h1>
        <h3> 
            <?php echo $notify; ?>
        </h3>
        <h3 style="color: red;">
            <?php
            echo $avb;
            ?>
        </h3>
        <label for="fname">firstName</label><br>
        <input type="text" name="fname" required><br>
        <label for="lname">LastName</label><br>
        <input type="text" name="lname" required><br>
        <label for="Department">Select your Department</label> <br>
        <select name="depart" id="">
                <?php 
                //foreach ($option as $key => $value) 
                foreach ($options as $optn) { ?>
                <option value="<?php echo $optn['depart_name']  ?>"> <?php echo $optn['depart_name']  ?></option>
                    # code...
                    <?php 
                }
                ?>
            </option>
        </select> <br>
        <label for="contact">Contact</label><br>
        <input type="text" name="cont" required><br>
        <label for="email">Email</label><br>
        <input type="email" name="mail" required><br>
        <label for="password">Password</label><br>
        <input type="Password" name="psw" required><br>
        <input id="sbmt" type="submit" name="submit">
</form>
</div>
</center>
</body>
</html>