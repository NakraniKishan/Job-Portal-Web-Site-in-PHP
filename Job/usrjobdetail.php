<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/job_single2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:07 GMT -->
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
	 $postid=$_REQUEST["jobid"];
	 $seljobdetail="select * from tbljobpost a
	 				left join tblemployer b on a.EmployerId=b.EmployerId
	 				left join tblorganization c on b.OrganizationId=c.OrganizationId
	 				left join tbljobpostdetail d on a.JobPostId=d.JobPostId
	 				left join tblskill e on d.SkillId=e.SkillId
	 				left join tblstate f on d.StateId=f.StateId
	 				left join tblcountry g on d.CountryId=g.CountryId
	 				where a.JobPostId=$postid";
	 $rsjobdetail=mysqli_query($con,$seljobdetail) or die(mysqli_error($con));
	 $resjobdetail=mysqli_fetch_array($rsjobdetail);
	 if(is_null($resjobdetail["Logo"]))
	 {
	 	$log="nologo.jpg";
	 } 
	 elseif($resjobdetail["Logo"]=="null")
	 {
	 	$log="nologo.jpg";
	 }
	 else
	 {
	 	$log=$resjobdetail["Logo"];
	 }
	 if(isset($btninquiry))
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
	 	$insinq="insert into tblinquiry values(null,'$pername','$peremail','$txtsubject','$txtdescrip',$postid,now(),0,null,null,null,null)";
	 	//echo $insinq;
	 	mysqli_query($con,$insinq) or die(mysqli_error($con));
	 }

	 if(isset($app))
   	 {
   	 	if(isset($_SESSION["usrid"]))
   	 	{
   	 		$cntbeforeapp=0;
	   	 	$seltoapp="select * from tbljobpostdetail where JobPostDetailId=".$_REQUEST["app"];
	   	 	$rstoapp=mysqli_query($con,$seltoapp) or die(mysqli_error($con));
	   	 	$restoapp=mysqli_fetch_array($rstoapp);
	   	 	$jid=$restoapp["JobPostId"];
	   	 	$jbid=$restoapp["JobPostDetailId"];
	   	 	$uid=$_SESSION["usrid"];
	   	 	$selbeforeapp="select * from tbljobapply where JobPostId=$jid and JobPostDetailId=$jbid and UserId=$uid";
	   	 	$rsbeforeapp=mysqli_query($con,$selbeforeapp) or die(mysqli_error($con));
	   	 	$cntbeforeapp=mysqli_num_rows($rsbeforeapp);
	   	 	if($cntbeforeapp==0)
	   	 	{
	   	 	$instoapp="insert into tbljobapply values(null,$jid,$jbid,$uid,now(),0)";	
	   	 	mysqli_query($con,$instoapp) or die(mysqli_error($con));
	   	 	header('location:usrappliedjobs.php');	
	   	 	}
	   	 	header('location:usrappliedjobs.php');
	   	 	
   	 	}
   	 }

?>
<div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div>

