<?php
require('checksession.php');
@extract($_REQUEST);
include '../inc/function.php';
if (isset($_POST['Dectivate']) && $bb != '') {
	foreach ($bb as $act) {
		mysqli_query($conn, "update tbl_size set status='0' where id='$act'");
	}
}
if (isset($_POST['Activate']) && $bb != '') {
	foreach ($bb as $act) {
		mysqli_query($conn, "update tbl_size set status='1' where id='$act'");
	}
}
if (isset($_POST['Delete']) && $bb != '') {
	foreach ($bb as $act) {
		mysqli_query($conn, "delete from tbl_size where id='$act'");
	}
}


$frm = $_REQUEST['edit'];
if(isset($_POST['updateskin'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);

	$query = mysqli_query($conn, "UPDATE `tbl_size` SET `name`='$name' WHERE `id`='$frm'");
	if ($query == true) {
		$_SESSION['success'] = "Size Updated successfully";
		 header("refresh:3;url=manage-size.php");
	} else {
		$_SESSION['error'] = "Something went wrong. Please try again";
	}
}


if (isset($_POST['submitskin'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	

	$query = mysqli_query($conn, "INSERT INTO `tbl_size`(`name`,`status`) VALUES ('$name','1')");
	if ($query == true) {
		$_SESSION['success'] = "New Size added successfully";
		header("Refresh:3");	
	} else {
		$_SESSION['success'] = "Something went wrong. Please try again";
		// header("Refresh:3");
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<?php require('includes/head.php'); ?>
<style>
	.simplecolorpicker.icon,
	.simplecolorpicker span.color {
		display: inline-block;
		cursor: pointer;
		border: 10px solid transparent;
	}
</style>

<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade in page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<?php require('includes/header.php'); ?>
		<!-- begin #sidebar -->
		<?php require('includes/left.php'); ?>
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
				<li class="breadcrumb-item active">Size</li>
			</ol>
			<!-- begin page-header -->
			<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Size </h1>
			<!-- begin row -->
			<div class="row">
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
							<h4 class="panel-title">Add Size</h4>
						</div>
						<!-- end panel-heading -->

						<!-- begin panel-body -->
						<div class="panel-body">
							<?php if (isset($_GET['edit'])) { ?>
								<?php
								$bdata = mysqli_query($conn, "SELECT * FROM `tbl_size` where `id`='$frm'");
								$brec = mysqli_fetch_array($bdata);
								?>
								<form role="form" method="POST" enctype="multipart/form-data">
									<div class="box-body">
										<div class="row">
											<div class="form-group col-12">
												<label>ENTER SIZE NAME</label>
												<input type="text" name="name" class="form-control" placeholder="Enter Size Type" required="" value="<?= $brec['name']; ?>">
											</div>
										</div>
									</div>
									<!-- /.box-body -->
									<div class="box-footer">
										<button type="submit" name="updateskin" class="btn btn-primary">Click To Update Data</button>
										<button type="reset" name="reset" class="btn btn-danger">Reset</button>
									</div>
								</form>
							<?php } else { ?>
								<form role="form" method="POST" enctype="multipart/form-data">
									<div class="box-body">
										<div class="row">
											<div class="form-group col-12">
												<label>ENTER SIZE NAME</label>
												<input type="text" name="name" class="form-control" placeholder="Enter Size Name" required="">
											</div>
										</div>
									</div>
									<!-- /.box-body -->
									<div class="box-footer">
										<button type="submit" name="submitskin" class="btn btn-primary">Click To Save Data</button>
										<button type="reset" name="reset" class="btn btn-danger">Reset</button>
									</div>
								</form>
							<?php } ?>
						</div>
						<!-- end panel-body -->
					</div>
					<!-- end panel -->
				</div>

				<!-- begin col-12 -->
				<div class="col-lg-12">
					<!-- begin panel -->
					<div class="panel panel-inverse">
						<!-- begin panel-heading -->
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-refresh"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Manage Size </h4>
						</div>
						<!-- end panel-heading -->
						<form name="myform" method="post" action="">
							<!-- begin panel-body -->
							<div class="panel-body">
								<div class="table-responsive">
									<table id="data-table-responsive" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th width="1%">No</th>
												<th class="text-nowrap">Size Name</th>
												<th width="1%">Status</th>
												<th width="1%">Edit</th>
												<th width="1%">Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$mqry = "select * from tbl_size order by id desc";
											$count = 1;
											$fetch = mysqli_query($conn, $mqry);
											while ($web = mysqli_fetch_array($fetch)) {
											?>
												<tr class="odd gradeX">
													<td width="1%" class="f-s-600 text-inverse"><?= $count; ?></td>
													<td style="font-weight:700; color:#000;"><?= $web['name']; ?></td>
													<td>
														<div class="switcher">
															<input type="checkbox" onClick="updateId('<?php echo $web['id']; ?>')" name="switcher_checkbox_1" id="switcher_checkbox_<?php echo $count; ?>" <?php if ($web['status'] == '1') { echo "checked"; } else { } ?> value="1">
															<label for="switcher_checkbox_<?php echo $count; ?>"></label>
														</div>
													</td>
													<td>
														<a href="manage-size.php?edit=<?php echo $web['id']; ?>" class='label label-sm label-primary' data-toggle="tooltip" title="Edit Size"><i class="fa fa-edit"></i> Edit</a>
													</td>
													<td>
														<a href="delete/size.php?bid=<?php echo $web['id']; ?>" onClick="if(confirm('Are You Sure Want To Delete This Record')){ return true;} else { return false; }" data-toggle="tooltip" title="Delete Size" class='label label-sm label-danger'><i class="fa fa-trash"></i> Delete</a>
													</td>
												</tr>
											<?php $count++;
											} ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- end panel-body -->
						</form>
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
	<?php require('includes/footer.php'); ?>
	<script>
		$(document).ready(function() {
			App.init();
			TableManageResponsive.init();
		});
	</script>
	<script>
		function updateId(id) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					//alert(xmlhttp.responseText);
				}
			};
			xmlhttp.open("GET", "status/size.php?id=" + id, true);
			xmlhttp.send();
		}
	</script>
</body>

</html>