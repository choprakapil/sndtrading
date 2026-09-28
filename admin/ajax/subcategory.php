<?php
require_once(__DIR__ . "/../checksession.php");
require('../../inc/function.php');
$category_id = $_POST['category_id'];

echo '<option value="">Select Sub Category</option>';

$get_category_data = mysqli_query($conn,"SELECT * FROM `tbl_subcategory` where `category_id`='".$category_id."' and `status`='1'");
if(mysqli_num_rows($get_category_data)>0)
{
	while($category = mysqli_fetch_assoc($get_category_data)){
		?><option value="<?= $category['id']; ?>"><?= $category['name'];?></option><?php
	}
}

?>