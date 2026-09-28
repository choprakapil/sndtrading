<?php
require('inc/function.php');
$breadcrumb = mysqli_query($conn, "SELECT * FROM `tbl_breadcrumb` where `brd_status`='1' and `brd_id`='6'");
$breadcrumbs = ($breadcrumb && mysqli_num_rows($breadcrumb) > 0) ? mysqli_fetch_assoc($breadcrumb) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php if(!empty($breadcrumbs['metatag'])){ echo $breadcrumbs['metatag']; }else{ echo 'Our Team'; } ?> | <?=SITE_NAME?></title>
    <meta name="description" content="<?=$breadcrumbs['metadesc'] ?? ''?>">
    <meta name="keywords" content="<?=$breadcrumbs['metakeyword'] ?? ''?>">
    <?php include('inc/head.php')?>
    
</head>
<body>

     <!-- header start -->
   <?php include('inc/header.php')?>
   <!-- header end -->

   <!-- breadcrumb area start -->
   <div class="breadcrumb__pt">
               <?php if(!empty($breadcrumbs['brd_image'])){ ?>
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
                                 <h3 class="breadcrumb__title tp-split-text tp-split-in-right">Our Team</h3>
                              </div>
                              <div class="breadcrumb__list">
                                 <span><a href="<?=SITE_URL?>">Home</a></span>
                                 <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                 <span>Our Team</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- breadcrumb area end -->
<!-- team area start -->
<?php
$teams = mysqli_query($conn, "SELECT * FROM `tbl_teams` where `tt_status`='1' order by tt_sort asc");
if(mysqli_num_rows($teams)){
?>
<div class="tp-team-area grey-bg fix pb-80 pt-60">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="tp-team-wrapper">
                           <div class="swiper-container tp-team-active">
                               
                              <div class="row">
                                <?php while($team = mysqli_fetch_array($teams)){ ?>
                                 <div class="col-lg-3 col-sm-6 col-6">
                                    <div class="tp-team-item">
                                       <div class="tp-team-thumb p-relative fix mb-20">
                                          <a href="<?=SITE_URL?>team/<?=$team['tt_url']?>"><img src="<?=SITE_URL?>uploads/team/<?=$team['tt_image']?>" alt="<?=$team['tt_alt']?>"></a>
                                          <!--<div class="tp-team-social">-->
                                          <!--   <?php if($team['tt_facebook']>0){ ?><a href="<?=$team['tt_facebook']?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a><?php } ?>-->
                                          <!--   <?php if($team['tt_twitter']>0){ ?><a href="<?=$team['tt_twitter']?>" target="_blank"><i class="fa-brands fa-twitter"></i></a><?php } ?>-->
                                          <!--   <?php if($team['tt_insta']>0){ ?><a href="<?=$team['tt_insta']?>" target="_blank"><i class="fa-brands fa-instagram"></i></a><?php } ?>-->
                                          <!--   <?php if($team['tt_whatsapp']>0){ ?><a href="<?=$team['tt_whatsapp']?>" target="_blank"><i class="fa-brands fa-whatsapp"></i></a><?php } ?>-->
                                          <!--</div>-->
                                       </div>
                                       <div class="tp-team-author-info">
                                          <h5 class="tp-team-title"><a href="<?=SITE_URL?>team/<?=$team['tt_url']?>"><?=$team['tt_name']?></a></h5>
                                          <!--<span><?=$team['tt_location']?></span>-->
                                         <!-- <div class="tp-service-2-button">-->
                                         <!--   <a class="tp-btn-border-lg grey-border" href="<?=SITE_URL?>team/<?=$team['tt_url']?>">-->
                                         <!--      <span>Read More</span>-->
                                         <!--   </a>-->
                                         <!--</div>-->
                                         <div class="postbox__read-more">
                                       <a href="<?=SITE_URL?>team/<?=$team['tt_url']?>" class="tp-btn-border-bottom-2 p-relative">
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
                                         
                                       </div>
                                    </div>
                                 </div>
                                <?php } ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- team area end -->
<?php } ?>

    

     <!-- footer start -->
     <?php include('inc/footer.php')?>
     <!-- footer end -->


    <!-- script start -->
   <?php include('inc/footer-data.php')?>
   <!-- script end -->



</body>
</html>