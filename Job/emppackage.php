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
$selcomppack="	select * from tblcompanypackage a 
				left join tblpackagepayment b on a.CompanyPackageId=b.CompanyPackageId
				where EmployerId=".$empid;
//$sel="select jp.*,em.FirstName,em.LastName,ct.CategoryName from tbljobpost as jp left join tblemployer as em on jp.EmployerId=em.EmployerId left join tblcategory as ct on jp.CategoryId=ct.CategoryId";
$rscomppack=mysqli_query($con,$selcomppack) or die(mysqli_error($con));
$cntcomppack=mysqli_num_rows($rscomppack);

$checkdate = date('Y-m-d');				
//echo $checkdate;
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
		<div class="block no-padding">
			<div class="container">
				<div class="row no-gape">
				 	<div class="col-lg-12 column">
				 		<div class="padding-left">
              				
					 			<div class="manage-jobs-sec">
					 					<h3>My Package </h3>
					 					<?php if($cntcomppack>0) { ?>
					 					<table style="width:1000px;">
						 					<thead>
								 				<tr>
								 					<td>Package Name</td>
								 					<td>Duration</td>
								 					<td>Price (<i class="fa fa-rupee"></i>)</td>
								 					<td>Description</td>
								 					<td>Start Date</td>
								 					<td>End Date</td>	
								 					<td>Status</td>
								 				</tr>
						 					</thead>
						 					<tbody>
						 			<?php
						 			$buynewpack=0; 
						 			while($rescomppack=mysqli_fetch_array($rscomppack))
						 			{
						 			?>
						 				<tr>
						 					<!-- <td><img src="packageimage/<?php echo $packimg; ?>" style="width: 100px; height: 100px;"></td> -->
						 					<td>
						 						<?php echo $rescomppack["PackageName"]; ?>
						 					</td>
						 					<td>
						 						<?php echo $rescomppack["Duration"]; ?> Months
						 					</td>
						 					<td>
						 						<?php echo $rescomppack["Price"]; ?>
						 					</td>
						 					<td style="width: 175px;">
						 						<?php echo $rescomppack["Description"]; ?>
						 					</td>
						 					<td>
						 						<?php echo $rescomppack["StartDate"]; ?>
						 					</td>
						 					<td>
						 						<?php echo $rescomppack["EndDate"]; ?>
						 					</td>				
						 					<td>
						 						<?php
						 				if(($checkdate >= $rescomppack["StartDate"]) && ($checkdate <= $rescomppack["EndDate"])) 
						 				{
						 					$buynewpack=0;
											echo "Active";
										}  
										else
										{
											$buynewpack=1;
											echo "Deactive";
										}
						 						?>
						 					</td>		 					 					
						 				</tr>
						 				<?php
						 				}
						 				?>
						 			</tbody>
						 				</table>
						 			<?php 
						 			}
						 			else
						 			{
						 			?>
						 				<table>
						 					<tr>
						 						<td><?php echo "You doesn't have any active Package. "; ?></td>
						 					</tr>
						 				</table>
						 			<?php	
						 			} 
						 			?>					 				
					 				<!-- <?php if($buynewpack==1 ) { ?><a href="empbuypackage.php">
					 					<button class="btnmain" style="margin-top: -10px;" >Buy Package</button></a><?php } ?> -->
					 				<?php if($cntcomppack==0 || $buynewpack==1 ) { ?><a href="empbuypackage.php">
					 					<button class="btnmain" style="margin-top: -10px;" >Buy Package</button></a><?php } ?>	
					 			</div>
					 	</div>
					</div>
				</div><br>
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
