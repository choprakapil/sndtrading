<?php 
require('inc/function.php');
$sll ="SELECT `pro_id`, `pro_logo`,`pro_dark_logo`, `pro_favicon` , `pro_title`, `pro_keyword`, `pro_detail` FROM `tbl_profile`";
$resutt = $conn->query($sll);
$roo = $resutt->fetch_assoc();


$ctas = mysqli_query($conn, "SELECT * FROM `tbl_home_extra_text`");
$cta = mysqli_fetch_assoc($ctas);
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
   <title><?=$roo['pro_title']?></title>
<meta name="description" content="<?=$roo['pro_detail']?>">
<meta name="keywords" content="<?=$roo['pro_keyword']?>">
   <?php include('inc/head.php')?>
   
   <style>
       
    /*a*/
    /*{ pointer-events:none;}*/
       
   </style>
</head>

<body>
   <!-- header start -->
   <?php include('inc/header.php')?>
   <!-- header end -->
   

   <div>
      <div>

         <main>
    <?php
      $atrc = mysqli_query($conn, "SELECT * FROM `tbl_banner` WHERE `bnr_status`='1' and `bnr_image`!='' ORDER BY `bnr_sort` ASC ");
         if(mysqli_num_rows($atrc)>0){
           ?>
            <!-- slider area start -->
            <div class="tp-slider-3-area">
               <div class="tp-slider-3-wrapper p-relative">
                  <div class="swiper-container tp-slider-3-active swiper">
                     <div class="swiper-wrapper">
                       <?php
    				     while($btrc = mysqli_fetch_array($atrc)) 
                        {
                        ?>
                        <div class="swiper-slide">
                            <div class="tp-slider-3-height p-relative fix grey-bg">
                                <div class="tp-slider-3-bg tp-slider-3-overlay" >
                                  <img src="<?= SITE_URL; ?>uploads/banner/<?= $btrc['bnr_image']; ?>">
                                </div>
                                <div class="container">
                                    <div class="tp-slider-3-wrap p-relative">
                                        <div class="row align-items-center justify-content-start">
                                            <div class="col-xl-7">
                                                <div class="tp-slider-3-title-box"> <h3 class="tp-slider-3-big-text"><?=$btrc['bnr_title']?> </h3> </div>
                                                <div class="tp-slider-3-content">
                                                     <p class="mb-40"><?=$btrc['bnr_subtitle']?></p>
                                                     <a class="tp-btn-black hover-2 theme-bg" href="<?=$btrc['bnr_url']?>"> <span>Read More</span> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           </div>
                        </div>
                        <?php } ?>
                     </div>
                  </div>
               </div>
            </div>
    <?php } ?>
            <!-- slider area end -->
            <!-- about area start -->
        <?php
        $about = mysqli_query($conn, "SELECT * FROM `tbl_about` where `ab_status`='1'");
        $abouts = mysqli_fetch_assoc($about);
        ?>
            <div class="tp-about-4-area pt-40 pb-40">
               <div class="container">
                  <div class="row align-items-center d-flex">
                  
                     <div class="col-xl-12 col-lg-12">
                        <div class="tp-about-4-right">
                           <div class="tp--2-title-wrap">
                              <div class="row align-items-end">
                                 <div class="col-xl-12">
                                    <div class="tp--2-title-box">
                                       <span class="tp-section-subtitle">About</span>
                                       <h3 class="tp-section-title "><?= $abouts['ab_title']; ?></h3>
                                    </div>
                                 </div>
                                
                              </div>
                           </div>
                           <div class="tp-about-4-text">
                            <p>
                                <?php
                                    $description = $abouts['ab_desc'];
                                    $firstParagraph = strtok($description, "\n");
                                    echo $firstParagraph;
                                ?>
                            </p>
                           </div>
                       
                           <a class="tp-btn-black" href="<?= SITE_URL ?>about">
                              <span>Read More</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

  <?php
   $categ = mysqli_query($conn, "SELECT * FROM `tbl_category` where `status`='1' AND `id` = '53'"); 
   $categs = mysqli_fetch_array($categ);
    $prod = mysqli_query($conn, "SELECT * FROM `tbl_product` where `status`='1' and `category_id`='$categs[id]' order by sort asc");
    if(mysqli_num_rows($prod)>0){
?>
            <section class="turnkey-main pt-40 pb-40">
               <div class="container">
                  <div class="tp--2-title-wrap mb-60">
                     <div class="row align-items-end">
                        <div class="col-xl-12 col-lg-12 col-md">
                           <div class="tp-product-2-title-box">
                              <span class="tp-section-subtitle">Products</span>
                              <h3 class="tp-section-title "><?=$categs['name']?></h3>
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <div class="row">
                     <div class="tab-content" id="myTabContent">
                           <div class="swiper-container tp-turnkey-active">
                              <div class="swiper-wrapper">
                                  <?php while($prods = mysqli_fetch_array($prod)){  ?>
                                 <div class="swiper-slide">
                                    <div class="tp-product-2-item text-center">
                                        <div class="tp-product-2-thumb-box p-relative">
                                            <div class="tp-product-2-thumb fix">
                                                <a href="<?=SITE_URL?>product/<?=$categs['url']?>/<?=$prods['url']?>"><img src="<?=SITE_URL?>uploads/product/<?=$prods['image']?>" alt="<?=$prods['image_alt']?>"></a>
                                                <div class="tp-product-2-btn">
                                                    <a class="tp-btn-black" href="javascript:;" data-pname="<?=$prods['name']?>" onclick="enquiryForm(this)">
                                                        <span>Enquiry Now</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tp-product-2-content">
                                            <h4 class="tp-product-2-title"><a href="<?=SITE_URL?>product/<?=$categs['url']?>/<?=$prods['url']?>"><?=$prods['name']?></a></h4>
                                        </div>
                                    </div>
                                 </div>
                                 <?php } ?>
                              </div>
                              <div class="tp-turnkey-2-arrow-box d-none d-xl-block">
                                 <button class="turnkey-prev" tabindex="0" aria-label="Previous slide" aria-controls="swiper-wrapper-ee12510286bdbc64c">
                                    <svg width="56" height="24" viewBox="0 0 56 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M0.939335 10.9393C0.35355 11.5251 0.35355 12.4749 0.939335 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51472C13.1924 2.92893 13.1924 1.97919 12.6066 1.3934C12.0208 0.807611 11.0711 0.807611 10.4853 1.3934L0.939335 10.9393ZM56 10.5L2 10.5V13.5L56 13.5V10.5Z" fill="currentcolor"></path>
                                    </svg>
                                 </button>
                                 <button class="turnkey-next" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-ee12510286bdbc64c">
                                    <svg width="56" height="24" viewBox="0 0 56 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M55.0607 10.9393C55.6465 11.5251 55.6465 12.4749 55.0607 13.0607L45.5147 22.6066C44.9289 23.1924 43.9792 23.1924 43.3934 22.6066C42.8076 22.0208 42.8076 21.0711 43.3934 20.4853L51.8787 12L43.3934 3.51472C42.8076 2.92893 42.8076 1.97919 43.3934 1.3934C43.9792 0.807611 44.9289 0.807611 45.5147 1.3934L55.0607 10.9393ZM0 10.5L54 10.5V13.5L0 13.5L0 10.5Z" fill="currentcolor"></path>
                                    </svg>
                                 </button>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
            </section>

<?php } ?>
            <!---our products-->
    <?php
        $achh = mysqli_query($conn, "SELECT * FROM `tbl_acheivements` where `status`='1'  order by sort asc");
        if (mysqli_num_rows($achh) > 0) {
        ?>
            <!-- funfact area end -->
            <div class="tp-funfact-2-area tp-funfact-style-4  pt-40 pb-40" style="background: url('<?=SITE_URL?>uploads/home_extra/<?=$cta['image']?>') 0% 0% / cover fixed !important;">
               <div class="tp-funfact-2-big-text d-none d-xl-block">
                  <h6>COUNTER</h6>
               </div>
               <div class="container ">
                  <div class="row align-items-center">
                     <div class="col-xl-12 ">
                        <div class="tp-funfact-2-item-box d-flex justify-content-around align-items-center z-index ">
                        <?php
        				     while($achhs = mysqli_fetch_array($achh)) 
                            {
                            ?>
                           <div class="tp-funfact-2-item  text-center">
                              <h5 class="tp-funfact-2-title"><i class="purecounter" data-purecounter-duration="1"
                                    data-purecounter-end="<?=$achhs['numbers'];?>">0</i><?=$achhs['title']?></h5>
                              <span><?= $achhs['name']; ?></span>
                           </div>
                        <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- funfact area end -->
    <?php } ?>
    
  
            <!---turnkey-->

<?php
   $categ = mysqli_query($conn, "SELECT * FROM `tbl_category` where `status`='1' AND `id` = '62'"); 
   $categs = mysqli_fetch_array($categ);
    $prod = mysqli_query($conn, "SELECT * FROM `tbl_subcategory` where `status`='1' and `category_id`='$categs[id]' order by sort asc");
   if(mysqli_num_rows($prod)>0){
?>
            <section class="turnkey-main pt-40 pb-40">
               <div class="container">
                  <div class="tp--2-title-wrap mb-60">
                     <div class="row align-items-end">
                        <div class="col-xl-12 col-lg-12 col-md">
                           <div class="tp-product-2-title-box">
                              <span class="tp-section-subtitle">Products</span>
                              <h3 class="tp-section-title "><?=$categs['name']?></h3>
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <div class="row">
                     <div class="tab-content" id="myTabContent">
                           <div class="swiper-container tp-turnkey-active">
                              <div class="swiper-wrapper">
                                  <?php while($prods = mysqli_fetch_array($prod)){  ?>
                                 <div class="swiper-slide">
                                     <a href="<?=SITE_URL?>products/<?=$categs['url']?>/<?=$prods['url']?>" class="d-block agro-box">
                                    <div class="tp-blog-item d-flex align-items-center">
                                       <div class="tp-blog-thumb">
                                         <img src="<?=SITE_URL?>uploads/subcategory/<?=$prods['image']?>" alt="<?=$prods['alt']?>">
                                       </div>
                                    </div>
                                    <h4 class="tp-service-2-title text-center mt-3"><?=$prods['name']?></h4>
                                 </a>
                                 </div>
                                 <?php } ?>
                              </div>
                              <div class="tp-turnkey-2-arrow-box d-none d-xl-block">
                                 <button class="turnkey-prev" tabindex="0" aria-label="Previous slide" aria-controls="swiper-wrapper-ee12510286bdbc64c">
                                    <svg width="56" height="24" viewBox="0 0 56 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M0.939335 10.9393C0.35355 11.5251 0.35355 12.4749 0.939335 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51472C13.1924 2.92893 13.1924 1.97919 12.6066 1.3934C12.0208 0.807611 11.0711 0.807611 10.4853 1.3934L0.939335 10.9393ZM56 10.5L2 10.5V13.5L56 13.5V10.5Z" fill="currentcolor"></path>
                                    </svg>
                                 </button>
                                 <button class="turnkey-next" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-ee12510286bdbc64c">
                                    <svg width="56" height="24" viewBox="0 0 56 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M55.0607 10.9393C55.6465 11.5251 55.6465 12.4749 55.0607 13.0607L45.5147 22.6066C44.9289 23.1924 43.9792 23.1924 43.3934 22.6066C42.8076 22.0208 42.8076 21.0711 43.3934 20.4853L51.8787 12L43.3934 3.51472C42.8076 2.92893 42.8076 1.97919 43.3934 1.3934C43.9792 0.807611 44.9289 0.807611 45.5147 1.3934L55.0607 10.9393ZM0 10.5L54 10.5V13.5L0 13.5L0 10.5Z" fill="currentcolor"></path>
                                    </svg>
                                 </button>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
            </section>
            <!---turnkey-->

<?php } ?>




  <?php
   $categ = mysqli_query($conn, "SELECT * FROM `tbl_category` where `status`='1' AND `id` = '75'"); 
   $categs = mysqli_fetch_array($categ);
    $prod = mysqli_query($conn, "SELECT * FROM `tbl_product` where `status`='1' and `category_id`='$categs[id]' order by sort asc");
    if(mysqli_num_rows($prod)>0){
?>
            <section class="turnkey-main pt-40 pb-40 bg-grey">
               <div class="container">
                  <div class="tp--2-title-wrap mb-60">
                     <div class="row align-items-end">
                        <div class="col-xl-12 col-lg-12 col-md">
                           <div class="tp-product-2-title-box">
                              <span class="tp-section-subtitle">Products</span>
                              <h3 class="tp-section-title "><?=$categs['name']?></h3>
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <div class="row">
                     <div class="tab-content" id="myTabContent">
                           <div class="swiper-container tp-turnkey-active">
                              <div class="swiper-wrapper">
                                  <?php while($prods = mysqli_fetch_array($prod)){  ?>
                                 <div class="swiper-slide">
                                    <div class="tp-product-2-item text-center">
                                        <div class="tp-product-2-thumb-box p-relative">
                                            <div class="tp-product-2-thumb fix">
                                                <a href="<?=SITE_URL?>product/<?=$categs['url']?>/<?=$prods['url']?>"><img src="<?=SITE_URL?>uploads/product/<?=$prods['image']?>" alt="<?=$prods['image_alt']?>"></a>
                                                <div class="tp-product-2-btn">
                                                    <a class="tp-btn-black" href="javascript:;" data-pname="<?=$prods['name']?>" onclick="enquiryForm(this)">
                                                        <span>Enquiry Now</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tp-product-2-content">
                                            <h4 class="tp-product-2-title"><a href="<?=SITE_URL?>product/<?=$categs['url']?>/<?=$prods['url']?>"><?=$prods['name']?></a></h4>
                                        </div>
                                    </div>
                                 </div>
                                 <?php } ?>
                              </div>
                              <div class="tp-turnkey-2-arrow-box d-none d-xl-block">
                                 <button class="turnkey-prev" tabindex="0" aria-label="Previous slide" aria-controls="swiper-wrapper-ee12510286bdbc64c">
                                    <svg width="56" height="24" viewBox="0 0 56 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M0.939335 10.9393C0.35355 11.5251 0.35355 12.4749 0.939335 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51472C13.1924 2.92893 13.1924 1.97919 12.6066 1.3934C12.0208 0.807611 11.0711 0.807611 10.4853 1.3934L0.939335 10.9393ZM56 10.5L2 10.5V13.5L56 13.5V10.5Z" fill="currentcolor"></path>
                                    </svg>
                                 </button>
                                 <button class="turnkey-next" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-ee12510286bdbc64c">
                                    <svg width="56" height="24" viewBox="0 0 56 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M55.0607 10.9393C55.6465 11.5251 55.6465 12.4749 55.0607 13.0607L45.5147 22.6066C44.9289 23.1924 43.9792 23.1924 43.3934 22.6066C42.8076 22.0208 42.8076 21.0711 43.3934 20.4853L51.8787 12L43.3934 3.51472C42.8076 2.92893 42.8076 1.97919 43.3934 1.3934C43.9792 0.807611 44.9289 0.807611 45.5147 1.3934L55.0607 10.9393ZM0 10.5L54 10.5V13.5L0 13.5L0 10.5Z" fill="currentcolor"></path>
                                    </svg>
                                 </button>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
            </section>

<?php } ?>


    <!----cta------------->
    
     <div class="cta-sec" style="background-image: linear-gradient(to left bottom, rgb(33 52 49), rgb(0 0 0 / 49%)), url('<?=SITE_URL?>uploads/home_extra/<?=$cta['p_image']?>') 0% 0% / cover fixed !important;padding: 50px 0; background-attachment: fixed;">
        <div class="container">
            <div class="tp-about-4-area pt-40 pb-40">
               <div class="container">
                  <div class="row justify-content-center d-flex">
                 
                   
                     <div class="col-xl-8 col-lg-8">
                        <div class="tp-about-4-right">
                           <div class="tp--2-title-wrap">
                              <div class="row align-items-end">
                                 <div class="col-xl-12">
                                    <div class="tp--2-title-box">
                                       <span class="tp-section-subtitle text-white">SND Tranding</span>
                                       <h3 class="tp-section-title text-white"><?=$cta['pro_title']?></h3>
                                       <p><?=$cta['pro_subtitle']?></p>
                                    </div>
                                 </div>
                                
                              </div>
                           </div>
                           <button class="tp-btn-black" data-bs-toggle="modal" href="#enquire-modal2" role="button">
                              <span>Enquire Now</span>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </div>     
     </div>
     
    <!---cta------------->



            <!--clients-->
<?php
 $testim_text = mysqli_query($conn, "SELECT * FROM `tbl_testimonial_text`");
 $testim_tex = mysqli_fetch_assoc($testim_text);
?>
            <!-- testimonial area start -->
            <div class="tp-testimonial-2-area p-relative fix  grey-bg pt-40 pb-40">
               <div class="tp-testimonial-2-big-text d-none d-xl-block">
                  <h6>Review</h6>
               </div>
               <div class="container">
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="tp--2-title-box mb-50">
                           <span class="tp-section-subtitle"><?=$cta['test_title']?></span>
                           <h3 class="tp-section-title"><?=$cta['test_subtitle']?></h3>
                        </div>
                     </div>
                  </div>
                  <div class="row align-items-center">
                      <?php if($testim_tex['ab_image']>0){ ?>
                     <div class="col-xl-5 col-lg-5 col-md-5">
                        <div class="tp-testimonial-2-thumb">
                           <div class="tp-hover-distort-wrapper ">
                              <div class="test-img" style="width: 526px; height: 342px;">
                                 <img src="<?=SITE_URL?>uploads/testimonial/<?=$testim_tex['ab_image']?>" alt="<?=$testim_tex['ab_alt']?>">
                             </div>
                           </div>
                        </div>
                     </div>
                     <?php }?>
                     <?php
                      $testim = mysqli_query($conn, "SELECT * FROM `tbl_testimonial` where `tt_status`='1' order by `tt_sort` asc");
                      if(mysqli_num_rows($testim)>0){
                      ?>
                     <div class="col-xl-7 col-lg-7 col-md-7">
                        <div class="tp-testimonial-2-wrapper p-relative">
                           <div class="swiper-container tp-testimonial-2-active">
                              <div class="swiper-wrapper">
                                <?php
                                    while($testimo = mysqli_fetch_assoc($testim)){
                                    ?>
                                 <div class="swiper-slide">
                                    <div class="tp-testimonial-2-content">
                                       <div class="tp-testimonial-2-rate pb-15">
                                          <?php for($i = 1; $i <= $testimo['tt_alt']; $i++ ){ ?>
                                          <i class="fa-solid fa-star"></i>
                                          <?php } ?>
                                       </div>
                                       <div class="tp-testimonial-2-author-info">
                                          <h5><?=$testimo['tt_name']?></h5>
                                          <span><?=$testimo['tt_location']?></span>
                                       </div>
                                       <div class="tp-testimonial-2-text">
                                          <p><?=$testimo['tt_detail']?></p>
                                       </div>
                                    </div>
                                 </div>
                                <?php } ?>
                              </div>
                           </div>
                           <div class="tp-testimonial-2-arrow-box d-none d-xl-block">
                              <button class="testimonial-prev">
                                 <svg width="56" height="24" viewBox="0 0 56 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                       d="M0.939335 10.9393C0.35355 11.5251 0.35355 12.4749 0.939335 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51472C13.1924 2.92893 13.1924 1.97919 12.6066 1.3934C12.0208 0.807611 11.0711 0.807611 10.4853 1.3934L0.939335 10.9393ZM56 10.5L2 10.5V13.5L56 13.5V10.5Z"
                                       fill="currentcolor" />
                                 </svg>
                              </button>
                              <button class="testimonial-next">
                                 <svg width="56" height="24" viewBox="0 0 56 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                       d="M55.0607 10.9393C55.6465 11.5251 55.6465 12.4749 55.0607 13.0607L45.5147 22.6066C44.9289 23.1924 43.9792 23.1924 43.3934 22.6066C42.8076 22.0208 42.8076 21.0711 43.3934 20.4853L51.8787 12L43.3934 3.51472C42.8076 2.92893 42.8076 1.97919 43.3934 1.3934C43.9792 0.807611 44.9289 0.807611 45.5147 1.3934L55.0607 10.9393ZM0 10.5L54 10.5V13.5L0 13.5L0 10.5Z"
                                       fill="currentcolor" />
                                 </svg>
                              </button>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
            <!-- testimonial area end -->
            <!--testimonials-->
         </main>
         <!-- footer start -->
         <?php include('inc/footer.php')?>
         <!-- footer end -->
   </div>
   </div>
   <!-- script start -->
   <?php include('inc/footer-data.php')?>
   <!-- script end -->
</body>
</html>