<?php
session_start();
if(isset($_SESSION["usrid"]))
{
  $usrid=$_SESSION["usrid"];
?>
<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/candidates_applied_jobs.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:47 GMT -->
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
if(isset($jobappid))
  {
  	$_SESSION["jobappid"]=$jobappid;
  	header("Location:usrappliedjobviewmore.php");
  }
$selusr="select * from tbluser";
$rs=mysqli_query($con,$selusr) or die(mysqli_error($con));
$res=mysqli_fetch_array($rs);
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
							<h3><?php echo $res["FirstName"]; ?> <?php echo $res["MiddleName"]; ?> <?php echo $res["LastName"]; ?></h3>
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
				 	<aside class="col-lg-3 column border-right">
				 		<div class="widget">
				 			<div class="tree_widget-sec">
				 				<?php include_once "usrsidebardirectlink.php"; ?>
				 			</div>
				 		</div>
				 		
				 	</aside>
				 	<?php
				 	$seljobdel="select * from tbljobapply a 
				 				left join tbljobpost b on a.JobPostId=b.JobPostId 
				 				left join tblemployer c on b.EmployerId=c.EmployerId 
				 				left join tblorganization d on c.OrganizationId=d.OrganizationId 
				 				left join tbljobpostdetail e on a.JobPostDetailId=e.JobPostDetailId 
				 				left join tblskill f on e.SkillId=f.SkillId
				 				left join tblcountry g on e.CountryId=g.CountryId 
				 				left join tblstate h on e.StateId=h.StateId
				 				left join tblcategory i on b.JobCategory=i.CategoryId
				 				where UserId=".$usrid;

				 	$rsjobdel=mysqli_query($con,$seljobdel) or die(mysqli_error($con));
					$noofapplyjob=mysqli_num_rows($rsjobdel);
					//echo $res["CountryName"];
					$app=0;
				 	?>
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec">
					 			<h3>Shortlisted Jobs</h3>
						 		<table>
						 			<thead>
						 				<tr>
						 					<td>Applied Job</td>
						 					<td>Category</td>
						 					<td>Skill</td>
						 					<td>Min Salary ( Per Annum)</td>
						 					<td>Min / Max Experiecnce</td>
						 					<td></td>
						 				</tr>
						 			</thead>
						 			<tbody>
						 				<?php
						 				if($noofapplyjob==0)
						 				{
						 					$norecord="No Jobs Applied..";
						 					$norecord1="You have not applied to any jobs";
						 				}

						 				while($resjobdel=mysqli_fetch_array($rsjobdel))
						 				{
						 					if($resjobdel["IsShortListed"]==1)
						 					{
						 				?>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<i><?php echo $resjobdel["OrganizationName"]; ?></i><br />
						 							<span><i class="la la-map-marker"></i><?php echo $resjobdel["StateName"]; ?>, <?php echo $resjobdel["CountryName"]; ?></span><br>
						 							<span><?php echo $resjobdel["Description"]; ?></span>
						 						</div><br>
						 				
						 					</td>
						 					<td>
						 						<div class="table-list-title">
						 							<span><?php echo $resjobdel["CategoryName"]; ?></span>
						 						</div>
						 					</td>
						 					<td>
						 						<div class="table-list-title">
						 							<span><?php echo $resjobdel["SkillName"]; ?></span>
						 						</div>
						 					</td>
						 					<td>
						 						<span><?php if(!is_null($resjobdel["MinSalary"])){ echo $resjobdel["MinSalary"]; } else { echo "----------"; } ?></span><br>
						 					</td>
						 					<td>
						 						<span><?php if(!is_null($resjobdel["MinExperience"])){ echo $resjobdel["MinExperience"]; } else { echo "------"; } ?> / <?php if(!is_null($resjobdel["MaxExperience"])){ echo $resjobdel["MaxExperience"]; } else { echo "------"; } ?></span><br />
						 					</td>
						 					<td>
						 						
						 							<span><?php echo $resjobdel["WorkType"]; ?></span>
						 						
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>View More</span><a href="?jobappid=<?php echo $resjobdel["JobApplyId"]; ?>" title=""><i class="la la-eye"></i></a></li>
						 						</ul>
						 					</td>
						 					
						 				</tr>
						 				<?php } elseif ($resjobdel["IsShortListed"]==0){ $app++; $norecord="You Are Not ShortListed For Job";
						 								$norecord1="You Have Applied For ".$app." Jobs"; } } ?>
						 				<?php if(isset($norecord)) {  ?>
						 				<tr>
						 					<td colspan="6">
						 						<h6><span> <?php echo $norecord; ?> </span></h6>
						 						<span> <?php echo $norecord1; ?> </span>
						 					</td>
						 				</tr>
						 				<?php } ?>
						 			</tbody>
						 		</table>
					 		</div>
					 	</div>
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

<!-- Mirrored from grandetest.com/theme/jobhunt-html/candidates_applied_jobs.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:47 GMT -->
</html>
<?php
}
else
{
	header('location:index.php');
}
?>
