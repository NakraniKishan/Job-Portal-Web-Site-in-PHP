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
$selinq="	select * from tblinquiry a
			left join tbljobpost b on a.JobPostId=b.JobPostId
			where EmployerId=$empid and IsReplied=0 and a.JobPostId IS NOT NULL";
$rsinq=mysqli_query($con,$selinq) or die(mysqli_error($con));
$cntjobinq=mysqli_num_rows($rsinq);
//echo $cntjobinq;

//echo $resinq["JobPostId"];

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
							<h3>Inquiry</h3>
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
					 					<h3>My Jobs Inquiry</h3>
					 					<?php if($cntjobinq>0) { ?>
					 					<table style="width:1000px;">
						 					<thead>
								 				<tr>
								 					<td>Person Name</td>
						 							<td>Email</td>
						 							<td>subject</td>
						 							<td>Description</td>
						 							<td>Send Mail</td>	
								 				</tr>
						 					</thead>
						 					<tbody>
						 			<?php 
						 			while($resinq=mysqli_fetch_array($rsinq))
						 			{
						 			?>
						 				<tr>
						 					<td>
						 						<?php echo $resinq["PersonName"]; ?>
						 					</td>
						 					<td>
						 						<?php echo $resinq["EmailId"]; ?>
						 					</td>
						 					<td>
						 						<?php echo $resinq["Subject"]; ?>
						 					</td>
						 					<td>
						 						<?php echo $resinq["Description"]; ?>
						 					</td>
						 					<td>
						 						<a href="empsendinquiry.php?inqid=<?php echo $resinq["InquiryId"]; ?>"><i class="fa fa-fw fa-mail-forward"></i></a>
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
						 						<td><?php echo "You doesn't have any Inquiry on any job. "; ?></td>
						 					</tr>
						 				</table>
						 			<?php	
						 			} 
						 			?>
					 				<br>
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
