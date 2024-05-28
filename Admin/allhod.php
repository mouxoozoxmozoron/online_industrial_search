<?php session_start();
include("../connect.php");

 if ($_SESSION['fname']) {
   $currentUser=$_SESSION['fname'];
 }
 


$sql = "SELECT * from hod INNER JOIN department ON hod.department_id = department.depart_id";
 $result = mysqli_query($conn, $sql);

?>


<!DOCTYPE html>
<html lang="en">
<meta name="Viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../componnent/styles.css">
    <link 
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" 
    rel="stylesheet"
   />
    <title>admin</title>
</head>
 <body>
<header class="head">

        <ul class="link">
            <a href="../a_panel.php">BACK</a>
       
            </ul>
    <h3 class="umsg" >
      <?php echo 'Hi'; echo "    "; echo  $currentUser;echo ",";echo " ";   echo'Thank you for choosing us '; ?> </h3>
    
  </header>
 </div>

    <center>
      
</div>
        <h1 class="hd">OITS ADMIN PANEL</h1>
    <div class="tab1" >
      <table>
        <tr>
          <center>
          <h1 class="h" >ALL DEPARTMENT HOD'S IN OITS</h1>
          </center>
        </tr>
        <tr>
          <th>Name</th>
          <th>Department</th>
          <th>Contact</th>
          <th>Email</th>
          
         
        </tr>

        <?php
				while ($all = mysqli_fetch_assoc($result)) {
					echo "<tr>";
                    echo "<td>".$all['first_name'] . $all['last_name']."</td>"; //std name
                    echo "<td>".$all['depart_name']."</td>";
					echo "<td >".$all['contact']."</td>";
                    echo "<td>".$all['email']."</td>";
					//echo "<td><a href=\"edit.php?id=$all[id]\">Edit</a></td>";
                   // echo "<td><a href=\"multdel.php?id=$all[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
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
