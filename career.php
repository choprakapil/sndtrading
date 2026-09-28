<?php require('inc/function.php'); 
$breadcrumb = mysqli_query($conn, "SELECT * FROM `tbl_breadcrumb` where `brd_status`='1' and `brd_id`='11'");
$breadcrumbs = mysqli_fetch_assoc($breadcrumb);
?> 


<?php
error_reporting(0);
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, trim(str_replace(["\r", "\n"], '', $_POST['name'])));
    $email = mysqli_real_escape_string($conn, trim(str_replace(["\r", "\n"], '', $_POST['email'])));
    $phone = mysqli_real_escape_string($conn, trim(str_replace(["\r", "\n"], '', $_POST['phone'])));
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $job_title = mysqli_real_escape_string($conn, $_POST['job_title']);
    $job_id = mysqli_real_escape_string($conn, $_POST['job_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address');window.history.back();</script>";
        exit();
    }

    $bimage = '';
    if (!empty($_FILES['bimage']['name']) && is_uploaded_file($_FILES['bimage']['tmp_name'])) {
        $allowed_exts = ['pdf', 'doc', 'docx'];
        $orig_name = basename($_FILES['bimage']['name']);
        $file_ext = strtolower(pathinfo($orig_name, PATHINFO_EXTENSION));
        $file_size = $_FILES['bimage']['size'];
        
        if (in_array($file_ext, $allowed_exts) && $file_size <= 10485760) {
            $clean_name = preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($orig_name, PATHINFO_FILENAME));
            $bimage = time() . "_" . $clean_name . "." . $file_ext;
            move_uploaded_file($_FILES["bimage"]["tmp_name"], "uploads/jobs/" . $bimage);
        } else {
            echo "<script>alert('Invalid file format. Only PDF, DOC, and DOCX files up to 10MB are allowed.');window.history.back();</script>";
            exit();
        }
    }
    
    $url = SITE_URL.'uploads/jobs/'.$bimage;

    $currentDate = date('Y-m-d');
    $query = mysqli_query($conn, "INSERT INTO `tbl_job_applications`(`job_id`,`name`,`email`,`mobile`, `applying_for`, `resume`, `about`, `location`, `date`) VALUES ('$job_id','$name','$email', '$phone', '$job_title', '$bimage', '$message', '$location', '$currentDate')");

    
     //  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
        //      $secretKey = RECAPCHA_SECRET_KEY; 
        //      $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
        //      $responseData = json_decode($verifyResponse); 
        //      if($responseData->success){ 
        
                // $to = 'wtdeveloper.chandani@gmail.com';
                $to = 'accounts@sndtrading.org';
               
                
                $subject = SITE_NAME.' Career Enquiry Details '; 
                $htmlContent = " 
                    <div style='font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;'>
                        <table style='width: 100%;'>
                            <tr>
                                <td></td>
                                <td bgcolor='#fff'>
                                    <div style='padding: 15px; max-width: 600px;margin: 0 auto;display: block; border-radius: 0px;padding: 0px; border: 1px solid black;'>
                                        <table style='width: 100%;background: #fff;'>
                                            <tr>
                                                <td></td> 
                                                <td>
                                                    <div>
                                                        <table width='100%'>
                                                            <tr>
                                                                <td rowspan='2' style='text-align:center;padding:10px;'>
                                                                    <img style='float:left;' width='100' src='".SITE_URL."uploads/logo.png' /> 
                                                                    <span style='color:black;float:right;font-size: 13px;font-style: italic;margin-top: 20px; padding:10px; font-size: 14px; font-weight:normal;'>
                                                                        <b><span>".SITE_NAME." Career Enquiry Details</span></b>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </table>
                                        <table style='padding: 10px;font-size:14px; width:100%;'>
                                            <tr>
                                                <td style='padding:10px;font-size:14px; width:100%;'>
                                                    <p><b>Name :-</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$name."</p>
                                                    <p><b>Phone No :-</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$phone."</p>
                                                    <p><b>Email-ID :-</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$email."</p>
                                                    <p><b>Location :-</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$location."</p>
                                                    <p><b>Job Title :-</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$job_title."</p>
                                                    <p><b>Apply Date :-</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$currentDate."</p>
                                                    <p><b>Message :-</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$message."</p>
                                                    <p><b>Resume :-</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$url."'>".$bimage."</a></p>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div align='center' style='font-size:12px; margin-top:20px; padding:5px; color:#fff; width:100%; background:#000059;'>
                                                        © ".date("Y")." <a href='".SITE_URL."' target='_blank' style='color:#fff; text-decoration: none;'>[ ".SITE_NAME." ]</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>";

                $headers = "MIME-Version: 1.0" . "\r\n"; 
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
                $headers .= 'From:'.SITE_NAME.' <'.SITE_EMAIL.'>' . "\r\n"; 
                // $headers .= 'Cc: digital@thewebtycoons.com' . "\r\n";
                @mail($to,$subject,$htmlContent,$headers); 
	            echo "<script>window.location.href='".SITE_URL."thank-you';</script>";
