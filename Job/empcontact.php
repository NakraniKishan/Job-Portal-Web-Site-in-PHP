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
	<?php session_start(); include_once "loadcss.php"; ?>	
</head>
<body>
<?php 
	 $con=mysqli_connect("localhost","root","","job");
	 extract($_REQUEST);
	 if(isset($subinq))
	 {
	 	$selforinq="select * from tblemployer where EmployerId=".$_SESSION["empid"];
	 	$rsforinq=mysqli_query($con,$selforinq) or die(mysqli_error($con));
	 	$resforinq=mysqli_fetch_array($rsforinq);
	 	$personf=$resforinq["FirstName"];
	 	$personm=$resforinq["MiddleName"];
	 	$personl=$resforinq["LastName"];
	 	$pername=$personf." ".$personm." ".$personl;
	 	$peremail=$resforinq["EmailId"];
	 	$insinquiry="insert into tblinquiry values(null,'$pername','$peremail','$vissub','$vismessage',null,now(),0,null,null,null,null)";
	 	echo $insinquiry;
	 	mysqli_query($con,$insinquiry) or die(mysqli_error($con));
	 	header('location:empcontact.php');
	 }
	
	if(isset($_SESSION['empid']))
	{
		$query="select * from tblemployer where EmployerId=".$_SESSION['empid'];
		$res=mysqli_query($con,$query);
		$resArr=mysqli_fetch_array($res);
	}
?>
<div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div>

<div class="theme-layout" id="scrollup">
	
	<div class="responsive-header">
		<div class="responsive-menubar">
			<div class="res-logo" style="margin-left:-20px;"><a><img src="images/resource/JOBsaware2.png" alt="" style="height:45px;" /></a></div>
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
				<a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
			
			</div><!-- Btn Extras -->
			<form class="res-search">
				<input type="text" placeholder="Job title, keywords or company name" />
				<button type="submit"><i class="la la-search"></i></button>
			</form>
			<div class="responsivemenu">
				<ul>
					<li class=""><a href="empdashboard.php" title="">Home</a></li>
					<li><a href="emporganization.php" title="">Organization</a></li>
					<li class="menu-item-has-children"><a href="#" title="">My Jobs</a>
						<ul>
							<li><a href="emppostjob.php" title="">Post Job</a></li>
							<li><a href="empmanagejob.php" title="">Manage Job</a></li>
							<li><a href="empjobapply.php" title="">View Applicants</a></li>
							<li><a href="empreview.php" title="">Give/View Review</a></li>
							<li><a href="emppackage.php" title="">View Package</a></li>
							<li><a href="emporganization.php" title="">Manage Organization</a></li>
							<li><a href="emporgbranchdetails.php" title="">Manage Organization Branch</a></li>
							<li><a href="#" title="">Shortlisted Candidate</a></li>
							<li><a href="empjsinquiry.php" title="">Job Seeker Message (Inquiry)</a></li>
							<li><a href="#" title="">View Interview</a></li>
						</ul>
					</li>		
					<div class="btn-extars" style="margin-left:20px;margin-top:-5px;">
						<a href="emppostjob.php" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
					</div>
					<li><a href="empchangepwd.php" title="">Change Password</a></li>
					<li class="menu-item-has-children"><a href="#" title="">Notification</a>
						<ul>
							<li><a href="#" title="">Pending Action</a></li>
							<li><a href="#" title="">Job Seeker Message</a></li>
						</ul>
					</li>
					<li class="menu-item-has-children"><a href="#" title=""><img src="employer/employerimg/<?php echo $resArr["ImageUrl"]; ?>" height="40px" width="40px" style="border-radius:50%;margin-top:-22px;"></a>
						<ul>
							<li><a href="empeditprofile.php" title="">Edit Profile</a></li>
							<li><a href="emplogout.php" title="">Logout</a></li>
						</ul>
					</li>
				</ul>

			</div>
		</div>
	</div>
	
	<header class="gradient">
		<div class="menu-sec">
			<div class="container">
				<div class="logo">
					<a><img src="images/resource/JOBsaware2.png" alt="" style="height:45px;margin-top:-5px;" /></a>
				</div><!-- Logo -->
				
				
				<nav>
					<ul>
						<li class=""><a href="empdashboard.php" title="">Home</a></li>
						<li><a href="emporganization.php" title="">Organization</a></li>	
						<li class="menu-item-has-children"><a href="#" title="">My Jobs</a>
							<ul>
								<li><a href="emppostjob.php" title="">Post Job</a></li>
								<li><a href="empmanagejob.php" title="">Manage Job</a></li>
								<li><a href="empjobapply.php" title="">View Applicants</a></li>
								<li><a href="empreview.php" title="">Give/View Review</a></li>
								<li><a href="emppackage.php" title="">View Package</a></li>
								<li><a href="emporganization.php" title="">Manage Organization</a></li>
								<li><a href="emporgbranchdetails.php" title="">Manage Organization Branch</a></li>
								<li><a href="#" title="">Shortlisted Candidate</a></li>
								<li><a href="empjsinquiry.php" title="">Job Seeker Message (Inquiry)</a></li>
								<li><a href="#" title="">View Interview</a></li>
							</ul>
						</li>
						<div class="btn-extars" style="margin-left:20px;margin-top:-5px;">
							<a href="emppostjob.php" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
						</div>	
						<li><a href="empchangepwd.php" title="">Change Password</a></li>
						<li class="menu-item-has-children"><a href="#" title="">Notification</a>
							<ul>
								<li><a href="#" title="">Pending Action</a></li>
								<li><a href="#" title="">Job Seeker Message</a></li>
							</ul>
						</li>
						
						<li class="menu-item-has-children">
							<a href="#" title="">
								<img src="employer/employerimg/<?php echo $resArr["ImageUrl"]; ?>" height="40px" width="40px" style="border-radius:50%;margin-top:-22px;">
							</a>
							<ul>
								<li><a href="empeditprofile.php" title="">Edit Profile</a></li>
								<li><a href="emplogout.php" title="">Logout</a></li>
							</ul>
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

<?php include_once "empfooter.php"; ?>

</div>

<?php include_once "loadjs.php"; ?>
</body>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:09 GMT -->
</html>

