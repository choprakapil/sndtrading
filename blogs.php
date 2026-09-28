<?php
require('inc/function.php');
$breadcrumb = mysqli_query($conn, "SELECT * FROM `tbl_breadcrumb` where `brd_status`='1' and `brd_id`='1'");
$breadcrumbs = mysqli_fetch_assoc($breadcrumb);
if(isset($_GET['burl'])){
    $burl = $_GET['burl'];
}else{
    $burl ='';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php if($breadcrumbs['metatag']>''){ echo $breadcrumbs['metatag']; }else{ echo 'Blogs'; } ?> | <?=SITE_NAME?></title>
    <meta name="description" content="<?=$breadcrumbs['metadesc']?>">
    <meta name="keywords" content="<?=$breadcrumbs['metakeyword']?>">
    <?php include('inc/head.php')?>
</head>
<body>

     <!-- header start -->
     <?php include('inc/header.php')?>
   <!-- header end -->

        <!-- breadcrumb area start -->
        <div class="breadcrumb__pt">
               <?php if($breadcrumbs['brd_image']>0){ ?>
               <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
                  data-background="<?=SITE_URL?>uploads/breadcrumb/<?=$breadcrumbs['brd_image']?>" style="background-image: url('<?=SITE_URL?>uploads/breadcrumb/<?=$breadcrumbs['brd_image']?>');">
                   <?php }else{ ?>
                   <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
                  data-background="<?=SITE_URL?>assets/img/breadcurmb/breadcurmb.jpg">
                   <?php } ?>
                  <div class="container">
                     <div class="row">
                        <div class="col-xxl-12">
                           <div class="breadcrumb__content z-index">
                              <div class="breadcrumb__section-title-box mb-20">
                                 <h3 class="breadcrumb__title tp-split-text tp-split-in-right">Blogs</h3>
                              </div>
                              <div class="breadcrumb__list">
                                 <span><a href="<?=SITE_URL?>">Home</a></span>
                                 <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                 <span>Blogs</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- breadcrumb area end -->

             <!-- project area start -->
        <div class="tp-project-4-area pt-60 pb-40 fix">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="tp--2-title-box d-none">
                              <span class="tp-section-subtitle">Latests Projects</span>
                              <h3 class="tp-section-title">Where Form Meets Function <br> with Flair designer</h3>
                           </div>
                     </div>
                     <div class="col-xl-12 text-center">
                        <div class="tp-project-filter masonary-menu  pb-50">
                            <a href="<?=SITE_URL?>blogs" <?php if(!isset($_GET['burl'])){ ?>class="active"<?php } ?>><span>All</span></a>
                            <?php
                               $blogsscat = mysqli_query($conn, "SELECT * FROM `tbl_blogcategory` WHERE `status`='1' order by sort asc");
                               while($blogcat = mysqli_fetch_assoc($blogsscat)){
                            ?>
                            <a href="<?=SITE_URL?>blogs/<?=$blogcat['url']?>" <?php if($blogcat['url']==$burl){ ?>class="active"<?php } ?>><span><?=$blogcat['name']?></span></a>
                            <?php } ?>
                        </div>
                     </div>
                  </div>
                  <div class="row grid gx-35">
                    <?php
                        if(isset($_GET['burl'])){
                           $blogsscat2 = mysqli_query($conn, "SELECT * FROM `tbl_blogcategory` WHERE `url`='$burl' and `status`='1' order by `sort` asc");
                           while($blogcat2 = mysqli_fetch_assoc($blogsscat2)){
                               $blogss = mysqli_query($conn, "SELECT * FROM `tbl_blogs` WHERE `b_category`='$blogcat2[id]' and `b_status`='1'");
                                  while($blog = mysqli_fetch_assoc($blogss)){
                        ?>
                     <div class="col-lg-3 col-md-6 grid-item">
                     <article class="postbox__item format-image blog-box mb-10">
                              <div class="postbox__thumb w-img mb-20">
                                 <a href="<?=SITE_URL?>blogs/<?=$blogcat2['url']?>/<?=$blog['b_url']?>">
                                    <img src="<?=SITE_URL?>uploads/blogs/<?=$blog['b_image']?>" alt="<?=$blog['b_alt']?>">
                                 </a>
                              </div>
                              <div class="postbox__content-2">
                              <div class="blog__thumb-text-2 d-none d-md-block">
                                    <span><?= date('d M', strtotime($blog['b_date'])) ?></span>
                                 </div>
                                 <h3 class="postbox__title tp-split-text tp-split-in-right">
                                    <a href="<?=SITE_URL?>blogs/<?=$blogcat2['url']?>/<?=$blog['b_url']?>"><?=$blog['b_title']?></a>
                                 </h3>
                                 <div class="postbox__text pb-10">
                                    <p><?= substr($blog['b_description'],0,100);?></p>
                                 </div>
                                 <div class="postbox__button-box flex-wrap d-md-flex justify-content-between">
                                    <div class="postbox__read-more">
                                       <a href="<?=SITE_URL?>blogs/<?=$blogcat2['url']?>/<?=$blog['b_url']?>" class="tp-btn-border-bottom p-relative">
                                          <span>read more
                                             <svg width="11" height="8" viewBox="0 0 11 8" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                   d="M10.3536 4.35355C10.5488 4.15829 10.5488 3.84171 10.3536 3.64645L7.17157 0.464467C6.97631 0.269205 6.65973 0.269204 6.46447 0.464467C6.2692 0.659729 6.2692 0.976311 6.46447 1.17157L9.29289 4L6.46447 6.82843C6.2692 7.02369 6.2692 7.34027 6.46447 7.53553C6.65973 7.7308 6.97631 7.7308 7.17157 7.53553L10.3536 4.35355ZM-4.37114e-08 4.5L10 4.5L10 3.5L4.37114e-08 3.5L-4.37114e-08 4.5Z"
                                                   fill="currentcolor" />
                                             </svg>
                                          </span>
                                          <span class="bottom-line"></span>
                                       </a>
                                    </div>
                                    <div class="postbox__meta mb-15">
                                      
                                       
                                    </div>
                                 </div>
                              </div>
                           </article>
                     </div>
                       <?php } } }else{ 
                        $blogsscat2 = mysqli_query($conn, "SELECT * FROM `tbl_blogcategory` WHERE `status`='1' order by `sort` asc");
                       while($blogcat2 = mysqli_fetch_assoc($blogsscat2)){
                    $blogss = mysqli_query($conn, "SELECT * FROM `tbl_blogs` WHERE `b_category`='$blogcat2[id]' and `b_status`='1'");
                    while($blog = mysqli_fetch_assoc($blogss)){
                    ?>
                     <div class="col-lg-3 col-md-6 grid-item">
                     <article class="postbox__item format-image blog-box mb-40">
                              <div class="postbox__thumb w-img mb-20">
                                 <a href="<?=SITE_URL?>blogs/<?=$blogcat2['url']?>/<?=$blog['b_url']?>">
                                    <img src="<?=SITE_URL?>uploads/blogs/<?=$blog['b_image']?>" alt="">
                                 </a>
                              </div>
                              <div class="postbox__content-2">
                                 <!-- <div class="postbox__meta">
                                    <span>April 22 </span>
                                 </div> -->
                                 <div class="blog__thumb-text-2 d-none d-md-block">
                                    <span><?= date('d M', strtotime($blog['b_date'])) ?></span>
                                 </div>
                                 <h3 class="postbox__title tp-split-text tp-split-in-right">
                                    <a href="<?=SITE_URL?>blogs/<?=$blogcat2['url']?>/<?=$blog['b_url']?>"><?=$blog['b_title']?></a>
                                 </h3>
                                 <div class="postbox__text pb-10">
                                    <p><?= substr($blog['b_description'],0,100);?></p>
                                 </div>
                                 <div class="postbox__button-box flex-wrap d-md-flex justify-content-between">
                                    <div class="postbox__read-more">
                                       <a href="<?=SITE_URL?>blogs/<?=$blogcat2['url']?>/<?=$blog['b_url']?>" class="tp-btn-border-bottom p-relative">
                                          <span>read more
                                             <svg width="11" height="8" viewBox="0 0 11 8" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                   d="M10.3536 4.35355C10.5488 4.15829 10.5488 3.84171 10.3536 3.64645L7.17157 0.464467C6.97631 0.269205 6.65973 0.269204 6.46447 0.464467C6.2692 0.659729 6.2692 0.976311 6.46447 1.17157L9.29289 4L6.46447 6.82843C6.2692 7.02369 6.2692 7.34027 6.46447 7.53553C6.65973 7.7308 6.97631 7.7308 7.17157 7.53553L10.3536 4.35355ZM-4.37114e-08 4.5L10 4.5L10 3.5L4.37114e-08 3.5L-4.37114e-08 4.5Z"
                                                   fill="currentcolor" />
                                             </svg>
                                          </span>
                                          <span class="bottom-line"></span>
                                       </a>
                                    </div>
                                    <div class="postbox__meta mb-15">
                                      
                                       
                                    </div>
                                 </div>
                              </div>
                           </article>
                     </div>
                      <?php } } } ?>
                  </div>
               </div>
            </div>
            
            <!-- project area end -->
      
    

     <!-- footer start -->
     <?php include('inc/footer.php')?>
     <!-- footer end -->


    <!-- script start -->
   <?php include('inc/footer-data.php')?>
   <!-- script end -->

</body>
</html>