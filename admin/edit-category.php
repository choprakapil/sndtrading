<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('checksession.php');
require('../inc/function.php');

$b = $_REQUEST['cid'];
$bdata = mysqli_query($conn, "SELECT * FROM `tbl_category` where `id`='$b'");
$brec = mysqli_fetch_array($bdata);
if (isset($_POST['update'])) {
	$heading = mysqli_real_escape_string($conn, $_POST['heading']);
	$prourls = mysqli_real_escape_string($conn, $_POST['prourl']);
	$prourrl = str_replace(array('\'', '"', ' ', ',', ';', '*', ',', '/', '&', '_', '$', '--', '-', '<', '>'), '-', $prourls);
	$prourl = strtolower($prourrl);
	$position = mysqli_real_escape_string($conn, $_POST['position']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);
	  $metatag = mysqli_real_escape_string($conn,$_POST['metatag']);  
  $keyword = mysqli_real_escape_string($conn,$_POST['keyword']); 
  $metadesc = mysqli_real_escape_string($conn,$_POST['metadescription']); 
	
	//breadcrumb
	$breadcrumb=$_FILES['breadcrumb']['name'];
	if($breadcrumb!="")
	{
	 $breadcrumb=time()."_".$breadcrumb;
	 @unlink("../uploads/category/".$brec['breadcrumb']); 
	 move_uploaded_file($_FILES["breadcrumb"]["tmp_name"], "../uploads/category/".$breadcrumb);
  
	}
	 else
	{
	   $breadcrumb=$brec['breadcrumb'];
	}
	
	//breadcrumb
	
	$query = mysqli_query($conn, "UPDATE `tbl_category` SET `name`='$heading', `breadcrumb` = '$breadcrumb', `sort`='$position',`status`='$status',`url`='$prourl',`title`='$metatag', `keyword`='$keyword', `metadesc`='$metadesc' WHERE `id`='$b'");
	if ($query == true) {
		$_SESSION['success'] = "Category updated successfully";
		header("refresh:3;url=manage-category.php");
	} else {
		$_SESSION['error'] = "Something went wrong. Please try again";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require("includes/head.php"); ?>

<body>

	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade in page-sidebar-fixed page-header-fixed">
		<!-- begin #page-container -->
		<?php require("includes/header.php"); ?>
		<!-- end #header -->
		<!-- begin #sidebar -->
		<?php require("includes/left.php"); ?>

		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;"> Category Management</a></li>
				<li class="breadcrumb-item active">Edit Category</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Manage Category</h1>
			<!-- end page-header -->
			<!-- begin row -->
			<div class="row">
				<!-- begin col-10 -->
				<div class="col-lg-12">
					<!-- begin panel -->
					<div class="panel panel-inverse">
						<!-- begin panel-heading -->
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Edit Category</h4>
						</div>
						<!-- end panel-heading -->

						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST" enctype="multipart/form-data">
								<div class="box-body">
									<div class="form-group">
										<label for="heading">Enter Category Name</label>
										<input type="text" name="heading" class="form-control" id="name" value="<?= $brec['name']; ?>">
									</div>

									<div class="form-group">
										<label for="heading">Enter Category URL<code>Same as Category name & avoid Special Characters</code></label>
										<input type="text" name="prourl" class="form-control" id="url" placeholder="Enter Category Url" value="<?= $brec['url']; ?>">
									</div>

                                    


									<div class="form-group">
										<label for="exampleInputFile">Breadcrumb <code>[1920 x 336]px</code></label>
										<input type="file" name="breadcrumb" class="form-control" id="exampleInputFile">
										<?php
										if($brec['breadcrumb'] !=""){
										?>
										<img src="../uploads/category/<?= $brec['breadcrumb']; ?>" style="width:20%;">
										<?php } ?>
									</div>


									<div class="form-group">
										<label for="exampleInputPassword1">Sort Number</label>
										<input type="number" name="position" class="form-control" id="exampleInputPassword1" value="<?= $brec['sort']; ?>">
									</div>

									<div class="form-group row m-b-10">
										<label class="col-md-1 col-form-label">Status :-</label>
										<div class="col-md-9">
											<div class="radio radio-css radio-inline">
												<input type="radio" name="status" id="optionsRadios4" value="1" <?php if ($brec['status'] == '1') { echo 'checked'; } ?>>
												<label for="optionsRadios4">Active</label>
											</div>
											<div class="radio radio-css radio-inline">
												<input type="radio" name="status" id="optionsRadios3" value="0" <?php if ($brec['status'] == '0') { echo 'checked'; } ?>>
												<label for="optionsRadios3">Inactive</label>
											</div>
										</div>
									</div>
								</div>
								 <div id="dvPassport" style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;"> 
                                     <div class="form-group">
                                      <label for="metatag">Meta Title</label>
                                      <input type="text" name="metatag" id="metatag" value="<?= $brec['title']; ?>" class="form-control" >
                                     </div>
                                     
                                      <div class="form-group">
                                      <label for="keyword">Meta Keyword</label>
                                      <textarea name="keyword" id="keyword" class="form-control" ><?= $brec['keyword']; ?></textarea>
                                     </div>
                                     
                                     <div class="form-group">
                                      <label for="metadescription">Meta Description</label>
                                      <textarea name="metadescription" id="metadescription"  class="form-control" ><?= $brec['metadesc']; ?></textarea>
                                     </div>
                                    </div><br>
								<!-- /.box-body -->
								<div class="box-footer">
									<button type="submit" name="update" class="btn btn-primary">Click Here To Update</button>
							       	<input id="btnPassport" type="button" class="btn btn-warning" value="Use Seo tools" name="btnPassport" /> 
								</div>
							</form>
						</div>
						<!-- end panel-body -->
					</div>
					<!-- end panel -->
				</div>
				<!-- end col-10 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end #content -->
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

	<?php require("includes/footer.php"); ?>

	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
	<!------------------>
<script type="text/javascript">
$(function () {
$("#btnPassport").click(function () {
if ($(this).val() == "Use Seo tools") {
$("#dvPassport").show();
$(this).val("Close Seo tools");
} else {
$("#dvPassport").hide();
$(this).val("Use Seo tools");
}
});
});
</script> 
	<script>
		window.onload = function() {
			var src = document.getElementById("name"),
				dst = document.getElementById("url");
			src.addEventListener('input', function() {
				dst.value = src.value;
			});
		}
	</script>
	<!----End Get Image----->
</body>

</html>