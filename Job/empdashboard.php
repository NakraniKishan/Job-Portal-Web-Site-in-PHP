<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:22:52 GMT -->
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

<div class="page-loading">
	<img src="images/loader.gif" alt="" />
</div>
<?php
$con=mysqli_connect("localhost","root","","job");
extract($_REQUEST);
$checkdate = date('Y-m-d');
$selcat="select * from tblcategory";
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
   	  				where a.JobIsActive=1 and h.IsActive=1 and h.IsBlock=0 order by a.CreatedOn desc ";
   	 $rsjobpost=mysqli_query($con,$seljobpost) or die(mysqli_error($con));


if(isset($_REQUEST["packid"]))
{
	$selpack="select * from tblpackage where PackageId=".$packid;
	$rspack=mysqli_query($con,$selpack) or die(mysqli_error($con));
	$respack=mysqli_fetch_array($rspack);
	$monthofpack=$respack["Duration"];
	$print="+".$monthofpack." months";
	echo $print;
	$insempid=$_SESSION["empid"];

	$effectiveDate = date('Y-m-d', strtotime("<?php echo $print; ?>", strtotime(date("Y-m-d"))));
	echo $effectiveDate;
	//$ins="insert into tblcompanypackage values(null,$eid,16,now(),now())";
	//echo $ins;

	//mysqli_query($con,$ins) or mysqli_error($con);

}

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
	   	 			header('location:empselectedcat.php');		
	   	 		}
   	 		header('location:empselectedcat.php');
   	 	}
   	 	if(isset($findconjob))
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
   	 		header('location:empselectedcat.php');
   	 	}   	 	
   	 	//echo $findconjob;
   	 	//header('location:usrdashboard.php');
   	 }

if(isset($pid))
{
	$_SESSION["pid"]=$pid;
	header('location:Paytm_Web_Sample_Kit_PHP-master/PaytmKit/TxnTest.php');
}
$selforbuybtn="select * from tblcompanypackage where EmployerId=".$_SESSION["empid"];
$rsforbuybtn=mysqli_query($con,$selforbuybtn) or die(mysqli_error($con));
$cntforbtn=mysqli_num_rows($rsforbuybtn);

if($cntforbtn>0)
{$tempforbtn=0;
while($resforbuybtn=mysqli_fetch_array($rsforbuybtn))
{
	if(($checkdate >= $resforbuybtn["StartDate"]) && ($checkdate <= $resforbuybtn["EndDate"]))
	{
		$tempforbtn=1;
	} 

}
}

