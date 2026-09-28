<?php
require_once(__DIR__ . "/../checksession.php");
require('../../inc/function.php');
$b=$_REQUEST['aid'];

$data=mysqli_query($conn,"DELETE FROM `tbl_job_applications` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Job Application Deleted successfully";
	header("location:../manage-job-application.php");
}

?>