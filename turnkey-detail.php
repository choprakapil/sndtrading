<?php 
require('inc/function.php');
if(isset($_GET['purl'])){
    $purl = $_GET['purl'];
    $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_turnkey` WHERE `url`='$purl' and `status`='1'"));
}else{
header('location:'.SITE_URL.'404.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <?php if($product['metatag']>0){ ?>
          <title><?= $product['metatag']?> | <?=SITE_NAME?></title>
    <?php } else{ ?>
          <title><?= $product['name']; ?> | <?=SITE_NAME?></title>
    <?php } ?>
    <meta name="description" content="<?=$product['metadesc']?>">
    <meta name="keywords" content="<?=$product['keyword']?>">
    <?php include('inc/head.php')?>
    
</head>
<body>

     <!-- header start -->
   <?php include('inc/header.php')?>
   <!-- header end -->


   
   <!-- breadcrumb area start -->
   <div class="breadcrumb__pt">
               <?php if($product['broadimage']>0){ ?>
               <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
                  data-background="<?=SITE_URL?>uploads/turnkey/<?=$product['broadimage']?>" style="background-image: url('<?=SITE_URL?>uploads/turnkey/<?=$product['broadimage']?>');">
                   <?php }else{ ?>
                   <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
                  data-background="<?=SITE_URL?>assets/img/breadcurmb/breadcurmb.jpg">
                   <?php } ?>
                  <div class="container">
                     <div class="row">
                        <div class="col-xxl-12">
                           <div class="breadcrumb__content z-index">
                              <div class="breadcrumb__section-title-box mb-20">
                                 <h3 class="breadcrumb__title tp-split-text tp-split-in-right"><?= $product['name'] ?></h3>
                              </div>
                              <div class="breadcrumb__list">
                                 <span><a href="<?=SITE_URL?>">Home</a></span>
                                 <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                 <span>Turnkey Interior/Exterio</span>
                                 <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                 <span><?= $product['name'] ?></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- breadcrumb area end -->


             <!--product-details-area-start -->
             <div class="tp-product-details-area pt-80">
               <div class="container">
                   <div class="row">
                       <div class="col-xl-6 col-lg-6">
                           <div class="tp-shop-details__wrapper">
                               <div class="tp-shop-details__tab-content-box mb-10">
                                   <div class="tab-content" id="nav-tabContent">
                                       <div class="tab-pane fade show active" id="nav-one" role="tabpanel"
                                           aria-labelledby="nav-one-tab">
                                           <div class="tp-service-details__tab-big-img pt-25">
                                               <img src="<?=SITE_URL?>uploads/turnkey/<?=$product['inner_image']?>" alt="<?=$product['inner_image_alt']?>">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               
                           </div>
                       </div>
                       <div class="col-xl-6 col-lg-6">
                           <div class="tp-shop-details__right-warp">
                              
                           <h3 class="tp-section-title "><?=$product['name']?></h3>
                               
                               <div class="tp-shop-details__text-2 pt-20">
                                   <p><?=$product['shortdesc']?></p>
                               </div>
                              
                               <div class="tp-shop-details__quantity-wrap mt-30 d-flex align-items-center">
                                   <div class="tp-shop-details__btn mr-30">
                                       <a class="tp-btn-theme" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Enquiry Now</a>
                                   </div>
                                   
                               </div>
                           </div>
                       </div>
                   </div>
                  
               </div>
           </div>
           <!-- product-details-area-end -->

           
            <!-- New Section start -->
            <div class="tp-about-4-area pt-80 pb-80">
               <div class="container about-sec pb-10">
                    <div class="row align-items-end">
                        <div class="col-xl-6 col-lg-6 col-md-7">
                         <!--<div class="tp--2-title-box pt-10"> -->
                              <!--<h3 class="tp-section-title  about-head">KNOW MORE ABOUT US</h3>-->
                            <!--</div> -->
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tp-sec-text">
                                 <p><?=$product['description']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New Section end -->
<?php
$catpro = mysqli_query($conn, "SELECT * FROM `tbl_portfolio_category` where `status`='1' and `service_id`='$product[id]' order by sort asc");
if(mysqli_num_rows($catpro) > 0) {
?>
 <!-- project area start -->
 <div class="tp-project-4-area pt-80 pb-70 fix">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="tp-project-filter masonary-menu text-center pb-50">
                            <button data-filter="*" class="active"><span>All</span></button>
                            <?php
                            $cat_count=0;
                            while($catpros = mysqli_fetch_array($catpro)){
                            ?>
                           <button data-filter=".cat<?=$cat_count;?>">
                               <span><?= $catpros['name']; ?></span>
                            </button>
                           <?php $cat_count++; } ?>
                        </div> 
                        </div>
                     </div>
                  <div class="row grid gx-35">
                       <?php
                         $cat_count=0;
                         $catpro = mysqli_query($conn, "SELECT * FROM `tbl_portfolio_category` where `status`='1' and `service_id`='$product[id]' order by sort asc");
                         while($catpros = mysqli_fetch_array($catpro)){
                             $gallpro = mysqli_query($conn, "SELECT * FROM `tbl_portfolio` where `b_status`='1' AND `b_category`='$catpros[id]' order by b_sort asc");
                              while($gallpros = mysqli_fetch_array($gallpro)){ 
                         ?>
                         <div class="col-lg-3 col-md-4 col-6 grid-item cat<?=$cat_count;?>">
                            <div class="tp-project-4-item p-relative">
                               <div class="tp-project-4-thumb">
                                   <a data-fancybox="gallery" data-src="<?=SITE_URL?>uploads/portfolioimage/<?=$gallpros['b_image']?>" alt="<?=$gallpros['b_alt']?>" >
                                  <img src="<?=SITE_URL?>uploads/portfolioimage/<?=$gallpros['b_image']?>" alt="<?=$gallpros['b_alt']?>"></a>
                               </div>
                                <div class="image-title">
                               <h4><?=$gallpros['name']?></h4>
                           </div>
                            </div>
                         </div>
                      <?php } $cat_count++; } ?>
                  </div>
               </div>
            </div>
            <!-- project area end -->
<?php } ?>


            <!-- contact form start -->
           <div class="tp-form-area pb-20 pt-60  ">
               <div class="container">
                  <div class="tp-form-top">
                     <div class="row justify-content-center"> 
                        <div class="col-xl-10 col-lg-10 mb-50 ">
                           <div class="tp-form-box tp-form-box-style-2 ">
                           <div class="tp--2-title-box cont-ser-sec">
                              <span class="tp-section-subtitle">Contact</span>
                              <h3 class="tp-section-title">Get in Touch</h3>
                           </div>
                              <form id="contact-form" action="" method="POST">
                                 <div class="row">
                                    <div class="col-xl-6 col-lg-6 mb-30">
                                       <div class="tp-form-input-box">
                                       <label class="cont-label" required>Name</label>
                                          <input name="name" type="text" placeholder="Name">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-30">
                                       <div class="tp-form-input-box">
                                       <label class="cont-label" required>Email</label>
                                          <input name="email" type="email" placeholder="Your Email">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-30">
                                       <div class="tp-form-input-box">
                                          <label class="cont-label" required>Phone</label>
                                          <input name="phone" type="text" placeholder="Phone">
                                       </div>
                                    </div>                     
                                    <div class="col-xl-6 col-lg-6 mb-30">
                                       <div class="tp-form-input-box">
                                       <label class="cont-label" required>Service</label>
                                       <select>
                                                   <option>Select Option</option>
                                                   <option>Worldwide</option>
                                                   <option>Exterior</option>
                                                   <option>Office</option>
                                             </select>
                                       </div>
                                    </div>                     
                                    <div class="col-xl-12 col-lg-12 mb-20">
                                       <div class="tp-form-textarea-box">
                                       <label class="cont-label" required>Message</label>
                                          <textarea name="message" placeholder="Message"></textarea>
                                       </div>
                                    </div>
                                 </div>
                                 <button class="tp-btn-black" type="submit"><span>Submit</span></button>
                                 <p class="ajax-response"></p>
                              </form>
                           </div>                   
                        </div>
                        
                     </div>
                  </div>
                 
               </div>
            </div>
            <!-- contact form end -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="tp-section-title modal-title" mt-10 id="exampleModalLabel">Enquiry Now</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- contact form start -->
        <div class="tp-form-area pb-20">
               <div class="container">
                  <div class="tp-form-top">
                     <div class="row"> 
                        <div class="col-xl-12 col-lg-12 ">
                           <div class="tp-form-box tp-form-box-style-2">
                              <form id="modal-form" action="" method="POST">
                                 <div class="row">
                                    <div class="col-xl-6 col-lg-6 ">
                                       <div class="tp-modal-form-input-box modal-box">
                                       <label class="cont-label" required>Name</label>
                                          <input name="name" type="text" placeholder="Your Name">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-30">
                                       <div class="tp-modal-form-input-box modal-box">
                                       <label class="cont-label" required>Email</label>
                                          <input name="email" type="email" placeholder="Email">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-30">
                                       <div class="tp-modal-form-input-box modal-box">
                                       <label class="cont-label" required>Phone</label>
                                          <input name="phone" type="text" placeholder="Phone">
                                       </div>
                                    </div>                     
                                    <div class="col-xl-6 col-lg-6 mb-30">
                                    <div class="tp-modal-form-input-box modal-box">
                                    <label class="cont-label" required>Service</label>
                                             <select>
                                                   <option>Select Option</option>
                                                   <option>Worldwide</option>
                                                   <option>Exterior</option>
                                                   <option>Office</option>
                                             </select>
                                          </div>
                                    </div>                     
                                    <button type="button" class="tp-btn-black modal-btn">Submit</button>
                                 </div>
                              </form>
                           </div>                   
                        </div>
                        
                     </div>
                  </div>
                 
               </div>
            </div>
            <!-- contact form end -->
      </div>
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