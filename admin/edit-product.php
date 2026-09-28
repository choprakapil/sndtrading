<?php
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
require('checksession.php');
require('../inc/function.php');
$b = $_GET['product'];
$bdata = mysqli_query($conn, "SELECT * FROM `tbl_product` WHERE id ='$b'");
$brec = mysqli_fetch_array($bdata);

if (isset($_POST['updateproduct'])) {

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
  $purl = str_replace(array('\'', '"', ' ', ',', ';', '.', '!', '@', '(', ')', '(', '#', '^', '*', ',', '/', '&', '_', '$', '--', '-', '<', '>', '%','=',':','?','[',']','~','+','`','{','}','|'), '-', $producturl);
  $url = strtolower($purl);
  $skucode = $_POST['skucode'] ? mysqli_real_escape_string($conn, $_POST['skucode']) : '';
  $hsncode = mysqli_real_escape_string($conn, $_POST['hsncode']);
  $mrp = $_POST['productmrp'] ? mysqli_real_escape_string($conn, $_POST['productmrp']) : '';
  $price = $_POST['productprice'] ? mysqli_real_escape_string($conn, $_POST['productprice']) : '';
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $shortdesc = mysqli_real_escape_string($conn, $_POST['shortdesc']);  
  $details = mysqli_real_escape_string($conn, $_POST['details']);
  $unit_sold = '';

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
        $brochure = $brec['brochure'];
    }

  $brd_images = $_FILES['brd_image']['name'];
  $brd_image = time() . "_" . $brd_images;
  if ($brd_images != '') {
    move_uploaded_file($_FILES["brd_image"]["tmp_name"], "../uploads/product/" . $brd_image);
  } else {
    $brd_image = $brec['breadcrumb'];
  }

  //------------| Main Image |-----------//

  $bimages = $_FILES['image']['name'];
  $bimage = time() . "_" . $bimages;
  if ($bimages != '') {
    move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/product/" . $bimage);
  } else {
    $bimage = $brec['image'];
  }
  $image_alt = mysqli_real_escape_string($conn, $_POST['image_alt']);

  //------------| Multiple Images|-----------//
  
  

