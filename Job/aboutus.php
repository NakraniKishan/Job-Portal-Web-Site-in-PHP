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
if(isset($_SESSION["usrid"]))
{
$usrid=$_SESSION["usrid"];
$con=mysqli_connect("localhost","root","","job");
extract($_REQUEST);
$pandingcnt=0;
$selusr="select * from tbluser where UserId=".$_SESSION["usrid"];
$rs=mysqli_query($con,$selusr) or die(mysqli_error($con));
$res=mysqli_fetch_array($rs);
if(is_null($res["UserPhoto"]))
{
	$usrimg="download.jpg";	
}
else
{
	$usrimg=$res["UserPhoto"];	
}

if(is_null($res["Dob"]))
{
	$pandingcnt++;
}
if(is_null($res["Pincode"]))
{
	$pandingcnt++;
}
if(is_null($res["UserPhoto"]))
{
	$pandingcnt++;
}
if(is_null($res["ResumeFile"]))
{
	$pandingcnt++;
}

$flag=1;
$selusrqua="select * from tbluserqualification where UserId=".$_SESSION["usrid"];
$rsqua=mysqli_query($con,$selusrqua) or die(mysqli_error($con));
//$resqua=mysqli_num_rows($rsqua) or die(mysqli_error($con));
while($resqua=mysqli_fetch_array($rsqua))
{
	$flag=0;
}
if($flag==1)
{
	$pandingcnt++;
}

$flagskill=1;
$selusrskill="select * from tbluserskill where UserId=".$_SESSION["usrid"];
$rsskill=mysqli_query($con,$selusrskill) or die(mysqli_error($con));
//$resqua=mysqli_num_rows($rsqua) or die(mysqli_error($con));
while($resskill=mysqli_fetch_array($rsskill))
{
	$flagskill=0;
}
if($flagskill==1)
{
	$pandingcnt++;
}

$flagexp=1;
$desexp=0;
$selusrexp="select * from tbluserexperience where UserId=".$_SESSION["usrid"];
$rsexp=mysqli_query($con,$selusrexp) or die(mysqli_error($con));
//$resqua=mysqli_num_rows($rsqua) or die(mysqli_error($con));
while($resexp=mysqli_fetch_array($rsexp))
{
	$flagexp=0;
	if(is_null($resexp["Description"]) or $resexp["Description"]=="" )
	{
		$desexp=$desexp+1;
	}
}
if($flagexp==1)
{
	$pandingcnt++;
}
$pandingcnt=$pandingcnt+$desexp;
$flagcerti=1;
$certifile=0;
$selusrcerti="select * from tblusercertification where UserId=".$_SESSION["usrid"];
$rscerti=mysqli_query($con,$selusrcerti) or die(mysqli_error($con));
//$resqua=mysqli_num_rows($rsqua) or die(mysqli_error($con));
while($rescerti=mysqli_fetch_array($rscerti))
{
	$flagcerti=0;
	if(is_null($rescerti["FileUrl"]) or $rescerti["FileUrl"]=="" )
	{
		$certifile=$certifile+1;
	}
}
if($flagcerti==1)
{
	$pandingcnt++;
}
$pandingcnt=$pandingcnt+$certifile;


//echo $resqua;
//echo $pandingcnt;

}



