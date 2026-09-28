<?php require('inc/function.php'); 
$breadcrumb = mysqli_query($conn, "SELECT * FROM `tbl_breadcrumb` where `brd_status`='1' and `brd_id`='7'");
$breadcrumbs = mysqli_fetch_assoc($breadcrumb);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php if($breadcrumbs['metatag']>''){ echo $breadcrumbs['metatag']; }else{ echo 'Gallery'; } ?> | <?=SITE_NAME?></title>
    <meta name="description" content="<?=$breadcrumbs['metadesc']?>">
    <meta name="keywords" content="<?=$breadcrumbs['metakeyword']?>">
    <?php include('inc/head.php')?>
</head>
<style>
.nav-pills .nav-link.active{
        color: var(--tp-common-white);
    background-color: var(--tp-theme-1);
    border-radius:inherit;
    padding: 0 27px;
}

.nav-pills .nav-link{
    color: var(--tp-theme-1);
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 1.2px;
    text-transform: capitalize;
    height: 40px;
    line-height: 16px;
    padding: 0 27px;
    margin: 0px 12px;
    border-radius:inherit;
    border: 1px solid var(--tp-theme-1);
}
</style>
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
                                 <h3 class="breadcrumb__title tp-split-text tp-split-in-right">Gallery</h3>
                              </div>
                              <div class="breadcrumb__list">
                                 <span><a href="<?=SITE_URL?>">Home</a></span>
                                 <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                 <span>Gallery</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- breadcrumb area end -->
<?php
$catpro = mysqli_query($conn, "SELECT * FROM `tbl_gallery_category` where `glry_status`='1' order by glry_sort asc");
if(mysqli_num_rows($catpro) > 0) {
?>
        <!-- project area start -->
        <div class="tp-project-4-area pt-80 pb-80 fix">
               <div class="container">
             
                    <div class="tab-content" id="pills-tabContent">
                        <?php
                        $cat_count = 0;
                        mysqli_data_seek($catpro, 0); // Reset the category query to start from the beginning
                        while ($catpros = mysqli_fetch_array($catpro)) {
                        ?>
                            <div class="tab-pane fade <?php if ($cat_count == 0) {
                                                            echo 'show active';
                                                        } ?>" id="pills-home-<?= $cat_count; ?>" role="tabpanel" aria-labelledby="pills-home-tab-<?= $cat_count; ?>">
                                
                                <div class="row">
                                    <?php
                                    $gallpro = mysqli_query($conn, "SELECT * FROM `tbl_gallery` where `glry_status`='1' order by glry_sort asc");
                                    while ($gallpros = mysqli_fetch_array($gallpro)) {
                                    ?>
                                        <div class="col-lg-3 col-md-4 col-6 ">
                                            <div class="tp-project-4-item p-relative ">
                                                <div class="tp-project-4-thumb">
                                                    <a data-fancybox="gallery" data-src="<?= SITE_URL ?>uploads/gallery/<?= $gallpros['glry_image'] ?>" >
                                                    <img src="<?= SITE_URL ?>uploads/gallery/<?= $gallpros['glry_image'] ?>" alt=""></a>
                                                </div>
                                                <div class="image-title">
                                                    <h4><?= $gallpros['glry_name'] ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php $cat_count++;
                        } ?>
                    </div>
               </div>
            </div>
            <!-- project area end -->
<?php } ?>




     <!-- footer start -->
     <?php include('inc/footer.php')?>
     <!-- footer end -->


    <!-- script start -->
   <?php include('inc/footer-data.php')?>
   <!-- script end -->
<script>
    
    const myCarousel = new Carousel(document.querySelector("#myCarousel"), {
preload: 1
});

Fancybox.assign('[data-fancybox="carousel-gallery"]', {
closeButton: "top",
Thumbs: false,
Carousel: {
Dots: true,
on: {
change: (that) => {
myCarousel.slideTo(myCarousel.getPageforSlide(that.page), {
friction: 0
});
}
}
}
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    
</body>
</html>