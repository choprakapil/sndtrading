<?php
//  error_reporting(E_ALL);
//  ini_set("display_errors", 1);
require('checksession.php');
require('../inc/function.php');

if (isset($_POST['submitproduct'])) {

  //---------------------Product Category data-----------------------//
  //--------------------Product Detail------------------------//
    $colors = isset($_POST['color']) ? $_POST['color'] : array();
    $escaped_colors = array();
    foreach ($colors as $color) {
        $escaped_colors[] = mysqli_real_escape_string($conn, $color);
    }
    $color = implode(', ', $escaped_colors);
    
      $sizes = isset($_POST['size']) ? $_POST['size'] : array();
    $escaped_sizes = array();
    foreach ($sizes as $size) {
        $escaped_sizes[] = mysqli_real_escape_string($conn, $size);
    }
    $size = implode(', ', $escaped_sizes);
  
  
  $cat = mysqli_real_escape_string($conn, $_POST['cat']);
  $subcategory = isset($_POST['subcat']) ? mysqli_real_escape_string($conn, $_POST['subcat']) : 0 ;
  $product = mysqli_real_escape_string($conn, $_POST['product']);
  $producturl = mysqli_real_escape_string($conn, $_POST['producturl']);
  $purl = str_replace(array('\'', '"', ' ', ',', ';', '.', '!', '@', '(', ')', '(', '#', '^', '*', ',', '/', '&', '_', '$', '--', '-', '<', '>', '%', '=', ':', '?', '[', ']', '~', '+', '`', '{', '}', '|'), '-', $producturl);
  $url = strtolower($purl);

  $skucode = '';
//   if ($has_variations == '0') {
//     $skucode = generate_sku_code($product, $category);
//   }

  // $skucode = $_POST['skucode'] ? mysqli_real_escape_string($conn, $_POST['skucode']) : '';
  $hsncode = mysqli_real_escape_string($conn, $_POST['hsncode']);
  $mrp = $_POST['productmrp'] ? mysqli_real_escape_string($conn, $_POST['productmrp']) : '';
  $price = $_POST['productprice'] ? mysqli_real_escape_string($conn, $_POST['productprice']) : '';
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $shortdesc = mysqli_real_escape_string($conn, $_POST['shortdesc']);
  $details = mysqli_real_escape_string($conn, $_POST['details']);
  $unit_sold = '';
  
  $brd_images = $_FILES['brd_image']['name'];
  $brd_image = time() . "_" . $brd_images;
  if ($brd_images != '') {
    move_uploaded_file($_FILES["brd_image"]["tmp_name"], "../uploads/product/" . $brd_image);
  } else {
    $brd_image = '';
  }
  
  //------------| Main Image |-----------//

  $bimages = $_FILES['image']['name'];
  if ($bimages != '') {
    $bimage = time() . "_" . $bimages;
    move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/product/" . $bimage);
  } else {
    $bimage = '';
  }
  $image_alt = mysqli_real_escape_string($conn, $_POST['image_alt']);

  //------------| Multiple Images|-----------//
  if(!empty($_FILES['images']['name'][0])){
  foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
    $file_name = time() . "_" . $_FILES['images']['name'][$key];
    $file[] = $file_name;
    $file_tmp = $_FILES['images']['tmp_name'][$key];
    $desired_dir = "../uploads/product/";
    if (is_dir($desired_dir) == false) {
      mkdir("$desired_dir", 0700);
    }
    move_uploaded_file($file_tmp, "$desired_dir/" . $file_name);
  }
  $pimages = implode(",", $file);
  }else{
    $pimages='';
  }
  //----------------------Product Features----------------------//	

  $trending = mysqli_real_escape_string($conn, $_POST['trending']);

  //---------------------Product Seo Tool-----------------------//	

  $metatag = mysqli_real_escape_string($conn, $_POST['metatag']);
  $keyword = mysqli_real_escape_string($conn, $_POST['keyword']);
  $metadesc = mysqli_real_escape_string($conn, $_POST['metadescription']);
  $position = mysqli_real_escape_string($conn, $_POST['position']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  
    if($_FILES['brochure']['name'] != ''){
        $brochure = time().uniqid().'.'.pathinfo($_FILES['brochure']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['brochure']['tmp_name'], '../uploads/brochure/'.$brochure);
    }else{
        $brochure = '';
    }
    
    

  $query = "INSERT INTO `tbl_product`(`category_id`,`subcategory_id`,`name`,`color`,`size`, `url`, `sku`, `hsncode`, `price`, `mrp`, `image`, `image_alt`,`breadcrumb`, `images`, `description`, `details`, `metatag`, `keyword`, `metadesc`, `status`, `shortdesc`, `sort`, `trending`, `brochure`) VALUES ('$cat','$subcategory','$product','$color','$size','$url','$skucode','$hsncode','$price','$mrp','$bimage','$image_alt','$brd_image','$pimages','$description','$details','$metatag','$keyword','$metadesc','$status','$shortdesc','$position', '$trending', '$brochure')";

  $data = mysqli_query($conn, $query);
  if ($data == true) {
    $_SESSION['success'] = "Product Added successfully";
    header("refresh:3;url=manage-product.php");
  } else {
    $_SESSION['error'] = "Something went wrong. Please try again";
    header("refresh:3;url=manage-product.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require("includes/head.php"); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
 .color {
    display: block;
    text-align: center;
    width: 1.6rem;
    height: 1.6rem;
    border-radius: 50%;
    border: none;
    margin-right: 0;
    margin-top:2px;
 }
</style>

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
        <li class="breadcrumb-item active">Add Product</li>
      </ol>
      <!-- end breadcrumb -->
      <!-- begin page-header -->
      <h1 class="page-header">Add Product</h1>
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
              <h4 class="panel-title">Add Product</h4>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
              <form method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="heading">Select Category</label>
                        <select name="cat" class="form-control" id="category" style="width:100%" required>
                          <option readonly value="">Select Category</option>
                          <?php
                          $categories = mysqli_query($conn, "SELECT * FROM `tbl_category` where `status`='1' order by `sort` asc");
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
                   <div class="col-sm-6">
                      <div class="form-group">
                        <label for="heading">Select Sub Category</label>
                        <select name="subcat" class="form-control" id="subcategory" style="width:100%">
                          <option selected disabled>Select Sub Category</option>
                        </select>
                      </div>
                    </div>
                   <div class="col-sm-6">
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="product" class="form-control" id="name" placeholder="Enter Product Name">
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                    <label>Product Url</label>
                    <input type="text" name="producturl" class="form-control" id="url" placeholder="Enter Product Url">
                  </div>
                  </div>
                  <div class="col-sm-4 d-none">
                    <div class="form-group">
                      <label>Available Color:</label>
                      <br><select class="form-control" multiple data-allow-clear="1" name="color[]" style="width:100%">
                         <?php
                            $query= mysqli_query($conn,"select* from `tbl_color` where `status`='1'");
                            while($tags=mysqli_fetch_assoc($query))
                            { ?>
                                <option value="<?= $tags['id']; ?>"> <?= $tags['name']; ?></option>
                            <?php }
                            ?>
                      </select>
                    </div>
                    </div>
                    <div class="col-sm-4 d-none">
                        <div class="form-group">
                      <label>Available Size:</label>
                      <br><select class="form-control" multiple data-allow-clear="1" name="size[]" style="width:100%">
                         <?php
                            $querysize= mysqli_query($conn,"select* from `tbl_size` where `status`='1'");
                            while($tagsize=mysqli_fetch_assoc($querysize))
                            { ?>
                             <option value="<?= $tagsize['id']; ?>"> <?= $tagsize['name']; ?></option>
                            <?php } ?>
                      </select>
                    </div>
                     </div>
                     </div>

                  <div class="form-group d-none">
                    <label for="exampleInputPassword1">Product Short Description</label>
                    <textarea class="editor1 form-control" name="shortdesc" id="editor3"></textarea>
                  </div>

                  <div class="form-group d-none">
                    <label for="exampleInputPassword1">Product Description</label>
                    <textarea class="editor1 form-control" name="description" id="editor1"></textarea>
                  </div>

                  <div class="form-group d-none">
                    <label>Product Details</label>
                    <textarea name="details" class="editor2 form-control" id="editor2"></textarea>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Product Image (Main) <code>[ 330 × 339 px ]</code></label>
                        <input type="file" name="image" class="form-control" id="exampleInputPassword1">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Main Image Alt Tag</label>
                        <input type="text" name="image_alt" class="form-control" id="exampleInputPassword1" placeholder="alt tag">
                      </div>
                    </div>

                    <div class="col-sm-3 no_variation_class d-none">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Product Images (Multiple) <code>[ 330 × 339 px ]</code></label>
                        <input type="file" name="images[]" class="form-control" id="exampleInputPassword1" multiple>
                      </div>
                    </div>
                    <div class="col-sm-3 d-none">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Brochure</label>
                        <input type="file" name="brochure" class="form-control">
                      </div>
                    </div>

                    <div class="col-sm-3 d-none">
                      <div class="form-group">
                        <label>Product HSN Code</label>
                        <input type="text" name="hsncode" class="form-control" placeholder="Enter Product HSN Code">
                      </div>
                    </div>

                    <div class="col-sm-3 d-none no_variation_class">
                      <div class="form-group ">
                        <label>Product Price (₹)</label>
                        <input type="text" name="productprice" class="form-control" placeholder="Enter Product Price">
                      </div>
                    </div>

                    <div class="col-sm-3 d-none no_variation_class">
                      <div class="form-group">
                        <label>Product MRP (₹)</label>
                        <input type="text" name="productmrp" class="form-control" placeholder="Enter Product Mrp">
                      </div>
                    </div>
                    
                    <div class="col-sm-3 d-none">
                      <div class="form-group">
                        <label for="heading">Show On Best Selling</label>
                        <select name="trending" class="form-control">
                          <option value="0">No</option>
                          <option value="1">Yes</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Sort Number</label>
                        <input type="number" name="position" class="form-control" id="exampleInputPassword1" placeholder="1-10">
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group d-none">
                        <label for="exampleInputPassword1">Breadcrumb Image (Main) <code>[ 7333 × 2867 px ]</code></label>
                        <input type="file" name="brd_image" class="form-control" id="exampleInputPassword1">
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
    <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet"> <!-- for live demo page -->
  <link href="select2-bootstrap4.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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
          $('#category').change(function(){
            let category_id = $(this).val();
            
            $.ajax({
              type : "POST",
              url : 'ajax/subcategory.php',
              data : { category_id },
              success : function(response){
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

   <script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
  </script>
  <script>
    $(function () {
  $('select').each(function () {
    $(this).select2({
      theme: 'bootstrap4',
      width: 'style',
      placeholder: $(this).attr('placeholder'),
      allowClear: Boolean($(this).data('allow-clear')),
    });
  });
});
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</body>

</html>