<?php
if(isset($_SESSION["usrid"]))
{
  $usrid=$_SESSION["usrid"];
?>
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
?>
<div class="profile-sidebar">
	<span class="close-profile"><i class="la la-close"></i></span>
	<div class="can-detail-s">
		<div class="cst"><img src="user/userimg/<?php echo $usrimg; ?>" alt="" /></div>
		<h3><?php echo $res["FirstName"]; ?> <?php echo $res["MiddleName"]; ?> <?php echo $res["LastName"]; ?></h3>
		<p><?php echo $res["EmailId"]; ?></p>
		<?php
				 					$selstate="select * from tblstate where StateId=".$res["StateId"];
									$rsstate=mysqli_query($con,$selstate) or die(mysqli_error($con));
									$resstate=mysqli_fetch_array($rsstate);
				 				?>
				 				<?php
				 					$selcon="select * from tblcountry where CountryId=".$res["CountryId"];
									$rscon=mysqli_query($con,$selcon) or die(mysqli_error($con));
									$rescon=mysqli_fetch_array($rscon);
				 				?>
				 				<p><i class="la la-map-marker"></i><?php if(!is_null($resstate["StateName"]) ) { echo $resstate["StateName"]; }  ?>  <?php if(!is_null($rescon["CountryName"]) ) { echo "/ "; echo $rescon["CountryName"]; }  ?></p>
	</div>
	<div class="tree_widget-sec">
		<ul>
	<li><a href="usrprofile.php"><i class="la la-money">		</i>My Profile</a></li>
	<li><a href="usrappliedjobs.php"><i class="la la-briefcase">		</i>Applied Jobs</a></li>
	<li><a href="usrshortlistedjob.php"><i class="la la-paper-plane">				</i>Shortlisted Jobs</a></li>
	<li><a href="usrreview.php"><i class="la la-flash">					</i>Review</a></li>
	<li><a href="usrchangepassword.php"><i class="la la-lock">			</i>Change Password</a></li>
	<li><a href="usrlogout.php"><i class="la la-unlink">		</i>Logout</a></li>
</ul>
	</div>
</div><!-- Profile Sidebar -->
<?php
}
else
{
	header('location:index.php');
}
?>