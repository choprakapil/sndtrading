<?php require('inc/function.php'); 
$breadcrumb = mysqli_query($conn, "SELECT * FROM `tbl_breadcrumb` where `brd_status`='1' and `brd_id`='2'");
$breadcrumbs = mysqli_fetch_assoc($breadcrumb);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php if($breadcrumbs['metatag']>''){ echo $breadcrumbs['metatag']; }else{ echo 'Contact'; } ?> | <?=SITE_NAME?></title>
    <meta name="description" content="<?=$breadcrumbs['metadesc']?>">
    <meta name="keywords" content="<?=$breadcrumbs['metakeyword']?>">
    <?php include('inc/head.php')?>
    <style>
        .tp-form-top {
    border: 1px solid #0000000f;
    padding: 20px;
    background: #00000008;
     margin: 50px 0; 
}
    </style>
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
                                 <h3 class="breadcrumb__title tp-split-text tp-split-in-right">Contact Us</h3>
                              </div>
                              <div class="breadcrumb__list">
                                 <span><a href="<?=SITE_URL?>">Home</a></span>
                                 <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                 <span>Contact Us</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- breadcrumb area end -->


            <!-- form area start -->
            <div class="tp-form-area ">
               <div class="container">
                  <div class="tp-form-top">
                      <!--<div class="tp-product-2-title-box pb-10 pt-20 cont-title" >-->
                      <!--        <span class="tp-section-subtitle">Contact</span>-->
                      <!--        <h3 class="tp-section-title">Get in Touch</h3>-->
                      <!--     </div>-->
                     <div class="row"> 
                        <div class="col-xl-7 col-lg-7 ">
                           <div class="tp-form-box tp-form-box-style-2">
                           
                              <form id="contact-form1" method="POST" action="<?=SITE_URL?>mail/contactMail">
                                 <div class="row">
                                    <div class="col-xl-6 col-lg-6 mb-30">
                                       <div class="tp-form-input-box">
                                       <label class="cont-label" required>Name</label>
                                          <input name="name" type="text" placeholder="First name" required>
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-30">
                                       <div class="tp-form-input-box">
                                       <label class="cont-label" required>Email</label>
                                          <input name="email" type="email" placeholder="Your Email" required>
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-30">
                                       <div class="tp-form-input-box">
                                       <label class="cont-label" required>Phone</label>
                                        <input type="tel" name="phone" id="phone" placeholder="Your Phone" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>

                                       </div>
                                    </div>                     
                                    <div class="col-xl-6 col-lg-6 mb-30">
                                       <div class="tp-form-input-box">
                                       <label class="cont-label" required>Country</label>
                                          <input name="address" type="text" placeholder="Country">
                                       </div>
                                    </div>                     
                                    <div class="col-xl-12 col-lg-12 mb-20">
                                       <div class="tp-form-textarea-box">
                                       <label class="cont-label" required>Message</label>
                                          <textarea name="message" placeholder="Message" required></textarea>
                                       </div>
                                    </div>
                                 </div>
                                 <button class="tp-btn-black" type="submit" name="submit"><span>Submit</span></button>
                                 <p class="ajax-response"></p>
                              </form>
                           </div>                   
                        </div>
                        <div class="col-xl-5 col-lg-5 ">
                           <div class="tp-contact-box">
                              <ul class="address-box">
                                 <!-- <li>-->
                                 <!--   <div class="tp-contact-item d-flex align-items-center">-->
                                 <!--      <div class="tp-contact-content d-flex justify-content-center">-->
                                 <!--         <h3>Address</h3>-->
                                 <!--      </div>-->
                                 <!--   </div>-->
                                 <!--</li>-->
                                  <?php if($ro['con_address']>''){ ?>
                                 <li>
                                    <div class="tp-contact-item d-flex align-items-center">
                                       <div class="tp-contact-icon-2">
                                          <span>
                                             <svg width="15" height="21" viewBox="0 0 15 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.5625 20.0312C4.53125 17.4922 0 11.4375 0 8C0 3.85938 3.32031 0.5 7.5 0.5C11.6406 0.5 15 3.85938 15 8C15 11.4375 10.4297 17.4922 8.39844 20.0312C7.92969 20.6172 7.03125 20.6172 6.5625 20.0312ZM7.5 10.5C8.86719 10.5 10 9.40625 10 8C10 6.63281 8.86719 5.5 7.5 5.5C6.09375 5.5 5 6.63281 5 8C5 9.40625 6.09375 10.5 7.5 10.5Z" fill="currentcolor"/>
                                             </svg>
                                          </span>
                                       </div>
                                       <div class="tp-contact-content">
                                          <?=$ro['con_address']?>
                                       </div>
                                    </div>
                                 </li>
                                 <?php } ?>
                                  <?php if($ro['con_address2']>''){ ?>
                                 <li>
                                    <div class="tp-contact-item d-flex align-items-center">
                                       <div class="tp-contact-icon-2">
                                          <span>
                                             <svg width="15" height="21" viewBox="0 0 15 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.5625 20.0312C4.53125 17.4922 0 11.4375 0 8C0 3.85938 3.32031 0.5 7.5 0.5C11.6406 0.5 15 3.85938 15 8C15 11.4375 10.4297 17.4922 8.39844 20.0312C7.92969 20.6172 7.03125 20.6172 6.5625 20.0312ZM7.5 10.5C8.86719 10.5 10 9.40625 10 8C10 6.63281 8.86719 5.5 7.5 5.5C6.09375 5.5 5 6.63281 5 8C5 9.40625 6.09375 10.5 7.5 10.5Z" fill="currentcolor"/>
                                             </svg>
                                          </span>
                                       </div>
                                       <div class="tp-contact-content">
                                          <?=$ro['con_address2']?>
                                       </div>
                                    </div>
                                 </li>
                                 <?php } ?>
                                  <?php if($ro['con_address3']>''){ ?>
                                 <li>
                                    <div class="tp-contact-item d-flex align-items-center">
                                       <div class="tp-contact-icon-2">
                                          <span>
                                             <svg width="15" height="21" viewBox="0 0 15 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.5625 20.0312C4.53125 17.4922 0 11.4375 0 8C0 3.85938 3.32031 0.5 7.5 0.5C11.6406 0.5 15 3.85938 15 8C15 11.4375 10.4297 17.4922 8.39844 20.0312C7.92969 20.6172 7.03125 20.6172 6.5625 20.0312ZM7.5 10.5C8.86719 10.5 10 9.40625 10 8C10 6.63281 8.86719 5.5 7.5 5.5C6.09375 5.5 5 6.63281 5 8C5 9.40625 6.09375 10.5 7.5 10.5Z" fill="currentcolor"/>
                                             </svg>
                                          </span>
                                       </div>
                                       <div class="tp-contact-content">
                                          <?=$ro['con_address3']?>
                                       </div>
                                    </div>
                                 </li><?php } ?>
                                 <li>
                                    <div class="tp-contact-item d-flex align-items-center">
                                       <div class="tp-contact-icon-2">
                                          <span>
                                             <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.125 0C19.1406 0 20 0.859375 20 1.875C20 2.5 19.6875 3.04688 19.2188 3.39844L10.7422 9.76562C10.2734 10.1172 9.6875 10.1172 9.21875 9.76562L0.742188 3.39844C0.273438 3.04688 0 2.5 0 1.875C0 0.859375 0.820312 0 1.875 0H18.125ZM8.47656 10.7812C9.375 11.4453 10.5859 11.4453 11.4844 10.7812L20 4.375V12.5C20 13.9062 18.8672 15 17.5 15H2.5C1.09375 15 0 13.9062 0 12.5V4.375L8.47656 10.7812Z" fill="currentcolor"/>
                                             </svg>
                                          </span>
                                       </div>
                                       <div class="tp-contact-content">
                                          <!--<h6>Email Address</h6>-->
                                          <a href="mailto:<?=$ro['con_email1']?>"><?=$ro['con_email1']?></a>,
                                          <a href="mailto:<?=$ro['con_email2']?>"> <?=$ro['con_email2']?></a>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="tp-contact-item d-flex align-items-center">
                                       <div class="tp-contact-icon-2">
                                          <span>
                                             <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.9609 15.6172L19.0234 19.5625C18.9062 20.1484 18.4375 20.5391 17.8516 20.5391C8.00781 20.5 0 12.4922 0 2.64844C0 2.0625 0.351562 1.59375 0.9375 1.47656L4.88281 0.539062C5.42969 0.421875 6.01562 0.734375 6.25 1.24219L8.08594 5.5C8.28125 6.00781 8.16406 6.59375 7.73438 6.90625L5.625 8.625C6.95312 11.3203 9.14062 13.5078 11.875 14.8359L13.5938 12.7266C13.9062 12.3359 14.4922 12.1797 15 12.375L19.2578 14.2109C19.7656 14.4844 20.0781 15.0703 19.9609 15.6172Z" fill="currentcolor"/>
                                             </svg>
                                          </span>
                                       </div>
                                       <div class="tp-contact-content">
                                          <!--<h6>Phone number</h6>-->
                                          <a href="tel:<?=$ro['con_phone1']?>"><?=$ro['con_phone1']?></a>,
                                          <a href="tel:<?=$ro['con_phone2']?>"><?=$ro['con_phone2']?></a>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                 
               </div>
            </div>


            <div class="map-sec mb-5 pb-5">
                <div class="container">
               <div class="map-box">
                        <div class="tp-map-box">
                        <iframe src="<?=$ro['con_map']?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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