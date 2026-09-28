<?php
require('inc/function.php');
$breadcrumb = mysqli_query($conn, "SELECT * FROM `tbl_breadcrumb` where `brd_status`='1' and `brd_id`='8'");
$breadcrumbs = mysqli_fetch_assoc($breadcrumb);
$turl = $_GET['turl'];
$teams = mysqli_query($conn, "SELECT * FROM `tbl_teams` WHERE `tt_url`='$turl'");
if(mysqli_num_rows($teams)>0){
    $team = mysqli_fetch_array($teams);
}else{
    header('Location:'.SITE_URL.'404');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php if($team['title']>0){ ?>
          <title><?= $team['title']?> | <?=SITE_NAME?></title>
    <?php } else{ ?>
          <title><?= $team['tt_name']; ?> | <?=SITE_NAME?></title>
    <?php } ?>
    <meta name="description" content="<?=$team['metadesc']?>">
    <meta name="keywords" content="<?=$team['keyword']?>">
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
                                 <h3 class="breadcrumb__title tp-split-text tp-split-in-right"><?=$team['tt_name']?></h3>
                              </div>
                              <div class="breadcrumb__list">
                                 <span><a href="<?=SITE_URL?>">Our Team</a></span>
                                 <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                 <span><?=$team['tt_name']?></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- breadcrumb area end -->

            
            <!-- team-details area start -->
            <div class="tp-team-details-area tp-team-details-inner-style pt-60 pb-80">
               <div class="container">
                  <div class="tp-team-title-wrap mb-20"></div>
                  <div class="row align-items-center">
                     <div class="col-xl-3 col-lg-3">
                        <div class="tp-team-details-thumb text-sm-center">
                           <img src="<?=SITE_URL?>uploads/team/<?=$team['tt_image']?>" alt="<?=$team['tt_alt']?>">
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6">
                        <div class="tp-team-details-wrap">                    
                           <div class="tp-team-author-info pb-25">
                              <h5 class="tp-team-details-title mb-5"><?=$team['tt_name']?></h5>
                              <span><?=$team['tt_location']?></span>
                           </div>
                           <div class="tp-team-details-text pb-15">
                              <p><?=$team['tt_detail']?></p>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-3">
                        <div class="sidebar__wrapper">
                           <div class="sidebar__widget mb-30">
                              <h3 class="sidebar__widget-title">Our Team</h3>
                              <div class="sidebar__widget-content">
                                 <div class="sidebar__post">
                                     <?php
                                    $teams = mysqli_query($conn, "SELECT * FROM `tbl_teams` where `tt_status`='1' order by tt_sort asc");
                                    while($team = mysqli_fetch_array($teams)){ ?>
                                    <div class="rc__post mb-25 d-flex align-items-center">
                                       <div class="rc__post-thumb mr-20">
                                          <a href="<?=SITE_URL?>team/<?=$team['tt_url']?>"><img src="<?=SITE_URL?>uploads/team/<?=$team['tt_image']?>" alt="<?=$team['tt_alt']?>"></a>
                                       </div>
                                       <div class="rc__post-content">
                                          
                                          <h3 class="rc__post-title">
                                             <a href="<?=SITE_URL?>team/<?=$team['tt_url']?>"><?=$team['tt_name']?></a>
                                          </h3>
                                          <div class="rc__meta">
                                             <span><?=$team['tt_location']?> </span>
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
            </div>
            <!-- team-details area end -->

               <!-- footer start -->
     <?php include('inc/footer.php')?>
     <!-- footer end -->


    <!-- script start -->
   <?php include('inc/footer-data.php')?>
   <!-- script end -->
</body>
</html>