<?php
require_once(__DIR__ . "/../checksession.php");
require('../../inc/function.php');
$b=$_REQUEST['jid'];

$data=mysqli_query($conn,"DELETE FROM `tbl_career` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Job Deleted successfully";
	header("location:../manage-career.php");
}

?>