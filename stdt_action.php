
<?php 
include("./connect.php");

if (isset($_GET['conf11'])) {
$acc=$_GET['conf11'] ;
$result = mysqli_query($conn, "UPDATE `urp_f_request` SET `stdt_conferm`='Confirmed' WHERE urp_id=$acc");
header('location:./accepted.php');
}



if (isset($_GET['comf10'])) {
  # code...  ess_f_request
  $acc=$_GET['conf10'] ;
$result = mysqli_query($conn, "UPDATE `ess_f_request` SET `stdt_conferm`='Confirmed' WHERE ess_id=$acc");
header('location:./accepted.php');
}

if (isset($_GET['conf9'])) {
  # code...
  $acc=$_GET['conf9'] ;
  $result = mysqli_query($conn, "UPDATE `esm_f_request` SET `stdt_conferm`='Confirmed' WHERE esm_id=$acc");
  header('location:./accepted.php');
}



if (isset($_GET['conf8'])) {
  # code...
  $acc=$_GET['conf8'] ;
  $result = mysqli_query($conn, "UPDATE `ceees_f_request` SET `stdt_conferm`='Confirmed' WHERE ce_id=$acc");
  header('location:./accepted.php');
}

if (isset($_GET['conf7'])) {
  # code...
  $acc=$_GET['conf7'] ;
  $result = mysqli_query($conn, "UPDATE `be_f_request` SET `stdt_conferm`='Confirmed' WHERE be_id=$acc");
  header('location:./accepted.php');
}

if (isset($_GET['conf6'])) {
  # code...
  $acc=$_GET['conf6'] ;
  $result = mysqli_query($conn, "UPDATE `id_f_request` SET `stdt_conferm`='Confirmed' WHERE ids_id=$acc");
  header('location:./accepted.php');
}


if (isset($_GET['conf5'])) {
  $acc=$_GET['conf5'] ;
  $result = mysqli_query($conn, "UPDATE `architecture_f_request` SET `stdt_conferm`='Confirmed' WHERE a_id=$acc");
  header('location:./accepted.php');
  }


if (isset($_GET['conf4'])) {
  # code...
  $acc=$_GET['conf4'] ;
  $result = mysqli_query($conn, "UPDATE `lmv_f_request` SET `stdt_conferm`='Confirmed' WHERE lmv_id=$acc");
  header('location:./accepted.php');
}

if (isset($_GET['conf3'])) {
  # code...
  $acc=$_GET['conf3'] ;
  $result = mysqli_query($conn, "UPDATE `bs_f_request` SET `stdt_conferm`='Confirmed' WHERE bs_id=$acc");
  header('location:./accepted.php');
}

if (isset($_GET['conf2'])) {
  # code...
  $acc=$_GET['conf2'] ;
  $result = mysqli_query($conn, "UPDATE `csm_f_request` SET `stdt_conferm`='Confirmed' WHERE cm_id=$acc");
  header('location:./accepted.php');
}

if (isset($_GET['conf1'])) {
  # code...
  $acc=$_GET['conf1'] ;
  $result = mysqli_query($conn, "UPDATE `gst_f_request` SET `stdt_conferm`='Confirmed' WHERE gst_id=$acc");
  header('location:./accepted.php');
}
?>