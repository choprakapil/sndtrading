<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('checksession.php');
require('../inc/function.php');

$bdata = mysqli_query($conn, "SELECT * FROM `tbl_home_extra_text`");
$brec = mysqli_fetch_array($bdata);
if (isset($_POST['update'])) {
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$subtitle = mysqli_real_escape_string($conn, $_POST['subtitle']);
	
	$pro_title = mysqli_real_escape_string($conn, $_POST['pro_title']);
	$pro_subtitle = mysqli_real_escape_string($conn, $_POST['pro_subtitle']);
	
	$srv_title = mysqli_real_escape_string($conn, $_POST['srv_title']);
	$srv_subtitle = mysqli_real_escape_string($conn, $_POST['srv_subtitle']);
	
	$turn_title = mysqli_real_escape_string($conn, $_POST['turn_title']);
	$turn_subtitle = mysqli_real_escape_string($conn, $_POST['turn_subtitle']);
	
	$work_title = mysqli_real_escape_string($conn, $_POST['work_title']);
	$work_subtitle = mysqli_real_escape_string($conn, $_POST['work_subtitle']);
	
	$test_title = mysqli_real_escape_string($conn, $_POST['test_title']);
	$test_subtitle = mysqli_real_escape_string($conn, $_POST['test_subtitle']);
	
	$blog_title = mysqli_real_escape_string($conn, $_POST['blog_title']);
	$blog_subtitle = mysqli_real_escape_string($conn, $_POST['blog_subtitle']);
	
	$alt = mysqli_real_escape_string($conn, $_POST['alt']);
	$old2 = mysqli_real_escape_string($conn, $_POST['oldimg2']);
	$pold2 = mysqli_real_escape_string($conn, $_POST['p_oldimg2']);
	$link1 = mysqli_real_escape_string($conn, $_POST['link1']);
	$link2 = mysqli_real_escape_string($conn, $_POST['link2']);

	$bimage2 = $_FILES['bimage2']['name'];
	if ($bimage2 != "") {
		$bimage2 = time() . "_" . $bimage2;
		@unlink("../uploads/home_extra/" . $old2);
		move_uploaded_file($_FILES["bimage2"]["tmp_name"], "../uploads/home_extra/" . $bimage2);
	} else {
		$bimage2 = $brec['image'];
	}
	
		$pbimage2 = $_FILES['p_bimage2']['name'];
	if ($pbimage2 != "") {
		$pbimage2 = time() . "_" . $pbimage2;
		@unlink("../uploads/home_extra/" . $pold2);
		move_uploaded_file($_FILES["p_bimage2"]["tmp_name"], "../uploads/home_extra/" . $pbimage2);
	} else {
		$pbimage2 = $brec['p_image'];
	}

	$query = mysqli_query($conn, "UPDATE `tbl_home_extra_text` SET `alt`='$alt',`title`='$title',`subtitle`='$subtitle',`pro_title`='$pro_title',`pro_subtitle`='$pro_subtitle',`srv_title`='$srv_title',`srv_subtitle`='$srv_subtitle',`turn_title`='$turn_title',`turn_subtitle`='$turn_subtitle',`work_title`='$work_title',`work_subtitle`='$work_subtitle',`test_title`='$test_title',`test_subtitle`='$test_subtitle',`blog_title`='$blog_title',`blog_subtitle`='$blog_subtitle',`image`='$bimage2',`p_image`='$pbimage2',`link1`='$link1',`link2`='$link2'");
	if ($query == true) {
		$_SESSION['success'] = "Home Extra Text Updated Successfully";
		header("refresh:3;url=manage-home-extra.php");
	} else {
		$_SESSION['error'] = "Something went wrong. Please try again";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require("includes/head.php"); ?>

<body>
	<!-- begin #page-container -->
	<?php require("includes/header.php"); ?>
	<!-- begin #sidebar -->
	<?php require("includes/left.php"); ?>
	<!-- begin #content -->
	<div id="content" class="content">
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
			<li class="breadcrumb-item"><a href="javascript:;">Home Extra Management</a></li>
			<li class="breadcrumb-item active">Edit Home Extra</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Home Extra</h1>
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
						<h4 class="panel-title"> Edit Home Extra</h4>
					</div>
					<!-- begin panel-body -->
					<div class="panel-body">
						<form role="form" method="POST" enctype="multipart/form-data">
							<div class="box-body">
							    
                                
								<div class="form-group d-none">
									<label for="banner"> Enter Title</label>
									<input type="text" name="title" class="form-control" id="" value="<?= $brec['title']; ?>">
								</div>
								
								<div class="form-group d-none">
									<label for="banner"> Enter Subtitle</label>
									<input type="text" name="subtitle" class="form-control" id="" value="<?= $brec['subtitle']; ?>">
								</div>

							
                                 <div class="row">
                                   
								 <div class="col-6 d-none">
								    <div class="form-group">
									<label for="banner"> Enter Alt</label>
									<input type="text" name="alt" class="form-control" id="" value="<?= $brec['alt']; ?>">
								</div>
								</div>
								</div>
								
								<div class="form-group d-none">
									<label for="banner"> Enter Link for (Know More)</label>
									<input type="text" name="link1" class="form-control" id="" value="<?= $brec['link1']; ?>">
								</div>
								
								<div class="form-group d-none">
									<label for="banner">Enter Link for (Contact Us)</label>
									<input type="text" name="link2" class="form-control" id="" value="<?= $brec['link2']; ?>">
								</div>
								
								<div class="row">
								    <div class="col-lg-12">
                                       <div class="panel-heading bg-dark text-light">
                    						<h4 class="panel-title"> Edit Achievement Background Image</h4>
                    					</div>
                    					<br>
								<div class="form-group">
									<label for="exampleInputFile">Image File</label>
									<input type="file" name="bimage2" class="form-control" id="exampleInputFile">
									<input type="hidden" name="oldimg2" value="<?= $brec['image']; ?>">
									<p class="help-block">Image dimension must be 1920 X 400 & must be jpg format</p>
									<img src="../uploads/home_extra/<?= $brec['image']; ?>" style="width:30%;">
								</div>
								</div>
								<div class="col-lg-12">
								<div class="panel-heading bg-dark text-light">
            						<h4 class="panel-title"> Edit Tranding Text</h4>
            					</div>
            					<br>
								<div class="form-group">
									<label for="banner"> Enter Title</label>
									<input type="text" name="pro_title" class="form-control" id="" value="<?= $brec['pro_title']; ?>">
								</div>
								<div class="form-group">
									<label for="banner"> Enter Subtitle</label>
									<input type="text" name="pro_subtitle" class="form-control" id="" value="<?= $brec['pro_subtitle']; ?>">
								</div>
								
								<div class="form-group">
									<label for="exampleInputFile">Image File</label>
									<input type="file" name="p_bimage2" class="form-control" id="exampleInputFile">
									<input type="hidden" name="p_oldimg2" value="<?= $brec['p_image']; ?>">
									<p class="help-block">Image dimension must be 1920 X 400 & must be jpg format</p>
									<img src="../uploads/home_extra/<?= $brec['p_image']; ?>" style="width:30%;">
								</div>
								</div>
								
								<div class="col-lg-6 d-none">
								<div class="panel-heading bg-dark text-light">
            						<h4 class="panel-title"> Edit Service Text</h4>
            					</div>
            					<br>
								<div class="form-group">
									<label for="banner"> Enter Title</label>
									<input type="text" name="srv_title" class="form-control" id="" value="<?= $brec['srv_title']; ?>">
								</div>
								<div class="form-group">
									<label for="banner"> Enter Subtitle</label>
									<input type="text" name="srv_subtitle" class="form-control" id="" value="<?= $brec['srv_subtitle']; ?>">
								</div>
								</div>
								
								<div class="col-lg-6 d-none">
								<div class="panel-heading bg-dark text-light">
            						<h4 class="panel-title"> Edit Turnkey Text</h4>
            					</div>
            					<br>
								<div class="form-group">
									<label for="banner"> Enter Title</label>
									<input type="text" name="turn_title" class="form-control" id="" value="<?= $brec['turn_title']; ?>">
								</div>
								<div class="form-group">
									<label for="banner"> Enter Subtitle</label>
									<input type="text" name="turn_subtitle" class="form-control" id="" value="<?= $brec['turn_subtitle']; ?>">
								</div>
								</div>
								
								<div class="col-lg-6 d-none">
								<div class="panel-heading bg-dark text-light">
            						<h4 class="panel-title"> Edit Work Proccess Text</h4>
            					</div>
            					<br>
            					
								<div class="form-group">
									<label for="banner"> Enter Title</label>
									<input type="text" name="work_title" class="form-control" id="" value="<?= $brec['work_title']; ?>">
								</div>
								
								<div class="form-group">
									<label for="banner"> Enter Subtitle</label>
									<input type="text" name="work_subtitle" class="form-control" id="" value="<?= $brec['work_subtitle']; ?>">
								</div>
								</div>
								
								
								<div class="col-lg-12">
								<div class="panel-heading bg-dark text-light">
            						<h4 class="panel-title"> Edit Testimonials Text</h4>
            					</div>
            					<br>
								
								
								<div class="form-group">
									<label for="banner"> Enter Title</label>
									<input type="text" name="test_title" class="form-control" id="" value="<?= $brec['test_title']; ?>">
								</div>
								
								<div class="form-group">
									<label for="banner"> Enter Subtitle</label>
									<input type="text" name="test_subtitle" class="form-control" id="" value="<?= $brec['test_subtitle']; ?>">
								</div>
								</div>
								
								
								<div class="col-lg-6 d-none">
								<div class="panel-heading bg-dark text-light">
            						<h4 class="panel-title"> Edit Client Text</h4>
            					</div>
            					<br>
								
								
								<div class="form-group">
									<label for="banner"> Enter Title</label>
									<input type="text" name="blog_title" class="form-control" id="" value="<?= $brec['blog_title']; ?>">
								</div>
								
								<div class="form-group">
									<label for="banner"> Enter Subtitle</label>
									<input type="text" name="blog_subtitle" class="form-control" id="" value="<?= $brec['blog_subtitle']; ?>">
								</div>
								</div>
								</div>
								
							</div>
							<!-- /.box-body -->

							<div class="box-footer">
								<button type="submit" name="update" class="btn btn-primary">Click Here To Update</button>
								<button type="reset" name="reset" class="btn btn-danger">Reset</button>
								<!--<button type="button" onclick="myFunction()" class="btn btn-warning">Seo tools</button>-->
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
	<!-- begin scroll to top btn -->
	<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

	<?php require("includes/footer.php"); ?>

	<script>
		$(document).ready(function() {
			App.init();
			initSample();
			CKEDITOR.replace('editor1', {
				filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
			});
			CKEDITOR.replace('editor2', {
				filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
			});
				CKEDITOR.replace('editor3', {
				filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
			});
				CKEDITOR.replace('editor4', {
				filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
			});
		});
	</script>

	<script>
		function myFunction() {
			var x = document.getElementById("myDIV");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>
	<script>
		function myGetlink() {
			var x = document.getElementById("myIMG");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>

</body>

</html>