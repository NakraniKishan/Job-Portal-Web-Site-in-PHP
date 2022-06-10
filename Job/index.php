<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:05 GMT -->
<head>
	<link rel="shortcut icon" type="image/x-icon" href="fevicon.png">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Jobs Aware</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">

	<!-- Styles -->
	<?php  include_once "loadcss.php"; ?>
	<script src="dist/js/jsreview/jquery.js" type="text/javascript"></script>
<script src='dist/js/jsreview/jquery.rating.js' type="text/javascript" language="javascript"></script>
<link href='dist/js/jsreview/jquery.rating.css' type="text/css" rel="stylesheet"/>
	
</head>
<body>
<?php
	 session_start();
	 $con=mysqli_connect("localhost","root","","job");
	 extract($_REQUEST);
	 $increment="select * from tblvisit where VisitId=1";
	 $rsincrement=mysqli_query($con,$increment) or die(mysqli_error($con));
	 $resincrement=mysqli_fetch_array($rsincrement);
	 $plusone=$resincrement["TotalVisit"];
	 $doneone=$plusone+1;
	 //echo $doneone;
	 $updateincrement="update tblvisit set TotalVisit=$doneone where VisitId=1";
	 mysqli_query($con,$updateincrement) or die(mysqli_error($con));
	 //echo $updateincrement;
	 $tempforbtn=1;
	 $checkdate = date('Y-m-d');
	 $selupdatejob="select * from tblcompanypackage";
	 $rsupdatejob=mysqli_query($con,$selupdatejob) or die(mysqli_error($con));
	 while($resupdatejob=mysqli_fetch_array($rsupdatejob))
	 {
	 	if(($checkdate >= $resupdatejob["StartDate"]) && ($checkdate <= $resupdatejob["EndDate"]))
		{
			$tempforbtn=1;
		}
		else
		{
			$tempforbtn=0;
		}//echo $tempforbtn;
	 	$selupdatejobpost="select * from tbljobpost where EmployerId=".$resupdatejob["EmployerId"];
	 	//echo $selupdatejobpost;
	 	$rsupdatejobpost=mysqli_query($con,$selupdatejobpost) or die(mysqli_error($con));
	 	while($resupdatejobpost=mysqli_fetch_array($rsupdatejobpost))
	 	{
	 		$updatejobposttable="update tbljobpost set JobIsActive=$tempforbtn where EmployerId=".$resupdatejob["EmployerId"];
	 		//echo $updatejobposttable;
	 		mysqli_query($con,$updatejobposttable) or die(mysqli_error($con));
	 		//echo $updatejobposttable;
	 	}	
		  
	 }



	 $selcat="select * from tblcategory where IsActive=1";
   	 $rscat=mysqli_query($con,$selcat) or die(mysqli_error($con));

   	 $selcon="select * from tblcountry";
   	 $rscon=mysqli_query($con,$selcon) or die(mysqli_error($con));

	 $seljobpost="	select * from tbljobpost a 
   	 				left join tblcategory b on a.JobCategory=b.CategoryId
   	 				left join tbljobpostdetail c on a.JobPostId=c.JobPostId
   	 				left join tblskill d on c.SkillId=d.SkillId
   	 				left join tblstate e on c.StateId=e.StateId
   	 				left join tblcountry f on c.CountryId=f.CountryId
   	 				left join tblemployer g on a.EmployerId=g.EmployerId
   	 				left join tblorganization h on g.OrganizationId=h.OrganizationId
   	  				where a.JobIsActive=1 order by a.CreatedOn desc ";
   	 $rsjobpost=mysqli_query($con,$seljobpost) or die(mysqli_error($con));

   	 if(isset($findjob))
   	 {
   	 	if(isset($findcatjob))
   	 	{
   	 		if(isset($_SESSION["catid"]))
   	 		{
   	 			unset($_SESSION["catid"]);
   	 		}
   	 		if(isset($_SESSION["conid"]))
	   	 	{
	   	 		unset($_SESSION["conid"]);
	   	 	}
   	 		$_SESSION["catid"]=$findcatjob;
	   	 		if(isset($findconjob))
	   	 		{
	   	 			if(isset($_SESSION["conid"]))
	   	 			{
	   	 				unset($_SESSION["conid"]);
	   	 			}
	   	 			$_SESSION["conid"]=$findconjob;
	   	 			header('location:visselectedcat.php');		
	   	 		}
   	 		header('location:visselectedcat.php');
   	 	}
   	 	elseif(isset($findconjob))
   	 	{
   	 		if(isset($_SESSION["conid"]))
	   	 	{
	   	 		unset($_SESSION["conid"]);
	   	 	}
	   	 	if(isset($_SESSION["catid"]))
   	 		{
   	 			unset($_SESSION["catid"]);
   	 		}
   	 		$_SESSION["conid"]=$findconjob;
   	 		header('location:visselectedcat.php');
   	 	}   	 	
   	 	//echo $findconjob;
   	 	//header('location:index.php');
   	 }

