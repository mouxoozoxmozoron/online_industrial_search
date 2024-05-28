<?php session_start();
include("./connect.php");

if ($_SESSION['nam']) {
  $currentUser=$_SESSION['nam'];
  $cid =  $_SESSION['hd_id'];
}

 //sql 01
 $data1 = "SELECT * FROM gst_f_request
 INNER JOIN hod ON hod.id = gst_f_request.users_id
 INNER JOIN company ON gst_f_request.company_id = company.id
 INNER JOIN department ON gst_f_request.department_id = department.depart_id
 WHERE users_id = $cid";
 

 //$data1 = "SELECT * FROM gst_f_request
 //NNER JOIN hod ON hod.id = gst_f_request.users_id 
//NNER JOIN company ON gst_f_request.company_id = company.id 
//INNER JOIN department ON gst_f_request.department_id = department.depart_id
//WHERE gst_f_request.users_id = $cid ";

$numb1 = mysqli_query($conn, $data1);
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <meta name="Viewport" content="width=device-width, initial-scale=1">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./componnent/styles.css">
    <title>All..f.request..oit</title>
 </head>
 <body>

 <body>
<header class="head">

        <ul class="link"> 
            <a href="./std_panel.php">BACK</a>
       
            </ul>
    <h3 class="umsg" >
      <?php  echo 'Hi'; echo "    "; echo  $currentUser;echo ",";echo " ";   echo'Thank you for choosing us '; ?> </h3>
    
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
          <h1 class="h" >YOUR INDUSTRIAL TRAINNING REQUEST'S</h1>
          </center>
        </tr>
        <tr>
        <th>Company</th>
        <th>company Call</th>
        <th>Your Name</th>
          <th>Program</th>
          <th>program activities based</th>
          <th>Starting Date</th>
          <th>End date</th>
          <th>Department</th>
          
        </tr>

        <?php
        //
				while ($all1=mysqli_fetch_assoc($numb1)) {
					echo "<tr>";
                    echo "<td>".$all1['co_name']."</td>";
                   echo "<td>".$all1['co_contact']."</td>";
                   echo "<td>".$all1['first_name'] . $all1['last_name']."</td>"; //std name
					echo "<td>".$all1['tittle']."</td>";
                    echo "<td>".$all1['description']."</td>";
					echo "<td >".$all1['start_date']."</td>";
					echo "<td>".$all1['end_date']."</td>";
                   echo "<td>".$all1['depart_name']."</td>";
					
					//echo "<td><a href=\"edit.php?id=$all[id]\">Edit</a></td>";
                   // echo "<td><a href=\"multdel.php?id=$all[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                  // echo "<td><a href=\"director_action.php?accept1=$all1[gst_id]\" onClick=\"return confirm('Are you sure you want to accept this applicant?')\">Accept</a></td>";
                  }

			?>
      </table>
    </div>




    </center>
    
 </body>
 </html>