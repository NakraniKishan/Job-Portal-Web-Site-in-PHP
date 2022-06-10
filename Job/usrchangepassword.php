<?php
session_start();
if(isset($_SESSION["usrid"]))
{
  $usrid=$_SESSION["usrid"];
?>
<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/employer_change_password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:32 GMT -->
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
      if(document.getElementById("txtoldpass").value=="")
      {
        Msg +="Please Enter Old Password";
      }
      if(document.getElementById("txtnewpass").value=="")
      {
        Msg +="\nPlease Enter New Password";
      }
      if(document.getElementById("txtconnewpass").value=="")
      {
        Msg +="\nPlease Enter Confirm Password";
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
$fname=$res["FirstName"];
$mname=$res["MiddleName"];
$lname=$res["LastName"];
$tblpass=$res["Password"];
if(isset($btnupdate))
{
		$old=$_POST["txtoldpass"];
      	$old=base64_encode($old);
      	$pass=$_POST["txtnewpass"];
      	$final=$_POST["txtconnewpass"];
      	if($tblpass==$old)
      	{
        	if($pass==$final)
        	{
          	$final=base64_encode($final);
          	$inspass="update tbluser set Password='".$final."' where UserId=$usrid";
          	//echo $inspass;
          	mysqli_query($con,$inspass) or die(mysqli_error($con));
          	header('location:usrchangepassword.php');
        	}
	        else 
	        {
	          $newpas="New Password Does't Match - Please Try Again ";  
	        }
      }
      else
      {
        $oldpass="Old Password Does't Match - Please Try Again ";
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
							<h3><?php echo $fname; ?> <?php echo $mname; ?> <?php echo $lname; ?> </h3>
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
					 		<div class="manage-jobs-sec">
					 			<h3>Change Password</h3>
						 		<div class="change-password">
						 			<form class="needs-validation" method="post">
						 				<div class="row">
						 					<div class="col-lg-6">
						 						<span class="pf-title">Old Password</span>
						 						<div class="pf-field">
						 							<input type="password" required="true" name="txtoldpass" autofocus="" onblur="return ValidateControl('txtoldpass','lblinvalid','Old Password');" id="txtoldpass" />
						 							<isindex id="lblinvalid" ><?php if(isset($oldpass)){ echo $oldpass; } 
                                                 if(isset($newpas)) { echo $newpas;  }  ?></isindex>
						 						</div>
						 						
						 						<span class="pf-title">New Password</span>
						 						<div class="pf-field">
						 							<input type="password" required="true" name="txtnewpass" onblur="return ValidatePwd('txtnewpass','lblnewinvalid','New Password');" id="txtnewpass" />
						 							<isindex id="lblnewinvalid" ></isindex>
						 						</div>
						 						<span class="pf-title">Confirm Password</span>
						 						<div class="pf-field">
						 							<input type="password" required="true" name="txtconnewpass" onblur="ValidatePassword('txtnewpass','txtconnewpass','lbloldinvalid');" id="txtconnewpass" />
						 							<isindex id="lbloldinvalid" ></isindex>
						 						</div>
						 						<button type="submit" name="btnupdate" onclick="return frmValidate();">Update</button>
						 					</div>
						 					<div class="col-lg-6">
						 						<i class="la la-key big-icon"></i>
						 					</div>
						 				</div>
						 			</form>
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


<?php include_once "usrprofilesidebar.php"; ?>


<?php include_once "loadjs.php"; ?>

</body>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/employer_change_password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:32 GMT -->
</html>
<?php
}
else
{
	header('location:index.php');
}
?>

