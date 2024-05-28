<?php session_start();
include("../connect.php");

 if ($_SESSION['fname']) {
   $currentUser=$_SESSION['fname'];
   $hd_nam = $_SESSION['nam'];
 }
 
 $data = "SELECT * FROM lmv_f_request  INNER JOIN users ON users.id = lmv_f_request.users_id 
 INNER JOIN company ON lmv_f_request.company_id = company.id WHERE hod_prove = 'none'";
$total_f = mysqli_query($conn, $data);
//WHERE hod_prove = 'none'

$date = "SELECT COUNT(*) AS total_u FROM lmv_f_request WHERE hod_prove = 'none' ";
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
    <title>lmv_department</title>
</head>
<body>
<header class="head">
        <ul class="link"> 
        <a href="../add_co_director.php">Add company director</a>
            <a href="../index.html">HOME</a>
       
    </ul>
    <h3 class="umsg" > <?php echo 'Hi'; echo "    "; echo   $hd_nam; echo ",";echo " ";   echo'Thank you for choosing us '; ?> </h3>
    </header>
    <center>
        <h1 class="hd">OITS LMV DEPARTMENT</h1>
        <div  id="notification" >
        <p>Field Request Waiting your Approve</p> <h1  style="background-color: sandybrown ; color: black ;" id="total" > <?php echo $sum_u; ?></h1>
        
       
        </div>
</center>
<center>
    <div class="tab1" >
      <table>
        <tr>
          <center>
          <h1 class="h" > LIST OF FIELD REQUEST'S OF YOUR STUDENT'S</h1>
          </center>
        </tr>
        <tr>
          <th>Field tittle</th>
          <th>Starting Date</th>
          <th>Terminating date</th>
          <th>Description</th>
          <th>Department</th>
          <th>Company Name</th>
          <th>Applicant Name</th>
          <th>Reg.Number</th>
          <th>HOD level status</th>
          <th>Action</th>
        </tr>

        <?php
				while ($all=mysqli_fetch_assoc($total_f)) {
					echo "<tr>";
					echo "<td>".$all['tittle']."</td>";
					echo "<td >".$all['start_date']."</td>";
					echo "<td>".$all['end_date']."</td>";
          echo "<td>".$all['description']."</td>";
          echo "<td>".$all['department']."</td>";
          echo "<td>".$all['co_name']."</td>"; //company name
          echo "<td>".$all['fname'] . $all['lname']."</td>"; //std name
          echo "<td>".$all['regnum']."</td>";
          echo "<td>".$all['hod_prove']."</td>";
					
					//echo "<td><a href=\"edit.php?id=$all[id]\">Edit</a></td>";
                   // echo "<td><a href=\"multdel.php?id=$all[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                   echo "<td><a href=\"department_action.php?sign_lmv=$all[lmv_id]\" onClick=\"return confirm('Approving this Application will Automatically Attach your Email to the Request, Do you want to continue ?')\">Approve</a></td>";
                  }
                  ?>
                  </table>
                </div>
                </center>
</body>
</html>

