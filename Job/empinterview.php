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
$selpostedjob="	select * from tbljobinterview a
				left join tbljobapply b on b.JobApplyId=a.JobApplyId
				left join tbluser c on b.UserId=c.UserId
				left join tbljobpost d on b.JobPostId=d.JobPostId
				left join tblcategory e on d.JobCategory=e.CategoryId
				where a.EmployerId=".$empid;
//$sel="select jp.*,em.FirstName,em.LastName,ct.CategoryName from tbljobpost as jp left join tblemployer as em on jp.EmployerId=em.EmployerId left join tblcategory as ct on jp.CategoryId=ct.CategoryId";
$rspostedjob=mysqli_query($con,$selpostedjob) or die(mysqli_error($con));
$cntjob=mysqli_num_rows($rspostedjob);
if(isset($_REQUEST["actjob"]))
    { 
    	$acceptusr="select * from tbljobinterview a
    				left join tbljobapply b on a.JobApplyId=b.JobApplyId
    				left join tbljobpost c on b.JobPostId=c.JobPostId
    				where JobInterviewId=".$actjob;
    	$rsacceptusr=mysqli_query($con,$acceptusr) or die(mysqli_error($con));
    	$resacceptusr=mysqli_fetch_array($rsacceptusr);
    	$totvacan=$resacceptusr["TotalVacancies"];
    	$tempjobpostid=$resacceptusr["JobPostId"];
    	//echo $tempjobpostid;
    	//echo $totvacan;
    	if($totvacan==1)
    	{
    		$upposttodeact="update tbljobpost set JobIsActive=0 where JobPostId=".$tempjobpostid;
    		mysqli_query($con,$upposttodeact) or die(mysqli_error($con));
    	}
    	elseif($totvacan>1)
    	{
    		$totminus=$totvacan-1;
    		$updatetotvacan="update tbljobpost set TotalVacancies=$totminus where JobPostId=".$tempjobpostid;
    		mysqli_query($con,$updatetotvacan) or die(mysqli_error($con));	
    	}

      if($_REQUEST["Status"]==0)
      { 
        $upd="update tbljobinterview set IsSelected=1 where JobInterviewId='".$_REQUEST["actjob"]."'";
        mysqli_query($con,$upd) or die(mysqli_error($con));
      }
      elseif($_REQUEST["Status"]==1)
      {
      	$upd="update tbljobinterview set IsSelected=0 where JobInterviewId='".$_REQUEST["actjob"]."'";
        mysqli_query($con,$upd) or die(mysqli_error($con));	
      }
      header('location:empinterview.php');
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
							<h3>Interview List</h3>
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
					 					<h3>My Jobs</h3>
					 					<?php if($cntjob>0) { ?>
					 					<table style="width:1000px;">
						 					<thead>
								 				<tr>
								 					<td>User Name</td>
								 					<td>Category</td>
								 					<td>Schedule</td>
								 					<td>Select</td>	
								 				</tr>
						 					</thead>
						 					<tbody>
						 			<?php 
						 			while($respostedjob=mysqli_fetch_array($rspostedjob))
						 			{
						 			?>
						 				<tr>
						 					<td>
						 						<?php echo $respostedjob["FirstName"]; ?> <?php echo $respostedjob["MiddleName"]; ?> <?php echo $respostedjob["LastName"]; ?>
						 					</td>
						 					<td>
						 						<?php echo $respostedjob["CategoryName"]; ?>
						 					</td>
						 					<td>
						 						<?php echo $respostedjob["ScheduleDateTime"]; ?>
						 					</td>
						 					<td>
							                    <a href="?actjob=<?php echo $respostedjob["JobInterviewId"]; ?>&Status=<?php echo $respostedjob["IsSelected"]; ?>">
							                    	<?php 
							                    		if($respostedjob["IsSelected"]==1)
							                    		{
							                    	?>
							                    		<i class="fa fa-check" style="color: blue;"></i>
							                    	<?php		
							                    		} 
							                    		else
							                    		{
							                    	?>
							                    		<i class="fa fa-close" style="color: red;"></i>
							                    	<?php		
							                    		}
							                    	?>
							                    </a>
						 					</td>
						 					<!-- <td>
						 						<a href="?didjob=<?php echo $respostedjob["JobPostId"]; ?>"><i class="fa fa-trash" style="color: red;"></i></a>
						 					</td> -->
						 					
						 					
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
						 						<td><?php echo "You Have Not Call Any One For The Interview "; ?></td>
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
