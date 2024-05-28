
<?php 
include("./connect.php");

if (isset($_GET['accept11'])) {
$acc=$_GET['accept11'] ;
$result = mysqli_query($conn, "UPDATE `urp_f_request` SET `status`='Active' WHERE urp_id=$acc");
header('location:./dir_panel.php');
}



if (isset($_GET['accept10'])) {
  # code...  ess_f_request
  $acc=$_GET['accept10'] ;
$result = mysqli_query($conn, "UPDATE `ess_f_request` SET `status`='Active' WHERE ess_id=$acc");
header('location:./dir_panel.php');
}

if (isset($_GET['accept9'])) {
  # code...
  $acc=$_GET['accept9'] ;
  $result = mysqli_query($conn, "UPDATE `esm_f_request` SET `status`='Active' WHERE esm_id=$acc");
  header('location:./dir_panel.php');
}



if (isset($_GET['accept8'])) {
  # code...
  $acc=$_GET['accept8'] ;
  $result = mysqli_query($conn, "UPDATE `ceees_f_request` SET `status`='Active' WHERE ce_id=$acc");
  header('location:./dir_panel.php');
}

if (isset($_GET['accept7'])) {
  # code...
  $acc=$_GET['accept7'] ;
  $result = mysqli_query($conn, "UPDATE `be_f_request` SET `status`='Active' WHERE be_id=$acc");
  header('location:./dir_panel.php');
}

if (isset($_GET['accept6'])) {
  # code...
  $acc=$_GET['accept6'] ;
  $result = mysqli_query($conn, "UPDATE `id_f_request` SET `status`='Active' WHERE ids_id=$acc");
  header('location:./dir_panel.php');
}


if (isset($_GET['accept5'])) {
  $acc=$_GET['accept5'] ;
  $result = mysqli_query($conn, "UPDATE `architecture_f_request` SET `status`='Active' WHERE a_id=$acc");
  header('location:./dir_panel.php');
  }


if (isset($_GET['accept4'])) {
  # code...
  $acc=$_GET['accept4'] ;
  $result = mysqli_query($conn, "UPDATE `lmv_f_request` SET `status`='Active' WHERE lmv_id=$acc");
  header('location:./dir_panel.php');
}

if (isset($_GET['accept3'])) {
  # code...
  $acc=$_GET['accept3'] ;
  $result = mysqli_query($conn, "UPDATE `bs_f_request` SET `status`='Active' WHERE bs_id=$acc");
  header('location:./dir_panel.php');
}

if (isset($_GET['accept2'])) {
  # code...
  $acc=$_GET['accept2'] ;
  $result = mysqli_query($conn, "UPDATE `csm_f_request` SET `status`='Active' WHERE cm_id=$acc");
  header('location:./dir_panel.php');
}

if (isset($_GET['accept1'])) {
  # code...
  $acc=$_GET['accept1'] ;
  $result = mysqli_query($conn, "UPDATE `gst_f_request` SET `status`='Active' WHERE gst_id=$acc");
  header('location:./dir_panel.php');
}



//.change company status
if (isset($_GET['chang_id'])) {
  $acc=$_GET['chang_id'] ;
  $sql = "SELECT * FROM compaNy WHERE id = $acc";
$data = mysqli_query($conn, $sql);
$all = mysqli_fetch_assoc($data);
$sts = $all['co_status'];
if ($sts == 'Open') {
  $result = mysqli_query($conn, "UPDATE `company` SET `co_status`='Closed' WHERE id=$acc");
   header('location:./dir_all_comp.php');
}
else{
  $result = mysqli_query($conn, "UPDATE `company` SET `co_status`='Open' WHERE id=$acc");
 header('location:./dir_all_comp.php');

}

}










?>
