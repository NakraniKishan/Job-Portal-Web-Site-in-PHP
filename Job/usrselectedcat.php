<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/job_list_classic.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:03 GMT -->
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
	 
	 if(isset($_REQUEST["catid"]))
	 {
	 	$searchjob=$_REQUEST["catid"];
	 	$selcattodis="select * from tblcategory where CategoryId=".$searchjob;
	 $rscattodis=mysqli_query($con,$selcattodis) or die(mysqli_error($con));
	 $rescattodis=mysqli_fetch_array($rscattodis);
	 $seljobcat="select * from tbljobpost where JobCategory=".$searchjob;
	 $rsjobcat=mysqli_query($con,$seljobcat) or die(mysqli_error($con));
	 $seljobpostcat="select * from tbljobpost a 
   	 				left join tblcategory b on a.JobCategory=b.CategoryId
   	 				left join tbljobpostdetail c on a.JobPostId=c.JobPostId
   	 				left join tblskill d on c.SkillId=d.SkillId
   	 				left join tblstate e on c.StateId=e.StateId
   	 				left join tblcountry f on c.CountryId=f.CountryId
   	 				left join tblemployer g on a.EmployerId=g.EmployerId
   	 				left join tblorganization h on g.OrganizationId=h.OrganizationId
   	  				where a.JobIsActive=1 and h.IsActive=1 and h.IsBlock=0 and JobCategory=$searchjob order by a.CreatedOn desc ";
   	 $rsjobpostcat=mysqli_query($con,$seljobpostcat) or die(mysqli_error($con));
   	 $impcnt=mysqli_num_rows($rsjobpostcat);	
	 }
	 else
	 {
	 	if(isset($_SESSION["catid"]))
   	 	{
   	 		if(isset($_SESSION["conid"]))
   	 		{
   	 			$searchjob=$_SESSION["catid"];
   	 			$searchjonbycon=$_SESSION["conid"];
	 			$selcattodis="select * from tblcategory where CategoryId=".$searchjob;
				$rscattodis=mysqli_query($con,$selcattodis) or die(mysqli_error($con));
				$rescattodis=mysqli_fetch_array($rscattodis);

				$seljobcat="select * from tbljobpost where JobCategory=".$searchjob;
				$rsjobcat=mysqli_query($con,$seljobcat) or die(mysqli_error($con));
				$seljobpostcat="select * from tbljobpost a 
   	 							left join tblcategory b on a.JobCategory=b.CategoryId
   	 							left join tbljobpostdetail c on a.JobPostId=c.JobPostId
   	 							left join tblskill d on c.SkillId=d.SkillId
   	 							left join tblstate e on c.StateId=e.StateId
   	 							left join tblcountry f on c.CountryId=f.CountryId
   	 							left join tblemployer g on a.EmployerId=g.EmployerId
   	 							left join tblorganization h on g.OrganizationId=h.OrganizationId
   	  							where a.JobIsActive=1 and c.CountryId=$searchjonbycon and JobCategory=$searchjob order by a.CreatedOn desc ";
   	 			$rsjobpostcat=mysqli_query($con,$seljobpostcat) or die(mysqli_error($con));
   	 			$impcnt=mysqli_num_rows($rsjobpostcat);
   	 		}
   	 		else
   	 		{
   	 		$searchjob=$_SESSION["catid"];
	 		$selcattodis="select * from tblcategory where CategoryId=".$searchjob;
			$rscattodis=mysqli_query($con,$selcattodis) or die(mysqli_error($con));
			$rescattodis=mysqli_fetch_array($rscattodis);

			$seljobcat="select * from tbljobpost where JobCategory=".$searchjob;
			$rsjobcat=mysqli_query($con,$seljobcat) or die(mysqli_error($con));
			$seljobpostcat="select * from tbljobpost a 
   	 						left join tblcategory b on a.JobCategory=b.CategoryId
   	 						left join tbljobpostdetail c on a.JobPostId=c.JobPostId
   	 						left join tblskill d on c.SkillId=d.SkillId
   	 						left join tblstate e on c.StateId=e.StateId
   	 						left join tblcountry f on c.CountryId=f.CountryId
   	 						left join tblemployer g on a.EmployerId=g.EmployerId
   	 						left join tblorganization h on g.OrganizationId=h.OrganizationId
   	  						where a.JobIsActive=1 and JobCategory=$searchjob order by a.CreatedOn desc ";
   	 		$rsjobpostcat=mysqli_query($con,$seljobpostcat) or die(mysqli_error($con));
   	 		$impcnt=mysqli_num_rows($rsjobpostcat);
   	 		}
   	 		
   	 	}
	 	
   	 	elseif(isset($_SESSION["conid"]))
   	 	{
   	 		$searchjonbycon=$_SESSION["conid"];
	 		$selcattodis="select * from tblcategory where CategoryId=".$searchjonbycon;
	 		$rscattodis=mysqli_query($con,$selcattodis) or die(mysqli_error($con));
			$rescattodis=mysqli_fetch_array($rscattodis);
			$seljobcat="select * from tbljobpost where JobCategory=".$searchjonbycon;
			$rsjobcat=mysqli_query($con,$seljobcat) or die(mysqli_error($con));
			$seljobpostcat="select * from tbljobpost a 
   	 						left join tblcategory b on a.JobCategory=b.CategoryId
   	 						left join tbljobpostdetail c on a.JobPostId=c.JobPostId
   	 						left join tblskill d on c.SkillId=d.SkillId
   	 						left join tblstate e on c.StateId=e.StateId
   	 						left join tblcountry f on c.CountryId=f.CountryId
   	 						left join tblemployer g on a.EmployerId=g.EmployerId
   	 						left join tblorganization h on g.OrganizationId=h.OrganizationId
   	  						where a.JobIsActive=1 and c.CountryId=$searchjonbycon order by a.CreatedOn desc ";
   	 		$rsjobpostcat=mysqli_query($con,$seljobpostcat) or die(mysqli_error($con));
   	 		$impcnt=mysqli_num_rows($rsjobpostcat);
   	 	}
	}

	 
   	 //$count=mysqli_num_rows($rsjobpostcat);
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
						<div class="inner-header wform">
							<div class="job-search-sec">
								<div class="job-search">
									<h4><?php echo $rescattodis["CategoryName"]; ?></h4>
									<!-- <form>
										<div class="row">
											<div class="col-lg-7">
												<div class="job-field">
													<input type="text" placeholder="Job title, keywords or company name" />
													<i class="la la-keyboard-o"></i>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="job-field">
													<select data-placeholder="City, province or region" class="chosen-city">
														<option>Instambul</option>
														<option>New York</option>
														<option>London</option>
														<option>Russia</option>
													</select>
													<i class="la la-map-marker"></i>
												</div>
											</div>
											<div class="col-lg-1">
												<button type="submit"><i class="la la-search"></i></button>
											</div>
										</div>
									</form>
									<div class="tags-bar">
								 		<span>Full Time<i class="close-tag">x</i></span>
								 		<span>UX/UI Design<i class="close-tag">x</i></span>
								 		<span>Istanbul<i class="close-tag">x</i></span>
								 		<div class="action-tags">
								 			<a href="#" title=""><i class="la la-cloud-download"></i> Save</a>
								 			<a href="#" title=""><i class="la la-trash-o"></i> Clean</a>
								 		</div>
								 	</div> --><!-- Tags Bar -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block remove-top">
			<div class="container">
				 <div class="row no-gape">
				 	
				 	<div class="col-lg-9 column">
				 		<div class="modrn-joblist np">
					 		<div class="filterbar">
					 			
					 			
					 			<h5>Available Jobs <?php echo $impcnt; ?></h5>
					 		</div>
						 </div><!-- MOdern Job LIst -->
						 <div class="job-list-modern">
						 	<div class="job-listings-sec no-border">
						 		<?php while($resjobpostcat=mysqli_fetch_array($rsjobpostcat)){ 
						 			if(is_null($resjobpostcat["Logo"]))
						 			{
						 				$log="nologo.jpg";
						 			} 
						 			elseif($resjobpostcat["Logo"]=="null")
						 			{
						 				$log="nologo.jpg";	
						 			}
						 			else
						 			{
						 				$log=$resjobpostcat["Logo"];
						 			}

						 		?>
								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"><img src="employer/logo/<?php echo $log; ?>" alt="" /> </div>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $resjobpostcat["CategoryName"]; ?>
										<h3><a href="usrjobdetail.php?jobid=<?php echo $resjobpostcat["JobPostId"]; ?>" title="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $resjobpostcat["SkillName"]; ?></a></h3>
										<!-- <span><?php echo $resjobpostcat["JobDescription"]; ?></span> -->
										<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Vacancies : <?php echo $resjobpostcat["TotalVacancies"]; ?></span>
										<div class="job-lctn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="la la-map-marker"></i><?php echo $resjobpostcat["StateName"]; ?>, <?php echo $resjobpostcat["CountryName"]; ?></div>
									</div>
									<?php if(isset($_REQUEST["catid"])) { ?>
									<div class="job-style-bx">
										<span class="job-is ft"><a href="?catid=<?php echo $searchjob; ?>&app=<?php echo $resjobpostcat["JobPostDetailId"]; ?>"> Apply</a></span>
										<i><?php echo $resjobpostcat["WorkType"]; ?></i>
									</div>
									<?php } ?>
									<?php if(isset($_SESSION["conid"])) { ?>
									<div class="job-style-bx">
										<span class="job-is ft"><a href="?app=<?php echo $resjobpostcat["JobPostDetailId"]; ?>"> Apply</a></span>
										<i><?php echo $resjobpostcat["WorkType"]; ?></i>
									</div>
									<?php } ?>
									<?php if(isset($_SESSION["catid"])) { ?>
									<div class="job-style-bx">
										<span class="job-is ft"><a href="?app=<?php echo $resjobpostcat["JobPostDetailId"]; ?>"> Apply</a></span>
										<i><?php echo $resjobpostcat["WorkType"]; ?></i>
									</div>
									<?php } ?>

								</div>
							<?php } ?>
								<!-- Job -->
							</div>
							<div class="pagination">
								<ul><?php //echo $count;  ?>
									
										 <li class="prev"><a href="#"><i class="la la-long-arrow-left"></i> Prev</a></li>
									
									<li class="next"><a href="#">Next <i class="la la-long-arrow-right"></i></a></li>
									
									
								</ul>
							</div><!-- Pagination -->
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

<!-- Mirrored from grandetest.com/theme/jobhunt-html/job_list_classic.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:04 GMT -->
</html>

