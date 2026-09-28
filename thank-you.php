<?php require('inc/function.php'); 
$breadcrumb = mysqli_query($conn, "SELECT * FROM `tbl_breadcrumb` where `brd_status`='1' and `brd_id`='12'");
$breadcrumbs = mysqli_fetch_assoc($breadcrumb);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php if($breadcrumbs['metatag']>''){ echo $breadcrumbs['metatag']; }else{ echo 'Thank You'; } ?> | <?=SITE_NAME?></title>
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
                                 <h3 class="breadcrumb__title tp-split-text tp-split-in-right">Thank You</h3>
                              </div>
                              <div class="breadcrumb__list">
                                 <span><a href="<?=SITE_URL?>">Home</a></span>
                                 <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                 <span>Thank You</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- breadcrumb area end -->


            <!-- form area start -->
            <div class="tp-form-area pt-80 pb-80">
               <div class="container">
                    <div class="text-center">
                        <img src="<?=SITE_URL?>uploads/thank-you-preview.png" width="280px"><br>
                      <h2>Thank You For Contacting Us!</h2>
                      
                      <a class="tp-btn-black mt-2" href="<?= SITE_URL ?>">
                          <span>Back To Home</span>
                       </a>
                   </div>
               </div>
            </div>

    <!-- footer start -->
    <?php include('inc/footer.php')?>
     <!-- footer end -->


    <!-- script start -->
   <?php include('inc/footer-data.php')?>
   <!-- script end -->


</body>
</html>