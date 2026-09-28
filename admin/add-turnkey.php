<?php
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
require('checksession.php');
require('../inc/function.php');

if (isset($_POST['submitproduct'])) {

  //---------------------Product Category data-----------------------//
  //--------------------Product Detail------------------------//
  $cat = mysqli_real_escape_string($conn, $_POST['cat']);
  $product = mysqli_real_escape_string($conn, $_POST['product']);
  $producturl = mysqli_real_escape_string($conn, $_POST['producturl']);
  $purl = str_replace(array('\'', '"', ' ', ',', ';', '.', '!', '@', '(', ')', '(', '#', '^', '*', ',', '/', '&', '_', '$', '--', '-', '<', '>', '%', '=', ':', '?', '[', ']', '~', '+', '`', '{', '}', '|'), '-', $producturl);
  $url = strtolower($purl);

  $description = mysqli_real_escape_string($conn, $_POST['description']);
   $shortdesc = mysqli_real_escape_string($conn, $_POST['shortdesc']);
  //------------| Main Image |-----------//

  $bimages = $_FILES['image']['name'];
  if ($bimages != '') {
    $bimage = time() . "_" . $bimages;
    move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/turnkey/" . $bimage);
  } else {
    $bimage = '';
  }
  
  $inner_bimages = $_FILES['inner_image']['name'];
  if ($inner_bimages != '') {
    $inner_bimage = time() . "_" . $inner_bimages;
    move_uploaded_file($_FILES["inner_image"]["tmp_name"], "../uploads/turnkey/" . $inner_bimage);
  } else {
    $inner_bimage = '';
  }
  
  		$broadimage=$_FILES['bnr_broadimage']['name'];
	if($broadimage!='')
	{
		$broadimage=time()."_".$broadimage;
		move_uploaded_file($_FILES["bnr_broadimage"]["tmp_name"], "../uploads/turnkey/".$broadimage);
	}
	else{
		$broadimage='';
	}
  
  
  $image_alt = mysqli_real_escape_string($conn, $_POST['image_alt']);
  $inner_image_alt = mysqli_real_escape_string($conn, $_POST['inner_image_alt']);

 
  $metatag = mysqli_real_escape_string($conn, $_POST['metatag']);
  $keyword = mysqli_real_escape_string($conn, $_POST['keyword']);
  $metadesc = mysqli_real_escape_string($conn, $_POST['metadescription']);
  $position = mysqli_real_escape_string($conn, $_POST['position']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  

  $query = "INSERT INTO `tbl_turnkey`(`category_id`,`name`,`broadimage`, `url`,  `image`, `image_alt`,`inner_image`, `inner_image_alt`,`shortdesc`, `description`, `metatag`, `keyword`, `metadesc`, `status`, `sort`) VALUES ('$cat','$product','$broadimage','$url','$bimage','$image_alt','$inner_bimage','$inner_image_alt','$shortdesc','$description','$metatag','$keyword','$metadesc','$status','$position')";

  $data = mysqli_query($conn, $query);
  if ($data == true) {
    $_SESSION['success'] = "Turnkey Added successfully";
    header("refresh:3;url=manage-turnkey.php");
  } else {
    $_SESSION['error'] = "Something went wrong. Please try again";
    header("refresh:3;url=manage-turnkey.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require("includes/head.php"); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<body>
  <!-- begin #page-container -->
  <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <?php require("includes/header.php"); ?>
    <?php require("includes/left.php"); ?>
    <!-- end #sidebar -->

    <!-- begin #content -->
    <div id="content" class="content">
      <!-- begin breadcrumb -->
      <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item active">Add Turnkey</li>
      </ol>
      <!-- end breadcrumb -->
      <!-- begin page-header -->
      <h1 class="page-header">Add Turnkey</h1>
      <!-- end page-header -->

      <!-- begin row -->
      <div class="row">
        <!-- begin -->
        <div class="col-lg-12">
          <!-- begin panel -->
          <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <!-- begin panel-heading -->
            <div class="panel-heading">
              <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
              </div>
              <h4 class="panel-title">Add Turnkey</h4>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
              <form method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-12 d-none">
                      <div class="form-group">
                        <label for="heading">Select Category</label>
                        <select name="cat" class="form-control" id="category">
                          <option disabled>Select Category</option>
                          <?php
                          $categories = mysqli_query($conn, "SELECT * FROM `tbl_turnkey_category` where `status`='1' order by `sort` asc");
                          if (mysqli_num_rows($categories) > 0) {
                            while ($cat = mysqli_fetch_assoc($categories)) {
                          ?> <option value="<?= $cat['id']; ?>"> <?= $cat['name']; ?> </option> 
                          <?php
                              }
                            }
                                ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Turnkey Name</label>
                    <input type="text" name="product" class="form-control" id="name" placeholder="Enter Turnkey Name">
                  </div>
                  <div class="form-group">
                    <label>Turnkey Url</label>
                    <input type="text" name="producturl" class="form-control" id="url" placeholder="Enter Turnkey Url">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputPassword1">Turnkey Short Description</label>
                    <textarea class="editor1 form-control" name="shortdesc" id="editor1"></textarea>
                  </div>

          
                  <div class="form-group">
                    <label for="exampleInputPassword1">Turnkey Description</label>
                    <textarea class="editor2 form-control" name="description" id="editor2"></textarea>
                  </div>

                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="exampleInputPassword1"> Image (Main) <code>[ 260 × 327 px ]</code></label>
                        <input type="file" name="image" class="form-control" id="exampleInputPassword1">
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Main Image Alt Tag</label>
                        <input type="text" name="image_alt" class="form-control" id="exampleInputPassword1" placeholder="alt tag">
                      </div>
                    </div>
                    
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Inner Image<code>[ 1060 × 594 px ]</code></label>
                        <input type="file" name="inner_image" class="form-control" id="exampleInputPassword1">
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Inner Image Alt Tag</label>
                        <input type="text" name="inner_image_alt" class="form-control" id="exampleInputPassword1" placeholder="alt tag">
                      </div>
                    </div>
                   <div class="col-sm-6">
                            <div class="form-group">
                               <label for="exampleInputFile">Breadcrumb Image</label>
                               <input type="file" name="bnr_broadimage" class="form-control" id="exampleInputFile">
                               <p class="help-block">Image dimension must be 1920 X 336 & must be webp format</p>
                            </div>
                      </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Sort Number</label>
                        <input type="number" name="position" class="form-control" id="exampleInputPassword1" placeholder="1-10">
                      </div>
                    </div>
                  </div>

                  <div id="myDIV" style="display:none;border: 1px solid #000; padding: 9px;">
                    <div class="form-group">
                      <label for="metatag">Meta Title</label>
                      <input type="text" name="metatag" id="metatag" placeholder="Meta Title" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="keyword">Meta Keyword</label>
                      <textarea name="keyword" id="keyword" placeholder="Meta Keyword" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="metadescription">Meta Description</label>
                      <textarea name="metadescription" id="metadescription" placeholder="Meta Description" class="form-control"></textarea>
                    </div>
                  </div><br>

                  <div class="form-group row m-b-10">
                    <label class="col-md-1 col-form-label">Status :-</label>
                    <div class="col-md-9">
                      <div class="radio radio-css radio-inline">
                        <input type="radio" name="status" id="optionsRadios4" value="1" checked>
                        <label for="optionsRadios4">Active</label>
                      </div>
                      <div class="radio radio-css radio-inline">
                        <input type="radio" name="status" id="optionsRadios5" value="0">
                        <label for="optionsRadios5">Inactive</label>
                      </div>
                    </div>
                  </div>

                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" name="submitproduct" class="btn btn-primary">Click Here To Submit</button>
                  <input type="reset" class="btn btn-danger" value="Reset">
                  <button type="button" onclick="myFunction()" class="btn btn-warning">Seo tools</button>
                </div>
              </form>
            </div>
            <!-- end panel-body -->
          </div>
        </div>
      </div>
      <!-- end row -->
    </div>
    <!-- end #content -->
  </div>
  <!-- end page container -->
  <?php require("includes/footer.php"); ?>
  <script>
    $(document).ready(function() {
      App.init();
      CKEDITOR.replace('editor1', {
        filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
      });
      CKEDITOR.replace('editor2', {
        filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
      });
      CKEDITOR.replace('editor3', {
        filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
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
    };
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

  <script>
    $('#category').change(function() {
      let category_id = $(this).val();
        
      $.ajax({
        type: "POST",
        url: 'ajax/subcategory.php',
        data: {
          category_id
        },
        success: function(response) {
          $('#subcategory').html(response);
        }
      });
    });
  </script>

  <script>
    /*  Getting component show or hide wher is variation selected.... */

    $(document).ready(function() {
      let has_variation = $("#is_variations").val();
      if (has_variation == '1') {
        $('.no_variation_class').css('display', 'none');
        $('.has_variation_class').css('display', 'block');
      } else {
        $('.has_variation_class').css('display', 'none');
        $('.no_variation_class').css('display', 'block');
      }
    });

    $(document).on('change', '#is_variations', function() {
      let has_variation = $(this).val();

      if (has_variation == '1') {
        $('.no_variation_class').css('display', 'none');
        $('.has_variation_class').css('display', 'block');
      } else {
        $('.has_variation_class').css('display', 'none');
        $('.no_variation_class').css('display', 'block');
      }
    });


      $("#category").select2({
          allowClear: true
      });
      $("#subcategory").select2({
          allowClear: true
      });
  </script>

</body>

</html>