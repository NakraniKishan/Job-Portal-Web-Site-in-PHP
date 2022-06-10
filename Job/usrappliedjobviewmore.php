<?php
session_start();
if(isset($_SESSION["usrid"]))
{
  $usrid=$_SESSION["usrid"];
?>
<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/job-single3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:07 GMT -->
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
<?php
$con=mysqli_connect("localhost","root","","job");
extract($_REQUEST);
$selcompdis="	select * from tbljobapply a 
				left join tbljobpost b on a.JobPostId=b.JobPostId 
				left join tblemployer c on b.EmployerId=c.EmployerId
				left join tblorganization d on c.OrganizationId=d.OrganizationId
				left join tblstate e on d.StateId=e.StateId
				left join tblcountry f on d.CountryId=f.CountryId
				left join tbljobpostdetail g on a.JobPostDetailId=g.JobPostDetailId
				left join tblskill h on g.SkillId=h.SkillId
				where a.JobApplyId=".$_SESSION["jobappid"];
$rscomdis=mysqli_query($con,$selcompdis) or die(mysqli_error($con));
$rescomdis=mysqli_fetch_array($rscomdis);
if(is_null($rescomdis["Logo"])) { $log="nologo.jpg"; }
else { $log=$rescomdis["Logo"]; }

$selcompjob="select * from tbljobpost a 
   	 				left join tblcategory b on a.JobCategory=b.CategoryId
   	 				left join tbljobpostdetail c on a.JobPostId=c.JobPostId
   	 				left join tblskill d on c.SkillId=d.SkillId
   	 				left join tblstate e on c.StateId=e.StateId
   	 				left join tblcountry f on c.CountryId=f.CountryId
   	 				left join tblemployer g on a.EmployerId=g.EmployerId
   	 				left join tblorganization h on g.OrganizationId=h.OrganizationId
   	  				where a.JobIsActive=1 and a.EmployerId=".$rescomdis["EmployerId"];
$rscompjob=mysqli_query($con,$selcompjob) or die(mysqli_error($con));
$cntjob=mysqli_num_rows($rscompjob);


if(isset($btninquiry))
{
	$selus="select * from tbluser where UserId=".$_SESSION["usrid"];
	$rsus=mysqli_query($con,$selus) or die(mysqli_error($con));
	$resus=mysqli_fetch_array($rsus);
	$f=$resus["FirstName"]." ".$resus["MiddleName"]." ".$resus["LastName"];
	$e=$resus["EmailId"];
	$j=$_SESSION["jobappid"];
	$ins="insert into tblinquiry values(null,'$f','$e','$txtsubject','$txtdescrip',$j,now(),0,'','','')";
	echo $ins;
	mysqli_query($con,$ins) or die(mysqli_error($con));
	header('location:usrappliedjobviewmore.php');
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
<body>

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
							<h3><?php echo $rescomdis["OrganizationName"]; ?></h3>
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
				 	<div class="col-lg-12 column">
				 		<div class="job-single-sec style3">
				 			<div class="job-head-wide">
				 				<div class="row">
				 					<div class="col-lg-8">
				 						<div class="job-single-head3">
							 				<div class="job-thumb"> <img src="employer/logo/<?php echo $log; ?>" alt="" /><span><?php echo $cntjob; ?> Open Position</span> </div>
							 				<div class="job-single-info3">
							 					<h3><?php echo $rescomdis["SkillName"]; ?></h3>
							 					<span> <i class="la la-map-marker"></i><?php echo $rescomdis["StateName"]; ?>, <?php echo $rescomdis["CountryName"]; ?></span><span class="job-is ft"><?php echo $rescomdis["WorkType"]; ?></span>
							 					<ul class="tags-jobs">
								 				</ul>
							 				</div>
							 			</div><!-- Job Head -->
				 					</div>
				 					
				 				</div>
				 			</div>
				 			<div class="job-wide-devider">
							 	<div class="row">
							 		<div class="col-lg-8 column">		
							 			<div class="job-details">
							 				<h3>Job Description</h3>
							 				<p><?php echo $rescomdis["JobDescription"]; ?></p>
							 				
							 				
							 			</div>
							 			<div class="job-details">
							 				<h3>Organization Description</h3>
							 				<p><?php echo $rescomdis["Description"]; ?></p>
							 				
							 				
							 			</div>
							 			
							 			
								 		<div class="recent-jobs">
							 				<h3>Recent Jobs</h3>
							 				<div class="job-list-modern">
											 	<div class="job-listings-sec no-border">
											 		<?php
											 		while($rescompjob=mysqli_fetch_array($rscompjob))
											 		{ 
											 			if(is_null($rescompjob["Logo"]))
						 			{
						 				$log="nologo.jpg";
						 			} 
						 			else
						 			{
						 				$log=$rescompjob["Logo"];
						 			}
											 		?>
													<div class="job-listing wtabs">
														<div class="job-title-sec">
															<div class="c-logo"> <img src="employer/logo/<?php echo $log; ?>" alt="" /> </div>
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rescompjob["CategoryName"]; ?>
															<h3><a href="usrjobdetail.php?jobid=<?php echo $rescompjob["JobPostId"]; ?>" title="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rescompjob["SkillName"]; ?></a></h3>
															<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Vacancies : <?php echo $rescompjob["TotalVacancies"]; ?></span>
															<div class="job-lctn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="la la-map-marker"></i><?php echo $rescompjob["StateName"]; ?>, <?php echo $rescompjob["CountryName"]; ?></div>
														</div>
														<div class="job-style-bx">
															<span class="job-is ft"><a href="?app=<?php echo $rescompjob["JobPostDetailId"]; ?>"> Apply</a></span>
										<i><?php echo $rescompjob["WorkType"]; ?></i>
														</div>
													</div>
													<?php } ?>
													
												</div>
											 </div>
							 			</div>
							 		</div>
							 	
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

<!-- Mirrored from grandetest.com/theme/jobhunt-html/job-single3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:07 GMT -->
</html>
<?php
}
else
{
	header('location:index.php');
}
?>
