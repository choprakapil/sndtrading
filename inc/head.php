<?php 
require('inc/function.php');
$prooo ="SELECT `pro_id`, `pro_logo`,`pro_dark_logo`, `pro_favicon` , `pro_title`, `pro_keyword`, `pro_detail` FROM `tbl_profile`";
$resut = $conn->query($prooo);
$pro = $resut->fetch_assoc();
?>

<meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Place favicon.ico in the root directory -->
   <!--<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/favicon.png">-->
  
   <!-- CSS here -->
   <link rel="preload" href="<?=SITE_URL?>assets/css/bootstrap.css" as="style" onload="this.rel='stylesheet'">
   <link rel="stylesheet" href="<?=SITE_URL?>assets/css/animate.css">
   <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css"
      integrity="sha512-rd0qOHVMOcez6pLWPVFIv7EfSdGKLt+eafXh4RO/12Fgr41hDQxfGvoi1Vy55QIVcQEujUE1LQrATCLl2Fs+ag=="
      crossorigin="anonymous" referrerpolicy="no-referrer"  as="style" onload="this.rel='stylesheet'" />
   <link rel="stylesheet" href="<?=SITE_URL?>assets/css/slick.css">
   <link rel="stylesheet" href="<?=SITE_URL?>assets/css/magnific-popup.css">
  <link rel="preload" href="<?=SITE_URL?>assets/css/font-awesome-pro.css" as="style" onload="this.rel='stylesheet'">

   <link rel="stylesheet" href="<?=SITE_URL?>assets/css/font-awesome.min.css">
   <link rel="stylesheet" href="<?=SITE_URL?>assets/css/spacing.css">
   <link rel="stylesheet" href="<?=SITE_URL?>assets/css/custom-animation.css">
   <link rel="preload" href="<?=SITE_URL?>assets/css/main.css" as="style" onload="this.rel='stylesheet'" >
  <!--end-->
 <link rel="shortcut icon" type="image/x-icon" href="<?=SITE_URL?>uploads/<?=$pro['pro_favicon']?>"> 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css"> 