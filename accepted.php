<?php session_start();
include("./connect.php");


if ($_SESSION['nam']) {
  $currentUser=$_SESSION['nam'];
  $cid =  $_SESSION['hd_id'];
}

 //sql 01
 $data1 = "SELECT * FROM gst_f_request INNER JOIN hod ON hod.id = gst_f_request.users_id 
  INNER JOIN company ON gst_f_request.company_id = company.id WHERE gst_f_request.users_id = $cid 
  AND status = 'Active'";

$numb1 = mysqli_query($conn, $data1);

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <meta name="Viewport" content="width=device-width, initial-scale=1">
    <meta name="Viewport" content="width=device-width, initial-scale=1">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./componnent/styles.css">
    <title>Accepted..f.request..oit</title>
 </head>
 <body>

 <body>
<header class="head" style="background-color: darkblue;">
 
        <ul class="link"> 
            <a href="./std_panel.php">BACK</a>
       
            </ul>
    <h3 class="umsg"  style="color: white;">
      <?php echo 'Hi'; echo "    "; echo  $currentUser;echo ",";echo " ";   echo'Thank you for choosing us '; ?> </h3>
    
  </header>
</div>
    <center>
    <h1 class="hd">OITS STUDENT PANEL</h1>
        <div id="notification" >
        </div>
        <div class="tab1" >
      <table>
        <tr>
          <center>
          <h1 class="h" style="color: black;">YOU HAVE BEEN SELECTED TO THE FOLLOWING COMPANY FOR INDUSTRIAL TRAINING</h1>
          </center>
        </tr>
        <tr>
        <th>Company</th>
        <th>company Call</th>
        <th>Your Name</th>
          <th>Program</th>
          <th>Starting Date</th>
          <th>End date</th>
          <th>your HOD</th>
          <th>Action</th>
          <th>Your Cofirmation</th>
        </tr>

        <?php
        //
				while ($all1=mysqli_fetch_assoc($numb1)) {
					echo "<tr>";
                    echo "<td>".$all1['co_name']."</td>";
                    echo "<td>".$all1['co_contact']."</td>";
                    echo "<td>".$all1['first_name'] . $all1['last_name']."</td>"; //std name
					echo "<td>".$all1['tittle']."</td>";
					echo "<td >".$all1['start_date']."</td>";
					echo "<td>".$all1['end_date']."</td>";
          echo "<td>".$all1['hod_email']."</td>";
          //stdt_conferm
					//echo "<td><a href=\"edit.php?id=$all[id]\">Edit</a></td>";
                   // echo "<td><a href=\"multdel.php?id=$all[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                  echo "<td><a href=\"stdt_action.php?conf1=$all1[gst_id]\" onClick=\"return confirm('Are you sure?')\">Confirm</a></td>";
                  echo "<td>".$all1['stdt_conferm']."</td>";
					
                }
			?>
      </table>
    </div>
    </center>
    
 </body>
 </html>