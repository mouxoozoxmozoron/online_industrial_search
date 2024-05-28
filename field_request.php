<?php session_start();

include("./connect.php");
$fdr_succ = "";


if ($_SESSION['fname']) {
    $uid= $_SESSION['hd_id'];
  }


  $email_msg ="";

  //msg to hod
  //$to = "somebody@example.com";
  $subject = "My subject";
  $msg = "You Have New Field request to approve, ";
  $headers = "From: mozopd192@gmail.com" . "\r\n" .
  "CC: mozopd192@gmail.com";
  
  $txt = wordwrap($msg,70);






  
  //get company name
$sql = "SELECT co_name FROM `company`";
$result = mysqli_query($conn, $sql);
$option = mysqli_fetch_all($result, MYSQLI_ASSOC);

//get department name
$sql2 = "SELECT depart_name FROM `department`";
$result2 = mysqli_query($conn, $sql2);
$options = mysqli_fetch_all($result2, MYSQLI_ASSOC);


if (isset($_POST['submit'])) {
    $tittle=mysqli_real_escape_string($conn, $_POST['title']);
    $desc=mysqli_real_escape_string($conn, $_POST['descriptn']);
    $sd=mysqli_real_escape_string($conn, $_POST['s_date']);
    $ed=mysqli_real_escape_string($conn, $_POST['e_date']);
    $dep=mysqli_real_escape_string($conn, $_POST['depart']);
    $nam=mysqli_real_escape_string($conn, $_POST['comp']);

    //get company id
    $sqlid = "SELECT * from `company` WHERE co_name = '$nam'";
    $rol= mysqli_query($conn , $sqlid);
    $rows=mysqli_fetch_assoc($rol);
    $c_id=$rows['id'];
    $cdr_id = $rows['director_id'];

//ger department id
    $sqld = "SELECT * from `department` WHERE depart_name = '$dep'";
    $all= mysqli_query($conn , $sqld);
    $row=mysqli_fetch_assoc($all);
    $d_id=$row['depart_id'];
   


    //get hod email
    $sqlmsg = "SELECT * from `hod` WHERE department_id = '$d_id'";
    $all= mysqli_query($conn , $sqlmsg);
    $row=mysqli_fetch_assoc($all);
    $email_msg= ltrim( $row['email']);
   //remove spaces from anm email




    $status = "waiting";
    $hd_sign = "none";
    $stdt_conf = "Unconfermed";
    //$term = "BS's";




        
        $sql = "INSERT INTO gst_f_request (tittle, description, start_date, end_date, department_id, company_id, users_id, status, director_id, hod_prove, stdt_conferm)
    VALUES ('$tittle', '$desc', '$sd', '$ed', ' $d_id', '$c_id', '$uid', '$status', '$cdr_id', '$hd_sign', '$stdt_conf')";
     if (!mysqli_query($conn, $sql)) {
        echo 'there is ab error' .mysqli_error($conn);
        # code...
     }
     else{
        $fdr_succ = 'Nice, Your Field Request is now waiting for HOD Prove';
        //send an email to hod
        mail($email_msg,$subject,$txt,$headers);
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
    <title>Compose.Field.request</title>
</head>
<body>
   <header class="head" style="background-color: #383c87;">
      <ul class="link"> 
     
      <a href="./std_panel.php">BACK</a>
  </ul>
  </header>
  <center>
      <h1 class="hd">ONLINE INDUSTRIAL TRAINING SEARCH</h1>
</center>

<center>
<div class="rfm">
<form action="./field_request.php" method="POST">
       <h1> Fill the form</h1>
       <h2 id="fdr" >
        <?php 
        echo $fdr_succ; 
        //echo $email_msg;
        ?>
       </h2>
<label for="title">Program</label> <br>
        <input type="text" name="title" required> <br>
        <label for="description">Program activities based</label> <br>
        <input type="text" name="descriptn" required>

        <label for="Company">Which company are you interested to?</label><br>
        <select name="comp" id="">
            
                <?php 
                //foreach ($option as $key => $value) 
                foreach ($option as $opt) { ?>
                <option value="<?php echo $opt['co_name']  ?>"> <?php echo $opt['co_name']  ?></option>
                    # code...
                    <?php 
                }
                ?>
            </option>
        </select> <br>
        <label for="s_date">IT Start date</label></label><br>
        <input type="Date" name="s_date" required> 
        <label for="e_date">Terminating date</label></label> <br>
        <input type="Date" name="e_date" required>

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
        <input id="sbmt" type="submit" name="submit">
</form>
</div>
</center>



<style>
    #fdr{
color: greenyellow;
font-size: 22px;
font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>
</body>
</html>