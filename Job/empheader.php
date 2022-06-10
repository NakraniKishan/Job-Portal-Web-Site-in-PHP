<?php

$con=mysqli_connect("localhost","root","","job");
extract($_REQUEST);

							if(isset($_SESSION['empid']))
							{
								$query="select * from tblemployer where EmployerId=".$_SESSION['empid'];
								$res=mysqli_query($con,$query);
								$resArr=mysqli_fetch_array($res);
								if(is_null($resArr["ImageUrl"]))
								{
									$empimg="download.jpg";
								}
								else
								{
									$empimg=$resArr["ImageUrl"];
								}

							}
$selforbuybtn="select * from tblcompanypackage where EmployerId=".$_SESSION["empid"];
$rsforbuybtn=mysqli_query($con,$selforbuybtn) or die(mysqli_error($con));
$cntforbtn=mysqli_num_rows($rsforbuybtn);
$checkdate = date('Y-m-d');
$tempforbtn=0;
if($cntforbtn>0)
{
while($resforbuybtn=mysqli_fetch_array($rsforbuybtn))
{
	if(($checkdate >= $resforbuybtn["StartDate"]) && ($checkdate <= $resforbuybtn["EndDate"]))
	{
		$tempforbtn=1;
	}  

}
}

$empid=$_SESSION["empid"];
$selforinq="select * from tblinquiry a
 			left join tbljobpost b on a.JobPostId=b.JobPostId 
 			where b.EmployerId=$empid and a.RepliedByEmpId IS NULL and  a.JobPostId IS NOT NULL ";
 			//echo $selforinq;
$rsforinq=mysqli_query($con,$selforinq) or die(mysqli_error($con));
 $cntforinq=mysqli_num_rows($rsforinq);
 //echo $cntforinq;



?>
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
				<a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
			
			</div><!-- Btn Extras -->
			
			<div class="responsivemenu">
				<ul>
					<li><a href="empdashboard.php" title="">Home</a></li>
					<li><a href="emporganization.php" title="">Organization</a></li>
					<li class="menu-item-has-children"><a href="#" title="">JobsAware</a>
						<ul>
								<li><a href="empmanagejob.php" title="">Jobs List</a></li>
								<li><a href="emppackage.php" title="">View Package</a></li>
								<li><a href="emporganizationprofile.php" title="">Manage Organization</a></li>
								<li><a href="empjobapplicants.php" title="">View Applicants</a></li>
								<li><a href="empjobapplicantsshortlisted.php" title="">Shortlisted Candidate</a></li>
								<li><a href="empinterview.php" title="">Scheduled Interview </a></li>
								<li><a href="empusrinquiry.php" title="">Job Seeker Inquiry </a></li>
								<li><a href="empreview.php" title="">Give Review</a></li>
							</ul>
					</li>		
					<div class="btn-extars" style="margin-left:20px;margin-top:-5px;">
						<?php if($tempforbtn==1) { ?><a href="emppostjob.php" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a><?php } ?>
					</div>
					<li><a href="empchangepwd.php" title=""><i class="la la-key"></i> Change Password</a></li>
					<li class="menu-item-has-children"><a>Notification <?php if($cntforinq>0) { ?>(<span class="pull-right-container">
										<small class="label pull-right bg-yellow" style="font-size: 13px;">
											<?php echo $cntforinq; ?>
										</small>
									</span>)<?php } ?></a>
						<ul>
							<li><a href="empusrinquiry.php" title="">Job Seeker Message <?php if($cntforinq>0) { ?><span class="pull-right-container">
										<small class="label pull-right bg-yellow" style="font-size: 13px;">
											<?php echo $cntforinq; ?>
										</small>
									</span><?php } ?></a></li>
						</ul>
					</li>
					<li class="menu-item-has-children"><a href="#" title=""><img src="employer/employerimg/<?php echo $empimg; ?>" height="40px" width="40px" style="border-radius:50%;margin-top:-22px;"></a>
						<ul>
							<li><a href="empprofile.php" title="">Edit Profile</a></li>
							<li><a href="emplogout.php" title="">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	
	<header class="stick-top forsticky"  >
		<div class="menu-sec">
			<div class="container">
				<div class="logo" style="margin-left: -20px;">
					<a href="index-2.html" title=""><img class="hidesticky" src="images/resource/JOBsaware2.png" alt="" style="height:45px;margin-top:-5px;" /><img class="showsticky" src="images/resource/JOBsaware1.png" alt="" style="height:45px;margin-top:-5px;" /></a>
				</div><!-- Logo -->
			
				<nav>
					<ul>
						<li class=""><a href="empdashboard.php" title="">Home</a></li>
						<li><a href="emporganization.php" title="">Organization</a></li>	
						<li class="menu-item-has-children"><a href="#" title="">JobsAware</a>
							<ul>
								<li><a href="empmanagejob.php" title="">Jobs List</a></li>
								<li><a href="emppackage.php" title="">View Package</a></li>
								<li><a href="emporganizationprofile.php" title="">Manage Organization</a></li>
								<li><a href="empjobapplicants.php" title="">View Applicants</a></li>
								<li><a href="empjobapplicantsshortlisted.php" title="">Shortlisted Candidate</a></li>
								<li><a href="empinterview.php" title="">Scheduled Interview </a></li>
								<li><a href="empusrinquiry.php" title="">Job Seeker Inquiry <?php if($cntforinq>0) { ?><span class="pull-right-container">
										<small class="label pull-right bg-yellow" style="font-size: 13px;">
											<?php echo $cntforinq; ?>
										</small>
									</span><?php } ?> </a></li>
								<li><a href="empreview.php" title="">Give Review</a></li>
							</ul>
						</li>
						<div class="btn-extars" style="margin-left:20px;margin-top:-5px;">
							<?php if($tempforbtn==1) { ?><a href="emppostjob.php" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a><?php } ?>
						</div>
						<li class="menu-item-has-children">
							<a href="#" title="">
								<img src="employer/employerimg/<?php echo $empimg;  ?>" height="40px" width="40px" style="border-radius:50%;margin-top:-22px;">
							</a>
							<ul>
								<li><a href="empprofile.php" title="">Edit Profile</a></li>
								<li><a href="emplogout.php" title="">Logout</a></li>
							</ul>
						</li>	
						<li><a href="empchangepwd.php" title=""><i class="la la-key"></i>  Change Password</a></li>
						<li class="menu-item-has-children"><a>Notification  <?php if($cntforinq>0) { ?>(<span class="pull-right-container">
										<small  style="font-size: 13px;">
											<?php echo $cntforinq; ?>
										</small>
									</span>)<?php } ?></a>
							<ul>
								<li><a href="empusrinquiry.php" title="">Job Seeker Message <?php if($cntforinq>0) { ?><span class="pull-right-container">
										<small class="label pull-right bg-yellow" style="font-size: 13px;">
											<?php echo $cntforinq; ?>
										</small>
									</span><?php } ?></a></li>
							</ul>
						</li>
						
						
					</ul>
				</nav><!-- Menus -->
			</div>
		</div>
	</header>