<?php
session_start();
if(isset($_SESSION["usrid"]))
{
  $usrid=$_SESSION["usrid"];
?>
<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/candidates_profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:46 GMT -->
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
        Msg +="Enter First Name";
      }
      if(document.getElementById("mname").value=="")
      {
        Msg +="\nEnter Middle Name";
      }
      if(document.getElementById("lname").value=="")
      {
        Msg +="\nEnter Last Name";
      }
      if(document.getElementById("txtusrdob").value=="")
      {
        Msg +="\nEnter Date Of Birth";
      }
      if(document.getElementById("txtusrpin").value=="")
      {
        Msg +="\nEnter Pincode";
      }
      if(document.getElementById("optcity").value=="")
      {
        Msg +="\nSelect City";
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

    function frmValidateedu()
    {
      var Msg="";
      if(document.getElementById("txtdeg").value=="")
      {
        Msg +="Enter Degree";
      }
      if(document.getElementById("txtspec").value=="")
      {
        Msg +="Enter Specialization";
      }
      if(document.getElementById("txtpassingyear").value=="")
      {
        Msg +="Enter Passing Year";
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
    function frmValidateworkandexp()
    {
      var Msg="";
      if(document.getElementById("txtorgname").value=="")
      {
        Msg +="Enter Organization Name";
      }
      if(document.getElementById("txtjobperiod").value=="")
      {
        Msg +="Enter Job Period";
      }
      if(document.getElementById("txtworkdeg").value=="")
      {
        Msg +="Enter Job Designation";
      }
      if(document.getElementById("txtresleav").value=="")
      {
        Msg +="Enter Reason For Leaving";
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
    function frmValidateskill()
    {
      var Msg="";
      if(document.getElementById("txtskillexp").value=="")
      {
        Msg +="Enter Experience";
      }
      if(document.getElementById("txtskilldes").value=="")
      {
        Msg +="Enter Designation";
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
    function frmValidatecerti()
    {
      var Msg="";
      if(document.getElementById("txtcertiname").value=="")
      {
        Msg +="Enter Certification Name";
      }
      if(document.getElementById("txtcertiyr").value=="")
      {
        Msg +="Enter Certification Passing Year";
      }
      if(document.getElementById("txtcertiresult").value=="")
      {
        Msg +="Enter Certification Result";
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

function getCity(StateID)
{
  var xhttp = new XMLHttpRequest();
    
    var strURL="visfindcity.php?StID="+StateID;
     
   // alert(strURL);

    xhttp.onreadystatechange = function() 
    {
    
    if (this.readyState == 4 && this.status == 200) 
    {
     
     document.getElementById("citydiv").innerHTML = this.responseText;
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








if(isset($btnupdateprofile))
{
	if(isset($_REQUEST["userupid"]))
	{
		$selforup="select * from tbluser where UserId=".$_REQUEST["userupid"];
		$rsforup=mysqli_query($con,$selforup) or die(mysqli_error($con));
		$resforup=mysqli_fetch_array($rsforup);
		$resumfile=$resforup["ResumeFile"];
		$profilepic=$resforup["UserPhoto"];
		if(!empty($_FILES["txtresume"]["name"]))
		{
      if(file_exists("user/resumefile/$resumfile"))
      {
        unlink("user/resumefile/$resumfile");
      }
      $imgnam= Date("d-m-YH-i-s").$_FILES["txtresume"]["name"];
      //echo $imgnam;
      move_uploaded_file($_FILES["txtresume"]["tmp_name"],"user/resumefile/$imgnam");
        if(!empty($_FILES["txtprofilepic"]["name"]))
        {
            if(file_exists("user/userimg/$profilepic"))
         		{
              unlink("user/userimg/$profilepic");
           	}
            $imgnampic= Date("d-m-YH-i-s").$_FILES["txtprofilepic"]["name"];
            //echo $imgnam;
            move_uploaded_file($_FILES["txtprofilepic"]["tmp_name"],"user/userimg/$imgnampic");
            $up="update tbluser set FirstName='$fname', MiddleName='$mname', LastName='$lname', CityId=$optcity, StateId=$optstate, CountryId=$optcountry, Dob='$txtusrdob', Pincode=$txtusrpin, ResumeFile='$imgnam', UserPhoto='$imgnampic' where UserId=".$_REQUEST["userupid"];
            echo $up;
            mysqli_query($con,$up) or die(mysqli_error($con));
        	  header('location:usrprofile.php');
        }
        else
        {
        $up="update tbluser set FirstName='$fname', MiddleName='$mname', LastName='$lname', CityId=$optcity, StateId=$optstate, CountryId=$optcountry, Dob='$txtusrdob', Pincode=$txtusrpin, ResumeFile='$imgnam' where UserId=".$_REQUEST["userupid"];
        //echo $up;
        mysqli_query($con,$up) or die(mysqli_error($con));
        header('location:usrprofile.php');
        }
		}
		elseif(!empty($_FILES["txtprofilepic"]["name"]))
		{
		  if(file_exists("user/userimg/$profilepic"))
      {
        unlink("user/userimg/$profilepic");
      }
      $imgnampic= Date("d-m-YH-i-s").$_FILES["txtprofilepic"]["name"];
      //echo $imgnam;
      move_uploaded_file($_FILES["txtprofilepic"]["tmp_name"],"user/userimg/$imgnampic");
      $up="update tbluser set FirstName='$fname', MiddleName='$mname', LastName='$lname', Gender='$gen', CityId=$optcity, StateId=$optstate, CountryId=$optcountry, Dob='$txtusrdob', Pincode=$txtusrpin, UserPhoto='$imgnampic' where UserId=".$_REQUEST["userupid"];
      //echo $up;
      mysqli_query($con,$up) or die(mysqli_error($con));
      header('location:usrprofile.php');
		}
		else
		{
			$up="update tbluser set FirstName='$fname', MiddleName='$mname', LastName='$lname', CityId=$optcity, StateId=$optstate, CountryId=$optcountry, Dob='$txtusrdob', Pincode=$txtusrpin where UserId=".$_REQUEST["userupid"];
      //echo $up;
      //echo $_REQUEST['optcity'];
      //echo $_REQUEST['optstate'];
      mysqli_query($con,$up) or die(mysqli_error($con));
      header('location:usrprofile.php');
		}
		//header('location:usrprofile.php');
	}

	if(isset($_REQUEST["usrupedu"]))
	{
		$selforup="select * from tbluser where UserId=".$_SESSION["usrid"];
		$rsforup=mysqli_query($con,$selforup) or die(mysqli_error($con));
		$resforup=mysqli_fetch_array($rsforup);
		$profilepic=$resforup["UserPhoto"];
		if(!empty($_FILES["txtprofilepic"]["name"]))
            {
            	if(file_exists("user/userimg/$profilepic"))
         		{
              		unlink("user/userimg/$profilepic");
           		}
            	$imgnampic= Date("d-m-YH-i-s").$_FILES["txtprofilepic"]["name"];
            	//echo $imgnam;
            	move_uploaded_file($_FILES["txtprofilepic"]["tmp_name"],"user/userimg/$imgnampic");
            	$up="update tbluser set UserPhoto='$imgnampic' where UserId=".$_SESSION["usrid"];
            echo $up;
            mysqli_query($con,$up) or die(mysqli_error($con));
            $up2="update tbluserqualification set Degree='$txtdeg',UniversityId=$optuniversity,StreamId=$optstream,Specialization='$txtspec',PassingYear=$txtpassingyear where UserQualificationId=".$_REQUEST["usrupedu"];
            mysqli_query($con,$up2) or die(mysqli_error($con));
        	header('location:usrprofile.php');
            }
            else
            {
            	$up2="update tbluserqualification set Degree='$txtdeg',UniversityId=$optuniversity,StreamId=$optstream,Specialization='$txtspec',PassingYear=$txtpassingyear where UserQualificationId=".$_REQUEST["usrupedu"];
            mysqli_query($con,$up2) or die(mysqli_error($con));
        	header('location:usrprofile.php');
            }

	}

	if(isset($_REQUEST["usrupwork"]))
	{
		$selforup="select * from tbluser where UserId=".$_SESSION["usrid"];
		$rsforup=mysqli_query($con,$selforup) or die(mysqli_error($con));
		$resforup=mysqli_fetch_array($rsforup);
		$profilepic=$resforup["UserPhoto"];
		if(!empty($_FILES["txtprofilepic"]["name"]))
            {
            	if(file_exists("user/userimg/$profilepic"))
         		{
              		unlink("user/userimg/$profilepic");
           		}
            	$imgnampic= Date("d-m-YH-i-s").$_FILES["txtprofilepic"]["name"];
            	//echo $imgnam;
            	move_uploaded_file($_FILES["txtprofilepic"]["tmp_name"],"user/userimg/$imgnampic");
            	$up="update tbluser set UserPhoto='$imgnampic' where UserId=".$_SESSION["usrid"];
            echo $up;
            mysqli_query($con,$up) or die(mysqli_error($con));
            $up2="update tbluserexperience set OrganizationName='$txtorgname',JobPeriod='$txtjobperiod',ReasonForLeaving='$txtresleav', Designation='$txtworkdeg', Description='$txtworkdes' where UserExperienceId=".$_REQUEST["usrupwork"];
            mysqli_query($con,$up2) or die(mysqli_error($con));
        	header('location:usrprofile.php');
        	}
        	else
        	{
        		$up2="update tbluserexperience set OrganizationName='$txtorgname',JobPeriod='$txtjobperiod',ReasonForLeaving='$txtresleav', Designation='$txtworkdeg', Description='$txtworkdes' where UserExperienceId=".$_REQUEST["usrupwork"];
            mysqli_query($con,$up2) or die(mysqli_error($con));
        	header('location:usrprofile.php');
        	}
	}

	if(isset($_REQUEST["usrupskill"]))
	{
		$selforup="select * from tbluser where UserId=".$_SESSION["usrid"];
		$rsforup=mysqli_query($con,$selforup) or die(mysqli_error($con));
		$resforup=mysqli_fetch_array($rsforup);
		$profilepic=$resforup["UserPhoto"];
		if(!empty($_FILES["txtprofilepic"]["name"]))
            {
            	if(file_exists("user/userimg/$profilepic"))
         		{
              		unlink("user/userimg/$profilepic");
           		}
            	$imgnampic= Date("d-m-YH-i-s").$_FILES["txtprofilepic"]["name"];
            	//echo $imgnam;
            	move_uploaded_file($_FILES["txtprofilepic"]["tmp_name"],"user/userimg/$imgnampic");
            	$up="update tbluser set UserPhoto='$imgnampic' where UserId=".$_SESSION["usrid"];
            echo $up;
            mysqli_query($con,$up) or die(mysqli_error($con));
            $up2="update tbluserskill set Experience='$txtskillexp',Designation='$txtskilldes',SkillId='$optskill' where UserSkillId=".$_REQUEST["usrupskill"];
            mysqli_query($con,$up2) or die(mysqli_error($con));
        	header('location:usrprofile.php');
        	}
        	else
        	{
        		$up2="update tbluserskill set Experience='$txtskillexp',Designation='$txtskilldes',SkillId='$optskill' where UserSkillId=".$_REQUEST["usrupskill"];
            mysqli_query($con,$up2) or die(mysqli_error($con));
        	header('location:usrprofile.php');
        	}
	}

	if(isset($_REQUEST["usrupcerti"]))
	{

		$selforup="select * from tbluser where UserId=".$_SESSION["usrid"];
		$rsforup=mysqli_query($con,$selforup) or die(mysqli_error($con));
		$resforup=mysqli_fetch_array($rsforup);
		$profilepic=$resforup["UserPhoto"];
		$selusercertiup="select * from tblusercertification where UserCertificationId=".$_REQUEST["usrupcerti"];
		$rsusercertiup=mysqli_query($con,$selusercertiup) or die(mysqli_error($con));
		$resusercertiup=mysqli_fetch_array($rsusercertiup);
		$certifile=$resusercertiup["FileUrl"];
		if(!empty($_FILES["txtcertifile"]["name"]))
		{
			if(file_exists("user/certificatefile/$certifile"))
            {
              unlink("user/certificatefile/$certifile");
            }
            $imgnam= Date("d-m-YH-i-s").$_FILES["txtcertifile"]["name"];
            //echo $imgnam;
            move_uploaded_file($_FILES["txtcertifile"]["tmp_name"],"user/certificatefile/$imgnam");
            if(!empty($_FILES["txtprofilepic"]["name"]))
            {
            	if(file_exists("user/userimg/$profilepic"))
         		{
              		unlink("user/userimg/$profilepic");
           		}
            	$imgnampic= Date("d-m-YH-i-s").$_FILES["txtprofilepic"]["name"];
            	//echo $imgnam;
            	move_uploaded_file($_FILES["txtprofilepic"]["tmp_name"],"user/userimg/$imgnampic");
            	$up="update tbluser set UserPhoto='$imgnampic' where UserId=".$_SESSION["usrid"];
           		echo $up;
           		mysqli_query($con,$up) or die(mysqli_error($con));
           		$up2="update tblusercertification set CertificationName='$txtcertiname', Year=$txtcertiyr, Result='$txtcertiresult', FileUrl='$imgnam' where UserCertificationId=".$_REQUEST["usrupcerti"];
           		mysqli_query($con,$up2) or die(mysqli_error($con));
        		header('location:usrprofile.php');
            }
            $up2="update tblusercertification set CertificationName='$txtcertiname', Year=$txtcertiyr, Result='$txtcertiresult', FileUrl='$imgnam' where UserCertificationId=".$_REQUEST["usrupcerti"];
           		mysqli_query($con,$up2) or die(mysqli_error($con));
        		header('location:usrprofile.php');
		}
		elseif(!empty($_FILES["txtprofilepic"]["name"]))
		{
			if(file_exists("user/userimg/$profilepic"))
         		{
              		unlink("user/userimg/$profilepic");
           		}
            	$imgnampic= Date("d-m-YH-i-s").$_FILES["txtprofilepic"]["name"];
            	//echo $imgnam;
            	move_uploaded_file($_FILES["txtprofilepic"]["tmp_name"],"user/userimg/$imgnampic");
            	$up="update tbluser set UserPhoto='$imgnampic' where UserId=".$_SESSION["usrid"];
            echo $up;
            mysqli_query($con,$up) or die(mysqli_error($con));
             $up2="update tblusercertification set CertificationName='$txtcertiname', Year=$txtcertiyr, Result='$txtcertiresult' where UserCertificationId=".$_REQUEST["usrupcerti"];
           		mysqli_query($con,$up2) or die(mysqli_error($con));
        		header('location:usrprofile.php');
		}
		else
		{
			$up2="update tblusercertification set CertificationName='$txtcertiname', Year=$txtcertiyr, Result='$txtcertiresult' where UserCertificationId=".$_REQUEST["usrupcerti"];
           		mysqli_query($con,$up2) or die(mysqli_error($con));
        		header('location:usrprofile.php');
		}




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

				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
              <form method="post" enctype="multipart/form-data">
					 		<div class="profile-title">
					 			<h3>My Profile</h3>
					 			<div class="upload-img-bar">
					 				<span class="round"><img src="user/userimg/<?php echo $usrimg; ?>" alt="" style="width: 200px;height: 200px;" /></span>
					 				<br>
					 				<div class="upload-info" >
					 					<input type="file" name="txtprofilepic"  />
					 				</div>
					 			</div>
					 			
					 		</div>
					 		<div class="profile-form-edit">
					 			
					 				<?php if(isset($_REQUEST["userupid"])){ ?>
					 				<div class="row" style="margin-left: 10px;">
					 					<div class="col-lg-4">
					 						<span class="pf-title">First Name</span>
					 						<div class="pf-field">
					 							<input type="text" name="fname" id="fname" value="<?php echo $res["FirstName"]; ?>" onblur="return validnamelen('fname','lblfname','First Name');" />
					 						</div><isindex id="lblfname"></isindex>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Middle Name</span>
					 						<div class="pf-field">
					 							<input type="text" name="mname" id="mname" value="<?php echo $res["MiddleName"]; ?>" onblur="return validnamelen('mname','lblmname','Middle Name');" />
					 						</div><isindex id="lblmname"></isindex>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Last Name</span>
					 						<div class="pf-field">
					 							<input type="text" name="lname" id="lname" value="<?php echo $res["LastName"]; ?>" onblur="return validnamelen('lname','lbllname','Last Name');" />
					 						</div><isindex id="lbllname"></isindex>
					 					</div>
					 					<?php 
					 					$selcountry="select * from tblcountry";
					 					$rscountry=mysqli_query($con,$selcountry) or die(mysqli_error($con));
					 					?>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Country</span>
					 						<div class="pf-field">
					 							<select onchange="getState(this.value);" name="optcountry" id="optcountry" required="true" class="form-control" >
													<?php
					 								while($rescountry=mysqli_fetch_array($rscountry))
					 								{
					 								?>
													<option value="<?php echo $rescountry["CountryId"]; ?>" <?php if($rescountry["CountryId"]==$res["CountryId"]){ ?> selected="selected"   <?php } ?> ><?php echo $rescountry["CountryName"]; ?></option>
													<?php
													}
													?>
												</select>
					 						</div>
					 					</div>
					 					<?php 
                    $selstate="select * from tblstate where CountryId=".$res["CountryId"];
                    $rsstate=mysqli_query($con,$selstate) or die(mysqli_error($con));
                    ?>					 					
					 					<div class="col-lg-4">
					 						<span >State</span>
					 						<div  id="statediv" >
					 							<select name="optstate" id="optstate" onchange="getCity(this.value)" class="form-control" required="true" >
													<?php 
                            while($resstate=mysqli_fetch_array($rsstate))
                            { 
                          ?>
                            <option value="<?php echo $resstate['StateId']; ?>" <?php if($resstate["StateId"]==$res["StateId"]){ ?> selected="selected"   <?php } ?> ><?php echo $resstate['StateName']; ?></option>
                          <?php 
                            }
                           ?>
												</select>
					 						</div>
					 					</div>
					 					<?php 
                    $selcity="select * from tblcity where StateId=".$res["StateId"];
                    $rscity=mysqli_query($con,$selcity) or die(mysqli_error($con));
                    ?>
					 					<div class="col-lg-4">
					 						<span>City</span>
					 						<div id="citydiv">
					 							<select name="optcity" id="optcity" class="form-control" required="true">
                          <?php while($rescity=mysqli_fetch_array($rscity)) 
                          { ?>
                        <option value="<?php echo $rescity['CityId']; ?>" <?php if($rescity["CityId"]==$res["CityId"]){ ?> selected="selected"   <?php } ?> ><?php echo $rescity['CityName'];?></option>
                        <?php } ?>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Date Of Birth</span>
					 						<div class="pf-field">
					 							<input type="date" name="txtusrdob" id="txtusrdob" required="true" value="<?php echo $res["Dob"]; ?>" onblur="return ValidateAge('txtusrdob','txtusrdob');" />
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Pincode</span>
					 						<div class="pf-field">
					 							<input type="text" name="txtusrpin" id="txtusrpin" required="true" value="<?php echo $res["Pincode"]; ?>" onkeypress="return NumbersOnly(event);"  onblur="return ValidateControl('txtusrpin','lblpin','Pincode');" />
					 						</div><isindex id="lblpin"></isindex>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Resume</span>
					 						<div>
					 							<input type="file" name="txtresume"  />
					 						</div>
					 					</div>					 					
					 					<div class="col-lg-12">
					 						<button class="btnmain" type="submit" name="btnupdateprofile" onclick="return frmValidate();" >Update</button>
					 					</div>
					 				</div>

					 			<?php } ?>





					 			<?php if(isset($_REQUEST["usrupedu"])){ 
					 				$seluserqua="select * from tbluserqualification where UserQualificationId=".$_REQUEST["usrupedu"];
									$rsuserqua=mysqli_query($con,$seluserqua) or die(mysqli_error($con));
									$resuserqua=mysqli_fetch_array($rsuserqua);
					 				?>
					 				<div class="row" style="margin-left: 10px;">
					 					<div class="col-lg-4">
					 						<span class="pf-title">Degree</span>
					 						<div class="pf-field">
					 							<input type="text" name="txtdeg" id="txtdeg" value="<?php echo $resuserqua["Degree"]; ?>" onblur="return validnamelen('txtdeg','lbldegree','Degree');"  />
					 						</div><isindex id="lbldegree"></isindex>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Specialization</span>
					 						<div class="pf-field">
					 							<input type="text" name="txtspec" id="txtspec" value="<?php echo $resuserqua["Specialization"]; ?>" onblur="return validnamelen('txtspec','lblspec','Specialization');" />
					 						</div><isindex id="lblspec"></isindex>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Passing Year</span>
					 						<div class="pf-field">
					 							<input type="text" name="txtpassingyear" id="txtpassingyear" value="<?php echo $resuserqua["PassingYear"]; ?>" maxlength="4" onkeypress="return NumbersOnly(event);" onblur="return ValidateControl('txtpassingyear','lblpassing','Passing Year');" minlength="4" />
					 						</div><isindex id="lblpassing" ></isindex>
					 					</div>
					 					<?php 
					 					$seluniversity="select * from tbluniversity";
					 					$rsuniversity=mysqli_query($con,$seluniversity) or die(mysqli_error($con));
					 					?>
					 					<div class="col-lg-4">
					 						<span class="pf-title">University</span>
					 						<div class="pf-field">
					 							<select name="optuniversity" class="chosen">
													<?php
					 								while($resuniversity=mysqli_fetch_array($rsuniversity))
					 								{
					 								?>
													<option value="<?php echo $resuniversity["UniversityId"]; ?>" <?php if($resuniversity["UniversityId"]==$resuserqua["UniversityId"]){ ?> selected="selected" <?php } ?> ><?php echo $resuniversity["UniversityName"]; ?></option>
													<?php
													}
													?>
												</select>
					 						</div>
					 					</div>

					 					<?php 
					 					$selstream="select * from tblstream";
					 					$rsstream=mysqli_query($con,$selstream) or die(mysqli_error($con));
					 					?>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Stream</span>
					 						<div class="pf-field">
					 							<select name="optstream" class="chosen">
													<?php
					 								while($resstream=mysqli_fetch_array($rsstream))
					 								{
					 								?>
													<option value="<?php echo $resstream["StreamId"]; ?>" <?php if($resstream["StreamId"]==$resuserqua["StreamId"]){ ?> selected="selected" <?php } ?> ><?php echo $resstream["StreamName"]; ?></option>
													<?php
													}
													?>
												</select>
					 						</div>
					 					</div>

					 					<div class="col-lg-12">
					 						<button class="btnmain" type="submit" name="btnupdateprofile" onclick="return frmValidateedu();">Update</button>
					 					</div>


					 				</div>

					 			<?php } ?>


					 			<?php if(isset($_REQUEST["usrupwork"])){ 
					 				$seluserexp="select * from tbluserexperience where UserExperienceId=".$_REQUEST["usrupwork"];
									$rsuserexp=mysqli_query($con,$seluserexp) or die(mysqli_error($con));
									$resuserexp=mysqli_fetch_array($rsuserexp);
					 			?>
					 			<div class="row" style="margin-left: 10px;">
					 				<div class="col-lg-4">
					 						<span class="pf-title">Organization Name</span>
					 						<div class="pf-field">
					 							<input type="text" name="txtorgname" id="txtorgname" value="<?php echo $resuserexp["OrganizationName"]; ?>" onblur="return ValidateControl('txtorgname','lblorg','Organization Name');"  />
					 						</div><isindex id="lblorg" ></isindex>
					 				</div>
					 				<div class="col-lg-4">
					 						<span class="pf-title">Job Period</span>
					 						<div class="pf-field">
					 							<input type="text" name="txtjobperiod" id="txtjobperiod" value="<?php echo $resuserexp["JobPeriod"]; ?>" onblur="return ValidateControl('txtjobperiod','lbljobperiof','Job Period');" />
					 						</div><isindex id="lbljobperiof" ></isindex>
					 				</div>
					 				<div class="col-lg-4">
					 						<span class="pf-title">Designation</span>
					 						<div class="pf-field">
					 							<input type="text" name="txtworkdeg" id="txtworkdeg" onblur="return ValidateControl('txtworkdeg','lbljobdesig','Designation');" value="<?php echo $resuserexp["Designation"]; ?>" />
					 						</div><isindex id="lbljobdesig" ></isindex>
					 				</div>
					 				<div class="col-lg-12">
					 						<span class="pf-title">Reason For Leaving</span>
					 						<div class="pf-field">
					 							<textarea id="txtresleav" name="txtresleav" id="txtresleav" onblur="return ValidateControl('txtresleav','lbljobreason','Reason');"  ><?php echo $resuserexp["ReasonForLeaving"]; ?></textarea>
					 						</div><isindex id="lbljobreason" ></isindex>
					 				</div>
					 				<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea name="txtworkdes"><?php echo $resuserexp["Description"]; ?></textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<button class="btnmain" type="submit" name="btnupdateprofile" onclick="return frmValidateworkandexp();">Update</button>
					 					</div>
					 			</div>
					 			<?php } ?>

					 			<?php if(isset($_REQUEST["usrupskill"])){ 
					 				$seluserskill="select * from tbluserskill where UserSkillId=".$_REQUEST["usrupskill"];
									$rsuserskill=mysqli_query($con,$seluserskill) or die(mysqli_error($con));
									$resuserskill=mysqli_fetch_array($rsuserskill);
					 			?>
					 			<div class="row" style="margin-left: 10px;" >
					 				<div class="col-lg-6">
					 						<span class="pf-title">Experience</span>
					 						<div class="pf-field">
					 							<input type="text" id="txtskillexp" name="txtskillexp"  value="<?php echo $resuserskill["Experience"]; ?>" onblur="return ValidateControl('txtskillexp','lblskillexp','Experience');" />
					 						</div><isindex id="lblskillexp" ></isindex>
					 				</div>
					 				<div class="col-lg-6">
					 						<span class="pf-title">Designation</span>
					 						<div class="pf-field">
					 							<input type="text" name="txtskilldes" id="txtskilldes" value="<?php echo $resuserskill["Designation"]; ?>" onblur="return ValidateControl('txtskilldes','lblskilldesg','Designation');" />
					 						</div><isindex id="lblskilldesg" ></isindex>
					 				</div>

					 				<?php 
					 					$selskill="select * from tblskill";
					 					$rsskill=mysqli_query($con,$selskill) or die(mysqli_error($con));
					 					?>
					 					<div class="col-lg-8">
					 						<span class="pf-title">Skill</span>
					 						<div class="pf-field">
					 							<select name="optskill" required="true" class="chosen">
													<?php
					 								while($resskill=mysqli_fetch_array($rsskill))
					 								{
					 								?>
													<option value="<?php echo $resskill["SkillId"]; ?>" <?php if($resskill["SkillId"]==$resuserskill["SkillId"]){ ?> selected="selected" <?php } ?> ><?php echo $resskill["SkillName"]; ?></option>
													<?php
													}
													?>
												</select>
					 						</div>
					 					</div>

					 				<div class="col-lg-12">
					 						<button class="btnmain" type="submit" name="btnupdateprofile" onclick="return frmValidateskill();">Update</button>
					 					</div>
					 			</div>
								<?php } ?>	

								<?php if(isset($_REQUEST["usrupcerti"])){ 
					 				$selusercerti="select * from tblusercertification where UserCertificationId=".$_REQUEST["usrupcerti"];
									$rsusercerti=mysqli_query($con,$selusercerti) or die(mysqli_error($con));
									$resusercerti=mysqli_fetch_array($rsusercerti);
					 			?>
					 			<div class="row" style="margin-left: 10px;">
					 				<div class="col-lg-4">
					 						<span class="pf-title">Certification Name</span>
					 						<div class="pf-field">
					 							<input type="text" id="txtcertiname" name="txtcertiname"  value="<?php echo $resusercerti["CertificationName"]; ?>" onblur="return ValidateControl('txtcertiname','lblcertiname','Certification Name');" />
					 						</div><isindex id="lblcertiname" ></isindex>
					 				</div>
					 				<div class="col-lg-4">
					 						<span class="pf-title">Passing Year</span>
					 						<div class="pf-field">
					 							<input type="text" id="txtcertiyr" name="txtcertiyr"  value="<?php echo $resusercerti["Year"]; ?>" maxlength="4" onkeypress="return NumbersOnly(event);" onblur="return ValidateControl('txtcertiyr','lblcetipassyear','Passing Year');" minlength="4" />
					 						</div><isindex id="lblcetipassyear" ></isindex>
					 				</div>
					 				<div class="col-lg-4">
					 						<span class="pf-title">Result</span>
					 						<div class="pf-field">
					 							<input type="text" id="txtcertiresult" name="txtcertiresult"  value="<?php echo $resusercerti["Result"]; ?>" onblur="return ValidateControl('txtcertiresult','lblcertiresult','Certification Result');" />
					 						</div><isindex id="lblcertiresult" ></isindex>
					 				</div>
					 				<div class="col-lg-8">
					 						<span class="pf-title">Certificate File</span>
					 						<div class="pf-field">
					 							<input type="file" name="txtcertifile"  />
					 						</div>
					 					</div>
					 				<div class="col-lg-12">
					 						<button class="btnmain" type="submit" name="btnupdateprofile" onclick="return frmValidatecerti();">Update</button>
					 					</div>
					 			</div>
					 			<?php } ?>





					 			</form>
					 		</div>
					 		




					 		<div class="contact-edit">
					 		</div>




					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>

	<?php include_once "usrfooter.php"; ?>

</div>

<div class="profile-sidebar">
	<span class="close-profile"><i class="la la-close"></i></span>
	<div class="can-detail-s">
		<div class="cst"><img src="images/resource/es1.jpg" alt="" /></div>
		<h3>David CARLOS</h3>
		<span><i>UX / UI Designer</i> at Atract Solutions</span>
		<p><a href="https://grandetest.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="99faebfcf8edf0effcf5f8e0fcebeaa9a1a1d9fef4f8f0f5b7faf6f4">[email&#160;protected]</a></p>
		<p>Member Since, 2017</p>
		<p><i class="la la-map-marker"></i>Istanbul / Turkey</p>
	</div>
	<div class="tree_widget-sec">
		<ul>
			<li class="inner-child active">
				<a href="#" title=""><i class="la la-file-text"></i>My Profile</a>
				<ul style="display: block;">
					<li><a href="#" title="">My Profile</a></li>
					<li><a href="#" title="">Social Network</a></li>
					<li><a href="#" title="">Contact Information</a></li>
				</ul>
			</li>
			<li class="inner-child">
				<a href="#" title=""><i class="la la-briefcase"></i>My Resume</a>
				<ul>
					<li><a href="#" title="">Education</a></li>
					<li><a href="#" title="">Work Experience</a></li>
					<li><a href="#" title="">Portfolio</a></li>
					<li><a href="#" title="">Professional Skills</a></li>
					<li><a href="#" title="">Awards</a></li>
				</ul>
			</li>
			<li class="inner-child">
				<a href="#" title=""><i class="la la-money"></i>Shorlisted Job</a>
				<ul>
					<li><a href="#" title="">My Profile</a></li>
					<li><a href="#" title="">Social Network</a></li>
					<li><a href="#" title="">Contact Information</a></li>
				</ul>
			</li>
			<li class="inner-child">
				<a href="#" title=""><i class="la la-paper-plane"></i>Applied Job</a>
				<ul>
					<li><a href="#" title="">My Profile</a></li>
					<li><a href="#" title="">Social Network</a></li>
					<li><a href="#" title="">Contact Information</a></li>
				</ul>
			</li>
			<li class="inner-child">
				<a href="#" title=""><i class="la la-user"></i>Job Alerts</a>
				<ul>
					<li><a href="#" title="">My Profile</a></li>
					<li><a href="#" title="">Social Network</a></li>
					<li><a href="#" title="">Contact Information</a></li>
				</ul>
			</li>
			<li class="inner-child">
				<a href="#" title=""><i class="la la-file-text"></i>Cv & Cover Letter</a>
				<ul>
					<li><a href="#" title="">My Profile</a></li>
					<li><a href="#" title="">Social Network</a></li>
					<li><a href="#" title="">Contact Information</a></li>
				</ul>
			</li>
			<li class="inner-child">
				<a href="#" title=""><i class="la la-flash"></i>Change Password</a>
				<ul>
					<li><a href="#" title="">My Profile</a></li>
					<li><a href="#" title="">Social Network</a></li>
					<li><a href="#" title="">Contact Information</a></li>
				</ul>
			</li>
			<li><a href="#" title=""><i class="la la-unlink"></i>Logout</a></li>
		</ul>
	</div>
</div><!-- Profile Sidebar -->

<?php include_once "usrprofilesidebar.php"; ?>


<?php include_once "loadjs.php"; ?>


</body>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/candidates_profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:46 GMT -->
</html>
<?php
}
else
{
	header('location:index.php');
}
?>
