<?php
session_start();
if(isset($_SESSION["empid"]))
{
  $empid=$_SESSION["empid"];
?>
<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/candidates_single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:43 GMT -->
<head>
	<link rel="shortcut icon" type="image/x-icon" href="fevicon.png">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Jobs Aware</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">

	<!-- Styles -->
	<?php include_once "loadcss.php"; ?>
	<style type="text/css">
	input[type='file']::-webkit-file-upload-button
    {
      padding: 8px 30px;
      color : #fff;
      background-color: #34495e;
      border : none;
      font-family: 'Montserrat', sans-serif;
      font-size: 14px;
      font-weight: 500;
      border-radius: 2px;
      margin: 10px 1px;
    }
	.btnmain{
	float: right;
    background: #ffffff;
    border: 2px solid #fb236a;
    color: #202020;
    font-family: Open Sans;
    font-size: 15px;
    padding: 11px 40px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    -ms-border-radius: 8px;
    -o-border-radius: 8px;
    border-radius: 8px;
    margin-top: 30px;
	}
	.btnmain:hover{
	float: right;
    background: #fb236a;
    border: 2px solid #fb236a;
    color: white;
    font-family: Open Sans;
    font-size: 15px;
    padding: 11px 40px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    -ms-border-radius: 8px;
    -o-border-radius: 8px;
    border-radius: 8px;
    margin-top: 30px;
	}
	</style>
</head>

<?php
$con=mysqli_connect("localhost","root","","job");
extract($_REQUEST);
include_once 'Editor/ckeditor.php' ;
include_once 'Editor/finder/ckfinder.php';
$selinqtosend="select * from tblinquiry where InquiryId=".$inqid;
$rsinqtosend=mysqli_query($con,$selinqtosend) or die(mysqli_error($con));
$resinqtosend=mysqli_fetch_array($rsinqtosend);


  if(isset($btnsendinq))
  {
  		
      $message = $txtinqdesc;
      $ins="update tblinquiry set IsReplied=1, Reply='$message', RepliedOn=now(), RepliedByEmpId=$empid where InquiryId=$inqid";
      mysqli_query($con,$ins) or die(mysqli_error($con));
      $selmail1="select * from tblinquiry where InquiryId=".$inqid;
      $rsmail1=mysqli_query($con,$selmail1) or die(mysqli_error($con));
      $res1=mysqli_fetch_array($rsmail1);
      require("PHPMailer_5.2.0/class.PHPMailer.php");
 		$mail = new PHPMailer();
 
        $email=$res1["EmailId"];
    // set mailer to use SMTP
     $mail->IsSMTP();

// As this email.php script lives on the same server as our email server
// we are setting the HOST to localhost
$mail->Host = "smtp.gmail.com";  // specify main and backup server

$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Port=465;
$mail->SMTPSecure = "ssl";
// When sending email using PHPMailer, you need to send from a valid email address
// In this case, we setup a test email account with the following credentials:
// email: send_from_PHPMailer@bradm.inmotiontesting.com
// pass: password
$mail->Username = "makemyoccassion@gmail.com";  // SMTP username
$mail->Password = "coolgirls"; // SMTP password

// $email is the user's email address the specified
// on our contact us page. We set this variable at
// the top of this page with:
// $email = $_REQUEST['email'] ;
$mail->From = "gaurangjo@gmail.com" ;
$mail->FromName = "JobsAware.com" ;

// below we want to set the email address we will be sending our email to.
$mail->AddAddress($email);

$mail->IsHTML(true);

$mail->Subject = $inqsubject;

// $message is the user's message they typed in
// on our contact us page. We set this variable at
// the top of this page with:
// $message = $_REQUEST['message'] ;
$mail->Body    = $message;
$mail->AltBody = $message; 
if(!$mail->Send())
    {
      $val="Message could not be sent - Mailer Error ". $mail->ErrorInfo;
      exit;
    }
    else
    {
      
      $val="Please check Your e-mail, we have sent password to your register email.";            
    }
  

  header('location:empusrinquiry.php');
  }


?>
<body>

<div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div>

<div class="theme-layout" id="scrollup">
	
	<?php include_once "empheader.php"; ?>

	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3>Inquiry Reply</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
              				<form method="post" enctype="multipart/form-data">
					 			
					 			<div class="profile-form-edit">
					 				<div class="row" style="margin-left: 10px;">
					 					
					 					<div class="col-lg-8" style="margin-top: -20px;">
					 						<span class="pf-title">To :</span>
					 						<div class="pf-field">
					 							<input type="text" name="minexp" disabled="" value="<?php echo $resinqtosend["EmailId"]; ?>"  />
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 					</div>

					 					<div class="col-lg-12" style="margin-top: -20px;">
					 						<span class="pf-title">Subject</span>
					 						<div class="pf-field">
					 							<input type="text" name="inqsubject" id="inqsubject" />
					 						</div>
					 					</div>

					 					<div class="col-lg-12" style="margin-top: -20px;">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<?php

$initialValue="";


$ckeditor = new CKEditor( ) ;
$ckeditor->basePath='editor/' ;
$ckeditor->config['width'] = 865;
$ckeditor->config['height'] =400;
$ckeditor->config['filebrowserBrowseUrl'] = '/ckfinder/ckfinder.html';
$ckeditor->config['filebrowserImageBrowseUrl'] = '/ckfinder/ckfinder.html?type=Images';
$ckeditor->config['filebrowserFlashBrowseUrl'] = '/ckfinder/ckfinder.html?type=Flash';
$ckeditor->config['filebrowserUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
$ckeditor->config['filebrowserImageUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUploa1d&type=Images&currentFolder=/uimages';
$ckeditor->config['filebrowserFlashUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
CKFinder::SetupCKEditor($ckeditor, 'editor/finder/' ) ;
$ckeditor->editor('txtinqdesc', $initialValue);
?>
					 						</div>
					 					</div>

					 										 					
					 					<div class="col-lg-12">
					 						<button class="btnmain" type="submit" name="btnsendinq" >Send</button>
					 					</div>
					 				</div><br>

					 			
					 		</div>
					 	</form>
					 </div>
					</div>
				</div>
			</div>
		</div>
	</section>








	<?php include_once "empfooter.php"; ?>

</div>









<?php include_once "loadjs.php"; ?>



<!-- Mirrored from grandetest.com/theme/jobhunt-html/candidates_single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:44 GMT -->


</html>
<?php
}
else
{
	header('location:index.php');
}
?>
