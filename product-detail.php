<?php 
require('inc/function.php');
if(isset($_GET['curl']) && isset($_GET['purl'])){
    $curl = $_GET['curl'];
    $purl = $_GET['purl'];
    $procat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_category` WHERE `url`='$curl' and `status`='1' order by `sort` asc"));
    $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_product` WHERE `url`='$purl' and `status`='1'"));
    if(!$product){
        header('Location: '.SITE_URL.'404');
        exit;
    }
}else{
header('location:'.SITE_URL.'404');
exit;
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
                <?php if($product['breadcrumb']>0){ ?>
               <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
                  data-background="<?=SITE_URL?>uploads/product/<?=$product['breadcrumb']?>" style="background-image: url('<?=SITE_URL?>uploads/product/<?=$product['breadcrumb']?>');">
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
                                 <span><?= $procat['name'] ?></span>
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
            <div class="tp-product-details-area  pt-80">
               <div class="container">
                   <div class="row">
                       <div class="col-xl-6 col-lg-6">
                           <div class="tp-shop-details__wrapper">
                               <div class="tp-shop-details__tab-content-box mb-20">
                                   <div class="tab-content" id="nav-tabContent">
                                       <?php if($product['images']>0){
                                       $explode = explode(',',$product['images']);
                                       foreach($explode as $key => $img){
                                       ?>
                                       <div class="tab-pane fade <?php if($key==0){ echo 'show active'; } ?>" id="nav-one-<?=$key?>" role="tabpanel"
                                           aria-labelledby="nav-one-tab">
                                           <div class="tp-shop-details__tab-big-img">
                                               <img src="<?=SITE_URL?>uploads/product/<?=$img?>" width="50px">
                                           </div>
                                       </div>
                                       <?php } } else{ ?>
                                       <div class="tab-pane fade show active" id="nav-one" role="tabpanel"
                                           aria-labelledby="nav-one-tab">
                                           <div class="tp-shop-details__tab-big-img">
                                               <img src="<?=SITE_URL?>uploads/product/<?=$product['image']?>" width="50px">
                                           </div>
                                       </div>
                                       <?php } ?>
                                   </div>
                               </div>
                               <div class="tp-shop-details__tab-btn-box">
                                   <nav>
                                       <div class="nav nav-tab" id="nav-tab" role="tablist">
                                           <?php if($product['images']>0){
                                           $explode = explode(',',$product['images']);
                                           foreach($explode as $key => $img){
                                           ?>
                                           <button class="nav-links <?php if($key==0){ echo 'active'; } ?>" id="nav-one-tab" data-bs-toggle="tab"
                                               data-bs-target="#nav-one-<?=$key?>" type="button" role="tab" aria-controls="nav-one-<?=$key?>"
                                               aria-selected="true">
                                               <img src="<?=SITE_URL?>uploads/product/<?=$img?>" width="50px">
                                           </button>
                                          <?php } } else{ ?>
                                           <button class="nav-links active" id="nav-one-tab" data-bs-toggle="tab"
                                               data-bs-target="#nav-one" type="button" role="tab" aria-controls="nav-one"
                                               aria-selected="true">
                                               <img src="<?=SITE_URL?>uploads/product/<?=$product['image']?>" width="50px">
                                           </button>
                                       <?php } ?>
                                       </div>
                                   </nav>
                               </div>
                           </div>
                       </div>
                       <div class="col-xl-6 col-lg-6">
                           <div class="tp-shop-details__right-warp">
                            <div class="tp-shop-details__product-info top-category"><ul> <li class="category"><span> </span><?=$procat['name']?></li></ul></div>
                               <h3 class="tp-shop-details__title-sm"><?=$product['name']?></h3>
                              
                               <div class="tp-shop-details__text-2">
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

           <!-- productdetails section start -->
           <div class=" products-mainn-sec productdetail-sec ">
            <div class="container">
            <div class="row">
                       <div class="productdetails-tabs">
                           <div class="row">
                               <div class="col-xl-12 ">
                                   <div class="product-additional-tab">
                                       <div class="pro-details-nav ">
                                           <ul class="nav nav-tabs pro-details-nav-btn" id="myTabs" role="tablist">
                                               <?php if($product['description']>0){ ?>
                                               <li class="nav-item" role="presentation">
                                                   <button class="nav-links active" id="home-tab-1" data-bs-toggle="tab"
                                                       data-bs-target="#home-1" type="button" role="tab"
                                                       aria-controls="home-1" aria-selected="true"><span>Description</span></button>
                                               </li>
                                               <?php } ?>
                                               
                                           </ul>
                                       </div>
                                       <div class="tab-content tp-content-tab" id="myTabContent-2">
                                           <?php if($product['description']>0){ ?>
                                           <div class="tab-para tab-pane fade show active" id="home-1" role="tabpanel"
                                               aria-labelledby="home-tab-1">
                                               <p class="mb-30"><?=$product['description']?></p>
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
           <!-- productdetails section end -->
<?php 
$pro = mysqli_query($conn, "SELECT * FROM `tbl_product` where `status`='1' and `category_id`='$product[category_id]' order by sort asc");
   if(mysqli_num_rows($pro)>0){
?>
           <!---our products-->
           <div class=" products-mainn  pt-80  pb-80 d-none">
               <div class="container">
                  <div class="tp--2-title-wrap mb-10">
                     <div class="row align-items-end">
                        <div class="col-xl-12 ">
                           <div class="tp-product-2-title-box">
                              <span class="tp-section-subtitle">Explore More </span>
                              <h3 class="tp-section-title ">Related Products</h3>
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <div class="row">
                     
                     <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                           aria-labelledby="nav-home-tab">
                           <div class="tp-product-2-wrapper">
                              <div
                                 class="swiper-container tp-product-2-active swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                                 <div class="swiper-wrapper" id="swiper-wrapper-f65e504442b17602" aria-live="polite"
                                    style="transform: translate3d(-2652px, 0px, 0px); transition-duration: 0ms;">
                                    <?php 
                                        while($pros = mysqli_fetch_array($pro)){ 
                                    ?>
                                    <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="1"
                                       role="group" aria-label="1 / 12" style="width: 301.5px; margin-right: 30px;">
                                       <div class="tp-product-2-item text-center">
                                          <div class="tp-product-2-content">
                                             <h4 class="tp-product-2-title"><a href="<?=SITE_URL?>product/<?=$procat['url']?>/<?=$pros['url']?>"><?=$pros['name']?></a></h4>
                                          </div>
                                          <div class="tp-product-2-thumb-box p-relative">
                                             <div class="tp-product-2-thumb fix">
                                                <a href="<?=SITE_URL?>product/<?=$procat['url']?>/<?=$pros['url']?>"><img src="<?=SITE_URL?>uploads/product/<?=$pros['image']?>" alt="<?=$pros['image_alt']?>"></a>
                                                <div class="tp-product-2-btn">
                                                   <a class="tp-btn-black" href="<?=SITE_URL?>product/<?=$procat['url']?>/<?=$pros['url']?>">
                                                      <span>View Product</span>
                                                   </a>
                                                </div>
                                             </div>

                                          </div>
                                       </div>
                                    </div>
                                    <?php } ?>
                                   
                                 </div>
                                 <div class="tp-product-2-arrow-box d-none d-xl-block">
                                    <button class="product-prev" tabindex="0" aria-label="Previous slide" aria-controls="swiper-wrapper-ee12510286bdbc64c">
                                       <svg width="56" height="24" viewBox="0 0 56 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M0.939335 10.9393C0.35355 11.5251 0.35355 12.4749 0.939335 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51472C13.1924 2.92893 13.1924 1.97919 12.6066 1.3934C12.0208 0.807611 11.0711 0.807611 10.4853 1.3934L0.939335 10.9393ZM56 10.5L2 10.5V13.5L56 13.5V10.5Z" fill="currentcolor"></path>
                                       </svg>
                                    </button>
                                    <button class="product-next" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-ee12510286bdbc64c">
                                       <svg width="56" height="24" viewBox="0 0 56 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M55.0607 10.9393C55.6465 11.5251 55.6465 12.4749 55.0607 13.0607L45.5147 22.6066C44.9289 23.1924 43.9792 23.1924 43.3934 22.6066C42.8076 22.0208 42.8076 21.0711 43.3934 20.4853L51.8787 12L43.3934 3.51472C42.8076 2.92893 42.8076 1.97919 43.3934 1.3934C43.9792 0.807611 44.9289 0.807611 45.5147 1.3934L55.0607 10.9393ZM0 10.5L54 10.5V13.5L0 13.5L0 10.5Z" fill="currentcolor"></path>
                                       </svg>
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!---our products-->

<?php } ?>
   

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
                           <div class="tp-modal-form-box tp-form-box-style-2">
                              <form id="modal-form" action="https://html.hixstudio.net/interno-prev/interno/assets/mail.php" method="POST">
                                 <div class="row">
                                    <div class="col-xl-6 col-lg-6 mb-10">
                                       <div class="tp-modal-form-input-box modal-box">
                                       <label class="cont-label" required>Name</label>
                                          <input name="name" type="text" placeholder="Your Name">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-10">
                                       <div class="tp-modal-form-input-box modal-box">
                                       <label class="cont-label" required>Email</label>
                                          <input name="email" type="email" placeholder="Email">
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-10">
                                       <div class="tp-modal-form-input-box modal-box">
                                       <label class="cont-label" required>Phone</label>
                                          <input name="phone" type="tel" placeholder="Phone">
                                       </div>
                                    </div>                     
                                    <div class="col-xl-6 col-lg-6 mb-10">
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
                                    <div class="col-xl-12 col-lg-12 col-md">
                                         <div class="tp-modal-form-input-box modal-box">
                                             <label class="cont-label" required>Message</label>
                                          <textarea name="message" placeholder="Message"></textarea>
                                       </div>
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