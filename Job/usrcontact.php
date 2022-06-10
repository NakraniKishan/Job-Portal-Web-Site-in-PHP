<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:09 GMT -->
<head>
	<link rel="shortcut icon" type="image/x-icon" href="fevicon.png">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Jobs Aware</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">

	<!-- Styles -->
	<?php session_start(); include_once "loadcss.php"; ?>
	
</head>
<body>
	<?php
if(isset($_SESSION["usrid"]))
{
$usrid=$_SESSION["usrid"];
$con=mysqli_connect("localhost","root","","job");
extract($_REQUEST);
$pandingcnt=0;
$selusr="select * from tbluser where UserId=".$_SESSION["usrid"];
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

if(is_null($res["Dob"]))
{
	$pandingcnt++;
}
if(is_null($res["Pincode"]))
{
	$pandingcnt++;
}
if(is_null($res["UserPhoto"]))
{
	$pandingcnt++;
}
if(is_null($res["ResumeFile"]))
{
	$pandingcnt++;
}

$flag=1;
$selusrqua="select * from tbluserqualification where UserId=".$_SESSION["usrid"];
$rsqua=mysqli_query($con,$selusrqua) or die(mysqli_error($con));
//$resqua=mysqli_num_rows($rsqua) or die(mysqli_error($con));
while($resqua=mysqli_fetch_array($rsqua))
{
	$flag=0;
}
if($flag==1)
{
	$pandingcnt++;
}

$flagskill=1;
$selusrskill="select * from tbluserskill where UserId=".$_SESSION["usrid"];
$rsskill=mysqli_query($con,$selusrskill) or die(mysqli_error($con));
//$resqua=mysqli_num_rows($rsqua) or die(mysqli_error($con));
while($resskill=mysqli_fetch_array($rsskill))
{
	$flagskill=0;
}
if($flagskill==1)
{
	$pandingcnt++;
}

$flagexp=1;
$desexp=0;
$selusrexp="select * from tbluserexperience where UserId=".$_SESSION["usrid"];
$rsexp=mysqli_query($con,$selusrexp) or die(mysqli_error($con));
//$resqua=mysqli_num_rows($rsqua) or die(mysqli_error($con));
while($resexp=mysqli_fetch_array($rsexp))
{
	$flagexp=0;
	if(is_null($resexp["Description"]) or $resexp["Description"]=="" )
	{
		$desexp=$desexp+1;
	}
}
if($flagexp==1)
{
	$pandingcnt++;
}
$pandingcnt=$pandingcnt+$desexp;
$flagcerti=1;
$certifile=0;
$selusrcerti="select * from tblusercertification where UserId=".$_SESSION["usrid"];
$rscerti=mysqli_query($con,$selusrcerti) or die(mysqli_error($con));
//$resqua=mysqli_num_rows($rsqua) or die(mysqli_error($con));
while($rescerti=mysqli_fetch_array($rscerti))
{
	$flagcerti=0;
	if(is_null($rescerti["FileUrl"]) or $rescerti["FileUrl"]=="" )
	{
		$certifile=$certifile+1;
	}
}
if($flagcerti==1)
{
	$pandingcnt++;
}
$pandingcnt=$pandingcnt+$certifile;


//echo $resqua;
//echo $pandingcnt;

}



if(isset($txtsendinq))
{
	$selforinq="select * from tbluser where UserId=".$_SESSION["usrid"];
	 	$rsforinq=mysqli_query($con,$selforinq) or die(mysqli_error($con));
	 	$resforinq=mysqli_fetch_array($rsforinq);
	 	$personf=$resforinq["FirstName"];
	 	$personm=$resforinq["MiddleName"];
	 	$personl=$resforinq["LastName"];
	 	$pername=$personf." ".$personm." ".$personl;
	 	$peremail=$resforinq["EmailId"];
	 	//echo $pername;
	 	$insinq="insert into tblinquiry values(null,'$pername','$peremail','$txtsub','$txtdes',null,now(),0,null,null,null,null)";
	 	//echo $insinq;
	 	mysqli_query($con,$insinq) or die(mysqli_error($con));
	 	header('location:usrcontact.php');
	//$insinq="insert into tblinquiry values(null,)";
}
?>

<div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div>

