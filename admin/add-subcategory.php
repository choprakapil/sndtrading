<?php
require('checksession.php'); 
require('../inc/function.php');    

if(isset($_POST['submit']))
{   
	$category = mysqli_real_escape_string($conn,$_POST['category']); 
	$prourls = mysqli_real_escape_string($conn,$_POST['prourl']);
	$prourrl = str_replace(array( '\'', '"', ' ', ',' , ';', '*', ',', '/', '&', '_', '$', '--', '-', '<', '>' ), '-', $prourls);
	$prourl = strtolower($prourrl);
    $heading = mysqli_real_escape_string($conn,$_POST['heading']); 
	$position = mysqli_real_escape_string($conn,$_POST['position']); 
	$status = mysqli_real_escape_string($conn,$_POST['status']); 
	
	if($_FILES['image']['name']!=''){
	    $image = time().uniqid().$_FILES['image']['name'];
	    move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/subcategory/'.$image);
	}else{
	    $image = '';
	}

	$query=mysqli_query($conn,"INSERT INTO `tbl_subcategory`(`category_id`, `image`, `name`, `sort`, `status`,`url`) VALUES ('$category', '$image' ,'$heading','$position','$status','$prourl')");
	if($query==true)
	{
	$_SESSION['success']="Sub-category inserted successfully";
	header("refresh:3;url=manage-subcategory.php");	
	}
	else 
	{
	$_SESSION['error']="Something went wrong. Please try again";	
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
				<li class="breadcrumb-item"><a href="javascript:;">Subcategory Management</a></li>
				<li class="breadcrumb-item active">Add Subcategory</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Manage Subcategory</h1>
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
							<h4 class="panel-title">Add  Subcategory</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
								<div class="box-body">
									<div class="form-group">
										<label for="heading">Select Category</label>
										<select name="category" id="category" class="form-control">
											<?php
												echo '<option value="">Select Category</option>';
												$get_category_data = mysqli_query($conn,"SELECT * FROM `tbl_category` where `status`='1'");
												if(mysqli_num_rows($get_category_data)>0)
												{
													while($category = mysqli_fetch_assoc($get_category_data))
													{
														?><option value="<?= $category['id']; ?>"><?= $category['name'];?></option><?php
													}
													
												}
											?>
										</select>
									</div>
								
									<div class="form-group">
										<label for="heading">Subcategory Name</label>
										<input type="text"  name="heading" class="form-control" id="name" placeholder="Enter your page title here...">
									</div>

									<div class="form-group">
										<label for="heading">Subcategory URL<code>Same as Subcategory name & avoid Special Characters</code></label>
										<input type="text"  name="prourl" class="form-control" id="url" placeholder="Enter Subcategory Url">
									</div>
									
									<div class="form-group">
										<label for="heading">Subcategory Image<code>[550 x 350]px</code></label>
										<input type="file"  name="image" class="form-control">
									</div>
									
									<div class="form-group">
										<label for="exampleInputPassword1">Sort Number</label>
										<input type="number" name="position" class="form-control" id="exampleInputPassword1" placeholder="1-10">
									</div>
									
									<div class="form-group row m-b-10">
										<label class="col-md-1 col-form-label">Status :-</label>
										<div class="col-md-9">
											<div class="radio radio-css radio-inline">
												<input type="radio" name="status" id="optionsRadios4" value="1" checked>
												<label for="optionsRadios4">Active</label>
											</div>
											<div class="radio radio-css radio-inline">
												<input type="radio" name="status" id="optionsRadios3" value="0">
												<label for="optionsRadios3">Inactive</label>
											</div>
										</div>
									</div>
								
								</div>
								<!-- /.box-body -->

								<div class="box-footer">
									<button type="submit" name="submit" class="btn btn-primary">Click Here To Submit</button>
									<input id="reset" type="reset" class="btn btn-danger" value="reset" name="reset" /> 
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
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
<?php require("includes/footer.php"); ?>
	
<script>
	$(document).ready(function() {
		App.init();
		CKEDITOR.replace( 'editor1' );
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


	$('#brand').change(function(){
		let brand_id = $(this).val();
		
		$.ajax({
			type : "POST",
			url : 'ajax/category.php',
			data : { brand_id },
			success : function(response){
				$('#category').html(response);
			}
		});	
	});

</script>
<!----End Get Image----->	
</body>
</html>
