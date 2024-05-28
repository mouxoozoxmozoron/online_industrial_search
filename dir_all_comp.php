<?php session_start();
include("./connect.php");

if ($_SESSION['nam']) {
  $currentUser=$_SESSION['nam'];
  $did =  $_SESSION['hd_id'];
}
 


$sql = "SELECT * FROM company WHERE director_id = $did";
$all = mysqli_query($conn, $sql);
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
<header class="head" style="background-color: navy;">
        <ul class="link">
            <a href="./dir_panel.php"> BACK</a>
    </ul>
    <h3 class="umsg" style="color:white"> <?php echo 'Hi'; echo "    "; echo  $currentUser;echo ",";echo " ";   echo'Thank you for choosing us '; ?> </h3>
    </header>
    <center>
        <h1 class="hd">OITS DIRECTOR PANEL</h1>
    <div class="tab1" >
      <table>
        <tr>
          <center>
          <h1 class="h" > LIST OF YOUR COMPANY</h1>
          </center>
        </tr>
        <tr>
          <th>Company Name</th>
          <th>URL</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Location</th>
          <th>Description</th>
          <th>Field<br>intake</th>
          <th>Field<br>Status</th>
          <th>Change<br>Company<br>field<br>Status</th>
          <th>Update</th>
        </tr>

        <?php
        function LinkResource($rel, $href){
          echo "<link rel='{$rel}' href='{$href}'>";
        }
        // echo "<td>".$all11['stdt_conferm']."</td>";
				while ($all1=mysqli_fetch_assoc($all)) {
					echo "<tr>";
					echo "<td>".$all1['co_name']."</td>";
					echo "<td >".$all1['URL']."</td>";
					echo "<td>".$all1['email']."</td>";
          echo "<td>".$all1['co_contact']."</td>";
          echo "<td>".$all1['location']."</td>";
          echo "<td>".$all1['co_description']."</td>";
          echo "<td>".$all1['max_intake']."</td>";
          echo "<td>".$all1['co_status']."</td>";
					
					echo "<td><a  href=\"director_action.php?chang_id=$all1[id]\">Change</a></td>";
                    echo "<td><a href=\"co_edit.php?update_id=$all1[id]\">Update</a></td>";
                    //echo "<td><a href=\"edit.php?id=$employee[id]\">Edit</a></td>";
                   // echo "<td><a href=\"multdel.php?id=$all[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                //   echo "<td><a href=\"director_action.php?accept1=$all1[gst_id]\" onClick=\"return confirm('Are you sure you want to accept this applicant?')\">Accept</a></td>";
                 //  echo "<td>".$all1['stdt_conferm']."</td>";
                  }
			?>
      </table>
    </div>
    </center>
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