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
      if(document.getElementById("branchname").value=="")
      {
        Msg +="* Please Enter Branch Name";
      }
      if(document.getElementById("txtconno").value=="")
      {
        Msg +="\n* Please Enter Contact Number";
      }
      if(document.getElementById("txtadd").value=="")
      {
        Msg +="\n* Please Enter Address";
      }
      if(document.getElementById("optstate").value=="")
      {
        Msg +="\n* Please Select City";
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
$selbranch="select * from tblorganization where OrganizationId=".$_SESSION["orgbranch"];
$rsbranch=mysqli_query($con,$selbranch) or die(mysqli_error($con));
$resbranch=mysqli_fetch_array($rsbranch);

  if(isset($btnpostjob))
  {

		if(isset($eid))
		{
			$upjob="update tblorganizationbranch set BranchName='$branchname', Address='$txtadd', ContactNo=$txtconno,CityId=$optstate where OrganizationBranchId=".$eid;
			mysqli_query($con,$upjob) or die(mysqli_error($con));
			

		}
		else
		{
			$sessionorgid=$_SESSION["orgbranch"];
			$ins="insert into tblorganizationbranch values(null,$sessionorgid,'$branchname','$txtadd',$txtconno,$optstate,1,now())";
		echo $ins;
		mysqli_query($con,$ins) or die(mysqli_error($con));
				
		}

		
		header('location:emporgbranch.php');
  }

if(isset($eid))
{
	$upeid="select * from tblorganizationbranch where OrganizationBranchId=".$eid;
	$rsupeid=mysqli_query($con,$upeid) or die(mysqli_error($con));
	$resupeid=mysqli_fetch_array($rsupeid);
}


?>
<body>

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
							<h3>Manage Branch</h3>
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
					 				<h3><?php if(isset($eid)){ echo "Edit"; } else { echo "Add"; } ?> Branch</h3>
					 					
					 			</div>
					 			<div class="profile-form-edit">
					 				<div class="row" style="margin-left: 10px;">
					 					<div class="col-lg-4">
					 						<span class="pf-title">Branch Name</span>
					 						<div class="pf-field">
					 							<input type="text" autofocus="" name="branchname" id="branchname" maxlength="50" onblur="return validnamelen('branchname','lblbranchname','Branch Name');" value="<?php if(isset($eid)) { echo $resupeid["BranchName"]; } ?>"  />
					 						</div><isindex id="lblbranchname" style="color : red;"></isindex>
					 					</div>


					 					<?php 
					 					$selstate="select * from tblcity where StateId=".$resbranch["StateId"];
					 					$rsstate=mysqli_query($con,$selstate) or die(mysqli_error($con));

					 					?>
					 					<div class="col-lg-6">
					 						<span class="pf-title">City</span>
					 						<div class="pf-field" id="statediv">
												<select class="form-control" name="optstate" required="true" id="optstate">
													<option value="" disabled="" selected="">Select City</option>
													<?php
													
					 								while($resstate=mysqli_fetch_array($rsstate))
					 								{
					 								?>
													<option value="<?php echo $resstate["CityId"]; ?>" <?php if(isset($eid)){ if($resstate["CityId"]==$resupeid["CityId"]) { ?> selected="selected" <?php } } ?> ><?php echo $resstate["CityName"]; ?></option>
													<?php
													}
													
													?>
												</select>
											</div>
										</div>


										<div class="col-lg-4">
					 						<span class="pf-title">Contact Number</span>
					 						<div class="pf-field">
					 							<input type="text" name="txtconno" id="txtconno" minlength="10" maxlength="10"  onkeypress="return NumbersOnly(event);" onblur="return ValidateControl('txtconno','lbltxtconno','Contact Number');" value="<?php if(isset($eid)) { echo $resupeid["ContactNo"]; } ?>" />
					 						</div><isindex id="lbltxtconno" style="color : red;"></isindex>
					 					</div>

					 					<div class="col-lg-8">
					 						<span class="pf-title">Address</span>
					 						<div class="pf-field">
					 							<textarea name="txtadd" id="txtadd" onblur="return ValidateControl('txtadd','lbltxtadd','Address');"><?php if(isset($eid)) { echo $resupeid["Address"]; } ?></textarea>
					 							<isindex id="lbltxtadd" style="color : red;"></isindex>
					 						</div>
					 					</div>

					 										 					
					 					<div class="col-lg-12">
					 						<button class="btnmain" type="submit" name="btnpostjob" onclick="return frmValidate();" ><?php if(isset($eid)){ echo "Edit"; } else { echo "Add"; } ?> Branch</button>
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
