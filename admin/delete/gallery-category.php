<?php
require_once(__DIR__ . "/../checksession.php");
require('../../inc/function.php');
$b=$_REQUEST['bid'];

$data=mysqli_query($conn,"DELETE FROM `tbl_gallery_category` WHERE `glry_id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Gallery Deleted successfully";
	header("location:../manage-gallery-category.php");
}
?>