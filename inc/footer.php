<?php 
$prooo ="SELECT `pro_id`, `pro_logo`,`pro_dark_logo`, `pro_favicon` , `pro_title`, `pro_keyword`, `pro_detail` FROM `tbl_profile`";
$resut = $conn->query($prooo);
$pro = $resut->fetch_assoc();
?>

<?php
$sll ="SELECT * FROM `tbl_contact`";
$resutss = $conn->query($sll);
$roo = $resutss->fetch_assoc();
?>
<footer>

            <!-- footer area start -->
            <div class="tp-footer-area tp-footer-style-2 tp-footer-style-3 black-bg pt-75 ">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-3 col-lg-4 col-md-2 col-sm-6 mb-50 ">
                        <div class="tp-footer-widget footer-cols-3-1">
                           <div class="tp-footer-logo">
                              <a href="<?=SITE_URL?>">
                                 <img src="<?=SITE_URL?>uploads/<?=$pro['pro_dark_logo']?>" alt="">
                              </a>
                           </div>
                          <p class="text-white1"><?=$roo['con_detail']?></p>
                           <div class="tp-footer-social rounded-circle">
                                <?php if($ro['con_twitter']>''){ ?><a class="rounded-circle" href="<?=$ro['con_twitter']?>" target="_blank"><i class="fa-brands fa-twitter"></i></a><?php } ?>
                                <?php if($ro['con_instagram']>''){ ?><a class="rounded-circle" href="<?=$ro['con_instagram']?>" target="_blank"><i class="fa-brands fa-instagram"></i></a><?php } ?>
                                <?php if($ro['con_facebook']>''){ ?><a class="rounded-circle" href="<?=$ro['con_facebook']?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a><?php } ?>
                                <?php if($ro['con_pinterest']>''){ ?><a class="rounded-circle" href="<?=$ro['con_pinterest']?>" target="_blank"><i class="fa-brands fa-pinterest-p"></i></a><?php } ?>
                                <?php if($ro['con_linkedin']>''){ ?><a class="rounded-circle" href="<?=$ro['con_linkedin']?>" target="_blank"><i class="fa-brands fa-linkedin"></i></a><?php } ?>
                                <?php if($ro['con_whatsaap']>''){ ?><a class="rounded-circle" href="https://wa.me/<?=$ro['con_whatsaap']?>" target="_blank"><i class="fa-brands fa-whatsapp"></i></a><?php } ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 mb-50 footer-padding-l">
                        <div class="tp-footer-contact-box">
                           <h4 class="tp-footer-title">Products</h4>
                           <div class="tp-footer-contact">
                              <ul>
                                  <?php
                                   $categ = mysqli_query($conn, "SELECT * FROM `tbl_category` where `status`='1' order by sort asc"); 
                                   while($categs = mysqli_fetch_array($categ)){
                                   ?>
                                 <li>
                                    <a href="<?=SITE_URL?>products/<?=$categs['url']?>"><?=$categs['name']?></a>
                                 </li>
                                 <?php } ?>
                              </ul>
                           </div>
                        </div>
                     </div>
                 
                  <div class="col-xl-3 col-lg-2 col-md-2 col-sm-6 mb-50 footer-padding-l">
                     <div class="tp-footer-contact-box">
                        <h4 class="tp-footer-title">Quick links</h4>
                        <div class="tp-footer-contact">
                           <ul>
                               <li><a href="<?=SITE_URL?>">Home</a></li>
                               <li><a href="<?=SITE_URL?>about">About Us</a></li>
                               <li><a href="<?=SITE_URL?>gallery">Gallery</a></li>
                               <li><a href="<?=SITE_URL?>career">Career</a></li>
                               <li><a href="<?=SITE_URL?>contact">Contact Us</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
            
                  <div class="col-xl-4 col-lg-4 col-md-2 col-sm-6 mb-50 ">
                        <div class="tp-footer-widget footer-cols-3-1">
                        <h4 class="tp-footer-title">Contact Dettails</h4>
                           <div class="tp-footer-contact">
                              <ul>
                                 <li>
                                    <a href="javascript:void(0);"><i class="fa fa-map"></i><?=$ro['con_address']?></a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0);"><i class="fa fa-map"></i><?=$ro['con_address2']?></a>
                                 </li>
                                 <li>
                                    <a href="tel:<?=$ro['con_phone1']?>"><i class="fa fa-phone"></i><?=$ro['con_phone1']?></a>
                                 </li>
                                 <li>
                                    <a href="mailto:<?=$ro['con_email1']?>"><i class="fa fa-envelope"></i><?=$ro['con_email1']?></a>
                                 </li>
                              </ul>
                           </div>
                          
                        </div>
                     </div>
           
               <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <div class="footer-bottom">
                     <ul>
                        <li>
                           <a href="<?=SITE_URL?>">Home</a>
                        </li>
                        <li>
                           <a href="<?=SITE_URL?>about">About Us</a>
                        </li>
                        <li>
                           <a href="<?=SITE_URL?>gallery">Gallery</a>
                        </li>
                        <li>
                           <a href="<?=SITE_URL?>our-team">Team</a>
                        </li>
                        <li>
                           <a href="<?=SITE_URL?>blogs">Blogs</a>
                        </li>
                        <li>
                           <a href="<?=SITE_URL?>contact">Contact Us</a>
                        </li>
                     </ul>
                  </div>
               </div> -->
            </div>
      </div>
      <div class="
       tp-copyright-style-2 black-bg tp-copyright-border tp-copyright-height">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-6 col-md-6">
                  <div class="tp-copyright-left text-center text-md-start">
                     <p>© SND TRADING 2024 | All Rights Reserved</p>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6">
                  <div class="tp-copyright-right text-center text-md-end">
                   <p> Design By <a href="https://www.thewebtycoons.com/" target="_blank"> <img src="<?=SITE_URL?>assets/img/footer_logo.png" width="110px"></a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- footer area end -->
   
   <!-- <div class="tp-copyright-area tp-copyright-style-2 black-bg tp-copyright-border tp-copyright-height">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
               <div class="tp-copyright-left text-center text-md-start">
                  <p>© Decora 2024 | All Rights Reserved</p>
               </div>
            </div>
            <div class="col-lg-6 col-md-6">
               <div class="tp-copyright-right text-center text-md-end">
                 Design By <a href="https://www.adsversify.com/"> Adsversify</a>
               </div>
            </div>
         </div>
      </div>
   </div> -->
   
    <!--whatsapp icon start -->
 <a class="call_me" href="https://api.whatsapp.com/send?phone=<?=$ro['con_whatsaap']?>" target="_blank"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></a>
    <!--whatsapp icon start -->

   </footer>
      <div class="modal fade" id="enquire-modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="tp-section-title modal-title" mt-10 id="exampleModalLabel">Enquiry Now</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&#10006;</button>
      </div>
      <div class="modal-body">
        <!-- contact form start -->
        <div class="tp-form-area pb-20">
               <div class="container">
                  <div class="tp-form-top">
                     <div class="row"> 
                        <div class="col-xl-12 col-lg-12 ">
                           <div class="tp-form-box tp-form-box-style-2">
                              <form id="modal-form" action="<?=SITE_URL?>mail/contactMail" method="POST">
                                 <div class="row">
                                    <div class="col-xl-12 mb-30">
                                       <div class="tp-modal-form-input-box modal-box">
                                       <label class="cont-label" required>Name</label>
                                          <input name="name" type="text" placeholder="Your Name" required>
                                       </div>
                                    </div>
                                    <div class="col-xl-12 mb-30">
                                       <div class="tp-modal-form-input-box modal-box">
                                       <label class="cont-label" required>Email</label>
                                          <input name="email" type="email" placeholder="Email" required>
                                       </div>
                                    </div>
                                    <div class="col-xl-12 mb-30">
                                       <div class="tp-modal-form-input-box modal-box">
                                       <label class="cont-label" required>Phone</label>
                                          <input type="tel" name="phone" id="phone" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                                       </div>
                                    </div>                     
                                                   
                                    
                                    <div class="col-xl-12 col-lg-12 col-md">
                                         <div class="tp-modal-form-input-box modal-box">
                                             <label class="cont-label" required>Message</label>
                                          <textarea name="message" placeholder="Message" required></textarea>
                                       </div>
                                         </div>
                                           <div class="col-xl-12 col-lg-12 col-md">
                                    <button type="submit" name="submit" class="tp-btn-black modal-btn modal-btn-h">Submit</button>
                                    </div>
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
   <div class="modal fade" id="enquire-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    
      <div class="modal-body">
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&#10006;</button>
        <!-- contact form start -->
        <div class="tp-form-area pb-20">
               <div class="container">
                  <div class="tp-form-top">
                     <div class="row"> 
                        <div class="col-xl-12 col-lg-12 ">
                           <div class="tp-form-box tp-form-box-style-2">
                              <form id="modal-form" action="<?=SITE_URL?>mail/productMail" method="POST">
                                 <div class="row">
                                    <div class="col-xl-12 mb-30">
                                       <div class="tp-modal-form-input-box modal-box">
                                       <label class="cont-label" required>Name</label>
                                          <input name="name" type="text" placeholder="Your Name" required>
                                       </div>
                                    </div>
                                    <div class="col-xl-12 mb-30">
                                       <div class="tp-modal-form-input-box modal-box">
                                       <label class="cont-label" required>Email</label>
                                          <input name="email" type="email" placeholder="Email" required>
                                       </div>
                                    </div>
                                    <div class="col-xl-12 mb-30">
                                       <div class="tp-modal-form-input-box modal-box">
                                       <label class="cont-label" required>Phone</label>
                                          <input type="tel" name="phone" id="phone" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                                       </div>
                                    </div>                     
                                    <div class="col-xl-12 mb-30">
                                       <div class="tp-modal-form-input-box modal-box">
                                       <label class="cont-label" required>Product</label>
                                          <input name="product" type="text" placeholder="Product" readonly required>
                                       </div>
                                    </div>                     
                                    
                                    <div class="col-xl-12 col-lg-12 col-md">
                                         <div class="tp-modal-form-input-box modal-box">
                                             <label class="cont-label" required>Message</label>
                                          <textarea name="message" placeholder="Message" required></textarea>
                                       </div>
                                         </div>
                                           <div class="col-xl-12 col-lg-12 col-md">
                                    <button type="submit" name="submit" class="tp-btn-black modal-btn modal-btn-h">Submit</button>
                                    </div>
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