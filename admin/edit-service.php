<?php
require('checksession.php'); 
include '../inc/function.php';     

$b=$_REQUEST['bid'];
$bdata=mysqli_query($conn,"SELECT * FROM `tbl_service` where `id`='$b'");
$brec=mysqli_fetch_array($bdata);
 $bdata2=mysqli_query($conn,"SELECT * FROM `tbl_service_category` WHERE `status`='1' and `id`='$brec[industry]'");
 $brecc=mysqli_fetch_array($bdata2);
if(isset($_POST['update']))
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
  $status = mysqli_real_escape_string($conn,$_POST['status']); 
  $radio_css_inline = mysqli_real_escape_string($conn,$_POST['radio_css_inline']); 
  $old = mysqli_real_escape_string($conn,$_POST['oldimg']); 
   $old1 = mysqli_real_escape_string($conn,$_POST['oldimg1']); 
    $old2 = mysqli_real_escape_string($conn,$_POST['oldimg2']); 
  $oldbimg = mysqli_real_escape_string($conn,$_POST['oldbimg']);
  $alt = mysqli_real_escape_string($conn,$_POST['alt']); 
  $alt1 = mysqli_real_escape_string($conn,$_POST['alt1']); 
  $alt2 = mysqli_real_escape_string($conn,$_POST['alt2']); 
  
    $bimage=$_FILES['bimage']['name'];
    if($bimage!='')
    {
      $bimage=time()."_".$bimage;      
      @unlink("../uploads/service/".$old); 
      move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/service/".$bimage);

    }
    else{
      $bimage=$old;
    }
    
    $bimage1=$_FILES['bimage1']['name'];
    if($bimage1!='')
    {
      $bimage1=time()."_".$bimage1;      
      @unlink("../uploads/service/".$old1); 
      move_uploaded_file($_FILES["bimage1"]["tmp_name"], "../uploads/service/".$bimage1);

    }
    else{
      $bimage1=$old1;
    }
    
    $bimage2=$_FILES['bimage2']['name'];
    if($bimage2!='')
    {
      $bimage2=time()."_".$bimage2;      
      @unlink("../uploads/service/".$old2); 
      move_uploaded_file($_FILES["bimage2"]["tmp_name"], "../uploads/service/".$bimage2);

    }
    else{
      $bimage2=$old2;
    }
   
    $broadimage=$_FILES['broadimage']['name'];
    if($broadimage!='')
    {
      $broadimage=time()."_".$broadimage;      
      @unlink("../uploads/service/".$oldbimg); 
      move_uploaded_file($_FILES["broadimage"]["tmp_name"], "../uploads/service/".$broadimage);

    }
    else{
      $broadimage=$oldbimg;
    }
      $query=mysqli_query($conn,"UPDATE `tbl_service` SET `broadimage`='$broadimage',`alt`='$alt',`alt1`='$alt1',`alt2`='$alt2',`name`='$name',`industry`='$industry',`heading`='$heading',`url`='$prourl',`title`='$metatag', `keyword`='$keyword', `metadesc`='$metadesc', `sort`='$position', `image`='$bimage',`image1`='$bimage1', `image2`='$bimage2',`short_desc`='$shortdescription',`desc`='$description', `status`='$status',`is_page`='$radio_css_inline' WHERE `id`='$b'");
  
      if($query==true)
        {
    $_SESSION['success']="Service updated successfully";
    header("refresh:3;url=manage-service.php");    
        }
        else 
        {
        // Message for unsuccessfull insertion
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
				<li class="breadcrumb-item active">Edit Service</li>
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
							<h4 class="panel-title">Edit Service</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
             
               <div class="row">
                <div class="col-md-12 d-none">
                <div class="form-group">
                  <label for="heading">Select Service Category</label>
                  <select name="industry" id="category"  class="form-control">
                   
                    <?php
                       $sql1=mysqli_query($conn,"SELECT * FROM `tbl_service_category` WHERE `status`='1'");
                                    while($crec_1=mysqli_fetch_array($sql1))
                                    {
                                     
                                    if($crec_1['id']==$brec['industry'])
                                    {
                                    echo "<option value='$brecc[id]' selected> $brecc[name]</option>";
                                    }
                                    else
                                    {
                                    echo "<option value='$crec_1[id]'>$crec_1[name]</option>";
                                    }
                              } ?>  
                  </select>
                </div>
                </div>
                   <div class="col-lg-6">
                <div class="form-group">
                  <label for="heading">Service Name</label>
                  <input type="text"  name="name" class="form-control" id="heading" value="<?= $brec['name']; ?>">
                </div>
                </div>
                <div class="col-lg-6">
                 <div class="form-group">
                    <label for="heading">Service URL<code>Same as Service name & avoid Special Characters</code></label>
                    <input type="text" name="url" class="form-control" value="<?= $brec['url']; ?>" id="url" placeholder="Enter Service Url" required>
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                  <label for="bannerlink">Image File</label>
                  <input type="file"  name="bimage"  class="form-control" id="bannerlink">
                  <input type="hidden" name="oldimg"  value="<?= $brec['image']; ?>">
                  <img src="../uploads/service/<?= $brec['image']; ?>" width="20%" >
                  <p class="help-block">Image dimension must be 1060 × 594 px & must be jpg format</p>
                </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                  <label for="banner">Alt</label>
                  <input type="text" name="alt" class="form-control" value="<?= $brec['alt']; ?>">
                </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                  <label for="bannerlink">Breadcrumb Image File</label>
                  <input type="file"  name="broadimage"  class="form-control" id="bannerlink">
                  <input type="hidden" name="oldbimg"  value="<?= $brec['broadimage']; ?>">
                  <p class="help-block">Image dimension must be 1920 X 336 & must be jpg format</p>
                  <?php
                  if($brec['broadimage']>0){
                  ?>
                  <img src="../uploads/service/<?= $brec['broadimage']; ?>" width="80%" >
                <?php
                  }
                ?>
                </div>
                </div>
                <div class="col-lg-12 d-none">
                  <div class="form-group">
                  <label for="banner">Heading</label>
                  <input type="text" name="heading" class="form-control" value="<?= $brec['heading']; ?>">
                </div>
                </div>
                <div class="col-lg-3">
                <div class="form-group">
                  <label for="bannerlink">Image File Get in Touch</label>
                  <input type="file"  name="bimage1"  class="form-control" id="bannerlink">
                  <input type="hidden" name="oldimg1"  value="<?= $brec['image1']; ?>">
                  <img src="../uploads/service/<?= $brec['image1']; ?>" width="20%" >
                  <p class="help-block">Image dimension must be 410 X 460 & must be jpg format</p>
                </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                  <label for="banner">Alt</label>
                  <input type="text" name="alt1" class="form-control" value="<?= $brec['alt1']; ?>">
                </div>
                </div>
                <div class="col-lg-3">
                <div class="form-group">
                  <label for="bannerlink">Icon Image File</label>
                  <input type="file"  name="bimage2"  class="form-control" id="bannerlink">
                  <input type="hidden" name="oldimg2"  value="<?= $brec['image2']; ?>">
                  <img src="../uploads/service/<?= $brec['image2']; ?>" width="20%" >
                  <p class="help-block">Image dimension must be 64 X 64 & must be jpg format</p>
                </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                  <label for="banner">Alt</label>
                  <input type="text" name="alt2" class="form-control" value="<?= $brec['alt2']; ?>">
                </div>
                </div>
                <div class="col-lg-12">
                 <div class="form-group">
                  <label>Short Description</label>
                  <textarea  name="short_desc" class="form-control" id="editor1" placeholder="Enter text ..." rows="6"><?= $brec['short_desc']; ?></textarea>
                </div>
                </div>
                <div class="col-lg-12">
                 <div class="form-group">
                  <label>Description</label>
                  <textarea  name="description" class="form-control" id="editor2" placeholder="Enter text ..." rows="6"><?= $brec['desc']; ?></textarea>
                </div>
                </div>
                <div class="col-lg-12">
                	<div class="form-group">
					<label for="exampleInputPassword1">Sort Number</label>
					<input type="number" name="position" class="form-control" id="exampleInputPassword1" value="<?= $brec['sort']; ?>">
				</div>
              </div>
              </div>
                <div class="form-group row m-b-10 d-none">
                  <label class="col-md-1 col-form-label">Menu For :-</label>
                  <div class="col-md-9">
                    <div class="radio radio-css radio-inline">
                      <input type="radio" name="radio_css_inline" id="inlineCssRadio1" value="Submenu"  <?php if($brec['is_page']=="Submenu"){echo "checked"; } ?>>
                      <label for="inlineCssRadio1">Submenu</label>
                    </div>
                    <div class="radio radio-css radio-inline">
                      <input type="radio" name="radio_css_inline" id="inlineCssRadio2" value="Newpage" <?php if($brec['is_page']=="Newpage"){echo "checked"; } ?>>
                      <label for="inlineCssRadio2">New Page</label>
                    </div>
                  </div>
                </div>
              
              <div class="Newpage box">  

              </div>  

           

                <div class="form-group row m-b-10">
                  <label class="col-md-1 col-form-label">Status :-</label>
                  <div class="col-md-9">
                    <div class="radio radio-css radio-inline">
                      <input type="radio" name="status" id="optionsRadios4" value="1" <?php if($brec['status']=='1'){ echo 'checked';}?>>
                      <label for="optionsRadios4">Active</label>
                    </div>
                    <div class="radio radio-css radio-inline">
                      <input type="radio" name="status" id="optionsRadios3" value="0" <?php if($brec['status']=='0'){ echo 'checked';}?>>
                      <label for="optionsRadios3">Inactive</label>
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
              
              </div>
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
	initSample();
  defult();
CKEDITOR.replace('editor1', {
    filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
});
CKEDITOR.replace('editor2', {
    filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
});
});
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

function defult()
{
 
    var inputValue = $('input[type="radio"]:checked').attr("value");
    if(inputValue=="Submenu")
    {
      var targetBox = $("." + inputValue);
      $(".box").not(targetBox).hide();
      $(targetBox).show();
    }
    else{
      var targetBox = $("." + inputValue);
      $(".box").not(targetBox).hide();
      $(targetBox).show();
    }
   
    
}

</script>
<!----Seo tool----->
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
<script>
    window.onload = function() {
    var src = document.getElementById("heading"),
        dst = document.getElementById("url");
    src.addEventListener('input', function() {
        dst.value = src.value;
    });
  }

</script>

</body>
</html>