$file = [];
if ($_FILES['images']['name'][0] != '') {
    foreach ($_FILES['images']['name'] as $key => $name) {
        if ($name != '') {
            $filename = uniqid() . "_" . $name;
            $file[] = $filename;
            $file_tmp = $_FILES['images']['tmp_name'][$key];
            $desired_dir = "../uploads/product";
            if (!is_dir($desired_dir)) {
                mkdir($desired_dir, 0700, true);
            }
            move_uploaded_file($file_tmp, "$desired_dir/" . $filename);
        }
    }

    $newimages = implode(",", $file);
    $pimages = trim($brec['images']) . ',' . trim($newimages);

} else {
    $pimages = $brec['images'];
}


  $query = mysqli_query($conn, "UPDATE `tbl_product` SET `category_id` = '$cat',`subcategory_id`='$subcategory',`color`='$color',`size`='$size',`brochure` = '$brochure', `name`='$product',`url`='$url',`sku`='$skucode',`hsncode`='$hsncode',`price`='$price',`mrp`='$mrp',`image`='$bimage',`breadcrumb`='$brd_image',`image_alt`='$image_alt',`images`='$pimages',`shortdesc`='$shortdesc',`description`='$description',`details`='$details',`metatag`='$metatag',`keyword`='$keyword',`metadesc`='$metadesc',`status`='$status',`sort`='$position', `trending`='$trending' WHERE `id`='$b'");
  if ($query) {
    $_SESSION['success'] = "Product Updated successfully";
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
        <li class="breadcrumb-item active">Edit Product</li>
      </ol>
      <!-- end breadcrumb -->
      <!-- begin page-header -->
      <h1 class="page-header">Edit Product</h1>
      <!-- end page-header -->

      <!-- begin row -->
      <div class="row">
        <!-- begin col-12-->
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
              <h4 class="panel-title">Edit Product</h4>
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
                            <select name="cat" class="form-control" id="category" style="width:100%">
                              <?php
                                    $category_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `tbl_category` where `status`='1' and `id`='$brec[category_id]' ORDER BY `sort` ASC"));
                                    
                                    $get_category_data = mysqli_query($conn,"SELECT * FROM `tbl_category` where `status`='1' ORDER BY `sort` ASC");
                                   while($category=mysqli_fetch_assoc($get_category_data)){
                                    if($category['id']==$brec['category_id'])
                                    {
                                        ?>
                                        <option value="<?= $category_data['id']; ?>" selected><?= $category_data['name'];?></option>
                                      <?php }else{ ?>
                                        <option value="<?= $category['id']; ?>"><?= $category['name'];?></option>
                                      <?php
                                    }
                                   }
                                ?>
                            </select>
                        </div>
                      </div>
                       <div class="col-sm-6">
                          <div class="form-group ">
                            <label for="heading">Select Sub Category</label>
                            <select name="subcat" class="form-control" id="subcategory" style="width:100%">
                                <option selected disabled>Select Sub Category</option>
                                <?php
                                    $get_subcategory_data = mysqli_query($conn,"SELECT * FROM `tbl_subcategory` where `category_id`='".$brec['category_id']."' and `status`='1'");
                                    if(mysqli_num_rows($get_subcategory_data)>0)
                                    {
                                      while($subcategory = mysqli_fetch_assoc($get_subcategory_data)){
                                          ?><option value="<?= $subcategory['id']; ?>" <?php if($subcategory['id'] == $brec['subcategory_id']){ echo 'selected'; }?>><?= $subcategory['name'];?></option><?php
                                      }
                                    }
                                ?>
                            </select>
                          </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group ">
                    <label>Product Name</label>
                    <input type="text" name="product" class="form-control" placeholder="Enter Product Name" id="name" value="<?= $brec['name']; ?>" >
                  </div>
                  </div>
                      <div class="col-sm-6">
                  <div class="form-group ">
                    <label>Product Url</label>
                    <input type="text" name="producturl" class="form-control" placeholder="Enter Product Url" id="url" value="<?= $brec['url']; ?>" >
                  </div>
                  </div>
                  <div class="col-sm-4 d-none">
                       <div class="form-group">
                      <label>Available Color:</label>
                      <br><select class="form-control" multiple data-allow-clear="1" name="color[]" style="width:100%">
                         <?php
                            $arr = explode(',',$brec['color']);
                            $query= mysqli_query($conn,"select* from `tbl_color` where `status`='1'");
                            while($tags=mysqli_fetch_assoc($query))
                            {
                              if(in_array($tags['id'], $arr)){ ?>
                                  <option selected value="<?= $tags['id']; ?>" style="background: <?= $tags['color']; ?>; color: white; border: 1px solid black;"> <?= $tags['name']; ?></option>
                            <?php }else{ ?>
                                  <option value="<?= $tags['id']; ?>" style="background: <?= $tags['color']; ?>; color: white; border: 1px solid black;"> <?= $tags['name']; ?></option>
                            <?php }
                            }
                            ?>
                      </select>
                    </div>
                    </div>
                    <div class="col-sm-4 d-none">
                        <div class="form-group">
                      <label>Available Size:</label>
                      <br><select class="form-control" multiple data-allow-clear="1" name="size[]" style="width:100%">
                         <?php
                            $arrsize = explode(',',$brec['size']);
                            $querysize= mysqli_query($conn,"select* from `tbl_size` where `status`='1'");
                            while($tagsize=mysqli_fetch_assoc($querysize))
                            {
                              if(in_array($tagsize['id'], $arrsize)){ ?>
                                  <option selected value="<?= $tagsize['id']; ?>"> <?= $tagsize['name']; ?></option>
                            <?php }else{ ?>
                                  <option value="<?= $tagsize['id']; ?>"> <?= $tagsize['name']; ?></option>
                            <?php }
                            }
                            ?>
                      </select>
                    </div>
                    </div>
                </div>

                  <div class="form-group d-none">
                    <label for="exampleInputPassword1">Product Short Description</label>
                    <textarea class="editor1 form-control" name="shortdesc" id="editor3" placeholder="Product Short Description"><?= $brec['shortdesc']; ?></textarea>
                  </div>

                  <div class="form-group d-none">
                    <label for="exampleInputPassword1">Product Description</label>
                    <textarea class="editor1 form-control" name="description" id="editor1"><?= $brec['description']; ?></textarea>
                  </div>

                  <div class="form-group d-none">
                    <label>Product Details</label>
                    <textarea name="details" class="editor2 form-control" id="editor2"><?= $brec['details']; ?></textarea>
                  </div>

                  <div class="row">
                      <div class="col-sm-4 no_variation_class d-none">
                          <div class="form-group d-flex justify-content-start flex-wrap">
                              <label>Product Code</label>
                              <input type="text" id="sku_box" name="skucode" class="form-control" placeholder="Enter Product Sku Code" value="<?= $brec['sku']; ?>" >
                              <div class="mt-2">
                                    <button type="button" id="generate_sku_code" data-brand="<?= $brec['brand_id']; ?>" data-category="<?= $brec['category_id']; ?>" class="btn btn-primary">Generate New SKU Code</button>
                              </div>
                          </div>
                      </div>

                      <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Product Image (Main) <code>[ 330 × 339 ]px</code></label>
                                <input type="file" name="image" class="form-control" id="exampleInputPassword1"><br>
                                <p><img src="../uploads/product/<?= $brec['image']; ?>" style="width:40%;"></p>
                            </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Main Image Alt Tag</label>
                            <input type="text" name="image_alt" class="form-control" value="<?= $brec['image_alt']; ?>" id="exampleInputPassword1" placeholder="alt tag">
                          </div>
                      </div>
                      <div class="col-sm-3 d-none">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Video</label>
                            <input type="text" name="video" class="form-control" value="<?= $brec['video']; ?>" id="exampleInputPassword1" placeholder="Video YT Link [Ex: xYuvGhopSK]">
                          </div>
                      </div>
                      <div class="col-sm-3 d-none">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Brochure</label>
                            <input type="file" name="brochure" class="form-control">
                            <a href="../uploads/brochure/<?=$brec['brochure']?>">View Brochure</a>
                          </div>
                      </div>
                      <div class="col-sm-4 d-none">
                          <div class="form-group">
                            <label>Product HSN Code</label>
                            <input type="text" name="hsncode" class="form-control" placeholder="Enter Product HSN Code" value="<?= $brec['hsncode']; ?>" >
                          </div>
                      </div>
                        <div class="col-sm-4 no_variation_class d-none">
                            <div class="form-group">
                              <label>Product Price (₹)</label>
                              <input type="text" name="productprice" class="form-control" placeholder="Enter Product Price" value="<?= $brec['price']; ?>" >
                            </div>
                        </div>
                        <div class="col-sm-4 no_variation_class d-none">
                            <div class="form-group">
                              <label>Product MRP (₹)</label>
                              <input type="text" name="productmrp" class="form-control" placeholder="Enter Product Mrp" value="<?= $brec['mrp']; ?>" >
                            </div>
                        </div> 
                         <div class="col-sm-12">
                          <div class="form-group">
                              <label for="exampleInputPassword1">Sort Number</label>
                              <input type="number" name="position" class="form-control" id="exampleInputPassword1" value="<?= $brec['sort']; ?>" placeholder="1-10">
                          </div>
                      </div>
                      <div class="col-sm-12 no_variation_class d-none">
                          <div class="form-group">
                                <label for="exampleInputPassword1">Product Images </label>
                                <input type="file" name="images[]" class="form-control" id="file5" multiple>
                                <p class="help-block">All Image dimension must be equal 330 × 339 px & jpg format</p>
                                <p>
                                    <?php 
                                        $pimages=$brec['images'];
                                        $image=explode(",",$pimages);
                                        echo '<div class="row">';
                                        for($i=0;$i<count($image);$i++)
                                        { if($image[$i]>0){ ?>
                                          <div class="col-sm-3 mt-2">
                                                <input type="hidden" value="<?= $userToDelete = $image[$i] ?>" name="imageg">
                                                  <button name="deleteimg">X</button>
                                                  <img src="../uploads/product/<?= $image[$i] ?>" height="50px" width="50px" />
                                          </div>
                                  <?php } } ?>
                                  <input type="hidden" value="<?= $pimages; ?>" name="oldmimage">
                                  <?php
                                      if(isset($_POST['deleteimg']))
                                      {

                                            $url=$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";  
                                            $pimages=$brec['images'];

                                            $userToDelete =$_POST['imageg'];

                                            $deleteKey = array_search($userToDelete,$image);

                                            unset($image[$deleteKey]);

                                            $usersd = implode(",",$image);

                                            $query=mysqli_query($conn,"UPDATE `tbl_product` SET `images`='$usersd' WHERE `id`='$brec[id]'");
                                            if($query==true)
                                            {
                                            $_SESSION['success']=" Data Updated Successfully";  
                                            echo '<meta http-equiv="refresh" content="3;" />';
                                            }
                                            else 
                                            {
                                            $_SESSION['error']="Something went wrong. Please try again";    
                                            }
                                      }
                                  ?>
                                  <span class="preview"></span>
                                </p>
                              </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-4 d-none">
                          <div class="form-group">
                              <label for="heading">Show On Best Selling</label>
                              <select name="trending" class="form-control">
                                <option value="0" <?php if($brec['trending']=='0'){ echo 'selected'; } ?>>No</option>
                                <option value="1" <?php if($brec['trending']=='0'){ echo 'selected'; } ?>>Yes</option>
                              </select> 
                          </div>
                      </div>
                        <div class="form-group d-none">
                            <label for="exampleInputPassword1">Breadcrumb Image (Main) <code>[ 	7333 × 2867 ]px</code></label>
                            <input type="file" name="brd_image" class="form-control" id="exampleInputPassword1"><br>
                            <p><img src="../uploads/product/<?= $brec['breadcrumb']; ?>" style="width:40%;"></p>
                        </div>
                    
                  <div id="myDIV" style="display:none;border: 1px solid #000; padding: 9px;"> 
                      <div class="form-group">
                        <label for="metatag">Meta Title</label>
                        <input type="text" name="metatag" id="metatag" placeholder="Meta Title" class="form-control" value="<?= $brec['metatag']; ?>">
                      </div>
                      
                        <div class="form-group">
                        <label for="keyword">Meta Keyword</label>
                        <textarea name="keyword" id="keyword" placeholder="Meta Keyword" class="form-control" ><?= $brec['keyword']; ?></textarea>
                      </div>
                      
                      <div class="form-group">
                        <label for="metadescription">Meta Description</label>
                        <textarea name="metadescription" id="metadescription" placeholder="Meta Description" class="form-control" ><?= $brec['metadesc']; ?></textarea>
                      </div>
                  </div><br>
                   </div>
                  

                 <div class="form-group row m-b-10">
                  <label class="col-md-1 col-form-label">Status :-</label>
                  <div class="col-md-9">
                    <div class="radio radio-css radio-inline">
                      <input type="radio" name="status" id="optionsRadios4" value="1" <?php if ($brec['status'] == '1') { echo 'checked'; } ?>>
                      <label for="optionsRadios4">Active</label>
                    </div>
                    <div class="radio radio-css radio-inline">
                      <input type="radio" name="status" id="optionsRadios5" value="0" <?php if ($brec['status'] == '0') { echo 'checked'; } ?>>
                      <label for="optionsRadios5">Inactive</label>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" name="updateproduct" class="btn btn-primary">Click Here To Submit</button>
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
    });
  </script>
  <script>

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

        window.onload = function() {
          var src = document.getElementById("name"),
            dst = document.getElementById("url");
          src.addEventListener('input', function() {
            dst.value = src.value;
          });
        }; 

  </script>