if(isset($txtsendinq))
{
	$selforinq="select * from tbluser where UserID=".$_SESSION["usrid"];
	 	$rsforinq=mysqli_query($con,$selforinq) or die(mysqli_error($con));
	 	$resforinq=mysqli_fetch_array($rsforinq);
	 	$personf=$resforinq["FirstName"];
	 	$personm=$resforinq["MiddleName"];
	 	$personl=$resforinq["LastName"];
	 	$pername=$personf." ".$personm." ".$personl;
	 	$peremail=$resforinq["EmailId"];
	 	//echo $pername;
	 	$insinq="insert into tblinquiry values(null,'$pername','$peremail','$txtsub','$txtdes',null,now(),0,null,null,null,null)";
	 	//echo $insinq;
	 	mysqli_query($con,$insinq) or die(mysqli_error($con));
	 	header('location:usrcontact.php');
	//$insinq="insert into tblinquiry values(null,)";
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
				<ul class="account-btns">
					<li ><a href="usrchangepassword.php"><i class="la la-key"></i> Change Password</a></li>
					<li ><a href="usrlogout.php"><i class="la la-external-link-square"></i> Log Out</a></li>
				</ul>
			</div>
			<div class="responsivemenu">
				<ul>
						<li><a href="usrdashboard.php" title="">Home</a></li>
						<!-- <li><a href="usremployer.php" title="">Employers</a></li> -->
						<li><a href="usrcompany.php" title="">Organization</a></li>
						<li class="menu-item-has-children">
							<a> My JobsAware</a>
							<ul>
								<li><a href="usrprofile.php"> My Profile </a></li>
								<!-- <li><a href="blog_list2.html"> Create Resume </a></li> -->
								<li><a href="usrappliedjobs.php"> Applied Jobs </a></li>
								<li><a href="usrshortlistedjob.php"> Shortlisted Jobs </a></li>
								<li><a href="usrreview.php"> Give Review </a></li>
							</ul>
						</li>
						<li class="menu-item-has-children">
							<a>Notification</a>
							<ul>
								<li><a href="usrprofile.php">Panding Action <span class="pull-right-container">
										<small class="label pull-right bg-yellow" style="font-size: 13px;">
											<?php echo $pandingcnt; ?>
										</small>
									</span></a></li>
							</ul>
						</li>
						
					</ul>
			</div>
		</div>
	</div>
	
	<header class="white">
		<div class="menu-sec">
			<div class="container">
				<div class="logo" style="margin-left: -20px;">
					<a title=""><img src="images/resource/JOBsaware1.png" alt="" style="height:45px;margin-top:-5px;" /></a>
				</div><!-- Logo -->
				<div class="btn-extars">
					<ul class="account-btns">
						<li ><a href="usrchangepassword.php"><i class="la la-key"></i> Change Password</a></li>
						<li ><a href="usrlogout.php"><i class="la la-external-link-square"></i> Log Out</a></li>
					</ul>
				</div>
				<div class="my-profiles-sec">
					<span><img src="user/userimg/<?php echo $usrimg; ?>" alt="" style="width: 52px; height: 50px;" /></span>
				</div><!-- Btn Extras -->
				<nav>
					<ul>
						<li><a href="usrdashboard.php" title="">Home</a></li>
						<!-- <li><a href="usremployer.php" title="">Employers</a></li> -->
						<li><a href="usrcompany.php" title="">Organization</a></li>
						<li class="menu-item-has-children">
							<a>My JobsAware</a>
							<ul>
								<li><a href="usrprofile.php"> My Profile </a></li>
								<!-- <li><a href="blog_list2.html"> Create Resume </a></li> -->
								<li><a href="usrappliedjobs.php"> Applied Jobs </a></li>
								<li><a href="usrshortlistedjob.php"> Shortlisted Jobs </a></li>
								<li><a href="usrreview.php"> Give Review </a></li>
							</ul>
						</li>
						<li class="menu-item-has-children">
							<a>Notification</a>
							<ul>
								<li><a href="usrprofile.php">Panding Action 
								
									<span class="pull-right-container">
										<small class="label pull-right bg-yellow" style="font-size: 13px;">
											<?php echo $pandingcnt; ?>
										</small>
									</span>
									</a>
								</li>
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
			</div>
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
				 					<h3>About JobsAware</h3>
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


	
	
	<?php include_once "usrfooter.php"; ?>

</div>


	</div>
</div><!-- SIGNUP POPUP -->

<?php include_once "usrprofilesidebar.php"; ?>
<?php include_once "loadjs.php"; ?>

</body>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:08 GMT -->
</html>