//             }else{ 
       
	            
// 	             echo "<script>alert('Robot verification failed, please try again');window.location.href='".SITE_URL."';</script>";
//           } 
// //          }else{ 
// // 			  echo "<script>alert('Please check on the reCAPTCHA box');window.location.href='".SITE_URL."';</script>";
			
// //         }
    
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php if($breadcrumbs['metatag']>''){ echo $breadcrumbs['metatag']; }else{ echo 'Career'; } ?> | <?=SITE_NAME?></title>
    <meta name="description" content="<?=$breadcrumbs['metadesc']?>">
    <meta name="keywords" content="<?=$breadcrumbs['metakeyword']?>">
    <?php include('inc/head.php')?>
  
  
  <style>
  .career-contact {
    margin: 50px 0 0 0;
    padding-bottom: 100px;
}

h2.title {
    font-size: 24px;
    line-height: 24px;
    text-transform: capitalize;
    font-weight: 500;
}
  
  .job-card {
    padding: 20px 16px;
    background-color: #f7f7f7;
    border-radius: 8px;
    cursor: pointer;
    margin-bottom: 20px;
    transition: 0.2s;
    border: 1px solid #dbdbdb;
    padding-top: 0;
}

.job-icon-div {
    background-color: #ffffff;
    text-align: center;
    width: 50px;
    height: 50px;
    position: relative;
    padding: 9px;
    border-radius: 10px;
    /* left: 4%; */
    /* line-height: 66px; */
    bottom: 30px;
    border: 2px solid #383c47;
    box-shadow: 0px 1px 7px 3px #85858547;
    top: -25px;
}
.job-card-header {
    display: flex;
    align-items: center;
}

.job-card-title {
    font-size: 20px;
    margin-top: 0;
    font-weight: 600;
}

.job-card-subtitle {
    /*color: var(--subtitle-color);*/
    font-size: 13px;
    margin-top: 14px;
    line-height: 1.6em;
}

.search-buttons {
    padding: 5px 10px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 500;
    margin-top: 14px;
    border: navajowhite;
    border-radius: 100px
}

.detail-button {
    background-color: #d0d2d357;
    color: #595959;
    font-size: 11px;
    font-weight: 500;
    padding: 6px 8px;
    border-radius: 4px;
 
}

.job-card-buttons {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    margin-top: 4px;
  
}

.card-buttons {
    margin-right: 12px;
    padding: 10px;
    width: 100%;
    font-size: 12px;
    cursor: pointer;
    color: #fff;
    background-color: #383c47;
    border-radius: 100px
}
.card-buttons-msg {
    padding: 10px;
    width: 100%;
    font-size: 12px;
    cursor: pointer;
    color: #fff;
    background-color: #000000;
}











.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    color: var(--bs-modal-color);
    pointer-events: auto;
    background-color: var(--bs-modal-bg);
    background-clip: padding-box;
    border: var(--bs-modal-border-width) solid var(--bs-modal-border-color);
    border-radius: var(--bs-modal-border-radius);
    outline: 0;
}



.job-dis {
    margin: 20px 25px;
    list-style: disc !important;
}

.job-dis ul {
    list-style: outside;
}

.modal-title {
    font-size:14px;
    margin-left:0;
}


.contact_message h3 {
    font-size: 16px;
    text-transform: capitalize;
    font-weight: 700;
    line-height: 19px;
    margin-bottom: 25px;
}

.contact_message p {
    font-size: 14px;
    line-height: 24px;
    margin-bottom: 20px;
}

.contact_message label {
    line-height: 18px;
    font-weight: 500;
    margin-bottom: 10px;
}

.contact_message input {
    border: 1px solid #ebebeb;
    height: 45px;
    background: #ffffff;
    width: 100%;
    padding: 0 20px;
    color: #757575;
}

.contact_message textarea {
    height: 76px;
    border: 1px solid #ebebeb;
    background: #ffffff;
    resize: none;
    /* margin-bottom: 20px; */
    width: 100%;
    padding: 10px 20px;
    color: #363f4d;
}

.contact_message button {
    font-weight: 400;
    height: 42px;
    line-height: 42px;
    padding: 0 30px;
    text-transform: capitalize;
    border: none;
    background: #363f4d;
    color: #ffffff;
    cursor: pointer;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    border-radius: 4px;
    margin-top: 5px;
    border-radius: 100px
}