?>
<div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div>

<div class="theme-layout" id="scrollup">
	
	<?php include_once "visheader.php"; ?>

	<section>
		<div class="block no-padding">
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-featured-sec style2">
							<ul class="main-slider-sec style2 text-arrows">
								<li class="slideHome"><img src="images/resource/mslider3.jpg" alt="" /></li>
								<li class="slideHome"><img src="images/resource/mslider2.jpg" alt="" /></li>
								<li class="slideHome"><img src="images/resource/mslider1.jpg" alt="" /></li>
							</ul>
							<div class="job-search-sec">
								<div class="job-search style2">
									<h3>The Easiest Way to Get Your New Job</h3>
									<span>Find Jobs, Employment & Career Opportunities</span>
									<div class="search-job2">	
										<form method="Post">
											<div class="row no-gape">
												<!-- <div class="col-lg-4 col-md-3 col-sm-4">
													<div class="job-field">
														<input type="text" placeholder="Keywords" />
													</div>
												</div> -->
												<div class="col-lg-5 col-md-4 col-sm-6">
													<div class="job-field">
														<select data-placeholder="All Regions" name="findcatjob" class="chosen-city">
															<option value="" selected="" disabled="">Select Category</option>
															<?php while($rescat=mysqli_fetch_array($rscat))
															{ ?>
																<option value="<?php echo $rescat["CategoryId"]; ?>" ><?php echo $rescat["CategoryName"]; ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-6">
													<div class="job-field">
														<select data-placeholder="Any category" name="findconjob" class="chosen-city">
															<option value="" selected="" disabled="">Select Country</option>
															<?php while($rescon=mysqli_fetch_array($rscon))
															{ ?>
																<option value="<?php echo $rescon["CountryId"]; ?>"><?php echo $rescon["CountryName"]; ?></option>
															<?php } ?>	
														</select>
													</div>
												</div>
												<div class="col-lg-3  col-md-4 col-sm-12">
													<button type="submit" name="findjob">FIND JOB <i class="la la-search"></i></button>
												</div>
											</div>
										</form>
									</div><!-- Job Search 2 -->
									<div class="quick-select-sec">
										<div class="row">
											
											
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

	<section>
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Recent Jobs</h2>
							<span>Leading Employers already using job and talent.</span>
						</div><!-- Heading -->
						<div class="job-grid-sec">
							<div class="row">
								

								
								
								
								<?php $jobcnt=0; while($resjobpost=mysqli_fetch_array($rsjobpost)){ if(is_null($resjobpost["Logo"]))
	 {
	 	$log="nologo.jpg";
	 } 
	 elseif($resjobpost["Logo"]=="null")
	 {
	 	$log="nologo.jpg";
	 }
	 else
	 {
	 	$log=$resjobpost["Logo"];
	 } if($jobcnt<3){ ?>
								<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
									<div class="job-grid">
										<div class="job-title-sec">
											<div class="c-logo"> <img src="employer/logo/<?php echo $log; ?>" alt="" style="border-radius: 20px;" /> </div>
											<h3><a href="visjobdetail.php?jobid=<?php echo $resjobpost["JobPostId"]; ?>" title=""><?php echo $resjobpost["CategoryName"]; ?></a></h3>
											<span><?php echo $resjobpost["SkillName"]; ?></span>
											<span class="fav-job"></span>
										</div>
										<span class="job-lctn"><?php echo $resjobpost["StateName"]; ?>, <?php echo $resjobpost["CountryName"]; ?></span>
										<a  href="visuserlogin.php">APPLY NOW</a>
									</div><!-- JOB Grid -->
								</div>
								<?php } $jobcnt++; } ?>



							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="browse-all-cat">
							<a href="viscategory.php" title="" class="style2">Load more listings</a>
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
						<div class="heading">
							<h2>How It Works</h2>
							
						</div><!-- Heading -->
						<div class="how-to-sec">
							<div class="how-to">
								<span class="how-icon"><i class="la la-user"></i></span>
								<h3>Register an account</h3>
								<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
							</div>
							<div class="how-to">
								<span class="how-icon"><i class="la la-file-archive-o"></i></span>
								<h3>Specify & search your job</h3>
								<p>Browse profiles, reviews, and proposals then interview top candidates. </p>
							</div>
							<div class="how-to">
								<span class="how-icon"><i class="la la-list"></i></span>
								<h3>Apply for job</h3>
								<p>Use the Upwork platform to chat, share files, and collaborate from your desktop or on the go.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- <section>
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Top Company Registered</h2>
							<span>Some of the companies we've helped recruit excellent applicants over the years.</span>
						</div>
						<div class="top-company-sec">
							<div class="row" id="companies-carousel">
								<div class="col-lg-3">
									<div class="top-compnay">
										<img src="images/resource/tc1.jpg" alt="" />
										<h3><a href="#" title="">Symtech</a></h3>
										<span>United States, Los Angeles</span>
										<a href="#" title="">4 Open Positon</a>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="top-compnay">
										<img src="images/resource/tc2.jpg" alt="" />
										<h3><a href="#" title="">Symtech</a></h3>
										<span>United States, Los Angeles</span>
										<a href="#" title="">4 Open Positon</a>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="top-compnay">
										<img src="images/resource/tc3.jpg" alt="" />
										<h3><a href="#" title="">Symtech</a></h3>
										<span>United States, Los Angeles</span>
										<a href="#" title="">4 Open Positon</a>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="top-compnay">
										<img src="images/resource/tc4.jpg" alt="" />
										<h3><a href="#" title="">Symtech</a></h3>
										<span>United States, Los Angeles</span>
										<a href="#" title="">4 Open Positon</a>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="top-compnay">
										<img src="images/resource/tc2.jpg" alt="" />
										<h3><a href="#" title="">Symtech</a></h3>
										<span>United States, Los Angeles</span>
										<a href="#" title="">4 Open Positon</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</section> -->

	<?php 
	$con=mysqli_connect("localhost","root","","job");
 	extract($_REQUEST);
  	$seljobpost="select * from tbljobpost";
  	$rsjobpost=mysqli_query($con,$seljobpost) or die(mysqli_error($con)); 
  	$resjobpost=mysqli_num_rows($rsjobpost);

  	$seltotorg="select * from tblorganization";
  	$rstotorg=mysqli_query($con,$seltotorg) or die(mysqli_error($con)); 
  	$restotorg=mysqli_num_rows($rstotorg);

  	$seltotinter="select * from tbljobinterview where IsSelected=1";
  	$rstotinter=mysqli_query($con,$seltotinter) or die(mysqli_error($con)); 
  	$restotinter=mysqli_num_rows($rstotinter);

  	$seltotusr="select * from tbluser";
  	$rstotusr=mysqli_query($con,$seltotusr) or die(mysqli_error($con)); 
  	$restotusr=mysqli_num_rows($rstotusr);

  	$seltotemp="select * from tblemployer";
  	$rstotemp=mysqli_query($con,$seltotemp) or die(mysqli_error($con)); 
  	$restotemp=mysqli_num_rows($rstotemp);

  	$tot=$restotusr+$restotemp;

  	$seltotvis="select * from tblvisit where VisitId=1";
  	$rstotvis=mysqli_query($con,$seltotvis) or die(mysqli_error($con)); 
  	$restotvis=mysqli_fetch_array($rstotvis);

  	?>

	<section>
		<div class="block">
			<div data-velocity="-.1" style="background: url(images/resource/parallax2.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color red"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading light">
							<h2>Jobs Aware Site Stats</h2>
							<span>Here we list our site stats and how many people we’ve helped find a job and companies have found <br />recruits. It's a pretty awesome stats area!</span>
						</div><!-- Heading -->
						<div class="stats-sec">
							<div class="row">
								<div class="col-lg-2.4 col-md-2 col-sm-6 col-xs-12">
									<div class="stats">
										<span><?php echo $resjobpost; ?></span>
										<h5>Jobs Posted</h5>
									</div>
								</div>
								<div class="col-lg-2.4 col-md-2 col-sm-6 col-xs-12">
									<div class="stats">
										<span><?php echo $restotinter; ?></span>
										<h5>Jobs Filled</h5>
									</div>
								</div>
								<div class="col-lg-2.4 col-md-2 col-sm-6 col-xs-12">
									<div class="stats">
										<span><?php echo $restotorg; ?></span>
										<h5>Organization</h5>
									</div>
								</div>
								<div class="col-lg-2.4 col-md-2 col-sm-6 col-xs-12">
									<div class="stats">
										<span><?php echo $tot; ?></span>
										<h5>Members</h5>
									</div>
								</div>
								<div class="col-lg-2.4 col-md-2 col-sm-6 col-xs-12">
									<div class="stats">
										<span><?php echo $restotvis["TotalVisit"]; ?></span>
										<h5>Total Visits</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block">
			<div data-velocity="-.1" style="background: url(images/resource/parallax2.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color light"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading light">
							<h2>Kind Words From Happy Candidates</h2>
							<span>What other people thought about the service provided by Jobs Aware</span>
							<span>Average Rating To Jobs Aware From Happy Candidates 
							<input name="star22" type="radio" class="star required" disabled="disabled" checked="checked"  align="middle"/></span>
						</div><!-- Heading -->
						<div class="reviews-sec" id="reviews-carousel">


							<?php
							$revsel="	select * from tblreview a
										left join tbluser b on a.UserId=b.UserId 
										where a.IsActive=1 and a.UserId IS NOT NULL";
							$rsrevsel=mysqli_query($con,$revsel) or die(mysqli_error($con));
							//$cntrv=mysqli_num_rows($rsrevsel);
							//echo $cntrv;
							while($resrevsel=mysqli_fetch_array($rsrevsel))
							{
								if(!is_null($resrevsel["UserPhoto"]))
								{
									$usrpic=$resrevsel["UserPhoto"];
								}
								else
								{
									$usrpic="download.jpg";
								}
							?>
							<div class="col-lg-6">
								<div class="reviews">
									<img src="user/userimg/<?php echo $usrpic; ?>" alt="" />
									<h3><?php echo $resrevsel["FirstName"];?></h3>
									<p><?php echo $resrevsel['Description'];?></p>
								</div><!-- Reviews -->
							</div>
							<?php 
							} 
							?>
							
							
						</div>
					</div>
				</div>

			</div>	
		</div>
	</section>

	<section>
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="subscription-sec">
							<div class="row">
								<div class="col-lg-6">
									<h3>Still Need Help ?</h3>
									<span>Let us now about your issue and a Professional will reach you out.</span>
								</div>
								<div class="col-lg-6">
									<?php
									if(isset($subnews))
									{
										$insnews="insert into tblnewsletter values(null,'$newsemail',1)";
										echo $insnews;
										mysqli_query($con,$insnews) or die(mysqli_error($con));
										header('location:index.php');	
									}
									

									?>
									<form method="Post">
										<input type="email" placeholder="Enter Valid Email Address" required="true" name="newsemail" />
										<button type="submit" name="subnews"><i class="la la-paper-plane"></i></button>
									</form>
								</div>
							</div>
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

<!-- Mirrored from grandetest.com/theme/jobhunt-html/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:08 GMT -->
</html>