<div class="theme-layout" id="scrollup">
	
	<?php include_once "usrheader.php"; ?>

	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3><?php echo $resjobdetail["OrganizationName"]; ?></h3>
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
				 	<div class="col-lg-8 column">
				 		<div class="job-single-sec">
				 			<div class="job-single-head2">
				 				<div class="job-title2"><h3><?php echo $resjobdetail["SkillName"]; ?></h3><span class="job-is ft"><?php echo $resjobdetail["WorkType"]; ?></span></div>
				 				<ul class="tags-jobs">
				 					<li><i class="la la-map-marker"></i><?php echo $resjobdetail["StateName"]; ?>, <?php echo $resjobdetail["CountryName"]; ?></li>
				 					<li><i class="la la-money"></i> Min Salary : <span><?php echo $resjobdetail["MinSalary"]; ?></span></li>
				 					<li><i class="la la-calendar-o"></i> Post Date: <?php echo $resjobdetail["CreatedOn"]; ?></li>
				 				</ul>
				 				
				 			</div><!-- Job Head -->
				 			<div class="job-details">
				 				<h3>Job Description</h3>
				 				<p><?php echo $resjobdetail["JobDescription"]; ?></p><br>
				 				<p>Total Vacancies : <?php echo $resjobdetail["TotalVacancies"]; ?></p>
				 				
				 				
				 				
				 			</div>
				 			
				 			
				 		</div>
				 		<div class="col-lg-4 column" >
							 			
								 		<div class="quick-form-job" style="width:400px;">
								 			<h3>Inquiry</h3>
								 			<form method="Post">
								 				<input type="text" required="true" name="txtsubject" placeholder="Subject" />
								 				<textarea required="true" name="txtdescrip" placeholder="Enter Your Message"></textarea>
								 				<button class="submit" name="btninquiry">Send Message</button>
								 			</form>
								 		</div>
							 		</div>
				 	</div>

				 	<div class="col-lg-4 column">
				 		<div class="job-single-head style2">
			 				<div class="job-thumb"> <img src="employer/logo/<?php echo $log; ?>" alt="" height="150px;" /> </div>
			 				<div class="job-head-info">
			 					<h4><?php echo $resjobdetail["OrganizationName"]; ?></h4>
			 					<span><?php echo $resjobdetail["Address"]; ?></span>
			 					<?php 
			 					if(is_null($resjobdetail["WebsiteUrl"]))
			 					{

			 					}
			 					elseif($resjobdetail["WebsiteUrl"]=="null")
			 					{

			 					}
			 					else
			 					{?>
			 						<p><i class="la la-unlink"><?php echo $resjobdetail["WebsiteUrl"]; ?> </i></p>
			 					<?php }

			 					 ?>
			 					<p><i class="la la-phone"></i> <?php echo $resjobdetail["PhoneNo"]; ?></p>
			 					<p><i class="la la-envelope-o"></i> <?php echo $resjobdetail["EmailId"]; ?></p>
			 				</div>
			 				
			 				<a href="?jobid=<?php echo $_REQUEST["jobid"]; ?>&app=<?php echo $resjobdetail["JobPostDetailId"]; ?>" class="apply-job-btn"><i class="la la-paper-plane"></i>Apply for job</a>
			 				
			 			</div><!-- Job Head -->
				 	</div>
				 	
				</div>
			</div>
		</div>
	</section>

	<?php include_once "usrfooter.php"; ?>

</div>

<div class="account-popup-area signin-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>User Login</h3>
		<span>Click To Login With Demo User</span>
		<div class="select-user">
			<span>Candidate</span>
			<span>Employer</span>
		</div>
		<form>
			<div class="cfield">
				<input type="text" placeholder="Username" />
				<i class="la la-user"></i>
			</div>
			<div class="cfield">
				<input type="password" placeholder="********" />
				<i class="la la-key"></i>
			</div>
			<p class="remember-label">
				<input type="checkbox" name="cb" id="cb1"><label for="cb1">Remember me</label>
			</p>
			<a href="#" title="">Forgot Password?</a>
			<button type="submit">Login</button>
		</form>
		<div class="extra-login">
			<span>Or</span>
			<div class="login-social">
				<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
				<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
			</div>
		</div>
	</div>
</div><!-- LOGIN POPUP -->

<div class="account-popup-area signup-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>Sign Up</h3>
		<div class="select-user">
			<span>Candidate</span>
			<span>Employer</span>
		</div>
		<form>
			<div class="cfield">
				<input type="text" placeholder="Username" />
				<i class="la la-user"></i>
			</div>
			<div class="cfield">
				<input type="password" placeholder="********" />
				<i class="la la-key"></i>
			</div>
			<div class="cfield">
				<input type="text" placeholder="Email" />
				<i class="la la-envelope-o"></i>
			</div>
			<div class="dropdown-field">
				<select data-placeholder="Please Select Specialism" class="chosen">
					<option>Web Development</option>
					<option>Web Designing</option>
					<option>Art & Culture</option>
					<option>Reading & Writing</option>
				</select>
			</div>
			<div class="cfield">
				<input type="text" placeholder="Phone Number" />
				<i class="la la-phone"></i>
			</div>
			<button type="submit">Signup</button>
		</form>
		<div class="extra-login">
			<span>Or</span>
			<div class="login-social">
				<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
				<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
			</div>
		</div>
	</div>
</div><!-- SIGNUP POPUP -->

<?php include_once "usrprofilesidebar.php"; ?>
<?php include_once "loadjs.php"; ?>

</body>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/job_single2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:07 GMT -->
</html>

