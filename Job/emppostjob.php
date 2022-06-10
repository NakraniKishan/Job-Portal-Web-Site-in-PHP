<?php
session_start();
if(isset($_SESSION["empid"]))
{
  $empid=$_SESSION["empid"];
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
function frmValidate()
    {
      var Msg="";
      if(document.getElementById("optcategory").value=="")
      {
        Msg +="* Please Enter Select Category";
      }
      if(document.getElementById("optskill").value=="")
      {
        Msg +="\n* Please Enter Select Skill";
      }
      if(document.getElementById("opttype").value=="")
      {
        Msg +="\n* Please Enter Select Work Type";
      }
      if(document.getElementById("minexp").value=="")
      {
        Msg +="\n* Please Enter Minimum Experience";
      }
      if(document.getElementById("maxexp").value=="")
      {
        Msg +="\n* Please Enter Maximum Experience";
      }
      if(document.getElementById("txtsal").value=="")
      {
        Msg +="\n* Please Enter Minimum Salary";
      }
      if(document.getElementById("optcountry").value=="")
      {
        Msg +="\n* Please Select Country";
      }
      if(document.getElementById("optstate").value=="")
      {
        Msg +="\n* Please Select State";
      }
      if(document.getElementById("txtvacan").value=="")
      {
        Msg +="\n* Please Enter Total No. Of Vacancies";
      }
      // if(document.getElementById("txtdays").value=="")
      // {
      //   Msg +="\n* Please Enter No. Of Days Within You Want Candidate.";
      // }





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
    function getState(CountryID)
{
  var xhttp = new XMLHttpRequest();
    
    var strURL="visfindstate.php?ConID="+CountryID;
     
    //alert(strURL);

    xhttp.onreadystatechange = function() 
    {
    
    if (this.readyState == 4 && this.status == 200) 
    {
     //alert(this.responseText);
     document.getElementById("statediv").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", strURL, true);
  xhttp.send(); 
    }

</script>
</head>

<?php
$con=mysqli_connect("localhost","root","","job");
extract($_REQUEST);
$selemp="select * from tblemployer where EmployerId=".$empid;
$rsemp=mysqli_query($con,$selemp) or die(mysqli_error($con));
$resemp=mysqli_fetch_array($rsemp);
if(is_null($resemp["ImageUrl"]))
{
	$empimg="download.jpg";	
}
else
{
	$empimg=$resemp["ImageUrl"];	
}


  if(isset($btnpostjob))
  {
  		$valcategory=$_REQUEST["optcategory"];
		$valskill=$_REQUEST["optskill"];
		$valworktype=$_REQUEST["opttype"];
		$valminexp=$_REQUEST["minexp"];
		$valmaxexp=$_REQUEST["maxexp"];
		$valminsal=$_REQUEST["txtsal"];
		$valcountry=$_REQUEST["optcountry"];
		$valstate=$_REQUEST["optstate"];
		$valvancan=$_REQUEST["txtvacan"];
		// $valdays=$_REQUEST["txtdays"];
		$valdesc=$_REQUEST["txtdesc"];

		if(isset($eid))
		{
			$upjob="update tbljobpost set JobCategory=$valcategory, JobDescription='$valdesc',TotalVacancies=$valvancan,LeftVacancies=$valvancan where JobPostId=".$eid;
			mysqli_query($con,$upjob) or die(mysqli_error($con));
			$upjob2="update tbljobpostdetail set SkillId=$valskill, MinExperience='$valminexp',MinSalary=$valminsal, MaxExperience='$valmaxexp',StateId=$valstate,CountryId=$valcountry where JobPostId=".$eid;
			mysqli_query($con,$upjob2) or die(mysqli_error($con));

		}
		else
		{
			$ins1="insert into tbljobpost values(null,$empid,$valcategory,'$valdesc',$valvancan,1,now(),$valvancan)";
		echo $ins1;
		mysqli_query($con,$ins1) or die(mysqli_error($con));
			
		$lastjobpostid=mysqli_insert_id($con);

		$ins2="insert into tbljobpostdetail values(null,$lastjobpostid,$valskill,'$valminexp',$valminsal,'$valmaxexp',$valstate,$valcountry,'$valworktype')";
		echo $ins2;
		mysqli_query($con,$ins2) or die(mysqli_error($con));	
		}

		
		header('location:empmanagejob.php');
  }

if(isset($eid))
{
	$upeid="select * from tbljobpost a 
			left join tblcategory b on a.JobCategory=b.CategoryId
			left join tbljobpostdetail c on a.JobPostId=c.JobPostId
			left join tblskill d on c.SkillId=d.SkillId
			left join tblcountry e on c.CountryId=e.CountryId
			left join tblstate f on c.StateId=f.StateId
			where a.JobPostId=".$eid;
	$rsupeid=mysqli_query($con,$upeid) or die(mysqli_error($con));
	$resupeid=mysqli_fetch_array($rsupeid);
}

if(isset($disid))
{
	$upeid="select * from tbljobpost a 
			left join tblcategory b on a.JobCategory=b.CategoryId
			left join tbljobpostdetail c on a.JobPostId=c.JobPostId
			left join tblskill d on c.SkillId=d.SkillId
			left join tblcountry e on c.CountryId=e.CountryId
			left join tblstate f on c.StateId=f.StateId
			where a.JobPostId=".$disid;
	$rsupeid=mysqli_query($con,$upeid) or die(mysqli_error($con));
	$resupeid=mysqli_fetch_array($rsupeid);
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
							<h3><?php echo $resemp["FirstName"]; ?> <?php echo $resemp["MiddleName"]; ?> <?php echo $resemp["LastName"]; ?></h3>
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
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
              				<form method="post" enctype="multipart/form-data">
					 			<div class="profile-title">
					 				<h3>Post Job</h3>
					 					
					 			</div>
					 			<div class="profile-form-edit">
					 				<div class="row" style="margin-left: 10px;">
					 					
					 					<?php 
					 					$selcategory="select * from tblcategory where IsActive=1";
					 					$rscategory=mysqli_query($con,$selcategory) or die(mysqli_error($con));
					 					?>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Category</span>
					 						<div class="pf-field">
					 							<select name="optcategory" id="optcategory" required="true" class="form-control" <?php if(isset($disid)) { ?> disabled="" <?php } ?> >
					 								<option value="" selected="" disabled="">Select Category</option>
													<?php
					 								while($rescategory=mysqli_fetch_array($rscategory))
					 								{
					 								?>
													<option value="<?php echo $rescategory["CategoryId"]; ?>" <?php if(isset($eid)){ if($rescategory["CategoryId"]==$resupeid["CategoryId"]) { ?> selected="selected" <?php } } ?> <?php if(isset($disid)){ if($rescategory["CategoryId"]==$resupeid["CategoryId"]) { ?> selected="selected" <?php } } ?> ><?php echo $rescategory["CategoryName"]; ?> </option>
													<?php
													}
													?>
												</select>
					 						</div>
					 					</div>

					 					<?php 
					 					$selskill="select * from tblskill";
					 					$rsskill=mysqli_query($con,$selskill) or die(mysqli_error($con));
					 					?>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Skill</span>
					 						<div class="pf-field">
					 							<select name="optskill" id="optskill" required="true" class="form-control" <?php if(isset($disid)) { ?> disabled="" <?php } ?> >
					 								<option value="" selected="" disabled="">Select Skill</option>
													<?php
					 								while($resskill=mysqli_fetch_array($rsskill))
					 								{
					 								?>
													<option value="<?php echo $resskill["SkillId"]; ?>" <?php if(isset($eid)){ if($resskill["SkillId"]==$resupeid["SkillId"]) { ?> selected="selected" <?php } } ?> <?php if(isset($disid)){ if($resskill["SkillId"]==$resupeid["SkillId"]) { ?> selected="selected" <?php } } ?> ><?php echo $resskill["SkillName"]; ?></option>
													<?php
													}
													?>
												</select>
					 						</div>
					 					</div>

					 					<div class="col-lg-4">
					 						<span class="pf-title">Work Type</span>
					 						<div class="pf-field">
					 							<select name="opttype" id="opttype" required="true" class="form-control" <?php if(isset($disid)) { ?> disabled="" <?php } ?> >
					 								<option value="" selected="" disabled=""  >Select Work Type</option>
					 								<option value="Part Time" <?php if(isset($eid)){ if($resupeid["WorkType"]=="Part Time") { ?> selected="selected" <?php } } ?> <?php if(isset($disid)){ if($resupeid["WorkType"]=="Part Time") { ?> selected="selected" <?php } } ?> >Part Time</option>
					 								<option value="Full Time" <?php if(isset($eid)){ if($resupeid["WorkType"]=="Full Time") { ?> selected="selected" <?php } } ?> <?php if(isset($disid)){ if($resupeid["WorkType"]=="Full Time") { ?> selected="selected" <?php } } ?> >Full Time</option>
					 								<option value="Home Based" <?php if(isset($eid)){ if($resupeid["WorkType"]=="Home Based") { ?> selected="selected" <?php } } ?> <?php if(isset($disid)){ if($resupeid["WorkType"]=="Home Based") { ?> selected="selected" <?php } } ?> >Home Based</option>
												</select>
					 						</div>
					 					</div>

					 					<div class="col-lg-4">
					 						<span class="pf-title">Minimum Experience</span>
					 						<div class="pf-field">
					 							<input type="text" name="minexp" id="minexp" maxlength="30" onblur="return validnamelen('minexp','lblminexp','Minimum Experience');" value="<?php if(isset($eid)) { echo $resupeid["MinExperience"]; } if(isset($disid)) { echo $resupeid["MinExperience"]; } ?>" <?php if(isset($disid)) { ?> disabled="" <?php } ?>  />
					 						</div><isindex id="lblminexp"></isindex>
					 					</div>

					 					<div class="col-lg-4">
					 						<span class="pf-title">Maximum Experience</span>
					 						<div class="pf-field">
					 							<input type="text" name="maxexp" id="maxexp" maxlength="30" onblur="return validnamelen('maxexp','lblmaxexp','Maximum Experience');" value="<?php if(isset($eid)) { echo $resupeid["MaxExperience"]; } if(isset($disid)) { echo $resupeid["MaxExperience"]; } ?>" <?php if(isset($disid)) { ?> disabled="" <?php } ?> />
					 						</div><isindex id="lblmaxexp"></isindex>
					 					</div>

					 					<div class="col-lg-4">
					 						<span class="pf-title">Minimum Salary</span>
					 						<div class="pf-field">
					 							<input type="text" name="txtsal" id="txtsal" maxlength="30" onblur="return validnamelen('txtsal','lbltxtsal','Minimum Salary');" onkeypress="return NumbersOnly(event);" value="<?php if(isset($eid)) { echo $resupeid["MinSalary"]; } if(isset($disid)) { echo $resupeid["MinSalary"]; } ?>" <?php if(isset($disid)) { ?> disabled="" <?php } ?> />
					 						</div><isindex id="lbltxtsal"></isindex>
					 					</div>

					 					<?php 
					 					$selcountry="select * from tblcountry";
					 					$rscountry=mysqli_query($con,$selcountry) or die(mysqli_error($con));
					 					?>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Country</span>
					 						<div class="pf-field">
					 							<select name="optcountry" id="optcountry" required="true" class="form-control" onchange="getState(this.value);" <?php if(isset($disid)) { ?> disabled="" <?php } ?> >
					 								<option value="" selected="" disabled="">Select Country</option>
													<?php
					 								while($rescountry=mysqli_fetch_array($rscountry))
					 								{
					 								?>
													<option value="<?php echo $rescountry["CountryId"]; ?>" <?php if(isset($eid)){ if($rescountry["CountryId"]==$resupeid["CountryId"]) { ?> selected="selected" <?php } } ?> <?php if(isset($disid)){ if($rescountry["CountryId"]==$resupeid["CountryId"]) { ?> selected="selected" <?php } } ?> ><?php echo $rescountry["CountryName"]; ?></option>
													<?php
													}
													?>
												</select>
					 						</div>
					 					</div>

					 					<?php 
					 					$selstate="select * from tblstate";
					 					$rsstate=mysqli_query($con,$selstate) or die(mysqli_error($con));

					 					?>
					 					<div class="col-lg-6">
					 						<span class="pf-title">State</span>
					 						<div class="pf-field" id="statediv">
												<select class="form-control" name="optstate" id="optstate" <?php if(isset($disid)) { ?> disabled="" <?php } ?>>
													<option value="0" disabled="" selected="">Select Country First</option>
													<?php
													if(isset($eid))
													{
					 								while($resstate=mysqli_fetch_array($rsstate))
					 								{
					 								?>
													<option value="<?php echo $resstate["StateId"]; ?>" <?php if(isset($eid)){ if($resstate["StateId"]==$resupeid["StateId"]) { ?> selected="selected" <?php } } ?> ><?php echo $resstate["StateName"]; ?></option>
													<?php
													}
													}
													if(isset($disid))
													{
					 								while($resstate=mysqli_fetch_array($rsstate))
					 								{
					 								?>
													<option value="<?php echo $resstate["StateId"]; ?>" <?php if(isset($disid)){ if($resstate["StateId"]==$resupeid["StateId"]) { ?> selected="selected" <?php } } ?> ><?php echo $resstate["StateName"]; ?></option>
													<?php
													}
													}
													?>
												</select>
											</div>
										</div>


										<div class="col-lg-4">
					 						<span class="pf-title">Total No Of Vacancies</span>
					 						<div class="pf-field">
					 							<input type="text" name="txtvacan" id="txtvacan" maxlength="2" onblur="return validnamelen('txtvacan','lbltxtvacan','Total No. Of Vacancies');" onkeypress="return NumbersOnly(event);" value="<?php if(isset($eid)) { echo $resupeid["TotalVacancies"]; } if(isset($disid)) { echo $resupeid["TotalVacancies"]; } ?>" <?php if(isset($disid)) { ?> disabled="" <?php } ?> />
					 						</div><isindex id="lbltxtvacan"></isindex>
					 					</div>

					 					<!-- <div class="col-lg-4">
					 						<span class="pf-title">With In Days</span>
					 						<div class="pf-field">
					 							<input type="text" name="txtdays" id="txtdays" maxlength="2"  onkeypress="return NumbersOnly(event);" value="<?php if(isset($eid)) { echo $resupeid["WithInDays"]; } ?>" />
					 						</div>
					 					</div> -->

					 					<div class="col-lg-8">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea name="txtdesc" <?php if(isset($disid)) { ?> disabled="" <?php } ?>><?php if(isset($eid)) { echo $resupeid["JobDescription"]; }  if(isset($disid)) { echo $resupeid["JobDescription"]; } ?></textarea>
					 						</div>
					 					</div>

					 										 					
					 					<div class="col-lg-12">
					 						<button class="btnmain" type="submit" name="btnpostjob" onclick="return frmValidate();" <?php if(isset($disid)) { ?> disabled="" <?php } ?> >Post</button>
					 					</div>
					 				</div><br>

					 			
					 		</div>
					 	</form>
					 </div>
					</div>
				</div>
			</div>
		</div>
	</section>








	<?php include_once "empfooter.php"; ?>

</div>









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
