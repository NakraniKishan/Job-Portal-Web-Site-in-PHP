<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:07 GMT -->
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
	
	<header class="white">
		<div class="menu-sec">
			<div class="container">
				<div class="logo">
					<a><img src="images/resource/JOBsaware1.png" alt="" style="height:45px;margin-top:-5px;" /></a>
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
								<h3>About Us</h3>
							</div>
							
						</div>
					</div>
				</div>
-			</div>
		</div>
	</section>

	<section>
		<div class="block">
			<div class="container">
				 <div class="row">
				 	<div class="col-lg-12">
				 		<div class="about-us">
				 			<div class="row">
				 				<div class="col-lg-12">
				 					<h3>About Jobs Aware</h3>
				 				</div>
				 				<div class="col-lg-7">
				 					<p>The JobsAware website is flooded with highly skilled job seekers, all of which are competing for the same limited number of positions, there are more applicants saturating the job market every single day. To say that the applicant pool for most new positions out there is competitive would be an understatement. Recruiters are screening thousands of applicants as thoroughly as possible. While combing over resumes, they’re also using the power of the internet to make sure they are picking the cream of the crop to fill these limited open positions. Combine this with the fact that some jobs become open and available without the ability to ever hear about them, and you’re looking at a very difficult situation. Job Seeker that take advantage of the tools and resources offered by Job Seekers Website have found the best kept secret for increasing their chances of finding the job they deserve. </p>
				 					<p>Job Search Websites connect thousands of men and women with top employment opportunities, Universe Jobs immediately gives you access to the kind of open positions that you would expect to find on other premium job search websites. The positions listed are extremely attractive, because of the industries that they are in (Technology, Healthcare, Medical, Business, Finance, etc), and the high quality companies represented. These are positions that can launch your career, help you secure the financial future you are working towards. </p>
				 				</div>
				 				<div class="col-lg-5">
				 					<img src="images/resource/about.jpg" alt="" style="border-radius: 20px; border" />
				 				</div>
				 				<div class="col-lg-12">
				 					<p>Apply for jobs online with Universe Jobs as it works with employers to list the best jobs, not only just in the USA but world-wide as well to provide the widest range of open job positions. They also utilize an in depth referral network that is not available on most other job search websites. This gives you instant access to red hot job opportunities as soon as they become available so that you have every opportunity to secure your next job - before anyone else even knows the job existed! Don't miss out, Sign up Now for a Free Account at JobsAware. And you’ll be given instant access to thousands of job opportunities - as well as many other additional job search resources to assist you in locking in the right position, the position you have been searching for, your dream career is just a few clicks away.</p>
				 				</div>
				 			</div>
				 			
				 		</div>
				 	</div>
				 </div>
			</div>
		</div>
	</section>


	
	
	<?php include_once "empfooter.php"; ?>

</div>


	</div>
</div><!-- SIGNUP POPUP -->

<?php include_once "loadjs.php"; ?>

</body>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:08 GMT -->
</html>

