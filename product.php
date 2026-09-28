<?php 
require('inc/function.php');
if(isset($_GET['purl'])){
    $purl = $_GET['purl'];
    $cat = mysqli_query($conn, "SELECT * FROM `tbl_category` where `status`='1' and `url`='$purl' order by sort asc");
    $cats = mysqli_fetch_array($cat);
    $product = mysqli_query($conn, "SELECT * FROM `tbl_product` where `status`='1' and `category_id`='$cats[id]' order by sort asc");
    if(mysqli_num_rows($product)>0){
    $total_products_per_page = 12;
    $total_products = mysqli_num_rows($product);
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $total_products_per_page;
    }else{
        header('location:'.SITE_URL.'404.php');
    }
}else{
   if(isset($_GET['curl']) && isset($_GET['surl'])){
    $curl = $_GET['curl'];
    $surl = $_GET['surl'];
    $cat = mysqli_query($conn, "SELECT * FROM `tbl_category` where `status`='1' and `url`='$curl' order by sort asc");
    $cats = mysqli_fetch_array($cat);
    $subcat = mysqli_query($conn, "SELECT * FROM `tbl_subcategory` where `status`='1' and (`url`='$surl' or `url`=REPLACE('$surl','-','--')) order by sort asc");
    $subcats = mysqli_fetch_array($subcat);
    if(!$subcats && $cats){
        // Fallback: If $surl is actually a product under this category, redirect to the product detail page
        $chk_prod = mysqli_query($conn, "SELECT id FROM `tbl_product` where `status`='1' and `url`='$surl'");
        if($chk_prod && mysqli_num_rows($chk_prod)>0){
            header('Location: '.SITE_URL.'product/'.$curl.'/'.$surl);
            exit;
        }
    }
    $product = mysqli_query($conn, "SELECT * FROM `tbl_product` where `status`='1' and `category_id`='".($cats['id'] ?? 0)."' and `subcategory_id`='".($subcats['id'] ?? 0)."' order by sort asc");
    if($product && mysqli_num_rows($product)>0){
    $total_products_per_page = 12;
    $total_products = mysqli_num_rows($product);
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $total_products_per_page;
    }else{
        header('location:'.SITE_URL.'404.php');
        exit;
    }  
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php if(isset($_GET['purl'])){ ?>
          <?php if($cats['title']>0){ ?>
          <title><?= $cats['title']?> | <?=SITE_NAME?></title>
    <?php } else{ ?>
          <title><?= $cats['name']; ?> | <?=SITE_NAME?></title>
    <?php } ?>
    <meta name="description" content="<?=$cats['metadesc']?>">
    <meta name="keywords" content="<?=$cats['keyword']?>">
    <?php }else{ if(isset($_GET['curl']) && isset($_GET['surl'])){ ?>
          <?php if($subcats['title']>0){ ?>
          <title><?= $subcats['title']?> | <?=SITE_NAME?></title>
            <?php } else{ ?>
                  <title><?= $subcats['name']; ?> | <?=SITE_NAME?></title>
            <?php } ?>
            <meta name="description" content="<?=$subcats['metadesc']?>">
            <meta name="keywords" content="<?=$subcats['keyword']?>">
    <?php } } ?>
    
    
    
  
    <?php include('inc/head.php')?>
    
</head>
<body>

     <!-- header start -->
   <?php include('inc/header.php')?>
   <!-- header end -->

   <!-- breadcrumb area start -->
   <div class="breadcrumb__pt">
               <?php if($cats['breadcrumb']>0){ ?>
               <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
                  data-background="<?=SITE_URL?>uploads/category/<?=$cats['breadcrumb']?>" style="background-image: url('<?=SITE_URL?>uploads/category/<?=$cats['breadcrumb']?>');">
                   <?php }else{ ?>
                   <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
                  data-background="<?=SITE_URL?>assets/img/breadcurmb/breadcurmb.jpg">
                   <?php } ?>
                  <div class="container">
                     <div class="row">
                        <div class="col-xxl-12">
                           <div class="breadcrumb__content z-index">
                              <div class="breadcrumb__section-title-box mb-20">
                                 <h3 class="breadcrumb__title tp-split-text tp-split-in-right">Product</h3>
                              </div>
                              <div class="breadcrumb__list">
                                 <span><a href="<?=SITE_URL?>">Home</a></span>
                                 <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                 <span>Products</span>
                                 <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                 <?php if(isset($_GET['purl'])){ ?>
                                    <span><?=$cats['name']?></span>
                                <?php }else{ if(isset($_GET['curl']) && isset($_GET['surl'])){ ?>
                                    <span><?=$cats['name']?></span>
                                    <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                    <span><?=$subcats['name']?></span>
                                <?php } } ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- breadcrumb area end -->

             <!---our products-->
             <div class="products-mainn  pt-80  pb-80 ">
               <div class="container">
                  <div class="tp--2-title-wrap ">
                     <div class="row align-items-end">
                        <div class="col-xl-6 col-lg-6 col-md-5">
                           <div class="tp--2-top-text">
                              <!--<p>loborti viverra laoreet matti ullamcorper posuere viverr des Aliquam eros justo posuere-->
                              <!--   lobortis non, Aliquam eros justo, posuere loborti viverra laorematu our</p>-->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-xl-12 col-lg-12">
                                 <div class="row">
                                    <?php 
                                    if(isset($_GET['purl'])){
                                    $cato = mysqli_query($conn, "SELECT * FROM `tbl_category` where `status`='1' and `url`='$purl' order by sort asc");
                                    while($catss = mysqli_fetch_array($cato)){ 
                                        $pro = mysqli_query($conn, "SELECT * FROM `tbl_product` where `status`='1' and `category_id`='$catss[id]' order by sort asc LIMIT $offset, $total_products_per_page");
                                        while($pros = mysqli_fetch_array($pro)){ 
                                    ?>
                                    <div class="col-xl-3 col-lg-4 col-6 col-md-6 mb-30">
                                        <div class="tp-product-2-item text-center">
                                            <div class="tp-product-2-content">
                                                <h4 class="tp-product-2-title"><a href="<?=SITE_URL?>product/<?=$catss['url']?>/<?=$pros['url']?>"><?=$pros['name']?></a></h4>
                                            </div>
                                            <div class="tp-product-2-thumb-box p-relative">
                                                <div class="tp-product-2-thumb fix">
                                                    <a href="<?=SITE_URL?>product/<?=$catss['url']?>/<?=$pros['url']?>"><img src="<?=SITE_URL?>uploads/product/<?=$pros['image']?>" alt="<?=$pros['image_alt']?>"></a>
                                                    <div class="tp-product-2-btn">
                                                        <a class="tp-btn-black" href="javascript:;" data-pname="<?=$pros['name']?>" onclick="enquiryForm(this)">
                                                            <span>Enquiry Now</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } } }else{ if(isset($_GET['curl']) && isset($_GET['surl'])){
                                    $cato = mysqli_query($conn, "SELECT * FROM `tbl_category` where `status`='1' and `url`='$curl' order by sort asc");
                                    while($catss = mysqli_fetch_array($cato)){ 
                                        $subcatt = mysqli_query($conn, "SELECT * FROM `tbl_subcategory` where `status`='1' and `url`='$surl' order by sort asc");
                                       while($subcatts = mysqli_fetch_array($subcatt)){
                                        $pro = mysqli_query($conn, "SELECT * FROM `tbl_product` where `status`='1' and `category_id`='$catss[id]' and `subcategory_id`='$subcatts[id]' order by sort asc LIMIT $offset, $total_products_per_page");
                                        while($pros = mysqli_fetch_array($pro)){ 
                                    ?>
                                    <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                                        <div class="tp-product-2-item text-center">
                                            <div class="tp-product-2-content">
                                                <h4 class="tp-product-2-title"><a href="<?=SITE_URL?>product/<?=$catss['url']?>/<?=$pros['url']?>"><?=$pros['name']?></a></h4>
                                            </div>
                                            <div class="tp-product-2-thumb-box p-relative">
                                                <div class="tp-product-2-thumb fix">
                                                    <a href="<?=SITE_URL?>product/<?=$catss['url']?>/<?=$pros['url']?>"><img src="<?=SITE_URL?>uploads/product/<?=$pros['image']?>" alt="<?=$pros['image_alt']?>"></a>
                                                    <div class="tp-product-2-btn">
                                                        <a class="tp-btn-black" href="javascript:;" data-pname="<?=$pros['name']?>" onclick="enquiryForm(this)">
                                                            <span>Enquiry Now</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php } } } } } ?>
                                    
                                    <div class="col-xl-12">
                                        <div class="basic-pagination mt-30">
                                            <nav>
                                                <?php if(isset($_GET['purl'])){ ?>
                                                <ul>
                                                    <?php
                                                    $total_pages = ceil($total_products / $total_products_per_page);
                                                    for ($i = 1; $i <= $total_pages; $i++) {
                                                        $active_class = ($i == $current_page) ? 'active' : '';
                                                        if($total_products > $total_products_per_page){
                                                    ?>
                                                    <li class="<?=$active_class?>">
                                                        <a href="<?=SITE_URL?>products/<?=$cats['url']?>?page=<?=$i?>"><?=$i?></a>
                                                    </li>
                                                    <?php } } ?>
                                                    <?php if($total_products > $total_products_per_page){ ?>
                                                    <a href="<?=SITE_URL?>products/<?=$cats['url']?>?page=<?= $current_page + 1 ?>">
                                                        <span class="current<?=$total_products?>"><i class="fa-regular fa-arrow-right"></i></span>
                                                    </a>
                                                    <?php } ?>
                                                </ul>
                                                <?php }else if(isset($_GET['curl']) && isset($_GET['surl'])){ ?>
                                                <ul>
                                                    <?php
                                                    $total_pages = ceil($total_products / $total_products_per_page);
                                                    for ($i = 1; $i <= $total_pages; $i++) {
                                                        $active_class = ($i == $current_page) ? 'active' : '';
                                                        if($total_products > $total_products_per_page){
                                                    ?>
                                                    <li class="<?=$active_class?>">
                                                        <a href="<?=SITE_URL?>products/<?=$cats['url']?>/<?=$surl?>?page=<?=$i?>"><?=$i?></a>
                                                    </li>
                                                    <?php } } ?>
                                                    <?php if($total_products > $total_products_per_page){ ?>
                                                    <a href="<?=SITE_URL?>products/<?=$cats['url']?>/<?=$surl?>?page=<?= $current_page + 1 ?>">
                                                        <span class="current<?=$total_products?>"><i class="fa-regular fa-arrow-right"></i></span>
                                                    </a>
                                                    <?php } ?>
                                                </ul>
                                                
                                                <?php } ?>
                                            </nav>
                                        </div>
                                    </div>
                                </div>

                               </div>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>

            <!---our products-->
             

<!-- footer start -->
<?php include('inc/footer.php')?>
     <!-- footer end -->


    <!-- script start -->
   <?php include('inc/footer-data.php')?>
   <!-- script end -->


</body>
</html>