<script>
    
    /*  Getting component show or hide wher is variation selected.... */
    
    $(document).ready(function(){
        let has_variation = $("#is_variations").val();
        if(has_variation == '1')
        {
            $('.no_variation_class').css('display', 'none');
            $('.has_variation_class').css('display', 'block');
        }
        else
        {
            $('.has_variation_class').css('display', 'none');
            $('.no_variation_class').css('display', 'block');
        }
    });
    
    $(document).on('change', '#is_variations', function(){
        let has_variation = $(this).val();
        
        if(has_variation == '1')
        {
            $('.no_variation_class').css('display', 'none');
            $('.has_variation_class').css('display', 'block');
        }
        else
        {
            $('.has_variation_class').css('display', 'none');
            $('.no_variation_class').css('display', 'block');
        }
    });


    $(document).ready(function() { 
      $("#colors").select2({
        placeholder: "Select Colors",
        allowClear: true
      });
      
      });
      
    $(".js-example-theme-multiple").select2({
        theme: "classic"
    });


    $('#generate_sku_code').click(function(){
        let brand_id = $(this).data('brand');
        let category_id = $(this).data('category');

        // alert(brand_id);
        // alert(category_id);

        $.ajax({
          type : 'POST',
          url : 'ajax/generate_sku_code.php',
          data : { brand_id, category_id },
          success : function(result){
              $('#sku_box').val(result);
          }
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
    
    
    $("#category").select2({
        allowClear: true
    });
    $("#subcategory").select2({
        allowClear: true
    });
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</body>
</html>