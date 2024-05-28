<?php session_start();
include("./connect.php");

if ($_SESSION['nam']) {
  $currentUser=$_SESSION['nam'];
}
if ($_SESSION['hd_id']) {
  $did =  $_SESSION['hd_id'];
}

 //let find company id of the loged in director as we be able to get field r
 //request sent to his company
 $detail = "SELECT id FROM company WHERE director_id = '$did'";
   $result= mysqli_query($conn, $detail);
 mysqli_num_rows($result);
 $rows=mysqli_fetch_assoc($result);
 $co_id=$rows['id'];



 //sql 01
 $data1 = "SELECT * FROM gst_f_request INNER JOIN hod ON hod.id = gst_f_request.users_id 
  INNER JOIN company ON gst_f_request.company_id = company.id WHERE gst_f_request.director_id = $did 
  AND hod_prove = 'Approved'";
  //company ON csm_f_request.company_id = company.id
$numb1 = mysqli_query($conn, $data1);
//$all1 = mysqli_fetch_assoc($numb1);




//leltus count f request the director has not responded to
$data1 = "SELECT COUNT(*) AS total1 FROM gst_f_request WHERE director_id = $did AND status = 'waiting' AND hod_prove = 'Approved' ";
$numb = mysqli_query($conn, $data1);
$no1 = mysqli_fetch_assoc($numb);

//total request
$sum_u= $no1['total1'];
?>

<!DOCTYPE html>
<html lang="en">
<meta name="Viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./componnent/styles.css">
    <link 
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" 
    rel="stylesheet"
   />
    <title>Directors panel</title>
</head>
<body>
<header class="head" style="background-color: darkblue;">
        <ul class="link"> 
        
        <a href="./add_company.php">Add Company</a>
            <a href="./index.html">logout?</a>
       
    </ul>
    <h3 class="umsg" style="color: white;"> <?php  echo 'Hi'; echo "    "; echo  $currentUser;echo ",";echo " ";   echo'Thank you for choosing us '; ?> </h3>
    </header>
    <center>


    <span class="container" >
    <button class="btn" id="btn" style="background-color: navy;">
   More
   <i class="bx bx-chevron-down" id="arrow"></i>
 </button>
 
 <div class="holder">
 <span class="dropdown" id="dropdown" style="height: 2cm; background-color: navy">
 <a href="./profile.php">
     <i class="bx bx-user"></i>
     Profile
   </a><br>
   <a href="./add_company.php">
     <i class="bx bx-plus-circle"></i>
     New Company
   </a> <br>
   <a href="./dir_all_comp.php">
     <i class="bx bx-book"></i>
     My Company
   </a><br>

   
</span>
 </div>


        <h1 class="hd">OITS COMPANY HR PANEL</h1>
        <div id="notification" >
        <p>Request Waiting your Response</p> <h1 id="total" > <?php echo $sum_u; ?></h1>
        
        </div>
</center>
<div > <?php // echo 'hello'; echo  $currentUser; echo'welcome back!'; ?>  </div>
<center>
    <div class="tab1" >
      <table>
        <tr>
          <center>
          <h1 class="h" style="color: black;"> LIST OF IT REQUEST'S YOU COMPANY HAVE RECEIVED</h1>
          </center>
        </tr>
        <tr style="background-color:white;">
          <th>Program</th>
          <th>Starting Date</th>
          <th>End date</th>
          <th>program activities based</th>
          <th>Company</th>
          <th>HOD prove</th>
          <th>Apct Name</th>
          <th>Apct Reg.No</th>
          <th>Request status</th>
          <th>Action</th>
          <th>Student<br> Response</th>
        </tr>

        <?php
        // echo "<td>".$all11['stdt_conferm']."</td>";
				while ($all1=mysqli_fetch_assoc($numb1)) {
					echo "<tr >";
					echo "<td >".$all1['tittle']."</td>";
					echo "<td >".$all1['start_date']."</td>";
					echo "<td>".$all1['end_date']."</td>";
          echo "<td>".$all1['description']."</td>";
          echo "<td>".$all1['co_name']."</td>";
          echo "<td>".$all1['hod_email']."</td>";
          echo "<td>".$all1['first_name'] . $all1['last_name']."</td>"; //std name
          echo "<td>".$all1['regnum']."</td>";
          echo "<td>".$all1['status']."</td>";
					
					//echo "<td><a href=\"edit.php?id=$all[id]\">Edit</a></td>";
                   // echo "<td><a href=\"multdel.php?id=$all[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                   echo "<td><a href=\"director_action.php?accept1=$all1[gst_id]\" onClick=\"return confirm('Are you sure you want to accept this applicant?')\">Accept</a></td>";
                   echo "<td>".$all1['stdt_conferm']."</td>";
                  }
			?>
      </table>
    </div>
    </center>

    <script>
      const dropdownBtn = document.getElementById("btn");
      const dropdownMenu = document.getElementById("dropdown");
      const toggleArrow = document.getElementById("arrow");
      
      
      const toggleDropdown = function () {
        dropdownMenu.classList.toggle("show");
        toggleArrow.classList.toggle("arrow");
      };
      
      dropdownBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        toggleDropdown();
      });
      </script>


    <style>

      /* stdt notification */
#notification{
  background-color: darkblue;
  justify-content: space-around;
  border-radius: 8px;
  display: flex;
  border: 1px solid black;
  width: 35rem;
 
}

#total{
  background-color: blue;
  height: 4rem;
  width: 4rem;
  border-radius: 50%;
  color: white;
  
 
}
#acc{
  background-color: green;
  height: 4rem;
  width: 4rem;
  border-radius: 50%;
  color: white;
}
#notification p{
  color: white;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  text-decoration: none;
  font-size: 30px;
}

    </style>
</body>
</html>