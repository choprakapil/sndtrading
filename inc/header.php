<?php
$sl ="SELECT * FROM `tbl_contact`";
$resut = $conn->query($sl);
$ro = $resut->fetch_assoc();
?>

<!-- top head area start -->
<!-- pre loader area start -->
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_four"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_one"></div>
        </div>
    </div>
</div>
<!-- pre loader area end -->

<!-- back to top start -->
<div class="back-to-top-wrapper">
    <button id="back_to_top" type="button" class="back-to-top-btn">
        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 6L6 1L1 6" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </button>
</div>
<!-- back to top end -->



<!-- tp-offcanvus-area-start -->
<div class="tpoffcanvas-area">
    <div class="tpoffcanvas">
        <div class="tpoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
        </div>
        <div class="tpoffcanvas__logo">
            <a href="<?=SITE_URL?>">
                <img src="<?=SITE_URL?>uploads/<?=$pro['pro_logo']?>" alt="">
            </a>
        </div>

        <!--<div class="tpoffcanvas__title">-->
        <!--   <p><?=$pro['pro_detail']?></p>-->
        <!--</div>-->
        <div class="tp-main-menu-mobile d-block"></div>
        <!--<div class="tpoffcanvas__contact-info">-->
        <!--   <div class="tpoffcanvas__contact-title">-->
        <!--      <h5>Contact us</h5>-->
        <!--   </div>-->
        <!--   <ul>-->
        <!--      <li>-->
        <!--         <i class="fa-light fa-location-dot"></i>-->
        <!--         <a href="<?=$ro['con_map']?>" target="_blank"><?=$ro['con_detail']?></a>-->
        <!--      </li>-->
        <!--      <li>-->
        <!--         <i class="fas fa-envelope"></i>-->
        <!--         <a href="mailto:<?=$ro['con_email1']?>"><?=$ro['con_email1']?></a>-->
        <!--      </li>-->
        <!--      <li>-->
        <!--         <i class="fal fa-phone-alt"></i>-->
        <!--         <a href="tel:<?=$ro['con_phone1']?>"><?=$ro['con_phone1']?></a>-->
        <!--      </li>-->
        <!--   </ul>-->
        <!--</div>-->

        <div class="tpoffcanvas__social">
            <div class="social-icon">
                <?php if($ro['con_twitter']>''){ ?><a href="<?=$ro['con_twitter']?>" target="_blank"><i
                        class="fab fa-twitter"></i></a><?php } ?>
                <?php if($ro['con_instagram']>''){ ?><a href="<?=$ro['con_instagram']?>" target="_blank"><i
                        class="fab fa-instagram"></i></a><?php } ?>
                <?php if($ro['con_facebook']>''){ ?><a href="<?=$ro['con_facebook']?>" target="_blank"><i
                        class="fab fa-facebook-f"></i></a><?php } ?>
                <?php if($ro['con_pinterest']>''){ ?><a href="<?=$ro['con_pinterest']?>" target="_blank"><i
                        class="fab fa-pinterest-p"></i></a><?php } ?>
                <?php if($ro['con_linkedin']>''){ ?><a href="<?=$ro['con_linkedin']?>" target="_blank"><i
                        class="fab fa-linkedin-p"></i></a><?php } ?>
                <?php if($ro['con_whatsaap']>''){ ?><a href="https://wa.me/<?=$ro['con_whatsaap']?>" target="_blank"><i
                        class="fab fa-whatsapp"></i></a><?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="body-overlay"></div>
<!-- tp-offcanvus-area-end -->

<!-- header area start -->
<div class="tp-header-top-area tp-header-top-height theme-bg z-index-5 d-none">
    <div class="container ">
        <div class="row align-items-center">
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 d-none d-sm-block">
                <div class="tp-header-top-social ">
                    <?php if($ro['con_twitter']>''){ ?><a href="<?=$ro['con_twitter']?>" target="_blank"><i
                            class="fa-brands fa-twitter"></i></a><?php } ?>
                    <?php if($ro['con_instagram']>''){ ?><a href="<?=$ro['con_instagram']?>" target="_blank"><i
                            class="fa-brands fa-instagram"></i></a><?php } ?>
                    <?php if($ro['con_facebook']>''){ ?><a href="<?=$ro['con_facebook']?>" target="_blank"><i
                            class="fa-brands fa-facebook-f"></i></a><?php } ?>
                    <?php if($ro['con_pinterest']>''){ ?><a href="<?=$ro['con_pinterest']?>" target="_blank"><i
                            class="fa-brands fa-pinterest-p"></i></a><?php } ?>
                    <?php if($ro['con_linkedin']>''){ ?><a href="<?=$ro['con_linkedin']?>" target="_blank"><i
                            class="fa-brands fa-linkedin"></i></a><?php } ?>
                    <?php if($ro['con_whatsaap']>''){ ?><a href="https://wa.me/<?=$ro['con_whatsaap']?>"
                        target="_blank"><i class="fa-brands fa-whatsapp"></i></a><?php } ?>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-6 col-sm-6">
                <div class="tp-header-top-left text-end">
                    <ul class="text-center text-sm-end">
                        <li class="about-link"><a href="<?=SITE_URL?>about">About Us</a></li>
                        <li><a href="<?=SITE_URL?>our-team">Our Team</a></li>
                        <li><a href="<?=SITE_URL?>gallery">Gallery</a></li>
                        <li><a href="<?=SITE_URL?>career">Career</a></li>
                        <li><a href="<?=SITE_URL?>blogs">Blogs</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<!--top head area end -->


<!-- header area start -->

<div class="tp-header-area  tp-header-style-3 grey-bg z-index-5 header">
    <div class="container top-nav-div">

        <div class="row align-items-center">
            <div class="col-xl-2 col-lg-4 col-6">
                <a href="<?=SITE_URL?>">
                    <div class="tp-header-logo">
                        <img src="<?=SITE_URL?>uploads/<?=$pro['pro_logo']?>" alt="">
                    </div>
                </a>
            </div>
            <div class="col-xl-10 ">
                <div class="tp-header-menu">
                    <nav class="tp-main-menu-content d-sm-blcok">
                        <ul class="main-header">
                            <li>
                                <a href="<?=SITE_URL?>"><span>Home</span></a>
                            </li>
                            <li class="about-link"><a href="<?=SITE_URL?>about">About Us</a></li>
                            <li class="has-dropdown-2">
                                <a href="#"><span>Products</span></a>
                                <ul class="submenu tp-submenu">
                                    <?php
                               $categ = mysqli_query($conn, "SELECT * FROM `tbl_category` where `status`='1' order by sort asc"); 
                               while($categs = mysqli_fetch_array($categ)){
                               ?>
                                    <li><a class="sub-menu"
                                            href="<?=SITE_URL?>products/<?=$categs['url']?>"><span><?=$categs['name']?></span></a>
                                            <?php if($categs['id'] == '62'){ ?>
                                        <ul class="submenu1">
                                            <?php
                                      $prod = mysqli_query($conn, "SELECT * FROM `tbl_subcategory` where `status`='1' and `category_id`='$categs[id]' order by sort asc");
                                      while($prods = mysqli_fetch_array($prod)){
                                     ?>
                                            <li><a href="<?=SITE_URL?>products/<?=$categs['url']?>/<?=$prods['url']?>"><span><?=$prods['name']?></span></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                        <?php } ?>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="has-dropdown-2 d-none">
                                <a href="javascript:void(0);"><span>Services</span></a>
                                <ul class="submenu tp-submenu">
                                    <?php
                               $servecat = mysqli_query($conn, "SELECT * FROM `tbl_service` where `status`='1' order by sort asc"); 
                               while($servecats = mysqli_fetch_array($servecat)){
                               ?>
                                    <li><a class="sub-menu"
                                            href="<?=SITE_URL?>service/<?=$servecats['url']?>"><span><?=$servecats['name']?></span></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <!-- sup-submenu -->
                            </li>
                            <li class="has-dropdown-2 d-none">
                                <a href="javascript:void(0);"><span>⁠Turnkey Interior/Exterior</span></a>
                                <ul class="submenu tp-submenu">
                                    <?php
                               $turnkeycat = mysqli_query($conn, "SELECT * FROM `tbl_turnkey` where `status`='1' order by sort asc"); 
                               while($turnkeycats = mysqli_fetch_array($turnkeycat)){
                               ?>
                                    <li><a
                                            href="<?=SITE_URL?>turnkey/<?=$turnkeycats['url']?>"><span><?=$turnkeycats['name']?></span></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li><a href="<?=SITE_URL?>gallery">Gallery</a></li>
                            <li><a href="<?=SITE_URL?>career">Career</a></li>
                            <li><a href="<?=SITE_URL?>contact">Contact Us</a></li>
                        </ul>
                    </nav>
                    <div class="tp-header-right d-flex align-items-center justify-content-end">

                      
                        <div class="tp-header-bar d-xl-none">
                            <button class="tp-menu-bar"><i class="fa-solid fa-bars"></i></button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</nav>
<!-- header area end -->