.contact_message button:hover {
    background: #000000;
    /* margin-top: 72px; */
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
                                 <h3 class="breadcrumb__title tp-split-text tp-split-in-right">Career</h3>
                              </div>
                              <div class="breadcrumb__list">
                                 <span><a href="<?=SITE_URL?>">Home</a></span>
                                 <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                 <span>Career</span>
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
                      <div class="tp-product-2-title-box pb-10 pt-20 cont-title" >
                         
                          <h2 class="title">Job Opprtunities</h2>
                       </div>
                  </div>
                  
                <div class="career-contact">
        <div class="container">
            <div class="row mt-5">
                <?php
                $currentDate = date('Y-m-d');
                $sql = mysqli_query($conn, "SELECT * FROM `tbl_career` WHERE `apply_last_date` > $currentDate AND `status` = '1' ORDER BY `sort` ASC");
                if (mysqli_num_rows($sql) > 0) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $tags = explode(',', $row['job_tags']);
                ?>
                        <div class="col-lg-4">
                            <div class="job-card">
                                <div class="job-card-header job-icon-div">
                                    <img src="<?=SITE_URL?>uploads/jobs/<?=$row['logo']?>">
                                </div>
                                <div class="job-card-title"><?= $row['job_title'] ?></div>
                                <!--<div class="job-card-subtitle"><strong>Job Responsibilities:</strong> <?= strip_tags(substr($row['job_short_des'], 0, 100)); ?></div>-->
                                <div class="job-detail-buttons">
                                    <div class="job-card-subtitle"><strong>Location: </strong><?= $row['job_location'] ?></div>
                                   
                                </div>
                                <div class="job-card-buttons">
                                    <button class="search-buttons card-buttons" data-bs-toggle="modal" data-bs-target="#exampleModalapply<?= $count ?>">Apply Now</button>
                                    <button class="search-buttons card-buttons-msg view-desc" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $count ?>" id="descBtn">Job Description</button>
                                </div>
                            </div>
                        </div>
                <?php $count++;
                    }
                } else {
                    echo "<h4>Currently! No Jobs Are Posted.</h4>";
                } ?>
            </div>

            <div class="row section-space--mb_30 text-center">
                <h4>Join our <span style="color:#655cdb"></span> team now! </h4>
            </div>
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

  <!--Modal Start -->
    <?php
    $currentDate = date('Y-m-d');
    $sql = mysqli_query($conn, "SELECT * FROM `tbl_career` WHERE `apply_last_date` > $currentDate AND `status` = '1' ORDER BY `sort` ASC");
    if (mysqli_num_rows($sql) > 0) {
        $count1 = 1;
        while ($data = mysqli_fetch_assoc($sql)) {
    ?>
            <div class="modal fade" id="exampleModal<?= $count1 ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" id="modalResponse" style="margin-top:10%;">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel"><?= $data['job_title'] ?></h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> x </button>
                        </div>
                        <div class="modal-body">
                            <div class="job-dis">
                                <!--<p><span style="font-size:14px"><strong>Job Introduction:</strong></span></p>-->

                                <!--<p><?= $data['job_short_des'] ?></p>-->

                                <p><span><strong>Job Description:</strong></span></p>

                                <p><?= $data['job_long_des'] ?></p>

                                <!--<p><span style="font-size:14px"><strong>Job Responsibilities:</strong></span></p>-->

                                <!--<p><?= $data['job_res'] ?></p>-->

                                <!--<p><span style="font-size:14px"><strong>Skills required:</strong></span></p>-->

                                <!--<p><?= $data['job_req_skills'] ?></p>-->

                                <strong>Publish Date: <?= $data['publish_date'] ?></strong><br>
                                <strong>Last Date To Apply: <?= $data['apply_last_date'] ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php $count1++;
        }
    } ?>
    <!--Modal End -->
    <!--Modal Start -->

    <?php
    $currentDate = date('Y-m-d');
    $sql = mysqli_query($conn, "SELECT * FROM `tbl_career` WHERE `apply_last_date` > $currentDate AND `status` = '1' ORDER BY `sort` ASC");
    if (mysqli_num_rows($sql) > 0) {
        $count2 = 1;
        while ($data = mysqli_fetch_assoc($sql)) {
    ?>
            <div class="modal fade" id="exampleModalapply<?= $count2 ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="margin-top:10%;">

                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> x </button>
                            <div class="contact_message form">
                                <h3>Submit For Job</h3>
                                <form method="POST" class="row" enctype="multipart/form-data">
                                    <p class="col-md-6">
                                        <label> Your Name (required)</label>
                                        <input name="name" placeholder="Name *" type="text" required>
                                    </p>
                                    <p class="col-md-6">
                                        <label> Your Email (required)</label>
                                        <input name="email" placeholder="Email *" type="email" required>
                                    </p>
                                    <p class="col-md-6">
                                        <label> Your Phone (required)</label>
                                        <input name="phone" placeholder="Phone No.*" type="tel" required>
                                    </p>
                                    <p class="col-md-6">
                                        <label> Your Current Location (required)</label>
                                        <input name="location" placeholder="Location *" type="text">
                                    </p>
                                    <p class="col-md-6">
                                        <label for="position">Applying For :</label>
                                        <input type="text" value="<?= $data['job_title'] ?>" readonly name="job_title">
                                        <input type="hidden" value="<?= $data['id'] ?>" name="job_id">
                                    </p>


                                    <div class="contact_textarea col-md-12">
                                        <label> Describe Yourself</label>
                                        <textarea placeholder="Please describe what you need." name="message" class="form-control2"></textarea>
                                    </div>
                                    <div class="contact-inner contact-message col-md-12">
                                        <label for="name">Upload resume</label>
                                        <input type="file" name="bimage">

                                    </div>
                                    <button type="submit" name="submit"> Send</button>
                                    <!-- <p class="form-messege"></p> -->
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php $count2++;
        }
    } ?>
    <!--Modal End -->
</body>
</html>