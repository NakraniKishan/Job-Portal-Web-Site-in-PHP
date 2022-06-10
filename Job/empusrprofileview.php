<?php
session_start();
if(isset($_SESSION["empid"]))
{
  $usrid=$_SESSION["empid"];
?>
<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/candidates_single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:43 GMT -->
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
	<style type="text/css">
	input[type='file']::-webkit-file-upload-button
    {
      padding: 8px 30px;
      color : #fff;
      background-color: #34495e;
      border : none;
      font-family: 'Montserrat', sans-serif;
      font-size: 14px;
      font-weight: 500;
      border-radius: 2px;
      margin: 10px 1px;
    }
	.btnmain{
	float: right;
    background: #ffffff;
    border: 2px solid #fb236a;
    color: #202020;
    font-family: Open Sans;
    font-size: 15px;
    padding: 11px 40px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    -ms-border-radius: 8px;
    -o-border-radius: 8px;
    border-radius: 8px;
    margin-top: 30px;
	}
	.btnmain:hover{
	float: right;
    background: #fb236a;
    border: 2px solid #fb236a;
    color: white;
    font-family: Open Sans;
    font-size: 15px;
    padding: 11px 40px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    -ms-border-radius: 8px;
    -o-border-radius: 8px;
    border-radius: 8px;
    margin-top: 30px;
	}
	</style>	

</head>

<?php
$con=mysqli_connect("localhost","root","","job");
extract($_REQUEST);
$selusrprofile="select * from tbluser where UserId=".$_REQUEST["usrprofile"];
$rsusrprofile=mysqli_query($con,$selusrprofile) or die(mysqli_error($con));
$resusrprofile=mysqli_fetch_array($rsusrprofile);
if(is_null($resusrprofile["UserPhoto"]))
{
	$usrimg="download.jpg";	
}
else
{
	$usrimg=$resusrprofile["UserPhoto"];	
}
if(!is_null($resusrprofile["ResumeFile"]))
{
	$resumetodis=$resusrprofile["ResumeFile"];
}



?>
<body>

<!-- <div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div> -->

<div class="theme-layout" id="scrollup">
	
	<?php include_once "empheader.php"; ?>

	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<div class="container">
								<div class="row">
									<div class="col-lg-6">
										<div class="skills-btn">
									<?php
$selskill="select * from tbluserskill a left join tblskill b on a.SkillId=b.SkillId where UserId=".$_REQUEST["usrprofile"];
$rsskill=mysqli_query($con,$selskill) or die(mysqli_error($con));
$cnt=0;
while($resskill=mysqli_fetch_array($rsskill))
{
	if($cnt<3)
	{
?>			
	<a href="#" title=""><?php echo $resskill["SkillName"]; ?></a>
<?php
	}
	$cnt++;
}
?>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="action-inner">
										<?php if(!is_null($resusrprofile["ResumeFile"])){ ?>
											<div class="action-inner style2">
											<div class="download-cv">
								 				<a target="_blank" href="user/resumefile/<?php echo $resumetodis; ?>">Download CV <i class="la la-download"></i></a>
								 			</div>
											
										</div>
							 			
							 			</div><?php } ?>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="overlape">
		<div class="block remove-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="cand-single-user">
				 			<div class="can-detail-s">
				 				<div class="cst"><img src="user/userimg/<?php echo $usrimg; ?>" style="height: 150px; width: 140px;" alt="" /></div>
				 				<h3><?php echo $resusrprofile["FirstName"]; ?> <?php echo $resusrprofile["MiddleName"]; ?> <?php echo $resusrprofile["LastName"]; ?> </h3>
				 				
				 				<p><?php echo $resusrprofile["EmailId"]; ?></p>
				 				<?php
				 					$selstate="select * from tblstate where StateId=".$resusrprofile["StateId"];
									$rsstate=mysqli_query($con,$selstate) or die(mysqli_error($con));
									$resstate=mysqli_fetch_array($rsstate);
				 				?>
				 				<?php
				 					$selcon="select * from tblcountry where CountryId=".$resusrprofile["CountryId"];
									$rscon=mysqli_query($con,$selcon) or die(mysqli_error($con));
									$rescon=mysqli_fetch_array($rscon);
				 				?>
				 				<p><i class="la la-map-marker"></i><?php if(!is_null($resusrprofile["StateId"]) ) { echo $resstate["StateName"]; }  ?>  <?php if(!is_null($resusrprofile["CountryId"]) ) { echo "/ "; echo $rescon["CountryName"]; }  ?></p>
				 			</div>
				 		</div>

				 		<ul class="cand-extralink">
				 			<li><a href="#education" title=""> Education </a></li>
				 			<li><a href="#experience" title=""> Work Experience </a></li>
				 			<li><a href="#skills" title=""> Professional Skills </a></li>
				 			<li><a href="#awards" title=""> Certificate </a></li>
				 		</ul>
				 		<div class="job-overview style2">
							<ul><li><i class="la la-mars-double"></i><h3>Resume</h3><span><?php if(is_null($resusrprofile["ResumeFile"])){ echo "Resume Not Uploaded"; }else { echo "Resume Uploaded - You May Download If Needed"; } ?></span></li>

								<li><i class="la la-mars-double"></i><h3>Gender</h3><span><?php echo $resusrprofile["Gender"];  ?></span></li>

								<li><i class="la la-thumb-tack"></i><h3>Phone No</h3><span><?php echo $resusrprofile["PhoneNo"];  ?></span></li>
 
								<li><i class="la la-puzzle-piece"></i><h3>Date Of Birth</h3><span><?php if(!is_null($resusrprofile["Dob"])) { echo $resusrprofile["Dob"]; } else { echo "Enter Your Date Of Birth"; } ?></span></li>

								<li><i class="la la-shield"></i><h3>Pincode</h3><span><?php if(!is_null($resusrprofile["Pincode"])) { echo $resusrprofile["Pincode"]; } else { echo "Enter Your Pincode"; } ?></span></li>
								<div class="extra-login">		
				 				</div>			
				 								 				
							</ul>

						</div>

						<?php
				 		$seluni="select * from tbluserqualification a left join tbluniversity b on a.UniversityId=b.UniversityId left join tblstream c on a.StreamId=c.StreamId where UserId=".$resusrprofile["UserId"];
						$rsuni=mysqli_query($con,$seluni) or die(mysqli_error($con));
										
				 		?>
				 		<div class="cand-details-sec">
				 			<div class="row">
				 				<div class="col-lg-12 column">
				 						
				 						<div class="edu-history-sec" id="education">
				 							<h2>Education</h2>
				 								<div class="row">
				 								<?php $educnt=0;
				 									while($resuni=mysqli_fetch_array($rsuni))
				 									{
				 										
				 								?>
				 								<div class="col-lg-6 column">		
				 								<div class="edu-history">
				 								<i class="la la-graduation-cap"></i>
				 								<div class="edu-hisinfo">			
				 									<h3>University</h3>
				 									<i><?php echo $resuni["Degree"]; ?></i>
				 									<span><?php echo $resuni["UniversityName"]; ?> <i><?php echo $resuni["StreamName"]; ?></i></span>
				 									<p><?php echo $resuni["Specialization"]; ?></p>	
				 									<p><?php echo $resuni["PassingYear"]; ?></p>	
				 									<div class="extra-login">
			
			
		</div>
				 								</div>
				 							</div>
				 						</div>
				 								<?php $educnt++;	
				 									}
				 									if($educnt==0)
				 									{
				 										echo "Mention your education details including  degree and Specialization.";
				 									}
				 								?>
				 							</div>
				 							
				 						</div>
				 						<div class="edu-history-sec" id="experience">
				 							<h2>Work & Experience</h2>
				 						<?php
				 							$selexp="select * from tbluserexperience where UserId=".$resusrprofile["UserId"];
											$rsexp=mysqli_query($con,$selexp) or die(mysqli_error($con));
											while($resexp=mysqli_fetch_array($rsexp))
				 							{
				 						?>					
				 							<div class="edu-history style2">
				 								<i></i>
				 								<div class="edu-hisinfo">
				 									<h3><?php echo $resexp["Designation"]; ?> <span><?php echo $resexp["OrganizationName"]; ?></span></h3>
				 									<i><?php echo $resexp["JobPeriod"]; ?></i>
				 									<p><?php echo $resexp["ReasonForLeaving"]; ?></p>
				 									<?php if(!is_null($resexp["Description"])){ ?><p><?php echo $resexp["Description"]; ?></p><?php }  ?>
				 									<div class="extra-login">
			

		</div>
				 								</div>
				 							</div>
				 						<?php } ?>
				 						
				 						</div>
				 						
				 						<div class="progress-sec" id="skills">
				 							<h2>Professional Skills</h2>
				 							<?php
				 							$selusrskill="select * from tbluserskill a left join tblskill b on a.SkillId=b.SkillId where UserId=".$resusrprofile["UserId"];
											$rsusrskill=mysqli_query($con,$selusrskill) or die(mysqli_error($con));
											while($resusrskill=mysqli_fetch_array($rsusrskill))
				 							{
				 						?>					
				 							<div class="edu-history style2">
				 								<i></i>
				 								<div class="edu-hisinfo">
				 									<h3><?php echo $resusrskill["SkillName"]; ?> <span><?php echo $resusrskill["Designation"]; ?></span></h3>
				 									<i><?php echo $resusrskill["Experience"]; ?></i>
				 									<div class="extra-login">
			
		</div>
				 								</div>
				 							</div>
				 							
				 						<?php } ?>
				 						</div>



<?php
	//$selcer="select * from tblusercertification where UserId=".$res["UserId"];
	$selectcerti="select * from tblusercertification where UserId=".$_REQUEST["usrprofile"];
	$rscer=mysqli_query($con,$selectcerti) or die(mysqli_error($con));									
?>
				 		<div class="cand-details-sec">
				 			<div class="row">
				 				<div class="col-lg-12 column">
				 						
				 						<div class="edu-history-sec" id="awards">
				 							<h2>Certificate</h2>
				 								<div class="row">
				 								<?php $cercnt=0;
				 									while($rescer=mysqli_fetch_array($rscer))
				 									{
				 										
				 								?>
				 								<div class="col-lg-6 column">		
				 								<div class="edu-history">
				 								<i class="la la-graduation-cap"></i>
				 								<div class="edu-hisinfo">			
				 									<h3><?php echo $rescer["CertificationName"]; ?></h3>
				 									<span><?php echo $rescer["Year"]; ?><i><?php echo $rescer["Result"]; ?></i></span>
				 									<p><?php echo $resuni["Specialization"]; ?></p>	
				 									<p><?php echo $resuni["PassingYear"]; ?></p>	
				 									<div class="extra-login">
			
			<div class="login-social">
			<?php if(!is_null($rescer["FileUrl"]))
				{ 
			?>
				<a class="tw-login" target="_blank" href="user/certificatefile/<?php echo $rescer["FileUrl"]; ?>" ><i class="la la-download"></i></a>
			<?php 
				} 
			?>
			</div>
		</div>
				 								</div>
				 							</div>
				 						</div>
				 								<?php $cercnt++;	
				 									}
				 									if($cercnt=0)
				 									{
				 										echo "Mention your Certification details including Certification Passing Year and Certificate File.";
				 									}
				 								?>
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


<?php include_once "loadjs.php"; ?>



<!-- Mirrored from grandetest.com/theme/jobhunt-html/candidates_single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:44 GMT -->


</html>
<?php
}
else
{
	//header('location:index.php');
}
?>
