<?php
//  error_reporting(E_ALL);
//  ini_set("display_errors", 1);
require('checksession.php');
require('../inc/function.php');

$id = $_GET['id'];

$edit = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_job_applications` WHERE `id` = '$id'"));
?>
<!DOCTYPE html>
<html lang="en">
<?php require("includes/head.php"); ?>

<body>
	<style>
		.switcher label:after {
			content: '';
			height: 15px;
			width: 15px;
		}

		.switcher label:before {
			width: 36px;
			height: 19px;
		}
	</style>
	<!-- begin #page-container -->
	<?php require("includes/header.php"); ?>
	<!-- end #header -->
	<!-- begin #sidebar -->
	<?php require("includes/left.php"); ?>

	<!-- begin #content -->
	<div id="content" class="content">
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
			<li class="breadcrumb-item"><a href="javascript:;">View Enquiry</a></li>
			<li class="breadcrumb-item"><a href="javascript:;">View Enquiry</a></li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">View Enquiry</h1>
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
						<h4 class="panel-title">View Enquiry</h4>
					</div>
					<!-- end panel-heading -->

					<!-- begin panel-body -->
					<div class="panel-body">
						<form role="form" method="POST" enctype="multipart/form-data">
							<div class="box-body">

								<div class="row">
								    <div class="col-sm-6">
										<div class="form-group">
											<label for="bannerlink">Name</label>
											<input type="text" name="name" class="form-control" id="bannerlink" value="<?=$edit['name']?>" readonly>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="bannerlink">Phone</label>
											<input type="text" name="phone" class="form-control" id="bannerlink" value="<?=$edit['mobile']?>" readonly>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="bannerlink">Email</label>
											<input type="text" name="email" class="form-control" id="bannerlink" value="<?=$edit['email']?>" readonly>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="bannerlink">Applied For</label>
											<input type="text" name="phone" class="form-control" id="bannerlink" value="<?=$edit['applying_for']?>" readonly>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="bannerlink">About</label>
											<input type="text" name="phone" class="form-control" id="bannerlink" value="<?=$edit['about']?>" readonly>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="bannerlink">Location</label>
											<input type="text" name="phone" class="form-control" id="bannerlink" value="<?=$edit['location']?>" readonly>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="bannerlink">Date</label>
											<input type="text" name="phone" class="form-control" id="bannerlink" value="<?=$edit['date']?>" readonly>
										</div>
									</div>
									<?php if($edit['resume'] != ''){ ?>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="bannerlink">Resume</label>
											<a href="<?=$edit['resume']?>">View Resume</a>
										</div>
									</div>
									<?php } ?>
								</div>
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
			TableManageResponsive.init();
		});
	</script>
	<!------------------------------>
	<!--------------------------------------->


</body>

</html>