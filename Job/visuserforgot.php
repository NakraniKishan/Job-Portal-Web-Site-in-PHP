<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:12 GMT -->
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
	
</head>
<body>
	<?php
  $con=mysqli_connect("localhost","root","","job");

  extract($_REQUEST);
  if(isset($btnsub))
  {
    $sel="select * from tbluser where EmailId='$txtsendemail'";
    $rs=mysqli_query($con,$sel) or die(mysqli_error($con));
    $cnt=mysqli_num_rows($rs);
    if($cnt==0)
    {
      $inval="Invalid EmailId - Try Again ! ";
    }
    else
    {
      $email = $_REQUEST['txtsendemail'] ;
      $encode=base64_encode("$email");
      $pas="http://localhost/job/visusrresetpass.php?fpcode=".$encode;
      $message = '<a href="'.$pas.'">'.$pas.'</a>';
      require("PHPMailer_5.2.0/class.PHPMailer.php");
      $mail = new PHPMailer();

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
$mail->FromName = "JobsAware" ;

// below we want to set the email address we will be sending our email to.
$mail->AddAddress($email);


$mail->IsHTML(true);

$mail->Subject = "JobsAware has sent link to Change Your Account Password !";

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
      $val="Please check Your e-mail, we have sent link to reset your password to your register email.";            
    }


}
}
  ?>

<div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div>

<div class="theme-layout" id="scrollup">
	
	<div class="responsive-header">
		<div class="responsive-menubar">
			<div class="res-logo"><a href="index-2.html" title=""><img src="images/resource/JOBsaware2.png" alt="" /></a></div>
			<div class="menu-resaction">
				<div class="res-openmenu">
					<img src="images/icon.png" alt="" /> Menu
				</div>
				<div class="res-closemenu">
					<img src="images/icon2.png" alt="" /> Close
				</div>
			</div>
		</div>
		<div class="responsive-opensec">
			<div class="btn-extars">
				<a href="visemplogin.php" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
				<ul class="account-btns">
					<li><a href="visusrregistration.php"><i class="la la-key"></i> Sign Up</a></li>
					<li><a href="visuserlogin.php"><i class="la la-external-link-square"></i> Login</a></li>
				</ul>
			</div><!-- Btn Extras -->
			<div class="responsivemenu">
				<ul>
						<li>
							<a href="index.php" title="">Home</a>
						</li>
						<li>
							<a href="viscompany.php" title="">Organization</a>
						</li>
				</ul>
			</div>
		</div>
	</div>
	
	<header class="gradient">
		<div class="menu-sec">
			<div class="container">
				<div class="logo">
					<a href="index-2.html" title=""><img src="images/resource/JOBsaware2.png" alt="" style="height:45px;margin-top:-5px;" /></a>
				</div><!-- Logo -->
				<div class="btn-extars">
					<a href="visemplogin.php" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
					<ul class="account-btns">
						<li><a href="visusrregistration.php"><i class="la la-key"></i> Sign Up</a></li>
						<li><a href="visuserlogin.php"><i class="la la-external-link-square"></i> Login</a></li>
					</ul>
				</div><!-- Btn Extras -->
				<nav>
					<ul>
						<li>
							<a href="index.php" title="">Home</a>
						</li>
						<li>
							<a href="viscompany.php" title="">Organization</a>
						</li>		
						
						
						
						
					</ul>
				</nav><!-- Menus -->
			</div>
		</div>
	</header>

	<section>
		<div class="block no-padding  gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner2">
							<div class="inner-title2">
								<h3> Forgot Password  </h3>
							</div>
							<div class="page-breacrumbs">
								<ul class="breadcrumbs">
									<li><a href="visuserlogin.php" title=""> Jobseeker Login</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block remove-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="account-popup-area signin-popup-box static">
							<div class="account-popup">
								<form>
									<div class="cfield">
										<input type="email" name="txtsendemail" placeholder="Enter Register Email" />
										<i class="la la-user"></i>
									</div>
									<button name="btnsub" type="submit"> Send Mail </button>
								</form>
							</div>
						</div><!-- LOGIN POPUP -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<center><b>
    <br>
<?php if(isset($inval))
  {
?>
<div class = "alert alert-danger alert-dismissable"><?php if(isset($inval)) { echo $inval; } ?></div>
<?php    
  } 
  ?>

<?php if(isset($val))
  {
?>
<div class = "alert alert-success"><?php if(isset($val)) { echo $val; } ?></div>
<?php    
  } 
  ?>
</b></center>
<?php include_once "visfooter.php"; ?>

</div>


<?php include_once "loadjs.php"; ?>

</body>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:12 GMT -->
</html>

