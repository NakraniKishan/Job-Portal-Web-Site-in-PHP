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
$selcompanydetail="	select * from tblorganization a
					left join tblstate b on a.StateId=b.StateId
					left join tblcountry c on a.CountryId=c.CountryId 
					where OrganizationId=".$_REQUEST["cmp"];
$rscompanydetail=mysqli_query($con,$selcompanydetail) or die(mysqli_error($con));
$rescompanydetail=mysqli_fetch_array($rscompanydetail);
if(is_null($rescompanydetail["Logo"]))
	 {
	 	$log="nologo.jpg";
	 } 
	 elseif($rescompanydetail["Logo"]=="null")
	 {
	 	$log="nologo.jpg";
	 }
	 else
	 {
	 	$log=$rescompanydetail["Logo"];
	 }
$selcompjob="	select * from tblemployer a 
				left join tbljobpost b on a.EmployerId=b.EmployerId
				left join tbljobpostdetail c on b.JobPostId=c.JobPostId
				left join tblskill d on c.SkillId=d.SkillId
				left join tblstate e on c.StateId=e.StateId
				left join tblcountry f on c.CountryId=f.CountryId 
				left join tblcategory g on b.JobCategory=g.CategoryId
				where b.JobIsActive=1 and a.OrganizationId=".$rescompanydetail["OrganizationId"];
$rscompjob=mysqli_query($con,$selcompjob) or die(mysqli_error($con));

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
							<h3><?php echo $rescompanydetail["OrganizationName"]; ?></h3>
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
				 			<div class="job-details">
				 				<h3>Organization Description</h3>
				 				<p><?php echo $rescompanydetail["Description"]; ?></p>
				 			</div>
				 		</div>
				 		<div class="recent-jobs">
							 				<h3>Recent Jobs</h3>
							 				<div class="job-list-modern">
											 	<div class="job-listings-sec no-border">
											 		<?php
											 		while($rescompjob=mysqli_fetch_array($rscompjob))
											 		{ 
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
															<span class="job-is ft"><a href="?cmp=<?php echo $_REQUEST["cmp"]; ?>&app=<?php echo $rescompjob["JobPostDetailId"]; ?>"> Apply</a></span>
										<i><?php echo $rescompjob["WorkType"]; ?></i>
														</div>
													</div>
													<?php } ?>
													
												</div>
											 </div>
							 			</div>
				 	</div>
				 	<div class="col-lg-4 column">
				 		<div class="job-single-head style2">
			 				<div class="job-thumb"> <img src="employer/logo/<?php echo $log; ?>" alt="" height="150px;" /> </div>
			 				<div class="job-head-info">
			 					<h4><?php echo $rescompanydetail["ContactPerson"]; ?></h4>
			 					<span>Establishment Year : <?php echo $rescompanydetail["EstablishmentYear"]; ?></span>
			 					<?php 
			 					if(is_null($rescompanydetail["WebsiteUrl"]))
			 					{ 

			 					}
			 					elseif($rescompanydetail["WebsiteUrl"]=="null")
			 					{

			 					}
			 					else
			 					{?>
			 						<p><i class="la la-unlink"> <?php echo $rescompanydetail["WebsiteUrl"]; ?> </i></p>
			 					<?php }	 ?>
			 					<?php if(!is_null($rescompanydetail["StateId"])) { ?>
			 					<P><i class="la la-map-marker"></i><?php echo $rescompanydetail["StateName"]; ?>, <?php echo $rescompanydetail["CountryName"]; ?></p>
			 						<?php }	 ?>
			 					<p><i class="la la-phone"></i> <?php echo $rescompanydetail["PhoneNo"]; ?></p>
			 					<p><i class="la la-envelope-o"></i> <?php echo $rescompanydetail["EmailId"]; ?></p>
			 				</div>
			 				
			 				
			 			</div><!-- Job Head -->
				 	</div>
				</div>
			</div>
		</div>
	</section>

	<?php include_once "usrfooter.php"; ?>

</div>


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