<div class="theme-layout" id="scrollup">
	
	<div class="responsive-header">
		<div class="responsive-menubar">
			<div class="res-logo" style="margin-left:-20px;"><a><img src="images/resource/JOBsaware2.png" alt="" style="height:45px;" /></a></div>
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
				<ul class="account-btns">
					<li ><a href="usrchangepassword.php"><i class="la la-key"></i> Change Password</a></li>
					<li ><a href="usrlogout.php"><i class="la la-external-link-square"></i> Log Out</a></li>
				</ul>
			</div><!-- Btn Extras -->
			<div class="responsivemenu">
				<ul>
						<li><a href="usrdashboard.php" title="">Home</a></li>
						<!-- <li><a href="usremployer.php" title="">Employers</a></li> -->
						<li><a href="usrcompany.php" title="">Organization</a></li>
						<li class="menu-item-has-children">
							<a> My JobsAware</a>
							<ul>
								<li><a href="usrprofile.php"> My Profile </a></li>
								<!-- <li><a href="blog_list2.html"> Create Resume </a></li> -->
								<li><a href="usrappliedjobs.php"> Applied Jobs </a></li>
								<li><a href="usrshortlistedjob.php"> Shortlisted Jobs </a></li>
								<li><a href="usrreview.php"> Give Review </a></li>
							</ul>
						</li>
						<li class="menu-item-has-children">
							<a>Notification</a>
							<ul>
								<li><a href="usrprofile.php">Panding Action <span class="pull-right-container">
										<small class="label pull-right bg-yellow" style="font-size: 13px;">
											<?php echo $pandingcnt; ?>
										</small>
									</span></a></li>
							</ul>
						</li>
						
					</ul>
			</div>
		</div>
	</div>
	
	<header class="gradient">
		<div class="menu-sec">
			<div class="container">
				<div class="logo" style="margin-left: -20px;">
					<a><img src="images/resource/JOBsaware2.png" alt="" style="height:45px;margin-top:-5px;" /></a>
				</div><!-- Logo -->
				<div class="btn-extars">
					<ul class="account-btns">
						<li ><a href="usrchangepassword.php"><i class="la la-key"></i> Change Password</a></li>
						<li ><a href="usrlogout.php"><i class="la la-external-link-square"></i> Log Out</a></li>
					</ul>
				</div>
				<div class="my-profiles-sec">
					<span><img src="user/userimg/<?php echo $usrimg; ?>" alt="" style="width: 52px; height: 50px;" /></span>
				</div><!-- Btn Extras -->
				<nav>
					<ul>
						<li><a href="usrdashboard.php" title="">Home</a></li>
						<!-- <li><a href="usremployer.php" title="">Employers</a></li> -->
						<li><a href="usrcompany.php" title="">Organization</a></li>
						<li class="menu-item-has-children">
							<a>My JobsAware</a>
							<ul>
								<li><a href="usrprofile.php"> My Profile </a></li>
								<!-- <li><a href="blog_list2.html"> Create Resume </a></li> -->
								<li><a href="usrappliedjobs.php"> Applied Jobs </a></li>
								<li><a href="usrshortlistedjob.php"> Shortlisted Jobs </a></li>
								<li><a href="usrreview.php"> Give Review </a></li>
							</ul>
						</li>
						<li class="menu-item-has-children">
							<a>Notification</a>
							<ul>
								<li><a href="usrprofile.php">Panding Action 
								
									<span class="pull-right-container">
										<small class="label pull-right bg-yellow" style="font-size: 13px;">
											<?php echo $pandingcnt; ?>
										</small>
									</span>
									</a>
								</li>
							</ul>
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
								<h3>Contact</h3>
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block">
			<div class="container">
				 <div class="row">
				 	<div class="col-lg-6 column">
				 		<div class="contact-form">
				 			<h3>Keep In Touch</h3>
				 			<form>
				 				<div class="row">
				 					
				 					<div class="col-lg-12">
				 						<span class="pf-title">Subject</span>
				 						<div class="pf-field">
				 							<input type="text" name="txtsub" required="true" placeholder="" />
				 						</div>
				 					</div>
				 					<div class="col-lg-12">
				 						<span class="pf-title">Message</span>
				 						<div class="pf-field">
				 							<textarea name="txtdes" required="true" ></textarea>
				 						</div>
				 					</div>
				 					<div class="col-lg-12">
				 						<button type="submit" name="txtsendinq">Send</button>
				 					</div>
				 				</div>
				 			</form>
				 		</div>
				 	</div>
				 	<div class="col-lg-6 column">
					 	<div class="contact-textinfo">
					 		<h3>Jobs Aware Office</h3>
					 		<ul>
					 			<li><i class="la la-map-marker"></i><span>JobsAware Office 
Near Jakat Naka, Surat Olpad Road, 
Jahangirpura. 
Surat-5 , Gujarat , INDIA  </span></li>
					 			<li><i class="la la-phone"></i><span>Call Us : 7573062203</span></li>
					 			<!-- <li><i class="la la-envelope-o"></i><span>Email : </span></li> -->
					 		</ul>
					 		
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>

	<?php include_once "usrfooter.php"; ?>

</div>

<div class="account-popup-area signin-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>User Login</h3>
		<span>Click To Login With Demo User</span>
		<div class="select-user">
			<span>Candidate</span>
			<span>Employer</span>
		</div>
		<form>
			<div class="cfield">
				<input type="text" placeholder="Username" />
				<i class="la la-user"></i>
			</div>
			<div class="cfield">
				<input type="password" placeholder="********" />
				<i class="la la-key"></i>
			</div>
			<p class="remember-label">
				<input type="checkbox" name="cb" id="cb1"><label for="cb1">Remember me</label>
			</p>
			<a href="#" title="">Forgot Password?</a>
			<button type="submit">Login</button>
		</form>
		<div class="extra-login">
			<span>Or</span>
			<div class="login-social">
				<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
				<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
			</div>
		</div>
	</div>
</div><!-- LOGIN POPUP -->

<div class="account-popup-area signup-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>Sign Up</h3>
		<div class="select-user">
			<span>Candidate</span>
			<span>Employer</span>
		</div>
		<form>
			<div class="cfield">
				<input type="text" placeholder="Username" />
				<i class="la la-user"></i>
			</div>
			<div class="cfield">
				<input type="password" placeholder="********" />
				<i class="la la-key"></i>
			</div>
			<div class="cfield">
				<input type="text" placeholder="Email" />
				<i class="la la-envelope-o"></i>
			</div>
			<div class="dropdown-field">
				<select data-placeholder="Please Select Specialism" class="chosen">
					<option>Web Development</option>
					<option>Web Designing</option>
					<option>Art & Culture</option>
					<option>Reading & Writing</option>
				</select>
			</div>
			<div class="cfield">
				<input type="text" placeholder="Phone Number" />
				<i class="la la-phone"></i>
			</div>
			<button type="submit">Signup</button>
		</form>
		<div class="extra-login">
			<span>Or</span>
			<div class="login-social">
				<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
				<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
			</div>
		</div>
	</div>
</div><!-- SIGNUP POPUP -->

<?php include_once "usrprofilesidebar.php"; ?>
<?php include_once "loadjs.php"; ?>

</body>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:09 GMT -->
</html>

