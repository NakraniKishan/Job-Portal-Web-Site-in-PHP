<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:12 GMT -->
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
	<script type="text/javascript">
		function ValidatePwd(ControlID,LabelID,Message)
{
  var Patteren = /^[0-9A-Za-z]{8,}$/;
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
     document.getElementById(LabelID).innerHTML = "* Please enter minimum 8 digit and character only";
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
      if(document.getElementById("txtpassusr").value=="")
      {
        Msg +="Enter New Password";
      }
      if(document.getElementById("txtconpassusr").value=="")
      {
        Msg +="\nEnter Confirm Password";
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
	if(isset($subusrnewpass))
  {
    $enrecover=$_REQUEST["fpcode"];
    $derecover=base64_decode($enrecover);
    $newpassword=$txtpassusr;
    $oldpassword=$txtconpassusr;
    if($oldpassword==$newpassword)
    {
      $final=base64_encode($oldpassword);
      $inspass="update tbluser set Password='".$final."' where EmailId='".$derecover."' ";
      //echo $inspass;
      mysqli_query($con,$inspass) or die(mysqli_error($con));
      header('location:index.php');
    }
    else
    {
      $wrong="Password Doesn't Match";
    }
  }
?>
<body>

<div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div>

<div class="theme-layout" id="scrollup">
	
	<div class="responsive-header">
		<div class="responsive-menubar">
			<div class="res-logo" style="margin-left:-20px;"><a href="index.html" title=""><img src="images/resource/JOBsaware2.png" alt="" style="height:45px;" /></a></div>
			
		</div>
		<div class="responsive-opensec">
			
			
			
		</div>
	</div>
	
	<header class="gradient">
		<div class="menu-sec">
			<div class="container">
				<div class="logo">
					<a href="index.html" title=""><img src="images/resource/JOBsaware2.png" style="height:45px;margin-top:-5px;" alt="" /></a>
				</div><!-- Logo -->
				
				<nav>
					<ul>
								
						
						
						
						
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
								<h3> Jobseeker Reset Password</h3>
							</div>
							<div class="page-breacrumbs">
								<ul class="breadcrumbs">
									
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
						<div class="account-popup-area signin-popup-box static">
							<div class="account-popup">
								<form method="Post">
									<div class="cfield">
										<input type="password" name="txtpassusr" required="true" id="txtpassusr" placeholder="Password" onblur="return ValidatePwd('txtpassusr','newpass','New Password');" />
										<i class="la la-key"></i>
									</div>
									<i id="newpass"><?php if(isset($wrong)){ echo $wrong; } ?></i>
									<div class="cfield">
										<input type="password" name="txtconpassusr" required="true" id="txtconpassusr" placeholder="Confirm Password" onblur="ValidatePassword('txtpassusr','txtconpassusr','oldpass');" />
										<i class="la la-key"></i>
									</div>
									<i id="oldpass"> </i>
									<button type="submit" name="subusrnewpass" onclick="return frmValidate()">Submit</button>
								</form>
								
							</div>
						</div><!-- LOGIN POPUP -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include_once "visfooter.php"; ?>

</div>


<?php include_once "loadjs.php"; ?>

</body>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:12 GMT -->
</html>

