<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:09 GMT -->
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
	 if(isset($subinq))
	 {
	 	$insinquiry="insert into tblinquiry values(null,'$visname','$visemail','$vissub','$vismessage',null,now(),0,null,null,null,null)";
	 	echo $insinquiry;
	 	mysqli_query($con,$insinquiry) or die(mysqli_error($con));
	 	header('location:viscontact.php');
	 }
?>
<div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div>

<div class="theme-layout" id="scrollup">
	
	<div class="responsive-header">
		<div class="responsive-menubar">
			<div class="res-logo" style="margin-left:-20px;"><a href="index.php"><img src="images/resource/JOBsaware2.png" style="height:45px;" alt="" /></a></div>
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
					<a href="index.php"><img src="images/resource/JOBsaware2.png" alt="" style="height:45px;margin-top:-5px;" /></a>
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
								<h3>Contact</h3>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block">
			<div class="container">
				 <div class="row">
				 	<div class="col-lg-6 column">
				 		<div class="contact-form">
				 			<h3>Keep In Touch</h3>
				 			<form>
				 				<div class="row">
				 					<div class="col-lg-12">
				 						<span class="pf-title">Full Name</span>
				 						<div class="pf-field">
				 							<input type="text" name="visname" required="true" />
				 						</div>
				 					</div>
				 					<div class="col-lg-12">
				 						<span class="pf-title">Email</span>
				 						<div class="pf-field">
				 							<input type="email" name="visemail" required="true" />
				 						</div>
				 					</div>
				 					<div class="col-lg-12">
				 						<span class="pf-title">Subject</span>
				 						<div class="pf-field">
				 							<input type="text" name="vissub" required="true" />
				 						</div>
				 					</div>
				 					<div class="col-lg-12">
				 						<span class="pf-title">Message</span>
				 						<div class="pf-field">
				 							<textarea name="vismessage" required="true" ></textarea>
				 						</div>
				 					</div>
				 					<div class="col-lg-12">
				 						<button type="submit" name="subinq" >Send</button>
				 					</div>
				 				</div>
				 			</form>
				 		</div>
				 	</div>
				 	<div class="col-lg-6 column">
					 	<div class="contact-textinfo">
					 		<h3>Jobs Aware Office</h3>
					 		<ul>
					 			<li><i class="la la-map-marker"></i><span>JobsAware Office 
Near Jakat Naka, Surat Olpad Road, 
Jahangirpura. 
Surat-5 , Gujarat , INDIA  </span></li>
					 			<li><i class="la la-phone"></i><span>Call Us : 7573062203</span></li>
					 			<!-- <li><i class="la la-envelope-o"></i><span>Email : </span></li> -->
					 		</ul>
					 		
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>

<?php include_once "visfooter.php"; ?>

</div>

<?php include_once "loadjs.php"; ?>
</body>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:09 GMT -->
</html>

