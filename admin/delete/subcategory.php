<?php
require_once(__DIR__ . "/../checksession.php");
require('../../inc/function.php');
$b=$_REQUEST['cid'];

$data=mysqli_query($conn,"DELETE FROM `tbl_subcategory` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Sub-Category Deleted successfully";
	header("location:../manage-subcategory.php");
}


?>