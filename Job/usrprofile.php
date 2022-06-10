<?php
session_start();
if(isset($_SESSION["usrid"]))
{
  $usrid=$_SESSION["usrid"];
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
	<script type="text/javascript">
		function validnamelen(ControlID,LabelID,Message)
{
  //var Patteren = /^[0-9A-Za-z]{8,}$/;
  var Pwd = document.getElementById(ControlID).value;
  var len = Pwd.length;
  if(document.getElementById(ControlID).value == "")
   {
      document.getElementById(LabelID).style.display = "inline";
      document.getElementById(LabelID).innerHTML = "* Please Enter " + Message;
      document.getElementById(ControlID).focus();
      return false;
   }
  else if(Pwd.length >= 100) 
  {
     document.getElementById(LabelID).innerHTML = "* Please enter below 100 character only";
     document.getElementById(ControlID).focus();
    return false;
  }
   else
   {
      document.getElementById(LabelID).innerHTML = "";
   }
}
function frmValidateaddedu()
    {
      var Msg="";
      if(document.getElementById("txtdegree").value=="")
      {
        Msg +="Enter Degree";
      }

	  if(document.getElementById("txtspecialization").value=="")
      {
        Msg +="\nEnter Specialization";
      }
      if(document.getElementById("txtpassing").value=="")
      {
        Msg +="\nEnter Passing Year";
      }
      if(document.getElementById("adduniversity").value=="")
      {
        Msg +="\nSelect University";
      }
      if(document.getElementById("addstream").value=="")
      {
        Msg +="\nSelect Stream";
      }

      if(Msg=="")
      {

        return true;
      }
      else
      {
        alert(Msg);
        return false;
      }

    }
function frmValidateaddwork()
    {
      var Msg="";
      if(document.getElementById("txtorgname").value=="")
      {
        Msg +="Enter Organization Name";
      }
      if(document.getElementById("txtjobperiod").value=="")
      {
        Msg +="\nEnter Job Period";
      }
      if(document.getElementById("txtreason").value=="")
      {
        Msg +="\nEnter The Reason For Leaving";
      }
      if(document.getElementById("txtworkdesig").value=="")
      {
        Msg +="\nEnter Past Working Designation";
      }

      if(Msg=="")
      {

        return true;
      }
      else
      {
        alert(Msg);
        return false;
      }

    }

    function frmValidateaddskill()
    {
      var Msg="";
      if(document.getElementById("addskillid").value=="")
      {
        Msg +="\nSelect Skill";
      }
      if(document.getElementById("txtskillexp").value=="")
      {
        Msg +="\nEnter Skill Experience";
      }
      if(document.getElementById("txtskilldesig").value=="")
      {
        Msg +="\nEnter Designation";
      }

      if(Msg=="")
      {

        return true;
      }
      else
      {
        alert(Msg);
        return false;
      }

    }


	function frmValidateaddcerti()
    {
      var Msg="";
      if(document.getElementById("txtcertiname").value=="")
      {
        Msg +="Enter Certification Name";
      }
      if(document.getElementById("txtcertiyear").value=="")
      {
        Msg +="\nEnter Certification Year";
      }
      if(document.getElementById("txtcertiresult").value=="")
      {
        Msg +="\nEnter Certification Result";
      }

      if(Msg=="")
      {

        return true;
      }
      else
      {
        alert(Msg);
        return false;
      }

    }





	</script>
</head>

<?php
$con=mysqli_connect("localhost","root","","job");
extract($_REQUEST);
$selusr="select * from tbluser where UserId=".$usrid;
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
if(!is_null($res["ResumeFile"]))
{
	$resumetodis=$res["ResumeFile"];
}


  
if(isset($btnaddedu))
{
	$insedu="insert into tbluserqualification values(null,$usrid,'$txtdegree',$adduniversity,$addstream,'$txtspecialization','$txtpassing')";
	//echo $insedu;
	mysqli_query($con,$insedu) or die(mysqli_error($con));
	header('location:usrprofile.php');
}
if(isset($did))
{
	//echo "delete";
	$del="delete from tbluserqualification where UserQualificationId=$did";
	//echo $del;
	mysqli_query($con,$del) or die(mysqli_error($con));
	header('location:usrprofile.php');
}




if(isset($addwork))
{
	$insedu="insert into tbluserexperience values(null,$usrid,'$txtorgname','$txtjobperiod','$txtreason','$txtworkdesig','$txtworkdescrip')";
	//echo $insedu;
	mysqli_query($con,$insedu) or die(mysqli_error($con));
	header('location:usrprofile.php');
}
if(isset($didwork))
{
	$del="delete from tbluserexperience where UserExperienceId=$didwork";
	//echo $del;
	mysqli_query($con,$del) or die(mysqli_error($con));
	header('location:usrprofile.php');	
}


if(isset($btnaddskill))
{
	$insedu="insert into tbluserskill values(null,$usrid,$addskillid,'$txtskillexp','$txtskilldesig')";
	//echo $insedu;
	mysqli_query($con,$insedu) or die(mysqli_error($con));
	header('location:usrprofile.php');	
}
if(isset($didskill))
{
	$del="delete from tbluserskill where UserSkillId=$didskill";
	//echo $del;
	mysqli_query($con,$del) or die(mysqli_error($con));
	header('location:usrprofile.php');	
}


if(isset($btnaddcer))
{
	if(!empty($_FILES["txtcertifile"]["name"]))
        {
        	$fnam=$_FILES["txtcertifile"]["name"];
          	$fext=explode('.', $fnam);
          	$factualext=strtolower(end($fext));
         	$allowed=array('doc','docx','pdf');
          	if(in_array($factualext, $allowed)) 
          	{
          		$imgnam= Date("d-m-YH-i-s").$_FILES["txtcertifile"]["name"];
          		//echo $imgnam;
          		move_uploaded_file($_FILES["txtcertifile"]["tmp_name"],"user/certificatefile/$imgnam");  
          		$insedu="insert into tblusercertification values(null,$usrid,'$txtcertiname','$imgnam',$txtcertiyear,'$txtcertiresult')";
				echo $insedu;
				mysqli_query($con,$insedu) or die(mysqli_error($con));
				//header('location:usrprofile.php');
			}
			else
			{
				$insedu="insert into tblusercertification values(null,$usrid,'$txtcertiname',null,$txtcertiyear,'$txtcertiresult')";
			echo $insedu;
			mysqli_query($con,$insedu) or die(mysqli_error($con));
			}
        }
        else
        {
          	$insedu="insert into tblusercertification values(null,$usrid,'$txtcertiname',null,$txtcertiyear,'$txtcertiresult')";
			echo $insedu;
			mysqli_query($con,$insedu) or die(mysqli_error($con));
			//header('location:usrprofile.php');
        }

		
}
if(isset($didcerti))
{
	$selcer="select * from tblusercertification where UserCertificationId=".$didcerti;
	$rscer=mysqli_query($con,$selcer) or die(mysqli_error($con));
	$rescer=mysqli_fetch_array($rscer);
    	$imgname=$rescer["FileUrl"];
    	echo $imgname;
	if(!is_null($rescer["FileUrl"]))
	{
		
    	
		if(file_exists("user/certificatefile/$imgname"))
            {
              unlink("user/certificatefile/$imgname");
            }
		$del="delete from tblusercertification where UserCertificationId=$didcerti";
		//echo $del;
		mysqli_query($con,$del) or die(mysqli_error($con));
		header('location:usrprofile.php');            
	}

	$del="delete from tblusercertification where UserCertificationId=$didcerti";
	//echo $del;
	mysqli_query($con,$del) or die(mysqli_error($con));
	header('location:usrprofile.php');
}

if(isset($btnupdateprofile))
{
	echo "Update Profile Button Press";
}

if(isset($btnUpdateStream))
{
	echo "Hii";
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
							<div class="container">
								<div class="row">
									<div class="col-lg-6">
										<div class="skills-btn">
									<?php
$selskill="select * from tbluserskill a left join tblskill b on a.SkillId=b.SkillId where UserId=".$res["UserId"];
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
										<?php if(!is_null($res["ResumeFile"])){ ?>
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
				 				<h3><?php echo $res["FirstName"]; ?> <?php echo $res["MiddleName"]; ?> <?php echo $res["LastName"]; ?> </h3>
				 				
				 				<p><?php echo $res["EmailId"]; ?></p>
				 				<?php
				 					$selstate="select * from tblstate where StateId=".$res["StateId"];
									$rsstate=mysqli_query($con,$selstate) or die(mysqli_error($con));
									$resstate=mysqli_fetch_array($rsstate);
				 				?>
				 				<?php
				 					$selcon="select * from tblcountry where CountryId=".$res["CountryId"];
									$rscon=mysqli_query($con,$selcon) or die(mysqli_error($con));
									$rescon=mysqli_fetch_array($rscon);
				 				?>
				 				<p><i class="la la-map-marker"></i><?php if(!is_null($res["StateId"]) ) { echo $resstate["StateName"]; }  ?>  <?php if(!is_null($res["CountryId"]) ) { echo "/ "; echo $rescon["CountryName"]; }  ?></p>
				 			</div>
				 		</div>

				 		<ul class="cand-extralink">
				 			<li><a href="#education" title=""> Education </a></li>
				 			<li><a href="#experience" title=""> Work Experience </a></li>
				 			<li><a href="#skills" title=""> Professional Skills </a></li>
				 			<li><a href="#awards" title=""> Certificate </a></li>
				 		</ul>
				 		<div class="job-overview style2">
							<ul><li><i class="la la-mars-double"></i><h3>Resume</h3><span><?php if(is_null($res["ResumeFile"])){ echo "Resume Not Uploaded"; }else { echo "Resume Uploaded - You May Download If Needed"; } ?></span></li>

								<li><i class="la la-mars-double"></i><h3>Gender</h3><span><?php echo $res["Gender"];  ?></span></li>

								<li><i class="la la-thumb-tack"></i><h3>Phone No</h3><span><?php echo $res["PhoneNo"];  ?></span></li>
 
								<li><i class="la la-puzzle-piece"></i><h3>Date Of Birth</h3><span><?php if(!is_null($res["Dob"])) { echo $res["Dob"]; } else { echo "Enter Your Date Of Birth"; } ?></span></li>

								<li><i class="la la-shield"></i><h3>Pincode</h3><span><?php if(!is_null($res["Pincode"])) { echo $res["Pincode"]; } else { echo "Enter Your Pincode"; } ?></span></li>
								<div class="extra-login">
				 						
				 				<div class="login-social">
									<a class="tw-login" href="usreditprofile.php?userupid=<?php echo $res["UserId"]; ?>" title=""><i class="la la-pencil"></i></a>
								</div>		
				 				</div>			
				 								 				
							</ul>

						</div>

						<?php
				 		$seluni="select * from tbluserqualification a left join tbluniversity b on a.UniversityId=b.UniversityId left join tblstream c on a.StreamId=c.StreamId where UserId=".$res["UserId"];
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
			
			<div class="login-social">
				<a class="fb-login" href="?did=<?php echo $resuni["UserQualificationId"]; ?>" title=""><i class="la la-trash-o"></i></a>


				<a class="tw-login" href="usreditprofile.php?usrupedu=<?php echo $resuni["UserQualificationId"]; ?>"  id="<?php echo $resuni["UserQualificationId"]; ?>"  ><i class="la la-pencil"></i></a>
			</div>
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
				 							<div>
				 							<button class="btnmain" type="submit" name="btnupdate" data-toggle="modal" data-target="#addedu">Add Education</button>
				 							</div>
				 						</div>
				 						<div class="edu-history-sec" id="experience">
				 							<h2>Work & Experience</h2>
				 						<?php
				 							$selexp="select * from tbluserexperience where UserId=".$res["UserId"];
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
			
			<div class="login-social">
				<a class="fb-login" href="?didwork=<?php echo $resexp["UserExperienceId"]; ?>" title=""><i class="la la-trash-o"></i></a>
				<a class="tw-login" href="usreditprofile.php?usrupwork=<?php echo $resexp["UserExperienceId"]; ?>"><i class="la la-pencil"></i></a>
			</div>
		</div>
				 								</div>
				 							</div>
				 						<?php } ?>
				 						<div>
				 							<button class="btnmain" type="submit" name="btnupdate" data-toggle="modal" data-target="#addwork">Add Work & Experience</button>
				 							</div>
				 						</div>
				 						
				 						<div class="progress-sec" id="skills">
				 							<h2>Professional Skills</h2>
				 							<?php
				 							$selusrskill="select * from tbluserskill a left join tblskill b on a.SkillId=b.SkillId where UserId=".$res["UserId"];
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
			
			<div class="login-social">
				<a class="fb-login" href="?didskill=<?php echo $resusrskill["UserSkillId"]; ?>" title=""><i class="la la-trash-o"></i></a>
				<a class="tw-login" href="usreditprofile.php?usrupskill=<?php echo $resusrskill["UserSkillId"]; ?>"><i class="la la-pencil"></i></a>
			</div>
		</div>
				 								</div>
				 							</div>
				 							
				 						<?php } ?>
				 						<div>

				 							<button  class="btnmain" type="submit" name="btnskill" data-toggle="modal" data-target="#addskill">Add Your Skill</button>
				 							</div>
				 						</div>



<?php
	$selcer="select * from tblusercertification where UserId=".$res["UserId"];
	$rscer=mysqli_query($con,$selcer) or die(mysqli_error($con));									
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
				<a class="fb-login" href="?didcerti=<?php echo $rescer["UserCertificationId"]; ?>" title=""><i class="la la-trash-o"></i></a>
									<a class="tw-login" href="usreditprofile.php?usrupcerti=<?php echo $rescer["UserCertificationId"]; ?>" title="" ><i class="la la-pencil"></i></a>
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
				 									if($cercnt==0)
				 									{
				 										echo "Mention your Certification details including Certification Passing Year and Certificate File.";
				 									}
				 								?>
				 							</div>
				 							<div>
				 							<button class="signup-popup btnmain" type="submit" name="btncerti" data-toggle="modal" data-target="#addcerti" >Add Certificate</button>
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


<div class="coverletter-popup">
	<div class="cover-letter">
		<i class="la la-close close-letter"></i>
		<h3>Ali TUFAN - UX / UI Designer</h3>
		<p>My name is Ali TUFAN I am thrilled to be applying for the [position] role in your company. After reviewing your job description, it’s clear that you’re looking for an enthusiastic applicant that can be relied upon to fully engage with the role and develop professionally in a self-motivated manner. Given these requirements, I believe I am the perfect candidate for the job.</p>
	</div>
</div>

<form method="post" enctype="multipart/form-data" class="form-horizontal form-element col-12">
<div class="modal fade" id="addedu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myModalLabel">Add Education</h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	
  <div class="form-group" style="margin-right: 5px;">
    <div class="col-sm-12">
      <input class="form-control" type="text" name="txtdegree" id="txtdegree" onblur="return validnamelen('txtdegree','lbldegree','Degree');"  placeholder="Degree" required="true">
    </div>
    
  </div><isindex id="lbldegree" ></isindex>
  <div class="dropdown-field" style="margin-right: 5px;">
  <?php
				$seluniver="select * from tbluniversity";
				$rsuniver=mysqli_query($con,$seluniver) or die(mysqli_error($con));

				?>
				<select required="true"  placeholder="Please Select University" name="adduniversity" id="adduniversity"  class="chosen">
					<option value="" selected="" disabled="">Select University</option>
					<?php 
					while($resuniver=mysqli_fetch_array($rsuniver))
					{
					?>	
					<option value="<?php echo $resuniver["UniversityId"]; ?>"><?php echo $resuniver["UniversityName"]; ?></option>
					<?php
					}
					?>
				</select>
	</div>
	<div class="dropdown-field" style="margin-right: 5px;">
		<?php
				$selstream="select * from tblstream";
				$rsstream=mysqli_query($con,$selstream) or die(mysqli_error($con));

				?>
				<select required="true" placeholder="Please Select Stream" name="addstream" id="addstream" class="chosen">
					<option value="" selected="" disabled="">Select Stream</option>
					<?php 
					while($resstream=mysqli_fetch_array($rsstream))
					{
					?>	
					<option value="<?php echo $resstream["StreamId"]; ?>"><?php echo $resstream["StreamName"]; ?></option>
					<?php
					}
					?>
				</select>

	</div>
  <div class="form-group" style="margin-right: 5px;">
    <div class="col-sm-12">
      <input class="form-control" type="text" name="txtspecialization" id="txtspecialization" onblur="return validnamelen('txtspecialization','lblspec','Specialization');" placeholder="Specialization" required="true">
    </div>
  </div><isindex id="lblspec" ></isindex>
  <div class="form-group" style="margin-right: 5px;">
    <div class="col-sm-12">
      <input class="form-control" type="text" name="txtpassing" id="txtpassing" maxlength="4" onkeypress="return NumbersOnly(event);" onblur="return ValidateControl('txtpassing','lblpassing','Passing Year');" minlength="4" placeholder="Passing Year" required="true">
    </div>
  </div><isindex id="lblpassing" ></isindex>	
</div>
<div class="modal-footer" style="margin-top: -10px;">
<button class="btn btn-success" name="btnaddedu" style="margin-left: 230px;" onclick="return frmValidateaddedu();">Add</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>
</form>

<form method="post" enctype="multipart/form-data" class="form-horizontal form-element col-12">
<div class="modal fade" id="addwork" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myModalLabel">Add Work & Experience</h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	
  <div class="form-group" style="margin-right: 5px;">
    <div class="col-sm-12">
      <input type="text" required="true" placeholder="Organization Name" name="txtorgname" id="txtorgname" onblur="return validnamelen('txtorgname','lblorg','Organization Name');"  />
    </div>
  </div><isindex id="lblorg" ></isindex>
  <div class="form-group" style="margin-right: 5px;">
    <div class="col-sm-12">
      <input type="text" required="true" placeholder="Job Period" name="txtjobperiod" id="txtjobperiod" onblur="return validnamelen('txtjobperiod','lbljobperiod','Job Period');" />
    </div>
  </div><isindex id="lbljobperiod" ></isindex>
  <div class="form-group" style="margin-right: 5px;">
    <div class="col-sm-12">
      <input type="text" required="true" placeholder="Reason For Leaving" name="txtreason" id="txtreason" onblur="return ValidateControl('txtreason','lblresson','Reason For Leaving');" />
    </div>
  </div><isindex id="lblresson" ></isindex>
  <div class="form-group" style="margin-right: 5px;">
    <div class="col-sm-12">
      <input type="text" required="true" placeholder="Designation" name="txtworkdesig" id="txtworkdesig" onblur="return validnamelen('txtworkdesig','lbldesig','Designation');"  />
    </div>
  </div><isindex id="lbldesig" ></isindex>
  <div class="form-group" style="margin-right: 5px;">
    <div class="col-sm-12">
      <input type="text" placeholder="Description" name="txtworkdescrip"  />
    </div>
  </div>	
</div>
<div class="modal-footer" style="margin-top: -10px;">
<button class="btn btn-success" name="addwork" style="margin-left: 230px;" onclick="return frmValidateaddwork();">Add</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>
</form>

<form method="post" enctype="multipart/form-data" class="form-horizontal form-element col-12">
<div class="modal fade" id="addskill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myModalLabel">Add Skill</h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	
	<div class="dropdown-field" style="margin-right: 5px;">
		<?php
				$seladdskill="select * from tblskill";
				$rsaddskill=mysqli_query($con,$seladdskill) or die(mysqli_error($con));
				?>
				<select required="true" placeholder="Please Select Skill" name="addskillid" id="addskillid" class="chosen">
					<option value="" selected="" disabled="">Select Skill</option>
					<?php 
					while($resaddskill=mysqli_fetch_array($rsaddskill))
					{
					?>	
					<option value="<?php echo $resaddskill["SkillId"]; ?>"><?php echo $resaddskill["SkillName"]; ?></option>
					<?php
					}
					?>
				</select>

	</div>

  <div class="form-group" style="margin-right: 5px;">
    <div class="col-sm-12">
      <input type="text" required="true" placeholder="Experience" name="txtskillexp" id="txtskillexp" onblur="return validnamelen('txtskillexp','lblskillexp','Experience');"  />
    </div>
  </div><isindex id="lblskillexp" ></isindex>
  <div class="form-group" style="margin-right: 5px;">
    <div class="col-sm-12">
      <input type="text" required="true" placeholder="Designation" name="txtskilldesig" id="txtskilldesig" onblur="return validnamelen('txtskilldesig','lblskilldesig','Designation');" />
    </div>
  </div><isindex id="lblskilldesig" ></isindex>
  	
</div>
<div class="modal-footer" style="margin-top: -10px;">
<button class="btn btn-success" name="btnaddskill" style="margin-left: 230px;" onclick="return frmValidateaddskill();">Add</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>
</form>





<form method="post" enctype="multipart/form-data" class="form-horizontal form-element col-12">
<div class="modal fade" id="addcerti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myModalLabel">Add Certificate </h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	
  <div class="form-group" style="margin-right: 5px;">
    <div class="col-sm-12">
      <input type="text" placeholder="Certificate Name" required="true" name="txtcertiname" id="txtcertiname" onblur="return validnamelen('txtcertiname','lblcertiname','Certification Name');"  />
    </div>
  </div><isindex id="lblcertiname" ></isindex>
  <div class="form-group" style="margin-right: 5px;">
    <div class="col-sm-12">
      <input type="text" placeholder="Certification Year" required="true" name="txtcertiyear" id="txtcertiyear" maxlength="4" onkeypress="return NumbersOnly(event);" onblur="return ValidateControl('txtcertiyear','lblcertiyear','Passing Year');" minlength="4" />
    </div>
  </div><isindex id="lblcertiyear" ></isindex>
  <div class="form-group" style="margin-right: 5px;">
    <div class="col-sm-12">
      <input type="text" placeholder="Certificate Result" required="true" name="txtcertiresult" id="txtcertiresult" onblur="return validnamelen('txtcertiresult','lblcertiresult','Certification Result');"/>
    </div>
  </div><isindex id="lblcertiresult" ></isindex>
  <div class="form-group" style="margin-right: 5px;">
    <div class="col-sm-12">
      <input type="file" name="txtcertifile" />
    </div>Supported File Format : doc, docx, pdf
  </div>
</div>
<div class="modal-footer" style="margin-top: -10px;">
<button class="btn btn-success" name="btnaddcer" style="margin-left: 230px;" onclick="return frmValidateaddcerti();">Add</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>
</form>


<?php include_once "usrprofilesidebar.php"; ?>


<?php include_once "loadjs.php"; ?>



<!-- Mirrored from grandetest.com/theme/jobhunt-html/candidates_single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:44 GMT -->


</html>
<?php
}
else
{
	header('location:index.php');
}
?>