?>
<div class="theme-layout" id="scrollup">
	
	<?php include_once "empheader.php"; ?>

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
												<!-- <div class="col-lg-5 col-md-4 col-sm-6">
													<div class="job-field">
														<select data-placeholder="All Regions" class="chosen-city">
															<option>Istanbul</option>
															<option>New York</option>
															<option>London</option>
															<option>Russia</option>
														</select>
													</div>
												</div> -->
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
													<button type="submit" name="findjob" >FIND JOB <i class="la la-search"></i></button>
												</div>
											</div>
										</form>
									</div><!-- Job Search 2 -->
									<div class="quick-select-sec">
										<div class="row">
											<!-- <div class="col-lg-3 col-md-3 col-sm-3">
												<div class="quick-select">
													<a href="#" title="">
														<i class="la la-bullhorn"></i>
														<span>Design, Art & Multimedia</span>
														<p>(22 open positions)</p>
													</a>
												</div>
											</div> -->
											<!-- <div class="col-lg-3 col-md-3 col-sm-3">
												<div class="quick-select">
													<a href="#" title="">
														<i class="la la-graduation-cap"></i>
														<span>Education Training</span>
														<p>(06 open positions)</p>
													</a>
												</div>
											</div> -->
											<!-- <div class="col-lg-3 col-md-3 col-sm-3">
												<div class="quick-select">
													<a href="#" title="">
														<i class="la la-line-chart "></i>
														<span>Accounting / Finance</span>
														<p>(03 open positions)</p>
													</a>
												</div>
											</div> -->
											<!-- <div class="col-lg-3 col-md-3 col-sm-3">
												<div class="quick-select">
													<a href="#" title="">
														<i class="la la-users"></i>
														<span>Human Resource</span>
														<p>(03 open positions)</p>
													</a>
												</div>
											</div> -->
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
							<?php 
							$jobcnt=0; 
							while($resjobpost=mysqli_fetch_array($rsjobpost))
								{ 
									if(is_null($resjobpost["Logo"]))
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
							 		} 
							 		
							 	if($jobcnt<3)
							 	{ 
							 		
								?>
								<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
									<div class="job-grid">
										<div class="job-title-sec">
											<div class="c-logo"> <img src="employer/logo/<?php echo $log; ?>" alt="" style="border-radius: 20px;" /> </div>
											<h3><a href="empjobdetail.php?jobid=<?php echo $resjobpost["JobPostId"]; ?>" title=""><?php echo $resjobpost["CategoryName"]; ?></a></h3>
											<span><?php echo $resjobpost["SkillName"]; ?></span>
											<span class="fav-job"></span>
										</div>
										<span class="job-lctn"><?php echo $resjobpost["StateName"]; ?>, <?php echo $resjobpost["CountryName"]; ?></span>
									</div><!-- JOB Grid -->
								</div>
								<?php  } $jobcnt++; } ?>
								
								
								
								
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="browse-all-cat">
							<a href="empcategory.php" class="style2">Load more listings</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<form method="post">
	<section>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Buy Our Plans And Packeges</h2>
							<span>One of our jobs has some kind of flexibility option - such as telecommuting, a part-time schedule or a flexible or flextime schedule.</span>
						</div><!-- Heading -->
					
							
						<div class="plans-sec">
							<div class="row">
								<?php 
									$countpackage=0;
									$cntpackage=0;
									$selpackage="select * from tblpackage where IsActive=1";
								   	$rspackage=mysqli_query($con,$selpackage) or die(mysqli_error($con));
								   	$countpackage=mysqli_num_rows($rspackage);
								   	while($respackage=mysqli_fetch_array($rspackage))
								   	{
								   		if(!is_null($respackage["ImageUrl"]))
								   		{
								   			$packimg=$respackage["ImageUrl"];
								   		}
								   		else
								   		{
								   			$packimg="coming.png";
								   		}
								   		if($cntpackage<3)
								   		{
							   	?>
								<div class="col-lg-4">
									<div class="pricetable" style="background-color:#9999ff">
										<div class="pricetable-head">
										<img src="packageimage/<?php echo $packimg; ?>" style="width: 200px; height: 200px; border-radius: 20px;" >				
										</div><!-- Price Table -->
										
										<table style="width:100%;height:150px;text-align: left;">
										<tr>
											<td>Name</td><td>:</td><td>&nbsp;<?php echo $respackage["PackageName"]; ?></td>
											</tr>
											<tr>
											<td>Duration</td><td>:</td><td> &nbsp;<?php echo $respackage["Duration"]; ?> Months</td></tr>
											<tr>
											<td>Price</td><td>:</td><td> &nbsp;<?php echo $respackage["Price"]; ?> <i class="fa fa-fw fa-inr"></i></td></tr>
											<tr>
											<td>Description</td><td>:</td><td> <?php echo $respackage["Description"]; ?></td></tr>				
										</table>		
										<?php if($tempforbtn==0) { ?>
										<a href="?pid=<?php echo $respackage["PackageId"]; ?>" ><input type="button" name="buypack" value="BUY NOW" style="height:50px;width:160px;border-radius: 10px;background-color:#e6005c;color:white;border:none;"> </a> 
									<?php } ?>
									</div>
								</div>
							<?php 
										}
										$cntpackage++;
									}
							 ?>
							
								
								
							</div>
						</div>
						<?php
							if($countpackage>3)
							{
						?>
						<div class="col-lg-12">
							<div class="browse-all-cat">
								<a href="empbuypackage.php" class="style2">Load more listings</a>
							</div>
						</div>
						<?php
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
</form>

	

	<section>
		<div class="block">
			<div data-velocity="-.1" style="background: url(images/resource/parallax2.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color light"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading light">
							<h2>Kind Words From Happy Candidates</h2>
							<span>What other people thought about the service provided by Jobs Aware</span>
						</div><!-- Heading -->
						<div class="reviews-sec" id="reviews-carousel">
							<?php
							$revsel="	select * from tblreview a
										left join tblemployer b on a.EmployerId=b.EmployerId 
										where a.IsActive=1 and a.EmployerId IS NOT NULL";
							$rsrevsel=mysqli_query($con,$revsel) or die(mysqli_error($con));
							//$cntrv=mysqli_num_rows($rsrevsel);
							//echo $cntrv;
							while($resrevsel=mysqli_fetch_array($rsrevsel))
							{
								if(!is_null($resrevsel["ImageUrl"]))
								{
									$usrpic=$resrevsel["ImageUrl"];
								}
								else
								{
									$usrpic="download.jpg";
								}
							?>
							<div class="col-lg-6">
								<div class="reviews">
									<img src="employer/employerimg/<?php echo $usrpic; ?>" alt="" />
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


  	?>
	<section>
		<div class="block">
			<div data-velocity="-.1" style="background: url(images/resource/parallax2.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color red"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading light">
							<h2>JobsAware Site Stats</h2>
							<span>Here we list our site stats and how many people we’ve helped find a job and companies have found <br />recruits. It's a pretty awesome stats area!</span>
						</div><!-- Heading -->
						<div class="stats-sec">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="stats">
										<span><?php echo $resjobpost; ?></span>
										<h5>Jobs Posted</h5>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="stats">
										<span><?php echo $restotinter; ?></span>
										<h5>Jobs Filled</h5>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="stats">
										<span><?php echo $restotorg; ?></span>
										<h5>Organization</h5>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="stats">
										<span><?php echo $tot; ?></span>
										<h5>Members</h5>
									</div>
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

<?php include_once "loadjs.php"; ?>

</body>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:23:54 GMT -->
</html>

