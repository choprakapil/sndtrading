<?php
require('inc/function.php');
  $about = mysqli_query($conn, "SELECT * FROM `tbl_about` where `ab_status`='1'");
  $abouto = mysqli_fetch_assoc($about);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php if($abouto['meta_title']>0){ ?>
  <title><?= $abouto['meta_title']?> | <?=SITE_NAME?></title>
<?php } else{ ?>
 <title><?= $abouto['ab_title']; ?> | <?=SITE_NAME?></title>
<?php } ?>
<meta name="description" content="<?= $abouto['meta_keyword']?>">
<meta name="keywords" content="<?= $abouto['meta_desc']?>">
    <?php include('inc/head.php')?>
</head>
<body>

     <!-- header start -->
   <?php include('inc/header.php')?>
   <!-- header end -->


    <!-- breadcrumb area start -->
    <div class="breadcrumb__pt">
               <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
                  data-background="<?= SITE_URL ?>uploads/about/<?=  $abouto['ab_broadimage'] ?>">
                  <div class="container">
                     <div class="row">
                        <div class="col-xxl-12">
                           <div class="breadcrumb__content z-index">
                              <div class="breadcrumb__section-title-box mb-20">
                                 <h3 class="breadcrumb__title tp-split-text tp-split-in-right">About Us</h3>
                              </div>
                              <div class="breadcrumb__list">
                                 <span><a href="<?=SITE_URL?>">Home</a></span>
                                 <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                 <span>About Us</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- breadcrumb area end -->



   <!-- about area start -->

    <?php
        $aboutt = mysqli_query($conn, "SELECT * FROM `tbl_about` where `ab_status`='1'");
        $abouts = mysqli_fetch_assoc($aboutt);
        ?>
            <div class="tp-about-4-area pt-80 pb-20">
               <div class="container">
                  <div class="row align-items-center d-flex">
                      <div class="col-xl-6 col-lg-6">
                        <div class="tp-about-4-right">
                           <div class="tp--2-title-wrap">
                              <div class="row align-items-end">
                                 <div class="col-xl-12">
                                    <div class="tp--2-title-box text-left">
                                       <span class="tp-section-subtitle">About</span>
                                       <h3 class="tp-section-title "><?= $abouts['ab_title']; ?></h3>
                                    </div>
                                 </div>
                                
                              </div>
                           </div>
                           <div class="tp-about-4-text text-left">
                              <p><?= $abouts['ab_desc']; ?></p>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6 ">
                        <div class="tp-about-4-left p-relative d-flex justify-content-between">
                          
                           <div class="tp-about-4-thumb-1">
                              <img class="back" src="<?= SITE_URL ?>uploads/about/<?= $abouts['ab_image']; ?>" alt="<?= $abouts['ab_alt1']; ?>">
                           </div>
                       
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
            <!-- about area end -->

            <?php
            if($abouts['ab_desclong']>''){
            ?>
            <!-- New Section start -->
            <div class="tp-about-4-area pt-30 pb-80">
               <div class="container about-sec pb-10">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="">
                             <p><?= $abouts['ab_desclong']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- New Section end -->
            <?php } ?>


            


     <!-- footer start -->
     <?php include('inc/footer.php')?>
     <!-- footer end -->


    <!-- script start -->
   <?php include('inc/footer-data.php')?>
   <!-- script end -->
   
   <script>
$(document).ready(function() {
// Swiper: Slider
    new Swiper('.tp-team-active', {
        loop: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 4,
        paginationClickable: true,
        spaceBetween: 20,
        breakpoints: {
            1920: {
                slidesPerView: 4,
            },
            1028: {
                slidesPerView: 4,
            },
            768: {
                slidesPerView: 1,
            },
            480: {
                slidesPerView: 1,
            },
            0: {
                slidesPerView: 1,
            }
        }
    });
});
</script>
    
</body>
</html>