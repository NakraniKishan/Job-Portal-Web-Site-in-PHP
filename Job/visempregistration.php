<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:12 GMT -->
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
	<style type="text/css"></style>
	<script type="text/javascript">
	function Validateestablish(ControlID,LabelID,Message)
{
  var Patteren = /^[0-9]{4,4}$/;
  var Pwd = document.getElementById(ControlID).value;
  var len = Pwd.length;
  if(document.getElementById(ControlID).value == "")
   {
      document.getElementById(LabelID).style.display = "inline";
      document.getElementById(LabelID).innerHTML = "* Please Enter " + Message;
      document.getElementById(ControlID).focus();
      return false;
   }
  else if(Patteren.test(Pwd) == false) 
  {
     document.getElementById(LabelID).innerHTML = "* Please Enter Establisment Year";
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
      if(document.getElementById("txtorgname").value=="")
      {
        Msg +="* Please Enter Organization Name";
      }
      if(document.getElementById("txtconpername").value=="")
      {
        Msg +="\n* Please Enter Contact Person Name";
      }
      if(document.getElementById("txtphoneno").value=="")
      {
        Msg +="\n* Please Enter Phone Number";
      }
      if(document.getElementById("txtemail").value=="")
      {
        Msg +="\n* Please Enter Email Address";
      }
      if(document.getElementById("txtestablis").value=="")
      {
        Msg +="\n* Please Enter Establisment Year";
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
session_start();
if(isset($txtsub))
{
	if(isset($_SESSION["orgname"]))
	{
		unset($_SESSION["orgname"]);
	}
	$_SESSION["orgname"]=$txtorgname;
	if(isset($_SESSION["contactperson"]))
	{
		unset($_SESSION["contactperson"]);
	}
	$_SESSION["contactperson"]=$txtconpername;
	if(isset($_SESSION["phonenumber"]))
	{
		unset($_SESSION["phonenumber"]);
	}
	$_SESSION["phonenumber"]=$txtphoneno;
	if(isset($_SESSION["orgmail"]))
	{
		unset($_SESSION["orgmail"]);
	}
	$_SESSION["orgmail"]=$txtemail;
	if(isset($_SESSION["orgadd"]))
	{
		unset($_SESSION["orgadd"]);
	}
	$_SESSION["orgadd"]=$txtadd;
	if(isset($_SESSION["orgestablishyear"]))
	{
		unset($_SESSION["orgestablishyear"]);
	}
	$_SESSION["orgestablishyear"]=$txtestablis;
	header('location:visempregprofile.php');

}
?>
<body>

<!-- <div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div> -->

<div class="theme-layout" id="scrollup">
	
	<div class="responsive-header">
		<div class="responsive-menubar">
			<div class="res-logo" style="margin-left:-20px;"><a href="index.html" title=""><img src="images/resource/JOBsaware2.png" alt="" style="height:45px;"/></a></div>
			<div class="menu-resaction">
				<div class="res-openmenu">
					<img src="images/icon.png" alt="" /> Menu
				</div>
				<div class="res-closemenu">
					<img src="images/icon2.png" alt="" /> Close
				</div>
			</div>
		</div>
		<div class="responsive-opensec">
			<div class="btn-extars">
				<a href="visemplogin.php" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
				<ul class="account-btns">
					<li><a href="visusrregistration.php"><i class="la la-key"></i> Sign Up</a></li>
					<li><a href="visuserlogin.php"><i class="la la-external-link-square"></i> Login</a></li>
				</ul>
			</div>
			<div class="responsivemenu">
				<ul>
						<li>
							<a href="index.php" title="">Home</a>
						</li>
						<li>
							<a href="viscompany.php" title="">Organization</a>
						</li>
				</ul>
			</div>
		</div>
	</div>
	
	<header class="gradient">
		<div class="menu-sec">
			<div class="container">
				<div class="logo">
					<a href="index.html" title=""><img src="images/resource/JOBsaware2.png" alt="" style="height:45px;margin-top:-5px;" /></a>
				</div><!-- Logo -->
				<div class="btn-extars">
					<a href="visemplogin.php" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
					<ul class="account-btns">
						<li><a href="visusrregistration.php"><i class="la la-key"></i> Sign Up</a></li>
						<li><a href="visuserlogin.php"><i class="la la-external-link-square"></i> Login</a></li>
					</ul>
				</div><!-- Btn Extras -->
				<nav>
					<ul>
						<li>
							<a href="index.php" title="">Home</a>
						</li>
						<li>
							<a href="#" title="">Organization</a>
						</li>		
						
						
						
						
					</ul>
				</nav><!-- Menus -->
			</div>
		</div>
	</header>

	<section>
		<div class="block no-padding  gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner2">
							<div class="inner-title2">
								<h3>Register As Employer</h3>
							</div>
							<div class="page-breacrumbs">
								<ul class="breadcrumbs">
									<li><a href="visusrregistration.php" title="">Register As Job Seeker</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block remove-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="account-popup-area signup-popup-box static">
							<div class="account-popup">
								
								<form method="post">


									<div class="cfield"> <input type="text" autofocus=""
									name="txtorgname" id="txtorgname" placeholder="Organization Name"
									maxlength="100" onblur="return ValidateControl('txtorgname','lbltxtorgname','Organization Name');" onkeypress="return CharsOnly(event);" /> <i
									class="la la-user"></i> 
									</div><isindex id="lbltxtorgname" style="color : red;"></isindex>

									<div class="cfield">
										<input type="text" name="txtconpername" maxlength="80" id="txtconpername" onblur="return ValidateControl('txtconpername','lbltxtconpername','Contact Person Name');" onkeypress="return CharsOnly(event);" placeholder="Contact Person Name" />
										<i class="la la-user"></i> 
									</div><isindex id="lbltxtconpername" style="color : red;"></isindex>

									<div class="cfield">
										<input type="text" maxlength="4" minlength="4" id="txtestablis" name="txtestablis"  onblur="return Validateestablish('txtestablis','lbltxtestablisyear','Establisment Year');" onkeypress="return NumbersOnly(event);"  placeholder="Establistment Year" />
										<i class="la la-phone"></i>
									</div><isindex id="lbltxtestablisyear" style="color : red;"></isindex>

									<div class="cfield">
										<input type="text" maxlength="10" minlength="10" id="txtphoneno" name="txtphoneno"   onkeypress="return NumbersOnly(event);" onblur="return LenghtValid();" onblur="return ValidateControl('txtphoneno','lblphpne','Phone Number');" placeholder="Phone Number" />
										<i class="la la-phone"></i>
									</div><isindex id="lblphpne" style="color : red;"></isindex>

									<div class="cfield">
										<input type="email" name="txtemail" id="txtemail" onblur="return ValidateEmailID('txtemail','lblemail');" placeholder="Email" />
										<i class="la la-envelope-o"></i>
									</div><isindex id="lblemail" style="color : red;"></isindex>	

									<div class="cfield">
										<textarea name="txtadd" id="txtadd" onblur="return ValidateControl('txtadd','lbladd','Organization Address');" style="size: -10px;" placeholder="Organization Address"></textarea>
									</div><isindex id="lbladd" style="color : red;"></isindex>

								<button name="txtsub" type="submit" onclick="return frmValidate()">Next ></button>
									
								</form>
								<div class="extra-login">
									<span>Or</span>
									<div>
										<a href="visemplogin.php">Already Registered? Login here </a>
									</div>
								</div>
							</div>
						</div><!-- SIGNUP POPUP -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include_once "visfooter.php"; ?>

</div>



<?php include_once "loadjs.php"; ?>

</body>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:12 GMT -->
</html>

