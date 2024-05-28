<?php session_start();
include("../connect.php");


if ($_SESSION['nam']) {
  $currentUser=$_SESSION['nam'];
  $cid =  $_SESSION['hd_id'];
}
 
 $sqld = "SELECT * from `hod` WHERE id = '$cid'";
   $all= mysqli_query($conn , $sqld);
    $row=mysqli_fetch_assoc($all);
    $dep_id=$row['department_id'];



   // 
//INNER JOIN company ON gst_f_request .company_id = company.id
//INNER JOIN department ON gst_f_request.department_id = department.depart_id

$data = "SELECT * FROM gst_f_request
INNER JOIN hod ON hod.id = gst_f_request.users_id 
INNER JOIN company ON gst_f_request.company_id = company.id
INNER JOIN department ON gst_f_request.department_id = department.depart_id
WHERE gst_f_request.department_id = $dep_id AND hod_prove = 'none'";

$total_f = mysqli_query($conn, $data);
 

$date = "SELECT COUNT(*) AS total_u FROM gst_f_request   WHERE hod_prove = 'none' AND department_id = $dep_id";
$numb = mysqli_query($conn, $date);
$no_u = mysqli_fetch_assoc($numb);
$sum_u = $no_u['total_u'];

?>

<!DOCTYPE html>
<html lang="en">
<meta name="Viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles2.css">
    <title>gst_department</title>
</head>
<body>
<header class="head">
        <ul class="link"> 
        <a href="../add_co_director.php">Add company HR</a>
            <a href="../index.html">HOME</a>
       
    </ul>
    <h3 class="umsg" > <?php  echo 'Hi'; echo "    "; echo   $currentUser; echo ",";echo " ";   echo'Thank you for choosing us '; ?> </h3>
    </header>
    <center>
        <h1 class="hd">HOD'S PANEL</h1>
        <div  id="notification" >
        <p>IT Request Waiting your Approve</p> <h1  style="background-color: BLUE ; color: white ;" id="total" > <?php echo $sum_u; ?></h1>
        
       
        </div>
</center>
<center>
    <div class="tab1" >
      <table>
        <tr>
          <center>
          <h1 class="h" > LIST OF IT REQUEST'S OF YOUR STUDENTS</h1>
          </center>
        </tr>
        <tr >
          <th class="row" style="background-color:green;">Program</th>
          <th class="row" style="background-color:green;">Starting Date</th>
          <th class="row" style="background-color:green;">Terminating date</th>
          <th class="row" style="background-color:green;">Program activities based</th>
          <th class="row" style="background-color:green;">Department</th>
          <th class="row" style="background-color:green;">Company<br> Name</th>
          <th class="row" style="background-color:green;">Applicant Name</th>
          <th class="row" style="background-color:green;">Reg.Number</th>
          <th class="row" style="background-color:green;">HOD<br> level <br>status</th>
          <th class="row" style="background-color:green;">Action</th>
        </tr>

        <?php
				while ($all=mysqli_fetch_assoc($total_f)) {
					echo "<tr>";
					echo "<td>".$all['tittle']."</td>";
					echo "<td >".$all['start_date']."</td>";
					echo "<td>".$all['end_date']."</td>";
          echo "<td>".$all['description']."</td>";
         echo "<td>".$all['depart_name']."</td>";
          echo "<td>".$all['co_name']."</td>"; //company name
         echo "<td>".$all['first_name'] . $all['last_name']."</td>"; //std name
        echo "<td>".$all['regnum']."</td>";
          echo "<td>".$all['hod_prove']."</td>";
                   // echo "<td><a href=\"multdel.php?id=$all[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                   echo "<td><a href=\"department_action.php?sign_gst=$all[gst_id]\" onClick=\"return confirm('Approving this Application will Automatically Attach your Email to the Request, Do you want to continue ?')\">Approve</a></td>";
                 echo "<td><a href=\"department_action.php?id_del=$all[gst_id]\"onClick=\"return confirm('Are sure you want to Delete this Field request?')\">Delete</a></td>";
                  }
                  ?>
                  </table>
                </div>
                </center>
</body>
</html>

