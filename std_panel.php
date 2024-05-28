<?php session_start();
include("./connect.php");

 if ($_SESSION['nam']) {
   $currentUser=$_SESSION['nam'];
   $cid =  $_SESSION['hd_id'];
 }

 $sql = "SELECT * from `company`";
 $result = mysqli_query($conn, $sql);


 
 //sql 01
 $data1 = "SELECT COUNT(*) AS total1 FROM gst_f_request WHERE users_id = $cid ";
$numb = mysqli_query($conn, $data1);
$no1 = mysqli_fetch_assoc($numb);


//total request
$sum= $no1['total1'];







//let now work with fieild request which the company accepted

$data1 = "SELECT COUNT(*) AS total1 FROM gst_f_request WHERE status = 'Active' AND  users_id = $cid";
$numb = mysqli_query($conn, $data1);
$no1 = mysqli_fetch_assoc($numb);


$sum_acc= $no1['total1'];

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
    <title>Student panel</title>
</head>
 <body>
<header class="head" style="background-color: darkblue;">

        <ul class="link"> 
        <a href="./field_request.php">APPLY IT</a>
            <a href="./index.html">logout?</a>
       
            </ul>
    <h3 class="umsg" style="color: white;">
      <?php echo 'Hi'; echo "    "; echo  $currentUser;echo ",";echo " ";   echo'Thank you for choosing us '; ?> </h3>
    
  </header>
 </div>

    <center>
    <span class="container" >
    <button class="btn" id="btn">
   More
   <i class="bx bx-chevron-down" id="arrow"></i>
 </button>
 
 <div class="holder" >
 <span class="dropdown" id="dropdown" style="height:2.25cm; background-color: navy">
 <a href="./stdt_profile.php">
     <i class="bx bx-user"></i>
     Profile
   </a> <br>
   <a href="./field_request.php">
     <i class="bx bx-plus-circle"></i>
     New Field Request
   </a> <br>
   <a href="./std_all.php">
     <i class="bx bx-book"></i>
     My Field Request
   </a> <br>
   <a href="./accepted.php">
     <i class="bx bx-folder"></i>
     Selected To
   </a> <br>
</span>
</div>
        <h1 class="hd">OITS STUDENT PANEL</h1>
        <div id="notification" >
        <p>Your Application</p> <h1 id="total"> <?php echo $sum; ?></h1>
        
       <p>Selected</p> <h1 id="acc"> <?php echo $sum_acc; ?> </h1>
        </div>
    <div class="tab1" >
      <table>
        <tr>
          <center>
          <h1 class="h" style="color: black;"> Companies you can apply for IT</h1>
          </center>
        </tr>
        <tr >
          <th >company name</th>
          <th>URL</th>
          <th>company email</th>
          <th>location</th>
           <th> Description</th>
          <th>customer care number</th>
          <th>maximum IT intake</th>
          <th>IT status</th>
        </tr>

        <?php
				while ($all = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td >".$all['co_name']."</td>";
					echo "<td >".$all['URL']."</td>";
					echo "<td>".$all['email']."</td>";
          echo "<td>".$all['location']."</td>";
           echo "<td>".$all['co_description']."</td>";
          echo "<td>".$all['co_contact']."</td>";
          echo "<td>".$all['max_intake']."</td>";
          echo "<td>".$all['co_status']."</td>";
					
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
  background-color: blue;
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
#btn{
  background-color: navy;
  margin-top: 4pt;
}

    </style>
</body>
</html>

