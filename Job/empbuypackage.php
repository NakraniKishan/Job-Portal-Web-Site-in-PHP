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
	tr{text-align:center;}
	td{text-align:center;}
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
	
</head>

<?php
$con=mysqli_connect("localhost","root","","job");
extract($_REQUEST);
$checkdate = date('Y-m-d');
$selpacktoemp="select * from tblpackage where IsActive=1";
//$sel="select jp.*,em.FirstName,em.LastName,ct.CategoryName from tbljobpost as jp left join tblemployer as em on jp.EmployerId=em.EmployerId left join tblcategory as ct on jp.CategoryId=ct.CategoryId";
$rspacktoemp=mysqli_query($con,$selpacktoemp) or die(mysqli_error($con));
$cntpacktoemp=mysqli_num_rows($rspacktoemp);
$selforbuybtn="select * from tblcompanypackage where EmployerId=".$empid;
$rsforbuybtn=mysqli_query($con,$selforbuybtn) or die(mysqli_error($con));
$cntforbtn=mysqli_num_rows($rsforbuybtn);

if($cntforbtn>0)
{$tempforbtn=0;
while($resforbuybtn=mysqli_fetch_array($rsforbuybtn))
{

	if(($checkdate >= $resforbuybtn["StartDate"]) && ($checkdate <= $resforbuybtn["EndDate"]))
	{
		$tempforbtn=1; 
	}  
	else
	{
		//$tempforbtn=1;
	}

}
}
if(isset($pid))
{
	$_SESSION["pid"]=$pid;
	header('location:Paytm_Web_Sample_Kit_PHP-master/PaytmKit/TxnTest.php');
}
?>
<body>

<div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div>

<div class="theme-layout" id="scrollup">
	
	<?php include_once "empheader.php"; ?>

	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3>Package List</h3>
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
					<div class="col-lg-12">
						<div class="heading">
							<h2>Buy Our Plans And Packeges</h2>
							
						</div><!-- Heading -->
						<div class="plans-sec">
							<div class="row">
								<?php
								while($respacktoemp=mysqli_fetch_array($rspacktoemp))
								{
									if(is_null($respacktoemp["ImageUrl"]))
									{
										$packshowimg="coming.png";
									}
									else
									{
										$packshowimg=$respacktoemp["ImageUrl"];
									}
								?>
								<div class="col-lg-4">
									<div class="pricetable active">
										<div class="pricetable-head">
											<img src="packageimage/<?php echo $packshowimg; ?>" style="width: 300px; height: 200px; border-radius: 20px;">
										</div><!-- Price Table -->
										<ul>
											<li>Package Name : <?php echo $respacktoemp["PackageName"]; ?></li>
											<li>Duration : <?php echo $respacktoemp["Duration"]; ?> Month</li>
											<li>Price : <?php echo $respacktoemp["Price"]; ?><i class="fa fa-fw fa-inr"></i></li>
											<li>Description : <?php echo $respacktoemp["Description"];  ?></li>
										</ul>
										<?php if($tempforbtn==0) { ?>
										<a href="?pid=<?php echo $respacktoemp["PackageId"]; ?>" title="">BUY NOW</a>
										<?php } ?>
									</div>
								</div>
								<?php
								}
								//echo $tempforbtn;
								?>
							</div>
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
