<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require('checksession.php'); 
require '../inc/function.php';     

if(isset($_POST['submit']))
{   
    $name = mysqli_real_escape_string($conn,$_POST['name']); 
    $industry = mysqli_real_escape_string($conn,$_POST['industry']); 
    $heading = mysqli_real_escape_string($conn,$_POST['heading']); 
     $producturl = mysqli_real_escape_string($conn, $_POST['url']);
    $purl = str_replace(array('\'', '"', ' ', ',', ';', '.', '!', '@', '(', ')', '(', '#', '^', '*', ',', '/', '&', '_', '$', '--', '-', '<', '>', '%','=',':','?','[',']','~','+','`','{','}','|'), '-', $producturl);
    $prourl = strtolower($purl);
	$metatag = mysqli_real_escape_string($conn,$_POST['metatag']); 
	$keyword = mysqli_real_escape_string($conn,$_POST['keyword']); 
	$metadesc = mysqli_real_escape_string($conn,$_POST['metadescription']); 
	$position = mysqli_real_escape_string($conn,$_POST['position']); 
	$shortdescription = mysqli_real_escape_string($conn,$_POST['short_desc']);	
	$description = mysqli_real_escape_string($conn,$_POST['description']); 
	$ispage = mysqli_real_escape_string($conn,$_POST['radio_css_inline']); 
	$status = mysqli_real_escape_string($conn,$_POST['status']); 
	$alt = mysqli_real_escape_string($conn,$_POST['alt']);
	$alt2 = mysqli_real_escape_string($conn,$_POST['alt2']);
	$alt1 = mysqli_real_escape_string($conn,$_POST['alt1']);
	$bimage=$_FILES['bimage']['name'];
	if($bimage!='')
	{
		$bimage=time()."_".$bimage;
		move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/service/".$bimage);
	}
	else{
		$bimage='';
	}
	
	
	$bimage1=$_FILES['bimage1']['name'];
	if($bimage1!='')
	{
		$bimage1=time()."_".$bimage1;
		move_uploaded_file($_FILES["bimage1"]["tmp_name"], "../uploads/service/".$bimage1);
	}
	else{
		$bimage1='';
	}
	
	
	$bimage2=$_FILES['bimage2']['name'];
	if($bimage2!='')
	{
		$bimage2=time()."_".$bimage2;
		move_uploaded_file($_FILES["bimage2"]["tmp_name"], "../uploads/service/".$bimage2);
	}
	else{
		$bimage2='';
	}
	
	
		$broadimage=$_FILES['bnr_broadimage']['name'];
	if($broadimage!='')
	{
		$broadimage=time()."_".$broadimage;
		move_uploaded_file($_FILES["bnr_broadimage"]["tmp_name"], "../uploads/service/".$broadimage);
	}
	else{
		$broadimage='';
	}
	$query=mysqli_query($conn,"INSERT INTO `tbl_service`(`name`,`industry`,`heading`, `title`, `keyword`, `metadesc`,`url`, `sort`, `image`,`image1`,`image2`,`alt`,`alt1`,`alt2`,`broadimage`, `desc`,`short_desc`, `status`,`is_page`) VALUES ('$name','$industry','$heading','$metatag','$keyword','$metadesc','$prourl','$position','$bimage','$bimage1','$bimage2','$alt','$alt1','$alt2','$broadimage','$shortdescription','$description','$status','$ispage')");
	if($query==true)
	{
	$_SESSION['success']="Service inserted successfully";
	header("refresh:3;url=manage-service.php");	
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
				<li class="breadcrumb-item"><a href="javascript:;">Service Management</a></li>
				<li class="breadcrumb-item active">Add Service</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
				<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Service</h1>
		
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
							<h4 class="panel-title">Add Service</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
                  <div class="row">
                      <div class="col-md-12 d-none">
		        <div class="form-group">
                  <label for="heading">Select Category</label>
                  <select name="industry" id="category" onChange="getdistrict(this.value);" class="form-control">
                      <option value="">Choose One</option>
                    <?php
                      $sql2=mysqli_query($conn,"select * from tbl_service_category where status='1'");
                   
                      if(mysqli_num_rows($sql2)>0)
                      {
                        while($row=mysqli_fetch_assoc($sql2))
                        {
                         $caid= $row['id'];
                         $catid= $row['name'];
                          ?>
                          <option value="<?= $caid; ?>"><?php echo $row['name'];?></option>
                          <?php
                        }
                      }
                       
                    ?>
                  </select>
                </div>
                </div>
				<div class="col-lg-6">
                <div class="form-group">
                  <label for="heading">Service Name</label>
                  <input type="text"  name="name" class="form-control" id="heading" placeholder="Enter Service Name" required>
                </div>
                </div>
				<div class="col-lg-6">
                <div class="form-group">
                    <label for="heading">Service URL<code>Same as Service name & avoid Special Characters</code></label>
                    <input type="text" name="url" class="form-control" id="url" placeholder="Enter Service Url" required>
                </div>
                </div>
				<div class="col-lg-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Image File</label>
                  <input type="file" name="bimage" class="form-control" id="exampleInputPassword1" >
                  <p class="help-block">Image dimension must be 1060 × 594 & must be jpg format</p>
                </div>
                </div>
				<div class="col-lg-4">
                <div class="form-group">
						<label for="exampleInputPassword1">Image Alt</label>
						<input type="text" name="alt" class="form-control" id="exampleInputPassword1" placeholder="Enter Image Alt">
				</div>
				</div>
				<div class="col-lg-4">
		        <div class="form-group">
                  <label for="exampleInputFile">Breadcrumb Image</label>
                  <input type="file" name="bnr_broadimage" class="form-control" id="exampleInputFile">
                  <p class="help-block">Image dimension must be 1920 X 336 & must be webp format</p>
                </div>
                </div>
                <div class="col-lg-12 d-none">
                  <div class="form-group">
                  <label for="banner">Heading</label>
                  <input type="text" name="heading" class="form-control">
                </div>
                </div>
                <div class="col-lg-3">
                <div class="form-group">
                  <label for="bannerlink">Image File Get in Touch</label>
                  <input type="file"  name="bimage1"  class="form-control" id="bannerlink">
                  <input type="hidden" name="oldimg1">
                  <p class="help-block">Image dimension must be 410 X 460 & must be jpg format</p>
                </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                  <label for="banner">Alt</label>
                  <input type="text" name="alt1" class="form-control">
                </div>
                </div>
                <div class="col-lg-3">
                <div class="form-group">
                  <label for="bannerlink">Icon Image File</label>
                  <input type="file"  name="bimage2"  class="form-control" id="bannerlink">
                  <p class="help-block">Image dimension must be 64 X 64 & must be jpg format</p>
                </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                  <label for="banner">Icon Alt</label>
                  <input type="text" name="alt2" class="form-control">
                </div>
                </div>
                <div class="col-lg-12">
                 <div class="form-group">
                  <label>Short Description</label>
                  <textarea  name="short_desc" class="form-control" id="editor1" placeholder="Enter text ..." rows="6"></textarea>
                </div>
                </div>
                <div class="col-lg-12">
                 <div class="form-group">
                  <label>Description</label>
                  <textarea  name="description" class="form-control" id="editor2" placeholder="Enter text ..." rows="12"></textarea>
                </div>
                </div>
                <div class="col-lg-12">
				<div class="form-group">
					<label for="exampleInputPassword1">Sort Number</label>
					<input type="number" name="position" class="form-control" id="exampleInputPassword1" placeholder="1-10">
				</div>
				</div>	
				</div>	
                <div class="form-group row m-b-10 d-none">
					<label class="col-md-1 col-form-label">Menu For :-</label>
					<div class="col-md-9">
						<div class="radio radio-css radio-inline">
							<input type="radio" name="radio_css_inline" id="inlineCssRadio1" value="Submenu" checked>
							<label for="inlineCssRadio1">Submenu</label>
						</div>
						<div class="radio radio-css radio-inline">
							<input type="radio" name="radio_css_inline" id="inlineCssRadio2" value="Newpage">
							<label for="inlineCssRadio2">New Page</label>
						</div>
					</div>
				</div>
            
            <div class="Newpage box" style="display: none;">

               
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
 
				  
				<div id="dvPassport" style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;"> 
                  <div class="form-group">
                    <label for="metatag">Meta Title</label>
                    <input type="text" name="metatag" id="metatag" placeholder="Meta Title" class="form-control" >
                  </div>
                 
                  <div class="form-group">
                    <label for="keyword">Meta Keyword</label>
                    <textarea name="keyword" id="keyword" placeholder="Meta Keyword" class="form-control" ></textarea>
                 </div>
                 
                  <div class="form-group">
                    <label for="metadescription">Meta Description</label>
                    <textarea name="metadescription" id="metadescription" placeholder="Meta Description" class="form-control" ></textarea>
                 </div> 
                 </div>  <br/>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Click Here To Submit</button>
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
});
</script>
<script>
    window.onload = function() {
    var src = document.getElementById("heading"),
        dst = document.getElementById("url");
    src.addEventListener('input', function() {
        dst.value = src.value;
    });
  }

</script>
<!------------------>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>
<!----Seo tool----->	
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
<!----Get Image----->
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
<!----End Get Image----->	
</body>
</html>
