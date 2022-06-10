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
?>
<div class="responsive-header">
		<div class="responsive-menubar">
			<div class="res-logo" style="margin-left:-20px;"><a ><img src="images/resource/JOBsaware2.png" style="height:45px;" alt="" /></a></div>
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
			</div>
			<div class="responsivemenu">
				<ul>
						<li><a href="usrdashboard.php" title="">Home</a></li>
						<!-- <li><a href="usremployer.php" title="">Employers</a></li> -->
						<li><a href="usrcompany.php" title="">Organization</a></li>
						<li class="menu-item-has-children">
							<a> JobsAware</a>
							<ul>
								<li><a href="usrprofile.php"> My Profile </a></li>
								<!-- <li><a href="blog_list2.html"> Create Resume </a></li> -->
								<li><a href="usrappliedjobs.php"> Applied Jobs </a></li>
								<li><a href="usrshortlistedjob.php"> Shortlisted Jobs </a></li>
								<li><a href="usrcallforinterview.php"> Scheduled Interview </a></li>
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
	
	<header class="stick-top forsticky" >
		<div class="menu-sec">
			<div class="container">
				<div class="logo" style="margin-left: -20px;">
					<a>
						<img class="hidesticky" src="images/resource/JOBsaware2.png" style="height:45px;margin-top:-5px;" alt="" />
						<img class="showsticky" src="images/resource/JOBsaware1.png" style="height:45px;margin-top:-5px;" alt="" /></a>
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
							<a> JobsAware</a>
							<ul>
								<li><a href="usrprofile.php"> My Profile </a></li>
								<!-- <li><a href="blog_list2.html"> Create Resume </a></li> -->
								<li><a href="usrappliedjobs.php"> Applied Jobs </a></li>
								<li><a href="usrshortlistedjob.php"> Shortlisted Jobs </a></li>
								<li><a href="usrcallforinterview.php"> Scheduled Interview </a></li>
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