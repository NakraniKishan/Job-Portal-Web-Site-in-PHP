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
	<link rel="stylesheet" href="style.css">
	<!-- Styles -->
	<?php 
	session_start();
	include_once "loadcss.php"; ?>
	
</head>
<body>

<?php
$con=mysqli_connect("localhost","root","","job");
extract($_REQUEST);
	if(isset($_REQUEST['btnsubmit']))
	{
		$pass=base64_encode($txtpass);
		//echo $pass;
		$name=$_REQUEST["txtlogin"];
		$sel="select * from tblemployer where EmailId='$name' and Password='$pass'";
		$rs=mysqli_query($con,$sel) or die(mysqli_error($con));
   		$count=mysqli_num_rows($rs);

	   	if($count==1)
    	{
    		$cntrows=mysqli_fetch_array($rs);
        	if($cntrows["IsActive"]==0)
        	{    
           		echo "<script>alert('You Are Blocked By The Administrator.');</script>";
        	}
        	else 
        	{
        		if($cntrows["IsVerified"]==1)
           		{
		            $_SESSION["empid"]=$cntrows["EmployerId"];
		            $_SESSION["empname"]=$cntrows["FirstName"]." ".$cntrows["LastName"];          
		            echo $_SESSION["empid"];
		            echo $_SESSION["empname"];

		           	header("location:empdashboard.php");
        		}
        		else
        		{
        			echo "<script>alert('You Are Not Verified With Your Account.');</script>";
        		}
        	}        
    	}
    	else
    	{
        	echo "<script>alert('Username or Passsword is Wrong.');</script>";
    	}
	}
if(isset($_REQUEST["fpcodeemp"]))
{
    $derecover=base64_decode($_REQUEST["fpcodeemp"]);
	$verup="update tblemployer set IsVerified=1 where EmailId='".$derecover."' ";
	mysqli_query($con,$verup) or die(mysqli_error($con));
	echo $verup;
	$verifymessage="You Have Successfully Verified Your Email Now You Can Login To Your Account.";
	//echo $verifymessage;
	header('location:visemplogin.php');
}
?>
<div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div>

<div class="theme-layout" id="scrollup">
	
	<div class="responsive-header">
		<div class="responsive-menubar">
			<div class="res-logo" style="margin-left:-20px;"><a href="index.html" title=""><img src="images/resource/JOBsaware2.png" alt="" style="height:45px;" /></a></div>
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
			</div><!-- Btn Extras -->
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
							<a href="viscompany.php" title="">Organization</a>
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
								<h3> Employer Login</h3>
							</div>
							<div class="page-breacrumbs">
								<ul class="breadcrumbs">
									<li><a href="visuserlogin.php">Login As JobSeeker</a></li>
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
								<form>
									<div class="cfield">
										<input type="email" placeholder="Email" name="txtlogin" />
										<i class="la la-user"></i>
									</div>
									<div class="cfield">
										<input type="password" placeholder="********" name="txtpass" />
										<i class="la la-key"></i>
									</div>
									<a href="visempforgot.php" title="">Forgot Password?</a>
									<button type="submit" name="btnsubmit" class="bubbly-button" style="width: 120px;">Login</button>
								</form>
								<div class="extra-login" style="margin-top: -40px;">
									<span>Or</span>
									<div>
										<a href="visempregistration.php">Not a member as yet? Register Now </a>
									</div>
								</div>
							</div>
						</div><!-- LOGIN POPUP -->
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include_once "visfooter.php"; ?>

</div>

<script  src="indexbtn.js"></script>
<?php include_once "loadjs.php"; ?>

</body>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:12 GMT -->
</html>

