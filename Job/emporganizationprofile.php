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
      if(document.getElementById("fname").value=="")
      {
        Msg +="* Please Enter First Name";
      }
      if(document.getElementById("mname").value=="")
      {
        Msg +="\n* Please Enter Middle Name";
      }
      if(document.getElementById("txtphoneno").value=="")
      {
        Msg +="\n* Please Enter Phone Number";
      }
      if(document.getElementById("txtphoneno").value<10)
      {
        Msg +="\n* Please Enter Phone Number";
      }
      if(document.getElementById("txtestablishyear").value=="")
      {
        Msg +="\n* Please Enter Establishment Year";
      }
      if(document.getElementById("txtorgadd").value=="")
      {
        Msg +="\n* Please Enter Organization Address";
      }
      if(document.getElementById("optcountry").value=="")
      {
        Msg +="\n* Please Select Country";
      }
      if(document.getElementById("optstate").value=="")
      {
        Msg +="\n* Please Select State";
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
$selemp="	select * from tblemployer a 
			left join tblorganization b on a.OrganizationId=b.OrganizationId
			where a.EmployerId=".$empid;
$rsemp=mysqli_query($con,$selemp) or die(mysqli_error($con));
$resemp=mysqli_fetch_array($rsemp);
if(is_null($resemp["Logo"]))
{
	$orglog="nologo.jpg";
}
elseif($resemp["Logo"]=="null")
{
	$orglog="nologo.jpg";
}
else
{
	$orglog=$resemp["Logo"];	
}

//echo $orglog;
  if(isset($btnupdateprofile))
  {
  		$selforup="	select * from tblemployer a
  					left join tblorganization b on a.OrganizationId=b.OrganizationId 
  					where EmployerId=".$empid;
		$rsforup=mysqli_query($con,$selforup) or die(mysqli_error($con));
		$resforup=mysqli_fetch_array($rsforup);
		if(!is_null($resforup["Logo"]))
		{
			$profilepic=$resforup["Logo"];
		}
		else
		{
			$profilepic="null";	
		}
		// if(is_null($resforup["WebsiteUrl"]))
		// {
		// 	$lname="null";	
		// }
		// elseif($resforup["WebsiteUrl"]=="null")
		// {
		// 	$lname="null";	
		// }
		if($lname=="")
		{
			$lname="null";
		}
		//echo $lname;
		//echo $profilepic;
		if(!empty($_FILES["txtprofilepic"]["name"]))
		{
			if(file_exists("employer/logo/$profilepic"))
      		{
        		unlink("employer/logo/$profilepic");
      		}
	      $profilepic= Date("d-m-YH-i-s").$_FILES["txtprofilepic"]["name"];
	      //echo $imgnam;
	      move_uploaded_file($_FILES["txtprofilepic"]["tmp_name"],"employer/logo/$profilepic");		
		}
		$up="update tblorganization set OrganizationName='$fname', ContactPerson='$mname', WebsiteUrl='$lname', PhoneNo=$txtphoneno, EstablishmentYear=$txtestablishyear, Description='$txtorgdes', Address='$txtorgadd', StateId=$optstate, CountryId=$optcountry, Logo='$profilepic' where OrganizationId=".$resforup["OrganizationId"];
      //echo $up;
      mysqli_query($con,$up) or die(mysqli_error($con));
      header('location:emporganizationprofile.php');

  }

  if(isset($btnbranchview))
  {
  	$selfororgbranch="select * from tblemployer where EmployerId=".$empid;
  	$rsfororgbranch=mysqli_query($con,$selfororgbranch) or die(mysqli_error($con));
  	$resfororgbranch=mysqli_fetch_array($rsfororgbranch);
  	$_SESSION["orgbranch"]=$resfororgbranch["OrganizationId"];
  	header('location:emporgbranch.php');
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
							<?php $b=$resemp["IsBlock"];  ?>
							<h3><?php echo $resemp["OrganizationName"]; ?><br><?php if($b==1){ ?><span style="color: red;">Your Organization Is Block By Admin</span><?php } ?>  </h3>							
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
					 				
					 				<h3>My Organization Profile<button type="submit"  name="btnbranchview" class="btnmain" style="margin-top: -10px;" <?php if($b==1){ ?> disabled="" <?php } ?> >View Branch</button></h3>
					 					<div class="upload-img-bar">
					 						<span class="round"><img src="employer/logo/<?php echo $orglog; ?>" alt="" style="width: 200px;height: 200px;" /></span>
					 						<br>
					 						<div class="upload-info" >
					 							<input type="file" name="txtprofilepic"  />
					 						</div>
					 					</div>
					 			</div>
					 			<div class="profile-form-edit">
					 				<div class="row" style="margin-left: 10px;">
					 					<div class="col-lg-4">
					 						<span class="pf-title">Organization Name</span>
					 						<div class="pf-field">
					 							<input type="text" name="fname" id="fname" value="<?php echo $resemp["OrganizationName"]; ?>" onblur="return validnamelen('fname','lblfname','Organization Name');" />
					 						</div><isindex id="lblfname" style="color:red;"></isindex>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Contact Person</span>
					 						<div class="pf-field">
					 							<input type="text" name="mname" id="mname" value="<?php echo $resemp["ContactPerson"]; ?>" onblur="return validnamelen('mname','lblmname','Contact Person Name');" />
					 						</div><isindex id="lblmname" style="color:red;"></isindex>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Website</span>
					 						<div class="pf-field">
					 							<input type="text" name="lname" id="lname" 
					 							<?php 	
					 								if(is_null($resemp["WebsiteUrl"]))
													{  
													}
													elseif($resemp["WebsiteUrl"]=="null")
													{
													}
													else
													{
													?>
														value="<?php echo $resemp["WebsiteUrl"]; ?>"
													<?php
													}
												?>	 placeholder="Website Address" />
					 						</div><isindex id="lbllname"></isindex>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Phone Number</span>
					 						<div class="pf-field">
					 							<input type="text" maxlength="10" minlength="10" id="txtphoneno" name="txtphoneno"  onkeypress="return NumbersOnly(event);" onblur="return ValidateControl('txtphoneno','lblphpne','Phone Number');"  placeholder="Phone Number" value="<?php echo $resemp["PhoneNo"]; ?>" />
												<i class="la la-phone"></i>
											</div><isindex id="lblphpne" style="color : red;"></isindex>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Establishment Year</span>
					 						<div class="pf-field">
					 							<input type="text" maxlength="4" minlength="4" id="txtestablishyear" name="txtestablishyear"  onkeypress="return NumbersOnly(event);" onblur="return ValidateControl('txtestablishyear','lblestablishyear','Establishment Year');"  placeholder="Establishment Year" value="<?php echo $resemp["EstablishmentYear"]; ?>" />
												
											</div><isindex id="lblestablishyear" style="color : red;"></isindex>
					 					</div>
					 					<div class="col-lg-4">
					 						<!-- <span class="pf-title">Email</span>
					 						<div class="pf-field">
					 							<input type="text" id="txtorgemail" name="txtorgemail" onblur="return ValidateControl('txtorgemail','lbltxtorgemail','Email');"  placeholder="Contact Person Email" onblur="return ValidateEmailID('txtorgemail','lbltxtorgemail');" value="<?php echo $resemp["EmailId"]; ?>" />
											</div><isindex id="lbltxtorgemail" style="color : red;"></isindex> -->
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea name="txtorgdes" id="txtorgdes"><?php echo $resemp["Description"]; ?></textarea>
					 						</div><isindex id="lblphpne" style="color : red;"></isindex>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Address</span>
					 						<div class="pf-field">
					 							<textarea name="txtorgadd" id="txtorgadd" onblur="return ValidateControl('txtorgadd','lbltxtorgadd','Organization Address');" placeholder="Organization Address" ><?php echo $resemp["Address"]; ?></textarea>
					 							
											</div><isindex id="lbltxtorgadd" style="color : red;"></isindex>
					 					</div>
					 					
					 					<?php 
					 					$selcountry="select * from tblcountry";
					 					$rscountry=mysqli_query($con,$selcountry) or die(mysqli_error($con));
					 					?>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Country</span>
					 						<div class="pf-field">
					 							<select onchange="getState(this.value);" name="optcountry" id="optcountry" required="true" class="form-control" >
					 								<option value="" selected="" disabled="">Select Country</option>
													<?php
					 								while($rescountry=mysqli_fetch_array($rscountry))
					 								{
					 								?>
													<option value="<?php echo $rescountry["CountryId"]; ?>" <?php if($rescountry["CountryId"]==$resemp["CountryId"]){ ?> selected="selected"   <?php } ?> ><?php echo $rescountry["CountryName"]; ?></option>
													<?php
													}
													?>
												</select>
					 						</div>
					 					</div>
					 					<?php if(!is_null($resemp["CountryId"])) {
                    $selstate="select * from tblstate where CountryId=".$resemp["CountryId"];
                    $rsstate=mysqli_query($con,$selstate) or die(mysqli_error($con)); }
                    ?>					 					
					 					<div class="col-lg-6">
					 						<span class="pf-title">State</span>
					 						<div class="pf-field" id="statediv" >
					 							<select name="optstate" id="optstate" class="form-control" required="true" >
					 								<option value="" selected="" disabled="">Select Country First</option>
													<?php 
                            while($resstate=mysqli_fetch_array($rsstate))
                            { 
                          ?>
                            <option value="<?php echo $resstate['StateId']; ?>" <?php if($resstate["StateId"]==$resemp["StateId"]){ ?> selected="selected"   <?php } ?> ><?php echo $resstate['StateName']; ?></option>
                          <?php 
                            }
                           ?>
												</select>
					 						</div>
					 					</div>
					 										 					
					 					<div class="col-lg-12">
					 						<button class="btnmain" type="submit" name="btnupdateprofile" onclick="return frmValidate();" <?php if($b==1){ ?> disabled="" <?php } ?> >Update</button>
					 					</div>

					 					</div><br>




					 				</div>

					 			
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
