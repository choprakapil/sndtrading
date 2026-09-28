<?php
require('checksession.php'); 
include '../inc/function.php';     
if(isset($_POST['submit']))
{  
    $category = mysqli_real_escape_string($conn,$_POST['category']);
	$position = mysqli_real_escape_string($conn,$_POST['position']);
	$status = mysqli_real_escape_string($conn,$_POST['status']);
	
	    foreach($_FILES['pimages']['tmp_name'] as $key => $tmp_name )
        {
               $file_name = time()."_".$_FILES['pimages']['name'][$key];
               $file[]=$file_name;
               $file_size =$_FILES['pimages']['size'][$key];
               $file_tmp =$_FILES['pimages']['tmp_name'][$key];
               $file_type=$_FILES['pimages']['type'][$key];    
              
               $desired_dir="../uploads/industry/";
               if(is_dir($desired_dir)==false)
               {
                mkdir("$desired_dir", 0700);        // Create directory/path if it does not exist
               }
               move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
        }
        $pimages=implode(",",$file);
        
        $images=explode(",",$pimages);
        for($i=0;$i<count($images);$i++)
        {
            $query=mysqli_query($conn,"INSERT INTO `tbl_industry`(`glry_category`, `glry_image`, `glry_status`, `glry_sort`) VALUES ('$category','$images[$i]','$status','$position')");
            	$_SESSION['success']="Gallery Inserted successfully";
        }
	
		if($query==true)
		{
		$_SESSION['success']="Gallery Inserted successfully";
		header("refresh:3;url=manage-gallery.php");	
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
	
	
	<!-- begin #page-container -->
	<?php require("includes/header.php"); ?>
	<!-- end #header -->	
	<!-- begin #sidebar -->
	<?php require("includes/left.php"); ?>
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Gallery Management</a></li>
				<li class="breadcrumb-item active">Add Gallery</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Manage Gallery <small></small></h1>
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
							<h4 class="panel-title">Add Gallery</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
       
                <div class="form-group">
                    <label for="heading">Select Category</label>
                      <select name="category" class="form-control" onchange="test(this.value)" required>
                        <option >Select Category</option>
                              <?php
                                $cdata=mysqli_query($conn,"SELECT * FROM `tbl_gallery_category` WHERE  `glry_status`='1' ");
                                while($crec=mysqli_fetch_array($cdata))
                                {
                              ?>    
                                <option value="<?= $crec['glry_id']; ?>"><?= $crec['glry_title']; ?></option>
                              <?php 
                              } 
                              ?>      
                      </select>
                </div>
        
            
                <div class="form-group">
                    <label for="exampleInputPassword1">Sort Number</label>
                    <input type="number" name="position" class="form-control" id="exampleInputPassword1" placeholder="1-10">
                </div>  
                
                 <div class="form-group">
                  <label for="exampleInputPassword1">Image File</label>
                  <input type="file" name="pimages[]" class="form-control" id="exampleInputPassword1" multiple>
                  <p class="help-block">Image dimension must be 410 × 460 px & must be jpg format</p>
                </div>
                
                
                <div class="form-group">
                <input type="radio" value="1" id="optionsRadios3" name="status" checked>
                <label for="optionsRadios3">Active</label>
                <input type="radio" value="0" id="optionsRadios4" name="status">
                <label for="optionsRadios4">Inactive</label>
                </div>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Click Here To Submit</button>
                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
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
		CKEDITOR.replace( 'editor1' );
	});
</script>
<!------------------------>
<script>
function test(t)
{
  var obj=new XMLHttpRequest();
  obj.open("GET","ajax/subcategory.php?data="+t,true);
  obj.send();
  obj.onreadystatechange= function(){
    if(obj.readyState==4)
    {
      document.getElementById("sub").innerHTML=obj.responseText;
    }
  }
}
</script>
<!------------------------------>
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
