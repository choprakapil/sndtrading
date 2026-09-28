<?php
require('inc/function.php');
if(isset($_GET['bburl']) && isset($_GET['bpurl'])){
    $bburl = $_GET['bburl'];
    $bpurl = $_GET['bpurl'];
    $blogsscat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_blogcategory` WHERE `url`='$bburl' and `status`='1' order by `sort` asc"));
    $blogss = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_blogs` WHERE `b_url`='$bpurl' and `b_status`='1'"));
}else{
header('location:'.SITE_URL.'404.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php if($blogss['metatag']>0){ ?>
          <title><?= $blogss['metatag']?> | <?=SITE_NAME?></title>
    <?php } else{ ?>
          <title><?= $blogss['b_title']; ?> | <?=SITE_NAME?></title>
    <?php } ?>
    <meta name="description" content="<?=$blogss['metadesc']?>">
    <meta name="keywords" content="<?=$blogss['metakeyword']?>">
    <?php include('inc/head.php')?>
</head>
<body>

     <!-- header start -->
     <?php include('inc/header.php')?>
   <!-- header end -->

        <!-- breadcrumb area start -->
        <div class="breadcrumb__pt">
            <?php if($blogss['broad_image']>0){ ?>
               <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
                  data-background="<?=SITE_URL?>uploads/blogs/<?=$blogss['broad_image']?>" style="background-image: url('<?=SITE_URL?>uploads/blogs/<?=$blogss['broad_image']?>');">
                   <?php }else{ ?>
                   <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
                  data-background="<?=SITE_URL?>assets/img/breadcurmb/breadcurmb.jpg">
                   <?php } ?>
                  <div class="container">
                     <div class="row">
                        <div class="col-xxl-12">
                           <div class="breadcrumb__content z-index">
                              <div class="breadcrumb__section-title-box mb-20">
                                 <h3 class="breadcrumb__title tp-split-text tp-split-in-right"><?=$blogss['b_title']?></h3>
                              </div>
                              <div class="breadcrumb__list">
                                 <span><a href="<?=SITE_URL?>">Home</a></span>
                                 <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                 <span>Blogs</span>
                                 <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                 <span><?=$blogsscat['name']?></span>
                                 <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                 <span><?=$blogss['b_title']?></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- breadcrumb area end -->

              <!-- postbox area start -->
            <section class="postbox__area pt-100">
               <div class="container">
                  <div class="row">
                     <div class="col-xxl-8 col-xl-8 col-lg-8">
                        <div class="postbox__wrapper">
                           <article class="postbox__item format-image transition-3">
                              <div class="postbox__thumb p-relative m-img">
                                 <div class="postbox__thumb-text-2 d-none d-md-block">
                                    <span><?= date('d M', strtotime($blogss['b_date'])) ?></span>
                                 </div>
                                 <img src="<?=SITE_URL?>uploads/blogs/<?=$blogss['b_image']?>" alt="<?=$blogss['b_alt']?>">
                              </div>
                              <div class="postbox__content mb-70">
                                 <h3 class="post__title pb-5"><?=$blogss['b_title']?></h3>
                                 <div class="detail-text">
                                    <p><?=$blogss['b_description']?></p>
                                 </div>
                              </div>
                           </article>  
                        </div>
                     </div>
                     <div class="col-xxl-4 col-xl-4 col-lg-4 mb-50">
                        <div class="sidebar__wrapper">
                           <div class="sidebar__widget mb-30">
                              <h3 class="sidebar__widget-title">Our Latest Post</h3>
                              <div class="sidebar__widget-content">
                                 <div class="sidebar__post">
                                     <?php
                                    $blogss = mysqli_query($conn, "SELECT * FROM `tbl_blogs` WHERE `b_category`='$blogsscat[id]' and `b_status`='1'");
                                    while($blog = mysqli_fetch_assoc($blogss)){ ?>
                                    <div class="rc__post mb-25 d-flex align-items-center">
                                       <div class="rc__post-thumb mr-20">
                                          <a href="<?=SITE_URL?>blogs/<?=$blogsscat['url']?>/<?=$blog['b_url']?>"><img src="<?=SITE_URL?>uploads/blogs/<?=$blog['b_image']?>"
                                                alt="<?=$blog['b_alt']?>"></a>
                                       </div>
                                       <div class="rc__post-content">
                                          
                                          <h3 class="rc__post-title">
                                             <a href="<?=SITE_URL?>blogs/<?=$blogsscat['url']?>/<?=$blog['b_url']?>"><?=$blog['b_title']?></a>
                                          </h3>
                                          <div class="rc__meta">
                                             <span><i class="fa-light fa-clock"></i>
                                               <?= date('M d, Y', strtotime($blog['b_date'])) ?> </span>
                                          </div>
                                       </div>
                                    </div>
                                     <?php } ?>
                                 </div>
                              </div>
                           </div>
                           
                        </div>
                        
                        
                        
                        
                        
                        <div class="tp-form-area pt-80 pb-80">
               <div class="container">
                  <div class="tp-form-top">
                      <div class="tp-product-2-title-box pb-10 cont-title" >
                              <h2>Get in Touch</h2>
                           </div>
                     <div class="row"> 
                        <div class="col-xl-12 col-lg-12 mb-50">
                           <div class="tp-form-box tp-form-box-style-2">
                           
                              <form id="contact-form1" action="https://html.hixstudio.net/interno-prev/interno/assets/mail.php" method="POST">
                                 <div class="row">
                                    <div class="col-xl-6 col-lg-6 mb-30">
                                       <div class="tp-form-input-box">
                                       <label class="cont-label" required>Name</label>
                                          <input name="name" type="text" placeholder="First name">
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
                                        <input name="phone" type="tel" placeholder="Phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="10" size="10" minlength="10" data-for="phoneNumber" onkeypress="return event.charCode >= 48 && event.charCode <= 57">

                                       </div>
                                    </div>                     
                                    <div class="col-xl-6 col-lg-6 mb-30">
                                       <div class="tp-form-input-box">
                                       <label class="cont-label" required>Address</label>
                                          <input name="address" type="text" placeholder="Address">
                                       </div>
                                    </div>                     
                                    <div class="col-xl-12 col-lg-12 mb-20">
                                       <div class="tp-form-textarea-box">
                                       <label class="cont-label" required>Message</label>
                                          <textarea name="message" placeholder="Messege"></textarea>
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

                     </div>
                  </div>
               </div>
            </section>
            <!-- postbox area end -->
      
    

     <!-- footer start -->
     <?php include('inc/footer.php')?>
     <!-- footer end -->


    <!-- script start -->
   <?php include('inc/footer-data.php')?>
   <!-- script end -->

</body>
</html>