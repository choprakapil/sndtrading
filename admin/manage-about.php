<?php
require('checksession.php');
require('../inc/function.php');

$bdata = mysqli_query($conn, "SELECT * FROM `tbl_about`");
$brec = mysqli_fetch_array($bdata);
if (isset($_POST['update'])) {
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$desc = mysqli_real_escape_string($conn, $_POST['desc']);
	$desclong = mysqli_real_escape_string($conn, $_POST['desclong']);	
    $alt1 = mysqli_real_escape_string($conn,$_POST['alt1']);
    $alt2 = mysqli_real_escape_string($conn,$_POST['alt2']);
	$metatag = mysqli_real_escape_string($conn, $_POST['metatag']);
	$keyword = mysqli_real_escape_string($conn, $_POST['keyword']);
	$metadesc = mysqli_real_escape_string($conn, $_POST['metadescription']);

	$old3 = mysqli_real_escape_string($conn, $_POST['oldimg3']);	
	$old2 = mysqli_real_escape_string($conn, $_POST['oldimg2']);
	$old11 = mysqli_real_escape_string($conn, $_POST['oldimg11']);

	$bimage11 = $_FILES['bimage11']['name'];
	if ($bimage11 != "") {
		$bimage11 = time() . "_" . $bimage11;
		@unlink("../uploads/about/" . $old11);
		move_uploaded_file($_FILES["bimage11"]["tmp_name"], "../uploads/about/" . $bimage11);
	} else {
		$bimage11 = $brec['ab_image'];
	}
	
		$bimage2 = $_FILES['bimage2']['name'];
	if ($bimage2 != "") {
		$bimage2 = time() . "_" . $bimage2;
		@unlink("../uploads/about/" . $old2);
		move_uploaded_file($_FILES["bimage2"]["tmp_name"], "../uploads/about/" . $bimage2);
	} else {
		$bimage2 = $brec['ab_image2'];
	}

    $broadimage2 = $_FILES['broadimage']['name'];
        if ($broadimage2 != "") {
            $broadimage2 = time() . "_" . $broadimage2;
            @unlink("../uploads/about/" . $old3);
            move_uploaded_file($_FILES["broadimage"]["tmp_name"], "../uploads/about/" . $broadimage2);
        } else {
            $broadimage2 = $brec['ab_broadimage'];
        }
	$query = mysqli_query($conn, "UPDATE `tbl_about` SET `ab_title`='$title',`ab_desc`='$desc',`ab_desclong`='$desclong',`meta_title`='$metatag',`meta_keyword`='$keyword',`meta_desc`='$metadesc',`ab_image`='$bimage11',`ab_alt1`='$alt1',`ab_image2`='$bimage2',`ab_alt2`='$alt2',`ab_broadimage`='$broadimage2'");
	if ($query == true) {
		$_SESSION['success'] = "About Updated Successfully";
		header("refresh:3;url=manage-about.php");
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
			<li class="breadcrumb-item"><a href="javascript:;">About Us Management</a></li>
			<li class="breadcrumb-item active">Edit About Us</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage About Us</h1>
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
						<h4 class="panel-title"> Edit About Us</h4>
					</div>
					<!-- begin panel-body -->
					<div class="panel-body">
						<form role="form" method="POST" enctype="multipart/form-data">
							<div class="box-body">

								<div class="form-group">
									<label for="banner"> Enter About Us Title</label>
									<input type="text" name="title" class="form-control" id="" value="<?= $brec['ab_title']; ?>">
								</div>
								<div class="row">
									<div class="col-sm-12">
								<div class="form-group">
									<label for="bannerlink"> Enter About Us Short Description </label>
									<textarea name="desc" id="editor1" class="form-control" rows="3"><?= $brec['ab_desc']; ?></textarea>
								</div>
                                </div>
								<div class="col-sm-12">
								<div class="form-group">
									<label for="bannerlink"> Enter About Us Long Description </label>
									<textarea name="desclong" id="editor2" class="form-control" rows="3"><?= $brec['ab_desclong']; ?></textarea>
								</div>
                                </div>
                                </div>
								 <div class="row">
                                <div class="col-6">
                                <div class="form-group">
									<label for="exampleInputFile">Image File 1</label>
									<input type="file" name="bimage11" class="form-control" id="exampleInputFile">
									<input type="hidden" name="oldimg11" value="<?= $brec['ab_image']; ?>">
									<p class="help-block">Image dimension must be 290 × 422 px & must be jpg format</p>
									<img src="../uploads/about/<?= $brec['ab_image']; ?>" style="width:30%; height:100px">
								</div>
								</div>
								 <div class="col-6">
                                	<div class="form-group">
            							<label for="exampleInputPassword1">Image File 1 Alt</label>
            							<input type="text" name="alt1" class="form-control" id="exampleInputPassword1" value="<?= $brec['ab_alt1']; ?>" placeholder="Enter Alt 1">
            						</div>
								</div>
								 <div class="col-3 d-none">
                                <div class="form-group">
									<label for="exampleInputFile">Image File 2</label>
									<input type="file" name="bimage2" class="form-control" id="exampleInputFile">
									<input type="hidden" name="oldimg2" value="<?= $brec['ab_image2']; ?>">
									<p class="help-block">Image dimension must be 290 × 422 & must be jpg format</p>
									<img src="../uploads/about/<?= $brec['ab_image2']; ?>" style="width:30%; height:100px">
								</div>
								</div>

								<div class="col-3 d-none">
                                	<div class="form-group">
            							<label for="exampleInputPassword1">Image File 2 Alt</label>
            							<input type="text" name="alt2" class="form-control" id="exampleInputPassword1" value="<?= $brec['ab_alt2']; ?>" placeholder="Enter Alt 2">
            						</div>
								</div>
								 <div class="col-12">
                                <div class="form-group">
									<label for="exampleInputFile">Breadcrumb Image File</label>
									<input type="file" name="broadimage" class="form-control" id="exampleInputFile">
									<input type="hidden" name="oldimg3" value="<?php echo $brec['ab_broadimage']; ?>" >
									<p class="help-block">Image dimension must be 1920 × 336 px & must be jpg format</p>
									<img src="../uploads/about/<?php echo $brec['ab_broadimage']; ?>" style="width:30%; height:100px">
								</div>
								</div>
								</div>
								
								<div id="myDIV" style="display:none;border: 1px solid #000; padding: 9px;">
									<div class="form-group">
										<label for="metatag">Meta Title</label>
										<input type="text" name="metatag" id="metatag" placeholder="Meta Title" class="form-control" value="<?= $brec['meta_title']; ?>">
									</div>

									<div class="form-group">
										<label for="keyword">Meta Keyword</label>
										<textarea name="keyword" id="keyword" placeholder="Meta Keyword" class="form-control"><?= $brec['meta_keyword']; ?></textarea>
									</div>

									<div class="form-group">
										<label for="metadescription">Meta Description</label>
										<textarea name="metadescription" id="metadescription" placeholder="Meta Description" class="form-control"><?= $brec['meta_desc']; ?></textarea>
									</div>
								</div><br>



							</div>
							<!-- /.box-body -->

							<div class="box-footer">
								<button type="submit" name="update" class="btn btn-primary">Click Here To Update</button>
								<button type="reset" name="reset" class="btn btn-danger">Reset</button>
								<button type="button" onclick="myFunction()" class="btn btn-warning">Seo tools</button>
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
			CKEDITOR.replace('editor5', {
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