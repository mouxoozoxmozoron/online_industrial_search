<?php session_start();
include("../connect.php");

if ($_SESSION['fname']) {
    //$hod_email=$_SESSION['fname']; // return hod email

   $currentUser=$_SESSION['fname'];
  }


if (isset($_GET['sign_arc'])) {
$acc=$_GET['sign_arc'] ;
$result = mysqli_query($conn, "UPDATE `architecture_f_request` SET `hod_prove`='Approved', hod_email='$currentUser' WHERE a_id=$acc");
header('location:./architec_department.php');
}


if (isset($_GET['sign_be'])) {
    $acc=$_GET['sign_be'] ;
    $result = mysqli_query($conn, "UPDATE `be_f_request` SET `hod_prove`='Approved', hod_email='$currentUser' WHERE be_id=$acc");
    header('location:./bes_department.php');
}

//sign_bs

if (isset($_GET['sign_bs'])) {
    $acc=$_GET['sign_bs'] ;
    $result = mysqli_query($conn, "UPDATE `bs_f_request` SET `hod_prove`='Approved', hod_email='$currentUser' WHERE bs_id=$acc");
    header('location:./bss_department.php');
}

if (isset($_GET['sign_ce'])) {
    $acc=$_GET['sign_ce'] ;
    $result = mysqli_query($conn, "UPDATE `ceees_f_request` SET `hod_prove`='Approved', hod_email='$currentUser' WHERE ce_id=$acc");
    header('location:./ceees_department.php');
}

if (isset($_GET['sign_csm'])) {
    $acc=$_GET['sign_csm'] ;
    $result = mysqli_query($conn, "UPDATE `csm_f_request` SET `hod_prove`='Approved', hod_email='$currentUser' WHERE cm_id=$acc");
    header('location:./ceees_department.php');
}

if (isset($_GET['sign_esm'])) {
    $acc=$_GET['sign_esm'] ;
    $result = mysqli_query($conn, "UPDATE `esm_f_request` SET `hod_prove`='Approved', hod_email='$currentUser' WHERE esm_id=$acc");
    header('location:./esm_department.php');
}

if (isset($_GET['sign_ess'])) {
    $acc=$_GET['sign_ess'] ;
    $result = mysqli_query($conn, "UPDATE `ess_f_request` SET `hod_prove`='Approved', hod_email='$currentUser' WHERE ess_id=$acc");
    header('location:./ess_department.php');
}

if (isset($_GET['sign_gst'])) {
    $acc=$_GET['sign_gst'] ;
    $result = mysqli_query($conn, "UPDATE `gst_f_request` SET `hod_prove`='Approved', hod_email='$currentUser' WHERE gst_id=$acc");
    header('location:./gst_department.php');
}

if (isset($_GET['sign_ids'])) {
    $acc=$_GET['sign_ids'] ;
    $result = mysqli_query($conn, "UPDATE `id_f_request` SET `hod_prove`='Approved', hod_email='$currentUser' WHERE ids_id=$acc");
    header('location:./ids_department.php');
}

if (isset($_GET['sign_lmv'])) {
    $acc=$_GET['sign_lmv'] ;
    $result = mysqli_query($conn, "UPDATE `lmv_f_request` SET `hod_prove`='Approved', hod_email='$currentUser' WHERE lmv_id=$acc");
    header('location:./lmv_department.php');
}

if (isset($_GET['sign_urp'])) {
    $acc=$_GET['sign_urp'] ;
    $result = mysqli_query($conn, "UPDATE `urp_f_request` SET `hod_prove`='Approved', hod_email='$currentUser' WHERE urp_id=$acc");
    header('location:./urp_department.php');
}






if (isset($_GET['id_del'])) {
    $del=$_GET['id_del'] ;
    $result = mysqli_query($conn, "DELETE FROM gst_f_request WHERE gst_id=$del");
    header('location:./gst_department.php');
}


?>

