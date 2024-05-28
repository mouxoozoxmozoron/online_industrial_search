<?php session_start();
include("./connect.php");

if ($_SESSION['nam']) {
  $currentUser=$_SESSION['nam'];
  $cid =  $_SESSION['hd_id'];
}
$sql = "SELECT * from `hod` WHERE role = 'Admin' ";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<meta name="Viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link 
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" 
    rel="stylesheet"
   />
    <link rel="stylesheet" href="./componnent/styles.css">
    <title>Admin panel</title>
</head>
<body>
<header class="head" style="background-color: darkblue;">
      <ul class="link"> 
      <a href="./add_hods.php">New HOD</a>
      <a href="./index.html">logout?</a>
      </ul>
      <h3 class="umsg" style="color: white;"> <?php echo 'Hi'; echo "    "; echo  $currentUser;echo ",";echo " ";   echo'Welcome back, manage your system '; ?> </h3>

  </header>
  <center>

  <span class="container" >
    <button class="btn" id="btn">
   More
   <i class="bx bx-chevron-down" id="arrow"></i>
 </button>
 
 <div class="holder">
 <span class="dropdown" id="dropdown" style="height: 3.5cm;">
 <a href="./Admin/admin_profile.php">
     <i class="bx bx-user"></i>
     Profile
   </a><br>
   <a href="./Admin/alldir.php">
     
     All directors
   </a><br>
   <a href="./Admin/allhod.php">
     
     All HOD'S
   </a><br>
   <a href="./Admin/allcomp.php">
     
     All Company
   </a><br>
   <a href="./Admin/allstdt.php">
     
     All Student's
   </a><br>
   <a href="./Admin/addadmin.php">
     
     Add Assistant Admin
   </a><br>
   
   
</span>
 </div>



      <h1 class="hd">ADMIN PANEL</h1>
      <div class="tab1" >
      <table>
        <tr>
          <center>
          <h1 class="h" style="color: black;">ADMIN'S PANEL</h1>
          </center>
        </tr>
        <tr>
          <th>Name</th>
          <th>contact</th>
          <th>Email</th>
          <th>Role</th>
           
        </tr>

        <?php
				while ($all = mysqli_fetch_assoc($result)) {
					         echo "<tr>";
                    echo "<td>".$all['first_name'] . $all['last_name']."</td>"; //std name
				          	echo "<td>".$all['contact']."</td>";
                    echo "<td>".$all['email']."</td>";
                    echo "<td>".$all['role']."</td>";
             
					
					//echo "<td><a href=\"edit.php?id=$all[id]\">Edit</a></td>";
                   // echo "<td><a href=\"multdel.php?id=$all[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
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

</body>
</html>