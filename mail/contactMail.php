<?php 
require("../inc/function.php");
if(isset($_POST['submit'])){ 
    if(!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['message'])){ 
        //  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
        //      $secretKey = RECAPCHA_SECRET_KEY; 
        //      $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
        //      $responseData = json_decode($verifyResponse); 
        //      if($responseData->success){ 
                
                $name = !empty($_POST['name'])?trim(str_replace(["\r", "\n"], '', $_POST['name'])):''; 
                $phone = !empty($_POST['phone'])?trim(str_replace(["\r", "\n"], '', $_POST['phone'])):'';
                $email = !empty($_POST['email'])?trim(str_replace(["\r", "\n"], '', $_POST['email'])):''; 
                $message = !empty($_POST['message'])?htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8'):'';
                $address = !empty($_POST['address'])?htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8'):''; 
                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<script>alert('Invalid email address');window.history.back();</script>";
                    exit();
                }
                // // saved to database
                // mysqli_query($conn, "INSERT INTO `tbl_contact_mail`(`name`, `phone`, `email`, `firm`, `state`, `city`, `comment`) VALUES ('$name','$phone','$email','$firm','$state','$city','$message')");
                
                // // saved to CRM
                // $date = date('Y-m-d H:i:s');
                // mysqli_query($conn, "INSERT INTO `crm_enquiries`(`name`, `phone`, `email`, `country`, `state`, `city`, `message`, `status`, `enquired_by`, `enq_on`) VALUES ('$name','$phone','$email','$country', '$state','$city','$message', 'Prospect', 'website', '$date')");


                // $to = 'wtdeveloper.chandani@gmail.com';
                $to = 'accounts@sndtrading.org';
               
                
                $subject = SITE_NAME.' Contact Enquiry Details '; 
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
                                                                        <b><span>".SITE_NAME." Contact Enquiry Details</span></b>
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
                                                    <p><b>Email-ID :-</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$email."</p>";
                    
                    if ($address != '') {
                        $htmlContent .= "<p><b>Address :-</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$address."</p>";
                    }
                    
                    $htmlContent .= "<p><b>Message :-</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$message."</p>
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
    }else{ 
		 echo "<script>alert('Please fill all the mandatory fields');window.location.href='".SITE_URL."contact';</script>";
	
    } 
 }
?>