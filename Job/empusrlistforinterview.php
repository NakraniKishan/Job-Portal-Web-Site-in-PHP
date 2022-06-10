<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/candidates_list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:32 GMT -->
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
$seljobapplicant="select * from tbljobapply where IsShortListed=1 and JobPostId=".$_REQUEST["eid"];
$rsseljobapplicant=mysqli_query($con,$seljobapplicant) or die(mysqli_error($con));
$cntapplicant=mysqli_num_rows($rsseljobapplicant);
if(isset($_REQUEST["shortlist"]))
{
	$updateshortlist="update tbljobapply set IsShortListed=1 where JobApplyId=".$_REQUEST["shortlist"];
	mysqli_query($con,$updateshortlist) or die(mysqli_error($con));
	header('location:empjobapplicants.php');
}
?>
<div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div>

<div class="theme-layout" id="scrollup">
	
	<?php include_once "empheader.php"; ?>

	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3>ShortListed Applicant List</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	
				 	<div class="col-lg-8 column">
				 		<div class="padding-left">
					 		<div class="emply-resume-sec">
					 			<?php
					 			if($cntapplicant>0)
					 			{
					 			while($resseljobapplicant=mysqli_fetch_array($rsseljobapplicant))
					 			{  
					 				$seljobapplyusr="	select * from tbluser a
					 									left join tblcountry b on a.CountryId=b.CountryId
					 									left join tblstate c on a.StateId=c.StateId 
					 									where UserId=".$resseljobapplicant["UserId"];
					 				$rsseljobapplyusr=mysqli_query($con,$seljobapplyusr) or die(mysqli_error($con));
					 				$resseljobapplyusr=mysqli_fetch_array($rsseljobapplyusr);
					 				if(is_null($resseljobapplyusr["UserPhoto"]))
					 				{
					 					$tempuserimg="download.jpg";
					 				}
					 				else
					 				{
					 					$tempuserimg=$resseljobapplyusr["UserPhoto"];
					 				}
					 			?>
					 			<div class="emply-resume-list">
					 				<div class="emply-resume-thumb">
					 					<img src="user/userimg/<?php echo $tempuserimg; ?>" alt="" />
					 				</div>
					 				<div class="emply-resume-info">
					 					<h3><a href="empusrprofileview.php?usrprofile=<?php echo $resseljobapplyusr["UserId"]; ?>" title=""><?php echo $resseljobapplyusr["FirstName"]; ?> <?php echo $resseljobapplyusr["MiddleName"]; ?> <?php echo $resseljobapplyusr["LastName"]; ?></a></h3>
					 					<p><i class="la la-map-marker"></i><?php echo $resseljobapplyusr["StateName"]; ?> / <?php echo $resseljobapplyusr["CountryName"]; ?></p>
					 				</div>
					 				<div class="shortlists">
					 					<a href="empsendmailforinterview.php?jobappid=<?php echo $resseljobapplicant["JobApplyId"]; ?>"  style="width: 200px;" >Call For Interview <i class="la la-plus"></i></a>
					 				</div>
					 			</div><!-- Emply List -->
					 			<?php
					 			}
					 			}
					 			else
					 			{
					 			?>
					 				<div class="emply-resume-list">
					 					No One Has Applied In This Job
					 				</div>
					 			<?php	
					 			}
					 			?>
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

<!-- Mirrored from grandetest.com/theme/jobhunt-html/candidates_list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:34 GMT -->
</html>

